<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['only' => [
            'index','dark_mode'
        ]]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function dark_mode()
    {
        $user=Auth::user();
        if($user->dark_mode==1){
            $dark_mode=0;
        }
        else{
            $dark_mode=1;
        }
        User::where('id',$user->id)->update(['dark_mode'=>$dark_mode]);
    }
    public function pet_insurance()
    {
        return view('insurances.pet');   
    }
    public function health_insurance()
    {
        return view('insurances.health');   
    }
     public function life_insurance()
    {
        return view('insurances.life');   
    }
    public function car_insurance()
    {
        return view('insurances.car');   
    }
    public function home_insurance()
    {
        return view('insurances.home');   
    }
    public function about_us()
    {
        return view('about_us');   
    }
    public function contact()
    {
        return view('contact');   
    }
}
