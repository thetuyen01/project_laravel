@extends('admin.layouts.admin')

@section('content')
    <div class="container mt-5" style="min-height: 100vh;">
        <div class="row">
            <div class="col-4">
                <form style="width: 22rem;" action="{{ route('admin.category.add') }}" method="POST"
                    enctype="multipart/form-data">
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
            <div class="col-8">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Image</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorys as $index => $item)
                            <tr>
                                <th scope="row">{{ $index }}</th>
                                <td>
                                    <img height="100px" width="100px" src="{{ asset('storage/images/' . $item->path) }}"
                                        alt="">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="{{ route('admin.category.formeditcategory', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Edit</a>
                                        </div>
                                        <div class="col-3">
                                            <form action="{{ route('admin.category.delete', ['id' => $item->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
