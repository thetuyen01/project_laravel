@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 150px">
        <div class="row">
            <div class="row col-8">
                <div class="col-5">
                    <h6>Thông tin nhận hàng</h6>
                    <div class="mb-3">
                        <input type="text" name="" id="" class="form-control" placeholder="Số điện thoại"
                            aria-describedby="helpId" />
                    </div>
                    <div class="mb-3">
                        <input type="text" name="" id="" class="form-control" placeholder="Địa chỉ"
                            aria-describedby="helpId" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ghi chú</label>
                        <textarea class="form-control" name="" id="" rows="2"></textarea>
                    </div>

                </div>
                <div class="col-5">
                    <h6>Thanh Toán</h6>
                    <div class="form-check">
                        <div class="p-2">
                            <input class="form-check-input" type="radio" name="onechoice" id="" />
                            <label class="form-check-label" for=""> Default radio </label>
                        </div>
                    </div>
                    <div class="form-check">
                        <div class="p-2">
                            <input class="form-check-input" type="radio" name="onechoice" id="" />
                            <label class="form-check-label" for=""> Default radio </label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-4 row border-start border-2 h-100 bg-light">
                <h6>Đơn Hàng(? sản phẩm)</h6>
                <hr class="my-4">
                <div class="overflow-y-scroll"style="max-height: 400px;">

                    <div class="row mb-4 justify-content-between ">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp"
                                class="img-fluid rounded-3" alt="Cotton T-shirt">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <h6 class="text-muted">Shirt</h6>
                            <h6 class="text-black mb-0">Cotton T-shirt</h6>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2">
                            <!-- chỗ này nhét sl sản phẩm mà tui bấm nó ko lên số :Đ -->
                            <!-- <input id="" min="0" name="quantity" value="1" type="number"
                                              class="form-control form-control-sm" /> -->
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                            <h6 class="mb-0">€ 44.00</h6>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row " style="font-size: small;">
                    <div class="col-6 ">
                        <div class="">Tạm tính:</div>
                    </div>
                    <div class="col-6 ">
                        <div class="text-end opacity-50">100.000đ</div>
                    </div>
                </div>
                <div class="row " style="font-size: small;">
                    <div class="col-6 ">
                        <div class="">Phí vận chuyển:</div>
                    </div>
                    <div class="col-6 ">
                        <div class="text-end opacity-50">100.000đ</div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row ">
                    <div class="col-6 ">
                        <div class="">Tổng tiền:</div>
                    </div>
                    <div class="col-6 fs-5">
                        <div class="text-end text-danger">100.000đ</div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-6 " style="font-size: small;">
                        <a href="http://" class="text-warning"><i class="fas fa-angle-left"></i>Trở về giỏ hàng</a>
                    </div>
                    <div class="col-6 ">
                        <div class="text-end text-danger">100.000đ</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
