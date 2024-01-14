@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 100px">
        <form style="width: 22rem;" action="{{ route('admin.updateProduct', ['id' => $product->id]) }}" method="POST"
            enctype="multipart/form-data">
            <h1>Thêm Sản phẩm</h1>
            @csrf
            @method('PUT')
            <!-- category name input -->
            <label class="form-label" for="form5Example1">Chọn danh mục sản phẩm</label>
            <select class="form-select mb-4" name="category_id" aria-label="Default select example">
                @foreach ($categorys as $item)
                    @if ($item->id == $product->category->id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
            <label class="form-label" for="form5Example1">Chọn nhà sản xuất</label>
            <select class="form-select mb-4" name="brand_id" aria-label="Default select example">
                @foreach ($brands as $item)
                    @if ($item->id == $product->brand->id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
            <!-- category name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="name" value="{{ $product->name }}" id="form5Example1" class="form-control" />
                <label class="form-label" for="form5Example1">Tên sản phẩm</label>
            </div>
            <!-- category name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="price" value="{{ $product->price }}" id="form5Example1"
                    class="form-control" />
                <label class="form-label" for="form5Example1">Giá sản phẩm</label>
            </div>
            <!-- category name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" name="discount" value="{{ $product->discount }}" id="form5Example1"
                    class="form-control" />
                <label class="form-label" for="form5Example1">Giá khuyến mãi</label>
            </div>
            <!-- category name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <textarea type="text" name="description" id="form5Example1" class="form-control">{{ $product->description }}</textarea>
                <label class="form-label" for="form5Example1">Mô tả</label>
            </div>
            <div class="mb-4">
                @foreach ($product->images as $item)
                    <img height="100px" width="100px" src="{{ asset('storage/images/' . $item->path) }}" alt="">
                @endforeach
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
