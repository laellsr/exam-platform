<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestionVersion extends Model
{
    use HasFactory;

    protected $table = 'exam_question_version';

    protected $fillable = [
        'exam_id',
        'question_id',
        'question_version_id'
    ];
}
