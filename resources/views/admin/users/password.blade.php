@extends('admin.layouts.master')
@section('title','update password Users')

@section('content')
<div id="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Overview</li>
		</ol>

		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<h2 class="text-center">SỬA PASSWORD</h2>
				@if (Session::has('message'))
					<p class="alert alert-success">{{Session::get('message')}}</p>
				@endif

				<form class="form-horizontal " action="" method="post">
					@csrf
					@method('POST')
					<div class="form-group ">
						<label for="example-text-input" class="col-sm-4 col-form-label">Nhập Password cũ</label>
						<div class="">
							<input class="form-control" type="password"  value="" id="example-text-input" name="user_password" placeholder="Nhập Password">	
							@if ($errors->has('user_password'))
							<p class="alert alert-danger">{{ $errors->first('user_password') }}</p>
							@endif
						</div>
					</div>	
					<div class="form-group ">
						<label for="example-text-input" class="col-sm-4 col-form-label">Nhập Password mới</label>
						<div class="">
							<input class="form-control" type="password"  value="" id="example-text-input" name="user_password_new" placeholder="Nhập Password mới">
							<a href="javascript:;void(0)" style="position: absolute;top: 20%;right: 24px;color: #333;"><i class="fa fa-eye"></i></a>	
							@if ($errors->has('user_password_new'))
							<p class="alert alert-danger">{{ $errors->first('user_password_new') }}</p>
							@endif
						</div>
					</div>
					<div class="form-group ">
						<label for="example-text-input" class="col-sm-4 col-form-label">Xác nhận Password mới</label>
						<div class="">
							<input class="form-control" type="password"  value="" id="example-text-input" name="password_confirmation" placeholder="Xác nhận Password mới">
							<a href="javascript:;void(0)" style="position: absolute;top: 20%;right: 24px;color: #333;"><i class="fa fa-eye"></i></a>
							@if ($errors->has('password_confirmation'))
							<p class="alert alert-danger">{{ $errors->first('password_confirmation') }}</p>
							@endif	
						</div>
					</div>	

					<input type="reset" name="reset" value="Nhập lại"  class="btn btn-lg btn-danger">
					<input type="submit" name="submit" value="update password" class="btn btn-lg btn-success">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection









