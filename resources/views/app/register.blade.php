@extends('app.master')

@section('content')
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="{{ asset("admin/images/icon/logo-blue.png") }}" alt="CoolAdmin">
                        </a>
                    </div>
                    <div class="register-form">
                        <form action="{{ route('register.user') }}" method="post">
                            @csrf
                            <div class="form-group my-2">
                                <label>Username</label>
                                <input class="au-input au-input--full" type="text" name="username" value="{{ old('username') }}" placeholder="Username">
                                @error('username')
                                 <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                @error('email')
                                 <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password"  value="{{ old('password') }}" placeholder="Password">
                                @error('password')
                                 <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label>Confirm Password</label>
                                <input class="au-input au-input--full" type="password" name="confirm_password" value="{{ old('confirm_password') }}" placeholder="Password">
                                @error('confirm_password')
                                 <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label>Gender</label>
                                <select name="gender" class="form-control" id="">
                                    <option value="" >Select Gender</option>
                                    <option value="male" @if(old('gender') === "male") selected @endif>Male</option>
                                    <option value="female" @if(old('gender') === "female") selected @endif>Female</option>
                                    <option value="lgbt" @if(old('gender') === "lgbt") selected @endif>LGBT</option>
                                </select>
                                @error('gender')
                                 <small class=" text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                            <div class="login-checkbox my-2">
                                <label>
                                    <input type="checkbox" name="aggree"> Agree the terms and policy
                                </label>
                                <br>
                                <div class="">
                                    @error('aggree')
                                     <small class=" text-danger">{{ $message  }}</small>
                                    @enderror
                                </div>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                            <div class="social-login-content">
                                <div class="social-button">
                                    <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                    <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                                </div>
                            </div>
                        </form>
                        <div class="register-link">
                            <p>
                                Already have account?
                                <a href="{{ url('/login') }}">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
