<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\QuizQuestion;
use Illuminate\Support\Facades\Cache;

class QuizService
{
    /**
     * Return the questions when starting the quiz
     * Cache the result for 60 minutes so we have less load on the database
     *
     * @return mixed
     */
    public static function getQuestions(): mixed
    {
        $questions = Cache::remember('quiz_questions_is_binary_' . request('is_binary'), now()->addMinutes(60), function () {
            return QuizQuestion::select('id', 'question', 'is_binary', 'binary_correct_answer')
                ->where('is_binary', request('is_binary') == 'true')
                ->with('answers:id,quiz_question_id,answer,is_correct')
                ->get();
        });

        return $questions->shuffle()->take(config('app.number_of_questions'))->values();
    }
}
