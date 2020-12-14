@extends('admin.layouts.master')
@section('title','Danh sách Author')

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
		DANH SÁCH HỌC SINH</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Ảnh</th>
							<th>Tên</th>
							<th>Ngày sinh</th>
							<th>Địa chỉ</th>
							<th>Tiểu sử</th>
							<th colspan="2">Tùy chọn</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Ảnh</th>
							<th>Tên</th>
							<th>Ngày sinh</th>
							<th>Địa chỉ</th>
							<th>Tiểu sử</th>
							<th colspan="2">Tùy chọn</th>
						</tr>
					</tfoot>
					<tbody>{{--{{asset('upload/'.$value->author_image)}}--}}
						@foreach ($author as $key => $value)
							<tr>
							<td>{{++$key}}</td>
							<td><img src="{{asset('/'.$value->author_image)}}"style="width: 150px;"></td>
							<td>{{$value->author_name}}</td>
							<td>{{$value->author_birthday}}</td>
							<td>{{$value->author_address}}</td>
							<td>{!!$value->author_profile!!}</td>	
							<td  class="text-center">
								<a href="{{ route('authors.edit',$value->id)  }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
								<td>
									<form action="{{ route('authors.destroy',$value->id) }}" method="post">
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
<!-- /.container-fluid -->
@endsection

