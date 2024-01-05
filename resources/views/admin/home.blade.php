@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        xin chào <h1>{{ Auth::user()->name }}</h1>
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit">Đăng Xuất</button>
        </form>
    </div>
@endsection
