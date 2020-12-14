@extends('client.master')
@section('title','Thêm Category')

@section('content')
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 single-content">
        <p class="mb-5">
          <img src="{{asset(''.$detail->news_image)}}" class="img-fluid">
        </p>  
        <h1 class="mb-4">
          {{$detail->news_title}}
        </h1>
        <div class="post-meta d-flex mb-5">
          <div class="bio-pic mr-3">
            <img src="{{asset(''.$detail->author->author_image)}}" alt="Image" class="img-fluidid">
          </div>
          <div class="vcard">
            <span class="d-block"><a href="{{asset('author/'.$detail->author->id.'.html')}}">{{$detail->author->author_name}}</a> in <a href="{{asset('category/'.$detail->category->id.'/'.$detail->category->cate_slug.'.html')}}" >{{$detail->category->cate_name}}</a></span>
            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
          </div>
        </div>

        <!-- Content  -->
        <p>{!!$detail->news_content!!}</p>


        {{-- @if(isset($slides))
          src="{{asset(''.$slides->slide_image)}}" 
          @else 
          src="{{asset(''.$detail->news_image)}}" 
          @endif--}}


          {{--asset(''.$detail->news_image)--}}
          <!-- Tags  -->
          <div class="pt-5">
            <p>Categories:  <a href="{{asset('category/'.$detail->category->id.'/'.$detail->category->cate_slug.'.html')}}">{{$detail->category->cate_name}}</a></a>  Tags: <a href="{{asset('tags/'.$detail->tags->id.'.html')}}"  name="searchtags">{{$detail->tags->tag_title}}</a></p>
          </div>


          <!--   Comment          -->            
          <div class="pt-5">
            <div class="section-title">
             
              <h2 class="mb-5">{{$countComment}} Comments</h2>
             
            </div>
            <ul class="comment-list">

              @foreach ($comment as $key => $value)
              <li class="comment">
                <div class="vcard bio">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>{{$value->com_name}}</h3>
                  <div class="meta" style="text-transform: capitalize;">{{date('l,F d y h:i',strtotime($value->created_at))}}</div>
                  <p>{{$value->com_content}}</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div>
              </li>
              @endforeach


            </ul>
            <!-- END comment-list -->

            <div class="comment-form-wrap pt-5">
              <div class="section-title">
                <h2 class="mb-5">Leave a comment</h2>
                @if(Session::has('thangcong'))
                <p class="alert alert-success">{{Session::get('thangcong')}}</p>
                @endif

              </div>
              <form action="" class="p-5 bg-light" method="POST">
                @csrf              
                @method('POST')
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text"  class="form-control" id="name" name="name">
                  @if ($errors->has('name'))
                  <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                  @endif
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email"  class="form-control" id="email" name="email">
                  @if ($errors->has('email'))
                  <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                  @endif
                </div>

                {{--  <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control" id="website">
                </div>--}}

                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea type="text" name="message"  requiredid="message" cols="30" rows="10" class="form-control"></textarea>
                  @if ($errors->has('message'))
                  <p class="alert alert-danger">{{ $errors->first('message') }}</p>
                  @endif
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn btn-primary py-3">
                </div>

              </form>
            </div>
          </div>
        </div>


        <div class="col-lg-3 ml-auto">
          <div class="section-title">
            {{--@foreach ($featured as $key => $value)
              @if($key<1)--}}
              <h2>{{--$value->category->cate_name--}}  Bài viết phổ biến </h2>
              {{--@endif
                @endforeach--}}
              </div>

              @foreach ($featured as $key => $value)
              <div class="trend-entry d-flex">
                <div class="number align-self-start">0{{++$key}}</div>
                <div class="trend-contents">
                  <h2><a href="{{asset('detail/'.$value->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->news_title}}</a></h2>
                  <div class="post-meta">
                    <span class="d-block"><a href="#">{{$value->author->author_name}}</a> in <a href="#">{{$value->category->cate_name}}</a></span>
                    <span class="date-read">{{date('d/m/y H:i',strtotime($value->created_at))}}<span class="icon-star2"></span></span>date('l,F d y h:i')
                  </div>
                </div>
              </div>
              @endforeach


              <p>
               {{--<a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>--}}
              </p>
            </div>


          </div>

        </div>
      </div>
@endsection

