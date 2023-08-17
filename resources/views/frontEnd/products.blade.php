@extends('frontEnd.layouts.main')
@section('content')
@include('frontEnd.layouts.header')
		 <!-- Breadcrumb Start -->
		 <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
		<!-- SECTION -->
		<div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">UGX20000 - UGX30000</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">UGX10000 - UGX19000</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">UGX0 - UGX9000</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
                

            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
			<div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">All Products</span></h2>
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
                            <p style="font-size: 14px;">UGX{{$product->price}}</p><p style="font-size: 14px;" class="text-muted ml-2"><del>UGX{{$product->discountprice}}</del></p>
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
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
		<!-- /SECTION -->
		@include('frontEnd.layouts.footer')
@endsection