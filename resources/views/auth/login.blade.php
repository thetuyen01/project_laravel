@extends('layouts.app')
@if (session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif
@section('content')
<h1 class="text-center mb-4 text-danger" style="margin-top:100px ">Login</h1>
    <div class="container d-flex justify-content-center align-items-center pb-5" >

        <form method="POST" action="{{ route('auth.login') }}" class="shadow-5-strong p-5 border border-0 rounded-5">

            @csrf
            <!-- Email input -->
                <input type="email" name="email" id="form1Example1" class="form-control rounded-pill mb-4" placeholder="Email" />

            <!-- Password input -->

                <input type="password" name="password" id="form1Example2" class="form-control rounded-pill mb-4" placeholder="Password"/>


            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                        <label class="form-check-label " for="form1Example3"> Remember me </label>
                    </div>
                </div>

                <div class="col">
                    <!-- Simple link -->
<<<<<<< HEAD
                    <a href="{{ route('formForget') }}">Forgot password?</a>
=======
                    <a href="changepw">Forgot password?</a>
>>>>>>> 554b339cf0c93875375d4725661d62dd0b8ffc4e
                </div>
            </div>

            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-warning rounded-pill btn-block">Sign in</button>
        </form>
    </div>
@endsection
