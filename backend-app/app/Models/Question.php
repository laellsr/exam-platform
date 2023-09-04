<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'options',
        'correctAnswer', 
        'difficulty', 
        'category', 
        'score', 
    ];

    protected $casts = [
        'options' => 'array',
    ];
}
