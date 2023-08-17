<!--Header-part-->
<div id="header">
  <br>
  <h4 style=" margin-left:20px; color:#ffd300;">Admin</h4>
  <h4 style=" margin-left:20px; color:#fff;"> {{Auth::user()->name }}</h4>
</div>
<br>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="">
    <ul class="">
        <li class=""><a title="" href="{{url('/admin/settings')}}"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>   
        <!-- <li class=""></li> -->
        <li class=""><a title="" href="{{url('logout')}}"><i class=""></i> <span class="text">Logout</span></a></li>   
        <
    </ul>
</div>
<div class="user-nav" id="user-nav" style="margin-left:800px; margin-top:5px;">
  <ul>
  <li class="nav-item dropdown no-arrow mx-1">
  <div id="notifications">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="icon icon-bell" aria-hidden="true"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">
            @if(count(Auth::user()->unreadNotifications) >5 )<span data-count="5" class="count">5+</span>
            @else 
                <span class="count" data-count="{{count(Auth::user()->unreadNotifications)}}">{{count(Auth::user()->unreadNotifications)}}</span>
            @endif
        </span>
      </a>
      <!-- Dropdown - Alerts -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
      
      <h6 class="dropdown-header">
          Notifications Center
        </h6>
        
        @foreach(Auth::user()->unreadNotifications as $notification)
    <a class="dropdown-item d-flex align-items-center" target="_blank" href="{{route('admin.notification',$notification->id)}}">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                    <i class="fas {{$notification->data['fas']}} text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">{{$notification->created_at->format('F d, Y h:i A')}}</div>
                    <span class="@if($notification->unread()) font-weight-bold @else small text-gray-500 @endif">{{$notification->data['title']}}</span>
                </div>
            </a>
            @if($loop->index+1==5)
                @php 
                    break;
                @endphp
            @endif
        @endforeach

        <a class="dropdown-item text-center small text-gray-500" href="{{route('all.notification')}}">Show All Notifications</a>
      </div>
</div>
</li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
    <!-- <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button> -->
    
</div>


<!--close-top-serch-->