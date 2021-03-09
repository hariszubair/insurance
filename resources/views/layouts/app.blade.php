
@include('layouts.header')
  @include('layouts.topnav')   
@include('layouts.sidemenue')
<div class="nk-content-body">
                                <div class="nk-content-wrap">
                                     @yield('content')
                                </div>
  @include('layouts.footer')  