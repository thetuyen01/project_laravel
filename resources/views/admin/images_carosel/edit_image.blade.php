@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid mt-5" style="min-height: 100vh;">
        <form style="width: 22rem;" action="{{ route('admin.edit.updateimage', ['id' => $image_carousel->id]) }}"
            method="POST" enctype="multipart/form-data">
            <h1>Thêm ảnh blog </h1>
            @csrf
            @method('PUT')
            <!-- category name input -->
            <div data-mdb-input-init class=" mb-4">
                <label class="form-label">Loại Ảnh</label>
                <select name="type" class="form-select" value="{{ $image_carousel->type }}"
                    aria-label="Default select example">
                    <option selected value="1">Carousel</option>
                </select>
            </div>
            <div class="mb-4">
                <img height="100px" width="100px" src="{{ asset('storage/images/' . $image_carousel->path) }}"
                    alt="">
            </div>
            <!-- patfile name input -->
            <div data-mdb-input-init class=" mb-4">
                <label class="form-label" for="customFile">Chọn ảnh blog</label>
                <input type="file" name="path" class="form-control" id="customFile" />
            </div>
            <ul id="imageListContainer"></ul>
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Subscribe</button>
        </form>

    </div>
    <script>
        $(document).ready(function() {
            // Xử lý sự kiện chọn file
            $('input[name="path"]').change(function() {
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
