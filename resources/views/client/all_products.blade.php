@extends('layouts.app')

@section('content')
    <div style="margin-top: 30px">
        <!-- link -->
        <div class="" style="background-color: rgb(237, 234, 234); margin-top: 65px;">
            <div class="p-5 container">
                <div class="fs-5 fw-bold"><a style="color:rgb(255, 89, 0);" href="/">Trang chủ</a> /<span> <a
                            href="">{{ $category_name }}</a></span>
                </div>
            </div>
        </div>
        <!--linkend -->
        <div class="container row m-auto" style="margin-top: 300px;">
            <div class="col-12 col-md-2 col-sm-2 mt-5">
                <form action="#" method="GET">
                    <h5 class="fs-5 fw-bold">BỘ LỘC SẢN PHẨM</h5>
                    <!-- locgia -->
                    <div class="mb-3" style="font-size: 15px;">
                        <div for="" class="fw-bold" style=" border-bottom: 1px dashed;">Lọc giá</div><br>
                        <input type="radio" class="" {{ $price == [0, 100] ? 'checked' : '' }} name="price[]"
                            value="[0,100]" id="" aria-describedby="helpId" placeholder="" />
                        <span class="form-label">Giá dưới 100.000đ</span><br>
                        <input type="radio" class="" {{ $price == [100, 200] ? 'checked' : '' }} name="price[]"
                            value="[100,200]" id="" aria-describedby="helpId" placeholder="" />
                        <span class="form-label">100.000đ-200.000đ</span><br>
                        <input type="radio" class="" {{ $price == [200, 300] ? 'checked' : '' }} name="price[]"
                            value="[200,300]" id="" aria-describedby="helpId" placeholder="" />
                        <span class="form-label">200.000đ-300.000đ</span><br>
                        <input type="radio" class="" {{ $price == [300, 400] ? 'checked' : '' }} name="price[]"
                            value="[300,400]" id="" aria-describedby="helpId" placeholder="" />
                        <span class="form-label">400.000đ-500.000đ</span><br>
                        <input type="radio" class="" {{ $price == [400, 500] ? 'checked' : '' }} name="price[]"
                            value="[400,500]" id="" aria-describedby="helpId" placeholder="" />
                        <span class="form-label">500.000đ-1.000.000đ</span><br>
                        <input type="radio" class="" {{ $price == [500, 1000] ? 'checked' : '' }} name="price[]"
                            value="[500,1000]" id="" aria-describedby="helpId" placeholder="" />
                        <span class="form-label">1.000.000đ-2.000.000đ</span><br>
                        <input type="radio" class="" {{ $price == [1000, 10000] ? 'checked' : '' }} name="price[]"
                            value="[1000,10000]" id="" aria-describedby="helpId" placeholder="" />
                        <span class="form-label">Giá trên 2.000.000đ</span><br>
                    </div>
                    <!-- locgiaend -->
                    <!-- lochang -->
                    <div class="mb-3 " style="font-size: 15px;">
                        <div for="" class="fw-bold" style=" border-bottom: 1px dashed;">Nhà sản xuất</div><br>
                        @foreach ($brands as $item)
                            <input type="radio" class="" class=""
                                {{ (int) $brand == $item->id ? 'checked' : '' }} name="brand" value="{{ $item->id }}"
                                id="" aria-describedby="helpId" placeholder="" />
                            <span class="form-label">{{ $item->name }}</span><br>
                        @endforeach

                    </div>
                    <!-- lochangend -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-warning rounded-pill">lọc</button>
                    </div>

                </form>
            </div>
            <div class="col-12 col-md-10 col-sm-10 mt-5">
                <div class="mb-5">
                    <div class="row d-flex justify-content-center grid gap-1">
                        @foreach ($products as $item)
                            <div class="col-lg-3 col-md-2 col-sm-3">
                                <div class="card">
                                    <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                        <img src="{{ asset('storage/images/' . $item->images[0]->path) }}"
                                            class="img-fluid" />
                                        <a href="{{ url($item->category->slug . '/' . $item->slug) }}">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ url($item->category->slug . '/' . $item->slug) }}" class=""
                                            data-mdb-ripple-init>
                                            <h5 class="card-title ">{{ $item->name }}</h5>
                                            <h6 class="text-decoration-line-through text-danger">{{ $item->price }}<span
                                                    class="text-decoration-underline">đ</span></h6>
                                            <h5 class="card-title">{{ $item->discount }}<span
                                                    class="text-decoration-underline">đ</span></h5>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- sp2 -->
    </div>
@endsection
