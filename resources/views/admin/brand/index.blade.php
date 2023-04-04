@extends('admin.layouts.master')
@section('content')
@section('page')
    Brand Table
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('brand.create') }}"><button type="button"
                                class="btn btn-info">Add</button></a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Name</th>
                                    <th>User </th>
                                    <th>Product </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brand as $b)
                                    <tr>
                                        <td>{{ $b->id }}</td>
                                        <td>{{ $b->name }}</td>
                                        <td>{{ $b->user->name}}</td>
                                        {{-- @dd($b) --}}
                                        <td>{{ $b->product->title}}</td>
                                        <td><a href="{{ route('brand.edit', $b->id) }}"><button type="button"
                                                    class="btn btn-success">Edit</button></a>
                                            <a href="{{ route('brand.delete', $b->id) }}"><button type="button"
                                                    class="btn  btn-danger">Delete</button></a>
                                        </td>
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
