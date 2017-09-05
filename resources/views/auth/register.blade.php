@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginSignup.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
    {{-- SignUp form --}}
     <div class="text-center" style="padding:50px 0">
        <div class="logo">register</div>
        <!-- Main Form -->
            <div class="login-form-container">
                <form id="register-form" class="text-left" method="POST" for="register" action="{{route('register')}}">
                    {{ csrf_field() }}
                    <div class="login-form-main-message"></div>
                    <div class="main-login-form">
                        <div class="login-group">
                            <div class="form-group">
                                <label for="username" class="sr-only">Email address</label>
                                <input type="text" class="form-control" id="reg_username" name="username" placeholder="username" required autofocus value="{{old('username')}}">
                            </div>
                            {{-- If username validation fails --}}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" class="form-control" id="reg_password" name="password" placeholder="password" >
                                {{-- If password validation fails --}}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="sr-only">Password Confirm</label>
                                <input type="password" class="form-control" id="reg_password_confirm" name="password_confirmation" placeholder="confirm password">
                            </div>
                            
                            <div class="form-group">
                                <label for="reg_email" class="sr-only">Email</label>
                                <input type="text" class="form-control" id="reg_email" name="email" placeholder="email" required value="{{old('email')}}">
                            </div>
                            {{-- If Email validation fails --}}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <div class="form-group">
                                <label for="name" class="sr-only">Full Name</label>
                                <input type="text" class="form-control" id="reg_fullname" name="name" placeholder="full name" required value="{{old('name')}}">
                            </div>
                            
                            <div class="form-group login-group-checkbox">
                                <input type="radio" class="" name="gender" id="male" placeholder="username" value="male" {{old('gender') == 'male'? 'checked' : ''}} checked>
                                <label for="male">male</label>
                                
                                <input type="radio" class="" name="gender" id="female" value="female" placeholder="username" {{old('gender') == 'female'? 'checked' : ''}}>
                                <label for="female">female</label>
                            </div>
                            
                            <div class="form-group login-group-checkbox">
                                <input type="checkbox" class="" id="reg_agree" name="agree" {{old('agree')? 'checked' : ''}}>
                                <label for="reg_agree">i agree with <a href="#">terms</a></label>
                            </div>
                            @if ($errors->has('agree'))
                                <span class="help-block">
                                    <strong>{{$errors->first('agree')}}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                    </div>
                    <div class="etc-login-form">
                        <p>already have an account? <a href="{{ route('login') }}">login here</a></p>
                    </div>
                </form>
            </div>
        <!-- end:Main Form -->
        </div>
    </div>
</div>
</div>
@endsection
