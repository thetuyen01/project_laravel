@extends('admin.layouts.admin')

@section('content')
    <div class="container mt-5" style="min-height: 100vh;">
        <div class="row">
            <div class="col-4">
                <form style="width: 22rem;" action="{{ route('admin.update_user', ['id' => $user->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    <h1>Thêm user</h1>
                    @csrf
                    @method('PUT')
                    <!-- Email input -->
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control rounded-pill mb-4"
                        placeholder="Email address" />
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <!-- Username input -->
                    <input type="text" name="name" value="{{ $user->name }}" id="form1Example12"
                        class="form-control rounded-pill mb-4" placeholder="Username" />
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
                    <input type="password" name="cfpassword" id="form1Example" class="form-control rounded-pill mb-4"
                        placeholder="ConFirmPassword" />
                    @if (session('cfpassword'))
                        <p class="text-danger">
                            {{ session('cfpassword') }}
                        </p>
                    @endif
                    <div class="mb-4">
                        <label for="" class="form-label">Dignity</label>
                        <select class="form-select rounded-pill" name="is_admin" value="{{ $user->is_admin }}"
                            aria-label="Default select example">
                            <option value="1" selected>Admin</option>
                            <option value="0">User</option>
                        </select>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" name="active" value="1"
                            {{ $user->active == 1 ? 'checked' : null }} type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Active
                        </label>
                    </div>
                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Thêm</button>
                </form>
            </div>
        </div>
    @endsection
