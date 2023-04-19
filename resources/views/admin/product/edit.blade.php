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
            <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Title:</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{$product->title}}">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" id="editor" cols="30" rows="5" placeholder="Enter description" value="{{$product->description}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <div id="thumb-output"></div>
                    <input type="file" class="form-control" id="image" aria-describedby="emailHelp" name="image" value="{{$product->image}}">
                </div>
                <div class="form-group">
                    <label for="category">Select Category:</label>
                    <select name="category_id" select id="category_id" class="form-control" >
                        @foreach ($categories as $c )
                        <option value="{{$c->id}}" @if($c->id==$product->category_id) selected='selected' @endif>{{$c->name}}</option>

                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="sizes">Select Sizes:</label>
                    <select name="sizes" select id="sizes"  class="form-control"  selected='selected'>
                        <option value="" class="option_color">{{$product->sizes}}</option>
                        <option value="M" >Small</option>
                        <option value="L" >Medium</option>
                        <option value="X" >Large</option>
                        <option value="XL">Extra Large</option>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="brand">Select Brand:</label>
                    <select name="brand_id" select id="brand_id" class="form-control" >
                        @foreach ($brand as $b )
                        <option value="{{$b->id}}" @if($b->id==$product->brand_id) selected='selected' @endif>{{$b->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="color">Select Color:</label>
                    <select name="color_id" select id="color_id" class="form-control" >
                        @foreach ($color as $c )
                        <option value="{{$c->id}}" @if($c->id==$product->color_id) selected='selected' @endif>{{$c->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="user">Select User:</label>
                    <select name="user_id" select id="user_id" class="form-control" >
                        @foreach ($user as $u )
                        <option value="{{$u->id}}" @if($u->id==$product->user_id) selected='selected' @endif>{{$u->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="t_quantity">Total Quantity:</label>
                    <input type="number" class="form-control" id="t_quantity" name="t_quantity" placeholder="Enter total quantity" value="{{$product->t_quantity}}">
                  </div>
                  <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" value="{{$product->price}}">
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
