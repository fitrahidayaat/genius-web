<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'user_id',
        'teacher_id',
        'points',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function teacher(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function submissions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Submission::class);
    }

    public function ongoingMissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Mission::class, 'students_ongoing_missions', 'student_id', 'mission_id')
            ->withPivot('created_at')
            ->using(Ongoing::class);
    }

    public function completedMissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Mission::class, 'students_completed_missions', 'student_id', 'mission_id')
            ->withPivot('created_at')
            ->using(Completed::class);
    }

    // failed missions
    public function failedMissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Mission::class, 'students_failed_missions', 'student_id', 'mission_id')
            ->withPivot('created_at')
            ->using(Failed::class);
    }

}
