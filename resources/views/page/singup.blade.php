@extends('master')
@section('content')
	<div class="container">
		<div id="content">
			
			<form action="{{ url('singup')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					@if($errors->any())
						<div class="alter alter-danger">
							<ul>
							@foreach($errors->all() as $error)
								<li>{{$error}} </li>
							@endforeach
							</ul>
						</div>
					@endif
					<div class="col-sm-3"></div>
					@if(Session::has('success'))
						<div class="alter alter-success">{{Session::get('success')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" id="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" name="full_name" id="your_last_name" required>
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" name="address" id="adress" value="Street Address" required>
						</div>
						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" id="phone" required>
						</div>
						<div class="form-block">
							<label for="password">Password*</label>
							<input type="password" name="password" id="password" required>
						</div>
						<div class="form-block">
							<label for="re_password">Re password*</label>
							<input type="password" name="re_password" id="re_password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection