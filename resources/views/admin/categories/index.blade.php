@extends('admin.layouts.master')
@section('content')
@section('page')
    Category Table
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
                        <a href="{{ route('category.create') }}"><button type="button"
                                class="btn btn-info">Add</button></a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>
                                            @if (empty($u->image))
                                                <img src="{{ 'download.png' }}" width="50px" height="50px"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('image/' . $u->image) }}" width="50px"
                                                    height="50px" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($u->status == 0)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Deactive</span>
                                            @endif
                                        </td>
                                        <td><a href="{{ route('category.edit', $u->id) }}"><button type="button"
                                                    class="btn btn-success">Edit</button></a>
                                            <a href="{{ route('category.delete', $u->id) }}"><button type="button"
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
