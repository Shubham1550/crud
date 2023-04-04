@extends('admin.layouts.master')
@section('content')
@section('page')
    Review Table
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
                                    <th>Sr.No.</th>
                                    <th>User </th>
                                    <th>Product </th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($ as $)
                                    <tr>
                                        <td>{{ $b->id }}</td>
                                        <td>{{ $b->user_id }}</td>
                                        <td>{{ $b->product_id }}</td>
                                        <td>{{ $b->message }}</td>
                                        <td><a href="{{ route('', $b->id) }}"><button type="button"
                                                    class="btn btn-success">Edit</button></a>
                                            <a href="{{ route('', $b->id) }}"><button type="button"
                                                    class="btn  btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach --}}
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
