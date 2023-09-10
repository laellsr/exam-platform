<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class QuestionType extends Model
{
    use HasFactory;

    public function question_versions(): BelongsToMany
    {
        return $this->belongsToMany(QuestionVersion::class);
    }
}
