<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempAuto;
use App\Models\TempDriver;
use Yajra\Datatables\Datatables;
use App\Models\TempClaim;
use Illuminate\Support\Facades\Auth;
use App\Models\Auto;
use App\Models\Driver;
use App\Models\Claim;
use App\Models\User;
use Carbon\Carbon;
class AutoController extends Controller
{
    public function quote(){
    	return view('insurance.auto.quote');
    }
    public function temp_store(Request $request){
    	$input=$request->all();
    	$tempAutoModel = new TempAuto();
    	if($input['type']== 1){
    		$input['user_id']=Auth::user()->id;
    		return TempAuto::create($input)->id;
    	}
    	else{

    		TempAuto::where('id',$input['record_id'])->update($request->only($tempAutoModel->getFillable()));
    	}
    	
    }
    public function temp_drivers(Request $request){
        $drivers=TempDriver::where('tempauto_id',$request->id);
        return Datatables::of($drivers)->addColumn('action', function ($row) {
            
                   return '<div style="display:flex"><button type="button" class="edit_driver btn btn-primary" rel_tempauto_id="'.$row->tempauto_id.'" rel_relation="'.$row->relation.'" rel_first_name="'.$row->first_name.'" rel_last_name="'.$row->last_name.'" rel_d_o_b="'.$row->d_o_b.'" rel_gender="'.$row->gender.'" rel_occupation="'.$row->occupation.'" rel_driving_licence="'.$row->driving_licence.'" rel_licence_period="'.$row->licence_period.'" rel_penalty_points="'.$row->penalty_points.'" rel_points_count="'.$row->points_count.'" rel_penalty_reason="'.$row->penalty_reason.'" rel_id="'.$row->id.'"  data-toggle="modal" data-target=".edit_driver_modal"><i class="fas fa-edit"></i></button><button type="button" class="delete_driver btn btn-danger" rel_id="'.$row->id.'"><i class="fas fa-trash"></i></button></div>';
            })->make(true);
        
    }
    public function temp_driver_store(Request $request){
        $input= $request->all();
        $input['tempauto_id']=$request->record_id;
        TempDriver::create($input); 
        return 1;
    }
    public function temp_driver_edit(Request $request){
        $input= $request->all();
        TempDriver::where('id',$request->id)->update($input);
        return 1;
    }
    public function temp_driver_delete($id){
        TempDriver::where('id',$id)->delete();
        return 1;
    }
     public function temp_claims(Request $request){
        $claims=TempClaim::where('tempauto_id',$request->id);
        return Datatables::of($claims)->addColumn('action', function ($row) {
                   return '<div style="display:flex"><button type="button" class="edit_claims btn btn-primary" rel_tempauto_id="'.$row->tempauto_id.'" rel_claims_drivers="'.$row->claims_drivers.'" rel_d_o_c="'.$row->d_o_c.'" rel_claim_type="'.$row->claim_type.'" rel_claim_settled="'.$row->claim_settled.'" rel_claim_amount="'.$row->claim_amount.'" rel_id="'.$row->id.'"  data-toggle="modal" data-target=".edit_claims_modal"><i class="fas fa-edit"></i></button><button type="button" class="delete_claims btn btn-danger" rel_id="'.$row->id.'"><i class="fas fa-trash"></i></button></div>';
            })->make(true);
        
    }
    public function temp_claim_store(Request $request){
        $input= $request->all();
        $input['tempauto_id']=$request->record_id;
        TempClaim::create($input); 
        return 1;
    }
    public function temp_claims_edit(Request $request){
        $input=$request->all();
        TempClaim::where('id',$request->id)->update($input);
        return 1;
    }
    public function temp_claims_delete($id){
        TempClaim::where('id',$id)->delete();
        return 1;
    }
    public function submit_quote(Request $request){
         $temp_auto= TempAuto::with('drivers','claims')->find($request->duplicate_record_id);
        $auto=Auto::create($temp_auto->toArray());

        $claims=$temp_auto->claims->toArray();
        foreach ($claims as $key => $claim) {
            $claims[$key]['id']=null;
            $claims[$key]['tempauto_id']=$auto->id;
            $claims[$key]['created_at']=Carbon::now();
            $claims[$key]['updated_at']=Carbon::now();

        }
        Claim::insert($claims);
         $drivers=$temp_auto->drivers->toArray();
        foreach ($drivers as $key => $driver) {
            $drivers[$key]['id']=null;
            $drivers[$key]['tempauto_id']=$auto->id;
            $drivers[$key]['created_at']=Carbon::now();
            $drivers[$key]['updated_at']=Carbon::now();
        }
        Driver::insert($drivers);
        return redirect()->route('home');
    }
    public function auto_requests(){
        $users= User::with('quotes.auto')->find(Auth::user()->id);

        return view('client.auto_request',compact('users'));

    }

}
