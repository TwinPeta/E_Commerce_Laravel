@extends('frontEnd.layouts.main')
@section('content')
@include('frontEnd.layouts.header')
        <br><br><br>
    <div class="container">
        <h3 class="text-center">YOUR ORDER HAS BEEN PLACED</h3>
        <p class="text-center">Thanks for your Order that use Options on Cash On Delivery</p>
        <p class="text-center">We will contact you by Your Email (<b>{{$user_order->users_email}}</b>) or Your Phone Number (<b>{{$user_order->mobile}}</b>)</p>
    </div>
    <div style="margin-bottom: 20px;"></div>
    @include('frontEnd.layouts.footer')
@endsection