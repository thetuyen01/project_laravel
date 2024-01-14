@extends('layouts.app')

@section('content')
    <section class="mt-5" style="background-color: #eee;">
        <div class="container py-5">

            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">

                    <div class="card" id="chat1" style="border-radius: 15px;">
                        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
                            style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            <i class="fas fa-angle-left"></i>
                            <p class="mb-0 fw-bold">Live chat</p>
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="card-body">

                            <div class="d-flex flex-row justify-content-start mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                    <p class="small mb-0">Hello and thank you for visiting MDBootstrap. Please click the
                                        video
                                        below.</p>
                                </div>
                            </div>

                            <div class="d-flex flex-row justify-content-end mb-4">
                                <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                                    <p class="small mb-0">Thank you, I really like your product.</p>
                                </div>
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                    alt="avatar 1" style="width: 45px; height: 100%;">
                            </div>

                            <div class="d-flex flex-row justify-content-start mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                <div class="ms-3" style="border-radius: 15px;">
                                    <div class="bg-image">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/screenshot1.webp"
                                            style="border-radius: 15px;" alt="video">
                                        <a href="#!">
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row justify-content-start mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                    <p class="small mb-0">...</p>
                                </div>
                            </div>

                            <div class="form-outline">
                                <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                                <label class="form-label" for="textAreaExample">Type your message</label>
                            </div>
                            <button onclick="sendMessage()">gửi</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
<script>
    function sendMessage() {
        var message = $('#textAreaExample').val()
        console.log(message)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route('sendMessage') }}', // Đường dẫn đến máy chủ hoặc API endpoint
            method: 'POST', // Phương thức HTTP (có thể là GET hoặc POST tùy thuộc vào yêu cầu của bạn)
            data: {
                message: message
            }, // Dữ liệu gửi đi (có thể thay đổi tùy thuộc vào yêu cầu của bạn)
            success: function(response) {
                console.log(response)
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    };
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.4/socket.io.js"
    integrity="sha512-tE1z+95+lMCGwy+9PnKgUSIeHhvioC9lMlI7rLWU0Ps3XTdjRygLcy4mLuL0JAoK4TLdQEyP0yOl/9dMOqpH/Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    var socket = io('http://127.0.0.1:3000');
    socket.on('message', function(data) { // Sửa tên sự kiện ở đây để trùng với server
        console.log(data);
    });
</script>
