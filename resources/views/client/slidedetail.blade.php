@extends('client.master')
@section('title','Thêm Category')

@section('content')
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 single-content">
        <p class="mb-5">
          <img src="{{asset(''.$detail->slide_image)}}" alt="Image" class="img-fluid">
        </p>  
        <h1 class="mb-4">
          {{$detail->slide_title}}
        </h1>
        <div class="post-meta d-flex mb-5">
          <div class="bio-pic mr-3">
            <img src="{{asset(''.$detail->author->author_image)}}" alt="Image" class="img-fluidid">
          </div>
          <div class="vcard">
            <span class="d-block"><a href="{{asset('author/'.$detail->author->id.'.html')}}">{{$detail->author->author_name}}</a> in <a href="{{asset('category/'.$detail->category->id.'/'.$detail->category->cate_slug.'.html')}}">{{$detail->category->cate_name}}</a></span>
           <span class="date-read">{{$time}}<span class="icon-star2"></span></span>
          </div>
        </div>

        <!-- Content  -->
        <p>{!!$detail->slide_content!!}</p>


        <!-- Tags  -->
        <div class="pt-5">
          <p>Categories:  <a href="{{asset('category/'.$detail->category->id.'/'.$detail->category->cate_slug.'.html')}}">{{$detail->category->cate_name}}</a></p>
        </div>


        <!--   Comment          -->            
      
          <!--   Comment          -->  
      </div>


      <div class="col-lg-3 ml-auto">
        <div class="section-title">
          <h2>Popular Posts</h2>
        </div>

        {{-- @foreach ($variable as $key => $value)--}}
        <div class="trend-entry d-flex">
          <div class="number align-self-start">01</div>
          <div class="trend-contents">
            <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
            <div class="post-meta">
              <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
              <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
            </div>
          </div>
        </div>
        {{--@endforeach--}}

        <p>
            {{--<a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>--}}
        </p>
      </div>
    </div>
  </div>
</div>
@endsection

