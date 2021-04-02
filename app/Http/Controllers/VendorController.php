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
    public function auto_quote(){

       return view('vendor.auto.quote');
    }
    public function ajax_auto_quote(){
        $auto=Auto::with('quotes')->where('status',0);
       return Datatables::of($auto)->addColumn('request_on', function ($row) {
                return Carbon::parse($row->created_at)->format('d-m-Y');
           })->addColumn('quote', function ($row) {
            if(!$row->quotes){
                     return '<a class="btn btn-success" href="'.URL('quote/auto/').'/'.$row->id.'">Quote</a>';
            }
           else{
            return $row->quotes->value;
           }
           })->escapeColumns([])->make(true);
    }   
    public function give_quote   ($id){
         $auto=Auto::find($id);
        return view('vendor.auto.vendor_quote',compact('auto'));
    }
    public function submit_value(Request $request){
        $input['client_id']=$request->client_id;
        $input['company_id']=Auth::user()->id;
        $input['auto_id']=$request->id;
        $input['value']=$request->qoute_value;
        $input['status']='Pending';
         $auto=AutoQuote::create($input);
         return redirect()->route('home');
    }
    
}
