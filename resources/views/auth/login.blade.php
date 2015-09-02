<!-- resources/views/auth/login.blade.php -->
<!-- resources/views/auth/register.blade.php -->
@extends('home.layout')

@section('content')

<style>
    body{
        background-image: none;
    }
</style>


<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

<div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Login to your Account</div>
<div class="acc_content clearfix">
    <form id="login-form" name="login-form" class="nobottommargin" method="POST" action="{{ url('') }}/login">
   @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! csrf_field() !!}

        <div class="col_full">
            <label for="login-form-username">Email:</label>
            <input type="text" id="login-form-username" name="email" value="{{ old('email') }}" class="form-control" />
        </div>

        <div class="col_full">
            <label for="login-form-password">Password:</label>
            <input type="password" id="login-form-password" name="password" class="form-control" />
        </div>

       <div class="col_full nobottommargin">
            <button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
            <a href="{{url('login/facebook')}}">Login with Facebook</a>
           <!--  <a href="#" class="fright">Forgot Password?</a> -->
        </div>
    </form>
</div>

<div class="acctitle"><i class="acc-closed icon-user4"></i><i class="acc-open icon-ok-sign"></i>New Signup? Register for an Account</div>
<div class="acc_content clearfix">
    <form id="register-form" name="register-form" class="nobottommargin" method="POST" action="{{ url('') }}/register">
        <div class="col_full">
            <label for="register-form-name">Name:</label>
            <input type="text" id="register-form-name" name="name" value="{{ old('name') }}"  class="form-control" />
        </div>

        <div class="col_full">
            <label for="register-form-email">Email Address:</label>
            <input type="text" id="register-form-email" name="email" value="{{ old('email') }}" class="form-control" />
        </div>


        <div class="col_full">
            <label for="register-form-password">Choose Password:</label>
            <input type="password" id="register-form-password" name="password" class="form-control" />
        </div>

        <div class="col_full">
            <label for="register-form-repassword">Re-enter Password:</label>
            <input type="password" id="register-form-repassword" name="password_confirmation" class="form-control" />
        </div>

        <div class="col_full nobottommargin">
            <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
        </div>
    </form>
</div>

</div>

@endsection                    