@extends('layouts.app')

@section('content')
    <div class="container h-75" style="margin-top: 100px">
        <div class="row">
            <div class="col-4">
                <form style="width: 22rem;" action="{{ route('admin.addBrand') }}" method="POST">
                    <h1>Thêm nhà sản xuất</h1>
                    @csrf
                    <!-- category name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="name" id="form5Example1" class="form-control" />
                        <label class="form-label" for="form5Example1">Nhập nhà sản xuất</label>
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
                            <th scope="col">Tên</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $index => $item)
                            <tr>
                                <th scope="row">{{ $index }}</th>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="{{ route('showFormedit', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Edit</a>
                                        </div>
                                        <div class="col-3">
                                            <form action="{{ route('admin.deleteBrand', ['id' => $item->id]) }}"
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
