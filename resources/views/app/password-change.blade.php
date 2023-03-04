@extends('app.master')

@section('content')
<div class="page-content--bge5">
    <div class="container">
        <div class="login-wrap">

            <div class="login-content">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                        <button type="button" class="btn-close align-middle" data-bs-dismiss="alert" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
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
                    <form method="POST" action="{{ route('changePassword') }}">
                        @csrf
                        <div class="form-group">
                            <label>New Password</label>
                            <input class="au-input au-input--full" type="password" name="new_password" placeholder="new password">
                            @error('new_password')
                             <small class=" text-danger">{{ $message  }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input class="au-input au-input--full" type="password" name="confirm_password" placeholder="confirm password">
                            @error('confirm_password')
                             <small class=" text-danger">{{ $message  }}</small>
                            @enderror
                        </div>
                        <button class="au-btn au-btn--block au-btn--green m-b-20 mt-3" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
