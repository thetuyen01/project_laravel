@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                Vui lòng kiểm tra dử liệu !!!
            </div>
        @endif
        <form method="POST" action="{{ route('auth.signup') }}">
            @csrf
            <h1>Signup</h1>
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" name="email" class="form-control" />
                <label class="form-label" for="form1Example1">Email address</label>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- Username input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="name" id="form1Example12" class="form-control" />
                <label class="form-label" for="form1Example12">Username</label>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="password" id="form1Example2" class="form-control" />
                <label class="form-label" for="form1Example2">Password</label>
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                        <label class="form-check-label" for="form1Example3"> Remember me </label>
                    </div>
                </div>

                <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>
    </div>
@endsection
