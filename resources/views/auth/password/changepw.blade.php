@extends('layouts.app')
@if (session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif
@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('auth.changepw') }}">
            <h1 class="mt-5">Change Password</h1>
            @csrf
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="password" id="form1Example2" class="form-control" />
                <label class="form-label" for="form1Example2">Password</label>
            </div>
            {{-- cfpw --}}
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="passwordCF" id="form1Example2" class="form-control" />
                <label class="form-label" for="form1Example2">ConFirmPassword</label>
            </div>
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Change PW</button>
        </form>
    </div>
@endsection
