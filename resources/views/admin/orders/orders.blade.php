@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid mt-5" style="min-height: 100vh;">
        <div class="row">
            <div class="col-3">
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
            <div class="col-9">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>User</th>
                            <th scope="col">Phone number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Note</th>
                            <th scope="col">Total</th>
                            <th scope="col">Condition</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice as $index => $item)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->notes }}</td>
                                <td>{{ $item->total_amount }}</td>
                                <td>
                                    <form action="{{ route('admin.invoice.editInvoice', ['id' => $item->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="condition" id="">
                                            @foreach ($conditions as $index => $cond)
                                                @if ($index == $item->condition)
                                                    <option value="{{ $index }}" selected>{{ $cond }}
                                                    </option>
                                                @else
                                                    <option value="{{ $index }}">
                                                        {{ $cond }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <button class="btn btn-primary mt-2">Cập nhật</button>
                                    </form>
                                </td>
                                <td>{{ $item->updated_at }}</td>
                                <td><button type="submit">Sửa</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
