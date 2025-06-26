<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\StoreAttemptRequest;
use App\Models\GuestUser;
use App\Models\QuizQuestion;

class GuestUserService
{
    /**
     * Context product.
     *
     * @var GuestUser
     */
    private GuestUser $model;

    /**
     * Get the value of model.
     *
     * @return GuestUser
     */
    public function getGuestUser(): GuestUser
    {
        return $this->model;
    }

    /**
     * Set the value of model.
     *
     * @param  GuestUser $model
     * @return self
     */
    public function setGuestUser(GuestUser $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function storeGuestUser(StoreAttemptRequest $request): static
    {
        $validatedRequest = $request->validated();
        $totalNumberOfAnsweredQuestions = 2-count($validatedRequest['answers']);
        $totalScore = 0;

        if ($validatedRequest['is_binary']) {
            $questions = QuizQuestion::select('id', 'binary_correct_answer')->whereIn('id', array_keys($validatedRequest['answers']))->get();
            foreach ($validatedRequest['answers'] as $questionId => $answerId) {
                $dataBaseQuestion = $questions->find($questionId);

                if (!$dataBaseQuestion){
                    continue;
                }

                if ($dataBaseQuestion->binary_correct_answer == $answerId) {
                    $totalScore++;
                }
            }
        } else {
            $questions = QuizQuestion::select('id')->whereIn('id', array_keys($validatedRequest['answers']))->with('answers:id,quiz_question_id,is_correct')->get();
            foreach ($validatedRequest['answers'] as $questionId => $answerId) {
                $dataBaseQuestion = $questions->find($questionId);

                if (!$dataBaseQuestion){
                    continue;
                }

                $correctAnswer = $dataBaseQuestion->answers->where('is_correct', 1)->first();
                if ($correctAnswer->id == $answerId) {
                    $totalScore++;
                }
            }
        }

        $guestUser = GuestUser::where('email', $validatedRequest['email'])->first();
        if (!$guestUser) {
            $guestUser = new GuestUser();
            $guestUser->fill($validatedRequest);
            $guestUser->total_number_of_unanswered_questions = $totalNumberOfAnsweredQuestions;
            $guestUser->time_taken_seconds = 5*60 - $validatedRequest['time_remaining_seconds'];
            $guestUser->total_score = $totalScore;
        } else {
            if (
                ($totalScore > $guestUser->total_score) ||
                ($totalScore == $guestUser->total_score && $validatedRequest['time_taken_seconds'] < $guestUser->time_taken_seconds)
            ) {
                $guestUser->total_number_of_unanswered_questions = $totalNumberOfAnsweredQuestions;
                $guestUser->time_taken_seconds = 5*60 - $validatedRequest['time_remaining_seconds'];
                $guestUser->total_score = $totalScore;
            }
        }
        $guestUser->save();

        $this->setGuestUser($guestUser);

        return $this;
    }

    public function getTopScorers()
    {
        return GuestUser::orderBy('total_score', 'desc')->orderBy('time_taken_seconds')->limit(10)->get();
    }
}
