@extends('master')
@section('content')
	<div class="container">
		<div id="content">
			
			<form action="{{ url('login')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					@if($errors->any())
						<div class="alter alter-danger">
							<ul>
								@foreach($errors->all() as $error)
									<li>{{ $error }} </li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="col-sm-3"></div>
					@if(Session::has('danger'))
						{{Session::get('danger')}}
					@endif
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" id="email" required>
						</div>
						<div class="form-block">
							<label for="password">Password*</label>
							<input type="password" id="password" name="password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection