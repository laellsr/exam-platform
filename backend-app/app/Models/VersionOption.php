<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VersionOption extends Model
{
    use HasFactory;

    public function question_version(): BelongsTo
    {
        return $this->belongsTo(QuestionVersion::class);
    }
}
