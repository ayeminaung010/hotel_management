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
                    <form method="POST" action="{{ route('OTPverify') }}">
                        @csrf
                        <div class="form-group">
                            <label>Enter OTP</label>
                            <input class="au-input au-input--full" type="number" name="OTP" placeholder="Enter OTP ">
                            @error('OTP')
                                <small class=" text-danger">{{ $message  }}</small>
                            @enderror
                        </div>
                        <button class="au-btn au-btn--block au-btn--green m-b-20 mt-3" type="submit">Verify OTP</button>

                    </form>
                    <div class=" text-end">
                        <form action="{{ route('OTPSendAgain') }}" method="POST">
                            @csrf
                            <button type="submit" class=" btn btn-dark">Send OTP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
