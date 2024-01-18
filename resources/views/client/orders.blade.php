@extends('layouts.app')
@section('content')
    <section class="h-100 h-custom" style="background-color: #eee;">
        {{-- check --}}
        @foreach ($invoices as $item)
            <div class="container pt-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-stepper text-black" style="border-radius: 16px;">

                            <div class="card-body p-5">

                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <div>
                                        <h5 class="mb-0">INVOICE <span
                                                class="text-primary font-weight-bold">#{{ $item->id }}</span>
                                        </h5>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-0">Expected Arrival : <span> {{ $item->updated_at }}</span></p>
                                        </p>
                                    </div>
                                </div>

                                <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                                    <li class="step0 {{ $item->condition >= 0 ? 'active' : '' }} text-center"
                                        id="step1"></li>
                                    <li class="step0 {{ $item->condition >= 1 ? 'active' : '' }} text-center"
                                        id="step2"></li>
                                    <li class="step0 {{ $item->condition >= 2 ? 'active' : '' }} text-center"
                                        id="step3">
                                    </li>
                                    <li class="step0 {{ $item->condition >= 3 ? 'active' : '' }}  text-center"
                                        id="step4"></li>
                                </ul>

                                <div class="d-flex justify-content-between">
                                    <div class="d-lg-flex align-items-center">
                                        <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                        <div>
                                            <p class="fw-bold mb-1">Order</p>
                                            <p class="fw-bold mb-0">Processed</p>
                                        </div>
                                    </div>
                                    <div class="d-lg-flex align-items-center">
                                        <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                        <div>
                                            <p class="fw-bold mb-1">Order</p>
                                            <p class="fw-bold mb-0">Shipped</p>
                                        </div>
                                    </div>
                                    <div class="d-lg-flex align-items-center">
                                        <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                        <div>
                                            <p class="fw-bold mb-1">Order</p>
                                            <p class="fw-bold mb-0">En Route</p>
                                        </div>
                                    </div>
                                    <div class="d-lg-flex align-items-center">
                                        <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                        <div>
                                            <p class="fw-bold mb-1">Order</p>
                                            <p class="fw-bold mb-0">Arrived</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- end check --}}
            <div class="container py-4 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div>
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                                                            class="img-fluid rounded-3" alt="Shopping item"
                                                            style="width: 65px;">
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5>{{ $item->invoice_details->first()->product->name }}</h5>
                                                        <p class="small mb-0">256GB, Navy Blue</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <div style="width: 50px;">
                                                        <h5 class="fw-normal mb-0">
                                                            x{{ $item->invoice_details->first()->quantity }}</h5>
                                                    </div>
                                                    <div style="width: 80px;">
                                                        <h5 class="mb-0">
                                                            ${{ $item->invoice_details->first()->product->discount }}
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                {{--  --}}
                                <div class="col-lg-12 mt-3">
                                    <p>Số lượng : {{ $totalAmounts[$item->id]['quantity'] }}</p>
                                    <p>Tổng tiền : <strong>${{ $totalAmounts[$item->id]['amount'] }}.000</strong></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    </section>
@endsection
