@extends('layouts.app')

@section('content')
    <div class="container h-75" style="margin-top: 100px">
        <form style="width: 22rem;" action="{{ route('admin.updateBrand', ['id' => $brand->id]) }}" method="POST">
            <h1>Edit nhà sản xuất</h1>
            @csrf
            @method('PUT')
            <!-- category name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="name" value="{{ $brand->name }}" id="form5Example1" class="form-control" />
                <label class="form-label" for="form5Example1">Nhập nhà sản xuất</label>
            </div>
            <input type="hidden" name="brand_id" value="{{ $brand->id }}" id="form5Example1" class="form-control" />
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Subscribe</button>
        </form>
    </div>
@endsection
