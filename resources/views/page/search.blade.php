@extends('master')
@section('content')
	<div class="rev-slider">
        <div class="fullwidthbanner-container">
            <div class="fullwidthbanner">
                <div class="bannercontainer" >
                    <div class="banner" >
                        <ul>
                            <!-- THE FIRST SLIDE -->
                            @foreach($slide as $item)
                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{ url('source/image/slide/'.$item->image.'') }}" data-src="{{ url('source/image/slide/'.$item->image.'') }}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$item->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="tp-bannertimer"></div>
            </div>
        </div>
        <!--slider-->
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Tất cả sản phẩm</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($product as $item)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        @if($item->promotion_price == 0)

                                            @else
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{url('detail/'.$item->id.'')}}"><img src="{{ url('source/image/product/'.$item->image.'') }}" alt="" height="250px"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$item->name}}</p>
                                            <p class="single-item-price">
                                                @if($item->promotion_price == 0)
                                                    <span class="flash-sale">{{$item->unit_price}}</span>
                                                @else
                                                    <span class="flash-del">{{$item->unit_price}}</span>
                                                    <span class="flash-sale">{{$item->promotion_price}}</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{url('add/'.$item->id.'')}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{url('detail/'.$item->id.'')}}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                            </div>
                        
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>
						<div class="beta-products-list">
                            <h4>Sản phẩm khuyến mãi</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{ count($product_s) }} sản phẩm </p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($product_s as $item)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

                                        <div class="single-item-header">
                                            <a href="{{url('detail/'.$item->id.'')}}"><img src="{{ url('source/image/product/'.$item->image.'') }}" alt="" height="250px"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$item->name}}</p>
                                            <p class="single-item-price">
                                                <span class="flash-del">{{$item->unit_price}}</span>
                                                <span class="flash-sale">{{$item->promotion_price}}</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{url('add/'.$item->id.'')}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{url('detail/'.$item->id.'')}}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                            </div>
                            
                            <div class="space40">&nbsp;</div>
                       

                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection