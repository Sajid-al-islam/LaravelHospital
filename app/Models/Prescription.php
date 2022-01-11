<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'test',
        'symptoms',
        'gender',
        'date',
        'doctor_name',
        'blood_group',
        'slug'
    ];


    // public function setGenderAttribute($value) {
    //     if ($value) {
            
    //     }
    // }
}
