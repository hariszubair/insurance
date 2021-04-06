<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isAdmin(){

         if($this->hasRole('Administrator'))
        {

            return true;
        }
        return false;

    }
     public function insurances()
    {
        return $this->belongsToMany(
        Insurance::class,
        'vendor_insurances',
        'user_id',
        'insurance_id');
    }
     public function pivot_insurance()
    {
       return $this->hasMany('App\Models\VendorInsurance');
    }
    public function quotes()
    {
       return $this->hasMany('App\Models\AutoQuote','client_id','id')->where('status','Pending');
    }
    public function incomplete_auto_quotes()
    {
       return $this->hasMany('App\Models\TempAuto','user_id','id');
    }
}
