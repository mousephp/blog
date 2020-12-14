@extends('admin.layouts.master')
@section('title','Danh sách Comment')

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
		DANH SÁCH COMMENTS</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Thuộc tin nào</th>
							<th>Email</th>								
							<th>Tùy chọn</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Thuộc tin nào</th>
							<th>Email</th>								
							<th>Tùy chọn</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach ($comments as $key => $value)
						<tr>
							<td>{{++$key}}</td>
							<td>{{$value->com_name}}</td>
							<td>{{$value->com_email}}</td>
							<td>{{$value->com_content}}</td>
							
							<td  class="text-center">
								<a href="" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
								<a href="" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
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

