<?php

namespace App\Models;

use App\Traits\HasChangeLogs;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasChangeLogs;


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
}
