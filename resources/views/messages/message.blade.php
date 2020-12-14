@foreach($errors->all() as $error)
<p class="alert alert-danger">{{$error}}</p>
@endforeach


@if(Session::has('message'))
<p class="alert alert-success">{{Session::get('message')}}</p>
@endif


@if(Session::has('loi'))
<p class="alert alert-success">{{Session::get('loi')}}</p>
@endif

{{--@foreach($errors->all() as $message)
	<p class="alert alert-success">{{$message}}</p>
	@endforeach--}}









