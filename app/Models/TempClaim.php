<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempClaim extends Model
{
    use HasFactory;
    protected $fillable = [
        'tempauto_id',
        'claims_drivers',
        'd_o_c',
        'claim_type',
        'claim_settled',
        'claim_amount',
    ];
}
