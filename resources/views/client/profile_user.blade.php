@extends('layouts.app')
@section('content')
    <div class="mt-5">
        <section class="vh-90" style="background-color: #f4f5f7;">
            <div class="container py-5 h-75">
                <form action="{{ route('updateProdile') }}" method="POST">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    @method('PUT')
                    @csrf
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col col-lg-6 mb-4 mb-lg-0">
                            <div class="card mb-3" style="border-radius: .5rem;">
                                <div class="row g-0">
                                    <div class="col-md-4 gradient-custom text-center text-white"
                                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                            alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                        <h5>Marie Horwitz</h5>
                                        <p>Web Designer</p>
                                        <i class="far fa-edit mb-5"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h6>Information</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Email</h6>
                                                    <input type="text" readonly value="{{ $user->email }}"
                                                        name="email" class="form-control myInput" />
                                                    @error('email')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Fullname</h6>
                                                    <input type="text" readonly value="{{ $user->name }}"
                                                        name="name" class="form-control myInput" />
                                                    @error('name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <button onclick="removeReadonly()" type="button"
                                                        class="btn btn-primary removeReadonlyButton">Update</button>
                                                </div>
                                            </div>
                                            <h6>Update password</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="row pt-1">
                                                <div class="col-12 mb-3">
                                                    <div class="form-outline" data-mdb-input-init>
                                                        <input type="password" id="typeText" name="crpassword"
                                                            class="form-control" />
                                                        <label class="form-label" for="typeText">Current Password</label>
                                                    </div>
                                                    @if (session('message'))
                                                        <p class="text-danger">
                                                            {{ session('message') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <div class="form-outline" data-mdb-input-init>
                                                        <input type="password" id="typeText" name="password"
                                                            class="form-control" />
                                                        <label class="form-label" for="typeText">New Password</label>
                                                    </div>
                                                    @error('password')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <div class="form-outline" data-mdb-input-init>
                                                        <input type="password" id="typeText" name="cfpassword"
                                                            class="form-control" />
                                                        <label class="form-label" for="typeText">Confirm Password</label>
                                                    </div>
                                                    @if (session('cfpassword'))
                                                        <p class="text-danger">
                                                            {{ session('cfpassword') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
<script>
    // Hàm để xóa thuộc tính 'readonly'
    function removeReadonly() {
        // Lấy tất cả các đối tượng có class 'myInput'
        var inputElements = document.querySelectorAll('.myInput');

        // Duyệt qua từng đối tượng và xóa thuộc tính 'readonly'
        inputElements.forEach(function(inputElement) {
            inputElement.removeAttribute('readonly');
        });
    }
</script>
