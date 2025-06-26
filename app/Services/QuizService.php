<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\QuizQuestion;

class QuizService
{
    public static function getQuestions()
    {
        return QuizQuestion::select('id', 'question', 'is_binary', 'binary_correct_answer')->where('is_binary', request('is_binary') == 'true')->with('answers:id,quiz_question_id,answer,is_correct')->limit(2)->get();
    }
}
