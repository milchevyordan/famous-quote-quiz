<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\QuizQuestion;

class QuizService
{
    public static function getQuestions()
    {
        return QuizQuestion::where('is_binary', request('is_binary') == 'true')->with('answers')->limit(10)->get();
    }
}
