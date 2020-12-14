@extends('admin.layouts.master')
@section('title','Danh sách Slides')

@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="#">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Tables</li>
	</ol>

	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
		DANH SÁCH SLIDES</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên</th>
							<th>Ảnh</th>
							{{--<th>Nội dung</th>--}}
							<th>Tác giả</th>
							<th>Thể loại</th>
							<th colspan="2">Tùy chọn</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Tên</th>
							<th>Ảnh</th>
							{{--<th>Nội dung</th>--}}
							<th>Tác giả</th>
							<th>Thể loại</th>
							<th colspan="2">Tùy chọn</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach ($slides as $key => $value)					
						<tr>
							<td>{{++$key}}</td>
							<td>{{$value->slide_title}}</td>
							<td ><img src="{{asset(''.$value->slide_image)}}" style="width: 150px;"></td>										
							{{--<td>{!!$value->slide_content!!}</td>--}}
							<td>{{$value->author->author_name}}</td>	
							<td>{{$value->category->cate_name}}</td>	

							<td  class="text-center">
								<a href="{{route('slides.edit',$value->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
								<td>
									<form action="{{route('slides.destroy',$value->id)}}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger"><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></button>								
									</form>

								</td>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
	</div>
	<p class="small text-center text-muted my-5">
		<em>More table examples coming soon...</em>
	</p>
</div>

@endsection
