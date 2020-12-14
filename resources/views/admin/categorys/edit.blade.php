@extends('admin.layouts.master')
@section('title','Sửa Category')

@section('content')
<div class="container">
	<div class="col-sm-12">
		<h2 class="">SỬA THỂ LOẠI</h2>
		<hr>
		@if (Session::has('message'))
				<p class="alert alert-success">{{Session::get('message')}}</p>
		@endif
		<form method="POST" action="{{ route('categorys.update',$category->id) }}" class="form-horizontal">
			@csrf
			@method('PUT')
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Tên thể loại</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" value=" {{$category->cate_name}} " id="example-text-input" name="name" placeholder="NHập Tên">
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
