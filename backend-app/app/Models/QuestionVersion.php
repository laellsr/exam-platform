<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class QuestionVersion extends Model
{
    use HasFactory;


    public function question_options(): HasMany
    {
        return $this->hasMany(VersionOption::class);
    }

    public function question_type(): HasOne
    {
        return $this->hasOne(QuestionType::class);
    }
}
