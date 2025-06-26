<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\StoreAttemptRequest;
use App\Models\Attempt;
use App\Models\GuestUser;
use App\Models\QuizQuestion;
use Illuminate\Support\Facades\Cache;

class AttemptService
{
    /**
     * Context model.
     *
     * @var Attempt
     */
    private Attempt $model;

    private array $validatedRequest;

    /**
     * Get the value of the model.
     *
     * @return Attempt
     */
    public function getAttempt(): Attempt
    {
        return $this->model;
    }

    /**
     * Set the value of model.
     *
     * @param  Attempt $model
     * @return self
     */
    public function setAttempt(Attempt $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of validatedRequest.
     *
     * @return array
     */
    public function getValidatedRequest(): array
    {
        return $this->validatedRequest;
    }

    /**
     * Set the value of validatedRequest.
     *
     * @param  array $validatedRequest
     * @return self
     */
    public function setValidatedRequest(array $validatedRequest): self
    {
        $this->validatedRequest = $validatedRequest;

        return $this;
    }

    /**
     * Store the quiz
     *
     * @param StoreAttemptRequest $request
     * @return $this
     */
    public function storeAttempt(StoreAttemptRequest $request): static
    {
        $this->setValidatedRequest($request->validated());

        $scorePercentage = $this->calculateScorePercentage();

        $guestUser = $this->storeOrUpdateGuestUser($scorePercentage);

        $this->setAttempt($guestUser);

        return $this;
    }

    private function calculateScorePercentage(): float
    {
        $validatedRequest = $this->getValidatedRequest();
        $answers = $validatedRequest['answers'];
        $questionIds = array_keys($answers);
        $correct = 0;

        if ($validatedRequest['is_binary']) {
            $questions = QuizQuestion::select('id', 'binary_correct_answer')
                ->whereIn('id', $questionIds)->get();

            foreach ($answers as $id => $userAnswer) {
                $question = $questions->find($id);
                if ($question && $question->binary_correct_answer == $userAnswer) {
                    $correct++;
                }
            }
        } else {
            $questions = QuizQuestion::select('id')
                ->whereIn('id', $questionIds)
                ->with('answers:id,quiz_question_id,is_correct')
                ->get();

            foreach ($answers as $id => $userAnswer) {
                $question = $questions->find($id);
                $correctAnswer = $question?->answers->firstWhere('is_correct', 1);

                if ($correctAnswer && $correctAnswer->id == $userAnswer) {
                    $correct++;
                }
            }
        }

        return ($correct / config('app.number_of_questions')) * 100;
    }

    /**
     * Update or create new guest user and return the attempt
     *
     * @param float $score
     * @return Attempt
     */
    private function storeOrUpdateGuestUser(float $score): Attempt
    {
        $validatedRequest = $this->getValidatedRequest();
        $timeTaken = config('app.time_for_quiz_in_minutes') * 60 - $validatedRequest['time_remaining_seconds'];

        $guestUser = GuestUser::where('email', $validatedRequest['email'])->first();

        if (!$guestUser) {
            $guestUser = new GuestUser();
        }

        $guestUser->fill($validatedRequest);
        $guestUser->save();

        $attempt = new Attempt([
            'total_number_of_unanswered_questions' => config('app.number_of_questions') - count($validatedRequest['answers']),
            'time_taken_seconds' => $timeTaken,
            'total_score' => $score,
        ]);
        $attempt->guest_user_id = $guestUser->id;
        $attempt->save();

        Cache::forget('leaderboard.top10');

        return $attempt;
    }


    /**
     * Return the best 10 users who took the quiz
     *
     * @return mixed
     */
    public function getTopScorers(): mixed
    {
        return Cache::remember('leaderboard.top10', now()->addMinutes(60), function () {
            return Attempt::with('guestUser')
                ->orderByDesc('total_score')
                ->orderBy('time_taken_seconds')
                ->take(10)
                ->get();
        });
    }
}
