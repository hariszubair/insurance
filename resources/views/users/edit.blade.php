 
@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style type="text/css">
    .is-invalid{
        background-position-y: center
    }
</style> 
                             
          @if (\Session::has('success'))
          <div class="alert alert-success" >
          <ul>
          <li>{!! \Session::get('success') !!}</li>
          </ul>
          </div>
          @endif
          @if (\Session::has('error'))
          <div class="alert alert-danger" >
          <ul>
          <li>{!! \Session::get('error') !!}</li>
          </ul>
          </div>
          @endif
           @if (\Session::has('message'))
          <div class="alert alert-warning" >
          <p>{!! \Session::get('message') !!}</p>
        

          </div>
          @endif
 {!! Form::open(['method'=>'PATCH','route'=>['users.update', $user->id],'id'=>'update_form']) !!}
                 
                        @csrf
                            <div class="row g-gs">
                              <div class="col-md-6">
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    User Name
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                     <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus  placeholder="Enter your name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Email Address
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-mail-line color-primary"></i>
                                    </div>
                                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') ?? $user->email }}" required autocomplete="email"  placeholder="Enter your email address" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                                </div>
                            </div>
                          </div>
                             
                           
                            <div class="col-md-6">

                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Register As
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-account-box-fill"></i>
                                    </div>
                                  <select id="role_id" class="form-control @error('role_id') is-invalid @enderror" name="role_id"  required>
                                    <option  value="">Select role</option>
                                    @foreach($roles as $role)
                                     <option {{ $user->roles->first()->id == $role->id ? 'selected' :'' }} value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                   
                                </select>

                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                                </div>
                            </div>
                          </div>
                          </div>

                            <!-- Submit -->
                            <button class="btn btn-primary  mt-4 mb-3">
                                Update
                            </button>
                          {!! Form::close() !!}

@endsection()
@section('footer')


@endsection()