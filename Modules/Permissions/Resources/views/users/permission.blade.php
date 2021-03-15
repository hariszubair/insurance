 
@extends('layouts.app')

@section('content')

<style type="text/css">
  .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 15px !important;
  } 
  .table {
  margin-top: 20px;
  margin-bottom: 20px !important;
}
</style>
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">

<meta name="csrf-token" content="{{ csrf_token() }}">

                          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  {!! Form::open(['method'=>'POST','route'=>'user.asign_permission','id'=>'user_asign_permission']) !!}
                        @csrf
                  <div class="x_title">
                     <h3>Select User:</h3>
                        <div class="col-md-4" style="padding-left: 0">
                    	<select class=" js-example-basic-single" name="user" id="user" required="">
                       <option value="{{old('user')}}" selected="">
                        @if(old('user'))
                        {{old('user_email')}}
                        @else
                       --Select User--</option> @endif 
                        @foreach($users as $user)
                       <option value="{{$user->id}}">{{$user->email}}</option> 
                        @endforeach
                      </select>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                   
                     <table  id="permissions" class="display table table-striped table-bordered compact"  cellspacing="0" width="100%" >
                      
                        <thead>
                          <tr>
                          <th style="width: 10%">Sr. #</th>
                          
                          <th style="width: 80%">Name</th>
                          
                          <th>Action</th>
                      
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($permissions as $key=>$permission)
                        <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$permission->name}}</td>
                        <td><input type="checkbox" id="{{$permission->id}}" name="{{$permission->id}}"></td>
                        </tr>
                        @endforeach
                      </tbody>
                     
                    </table>
                     <div class="form-group" style="float: right;">
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                          <button  type="submit" class="btn btn-primary" style="padding: 4px 15px 3px 15px">
                                   Submitt
                                </button>
                          <button type="button" id="all" style="float: left;" class="btn btn-primary" parent_case="Check All" >
                                  <i class="far fa-check-square"></i>
                                </button>
                                <button type="button" id="none" style="float: left;" class="btn btn-primary" parent_case="Un-Check All" >
                                  <i class="far fa-square"></i>
                                </button>
                        </div>
                      </div>
                    </div>
                  {!! Form::close() !!}
                </div>
              </div>

  @endsection()


  @section('footer')
    <script src="{{asset('js/select2.min.js')}}"></script>

<script>
   $(document).ready(function() {
   $('.js-example-basic-single').select2();

     $('#permissions').dataTable( {
      "searching":false,
    "bPaginate": false
  } );
    if($('#user').val()!=""){
    users_permission();
  }
});

    /**
     * on in put user all the permissions will be fetched and the permission via roles will be disabled
     */
  $('#user').on('change', function(){
    $('#permissions').DataTable().search('').draw();  
    users_permission();
    disable_permissions();
      
    });


   /**
     * Get all the permissions of a user
     */
function users_permission(){
  
 var id=$('#user').val(); 
       var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "{{url('permissions/users') }}"+'/'+id,
        type: 'post',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (data){
           var jsonData = JSON.parse(data);
           // alert(jsonData[i].name);
           $('input:checkbox').prop('checked', false);
      for (var i = 0; i < jsonData.length; i++) {
    var counter = jsonData[i];
    var id=counter.id
    
    $('#'+id).prop('checked', true);
   
        }
        }
      });
  }


   /**
     * Disable all the permissions assigned via roles
     */
  function disable_permissions(){
   var id=$('#user').val(); 
       var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
    url: "{{url('permissions/users/disabled') }}"+'/'+id,
        type: 'post',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (data){
           var jsonData = JSON.parse(data);
           // alert(jsonData[i].name);
           $('input:checkbox').prop('disabled', false);
      for (var i = 0; i < jsonData.length; i++) {
    var counter = jsonData[i];
    var id=counter.id
    $('#'+id).prop('disabled', true);
   
        }
        }
      });


  }



   /**
     * Assign permissions to users
     */
  $('#user_asign_permission').submit(function(evt){
       evt.preventDefault();
      
        evt.preventDefault();
        $('#permissions').DataTable().search('').draw();
       // var name=$('#permission_name').val(); 
       var postData=$(this).serialize();
          var url=$(this).attr('action');

          $.post(url,postData,function(data){

             if(data){
      swal("Permission Asigned!!!", "", "success", {
                buttons: false,
            timer: 1000,

          });
              }
            
              else{

                swal("Failed !!!", "", "error", {
          buttons: false,
            timer: 1000,

          });
              }

             });



  });
 /**
     * check all
     */
   $('#all').click(function(){
          var allInputs = $( "form#user_asign_permission :input[type='checkbox']:enabled" );
          allInputs.prop('checked', true);
          }); 
/**
     * Un check all
     */
   $('#none').click(function(){
          var allInputs = $( "form#user_asign_permission :input[type='checkbox']:enabled" );
          allInputs.prop('checked', false);
          
      });
 
</script>

  @endsection()