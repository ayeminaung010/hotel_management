@extends('app.master')

@section('content')
<div class="page-content--bge5">
    <div class="container">
        <div class="login-wrap">

            <div class="login-content">
                @if(session('wrongPassword'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('wrongPassword') }}</strong>
                        <button type="button" class="btn-close align-middle" data-bs-dismiss="alert" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                @endif
                @if(session('notFound'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('notFound') }}</strong>
                        <button type="button" class="btn-close align-middle" data-bs-dismiss="alert" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                @endif

                <div class="login-logo">
                    <a href="#">
                        <img src="{{ asset('admin/images/icon/logo-blue.png') }}" alt="CoolAdmin">
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="{{ route('login.user') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                            @error('email')
                             <small class=" text-danger">{{ $message  }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                            @error('password')
                             <small class=" text-danger">{{ $message  }}</small>
                            @enderror
                        </div>
                        <div class="login-checkbox">
                            <label>
                                <input type="checkbox" name="remember">Remember Me
                            </label>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                        <div class="social-login-content">
                            <div class="social-button">
                                <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                            </div>
                        </div>
                    </form>
                    <div class="register-link">
                        <p>
                            Don't you have account?
                            <a href="{{ url('/register') }}">Sign Up Here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
