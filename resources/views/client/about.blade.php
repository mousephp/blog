@extends('client.master')
@section('title','Tác giả')

@section('content')
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="section-title">
          <span class="caption d-block small"></span>         
          <h2>Các tác giả</h2>             
        </div>

        @foreach ($author as $value)        
        <div class="post-entry-2 d-flex">
          <div class="thumbnail order-md-2" ><img style="width: 150px;" src="{{asset(''.$value->author_image)}}"></div>
          <div class="contents order-md-1 pl-0">
            <h2><a href="{{asset('author/'.$value->id.'.html')}}">{{$value->author_name}}</a></h2>
            <p class="mb-3"></p>
            <div class="post-meta">            
             <!--  <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span> -->
            </div>
          </div>
        </div>
         <hr>
        @endforeach

      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <ul class="custom-pagination list-unstyled">
          {{$author->onEachSide(8)->links() }}
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
