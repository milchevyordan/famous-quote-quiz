<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attempt extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'total_number_of_unanswered_questions',
        'time_taken_seconds',
        'total_score',
    ];

    /**
     * Return the relation to the guestUser
     *
     * @return BelongsTo
     */
    public function guestUser(): BelongsTo
    {
        return $this->belongsTo(GuestUser::class);
    }
}
