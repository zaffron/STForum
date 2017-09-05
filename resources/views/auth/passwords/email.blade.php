@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loginSignup.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row">

        <!-- FORGOT PASSWORD FORM -->
        <div class="text-center" style="padding:50px 0">
            <div class="logo">forgot password</div>
            <!-- Main Form -->
            <div class="login-form-container">
                {{-- Session status --}}
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form id="forgot-password-form" class="text-center" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="etc-login-form">
                        <p>When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
                    </div>
                    <div class="login-form-main-message"></div>
                    <div class="main-login-form">
                        <div class="login-group">
                            <div class="form-group">
                                <label for="fp_email" class="sr-only">Email address</label>
                                <input type="text" class="form-control" id="fp_email" name="email" placeholder="email address" style="border-bottom:5px solid #EFEFEF;">
                            </div>
                        </div>
                        <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                    </div>
                    {{-- error --}}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <div class="etc-login-form">
                        <p>already have an account? <a href="#">login here</a></p>
                        <p>new user? <a href="{{ route('register') }}">create new account</a></p>
                    </div>
                </form>
            </div>
            <!-- end:Main Form -->
        </div>
    </div>
</div>


@endsection
