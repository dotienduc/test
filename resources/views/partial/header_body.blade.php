<div class="header-body">
    <div class="container beta-relative">
        <div class="pull-left">
            <a href="{{url('index')}}" id="logo"><img src="{{ url('source/assets/dest/images/logo-cake.png') }}" width="200px" alt=""></a>
        </div>
        <div class="pull-right beta-components space-left ov">
            <div class="space10">&nbsp;</div>
            <div class="beta-comp">
                <form role="search" method="get" id="searchform" action="{{ url('search')}}">
                    <input type="text"  name="key" id="key" placeholder="Nhập từ khóa..." />
                    <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                </form>
            </div>

            <div class="beta-comp">
                @if(Session::has('cart'))
                <div class="cart">
                    <div class="beta-select"><i class="fa fa-shopping-cart"></i> 
                        Giỏ hàng (@if(Session::has('cart')) {{Session('cart')->totalQty}}
                        @else Trống @endif) <i class="fa fa-chevron-down"></i></div>
                
                    <div class="beta-dropdown cart-body">
                        @foreach($product_cart as $product)
                        <div class="cart-item">
                            <a class="cart-item-delete" href="{{ url('del/'.$product['item']['id'].'')}}">
                                <i class="fafa-times">X</i>
                            </a>
                            <div class="media">
                                <a class="pull-left" href="#"><img src="{{ url('source/image/product/'.$product['item']['image'].'') }}" alt=""></a>
                                <div class="media-body">
                                    <span class="cart-item-title">{{$product['item']['name']}}</span>
                                    @if($product['item']['promotion_price'] == 0)
                                    <span class="cart-item-amount">
                                        {{$product['qty']}}*<span>
                                        {{number_format($product['item']['unit_price'])}} VND</span></span>
                                        @else
                                        <span class="cart-item-amount">
                                        {{$product['qty']}}*<span>
                                        {{number_format($product['item']['promotion_price'])}} VND</span></span>
                                        @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="cart-caption">
                            <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} VND</span></div>
                            <div class="clearfix"></div>

                            <div class="center">
                                <div class="space10">&nbsp;</div>
                                <a href="{{url('checkout')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div> <!-- .cart -->
                @endif 
            </div>
        </div>
        <div class="clearfix"></div>
    </div> <!-- .container -->
</div> <!-- .header-body -->