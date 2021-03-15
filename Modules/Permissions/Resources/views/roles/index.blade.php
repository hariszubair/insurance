 
@extends('layouts.app')

@section('content')
<style type="text/css">
.table {
  margin-top: 20px;
  margin-bottom: 20px !important;
}
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">

                          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_parent_case">
                    <h2>Roles
                     
                    	<button class="btn btn-success" data-toggle="modal" data-target="#add_role_modal"><i class="fas fa-plus"  ></i></button></h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

    
                     <table  id="roles" class="table-striped table-bordered compact compact table"  cellspacing="0" width="100%" >
                      
                        <thead>
                          <tr>
                          <th style="width: 10%">Sr. #</th>
                          
                          <th style="width: 80%">Name</th>
                          
                          <th>Action</th>
                      
                        </tr>
                      </thead>
                     
                    </table>
  
                  </div>
                </div>
              </div>

<!-- 
//****************************
*****************
Modal for Add Role
 -->
 <div class="modal fade" id="add_role_modal">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div id="case_registration">
                  <!-- Modal Header -->
                  <div class="modal-header">
                  <h4 class="modal-title">Add a Role</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                   {!! Form::open(['method'=>'POST','route'=>'add.role','id'=>'add_role'])  !!}
                     @csrf
                  <!-- Modal body -->
                  <div class="modal-body">
                  	
                   

                            <div class="form-group row">
                           
                             <label class="col-sm-3 col-form-label"  for="diary" >Name</label>
                             <div class="col-md-9 col-sm-9 col-xs-12">
                                <input id="role_name" class="form-control" name="role_name" autofocus   autocomplete="off" required>

                               
                            </div>
                           
                            
                        </div>
                      


                  </div>
                   <div class="modal-footer">
      
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
                 
                  {!! Form::close()  !!}
                  </div>
                  </div>
                  </div>
					</div>
<!-- 
//****************************
*****************
Modal for Edit Role
 -->
               <div class="modal fade" id="edit_role_modal">
                  <div class="modal-dialog">
                  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       {!! Form::open(['method'=>'POST','id'=>'edit_role'])  !!}
                     @csrf
      <div class="modal-body">
         

                            <div class="form-group row">
                           
                             <label class="col-sm-3 col-form-label"  for="diary" >Name</label>
                             <div class="col-md-9 col-sm-9 col-xs-12">
                                <input id="edit_role_name" class="form-control" name="edit_role_name"  autofocus  autocomplete="off" required>

                               
                            </div>
                           
                            
                        </div>
                    
      </div>
      <div class="modal-footer">
       	
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection()
@section('footer')
<script >
	 $(document).ready(function() {
     
	 	roles();
});
    /**
     * function to display all Roles
     */

	 function roles() {
  
     $('#roles').DataTable({
      dom:"<'row'<'col-sm-7'f><'col-sm-5 text-right'l>><'row'<'col-sm-12'r>>t<<'row'<'col'i><'col text-center'p><'col'>>>",
        processing: true,
        serverSide: true,
         
        ajax: {
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         url:'{{url('/roles/index')}}' ,
           method: 'Post',
           
},

        // ajax: {
        //     url:'/show/'+id,  
        //   },
        columns: [
       { "data": null,"sortable": false, 
       render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;
                }  
    },
  
      { "data": 'name','name':'name', searchable: true},     
       { "data": 'action','name':'action', searchable: true},
        ],
     	

        
    });
    
}

// End
    /**
     * click edit button
     */

$(document).on('click','.edit_role_button',function(){
					$('#edit_role_name').val($(this).attr('name'))
 					$("#edit_role_name").attr("rel",$(this).attr('id'));
});

// End



  /**
     * click delete button
     */

$(document).on('click','.delete_role_button',function(evt){
          			evt.preventDefault();

       var id=$(this).attr('name'); 
       
    var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "{{url('/roles/') }}"+'/'+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (data){
            if(data==1){
            	
            	$('#roles').DataTable().ajax.reload();
				
			swal("Role Deleted!!!", "", "success", {
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
        }
    });

 					
 				});



 /**
     * function to add role
     */


 $('#add_role').submit(function(evt){
       evt.preventDefault();
       // var name=$('#permission_name').val(); 
       var postData=$(this).serialize();
          var url=$(this).attr('action');

          $.post(url,postData,function(data){

             if(data==1){
              $('#add_role_modal').modal('hide');
              $('#roles').DataTable().ajax.reload();
      swal("Role Created!!!", "", "success", {
                buttons: false,
            timer: 1000,

          });
              }
              else if(data==2){

                swal("Role Already Exist !!!", "", "error", {
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
 
 //End

 /**
     * function to edit role
     */

 $('#edit_role').submit(function(evt){
       evt.preventDefault();

       var id=$("#edit_role_name").attr('rel'); 
       var postData=$(this).serialize();
          var url="{{url('/roles/edit') }}"+'/'+id;
         
          $.post(url,postData,function(data){
            if(data==1){
              $('#edit_role_modal').modal('hide');
              $('#roles').DataTable().ajax.reload();
      
      swal("Role Updated!!!", "", "success", {
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
 
 //End
</script>



@endsection()