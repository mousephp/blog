@extends('admin.layouts.master')
@section('title','Thêm Tags')

@section('content')
<div class="container">
	<div class="col-sm-12">
		<h2 class="">THÊM TAGS</h2>
		<hr>
		@if (Session::has('message'))
			<p class="alert alert-success">{{Session::get('message')}}</p>
		@endif

		<form method="post" action="{{route('tags.store')}}" class="form-horizontal" >
			@csrf
			@method('POST')
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Tên Tags</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" value="" id="example-text-input" name="name" placeholder="Nhập Tags">
				</div>
				@if ($errors->has('name'))
					<p class="alert alert-danger">{{ $errors->first('name') }}</p>
				@endif
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

