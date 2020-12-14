@extends('admin.layouts.master')
@section('title','Thêm Users')

@section('content')
<div class="container">
	<div class="col-sm-12">
		<h2 class="">THÊM USERS</h2>
		<hr>
		@if (Session::has('message'))
			<p class="alert alert-success">{{Session::get('message')}}</p>
		@endif
		<form method="post" action="{{route('users.store')}}" class="form-horizontal">
			@csrf
			@method('POST')
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" value="" id="example-text-input" name="user_name" placeholder="NHập Tên usres">
				</div>
				@if ($errors->has('user_name'))
				<p class="alert alert-danger">{{ $errors->first('user_name') }}</p>
				@endif
			</div>	
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-8">
					<input class="form-control" type="email" value="" id="example-text-input" name="user_email" placeholder="NHập email">
				</div>
				@if ($errors->has('user_email'))
				<p class="alert alert-danger">{{ $errors->first('user_email') }}</p>
				@endif
			</div>	
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-8">
					<input class="form-control" type="Password" value="" id="example-text-input" name="user_password" placeholder="NHập Password">
				</div>
				@if ($errors->has('user_password'))
				<p class="alert alert-danger">{{ $errors->first('user_password') }}</p>
				@endif
			</div>
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label"> Nhập lại Password</label>
				<div class="col-sm-8">
					<input class="form-control" type="Password" value="" id="example-text-input" name="password_confirmation" placeholder="NHập Password">
					@if ($errors->has('password_confirmation'))
					<p class="alert alert-danger">{{ $errors->first('password_confirmation') }}</p>
					@endif
				</div>
				
			</div>
			
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Quyền</label>
				<div class="col-sm-8">
					<input type="radio" checked name="permission" value="1">1
					<input type="radio" name="permission" value="2">2
					<input type="radio" name="permission" value="3">3  
					<br> 
				</div>
			</div>	

			<div class="form-group text-center">
				<div class="col-sm-8">
					<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
					<a href="#" class="btn btn-danger">Hủy bỏ</a>
				</div>
			</div>	
		</form>
	</div>
</div>
@endsection

