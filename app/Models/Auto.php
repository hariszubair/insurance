<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Auto extends Model
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
    public function quotes()
    {
       return $this->hasOne('App\Models\AutoQuote','auto_id','id')->where('company_id',Auth::user()->id);
    }
}
