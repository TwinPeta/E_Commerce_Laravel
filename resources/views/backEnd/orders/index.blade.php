@extends('backEnd.layouts.master')
@section('title','List Orders')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('coupon.index')}}" class="current">Coupons</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>List Orders</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client ID</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>GrandTotal</th>
                        <th>Telephone</th>
                        <th>Address</th>
                        <th>payment method</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; ?>
                    @foreach($order as $orders)
                        <?php $i++; ?>
                        <tr class="gradeC">
                            <td>{{$i}}</td>
                            <td style="vertical-align: middle;">{{$orders->users_id}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$orders->pincode}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$orders->name}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$orders->country}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$orders->grand_total}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$orders->mobile}} </td>
                            <td style="text-align: center; vertical-align: middle;">{{$orders->address}} </td>
                            <td style="text-align: center; vertical-align: middle;">{{$orders->payment_method}}</td>
                            <td style="text-align: center; vertical-align: middle;"><a href="" style="background:#ffa500; color:white;" class="btn btn-secondary btn-mini">{{$orders->order_status}}</a></td>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="" class="btn btn-secondary btn-mini" style="background:teal; color:white;">View</a>
                                <!-- <a href="javascript:" rel="" rel1="delete-coupon" class="btn btn-danger btn-mini deleteRecord">Delete</a> -->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.tables.js')}}"></script>
    <script src="{{asset('js/matrix.popover.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Are you sure?',
                text:"You won't be able to revert this!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it!',
                cancelButtonText:'No, cancel!',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            });
        });
    </script>
@endsection