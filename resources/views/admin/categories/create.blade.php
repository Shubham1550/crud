@extends('admin.layouts.master')
@section('content')
@section('page')
Category Form
@endsection
@section('name')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Dashboard </li>
@endsection
<section class="content">
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
              <h3 class="card-title">Category Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="name" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="status">Status:</label>
                  <select name="status" id="status" aria-describedby="emailHelp" class="form-control">
                    <option value="0">Active</option>
                    <option value="1">Deactive</option>
                </select>
                </div>
                <div class="form-group">
                  {{-- <label for="image">Image:</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" id="thumb-output" for="image">Choose image</label>
                    </div>
                  </div>
                </div> --}}
                <div class="form-group">
                    <label for="image">Image:</label>
                    <div id="thumb-output"></div>
                    <input type="file" class="form-control" id="image" aria-describedby="emailHelp" name="image">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
