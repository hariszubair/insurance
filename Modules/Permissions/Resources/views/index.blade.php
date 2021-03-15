 
@extends('layouts.app')

@section('content')
<style type="text/css">
.table {
  margin-top: 20px;
  margin-bottom: 20px !important;
}
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">
                 <div class="x_parent_case">
                    <h2>Permissions
                     </h2>
                    <div class="clearfix"></div>
                  </div>
                     <table  id="permissions" class="table-striped table-bordered compact compact table"  cellspacing="0" width="100%" >
                      
                        <thead>
                          <tr>
                          <th style="width: 10%">Sr. #</th>
                          
                          <th style="width: 80%">Name</th>
                          
                      
                        </tr>
                      </thead>
                     
                    </table>
  

@endsection()
@section('footer')
<script >
	 $(document).ready(function() {
    // $('#permissions').DataTable().destroy();
	 	permission();
});
 // function to display all permissions
	 function permission() {
  
     $('#permissions').DataTable({
      dom:"<'row'<'col-sm-7'f><'col-sm-5 text-right'l>><'row'<'col-sm-12'r>>t<<'row'<'col'i><'col text-center'p><'col'>>>",
        processing: true,
        serverSide: true,
         
        ajax: {
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         url:'{{url('/permissions/index') }}',
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
        ],
     	

        
    });
    
}

// End

//click edit button
$(document).on('click','.edit_permission_button',function(){
					$('#edit_permission_name').val($(this).attr('name'))
 					$("#edit_permission_name").attr("rel",$(this).attr('id'));
});

// End



//click delete button
$(document).on('click','.delete_permission_button',function(evt){
          			evt.preventDefault();

       var id=$(this).attr('name'); 
       
    var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: 'permissions/'+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (data){
            if(data==1){
            	
            	$('#permissions').DataTable().ajax.reload();
				
			swal("Permission Deleted!!!", "", "success", {
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
//function to add permission
 $('#add_permission').submit(function(evt){
       evt.preventDefault();
       // var name=$('#permission_name').val(); 
       var postData=$(this).serialize();
          var url=$(this).attr('action');

          $.post(url,postData,function(data){

             if(data==1){
             	$('#add_permission_modal').modal('hide');
            	$('#permissions').DataTable().ajax.reload();
			swal("Permission Created!!!", "", "success", {
                buttons: false,
            timer: 1000,

          });
              }
              else if(data==2){

                swal("Permission Already Exist !!!", "", "error", {
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


//function to edit permission
 $('#edit_permission').submit(function(evt){
       evt.preventDefault();

       var id=$("#edit_permission_name").attr('rel'); 
       var postData=$(this).serialize();
          var url='/permissions/edit/'+id;
          
         
          $.post(url,postData,function(data){
            if(data==1){
            	$('#edit_permission_modal').modal('hide');
            	$('#permissions').DataTable().ajax.reload();
			
			swal("Permission Updated!!!", "", "success", {
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