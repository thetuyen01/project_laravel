@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 100px">
        <form style="width: 22rem;" action="{{ route('admin.updateCategory', ['id' => $category->id]) }}" method="POST"
            enctype="multipart/form-data">
            <h1>Edit Danh mục menu</h1>
            @csrf
            @method('PUT')
            <!-- category name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="name" value="{{ $category->name }}" id="form5Example1" class="form-control" />
                <label class="form-label" for="form5Example1">Name</label>
            </div>
            <div class="mb-4">
                <img height="100px" width="100px" src="{{ asset('storage/images/' . $category->path) }}" alt="">
            </div>
            <!-- patfile name input -->
            <div data-mdb-input-init class=" mb-4">
                <label class="form-label" for="customFile">edit ảnh menu</label>
                <input type="file" name="path" class="form-control" id="customFile" />
            </div>
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Subscribe</button>
        </form>
    </div>
@endsection
