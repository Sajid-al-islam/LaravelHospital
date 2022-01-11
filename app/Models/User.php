<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'photo',
        'role_id',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPhotoAttribute($value) {
        return asset('storage/'. $value);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function userHasRole($role_name) {
        foreach($this->roles as $role) {
            if ($role_name == $role->slug) {
                return true;
            }
        }
        return false;
    }

    public function doctor() {
        return $this->hasOne(Doctor::class);
    }

    public function messages()
    {
        return $this->hasMany(MessageDoctor::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'attendance_id', 'id');
    }

    public function attendanceSchedule()
    {
        return $this->belongsTo(AttendanceSchedule::class);
    }

    public function userHasAttendance($date)
    {
        foreach($this->attendances as $attendance) {
            if ($date == $attendance->date) {
                return true;
            }
        }
    }

}
