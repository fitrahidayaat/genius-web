<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Completed extends Pivot
{
    protected $table = 'students_completed_missions';
    protected $foreignKey = 'student_id';
    protected $relatedKey = 'mission_id';
    public $timestamps = true;

    public function usesTimestamps(): bool
    {
        return true;
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function mission(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Mission::class, 'mission_id', 'id');
    }
}
