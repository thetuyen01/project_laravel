@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid mt-5" style="min-height: 100vh;">
        <div class="row">
            <div class="col-3">
                <form style="width: 22rem;" action="{{ route('admin.add.blogImage') }}" method="POST"
                    enctype="multipart/form-data">
                    <h1>Thêm ảnh blog </h1>
                    @csrf
                    <!-- category name input -->
                    <div data-mdb-input-init class=" mb-4">
                        <label class="form-label">Loại Ảnh</label>
                        <select name="type" class="form-select" aria-label="Default select example">
                            <option selected value="1">Carousel</option>
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
            <div class="col-9">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($image_carousel as $index => $item)
                            <tr>
                                <th scope="row">{{ $index }}</th>
                                <td>
                                    <img height="100px" width="100px" src="{{ asset('storage/images/' . $item->path) }}"
                                        alt="">
                                </td>
                                <td>
                                    <a class="btn btn-primary mb-2"
                                        href="{{ route('admin.edit.blogImage', ['id' => $item->id]) }}">Edit</a>
                                    <form action="{{ route('admin.edit.deleteimage', ['id' => $item->id]) }}"
                                        method="POST">
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
