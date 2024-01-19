@extends('admin.layouts.admin')

@section('content')
    <div class="container mt-5" style="min-height: 100vh;">
        <div class="row">
            <div class="col-4">
                <form style="width: 22rem;" action="{{ route('admin.add_user') }}" method="POST" enctype="multipart/form-data">
                    <h1>Thêm user</h1>
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
                    <input type="password" name="cfpassword" id="form1Example" class="form-control rounded-pill mb-4"
                        placeholder="ConFirmPassword" />
                    @if (session('cfpassword'))
                        <p class="text-danger">
                            {{ session('cfpassword') }}
                        </p>
                    @endif
                    <div class="mb-4">
                        <label for="" class="form-label">Dignity</label>
                        <select class="form-select rounded-pill" name="is_admin" aria-label="Default select example">
                            <option value="1" selected>Admin</option>
                            <option value="0">User</option>
                        </select>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" name="active" value="1" type="checkbox" value=""
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Active
                        </label>
                    </div>
                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Thêm</button>
                </form>
            </div>
            <div class="col-8">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Email</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Is admin</th>
                            <th scope="col">Active</th>
                            <th scope="col">Rest code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $item)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->is_admin }}</td>
                                <td>{{ $item->active }}</td>
                                <td>{{ $item->reset_code }}</td>
                                <td>
                                    <a class="btn btn-primary mb-2"
                                        href="{{ route('admin.edit_user', ['id' => $item->id]) }}">Edit</a>
                                    <form action="{{ route('admin.delete_user', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
