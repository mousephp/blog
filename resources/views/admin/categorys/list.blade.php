@extends('admin.layouts.master')
@section('title','Danh sách Category')

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
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="text-center">
						<tr>
							<th>ID</th>
							<th>Tên</th>
							<th>Tên không dấu</th>
							<th colspan="2">Tùy chọn</th>
						</tr>
					</thead>
					<tfoot class="text-center">
						<tr>
							<th>ID</th>
							<th>Tên</th>
							<th>Tên không dấu</th>
							<th colspan="2">Tùy chọn</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($categorys as $key => $values) {
							
							?>
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$values->cate_name}}</td>   
								<td>{{$values->cate_slug}}</td>
								<td  class="text-center">
									<a href="{{ route('categorys.edit',$values->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
									<td>
										<form action="{{ route('categorys.destroy',$values->id)}}" method="post">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger"><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></button>										
										</form>
									</td>
								</td>

							</tr>
						<?php  } ?>
						
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


