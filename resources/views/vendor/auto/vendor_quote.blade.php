@extends('layouts.app')

@section('content')
<style>
  div[data-acc-content] { display: none;  }
  div[data-acc-step]:not(.open) { background: #f2f2f2;  }
  div[data-acc-step]:not(.open) h5 { color: #777;  }
  div[data-acc-step]:not(.open) .badge-primary { background: #ccc;  }
  label{
    margin-bottom: 0;
  }
  input[type="submit"] {
  	display: none !important;
  }
  .mb-0{
  	background-color: #21dfac;
  	padding: 5px 0 5px 0;
  }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <input id="record_id" name="record_id" value="{{$auto->id}}" style="display: none">
    <div style="text-align:center;padding-bottom: 20px">
        <button id="give_quote" type="button" class="btn btn-success" data-toggle="modal" data-target=".give_quote">Give Quote</button>
    </div>
  <div class="list-group" id="accordion">

    <!-- Step 1 -->
    <div class="list-group-item py-3" data-acc-step>
      <h5 class="mb-0" data-acc-title>Car Details</h5>

      <div data-acc-content id="1-content">
          <div class="row g-gs" style="padding-top: 10px;padding-bottom: 10px">
                              <div class="col-md-6">
                            <div class="form-group">
                                <!-- Label -->
                                <label>
                                    Car registration number:
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                     <input id="reg_no" type="text" class="form-control" name="reg_no" value="{{$auto->reg_no}}"  autofocus  placeholder="Registration #">

                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <!-- Label -->
                                <label>
                                    Make
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                    <input id="car_make" type="text" class="form-control" name="car_make" value="{{$auto->car_make}}" autofocus placeholder="Please enter car manufacturer">
                                        
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <!-- Label -->
                                <label>
                                    Model
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                    <input id="car_model" type="text" class="form-control" name="car_model" value="{{$auto->car_model}}"  autofocus  placeholder="Please enter the car model">
                                     
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <!-- Label -->
                                <label>
                                    Fuel Type
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                    
                                    <input id="fuel_type" type="text" class="form-control" name="fuel_type"  autofocus value="{{$auto->fuel_type}}">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <!-- Label -->
                                <label>
                                   Will this car be used for business purposes?
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                    <input value="{{$auto->buisness_purpose}}" id="buisness_purpose" type="text" class="form-control" name="buisness_purpose"   autofocus>
                                </div>
                              </div>
                            </div>
                            @if($auto->buisness_purpose == 'Yes')
                            <div class="col-md-6" id="buisness_purpose_div" >
                                <div class="form-group">
                                <!-- Label -->
                                <label>
                                   What type of business use cover do you require?
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                    <input value="{{$auto->business_type}}" id="business_type" type="text" class="form-control" name="business_type"   autofocus required>
                                </div>
                              </div>
                            </div>
                            @endif
                            @if($auto->buisness_purpose == 'No')
                            <div class="col-md-6" id="nonbuisness_purpose_div" >
                                <div class="form-group">
                                <!-- Label -->
                                <label>
                                   Will this car be used for commuting to work?
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                    <input value="{{$auto->car_commute}}"  id="car_commute" type="text" class="form-control" name="car_commute"   autofocus required>
                                </div>
                              </div>
                            </div>
                            @endif
                            <div class="col-md-6" >
                                <div class="form-group">
                                <!-- Label -->
                                <label>
                                  How many kilometres do you drive per year?
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                    <input value="{{$auto->average_drive}}" id="average_drive" type="text" class="form-control" name="average_drive"   autofocus required>
                                </div>
                              </div>
                            </div>
        </div>

      </div>
    </div>

    <!-- Step 2 -->
    <div class="list-group-item py-3" data-acc-step>
            <form id="driving_history_form" method="post" style="width: 100%">

      <h5 class="mb-0" data-acc-title>Driving History</h5>
      <div data-acc-content id="2-content">
          <div class="row g-gs" style="padding-top: 10px;padding-bottom: 10px">
          <div class="col-md-6" >
            <label>Choose your current driving licence</label>
            <input value="{{$auto->driving_licence}}" id="driving_licence" type="text" class="form-control" name="driving_licence"   autofocus required>
          </div>

          <div class="col-md-6" >
            <label>How long have you held this licence?</label>
            <input value="{{$auto->licence_period}}" id="licence_period" type="text" class="form-control" name="licence_period"   autofocus required>
          </div>
          <div class="col-md-6">
                                <div class="form-group">
                                <!-- Label -->
                                <label>
                                   Do you have any penalty points?
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                    <input value="{{$auto->penalty_points}}" id="penalty_points" type="text" class="form-control" name="penalty_points"   autofocus required>
                                </div>
                              </div>
                            </div>
                            @if($auto->penalty_points == 'Yes')
                            <div class="col-md-6" id="points_count_div" >
                                <div class="form-group">
                                <!-- Label -->
                                <label>
                                   How many penalty points do you have?
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                    <input value="{{$auto->points_count}}" id="points_count" type="text" class="form-control" name="points_count"   autofocus required>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6" id="points_details_div">
                              <div class="form-group">
                                <!-- Label -->
                                <label>
                                   <b>Please confirm</b>
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                    <p> <b>Were any of these penalty points given for any of the reasons listed?</b></p>
                                    <br>
                                    <ol style="padding-left: 20px;list-style-type: circle;">
                                      <li>Drunk Driving : 50mg – 79mg per 100ml of blood</li>
                                      <li>Driving on a motorway against the flow of traffic</li>
                                      <li>Failure to drive on the left hand side of the road</li>
                                      <li>Driving without reasonable consideration</li>
                                      <li>Breach of duties at an accident</li>
                                      <li>Driving without insurance</li>
                                      <li>Driver found to be driving carelessly</li>
                                    </ol>

                                </div>

                              </div>

                            </div>
                            <div class="col-md-6" id="penalty_reason_div">
                                <div class="form-group">
                                <!-- Label -->
                                
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                    <input value="{{$auto->penalty_reason}}" id="penalty_reason" type="text" class="form-control" name="penalty_reason"   autofocus required>
                                </div>
                              </div>
                            </div>
                            @endif	
                            <div class="col-md-6">
                                <div class="form-group">
                                <!-- Label -->
                                <label>
                                   What was your most recent insurance?
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                    <input value="{{$auto->recent_insurance}}" id="recent_insurance" type="text" class="form-control" name="recent_insurance"   autofocus required>
                                </div>
                              </div>
                            </div>
        </div>
      </div>
    </form>
    </div>

    <!-- Step 3 -->
    <div class="list-group-item py-3" data-acc-step>
      <h5 class="mb-0" data-acc-title>Additional drivers</h5>

      <div data-acc-content id="3-content">
        <div style="text-align: center;padding: 5px">
           
    </div>
    <div>
        <table  id="drivers" class="display table table-striped table-bordered dt-responsive " scroll="no" style="overflow: hidden" cellspacing="0" width="100%">
                      <thead>
                         <tr>
                          <th style="width: 35%">Name</th>
                          <th style="width: 15%">Date of birth</th>
                          <th style="width: 15%">Gender</th>
                          <th>Licence Type</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      </tbody>
                    </table>
    </div>
        
      </div>
    </div>
    <!-- Step 4 -->
    <div class="list-group-item py-3" data-acc-step>
      <h5 class="mb-0" data-acc-title>Claims</h5>

      <div data-acc-content id="4-content">
        <div style="text-align: center;padding: 5px">
    </div>
    <div>
        <table  id="claims" class="display table table-striped table-bordered dt-responsive " scroll="no" style="overflow: hidden" cellspacing="0" width="100%">
                      <thead>
                         <tr>
                          <th style="width: 35%">Claim type</th>
                          <th style="width: 15%">Date of claim</th>
                          <th style="width: 15%">Driver</th>
                          <th>Settlement amount</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      </tbody>
                    </table>
    </div>  
                    </div>
      </div>
      
      <div>
        </div>

    </div>
  <!-- edit driver -->
            <form id="give_quote_form" action="{{URL('auto/submit_value')}}" method="post" style="width: 100%">
@csrf

<div class="modal fade give_quote" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

       <div class="modal-header">
        <h5 class="modal-title">Give Quote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input name="id" id="id" value="{{$auto->id}}" type="hidden">
        <input name="client_id" id="client_id" value="{{$auto->user_id}}" type="hidden">

        <div class="row g-gs" style="padding-top: 10px;padding-bottom: 10px" >
          <div class="col-md-6">
            <label>Quote Status</label>
            <select name="quote_eligibility" id="quote_eligibility" class="form-control" required>
            <option value="">Please Select the following</option>
            <option value="Eligible">Eligible</option>
            <option value="In-Eligible">In-Eligible</option>
            </select>
          </div>
          <div class="col-md-6" id="quote_value_div" style="display:none">
            <label>Quote Value @ Month </label>
            <input id="qoute_value" type="text" class="form-control" name="qoute_value"   autofocus required>
                                      
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Submit Quote</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>
@endsection




@section('footer')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('js/jquery.accordion-form.js')}}"></script>
<script type="text/javascript">
    $( document ).ready(function() {
      $(":input"). prop("disabled", true);
      $("#give_quote"). prop("disabled", false);
      $("#give_quote_form :input"). prop("disabled", false);

      

    $( "#accordion" ).accWizard({
    mode: 'edit',//wizard, edit
    start:1,
    autoButtonsNextClass: 'btn btn-primary float-right',
    autoButtonsPrevClass: 'btn btn-light',
    stepNumberClass: 'badge badge-pill badge-primary mr-1',
    onSubmit: function() {
      return false;
    },
    beforeNextStep:function(currentStep){
        if (currentStep ==1 ){
            if(! $("#car_detail_form").valid()){
                return false;
            }
            //on create 
            if( $('#record_id').val() == ''){
                var type=1;
                var record_id= '';
            }
             //updating 
            else{
                var type=2;
                var record_id= $('#record_id').val();
            }
            $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'{{url("/auto/temp_store") }}',
            data: $("#car_detail_form").serialize() + "&type="+ type +'&record_id='+record_id,
            type:'POST',
             dataType: "json",
            success:function(data){
                if(data && Number.isInteger(data)){
                $('#record_id').val(data)
                $('#duplicate_record_id').val(data)
                }
            }
            });
            return true;


        }
        else if (currentStep == 2){
            if(! $("#driving_history_form").valid()){
                return false;
            }
            //on create 
            if( $('#record_id').val() == ''){
                var type=1;
                var record_id= '';
            }
             //updating 
            else{
                var type=2;
                var record_id= $('#record_id').val();
            }
            $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'{{url("/auto/temp_store") }}',
            data: $("#driving_history_form").serialize() + "&type="+ type +'&record_id='+record_id,
            type:'POST',
             dataType: "json",
            success:function(data){
                if(data && Number.isInteger(data)){
                $('#record_id').val(data)
                $('#duplicate_record_id').val(data)
                }
            }
            });
             if($.fn.DataTable.isDataTable('#drivers')){
                       $('#drivers').DataTable().destroy();
                    }
            drivers()
            return true;


        }
        else if (currentStep == 3){
           if($.fn.DataTable.isDataTable('#claims')){
                       $('#claims').DataTable().destroy();
                    }
            claims()
            return true;
        }
        else if (currentStep == 4){
            return true;
        }
        // $("#car_detail_form").submit();
        // return true;
    }
  });
  $("#car_detail_form").validate({
      rules: {
         reg_no: 'required',
         car_make: 'required',
         car_model: 'required',
         fuel_type: 'required',
         buisness_purpose: 'required',
      }
   });  
            drivers();
            claims();
});
    $( "#buisness_purpose" ).on('change',function() {
        if($( "#buisness_purpose").val() == 'Yes'){
            $( "#buisness_purpose_div").show();
            $( "#nonbuisness_purpose_div").hide();
            $('#business_type').val(null);
            $('#car_commute').val(null);
        }
        else if($( "#buisness_purpose").val() == 'No'){
            $( "#buisness_purpose_div").hide();
            $( "#nonbuisness_purpose_div").show();
            $('#business_type').val(null);
            $('#car_commute').val(null);
        }
        else{
             $( "#buisness_purpose_div").hide();
            $( "#nonbuisness_purpose_div").hide();
            $('#business_type').val(null);
            $('#car_commute').val(null);
        }
    
});
     $( "#penalty_points" ).on('change',function() {
        if($( "#penalty_points").val() == 'Yes'){
            $( "#points_count_div").show();
            $( "#points_details_div").show();
            $( "#penalty_reason_div").show();
            $('#penalty_reason').val(null);
            $('#points_count').val(null);
        }
        else{
            $( "#points_count_div").hide();
            $( "#points_details_div").hide();
            $( "#penalty_reason_div").hide();
            $('#points_count').val(null);
            $('#penalty_reason').val(null);

        }
     });
     $( "#quote_eligibility" ).on('change',function() {
        if($( "#quote_eligibility").val() == 'Eligible'){
            $( "#quote_value_div").show();
            $('#quote_value').val(null);
            $("input").prop('required',true);

        }
        else{
          $( "#quote_value_div").hide();
          $('#quote_value').val(null);
          $("input").prop('required',false);

        }
     });
     $( "#driver_penalty_points" ).on('change',function() {
        if($( "#driver_penalty_points").val() == 'Yes'){
            $( "#driver_points_count_div").show();
            $( "#driver_points_details_div").show();
            $( "#driver_penalty_reason_div").show();
            $('#driver_penalty_reason').val(null);
            $('#driver_points_count').val(null);
        }
        else{
            $( "#driver_points_count_div").hide();
            $( "#driver_points_details_div").hide();
            $( "#driver_penalty_reason_div").hide();
            $('#driver_points_count').val(null);
            $('#driver_penalty_reason').val(null);

        }
     });
     $( "#edit_driver_penalty_points" ).on('change',function() {
        if($( "#edit_driver_penalty_points").val() == 'Yes'){
            $( "#edit_driver_points_count_div").show();
            $( "#edit_driver_points_details_div").show();
            $( "#edit_driver_penalty_reason_div").show();
            $('#edit_driver_penalty_reason').val(null);
            $('#edit_driver_points_count').val(null);
        }
        else{
            $( "#edit_driver_points_count_div").hide();
            $( "#edit_driver_points_details_div").hide();
            $( "#edit_driver_penalty_reason_div").hide();
            $('#edit_driver_points_count').val(null);
            $('#edit_driver_penalty_reason').val(null);

        }
     });
