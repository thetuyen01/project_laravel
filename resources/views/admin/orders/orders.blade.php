@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid mt-5" style="min-height: 100vh;">
        <h1 class="mb-4 text-center">Invoice</h1>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>User</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Note</th>
                    <th scope="col">Total</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Condition</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice as $index => $item)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->notes }}</td>
                        <td>{{ $item->total_amount }}</td>
                        <td><a href="{{ route('admin.invoice.detailincoice', ['id' => $item->id]) }}">...</a></td>
                        <td>
                            <form action="{{ route('admin.invoice.editInvoice', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select class="form-select" name="condition" id="">
                                    @foreach ($conditions as $index => $cond)
                                        @if ($index == $item->condition)
                                            <option value="{{ $index }}" selected>{{ $cond }}
                                            </option>
                                        @else
                                            <option value="{{ $index }}">
                                                {{ $cond }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <button class="btn btn-primary mt-2">Cập nhật</button>
                            </form>
                        </td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <form action="">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
