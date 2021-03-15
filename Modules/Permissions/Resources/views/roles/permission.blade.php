 
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
                  {!! Form::open(['method'=>'POST','route'=>'role.asign_permission','id'=>'role_asign_permission']) !!}
                        @csrf
                  <div class="x_title">
                       <h3>Select Roles:</h3>
                        <div class="col-md-4" style="padding-left: 0">
                    	<select class=" js-example-basic-single" name="role" id="role" required>
                       <option value="{{old('role')}}" selected="">
                        @if(old('role'))
                        {{old('role_name')}}
                        @else
                       --Select Role--</option> @endif 
                        @foreach($roles as $role)
                       <option value="{{$role->id}}">{{$role->name}}</option> 
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
    if($('#role').val()!=""){
    roles_permissions();
  }
});


    /**
     * On selecting a role
     */
  $('#role').on('change', function(){
    $('#permissions').DataTable().search('').draw();  
    roles_permissions();
      
    });


    /**
     * get all the permissions of a specific role
     */
function roles_permissions(){
  
 var id=$('#role').val(); 
       var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "{{url('roles/getPermissions') }}"+'/'+id,
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
     * Assigning permissions to a role
     */
  $('#role_asign_permission').submit(function(evt){
       evt.preventDefault();
       // var name=$('#permission_name').val(); 
        $('#permissions').DataTable().search('').draw();
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
          var allInputs = $( "form#role_asign_permission :input[type='checkbox']" );
          allInputs.prop('checked', true);
          }); 
/**
     * Un check all
     */
   $('#none').click(function(){
          var allInputs = $( "form#role_asign_permission :input[type='checkbox']" );
          allInputs.prop('checked', false);
          
      });
 
</script>

  @endsection()