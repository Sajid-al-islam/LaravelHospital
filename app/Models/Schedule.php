<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['day', 'schedule_start', 'schedule_end', 'patient_limit', 'status', 'doctor_id'];

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }
}
