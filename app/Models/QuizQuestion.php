<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuizQuestion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
        'is_binary',
        'binary_correct_answer',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_binary' => 'boolean',
        'binary_correct_answer' => 'boolean',
    ];

    /**
     * Return the answers relation
     *
     * @return HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(QuizAnswer::class);
    }
}
