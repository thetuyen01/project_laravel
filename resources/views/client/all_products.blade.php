@extends('layouts.app')

@section('content')
    <div style="margin-top: 100px">
        <!-- link -->
        <div class="" style="background-color: rgb(213, 213, 213); margin-top: 65px;">
            <div class="p-5 container">
                <div class="" style="color:rgb(255, 89, 0);">Trang chủ /<span> Sữa tươi</span></div>
            </div>
        </div>

        <!--linkend -->
        <div class="container row p-5" style="margin-left: 80px;">
            <div class="col-2">
                <form action="#" method="GET">
                    <h5 class="fs-5 fw-bold">BỘ LỘC SẢN PHẨM</h5>
                    <!-- locgia -->
                    <div class="mb-3" style="font-size: 15px;">
                        <div for="" class="fw-bold" style=" border-bottom: 1px dashed;">Name</div><br>
                        <input type="radio" class="" name="price" value="100" id=""
                            aria-describedby="helpId" placeholder="" />
                        <span class="form-label">Giá dưới 100.000đ</span><br>
                        <input type="radio" class="" name="price" value="200" id=""
                            aria-describedby="helpId" placeholder="" />
                        <span class="form-label">100.000đ-200.000đ</span><br>
                        <input type="radio" class="" name="price" value="300" id=""
                            aria-describedby="helpId" placeholder="" />
                        <span class="form-label">100.000đ-200.000đ</span><br>
                        <input type="radio" class="" name="price" value="400" id=""
                            aria-describedby="helpId" placeholder="" />
                        <span class="form-label">200.000đ-500.000đ</span><br>
                        <input type="radio" class="" name="price" value="500" id=""
                            aria-describedby="helpId" placeholder="" />
                        <span class="form-label">1.000.000đ-2.000.000đ</span><br>
                        <input type="radio" class="" name="price" value="1000" id=""
                            aria-describedby="helpId" placeholder="" />
                        <span class="form-label">Giá trên 2.000.000đ</span><br>
                    </div>
                    <!-- locgiaend -->
                    <!-- lochang -->
                    <div class="mb-3 " style="font-size: 15px;">
                        <div for="" class="fw-bold" style=" border-bottom: 1px dashed;">Name</div><br>
                        @foreach ($brands as $item)
                            <input type="radio" class="" name="brand" value="{{ $item->name }}" id=""
                                aria-describedby="helpId" placeholder="" />
                            <span class="form-label">{{ $item->name }}</span><br>
                        @endforeach

                        {{-- <input type="checkbox" class="" name="brand" value="b" id=""
                            aria-describedby="helpId" placeholder="" />
                        <span class="form-label">durex</span><br>
                        <input type="checkbox" class="" name="brand" value="c" id=""
                            aria-describedby="helpId" placeholder="" />
                        <span class="form-label">phithuongg</span><br> --}}
                    </div>
                    <!-- lochangend -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-warning rounded-pill">lọc</button>
                    </div>

                </form>
            </div>
            <div class="col-10">
                <div class=" d-flex justify-content-center">
                    <span class="pe-2">Xếp theo:</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="" id="" />
                        <label class="form-check-label" for=""> Default </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="" id="" />
                        <label class="form-check-label" for=""> A-Z </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="" id="" />
                        <label class="form-check-label" for=""> Z-A </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="" id="" />
                        <label class="form-check-label" for=""> Hàng mới </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="" id="" />
                        <label class="form-check-label" for=""> Gía thấp đến cao </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="" id="" />
                        <label class="form-check-label" for=""> Gía cao đến thấp </label>
                    </div>
                </div>
                <div class=" mb-5">
                    <div class="row d-flex justify-content-center grid gap-3">
                        @foreach ($products as $item)
                            {
                            <div class="col-lg-3 col-md-2 col-sm-3">
                                <div class="card">
                                    <div class="bg-image hover-overlay" data-mdb-ripple-init
                                        data-mdb-ripple-color="light">
                                        <img src="{{ asset('storage/images/' . $item->images[0]->path) }}"
                                            class="img-fluid" />
                                        <a href="#!">
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
                            }
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- sp2 -->
    </div>
@endsection
