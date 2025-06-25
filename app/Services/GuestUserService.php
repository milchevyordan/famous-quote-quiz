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

    public function storeGuestUser(StoreAttemptRequest $request)
    {
        $validatedRequest = $request->validated();

        $guestUser = GuestUser::where('email', $validatedRequest['email'])->first();
        if (!$guestUser) {
            $guestUser = new GuestUser();
            $guestUser->fill($validatedRequest);
            $guestUser->total_number_of_unanswered_questions = $validatedRequest['total_number_of_unanswered_questions'];
            $guestUser->time_taken_seconds = $validatedRequest['time_taken_seconds'];
        } else {
            if (
                ($validatedRequest['total_score'] > $guestUser->total_score) ||
                ($validatedRequest['total_score'] == $guestUser->total_score && $validatedRequest['time_taken_seconds'] < $guestUser->time_taken_seconds)
            ) {
                $guestUser->total_number_of_unanswered_questions = $validatedRequest['total_number_of_unanswered_questions'];
                $guestUser->time_taken_seconds = $validatedRequest['time_taken_seconds'];
            }
        }
        $guestUser->save();

        $this->setGuestUser($guestUser);

        return $this;
    }

    public function showScore(GuestUser $guestUser)
    {
        dd($guestUser);
    }
}
