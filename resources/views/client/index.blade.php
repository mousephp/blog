@extends('client.master')
@section('title','Thêm Category')

@section('content')
<!-- slide -->
<div class="site-section py-0">
	<div class="owl-carousel hero-slide owl-style">
		@foreach ($slides as $value)
		<div class="site-section">
			<div class="container">
				<div class="half-post-entry d-block d-lg-flex bg-light">					
					<div class="img-bg" ><img style="height:320px;max-width: 600px;" src="{{asset(''.$value->slide_image)}}"></div>

					<div class="contents">
						{{--<span class="caption">Editor's Pick</span>--}}
						<h2><a href="{{asset('slide/'.$value->id.'/'.$value->category->cate_slug.'.html')}}"><i>{{$value->slide_title}}</i></p></a></h2>
						{{--<p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate vero obcaecati natus adipisci necessitatibus eius.</p>--}}
						<div class="post-meta">
							<span class="d-block"><a href="{{asset('author/'.$value->author->id.'.html')}}">{{$value->author->author_name}}</a> in <a href="{{asset('category/'.$value->category->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->category->cate_name}}</a>
							</span>
							<br>
							<span class="date-read">day {{ $day }}<span class="mx-1"></span>
							<span>- month {{$month}}</span></span>								
							<span>:{{$hour}}</span>
							<span>:{{$minute}}</span>
							<span class="icon-star2"></span>
						</div>

					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div><!--end slide -->


<!-- Content -->
<div class="site-section">
	<div class="container">
		<div class="row">

			<!-- Tin nổi bật -->
			<div class="col-lg-8">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Tin nổi bật</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					
						<div class="post-entry-1">
							<a href="{{asset('detail/'.$featuredOne->id.'/'.$featuredOne->category->cate_slug.'.html')}}"><img style="width: 350px;" src="{{asset(''.$featuredOne->news_image)}}"></a>
							<h2><a href="{{asset('detail/'.$featuredOne->id.'/'.$featuredOne->category->cate_slug.'.html')}}">{{$featuredOne->news_title}}</a></h2>
							<p>{!!$featuredOne->news_summary!!}</p>
							<div class="post-meta">
								<span class="d-block"><a href="{{asset('author/'.$featuredOne->author->id.'.html')}}">{{$featuredOne->author->author_name}}</a> in <a href="{{asset('category/'.$featuredOne->category->id.'/'.$featuredOne->category->cate_slug.'.html')}}">{{$featuredOne->category->cate_name}}</a></span>
								<span class="date-read">day {{ $day }}<span class="mx-1"></span>
								- month {{$month}}<span></span>								
								:{{$hour}}<span></span>
								:{{$minute}}<span></span>
								<span class="icon-star2"></span>
							</span>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					@foreach ($randomFeatured as $key => $value)
					<div class="post-entry-2 d-flex bg-light">
						<div class="thumbnail"><img style="width: 110px;" src="{{asset(''.$value->news_image)}}"></div>
						<div class="contents">
							<h2><a href="{{asset('detail/'.$value->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->news_title}}</a></h2>
							<div class="post-meta">
								<span class="d-block">
									<a href="{{asset('author/'.$value->author->id.'.html')}}">{{$value->author->author_name}}</a>
									in <a href="{{asset('category/'.$value->category->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->category->cate_name}}</a>
								</span>
								<span class="date-read">day {{ $day }}<span class="mx-1"></span>
								- month {{$month}}<span></span>								
								:{{$hour}}<span></span>
								:{{$minute}}<span></span>
								<span class="icon-star2"></span>
							</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>

		</div>
	</div><!--end Tin nổi bật -->


	<!-- Xu hướng -->
	<div class="col-lg-4">
		<div class="section-title">
			<h2>Xu hướng</h2>
		</div>

		@foreach ($trending as $key => $value)
		<div class="trend-entry d-flex">
			<div class="number align-self-start">0{{++$key}}</div>
			<div class="trend-contents">
				<h2><a href="{{asset('detail/'.$value->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->news_title}}</a></h2>
				<div class="post-meta">
					<span class="d-block">
						<a href="{{asset('author/'.$value->author->id.'.html')}}">{{$value->author->author_name}}</a>
						in <a href="{{asset('category/'.$value->category->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->category->cate_name}}</a>
					</span>
					- month {{$month}}<span></span>								
					:{{$hour}}<span></span>
					:{{$minute}}<span></span>
					<span class="icon-star2"></span>
				</span>
			</div>
		</div>
	</div>
	@endforeach

	<p>
		{{--<a href="#" class="more">See All Trends <span class="icon-keyboard_arrow_right"></span></a>--}}
	</p>
</div><!--end Xu hướng -->



</div>
</div>
</div>
<!-- END section -->


<!-- Sức khẻo -->
<div class="py-0">
	<div class="container">
		<div class="section-title">
			<h2>Sức khẻo</h2>
		</div>
		<?php $count=0; ?>
		@foreach ($news as $key => $value)			
			@foreach ($health as $key1 => $value1)
			@if($value1->id == $value->category_id  && $count < 1)
			<?php $count++; ?>
			<div class="half-post-entry d-block d-lg-flex bg-light">
				<div class="img-bg" ><img style="width: 550px;" src="{{asset(''.$value->news_image)}}"></div>
				<div class="contents">
					<span class="caption">Editor's Pick</span>
					<h2><a href="{{asset('detail/'.$value->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->news_title}}</a></h2>
					<p class="mb-3">{{$value->news_summary}}<p>

						<div class="post-meta">
							<span class="d-block">
								<a href="{{asset('author/'.$value->author->id.'.html')}}">{{$value->author->author_name}}</a>
								in <a href="{{asset('category/'.$value->category->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->category->cate_name}}</a>
							</span>
							<span class="date-read">{{$time}}<span class="icon-star2"></span></span>
						</div>

					</div>
				</div>
				@endif 
				@endforeach 				
			@endforeach 
		</div>
	</div><!--end Sức khẻo -->


	<!-- Chính trị-Kinh doanh -->
	<div class="site-section">
		<div class="container">
			<div class="row">

				<div class="col-lg-6">
					<div class="section-title">
						<h2>Chính trị</h2>
					</div>
					<?php $count=0; ?>
					@foreach ($news as $key => $value)
						@foreach ($politics as $key => $value1)					
						@if($value1->id == $value->category_id  && $count < 3)
						<?php $count++; ?>
						<div class="post-entry-2 d-flex">
							<div><img class=""  style="max-width: 170px;" src="{{asset(''.$value->news_image)}}"></div>
							<div class="contents">
								<h2><a href="{{asset('detail/'.$value->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->news_title}}</a></h2>
								<p class="mb-3">{!!$value->news_summary!!}</p>
								<div class="post-meta">
									<span class="d-block">
										<a href="{{asset('author/'.$value->author->id.'.html')}}">{{$value->author->author_name}}</a>
										in <a href="{{asset('category/'.$value->category->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->category->cate_name}}</a>
									</span>
									<span class="date-read">{{$time}}<span class="icon-star2"></span></span>
								</div>
							</div>
						</div>
						@endif
						@endforeach
					@endforeach
				</div>

				<div class="col-lg-6">
					<div class="section-title">
						<h2>Kinh doanh</h2>
					</div>
					<?php $count=0; ?>
					@foreach ($news as $key => $value)				
						@foreach ($business as $key => $value1)					
						@if($value1->id == $value->category_id  && $count < 3)
						<?php $count++; ?>
						<div class="post-entry-2 d-flex">
							<div><img class=""  style="max-width: 170px;" src="{{asset(''.$value->news_image)}}"></div>
							<div class="contents">
								<h2><a href="{{asset('detail/'.$value->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->news_title}}</a></h2>
								<p class="mb-3">{!!$value->news_summary!!}</p>
								<div class="post-meta">
									<span class="d-block">
										<a href="{{asset('author/'.$value->author->id.'.html')}}">{{$value->author->author_name}}</a>
										in <a href="{{asset('category/'.$value->category->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->category->cate_name}}</a>
									</span>
									<span class="date-read">{{$time}}<span class="icon-star2"></span></span>
								</div>
							</div>
						</div>
						@endif
						@endforeach
					@endforeach
				</div>
			</div>

		</div>
	</div><!-- end Chính trị-Kinh doanh -->


	<!-- Tin tức gần đây-Bài viết phổ biến -->
	<div class="site-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="section-title">
						<h2>Tin tức gần đây</h2>
					</div>
					@foreach ($newsCreate as $key => $value)				
					<div class="post-entry-2 d-flex">
						<div class="order-md-2"><img class=""  style="max-width: 230px;" src="{{asset(''.$value->news_image)}}"></div>
						<div class="contents order-md-1 pl-0">
							<h2><a href="{{asset('detail/'.$value->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->news_title}}</a></h2>
							<p class="mb-3">{!!$value->news_summary!!}</p>
							<div class="post-meta">
								<span class="d-block">
								<a href="{{asset('author/'.$value->author->id.'.html')}}">{{$value->author->author_name}}</a>
									in <a href="{{asset('category/'.$value->category->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->category->cate_name}}</a>
								</span>
								<span class="date-read">{{$time}}<span class="icon-star2"></span></span>
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
								<span class="d-block">
									<a href="{{asset('author/'.$value->author->id.'.html')}}">{{$value->author->author_name}}</a>
									in <a href="{{asset('category/'.$value->category->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->category->cate_name}}</a>
								</span>
								<span class="date-read">{{$time}} <span class="icon-star2"></span></span>
							</div>
						</div>
					</div>
					@endforeach
					<p>
						{{--<a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>--}}
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<ul class="custom-pagination list-unstyled">
						{{$newsCreate->links()}}
					</ul>
				</div>
			</div>
		</div>
	</div><!--end Tin tức gần đây-Bài viết phổ biến -->

	@endsection

