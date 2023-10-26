<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'register',
        'name',
        'exam_id',
        'score'
    ];

    public function non_user_answers(): BelongsToMany
    {
        return $this->belongsToMany(NonUserAnswer::class);
    }
}
