@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 100px">
        <form style="width: 22rem;" action="{{ route('admin.addblogImage') }}" method="POST" enctype="multipart/form-data">
            <h1>Thêm ảnh blog </h1>
            @csrf
            <!-- category name input -->
            <div data-mdb-input-init class=" mb-4">
                <label class="form-label">Loại Ảnh</label>
                <select name="type" class="form-select" aria-label="Default select example">
                    <option selected value="1">Carousel</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <!-- patfile name input -->
            <div data-mdb-input-init class=" mb-4">
                <label class="form-label" for="customFile">Chọn ảnh blog</label>
                <input type="file" name="path" class="form-control" id="customFile" />
            </div>
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Subscribe</button>
        </form>
    </div>
@endsection
