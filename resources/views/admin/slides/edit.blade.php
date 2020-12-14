@extends('admin.layouts.master')
@section('title','Sửa Slides')

@section('content')
<div class="container">
	<div class="col-sm-12">
		<h2 class="">THÊM SILDES</h2>
		<hr>
		@if (Session::has('message'))
		<p class="alert alert-success">{{Session::get('message')}}</p>
		@endif
		<form method="post" action="{{route('slides.update',$slide->id)}}"  class="form-horizontal" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Tên Slides</label>
				<div class="col-sm-8">							
					<input class="form-control" type="text" value="{{$slide->slide_title}}" id="example-text-input" name="name" placeholder="NHập Tên slides">
				</div>
			</div>	

			<div class="form-group ">
				<label class="col-sm-1">Images</label><br>
				<p><img src="{{asset(''.$slide->slide_image)}}" style="width: 150px;"></p>
				<div class="custom-file col-sm-10">
					<input type="file" class="custom-file-input " name="image" id="customFile">
					<label class="custom-file-label" for="customFile">Choose file</label>
				</div>
			</div>
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Nội dung</label>
				<div class="col-sm-8">
					<textarea id="category-description"  class="form-control" name="description">{{$slide->slide_content}}</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('category-description', {
							filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
							filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						});

					</script>
				</div>
			</div>	
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-4 col-form-label">chọn tác giả</label>
				<div class="col-sm-8">
					<select class="form-control input-width" name="author">
						@foreach($author as $value)
						<option
						@if($slide->author_id==$value->id)
						{{'selected'}}@endif
						value="{{$value->id}}">{{$value->auth_name}}		
					</option>
					@endforeach
				</select>
			</div>
		</div>	
		<div class="form-group ">
			<label for="example-text-input" class="col-sm-4 col-form-label">Chọn thể loại</label>
			<div class="col-sm-8">
				<select class="form-control input-width" name="category">
					@foreach($category as $value)
					<option @if($slide->cate_id == $value->id)
						{{'selected'}} @endif
						value="{{$value->id}}" >{{$value->cate_name}} </option>
						@endforeach
					</select>
				</div>
			</div>	

			<div class="form-group text-center">
				<div class="col-sm-8">
					<input type="submit" name="submit" value="Sửa" class="btn btn-primary">
					<a href="#" class="btn btn-danger">Hủy bỏ</a>
				</div>
			</div>	
		</div>
	</form>
</div>
</div>

@endsection

