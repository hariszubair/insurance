<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorInsurance;
use App\Models\Auto;
use App\Models\AutoQuote;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
class VendorController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function insurances(Request $request){
    	$input=[];
    	$user=Auth::user();
    	foreach ($request->insurances as $key => $insurances) {
    		$input[$key]['user_id']=$user->id;
    		$input[$key]['insurance_id']=$insurances;
    		$input[$key]['created_at']=Carbon::now();
    		$input[$key]['updated_at']=Carbon::now();
    	}
        $user->givePermissionTo($request->insurances);
    	VendorInsurance::insert($input);
    	return redirect()->back();
    }
   
       

    
}
