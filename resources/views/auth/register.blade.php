@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8">
        
    </div>
    <div class="col-sm-4">
        <form method="post" action="{{ route('register') }}"  class="register-bg">
            @csrf
            
            <h1 class="h3 mb-3 fw-normal">Register</h1>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="John Doe" required="required" autofocus>
                <label for="name">Full Name</label>
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
                <label for="floatingEmail">Email address</label>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                <label for="floatingName">Username</label>
                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>
            
            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                <label for="floatingPassword">Password</label>
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone" required="required">
                <label for="phone">Phone</label>
                @if ($errors->has('phone'))
                    <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                @endif
            </div>
            @if($adminExists)
            <div class="form-check form-switch">
                <input class="form-check-input" type="radio"  value="{{\App\Models\Role::ROLE_CUSTOMER}}"  name="role" checked>
                <label class="form-check-label" for="role">Regsiter as Customer</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="radio" value="{{\App\Models\Role::ROLE_BUSINESS}}"  name="role" >
                <label class="form-check-label" for="role">Regsiter as Business</label>
            </div>
            @else
            <p class="text-success">Note: Registering as an Admin</p>
            <input type="hidden" name="role" value="{{\App\Models\Role::ROLE_ADMIN}}" />
            @endif
            <br /><br />
            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            
        
        </form>
    </div>
</div>
@endsection
