<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoQuote extends Model
{
    use HasFactory;
     protected $fillable = [
        'client_id',
        'company_id',
        'auto_id',
        'value',
        'status'
    ];
    public function auto()
    {
       return $this->hasOne('App\Models\Auto','id','auto_id');
    }
}