function drivers(){
    $('#drivers').DataTable({
     
        processing: true,
        serverSide: true,
         dom:"",
        ajax: {
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         url:'../auto/temp_drivers' ,
           method: 'Post',
          data: function (d) {
              d.id = $('#record_id').val();
        },
},
        columns: [
       { "data": 'first_name','name':'first_name', searchable: true},
       { "data": 'd_o_b','name':'d_o_b', searchable: true},
       { "data": 'gender','name':'gender', searchable: true},
       { "data": 'driving_licence','name':'driving_licence', searchable: true},
        ],  
        "initComplete": function( settings, json ) {
            $('.edit_driver').click(function() {
                $('#edit_driver_id').val($(this).attr('rel_id'));
                $('#edit_relation').val($(this).attr('rel_relation'));
                $('#edit_d_o_b').val($(this).attr('rel_d_o_b'));
                $('#edit_first_name').val($(this).attr('rel_first_name'));
                $('#edit_last_name').val($(this).attr('rel_last_name'));
                $('#edit_gender').val($(this).attr('rel_gender'));
                $('#edit_driver_driving_licence').val($(this).attr('rel_driving_licence'));
                $('#edit_driver_licence_period').val($(this).attr('rel_licence_period'));
                $('#edit_occupation').val($(this).attr('rel_occupation'));
                $('#edit_driver_penalty_points').val($(this).attr('rel_penalty_points'));
                if($(this).attr('rel_penalty_points') == "Yes"){
                    $('#edit_driver_points_count_div').show();
                    $('#edit_driver_points_details_div').show();
                    $('#edit_driver_penalty_reason_div').show();
                }
                else{
                 $('#edit_driver_points_count_div').hide();
                 $('#edit_driver_points_count').val(null);
                    $('#edit_driver_points_details_div').hide();
                    $('#edit_driver_penalty_reason_div').hide();  
                    $('#edit_driver_penalty_reason').val(null) 
                }
                $('#edit_driver_points_count').val($(this).attr('rel_points_count'));
                $('#edit_driver_penalty_reason').val($(this).attr('rel_penalty_reason'));
            });
            $('.delete_driver').click(function() {
                $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'{{url("/auto/temp_drivers/delete") }}'+'/'+$(this).attr('rel_id'),
            type:'GET',
             dataType: "json",
            success:function(data){
               if(data==1){
                 if($.fn.DataTable.isDataTable('#drivers')){
                       $('#drivers').DataTable().destroy();
                    }
                    drivers();
                    $('#add_driver_div').hide();
               }
            }
            });
            });
          }   
    });
}
function claims(){
    $('#claims').DataTable({
     
        processing: true,
        serverSide: true,
         dom:"",
        ajax: {
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         url:'../auto/temp_claims' ,
           method: 'Post',
          data: function (d) {
              d.id = $('#record_id').val();
        },
},

        // ajax: {
        //     url:'/show/'+id,  
        //   },
        columns: [
       { "data": 'claim_type','name':'claim_type', searchable: true},
       { "data": 'd_o_c','name':'d_o_c', searchable: true},
       { "data": 'claims_drivers','name':'claims_drivers', searchable: true},
       { "data": 'claim_amount','name':'claim_amount', searchable: true},
        ],  
        "initComplete": function( settings, json ) {
            $('.edit_claims').click(function() {
                $('#edit_claims_id').val($(this).attr('rel_id'));
                $('#edit_claims_drivers').val($(this).attr('rel_claims_drivers'));
                $('#edit_d_o_c').val($(this).attr('rel_d_o_c'));
                $('#edit_claim_type').val($(this).attr('rel_claim_type'));
                $('#edit_claim_settled').val($(this).attr('rel_claim_settled'));
                $('#edit_claim_amount').val($(this).attr('rel_claim_amount'));
            });
            $('.delete_claims').click(function() {
                $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'{{url("/auto/temp_claims/delete") }}'+'/'+$(this).attr('rel_id'),
            type:'GET',
             dataType: "json",
            success:function(data){
               if(data==1){
                 if($.fn.DataTable.isDataTable('#claims')){
                       $('#claims').DataTable().destroy();
                    }
                    claims();
                    $('#add_claims_div').hide();
               }
            }
            });
            });
          }    
    });
}
$('#add_driver_button').click(function() {
   if(! $("#add_driver_form").valid()){
                return false;
            }
            //on create 
            if( $('#record_id').val() == ''){
                var type=1;
                var record_id= '';
            }
             //updating 
            else{
                var type=2;
                var record_id= $('#record_id').val();
            }
            $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'{{url("/auto/temp_driver_store") }}',
            data: $("#add_driver_form").serialize() + "&type="+ type +'&record_id='+record_id,
            type:'POST',
             dataType: "json",
            success:function(data){
               if(data==1){
                 if($.fn.DataTable.isDataTable('#drivers')){
                       $('#drivers').DataTable().destroy();
                    }
                    drivers();
                    $('#add_driver_div').hide();
               }
            }
            });
});
$('#edit_driver_button').click(function() {
   if(! $("#edit_driver_form").valid()){
                return false;
            }
            $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'{{url("/auto/temp_driver_edit") }}',
            data: $("#edit_driver_form").serialize(),
            type:'POST',
             dataType: "json",
            success:function(data){
               if(data==1){
                 if($.fn.DataTable.isDataTable('#drivers')){
                       $('#drivers').DataTable().destroy();
                    }
                    drivers();
                    $('.edit_driver_modal').modal('hide');
               }
            }
            });
});
$('#add_claim_button').click(function() {
   if(! $("#add_claims_form").valid()){
                return false;
            }
            //on create 
            if( $('#record_id').val() == ''){
                var type=1;
                var record_id= '';
            }
             //updating 
            else{
                var type=2;
                var record_id= $('#record_id').val();
            }
            $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'{{url("/auto/temp_claim_store") }}',
            data: $("#add_claims_form").serialize() + "&type="+ type +'&record_id='+record_id,
            type:'POST',
             dataType: "json",
            success:function(data){
               if(data==1){
                 if($.fn.DataTable.isDataTable('#claims')){
                       $('#claims').DataTable().destroy();
                    }
                    claims();
                    $('#add_claims_div').hide();
               }
            }
            });
});
$('#edit_claims_button').click(function() {
   if(! $("#edit_claims_form").valid()){
                return false;
            }
            $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'{{url("/auto/temp_claims_edit") }}',
            data: $("#edit_claims_form").serialize(),
            type:'POST',
             dataType: "json",
            success:function(data){
               if(data==1){
                 if($.fn.DataTable.isDataTable('#claims')){
                       $('#claims').DataTable().destroy();
                    }
                    claims();
                    $('.edit_claims_modal').modal('hide');
               }
            }
            });
});
$('#add_driver_div_button').click(function() {
$('#add_driver_div').show();
});
$('#add_claims_div_button').click(function() {
$('#add_claims_div').show();
});
$( "#claim_settled" ).on('change',function() {
        if($( "#claim_settled").val() == 'Yes'){
            $( "#claim_amount_div").show();
            $('#claim_amount').val(null);
        }
        else{
            $( "#claim_amount_div").hide();
            $('#claim_amount').val(null);
        }
     });
$( "#edit_claim_settled" ).on('change',function() {
        if($( "#edit_claim_settled").val() == 'Yes'){
            $( "#edit_claim_amount_div").show();
            $('#edit_claim_amount').val(null);
        }
        else{
            $( "#edit_claim_amount_div").hide();
            $('#edit_claim_amount').val(null);
        }
     });
</script>
@endsection