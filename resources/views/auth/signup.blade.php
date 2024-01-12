@extends('layouts.app')
@section('content')
    <div class="container mt-5 h-75">
        @if ($errors->any())
            <div class="alert alert-danger">
                Vui lòng kiểm tra dử liệu !!!
            </div>
        @endif
        <h1 class="text-center mb-4 text-danger" style="margin-top:70px ">Signup</h1>
        <div class="container d-flex justify-content-center align-items-center pb-5">
            <form method="POST" action="{{ route('auth.signup') }}" class="shadow-5-strong p-5 border border-0 rounded-5">
                @csrf

                <!-- Email input -->
                <input type="email" name="email" class="form-control rounded-pill mb-4" placeholder="Email address" />
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <!-- Username input -->
                <input type="text" name="name" id="form1Example12" class="form-control rounded-pill mb-4"
                    placeholder="Username" />
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <!-- Password input -->
                <input type="password" name="password" id="form1Example2" class="form-control rounded-pill mb-4"
                    placeholder="Password" />
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <!-- PasswordCF input -->
                <input type="password" name="cfpassword" id="form1Example2" class="form-control rounded-pill mb-4"
                    placeholder="ConFirmPassword" />
                @if (session('cfpassword'))
                    <p class="text-danger">
                        {{ session('cfpassword') }}
                    </p>
                @endif
                <!-- 2 column grid layout for inline styling -->

                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-warning btn-block rounded-pill">Sign in</button>
            </form>
        </div>
    </div>
@endsection
