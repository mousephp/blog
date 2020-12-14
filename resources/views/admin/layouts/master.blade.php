<!DOCTYPE html>
<html lang="en">
<head>
	<base href="{{asset('layouts/admin')}}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">

	<!-- ckeditor -->
	<script type="text/javascript" src="{{asset('layouts/assets/ckeditor/ckeditor.js')}}"></script>

	<!-- toastr-->	

</head>

<body id="page-top">

	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

		<a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
			<i class="fas fa-bars"></i>
		</button>

		<!-- Navbar Search -->
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button class="btn btn-primary" type="button">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</div>
		</form>

		<!-- Navbar -->
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown no-arrow mx-1">
				<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-bell fa-fw"></i>
					<span class="badge badge-danger">9+</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
					<a class="dropdown-item">Action</a>
					<a class="dropdown-item">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item">Something else here</a>
				</div>
			</li>
			<li class="nav-item dropdown no-arrow mx-1">
				<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-envelope fa-fw"></i>
					<span class="badge badge-danger">7</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
					<a class="dropdown-item">Action</a>
					<a class="dropdown-item">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item">Something else here</a>
				</div>
			</li>
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user-circle fa-fw"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<a class="dropdown-item">Settings</a>
					<a class="dropdown-item">Activity Log</a>
					<div class="dropdown-divider"></div>
				</div>
			</li>

			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user-circle fa-fw"></i>
					{{Auth::user()->name}}
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<a class="dropdown-item">Settings</a>
					<a class="dropdown-item" href="{{asset('admin/password')}}">Update password</a>
					<div class="dropdown-divider"></div>

					<!-- 	 -->
					<a class="dropdown-item" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
				<!-- 	 -->

			</div>
		</li>

	</ul>

</nav>

<div id="wrapper">

	<!-- Sidebar -->
	<ul class="sidebar navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="{{route('home')}}">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span>
			</a>
		</li>


		<!-- -->
		<li class="nav-item dropdown ">
			<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<i class="fas fa-fw fa-folder"></i>
				<span>Users</span>
			</a>
			<div class="dropdown-menu " aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
				<a class="dropdown-item" href="{{asset('admin/users')}}">Danh sách</a>
				<a class="dropdown-item" href="{{asset('admin/users/create')}}">Thêm</a>					
			</div>
		</li>

		<li class="nav-item dropdown ">
			<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<i class="fas fa-fw fa-folder"></i>
				<span>Category</span>
			</a>
			<div class="dropdown-menu " aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
				<a class="dropdown-item" href="{{asset('admin/categorys')}}">Danh sách</a>
				<a class="dropdown-item" href="{{asset('admin/categorys/create')}}">Thêm</a>				
			</div>
		</li>

		<li class="nav-item dropdown ">
			<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<i class="fas fa-fw fa-folder"></i>
				<span>Author</span>
			</a>
			<div class="dropdown-menu " aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
				<a class="dropdown-item" href="{{asset('admin/authors')}}">Danh sách</a>
				<a class="dropdown-item" href="{{asset('admin/authors/create')}}">Thêm</a>		
			</div>
		</li>

		<li class="nav-item dropdown ">
			<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<i class="fas fa-fw fa-folder"></i>
				<span>Contacts</span>
			</a>
			<div class="dropdown-menu " aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
				<a class="dropdown-item" >Danh sách</a>
				<a class="dropdown-item" >Thêm</a>
			</div>
		</li>

		<li class="nav-item dropdown ">
			<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<i class="fas fa-fw fa-folder"></i>
				<span>Slides</span>
			</a>
			<div class="dropdown-menu " aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
				<a class="dropdown-item" href="{{asset('admin/slides')}}">Danh sách</a>
				<a class="dropdown-item" href="{{asset('admin/slides/create')}}">Thêm</a>	
			</div>
		</li>


		<li class="nav-item dropdown ">
			<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<i class="fas fa-fw fa-folder"></i>
				<span>Tags</span>
			</a>
			<div class="dropdown-menu " aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
				<a class="dropdown-item" href="{{asset('admin/tags')}}">Danh sách</a>
				<a class="dropdown-item" href="{{asset('admin/tags/create')}}">Thêm</a>
			</div>
		</li>

		<li class="nav-item dropdown ">
			<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<i class="fas fa-fw fa-folder"></i>
				<span>News</span>
			</a>
			<div class="dropdown-menu " aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
				<a class="dropdown-item" href="{{asset('admin/news')}}">Danh sách</a>
				<a class="dropdown-item" href="{{asset('admin/news/create')}}">Thêm</a>
			</div>
		</li>

		<li class="nav-item dropdown ">
			<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<i class="fas fa-fw fa-folder"></i>
				<span>Comments</span>
			</a>
			<div class="dropdown-menu " aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
				<a class="dropdown-item" href="{{asset('admin/comments')}}">Danh sách</a>
			</div>
		</li>

		<!-- -->

	</ul>

	<div id="content-wrapper">


		<!-- /.container-fluid -->
		@section('content') 

		@show
		<!-- /.container-fluid -->



		<!-- Sticky Footer -->
		<footer class="sticky-footer">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>Copyright © Your Website 2019</span>
				</div>
			</div>
		</footer>

	</div>
	<!-- /.content-wrapper -->

</div>

<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="login.html">Logout</a>
			</div>
		</div>
	</div>
</div>
<!-- Bootstrap core JavaScript-->


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>


<script type="text/javascript" src="{{asset('layouts/toastr/toastr.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('layouts/toastr/toastr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('layouts/toastr/toastr.css')}}">
<script type="text/javascript">
	@if(Session::has('message'))
	var type = "{{ Session::get('alert-type', 'success') }}";
	switch(type){
		case 'info':
		toastr.info("{{ Session::get('message') }}",{timeOut: 2000});		
		break;

		case 'warning':
		toastr.warning("{{ Session::get('message') }}");
		break;

		case 'success':
		toastr.success("{{ Session::get('message') }}");
		break;

		case 'error':
		toastr.error("{{ Session::get('message') }}");
		break;
	}
	@endif

	@if(Session::has('error'))
	var type = "{{ Session::get('alert-type', 'warning') }}";
	switch(type){
		case 'info':
		toastr.info("{{ Session::get('error') }}",{timeOut: 2000});
		
		break;

		case 'warning':
		toastr.warning("{{ Session::get('error') }}");
		break;

		case 'success':
		toastr.success("{{ Session::get('error') }}");
		break;

		case 'error':
		toastr.error("{{ Session::get('error') }}");
		break;
	}
	@endif
</script>

</body>
</html>

