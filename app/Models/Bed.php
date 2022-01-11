<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor_id',
        'bed_category_id',
        'name',
        'limit',
        'cost',
        'status',
        'slug',
    ];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function bedCategory()
    {
        return $this->belongsTo(BedCategory::class);
    }

    // public function getCostAttribute($value)
    // {
    //     return $value. ' tk';
    // }

    public function getStatusAttribute($value)
    {
        if ($value == 1) {
            return 'Active';
        } else if ($value == 0) {
            return 'Deactive';
        }
    }
}
