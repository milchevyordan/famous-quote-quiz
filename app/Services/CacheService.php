<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    /**
     * Clear the question cache
     *
     * @return void
     */
    public static function clearQuestionsCache(): void
    {
        Cache::forget('quiz_questions_is_binary_true');
        Cache::forget('quiz_questions_is_binary_false');
    }
}
