@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    
            <div class="card">
                <div class="card-header">Quotes for Auto</div>

                <div class="card-body">
                     <table  class="table-striped table-bordered compact compact table"  cellspacing="0" width="100%" >
                      
                        <thead>
                          <tr>
                          <th style="width: 10%">Sr. #</th>
                          
                          <th style="width: 25%">Registration #</th>
                          <th style="width: 25%">Insurance Quote</th>
                          <th style="width: 40%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users->quotes as $key=> $quotes)
                          <tr>
                              <td>{{$key +1 }}</td>
                              <td>{{$quotes->auto->reg_no}}</td>
                              <td>{{$quotes->value}}</td>
                              <td><button>Purchase</button></td>
                          </tr>
                          @endforeach
                      </tbody>
                     
                    </table>
  
            </div>
        </div>
     
@endsection
@section('footer')
<script type="text/javascript">
     $(document).ready(function() {
});
</script>

@endsection