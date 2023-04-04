@extends('admin.layouts.master')
@section('content')
@section('page')
    Color
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
                        <a href="{{ route('color.create') }}"><button type="button"
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
                                @foreach ($color as $c)
                                    <tr>
                                        <td>{{ $c->id }}</td>
                                        <td>{{ $c->name }}</td>
                                        <td>
                                           {{@$c->user->name}}
                                        </td>
                                        <td>{{ @$c->product->title }}</td>
                                        <td><a href="{{ route('color.edit', $c->id) }}"><button type="button"
                                                    class="btn btn-success">Edit</button></a>
                                            <a href="{{ route('color.delete', $c->id) }}"><button type="button"
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
