@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('auth.sentoemail') }}" method="POST">
            <h1 class="text-center">Enter email to check</h1>
            @csrf
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" name="email" id="form1Example1" class="form-control" />
                <label class="form-label" for="form1Example1">Email address</label>
            </div>
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>
    </div>
@endsection
