@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form class="container m-5" action="{{ route('auth.sentoemail') }}" method="POST">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Vui lòng kiểm tra dử liệu !!!
                </div>
            @endif
            <h1 class="text-center">Enter email to check</h1>
            @csrf
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" name="email" id="form1Example1" class="form-control" />
                <label class="form-label" for="form1Example1">Email address</label>
            </div>
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Post</button>
        </form>
    </div>
@endsection
