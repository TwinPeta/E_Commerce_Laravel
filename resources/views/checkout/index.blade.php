@extends('frontEnd.layouts.main')
@section('content')
 
    <!-- Topbar Start -->

   <!-- this is for the header -->
@include('frontEnd.layouts.header')
  <!-- Breadcrumb Start -->
  <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                <form action="{{url('/submit-checkout')}}" method="post" class="form-horizontal">
                <div class="col-md-6 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <legend>Billing To</legend>
                        <div class="form-group {{$errors->has('billing_name')?'has-error':''}}">
                            <input type="text" class="form-control" name="billing_name" id="billing_name" value="{{$user_login->name}}" placeholder="Billing Name">
                            <span class="text-danger">{{$errors->first('billing_name')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('billing_address')?'has-error':''}}">
                            <input type="email" class="form-control" value="{{$user_login->email}}" name="billing_address" id="billing_address" placeholder="Email Address">
                            <span class="text-danger">{{$errors->first('billing_address')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('billing_city')?'has-error':''}}">
                            <input type="text" class="form-control" name="billing_city" value="{{$user_login->city}}" id="billing_city" placeholder="Billing City">
                            <span class="text-danger">{{$errors->first('billing_city')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('billing_state')?'has-error':''}}">
                            <input type="text" class="form-control" name="billing_state" value="{{$user_login->state}}" id="billing_state" placeholder=" Billing Location">
                            <span class="text-danger">{{$errors->first('billing_state')}}</span>
                        </div>
                       
                        <div class="form-group {{$errors->has('billing_mobile')?'has-error':''}}">
                            <input type="text" class="form-control" name="billing_mobile" value="{{$user_login->mobile}}" id="billing_mobile" placeholder="Billing Mobile">
                            <span class="text-danger">{{$errors->first('billing_mobile')}}</span>
                        </div>

                        <div class="form-group">
                        <input type="checkbox" class="" name="checkme" id="checkme" ><a href="" style="color:blue; margin-left:5px;">Shipping Address same as Billing Address</a> 
                        </div>
                            
                        
                    </div><!--/login form-->
                </div>
                
                
            
            <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group {{$errors->has('shipping_name')?'has-error':''}}">
                                
                                <input class="form-control" name="shipping_name" id="shipping_name" type="text" placeholder="shipping name">
                            </div>
                            
                        
                            <div class="col-md-6 form-group {{$errors->has('shipping_address')?'has-error':''}}">
                                
                                <input class="form-control" type="email" name="shipping_address" id="shipping_address" placeholder="Email Address">
                            </div>

                            
                            <div class="col-md-6 form-group {{$errors->has('shipping_city')?'has-error':''}}">
                               
                                <input class="form-control"  name="shipping_city" value="" id="shipping_city" placeholder="Shipping City">
                            </div>
                            
                            <div class="col-md-6 form-group {{$errors->has('shipping_state')?'has-error':''}}">
                                
                                <input class="form-control" type="text" name="shipping_state" value="" id="shipping_state" placeholder="Shipping Location">
                            </div>
                            
                            <div class="col-md-6 form-group {{$errors->has('shipping_mobile')?'has-error':''}}">
                                
                                <input class="form-control" type="text" name="shipping_mobile" value="" id="shipping_mobile" placeholder="Shipping Mobile">
                            </div>

                            <div class="col-md-6 form-group ">
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Submit
                                </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>


@include('frontEnd.layouts.footer')
@endsection