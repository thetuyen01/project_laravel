@extends('layouts.app')

@section('content')
    <!-- slide -->
    <div class="container mb-5 " style="margin-top: 66.5px;">
        <div id="carousel" class="carousel slide" data-mdb-ride="carousel" data-mdb-carousel-init>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://bizweb.dktcdn.net/100/416/540/themes/839121/assets/slide-img1.jpg?1704418142179"
                        class="d-block w-100" alt="Wild Landscape" />
                </div>
                <div class="carousel-item">
                    <img src="https://bizweb.dktcdn.net/100/416/540/themes/839121/assets/slide-img4.jpg?1704418142179"
                        class="d-block w-100" alt="Camera" />
                </div>

                <div class="carousel-item ">
                    <img src="https://bizweb.dktcdn.net/100/416/540/themes/839121/assets/slide-img6.jpg?1704418142179"
                        class="d-block w-100" alt="Exotic Fruits" />
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-mdb-target="#carousel" data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carousel" data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- end slide -->
    <!-- sp1block -->
    <div class="container text-center mt-3 mb-4">
        <a name="" id="" class="btn btn-warning rounded-pill fs-4" href="#" role="button">Giá luôn rẻ
            nhất</a>
    </div>

    <div class="container mb-5">
        <div id="carousel1" class="carousel  blog slide" data-mdb-ride="carousel" data-mdb-carousel-init>
            <div class="carousel-inner">
                {{-- <div class="carousel-item active">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3">
                            <div class="card  mb-5">
                                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/111.webp"
                                        class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#!" class="fs-4">Sữa vinamilk</a>
                                    <a href="">
                                        <h5 class="card-title text-decoration-line-through text-dark"
                                            style="font-size:small">50.000<span class="text-decoration-underline">đ</span>
                                        </h5>
                                    </a>
                                    <a href="">
                                        <h5 class="card-title text-danger">45.000<span
                                                class="text-decoration-underline">đ</span></h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card  mb-5">
                                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/111.webp"
                                        class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#!" class="fs-4">Sữa vinamilk</a>
                                    <a href="">
                                        <h5 class="card-title text-decoration-line-through text-dark"
                                            style="font-size:small">50.000<span class="text-decoration-underline">đ</span>
                                        </h5>
                                    </a>
                                    <a href="">
                                        <h5 class="card-title text-danger">45.000<span
                                                class="text-decoration-underline">đ</span></h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                @foreach ($products as $index => $product)
                    @if ($index == 0)
                        <div class="carousel-item  active">
                            <div class="row d-flex justify-content-center">
                                @foreach ($product as $item)
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <div class="card">
                                            <div class="bg-image hover-overlay" data-mdb-ripple-init
                                                data-mdb-ripple-color="light">
                                                <img src="{{ asset('storage/images/' . $item['images'][0]['path']) }}"
                                                    class="img-fluid" />
                                                <a href="{{ url($item['category']['slug'] . '/' . $item['slug']) }}">
                                                    <div class="mask"
                                                        style="background-color: rgba(251, 251, 251, 0.15);">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <a href="{{ url($item['category']['slug'] . '/' . $item['slug']) }}"
                                                    class="" data-mdb-ripple-init>
                                                    <h5 class="card-title ">{{ $item['name'] }}</h5>
                                                    <h6 class="text-decoration-line-through text-danger">
                                                        {{ $item['price'] }}<span class="text-decoration-underline">đ</span>
                                                    </h6>
                                                    <h5 class="card-title">{{ $item['discount'] }}<span
                                                            class="text-decoration-underline">đ</span></h5>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="carousel-item ">
                            <div class="row d-flex justify-content-center">
                                @foreach ($product as $item)
                                    <div class="col-lg-3 col-md-2 col-sm-3">
                                        <div class="card">
                                            <div class="bg-image hover-overlay" data-mdb-ripple-init
                                                data-mdb-ripple-color="light">
                                                <img src="{{ asset('storage/images/' . $item['images'][0]['path']) }}"
                                                    class="img-fluid" />
                                                <a href="{{ url($item['category']['slug'] . '/' . $item['slug']) }}">
                                                    <div class="mask"
                                                        style="background-color: rgba(251, 251, 251, 0.15);">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <a href="{{ url($item['category']['slug'] . '/' . $item['slug']) }}"
                                                    class="" data-mdb-ripple-init>
                                                    <h5 class="card-title ">{{ $item['name'] }}</h5>
                                                    <h6 class="text-decoration-line-through text-danger">
                                                        {{ $item['price'] }}<span
                                                            class="text-decoration-underline">đ</span>
                                                    </h6>
                                                    <h5 class="card-title">{{ $item['discount'] }}<span
                                                            class="text-decoration-underline">đ</span></h5>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="carousel-item blog">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3">
                            <div class="card mb-5">
                                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/111.webp"
                                        class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#!" class="fs-4">Sữa vinamilk</a>
                                    <a href="">
                                        <h5 class="card-title text-dark">50.000<span
                                                class="text-decoration-underline">đ</span></h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card  mb-5">
                                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/111.webp"
                                        class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#!" class="fs-4">Sữa vinamilk</a>
                                    <a href="">
                                        <h5 class="card-title text-decoration-line-through text-dark"
                                            style="font-size:small">50.000<span class="text-decoration-underline">đ</span>
                                        </h5>
                                    </a>
                                    <a href="">
                                        <h5 class="card-title text-danger">45.000<span
                                                class="text-decoration-underline">đ</span></h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-mdb-target="#carousel1" data-mdb-slide="prev">
                <span class="carousel-control-prev-icon blockicon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carousel1" data-mdb-slide="next">
                <span class="carousel-control-next-icon blockicon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- sp1block end -->


    <!-- menu2 -->
    <div class="container text-center mt-3 mb-4">
        <a name="" id="" class="btn btn-warning rounded-pill fs-4" href="#" role="button">Mẹ cần
            tìm gì ?</a>
    </div>
    <div class="container mb-5 ">
        <h3 class="mt-5 mb-5">Hôm nay bạn cần gì ?</h3>
        <div class="row grid gap-3 d-flex justify-content-center">
            @foreach ($categorys as $item)
                <div class="col-lg-3 col-md-2 col-sm-3">
                    <div class="card ">
                        <div class="bg-image hover-overlay m-auto" data-mdb-ripple-init data-mdb-ripple-color="light">
                            <img src="{{ asset('storage/images/' . $item->path) }}" class="card-img-top"
                                style="max-height: 100px; max-width: 100px;" alt="Fissure in Sandstone" />
                            <a href="{{ url('/' . $item->slug) }}">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="{{ url('/' . $item->slug) }}" class="fs-5"
                                data-mdb-ripple-init>{{ $item->name }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- menu2 end -->
@endsection
