<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = ['name', 'description', 'status', 'image'];

    public function getPhotoAttribute($value) {
        return asset('storage/'. $value);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

}
