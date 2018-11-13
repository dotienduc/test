<div class="header-top">
    <div class="container">
        <div class="pull-left auto-width-left">
            <ul class="top-menu menu-beta l-inline">
                <li><a href=""><i class="fa fa-home"></i> Đức Kudo City </a></li>
                <li><a href=""><i class="fa fa-phone"></i> 0163 284 8383</a></li>
            </ul>
        </div>
        <div class="pull-right auto-width-right">
            <ul class="top-details menu-beta l-inline">
                @if(Auth::check())
                    <li><a href="#"><i class="fa fa-user"></i>Chào bạn,  {{Auth::user()->full_name}}</a></li>
                    <li><a href="{{ url('logout')}}">Đăng xuất</a></li>
                @else
                <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                <li><a href="{{ url('singup')}}">Đăng kí</a></li>
                <li><a href="{{ url('login')}}">Đăng nhập</a></li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- .container -->
</div> <!-- .header-top -->