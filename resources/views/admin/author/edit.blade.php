@extends('admin.layouts.master')
@section('title','Sửa Author')

@section('content')

<div class="container">
	<div class="col-sm-12">
		<h2 class=""> TÁC GIẢ</h2>
		<hr>
		@if (Session::has('message'))
			<p class="alert alert-success">{{Session::get('message')}}</p>
		@endif 

		<form method="post" action="{{route('authors.update',$author->id)}}" class="form-horizontal" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Tên tác giả</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" value="{{$author->author_name}}" id="example-text-input" name="name" placeholder="NHập Tên tác giả">
					@if ($errors->has('name'))
					<p class="alert alert-danger">{{ $errors->first('name') }}</p>
					@endif
				</div>
			</div>	

			<div class="form-group ">
				<label class="col-sm-1">Images</label><br>
				<p><img src="../../{{$author->author_image}}" style="width: 150px;"></p>

				<div class="custom-file col-sm-10">
					<input type="file" class="custom-file-input " name="image" id="customFile">
					<label class="custom-file-label"  multiple="multiple"  for="customFile">Choose file</label>
					@if(Session::has('error'))
					<p class="alert alert-danger">{{Session::get('error')}}</p>
					@endif
				</div>
			</div>
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Ngày sinh</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" value="{{$author->author_birthday}}" id="example-text-input" name="birthday" placeholder="NHập ngày sinh">
				</div>
			</div>	
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Địa chỉ</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" value="{{$author->author_address}}" id="example-text-input" name="address" placeholder="NHập địa chỉ">
				</div>
			</div>	
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Tiểu sử</label>
				<div class="col-sm-8">
					<textarea id="category-profile" class="ckeditor" name="profile" rows="7" cols="50">{{$author->author_profile}}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('category-profile', {
							filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
							filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						});

					</script>
				</select>
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
