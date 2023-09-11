<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class QuestionVersion extends Model
{
    use HasFactory;

    protected $table = 'question_versions';

    protected $fillable = [
        'question_type_id',
        'version_option_id',
        'level',
        'description'
    ];

    public function exams(): BelongsToMany
    {
        return $this->belongsToMany(Exam::class);
    }

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class);
    }

    public function question_options(): BelongsToMany
    {
        return $this->belongsToMany(VersionOption::class);
    }

    public function question_type(): HasOne
    {
        return $this->hasOne(QuestionType::class);
    }

    public function exam_question_version(): BelongsToMany
    {
        return $this->belongsToMany(ExamQuestionVersion::class);
    }
}
