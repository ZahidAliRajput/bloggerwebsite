@extends('frontend.layout.app')
@section('content')

<br><br>
		<!-- Blogs -->
<div class="blogs">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="section_title">
							<h2>Posts</h2>
						</div>
					</div>
				</div>
				<div class="row blogs_container">
                @foreach($posts as $post)
                <div class="col-lg-4 blog_item_col">
						<div class="blog_item">
							<div class="blog_background" style="background-image:url(/uploads/category/{{ $post->image }})"></div>
							<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
								<h4 class="blog_title">{{$post->title}}</h4>
								<span class="blog_meta">by {{$post->user()->first()->name}} | {{$post->created_at}}</span>
								<a class="blog_more" href="{{ route('singlepost', $post->slug ) }}">Read more</a>
							</div>
						</div>
				</div>
                @endforeach
				</div>
			</div>
		</div>








@endsection
