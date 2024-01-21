@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid mt-5" style="min-height: 100vh;">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_invoices as $index => $item)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <img height="100px" width="100px"
                                src="{{ asset('storage/images/' . $item->product->images[0]->path) }}" alt="">
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>${{ $item->product->price }}</td>
                        <td>${{ $item->product->discount }}</td>
                        <td>{{ $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
