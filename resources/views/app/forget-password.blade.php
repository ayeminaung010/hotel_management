@extends('app.master')

@section('content')
<div class="page-content--bge5">
    <div class="container">
        <div class="login-wrap">

            <div class="login-content">
                @if(session('notFound'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('notFound') }}</strong>
                        <button type="button" class="btn-close align-middle" data-bs-dismiss="alert" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
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
                <div class="reset-form">
                    <form method="POST" action="{{ route('OTPRequest') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                            @error('email')
                                <small class=" text-danger">{{ $message  }}</small>
                            @enderror
                        </div>
                        <button class="au-btn au-btn--block au-btn--green m-b-20 mt-3" type="submit">Send OTP</button>
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
