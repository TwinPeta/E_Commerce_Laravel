@extends('frontEnd.layouts.main')
@section('content')

    <!-- Topbar Start -->

   <!-- this is for the header -->
@include('frontEnd.layouts.header')

  <!-- end top nav bar -->
  @if(session('success'))
        <div class="alert alert-success alert-dismissable  show">
		<button class="close" data-dismiss="alert" aria-label="Close">×</button>
          {{ session('success') }}
        </div> 
    @endif
    
    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="assets/img/background.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Natural Honey</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Get your self the best qality honey products from Tisha Solutions Limited</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#more">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="assets/img/2.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Made of More</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Get your self the best qality honey products from Tisha Solutions Limited</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#more">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="assets/img/background2.png" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">The Natural Honey</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Get your self the best qality honey products from Tisha Solutions Limited</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#more">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="assets/img/background2.png" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 30%</h6>
                        <h3 class="text-white mb-3">Offer of the Day</h3>
                        <a href="#more" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="assets/img/2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 50%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="#more" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3" id="more">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
        <div class="row px-xl-5">
        @foreach($products as $product)
            @if($product->category->status==1)

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <form action="{{ route('add.to.cart', $product->id) }}" method="get">
					@csrf
                    <a href="{{url('/product-detail',$product->id)}}">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{url('products/small/',$product->image)}}" alt="">
                        <div class="product-action">
                            <button type="submit" class="btn btn-outline-dark btn-square" ><i class="fa fa-shopping-cart"></i></button>
                            <button class="btn btn-outline-dark btn-square" ><i class="far fa-heart"></i></button>
                            <button class="btn btn-outline-dark btn-square" ><i class="fa fa-sync-alt"></i></button>
                            <button class="btn btn-outline-dark btn-square" ><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{$product->name}}</a>
                        <p class="h6 text-decoration-none text-truncate">{{$product->description}}</p>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>UGX{{$product->price}}</h5><h6 class="text-muted ml-2"><del>UGX{{$product->discountprice}}</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
                </a>
</form>
            </div>
            @endif
            @endforeach

        </div>
    </div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <!-- <img class="img-fluid" src="assets/img/new/VID-20220408-WA0027.mp4" alt=""> -->
                    <video width="100%" class="img-fluid" height="100%" loop autoplay muted arial-controls>
                        <source src="assets/img/new/VID-20220408-WA0027.mp4" type=video/mp4>
                  </video>
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="assets/img/background.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


     <!-- Products Start -->
     <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
        <div class="row px-xl-5">
        @foreach($products as $product)
            @if($product->category->status==1)

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <form action="{{ route('add.to.cart', $product->id) }}" method="get">
					@csrf
                    <a href="{{url('/product-detail',$product->id)}}">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{url('products/small/',$product->image)}}" alt="">
                        <div class="product-action">
                            <button type="submit" class="btn btn-outline-dark btn-square" ><i class="fa fa-shopping-cart"></i></button>
                            <button class="btn btn-outline-dark btn-square" ><i class="far fa-heart"></i></button>
                            <button class="btn btn-outline-dark btn-square" ><i class="fa fa-sync-alt"></i></button>
                            <button class="btn btn-outline-dark btn-square" ><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{$product->name}}</a>
                        <p class="h6 text-decoration-none text-truncate">{{$product->description}}</p>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>UGX{{$product->price}}</h5><h6 class="text-muted ml-2"><del>UGX{{$product->discountprice}}</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
                </a>
</form>
            </div>
            @endif
            @endforeach

        </div>
    </div>
    <!-- Products End -->

    @include('frontEnd.layouts.footer')

    @php $total = 0 @endphp
        @if(session('cart'))
         @foreach(session('cart') as $id => $details)
        @php $total += $details['price'] * $details['quantity'] @endphp
        @endforeach
           @endif

@endsection
