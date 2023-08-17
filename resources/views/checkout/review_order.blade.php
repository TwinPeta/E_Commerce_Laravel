@extends('frontEnd.layouts.main')
@section('content')
@if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
    <!-- Topbar Start -->

   <!-- this is for the header -->
@include('frontEnd.layouts.header')
<form action="{{url('/submit-order')}}" method="post" class="form-horizontal">
			
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping To</span></h5>
                <!-- codes to push data to order table -->
				@php $total = 0 @endphp
					@if(session('cart'))
						@foreach(session('cart') as $id => $details)
						@php $total += $details['price'] * $details['quantity'] @endphp
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <input type="hidden" name="users_id" value="{{$shipping_address->users_id}}">
                <input type="hidden" name="users_email" value="{{$shipping_address->users_email}}">
                <input type="hidden" name="name" value="{{ $details['price'] }}">
                <input type="hidden" name="address" value="{{$shipping_address->address}}">
                <input type="hidden" name="city" value="{{$shipping_address->city}}">
                <input type="hidden" name="state" value="{{$shipping_address->state}}">
                <input type="hidden" name="pincode" value="{{ $details['p_name'] }}">
                <input type="hidden" name="country" value="{{ $details['quantity'] }}">
                <input type="hidden" name="mobile" value="{{$shipping_address->mobile}}">
                <input type="hidden" name="shipping_charges" value="0">
                <input type="hidden" name="order_status" value="active">
          
				@if(Session::has('discount_amount_price'))
                    <input type="hidden" name="coupon_code" value="{{Session::get('coupon_code')}}">
                    <input type="hidden" name="coupon_amount" value="{{Session::get('discount_amount_price')}}">
                    <input type="hidden" name="grand_total" value="{{$total-Session::get('discount_amount_price')}}">
                @else
                    <input type="hidden" name="coupon_code" value="NO Coupon">
                    <input type="hidden" name="coupon_amount" value="0">
                    <input type="hidden" name="grand_total" value="{{$total}}">
                @endif
				@endforeach
		@endif
         
        <div class="table-responsive cart_info">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                
                                <th>Email Address</th>
                                <th>Shipping City</th>
                                <th>Shipping Location</th>
                                <th>Shipping Mobile</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                
                                <td>{{$shipping_address->address}}</td>
                                <td>{{$shipping_address->city}}</td>
                                <td>{{$shipping_address->state}}</td>
                               <td>{{$shipping_address->mobile}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                <br>
                <div class="review-payment">
                            <h2>Review & Payment</h2>
                        </div>
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed table-hover">
                                <thead class="thead-dark">
                                <tr class="cart_menu">
                                    <th class="image">Item</th>
                                    <th class="description"></th>
                                    <th class="price">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $total = 0 @endphp
								@if(session('cart'))
								@foreach(session('cart') as $id => $details)
									@php $total += $details['price'] * $details['quantity'] @endphp
									@php $price = $details['price'] @endphp
									@php $quantity = $details['quantity'] @endphp
									@php $subtotal = $details['price'] * $details['quantity'] @endphp


								<tr>
                                    <td class="cart_product">
                                        
                                            <a href=""><img src="products/small/{{ $details['image'] }}" alt="" style="width: 100px;"></a>
                                        
                                    </td>
                                    <td class="cart_description">
                                        <p><a href="">{{$details['p_name']}}</a></p>
                                        
                                    </td>
                                    <td class="cart_price">
                                        <p>UGX {{$price}}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <p>{{$quantity}}</p>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">UGX {{$subtotal}}</p>
                                    </td>
                                </tr>
                                @endforeach
        							@endif
                                
                                </tbody>
                            </table>
                        </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>UGX{{ $details['price'] * $details['quantity'] }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                        @if(Session::has('discount_amount_price'))
                            <h6 class="font-weight-medium">Discount</h6>
                            <h6 class="font-weight-medium">UGX {{Session::get('discount_amount_price')}}</h6>
                        @else
                            <h6 class="font-weight-medium">Discount</h6>
                            <h6 class="font-weight-medium">UGX 0.00</h6>
                        @endif
                        </div>
                    </div>
                    <div class="pt-2">
                    
                        <div class="d-flex justify-content-between mt-2">
                        @if(Session::has('discount_amount_price'))
                            <h5>Total</h5>
                            <h5>UGX {{$total-Session::get('discount_amount_price')}}</h5>
                        @else
                            <h5>Total</h5>
                            <h5>UGX{{ $total }}</h5>
                        @endif
                        </div>
                    
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_method" value="COD" checked>
                                <label class="custom-control-label" for="paypal">Cash On Delivery</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="airtelmoney">
                                <label class="custom-control-label" for="directcheck">Airtel Money</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">MTN Mobile Money</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@include('frontEnd.layouts.footer')
@endsection