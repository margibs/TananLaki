<!-- resources/views/auth/login.blade.php -->
<!-- resources/views/auth/register.blade.php -->
@extends('home.layout')

@section('content')

<style>
    .left{
        box-shadow: 0 0 0 0;
        background-color: transparent;
    }
</style>

 <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
      <!-- LEFT START -->
      <div class="left single">
            <div class="loginWrapper">
                <h2> Login your account </h2>
                <form id="login-form" name="login-form" method="POST" action="{{ url('') }}/login">
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

                <input type="text" placeholder="Username"  id="login-form-username" name="email" value="{{ old('email') }}" />
                <input type="password" placeholder="Password" id="login-form-password" name="password" />
                <input type="checkbox" name="remember" checked> Remember Me
                <a href="{{url('login/facebook')}}" class="link"> <i class="fa fa-facebook-official"></i> Login with facebook </a>
                <input type="submit" id="login-form-submit" name="login-form-submit" value="login" />                 
                </form>
            </div>
      </div>
</div>

@endsection                    