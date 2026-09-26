<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'nis',
        'nisn',
        'name',
        'gender',
        'birth_date',
        'address',
        'phone',
        'class_id',
        'major_id',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'status' => 'boolean',
    ];

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }

    public function schoolClass(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }
}