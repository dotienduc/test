@extends('master')
@section('content')
	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-4">
							<img src="{{ url('source/image/product/'.$sp->image.'') }}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$sp->name}}</p>
								<p class="single-item-price">
                                                @if($sp->promotion_price == 0)
                                                    <span class="flash-sale">{{number_format($sp->unit_price)}} VND</span>
                                                @else
                                                    <span class="flash-del">{{number_format($sp->unit_price)}}</span>
                                                    <span class="flash-sale">{{number_format($sp->promotion_price)}} VND</span>
                                                @endif
                                            </p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.</p>
							</div>
							<div class="space20">&nbsp;</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
							<p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự </h4>
						<div class="row">
							@foreach($sp_tuongtu as $item)
							<div class="col-sm-4">
								<div class="single-item">
									@if($item->promotion_price == 0)

									@else
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="#"><img src="{{ url('source/image/product/'.$item->image.'') }}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$item->name}}</p>
										<p class="single-item-price">
                                                @if($item->promotion_price == 0)
                                                    <span class="flash-sale">{{number_format($item->unit_price)}} VND</span>
                                                @else
                                                    <span class="flash-del">{{number_format($item->unit_price)}}</span>
                                                    <span class="flash-sale">{{number_format($item->promotion_price)}} VND</span>
                                                @endif
                                            </p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{ $sp_tuongtu->links() }}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Siêu khuyến mãi</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sale as $item)
								<div class="media beta-sales-item">
									@if($item->promotion_price == 0)

									@else
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<a class="pull-left" href="{{ url('detail/'.$item->id.'')}}"><img src="{{ url('source/image/product/'.$item->image.'') }}" alt=""></a>
									<div class="media-body">
										{{$item->name}}
										<span class="beta-sales-price">{{number_format($item->promotion_price)}}</span>
									</div>
								</div>
								@endforeach
								
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Loại sản phẩm khác </h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sp_loai as $item)
								<div class="media beta-sales-item">
									<a class="pull-left" 
									href="{{url('loaisanpham/'.$item->id.'')}}">
									<img src="{{ url('source/image/product/'.$item->image.'') }}" alt=""></a>
									<div class="media-body">
										{{$item->name}}
			
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection