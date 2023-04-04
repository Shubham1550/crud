@extends('admin.layouts.master')
@section('content')
@section('page')
Edit Form
@endsection
@section('name')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Dashboard </li>
@endsection
<section  class="content">
    <div class="container-fluid">
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('brand.update', $brand->id)}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$brand->name}}">
                </div>
                <div class="form-group">
                    <label for="user_id">User ID:</label>
                    <select name="user_id" id="user_id" class="form-control" value="{{$brand->user_id}}">
                        @foreach ($users as $user)
                        <option value="{{$user->id}}" @if ($user->id==$brand->user_id) selected='selected' @endif> {{@$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_id">Product ID:</label>
                    <select name="product_id" id="product_id" class="form-control" value="{{$brand->product_id}}">
                        @foreach ($product as $pro)
                        <option value="{{$pro->id}}" @if ($pro->id==$brand->user_id) selected='selected' @endif> {{@$pro->title}}</option>
                        @endforeach
                    </select>
                </div>
                  </div>

              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
        </div>
      </div>
</section>
@endsection
