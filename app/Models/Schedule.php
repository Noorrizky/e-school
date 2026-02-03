<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    protected $fillable = [
        'academic_year_id', 'classroom_id', 'subject_id', 'teacher_id', 
        'day', 'start_time'
    ];

    public function academicYear(): BelongsTo { return $this->belongsTo(AcademicYear::class); }
    public function classroom(): BelongsTo { return $this->belongsTo(Classroom::class); }
    public function subject(): BelongsTo { return $this->belongsTo(Subject::class); }
    public function teacher(): BelongsTo { return $this->belongsTo(User::class, 'teacher_id'); }
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
}
