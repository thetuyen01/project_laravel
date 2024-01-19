<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-warning fixed-top">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="/">
                <img src="{{ asset('images/logo.jpg') }}" height="30" alt="MDB Logo" loading="lazy" />
            </a>
            <!-- form -->
            <form class="d-flex input-group w-25 form-serch">
                <div class="abc">
                    <input type="search" id="search" name="search "
                        class="form-control rounded-pill input-search-ajax" placeholder="Search ...."
                        aria-label="Search" aria-describedby="search-addon" />

                    <div class="search-ajax-result">

                    </div>
                </div>
            </form>
            <!-- endform -->
            <!-- Left links -->
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link  fs-5 fw-bold active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-bold a1" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-bold a1" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-bold a1" href="#">News</a>
                </li>
            </ul>
            <!-- Left links -->

            @if (!Auth::check())
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">

                        <a class="nav-link fs-5 fw-bold a1" href="{{ route('formlogin') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5  fw-bold a1" href="{{ route('formsignup') }}">Sign up</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <!-- Button trigger modal -->
                        <a data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#staticBackdrop" id="cartLink">
                            <i class="fas fa-cart-shopping"></i>
                        </a>


                    </li>
                </ul>
                <!-- Avatar -->
                <div class="dropdown ms-2">
                    <a data-mdb-dropdown-init class="dropdown-toggle d-flex align-items-center hidden-arrow"
                        href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25"
                            alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('getOrders') }}">Đơn hàng của bạn</a>
                        </li>
                        <li>
                            <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Đăng Xuất</button>
                            </form>
                        </li>
                    </ul>
                </div>
        </div>
        @endif
    </div>
    <!-- Collapsible wrapper -->





    </div>
    <!-- Container wrapper -->
</nav>
<!-- Modal -->
<div class="modal top w-100 fade" style="--mdb-modal-width: 60%; " id="staticBackdrop" data-mdb-backdrop="static"
    data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section class="h-100 h-custom">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                        </div>
                                        <div class="overflow-y-scroll"style="max-height: 400px;" id="listcar">
                                            <hr class="my-4">
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp"
                                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted">Shirt</h6>
                                                    <h6 class="text-black mb-0">Cotton T-shirt</h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <button class="btn btn-link px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                    <input id="form1" min="0" name="quantity"
                                                        value="1" type="number"
                                                        class="form-control form-control-sm" />

                                                    <button class="btn btn-link px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0">€ 44.00</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="#!" class="text-muted"><i
                                                            class="fas fa-times"></i></a>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total price</h5>
                                            <h5 id="total">€ 137.00</h5>
                                        </div>

                                        <a type="button" href="{{ route('getCheckout') }}"
                                            class="btn btn-dark btn-block btn-lg"
                                            data-mdb-ripple-color="dark">Checkout</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                    data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-mdb-ripple-init>Understood</button>
            </div>
        </div>
    </div>
</div>
<!-- Navbar -->
<script>
    // serach
    $('.search-ajax-result').hide();
    $('.input-search-ajax').keyup(function() {
        var _text = $(this).val();
        $.ajax({
            url: '{{ route('search_product') }}?key=' + _text,
            type: "GET",
            success(res) {
                console.log(res)
                var html = '';
                if (_text.length > 0) {
                    for (var pro of res.data) {
                        html += '<div class="media">'
                        html +=
                            `<img src="{{ asset('storage/images/${pro . images[0] . path}') }}" alt="">`
                        html +=
                            `<a class="fs-6" href="{{ url('${pro.category.slug}/${pro.slug}') }}">${ pro . name }</a>`
                        html += '<div class="media-body">' + pro.price + '</div>'
                        html += '</div>';
                        html += '<hr>'
                    }
                    $('.search-ajax-result').show();
                    $('.search-ajax-result').html(html)
                } else {
                    var html = '';
                    $('.search-ajax-result').html(html)
                    $('.search-ajax-result').hide();
                }

            }
        })

    })
    // carts


    // Sự kiện click cho thẻ <a>
    $('#cartLink').click(function() {

        render()
    });

    // update quantytity server
    function updateTotalAmount(a, b, c, z) {
        let quantity = document.getElementById(b)
        let price = document.getElementById(c).innerHTML.trim();
        let tongtien = document.getElementById('total').innerHTML.trim();
        console.log(z)
        if (parseInt(quantity.value) > 0) {
            if (a == "cong") {
                quantity.value = parseInt(quantity.value) + 1
                console.log(quantity.value, document.getElementById('total').innerHTML, price)
                document.getElementById('total').innerHTML = (parseFloat(document.getElementById('total')
                        .innerHTML.trim()) + parseFloat(price))
                    .toFixed(3)
                updateInputValue(z, document.getElementById(b).value)
            } else {
                if (parseInt(quantity.value) > 1) {
                    quantity.value = parseInt(quantity.value) - 1
                    document.getElementById('total').innerHTML = (parseFloat(document.getElementById(
                                'total')
                            .innerHTML.trim()) - parseFloat(
                            price))
                        .toFixed(3)
                    updateInputValue(z, document.getElementById(b).value)
                }
            }
        }
    }

    function updateInputValue(product_id, quantity) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route('updateQuantity') }}', // Đường dẫn đến máy chủ hoặc API endpoint
            method: 'POST', // Phương thức HTTP (có thể là GET hoặc POST tùy thuộc vào yêu cầu của bạn)
            data: {
                product_id: product_id,
                quantity: quantity
            }, // Dữ liệu gửi đi (có thể thay đổi tùy thuộc vào yêu cầu của bạn)
            success: function(response) {
                console.log(response)
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    // 
    function render() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route('getCart') }}',
            type: 'GET',

            success(response) {
                if (response.status == true) {
                    var html = '';
                    var total = 0;
                    console.log(response.data)
                    for (var pro of response.data) {
                        total += pro.product.discount * pro.quantity
                        html += `
                                    <hr class="my-4">
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="{{ asset('storage/images/${pro .product. images[0] . path}') }}"
                                                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-black mb-0">${pro.product.name}</h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <button class="btn btn-link px-2"
                                                    onclick="updateTotalAmount('tru','quantity${pro.product.id}','gia${pro.product.id}',${pro.product.id})">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <input id="quantity${pro.product.id}" min="0" name="quantity" value="${pro.quantity}"
                                                    type="text" class="w-100" />

                                                <button class="btn btn-link px-2"
                                                    onclick="updateTotalAmount('cong','quantity${pro.product.id}','gia${pro.product.id}',${pro.product.id})">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <p class="text-decoration-line-through"><span
                                                    class="text-decoration-line-through">${pro.product.price}đ</span></p>
                                                <h6 class="mb-0" id="gia${pro.product.id}">${pro.product.discount}</h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a onclick="deleteCartItem(${pro.product.id})" class="text-muted"><i
                                                        class="fas fa-times"></i></a>
                                            </div>
                                    </div>
                            `
                    }
                    $('#listcar').html(html)
                    $('#total').text(total);
                }
            },
            error: function(xhr) {
                // Xử lý khi có lỗi
            }
        });
    }

    // delete 
    function deleteCartItem(productId) {
        console.log(productId)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{{ route('deleteProdcutCart') }}', // Thay thế bằng route xử lý xóa sản phẩm của bạn
            type: 'POST',
            data: {
                product_id: productId
            },
            success(response) {
                console.log(response)
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true,
                    "positionClass": "toast-top-right custom-toast",
                }
                toastr.success("delete product success", {
                    timeOut: 120000
                })
                render()
            }
        });
    }
</script>
