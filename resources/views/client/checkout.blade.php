@extends('layouts.app')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="container" style="margin-top: 150px">
        @if ($errors->any())
            <div class="alert alert-danger">
                Vui lòng kiểm tra dử liệu !!!
            </div>
        @endif
        <form action="{{ route('addInvoice') }}" method="POST">
            @csrf
            <div class="row">
                <div class="row col-6">
                    <div class="col-10">
                        <h6>Thông tin nhận hàng</h6>
                        <div class="mb-3">
                            <input type="text" name="sdt" id="" class="form-control"
                                placeholder="Số điện thoại" aria-describedby="helpId" />
                        </div>
                        <div class="mb-3">
                            <input type="text" name="dc" id="" class="form-control" placeholder="Địa chỉ"
                                aria-describedby="helpId" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Ghi chú</label>
                            <textarea class="form-control" name="gc" id="" rows="2"></textarea>
                        </div>

                    </div>
                </div>

                <div class="col-6 row border-start border-2 h-100 bg-light">
                    <h6>Đơn Hàng({{ $count }} sản phẩm)</h6>
                    <hr class="my-4">
                    <div class="overflow-y-scroll"style="max-height: 400px;">
                        @foreach ($cart_details as $item)
                            <div class="row mb-4 justify-content-between ">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img src="{{ asset('storage/images/' . $item->product->images[0]->path) }}"
                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <h6 class="text-muted">{{ $item->product->name }}</h6>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2">
                                    <!-- chỗ này nhét sl sản phẩm mà tui bấm nó ko lên số :Đ -->
                                    <!-- <input id="" min="0" name="quantity" value="1" type="number"
                                                                                                                                                                                                                                                                                                                                                                                                      class="form-control form-control-sm" /> -->
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <p class="text-decoration-line-through"><span
                                            class="text-decoration-line-through">${{ $item->product->price }}</span></p>
                                    <h6 class="mb-0 f-2">${{ $item->product->discount }}</h6>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <i class="fas fa-times"><strong class="ms-1">{{ $item->quantity }}</strong></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr class="my-4">
                    <div class="row ">
                        <div class="col-6 ">
                            <div class="">Tổng tiền:</div>
                        </div>
                        <div class="col-6 fs-5">
                            <div class="text-end text-danger">${{ $total }}.000</div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-6 ">
                            <a href="" class="text-warning f-3"><i class="fas fa-angle-left"></i>Trở về giỏ hàng</a>
                        </div>
                        <div class="col-6 ">
                            <div class="text-end text-danger">${{ $total }}.000</div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">Mua hàng</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
