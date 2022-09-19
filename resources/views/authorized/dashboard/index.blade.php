@extends('layouts.app')

@section('content')
    
<div class="card">
    <h5 class="card-header">{{ __('Dashboard') }} {{rand(1,3)}}</h5>
    <div class="card-body">
        <h5 class="card-title">Welcome <span class="badge bg-success">{{Auth::user()->name}}</span></h5>
        <p class="card-text">You're logged in as {{ \App\Models\Role::roles(Auth::user()->role) }}!</p>
        
    </div>
</div>



@endsection