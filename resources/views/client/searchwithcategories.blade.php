@extends('client.master')
@section('title','Thêm Category')

@section('content')
<div class="site-section">
	<div class="container">
		<div class="row">
			@if(count($categories)>0)
			@foreach ($categories as $key => $value)	
			<div class="col-sm-6">
				<div class="post-entry-2 d-flex">
					<div class="contents order-md-1 pl-0">
						<h2><a href="{{asset('detail/'.$value->id.'/'.$value->category->cate_slug.'.html')}}">{!! $value->news_title!!}</a></h2>
						<p class="mb-3">{!! $value->news_summary !!}</p>
						<div class="post-meta">
							<span class="d-block"><a href="{{asset('author/'.$value->author->id.'.html')}}">{{$value->author->author_name}}</a> in <a href="{{asset('category/'.$value->category->id.'/'.$value->category->cate_slug.'.html')}}">{{$value->category->cate_name}}</a></span>
							<span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<h2>khong co tin nao</h2>
			@endif
			@endsection
		</div>
	</div>
</div>


