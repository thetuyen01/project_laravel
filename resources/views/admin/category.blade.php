@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 100px">
        <form style="width: 22rem;" action="{{ route('admin.addcategory') }}" method="POST" enctype="multipart/form-data">
            <h1>Thêm Danh mục menu</h1>
            @csrf
            <!-- category name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="name" id="form5Example1" class="form-control" />
                <label class="form-label" for="form5Example1">Name</label>
            </div>
            <!-- patfile name input -->
            <div data-mdb-input-init class=" mb-4">
                <label class="form-label" for="customFile">Chọn ảnh menu</label>
                <input type="file" name="path" class="form-control" id="customFile" />
            </div>
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Subscribe</button>
        </form>
    </div>
@endsection
