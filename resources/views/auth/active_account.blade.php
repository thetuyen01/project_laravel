@extends('layouts.app')
@section('title')
    Check code
@endsection
@section('content')
    <div class="container" style="margin-top: 100px">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('auth.active') }}" method="POST">
            <h1 class="text-center">Enter Code to check active account</h1>
            @csrf
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="email" readonly value="{{ $email }}" id="form1Example1"
                    class="form-control" />
            </div>
            <!-- code input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="code" id="form1Example1" class="form-control" />
                <label class="form-label" for="form1Example1">Code address</label>
            </div>
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>
    </div>
@endsection
