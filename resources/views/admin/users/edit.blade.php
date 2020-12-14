@extends('admin.layouts.master')
@section('title','Sửa Users')

@section('content')
<div class="container">
	<div class="col-sm-12">
		<h2 class="">SỬA USERS</h2>
		<hr>
		@if (Session::has('message'))
			<p class="alert alert-success">{{Session::get('message')}}</p>
		@endif
		<form method="post" action="{{route('users.update',$user->id)}}" class="form-horizontal">
			@csrf
			@method('PUT')
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" value="{{$user->name}}" readonly id="example-text-input" name="user_name" placeholder="NHập Tên usres">
					@if ($errors->has('user_name'))
					<p class="alert alert-danger">{{ $errors->first('user_name') }}</p>
					@endif
				</div>
			</div>	
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-8">
					<input class="form-control" type="email" value="{{$user->email}}" id="example-text-input" name="user_email" placeholder="NHập email">
					@if ($errors->has('user_email'))
					<p class="alert alert-danger">{{ $errors->first('user_email') }}</p>
					@endif
				</div>
			</div>	
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Nhập Password cũ</label>
				<div class="col-sm-8">
					<input class="form-control" type="Password" value="" id="example-text-input" name="user_password" placeholder="NHập Password">
					@if ($errors->has('user_password'))
					<p class="alert alert-danger">{{ $errors->first('user_password') }}</p>
					@endif
				</div>
			</div>
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Nhập Password mới</label>
				<div class="col-sm-8">
					<input class="form-control" type="Password" value="" id="example-text-input" name="user_password_new" placeholder="NHập Password">
					@if ($errors->has('user_password_new'))
					<p class="alert alert-danger">{{ $errors->first('user_password_new') }}</p>
					@endif
				</div>
			</div>
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-3 col-form-label">Xác nhận Password mới</label>
				<div class="col-sm-8">
					<input class="form-control" type="Password" value="" id="example-text-input" name="user_password_again" placeholder="NHập Password">
					@if ($errors->has('user_password_again'))
					<p class="alert alert-danger">{{ $errors->first('user_password_again') }}</p>
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
					<input type="submit" name="submit" value="Sửa" class="btn btn-primary">
					<a href="#" class="btn btn-danger">Hủy bỏ</a>
				</div>
			</div>	
		</form>
	</div>
</div>
@endsection

