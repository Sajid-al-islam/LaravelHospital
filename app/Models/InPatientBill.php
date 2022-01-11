<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InPatientBill extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function inpatient()
    {
        return $this->belongsTo(InPatient::class);
    }
}
