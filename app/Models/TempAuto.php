<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempAuto extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'car_make',
        'car_model',
        'fuel_type',
        'reg_no',
        'buisness_purpose',
        'business_type',
        'car_commute',
        'average_drive',
        'driving_licence',
        'licence_period',
        'penalty_points',
        'points_count',
        'penalty_reason',
        'recent_insurance'
    ];
    public function getFillable()
{
    return $this->fillable;
}
 public function drivers()
    {
       return $this->hasMany('App\Models\TempDriver','tempauto_id','id');
    }
    public function claims()
    {
       return $this->hasMany('App\Models\TempClaim','tempauto_id','id');
    }
}
