@extends('layouts.app')

@section('content')
<style>

.table {
  margin-top: 20px;
  margin-bottom: 20px !important;
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
    
            <div class="card">
                <div class="card-header">Submitted quotes</div>

                <div class="card-body">
                     <table  id="requests" class="table-striped table-bordered compact compact table"  cellspacing="0" width="100%" >
                      
                        <thead>
                          <tr>
                          <th style="width: 10%">Sr. #</th>
                          
                          <th style="width: 60%">Requested on</th>
                          <th style="width: 30%">Give Quote</th>
                        </tr>
                      </thead>
                     
                    </table>
  
            </div>
        </div>
     
@endsection
@section('footer')
<script type="text/javascript">
     $(document).ready(function() {

    $('#requests').DataTable({
      dom:"<'row '<'col-sm-7'f><'col-sm-5 text-right'l>><'row'<'col-sm-12'r>>t<<'row'<'col'i><'col text-center'p><'col'>>>",
        processing: true,
        serverSide: true,
         
        ajax: {
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         url:'{{url("vendor/auto/ajax_submitted_quote") }}',
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
      { "data": 'request_on','name':'request_on', searchable: true},
      { "data": 'quote','name':'quote', searchable: true},     
        ],
        

        
    });
});
</script>

@endsection