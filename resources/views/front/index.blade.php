@extends('front.layouts.master')
@include('front.layouts.header')
@section('content')
<div class="site-wrap">
    <div class="site-blocks-cover" style="background-image: url({{asset('images/hero_1.jpg')}});" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2">Finding Your Perfect Shoes</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4">The customer is very important, the customer will be followed by the customer. The boat at the target as A complete layer of tincidunt fringilla. </p>
              <p>
                <a href="{{route('front.shop')}}" class="btn btn-sm btn-primary">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Shipping</h2>
              <p>The customer is very important, the customer will be followed by the customer. The boat at the target as A complete layer of tincidunt fringilla.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Returns</h2>
              <p>The customer is very important, the customer will be followed by the customer. The boat at the target as A complete layer of tincidunt fringilla.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Customer Support</h2>
              <p>The customer is very important, the customer will be followed by the customer. The boat at the target as A complete layer of tincidunt fringilla.</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            @foreach ($category as $c)
            <a class="block-2-item" href="#">
              <figure class="block-4-image">
                <img src="{{asset('image/' . $c->image)}}" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>{{$c->name}}</h3>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>


    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
                @foreach ($products as $pro)
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <a href="{{route('front.shop_single',$pro->id)}}"><img src="{{asset('image/'. $pro->image)}}" alt="Image placeholder" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">{{$pro->title}}</a></h3>
                    <p class="mb-0">{!! Str::words($pro->description, 5, ' ...') !!}</p>
                    <p class="text-primary font-weight-bold">&#8377;{{$pro->price}}.00</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="site-section block-8">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Big Sale!</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 mb-5">
            <a href="#"><img src="{{asset('images/blog_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded"></a>
          </div>
          <div class="col-md-12 col-lg-5 text-center pl-md-5">
            <h2><a href="#">50% less in all items</a></h2>
            <p class="post-meta mb-4">By <a href="#">Carl Smith</a> <span class="block-8-sep">&bullet;</span> September 3, 2018</p>
            <p>It is very important for the customer to pay attention to the adipiscing process. Whosoever doeth this pain of the accusers of the body, let him flee from the mellow of the soul. Out, come?</p>
            <p><a href="{{route('front.shop')}}" class="btn btn-primary btn-sm">Shop Now</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('front.layouts.footer')
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>

    	$(document).on("click", ".addtowishlist", function(event) {

		event.preventDefault();
        const base_url = "http://127.0.0.1:85";
		const id = $(this).data('id');
        // alert('hrllo');

		$.ajax({
			type : 'GET',
            url: '/add_to_wishlist/' + id,
			dataType:"json",

			success: function (response) {
				var msgType = response.msgType;
				var msg = response.msg;

				if (msgType == "success") {
					onSuccessMsg(msg);
				} else {
					onErrorMsg(msg);
				}
				onWishlist();
			}
		});
    });

    $(document).on("click", ".site-cart", function(event) { //classname
		event.preventDefault();

		const qty = $("#quantity").val();//idname
		const id = $(this).data('id');
// alert('hello');
// console.log("success");

		$.ajax({
			type : 'GET',
			url: '/add_to_cart/' + id,
			dataType:"json",

			success: function (response) {
				var msgType = response.msgType;
				var msg = response.msg;
  alert('msg');
				if (msgType == "success") {
					onSuccessMsg(msg);
				} else {
					onErrorMsg(msg);
				}
				onViewCart();
			}
		});
    });
</script>
