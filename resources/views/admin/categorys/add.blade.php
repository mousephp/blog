@extends('admin.layouts.master')
@section('title','Thêm Category')

@section('content')
<div class="container">
	<div class="col-sm-12">
		<h2 class="">THÊM THỂ LOẠI</h2>
		<hr>
		{{--@include('../../messages/message')--}}
		@if (Session::has('message'))
			<p class="alert alert-success">{{Session::get('message')}}</p>
		@endif
		<form method="post" action="{{ route('categorys.store') }}" class="form-horizontal">
			@csrf
			@method('POST')
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Tên thể loại</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" value="" id="example-text-input" name="name" placeholder="Nhập Tên loại">

					@if ($errors->has('name'))
					<p class="alert alert-danger">{{ $errors->first('name') }}</p>
					@endif

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















