@extends('layouts.app')

@section('content')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
            <div class="card">
                <div class="card-header">Insurance industries</div>
                <form method="POST" action="{{ route('vendor.insurances') }}" class="login-signup-form" style="padding-top: 
                20px">
                        @csrf
                            <div class="row g-gs">
                 <div class="col-md-12">
                            <div class="form-group" style="display: flex;">
                                <!-- Label -->
                               
                                <div style="width: 40%">
                                    Please select all the insurances your company offer.
                                </div>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                     <select id="insurances"  class="form-control js-example-basic-multiple" name="insurances[]"  required autocomplete="name" autofocus multiple="">
                                        @foreach($insurances as $insurance)
                                        <option value="{{$insurance->id}}">{{$insurance->name}}</option>
                                        @endforeach
                                     </select>
                                </div>
                              </div>
                            </div>
                        </div>
                 <div style="padding-top: 20px">
                    <button type="Submit" class="btn btn-success"> Submit</button>
                        </div>
                        </form>
            </div>
     
@endsection()
  @section('footer')


    <script src="{{asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
          $(document).ready(function() {
   $('.js-example-basic-multiple').select2({
  placeholder: 'Select an option'
});

});
    </script>
@endsection()
