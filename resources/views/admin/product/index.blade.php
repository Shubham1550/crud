@extends('admin.layouts.master')
@section('content')
@section('page')
    Product Table
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
                        <a href="{{ route('product.create') }}"><button type="button"
                                class="btn btn-info">Add</button></a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Sizes</th>
                                    <th>Brand</th>
                                    <th>Color</th>
                                    <th>User</th>
                                    <th>Total Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->title }}</td>
                                        <td>{!! Str::words($p->description, 3, ' ...') !!}</td>
                                        <td>
                                            @if (empty($p->image))
                                                <img src="{{ 'download.png' }}" width="50px" height="50px"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('image/' . $p->image) }}" width="50px"
                                                    height="50px" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            {{@$p->category->name}}
                                        </td>
                                        <td>
                                            {{$p->sizes}}
                                        </td>
                                        <td>
                                            {{@$p->brand->name}}
                                        </td>
                                        <td>
                                            {{@$p->color->name}}
                                        </td>
                                        <td>
                                            {{@$p->user->name}}
                                        </td>
                                        <td>
                                            {{$p->t_quantity}}
                                        </td>
                                        <td>
                                            {{$p->price}}
                                        </td>
                                        <td><a href="{{ route('product.edit', $p->id) }}"><button type="button"
                                                    class="btn btn-success">Edit</button></a>
                                            <a href="{{ route('product.delete', $p->id) }}"><button type="button"
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
