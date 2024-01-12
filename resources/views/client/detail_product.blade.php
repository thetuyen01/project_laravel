@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top:150px ">
        <div class="row">
            @if ($product)
                <div class="col-md-7">
                    <div class="container">
                        <div class="tab-content" id="pills-tabContent2">
                            @foreach ($product->images as $index => $item)
                                @if ($index == 0)
                                    <div class="tab-pane fade show active" id="pills-home2" role="tabpanel"
                                        aria-labelledby="pills-home-tab2">
                                        <img src="{{ asset('storage/images/' . $item->path) }}" class="card-img-top w-75"
                                            alt="Fissure in Sandstone" />
                                    </div>
                                @else
                                    <div class="tab-pane fade" id="pills-{{ $item->id }}2" role="tabpanel"
                                        aria-labelledby="pills-{{ $item->id }}-tab2">
                                        <img src="{{ asset('storage/images/' . $item->path) }}" class="card-img-top w-75"
                                            alt="Fissure in Sandstone" />
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <ul class="nav nav-pills mb-3 " id="pills-tab2" role="tablist">
                            @foreach ($product->images as $index => $item)
                                @if ($index == 0)
                                    <li class="nav-item" role="presentation">
                                        <button data-mdb-pill-init class="nav-link active" id="pills-home-tab2"
                                            data-mdb-target="#pills-home2" type="button" role="tab"
                                            aria-controls="pills-home" aria-selected="true">
                                            <img height="100px" width="100px"
                                                src="{{ asset('storage/images/' . $item->path) }}"
                                                class="card-img-top w-100" alt="Fissure in Sandstone" />
                                        </button>
                                    </li>
                                @else
                                    <li class="nav-item" role="presentation">
                                        <button data-mdb-pill-init class="nav-link" id="pills-{{ $item->id }}-tab2"
                                            data-mdb-target="#pills-{{ $item->id }}2" type="button" role="tab"
                                            aria-controls="pills-{{ $item->id }}" aria-selected="false">
                                            <img height="100px" width="100px"
                                                src="{{ asset('storage/images/' . $item->path) }}"
                                                class="card-img-top w-100" alt="Fissure in Sandstone" />
                                        </button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <h3 class="text-primary">{{ $product->name }}</h3>
                    <p>Thương hiệu : <strong>{{ $product->brand->name }}</strong></p>
                    <h3>{{ $product->price }}₫</h3>
                    <form action="{{ route('addCartDetail') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="">Số lượng: </label>
                            <input type="number" name="quantity" value="1">
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">Mua hàng</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
