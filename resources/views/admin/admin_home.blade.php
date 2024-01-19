@extends('admin.layouts.admin')
@section('title')
    Admin
@endsection
@section('content')
    <div class="main container-fluid p-3">
        <div class="row">
            <div class="col-sm-4 mt-5 ">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User</h5>
                        <p class="card-text">Có {{ $count_user }} User</p>
                        <a href="{{ route('admin.list_user') }}" class="btn btn-primary">Thêm user</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Brand</h5>
                        <p class="card-text">Có {{ $count_brand }} brand</p>
                        <a href="{{ route('formBrand') }}" class="btn btn-primary">Thêm barnd</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category</h5>
                        <p class="card-text">Có {{ $count_category }} category</p>
                        <a href="{{ route('admin.category.formCategory') }}" class="btn btn-primary">Thêm category</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Product</h5>
                        <p class="card-text">Có {{ $count_product }} product</p>
                        <a href="{{ route('admin.product.list') }}" class="btn btn-primary">Thêm product</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Images Carosuel</h5>
                        <p class="card-text">Có {{ $count_images_carousel }} images carousel</p>
                        <a href="{{ route('showformbogimage') }}" class="btn btn-primary">Thêm images carousel</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Invoice</h5>
                        <p class="card-text">Có {{ $count_invoice }} invoice</p>
                        <a href="{{ route('admin.invoice.getListOrder') }}" class="btn btn-primary">Thêm invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
