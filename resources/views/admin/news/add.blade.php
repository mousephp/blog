@extends('admin.layouts.master')
@section('title','Thêm News')

@section('content')
<div class="container">
	<div class="col-sm-12">
		<h2 class="">THÊM TIN TỨC</h2>
		<hr>
		<form method="post" action="{{route('news.store')}}" class="form-horizontal" enctype="multipart/form-data">
			@csrf
			@method('POST')
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Tiêu đề</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" value="" id="example-text-input" name="title" placeholder="NHập Tiêu đề">
					@if ($errors->has('title'))
					<p class="alert alert-danger">{{ $errors->first('title') }}</p>
					@endif
				</div>
			</div>	

			<div class="form-group ">
				<label class="col-sm-1">Images</label><br>
				<div class="custom-file col-sm-10">
					<input type="file" class="custom-file-input " name="images" id="customFile">
					<label class="custom-file-label" for="customFile">Choose file</label>
					@if ($errors->has('images'))
					<p class="alert alert-danger">{{ $errors->first('images') }}</p>
					@endif
				</div>
			</div>
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Tác giả</label>
				<div class="col-sm-8">
					<select class="form-control input-width" name="author">
						@foreach($author as $value)
						<option value="{{$value->id}}">{{$value->aut_name}}</option>
						@endforeach
					</select>
				</div>
			</div>	
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Tóm tắt</label>
				<div class="col-sm-8">
					
					<textarea id="category-summary"  class="form-control" name="summary" rows="7" cols="50"></textarea>
					<script type="text/javascript">
						CKEDITOR.replace('category-summary', {
							filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
							filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						});
					</script>
					@if ($errors->has('summary'))
					<p class="alert alert-danger">{{ $errors->first('summary') }}</p>
					@endif
				</div>
			</div>	

			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Nội dung</label>
				<div class="col-sm-8">
					<textarea id="category-desciption" class="form-control"  name="desciption" rows="7" cols="50"></textarea>
					<script type="text/javascript">
						CKEDITOR.replace('category-desciption', {
							filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
							filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						});

					</script>
					@if ($errors->has('desciption'))
					<p class="alert alert-danger">{{ $errors->first('desciption') }}</p>
					@endif
				</select>
			</div>	
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Nổi bật</label>
				<div class="col-sm-8">
					<input type="radio" checked name="featured" value="1">có
					<input type="radio" name="featured" value="0">Không
				</div>
			</div>	
			<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Thể loại</label>
				<div class="col-sm-8">
					<select class="form-control input-width" name="category">
						@foreach($category as $value)
						<option value="{{$value->id}}">{{$value->cate_name}}</option>
						@endforeach
					</select>
				</div>
			</div>	<div class="form-group ">
				<label for="example-text-input" class="col-sm-2 col-form-label">Tags</label>
				<div class="col-sm-8">
					<select class="form-control input-width" name="tags">
						@foreach($tags as $value)
						<option value="{{$value->id}}">{{$value->tag_title}}</option>
						@endforeach
					</select>
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


