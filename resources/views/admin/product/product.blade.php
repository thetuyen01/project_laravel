@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid mt-5" style="min-height: 100vh;">
        <div class="row">
            <div class="col-3">
                <form style="width: 22rem;" action="{{ route('admin.product.add') }}" method="POST"
                    enctype="multipart/form-data">
                    <h1>Thêm Sản phẩm</h1>
                    @csrf
                    <!-- category name input -->
                    <label class="form-label" for="form5Example1">Chọn danh mục sản phẩm</label>
                    <select class="form-select mb-4" name="category_id" aria-label="Default select example">
                        @foreach ($categorys as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label class="form-label" for="form5Example1">Chọn nhà sản xuất</label>
                    <select class="form-select mb-4" name="brand_id" aria-label="Default select example">
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <!-- category name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="name" id="form5Example1" class="form-control" />
                        <label class="form-label" for="form5Example1">Tên sản phẩm</label>
                    </div>
                    <!-- category name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="price" id="form5Example1" class="form-control" />
                        <label class="form-label" for="form5Example1">Giá sản phẩm</label>
                    </div>
                    <!-- category name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="discount" id="form5Example1" class="form-control" />
                        <label class="form-label" for="form5Example1">Giá khuyến mãi</label>
                    </div>
                    <!-- category name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <textarea type="text" name="description" id="form5Example1" class="form-control"></textarea>
                        <label class="form-label" for="form5Example1">Mô tả</label>
                    </div>
                    {{-- danh sách ảnh sản phẩm --}}
                    <div data-mdb-input-init class=" mb-4">
                        <label class="form-label" for="customFile">Chọn ảnh menu</label>
                        <input type="file" name="images[]" multiple="multiple" class="form-control" id="customFile" />
                    </div>
                    <ul id="imageListContainer"></ul>
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
                            <th scope="col">Tên</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Khuyến mãi</th>
                            <th scope="col">Mô tả</th>
                            <td scope="col">Nhà sản xuất</td>
                            <td scope="col">Danh mục sản phẩm</td>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $item)
                            <tr>
                                <th scope="row">{{ $index }}</th>
                                <td>
                                    <img height="100px" width="100px"
                                        src="{{ asset('storage/images/' . $item->images[0]->path) }}" alt="">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->discount }}</td>
                                <td>{{ substr($item->description, 0, 20) }} ...</td>
                                <td>{{ $item->brand->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-3 col-sm-12 col-md-12 mb-2">
                                            <a href="{{ route('admin.product.edit', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Edit</a>
                                        </div>
                                        <div class="col-3 col-sm-12 col-md-12">
                                            <form action="{{ route('admin.product.delete', ['id' => $item->id]) }}"
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

    <script>
        $(document).ready(function() {
            // Xử lý sự kiện chọn file
            $('input[name="images[]"]').change(function() {
                // Lấy danh sách các tệp đã chọn
                var files = $(this)[0].files;

                // Hiển thị ảnh đã chọn
                showSelectedImages(files);
            });

            // Hàm hiển thị ảnh đã chọn
            function showSelectedImages(files) {
                // Lấy phần tử chứa danh sách ảnh đã chọn
                var imageListContainer = $('#imageListContainer');

                // Xóa nội dung cũ
                imageListContainer.empty();

                // Hiển thị ảnh đã chọn
                $.each(files, function(index, file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Tạo phần tử img để hiển thị ảnh
                        var image = $('<img>').attr('src', e.target.result);

                        // Thêm ảnh vào danh sách
                        imageListContainer.append(image);
                    };

                    // Đọc tệp tin hình ảnh
                    reader.readAsDataURL(file);
                });
            }
        });
    </script>
@endsection
