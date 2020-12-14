@extends('client.master')
@section('title','Thêm Category')

@section('content')
<div class="site-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="section-title">
					<span class="caption d-block small">Categories</span>					
					<h2>{{$category->cate_name}}</h2>							
				</div>
				@foreach ($news as $value)				
				<div class="post-entry-2 d-flex">
					<div class="thumbnail order-md-2" ><img style="width: 150px;" src="{{asset(''.$value->news_image)}}"></div>
					<div class="contents order-md-1 pl-0">
						<h2><a href="{{asset('detail/'.$value->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->news_title}}</a></h2>
						<p class="mb-3">{!!$value->news_summary!!}</p>
						<div class="post-meta">
							<span class="d-block"><a href="{{asset('author/'.$value->author->id.'.html')}}">{{$value->author->author_name}}</a> in <a href="{{asset('category/'.$value->category->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->category->cate_name}}</a></span>
							<span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
						</div>
					</div>
				</div>
				@endforeach

			</div>
			<div class="col-lg-3">
				<div class="section-title">
					<h2>Bài viết phổ biến</h2>
				</div>
				@foreach ($featured as $key => $value)
				<div class="trend-entry d-flex">
					<div class="number align-self-start">0{{++$key}}</div>
					<div class="trend-contents">
						<h2><a href="{{asset('detail/'.$value->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->news_title}}</a></h2>
						<div class="post-meta">
							<span class="d-block"><a href="{{asset('author/'.$value->author->id.'.html')}}">{{$value->author->author_name}}</a> in <a href="{{asset('category/'.$value->category->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->category->cate_name}}</a></span>
							<span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
						</div>
					</div>
				</div>
				@endforeach

				<p>					
					{{--$featured->onEachSide(5)->links()  --}}					
					{{--<a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>--}}
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<ul class="custom-pagination list-unstyled">
					{{--$news->onEachSide(8)->links() --}}
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
