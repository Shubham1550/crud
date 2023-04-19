@extends('front.layouts.master')
@include('front.layouts.header')
@section('content')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{route('front.index')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
      </div>
    </div>
  </div>
  <div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Latest
                  </button>
                  @foreach ($category as $c)
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <a class="dropdown-item" href="#">{{$c->name}}</a>
                  </div>
                  @endforeach
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="#">Relevance</a>
                    <a class="dropdown-item" href="#">Name, A to Z</a>
                    <a class="dropdown-item" href="#">Name, Z to A</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Price, low to high</a>
                    <a class="dropdown-item" href="#">Price, high to low</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">

            @foreach ($products as $pro)
            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
              <div class="block-4 text-center border">
                <figure class="block-4-image">
                  <a href="{{route('front.shop_single',$pro->id)}}"><img src="{{asset('image/'. $pro->image)}}" alt="Image placeholder" class="img-fluid"></a>
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="{{route('front.shop_single',$pro->id)}}">{{{$pro->title}}}</a></h3>
                  <p class="mb-0">{!! Str::words($pro->description, 3, ' ...') !!}</p>
                  <p class="text-primary font-weight-bold">₹{{$pro->price}}.00</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">
          <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
            <ul class="list-unstyled mb-0">
                @foreach ($category as $c)
              <li class="mb-1"><a href="#" class="d-flex"><span>{{$c->name}}</span> <span class="text-black ml-auto">(2,220)</span></a></li>
              @endforeach
            </ul>
          </div>

          <div class="border p-4 rounded mb-4">
            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
              <div id="slider-range" class="border-primary"></div>
              <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
            </div>

            <div class="mb-4">

              <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
              @foreach ($products as $pro)
              <label for="s_sm" class="d-flex">
                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">{{$pro->sizes}} (2,319)</span>
              </label>
              @endforeach
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
              @foreach ($color as $c)
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-dark color d-inline-block rounded-circle mr-2"></span> <span class="text-black">{{$c->name}} (2,429)</span>
              </a>
              @endforeach
            </div>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="site-section site-blocks-2">
              <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7 site-section-heading pt-4">
                  <h2>Categories</h2>
                </div>
              </div>
              @foreach ($category as $c)
              <div class="row">
                <div class="col-sm-12 col-lg-4 mb-4">
                  <a class="block-2-item" href="#">
                    <figure class="block-4-image">
                      <img src="{{asset('image/' . $c->image)}}" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                      <span class="text-uppercase">Collections</span>
                      <h3>{{$c->name}}</h3>
                    </div>
                  </a>
                </div>
              </div>
              @endforeach
          </div>
        </div>
      </div>

    </div>
  </div>
@include('front.layouts.footer')
@endsection
