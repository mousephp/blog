@extends('admin.layouts.master')
@section('title','Thêm Author')

@section('content')
<div class="container">
	<div class="col-sm-12">
		<h2 class="">THÊM TÁC GIẢ</h2>
		<hr>
		@if (Session::has('message'))
			<p class="alert alert-success">{{Session::get('message')}}</p>
		@endif

		<form method="post" action="{{route('authors.store')}}" class="form-horizontal" enctype="multipart/form-data">
			@csrf
			@method('POST')
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Tên tác giả</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" value="" id="example-text-input" name="name" placeholder="NHập Tên tác giả">
					@if ($errors->has('name'))
					<p class="alert alert-danger">{{ $errors->first('name') }}</p>
					@endif
				</div>
			</div>	

			<div class="form-group ">
				<label class="col-sm-1">Images</label><br>
				<div class="custom-file col-sm-10">
					<input type="file" class="custom-file-input " name="images" id="customFile">
					<label class="custom-file-label" multiple="multiple" for="customFile">Choose file</label>
					@if ($errors->has('images'))
					<p class="alert alert-danger">{{ $errors->first('images') }}</p>
					@endif					
				</div>
			</div>
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Ngày sinh</label>
				<div class="col-sm-8">
					<input class="form-control" type="date"  value="" id="example-text-input" name="birthday" placeholder="NHập ngày sinh">
					@if ($errors->has('birthday'))
					<p class="alert alert-danger">{{ $errors->first('birthday') }}</p>
					@endif
				</div>
			</div>	
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Địa chỉ</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" value="" id="example-text-input" name="address" placeholder="NHập địa chỉ">
					@if ($errors->has('address'))
					<p class="alert alert-danger">{{ $errors->first('address') }}</p>
					@endif
				</div>
			</div>	
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Tiểu sử</label>
				<div class="col-sm-8">
					<textarea id="category-profile"   class="form-control" name="profile" rows="7" cols="50"></textarea>
					<script type="text/javascript">
						CKEDITOR.replace('category-profile', {
							filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
							filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						});

					</script>
					@if ($errors->has('profile'))
					<p class="alert alert-danger">{{ $errors->first('profile') }}</p>
					@endif
				</select>
				
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
