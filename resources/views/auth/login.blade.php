@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginSignup.css') }}">
@endsection
@section('content')
<div class="container">
{{-- Login form --}}
<div class="text-center" style="padding:50px 0">
    <div class="logo">login</div>
    <!-- Main Form -->
    <div class="login-form-container">
        <form id="login-form" class="text-left" role="form" method="POST" action="{{route('login')}}">
            {{csrf_field()}}
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="lg_username" class="sr-only">Username</label>
                        <input type="text" class="form-control" id="lg_username" name="login" placeholder="username or email" value="{{old('email')}}" required autofocus>
                    </div>
                    {{-- If email is not valid or any error occurs --}}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                    <div class="form-group">
                        <label for="lg_password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="lg_password" name="password" placeholder="password" value="{{old('password')}}" required>
                    </div>
                    {{-- If password validation fails --}}
                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                    <div class="form-group login-group-checkbox">
                        <input type="checkbox" id="lg_remember" name="lg_remember"{{old('remember')? 'checked':''}}>
                        <label for="lg_remember">remember</label>
                    </div>
                </div>
                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="etc-login-form">
                <p>forgot your password? <a href="{{route('password.request')}}">click here</a></p>
                <p>new user? <a href="{{route('register')}}">create new account</a></p>
            </div>
        </form>
    </div>
    <!-- e
    
</div>
@endsection
