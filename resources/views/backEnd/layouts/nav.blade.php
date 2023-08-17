<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/admin')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li{{$menu_active==1? ' class=active':''}}><a href="{{url('/admin')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
     
        <li class="submenu {{$menu_active==2? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span></a>
            <ul>
                <li><a href="{{url('/admin/category/create')}}">Add New Category</a></li>
                <li><a href="{{route('category.index')}}">List Categories</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==3? ' active':''}}"> <a href="#"><i class="icon icon-gift"></i> <span>Products</span></a>
            <ul>
                <li><a href="{{url('/admin/product/create')}}">Add New Products</a></li>
                <li><a href="{{route('product.index')}}">List Products</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==4? ' active':''}}"> <a href="#"><i class="icon icon-suitcase"></i> <span>Coupons</span></a>
            <ul>
                <li><a href="{{route('coupon.create')}}">Add New Coupon</a></li>
                <li><a href="{{route('coupon.index')}}">List Coupons</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==5? ' active':''}}"> <a href="#"><i class="icon icon-suitcase"></i> <span>Orders</span></a>
            <ul>
                <li><a href="#">Pending Orders</a></li>
                <li><a href="{{route('orders.index')}}">List Orders</a></li>
            </ul>
        </li>
        @foreach(Auth::user()->unreadNotifications as $notification)
        <li class="submenu {{$menu_active==6? ' active':''}}"> <a href="{{route('admin.notification',$notification->id)}}"><i class="icon icon-suitcase"></i> <span>Notifications</span></a>
            
        </li>
        @if($loop->index+1==5)
                @php 
                    break;
                @endphp
            @endif
        @endforeach
    </ul>
</div>
<!--sidebar-menu-->