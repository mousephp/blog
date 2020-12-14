@extends('client.master')
@section('title','Tác giả')

@section('content')
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-12 text-left">
        <div class="section-title mb-5">
          <h2>About Us</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <p>
          <img src="{{asset(''.$author->author_image)}}" alt="Image" class="img-fluid">
        </p>
      </div>
      <div class="col-lg-6 pl-md-5">
        <b> {!!$author->author_name!!}</b>
        <b>{!!$author->author_profile!!}</b>
        <ul class="ul-check list-unstyled success ">
          <li>Sinh ra tại: {{$author->author_address}}</li>
          <li>Sinh ngày: {{$author->author_birthday}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
