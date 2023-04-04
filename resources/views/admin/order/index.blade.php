@extends('admin.layouts.master')
@section('content')
@section('page')
    Order Table
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <a href="{{ route('brand.create') }}"><button type="button"
                                class="btn btn-info">Add</button></a> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User </th>
                                    <th>Product </th>
                                    <th>Shipping Address</th>
                                    <th>Order No.</th>
                                    <th>Payment Status</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Deliver At (timestamp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $o)
                                    <tr>

                                        <td>{{ $o->id }}</td>
                                        <td>{{ @$o->user->name }}</td>
                                        <td>
                                            @foreach ($o->product as $pro)
                                                {{ $pro->title }}
                                            @endforeach
                                        </td>
                                        <td>{{ $o->shipping_address }}</td>
                                        <td>{{ $o->order_no }}</td>
                                        <td>{{ $o->payment_status }}</td>
                                        <td>{{ $o->payment_method }}</td>
                                        <td>{{ $o->status }}</td>
                                        <td>{{ $o->deliver_at }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
