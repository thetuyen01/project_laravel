@extends('layouts.app')
@if (session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('auth.resetPW') }}">
            @csrf
            <!-- Password cũ input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="passwordcu" id="form1Example2" class="form-control" />
                <label class="form-label" for="form1Example2">Nhập mật khẩu cũ</label>
            </div>
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="password" id="form1Example2" class="form-control" />
                <label class="form-label" for="form1Example2">Password</label>
            </div>
            {{-- cfpw --}}
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="passwordCF" id="form1Example2" class="form-control" />
                <label class="form-label" for="form1Example2">Password</label>
            </div>
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Change PW</button>
        </form>
    </div>
@endsection
