<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InPatient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function bedCategory()
    {
        return $this->belongsTo(BedCategory::class);
    }

    public function bed()
    {
        return $this->belongsTo(Bed::class);
    }

    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'Active' : 'Deactive';
    }
}
