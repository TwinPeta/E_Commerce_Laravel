@extends('frontEnd.layouts.main')
@section('content')
 
    <!-- Topbar Start -->

   <!-- this is for the header -->
@include('frontEnd.layouts.header')
<!-- Breadcrumb Start -->
@if(session('success'))
        <div class="alert alert-success alert-dismissable  show">
		<button class="close" data-dismiss="alert" aria-label="Close">×</button>
          {{ session('success') }}
        </div> 
    @endif
    
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <!-- <a class="breadcrumb-item text-dark" href="#">Shop</a> -->
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    @if(Session::has('message_coupon'))
        <div class="alert alert-danger text-center" role="alert">
           {{Session::get('message_coupon')}}
     </div>
     @endif
     @if(Session::has('message_apply_sucess'))
        <div class="alert alert-success text-center" role="alert">
           {{Session::get('message_apply_sucess')}}
     </div>
     @endif
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table  id="cart" class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                         
                        <tr data-id="{{ $id }}">
                        <td class="align-middle" data-th="Product"><img src="products/small/{{ $details['image'] }}" alt="" style="width: 50px;"> {{ $details['p_name'] }}</td>
                        <td class="align-middle" data-th="Price">UGX{{ $details['price'] }}</td>
                            
                        <td data-th="Quantity" class="align-middle">
                       <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart"  style="width: 80px;">
                        
                    </td>
                    <td class="align-middle" data-th="Subtotal">UGX{{ $details['price'] * $details['quantity'] }}</td>
                    <td class="align-middle " data-th=""><button class="btn btn-sm btn-danger remove-from-cart" ><i class="fa fa-times"></i></button></td>
                        
                </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
           
            <form action="{{url('/apply-coupon')}}" method="post" role="form" class="mb-30">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="Total_amountPrice" value="{{$total}}">      
            <div class="input-group {{$errors->has('coupon_code')?'has-error':''}}">
                    <input type="text" name="coupon_code" id="coupon_code" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <span class="text-danger">{{$errors->first('coupon_code')}}</span>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Apply Coupon</button>
                </div>
                </div>
            </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>UGX{{ $total }}</h6>
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
                        <a href="{{url('/')}}" class="btn btn-block  font-weight-bold my-3 py-3" style="background-color:#07294d;">Continue Shopping</a>
                        <a href="{{url('/check-out')}}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

@include('frontEnd.layouts.footer')
<script type="text/javascript">
	
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>

<script type="text/javascript">
    (function () {
        var option ={
            facebook: "1988886917502226",
            instagram:"Ishithemes",
            call_to_action: "we are online",
            button_color: "#932C8B",
            position: "right"
            order: "facebook,instagram",
        };
        var proto = document.location.protocol, host = "getbutton.io", url =proto + "//static." + host;
        var s= document.createElement('script'); s.type ="text/javascript"; s.async=true; s.src= url +'/widget-send-button/js/init.js';
        s.onload=function() {
            WhWidgetSendButton.init(host,proto,options);
        };
        var x=document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s,x);
    })();
</script>


@endsection