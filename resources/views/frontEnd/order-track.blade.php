
@extends('frontEnd.layouts.template')
@section('content')
<br><br><br><br>
@if(session('success'))
        <div class="alert alert-success">
		<button class="close" data-dismiss="alert" aria-label="Close">×</button>
          {{ session('success') }}
        </div> 
    @endif
   <section class="tracking_box_area section_gap py-5">
    <div class="container">
        <div class="tracking_box_inner">
            <p>To track your order please enter your Order ID in the box below and press the "<b>Track</b>" button.<br> This was given
                to you on your receipt and in the confirmation email you should have received.</p>
            <form class="row tracking_form my-4" action="{{route('product.track.order')}}" method="post" novalidate="novalidate">
              @csrf
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control p-2"  name="order_number" placeholder="Enter your order number">
                </div>
                <div class="col-md-8 form-group">
                    <button type="submit" value="submit" class="btn btn-success">Track Order</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection