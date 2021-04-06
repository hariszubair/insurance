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
                          
                          <th style="width: 30%">Registration #</th>
                          <th style="width: 30%">Entry Date:</th>
                          <th style="width: 20%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users->incomplete_auto_quotes as $key=> $quotes)
                          <tr>
                              <td>{{$key +1 }}</td>
                              <td>{{$quotes->reg_no}}</td>
                              <td>{{\Carbon\Carbon::parse($quotes->created_at)->format('d-m-Y')}}</td>
                              <td>
                              <form action="{{URL('auto/incomplete_quote_submit')}}" method="POST">
                              @csrf
                              <input value="{{$quotes->id}}" type="hidden" name="id">
                              <button>Complete</button>
                              </form>
                              </td>
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