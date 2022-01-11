<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getServiceAvailabilityAttribute($value) {
        if ($value == 1) {
            return "Available";
        } else if ($value == 0) {
            return "Not Available";
        }
    }

    public function getPhotoAttribute($value) {
        return asset('storage/'. $value);
    }
}
