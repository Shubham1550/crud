@extends('admin.layouts.master')
@section('content')
@section('page')
Product Form
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
              <h3 class="card-title">Product Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Title:</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" id="editor" cols="30" rows="5" placeholder="Enter description"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <div id="thumb-output"></div>
                    <input type="file" class="form-control" id="image" aria-describedby="emailHelp" name="image">
                </div>
                <div class="form-group">
                    <label for="title">Select Category:</label>
                    <select name="category_id" select id="category_id" class="form-control" >
                        <option value="{{old('category_id')}}" class="option_color">Select Category</option>
                        @foreach ($categories as $c )
                        <option value="{{$c->id}}">{{$c->name}}</option>

                        @endforeach
                    </select>
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
