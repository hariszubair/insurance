<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [
        'tempauto_id',
        'relation',
        'first_name',
        'last_name',
        'd_o_b',
        'gender',
        'occupation',
        'driving_licence',
        'licence_period',
        'penalty_points',
        'points_count',
        'penalty_reason',
    ];
}
