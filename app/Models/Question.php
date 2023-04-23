<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['study_section_id', 'question', 'variant_1','variant_2','variant_3','variant_4','answer'];

    function studySection(): BelongsTo {
        return $this->belongsTo(StudySection::class, 'study_section_id');
    }
}
