@extends('layouts.app')

@section('content')
    
            <div class="card">
                <div class="card-header">{{Auth::user()->roles[0]->name}}'s {{ __('Dashboard') }}</div>

                <div class="card-body">

            </div>
        </div>
     
@endsection
