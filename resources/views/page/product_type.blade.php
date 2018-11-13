@extends('master')
@section('content')
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							<li><a href="#">Typography</a></li>
							<li><a href="#">Buttons</a></li>
							<li><a href="#">Dividers</a></li>
							<li><a href="#">Columns</a></li>
							<li><a href="#">Icon box</a></li>
							<li><a href="#">Notifications</a></li>
							<li><a href="#">Progress bars and Skill meter</a></li>
							<li><a href="#">Tabs</a></li>
							<li><a href="#">Testimonial</a></li>
							<li><a href="#">Video</a></li>
							<li><a href="#">Social icons</a></li>
							<li><a href="#">Carousel sliders</a></li>
							<li><a href="#">Custom List</a></li>
							<li><a href="#">Image frames &amp; gallery</a></li>
							<li><a href="#">Google Maps</a></li>
							<li><a href="#">Accordion and Toggles</a></li>
							<li class="is-active"><a href="#">Custom callout box</a></li>
							<li><a href="#">Page section</a></li>
							<li><a href="#">Mini callout box</a></li>
							<li><a href="#">Content box</a></li>
							<li><a href="#">Computer sliders</a></li>
							<li><a href="#">Pricing &amp; Data tables</a></li>
							<li><a href="#">Process Builders</a></li>
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Tất cả sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ count($type_sanpham)}} sản phẩm </p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($type_sanpham as $item)
								<div class="col-sm-4">
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
							<h4>Sản phẩm khuyến mãi </h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($type_sanpham_km)}}
								sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($type_sanpham_km as $item)
								<div class="col-sm-4">
									<div class="single-item">
										@if($item->promotion_price == 0)

                                            @else
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
										<div class="single-item-header">
											<a href="product.html"><img src="{{ url('source/image/product/'.$item->image.'') }}" alt="" height="250px"></a>
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
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
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
