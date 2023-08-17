@extends('frontEnd.layouts.main')
@section('content')
   
    <!-- Topbar Start -->

   <!-- this is for the header -->
@include('frontEnd.layouts.header')

  <!-- end top nav bar -->
    <!-- Carousel Start -->

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item" href="index.html">Home</a>
                    <span class="breadcrumb-item active">Signin</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary ">Sign In</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success">
                    <div class="container">
				<!-- row -->
                    @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message')}}
                </div>
               @endif
                    </div>
                    <form   action="{{url('/user_login')}}" method="post">
                       @csrf 
                       <div class="form-group">
							<input type="email" name="email" class="form-control" >
							<span class="text-danger">{{$errors->first('email')}}</span>
						</div>
                        <div class="form-group">
							<input type="password" name="password" class="form-control"  >
							<span class="text-danger">{{$errors->first('password')}}</span>
						</div>
                        <!-- <div>
                            <input class="btn btn-primary py-2 px-4" type="checkbox">
                            Remember Me?
                        </div> -->
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">signin
                                </button>
                                <a href="#" class=" py-1 px-3" style="color:#007bff;">Forgot Password?</a>
                        </div>
                        <h6 class="text-capitalize mt-4 mb-3">Don't have an Account? <a class="text-blue" href="{{url('/register_page')}}">Signup</a></h6>
                        <h6 class="text-blue text-lowercase mt-4 mb-3">Or signin with</h6>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-google"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square" href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                    </form>
                </div>
            </div>
          
        </div>
    </div>
    <!-- Contact End -->
  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
            <p class="mb-4">Tisha Solution Limited was incorporated in the year 2021 as a private limited company having its head quarters located at Nakawa</p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, Nakawa, MUBS</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@tishasolutions.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+0256701861283</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                    <p>Subscribe to us for latest products and brands</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Your Email Address" style="border-top-left-radius: 99999px;
                            border-bottom-left-radius: 99999px;">
                            <div class="input-group-append">
                                <button class="btn btn-primary" style="border-top-right-radius: 99999px;
                                border-bottom-right-radius: 99999px;">Sign Up</button>
                            </div>
                        </div>
                    </form>
                    <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-secondary">
                &copy; <a class="text-primary" href="#">tishasolutions</a>. All Rights Reserved. Designed
                by
                <a class="text-primary" href="#">Mosh</a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="img/payments.png" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

@endsection