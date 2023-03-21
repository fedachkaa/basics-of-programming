<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudySection extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['title', 'content', 'image'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_study_section')->withPivot('user_result');
    }
}
