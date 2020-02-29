@extends('layouts.app2')

@section('title', 'Blog')

@section('content')
	<style>
		article {
			border: 1px solid #ffb400 !important;
			padding: 1rem;
			margin: 1rem;
		}
		.blog-meta-content {
			margin-top: 1rem !important;
			margin-bottom: 20px !important;
		}
		.blog-meta-btn {
			margin-bottom: 1rem;
			border-radius: 10px;
		}
		.meta {
			display: flex !important;
			justify-content: space-around !important;
			align-items: center !important;
		}
		a h4 {
			color: #f4f4f4 !important;
		}
		.body p{
			word-wrap: break-word !important;
			overflow: hidden;
			text-overflow: ellipsis !important;
		}
	</style>
   <!-- Wrapper Starts -->
    <div class="wrapper">
		<div class="container page-title center-align">
			<h2 class="center-align">
				<span>My </span>
				<span>blog</span>
			</h2>
		</div>
		<!-- Divider Starts -->
		<div class="divider center-align">
			<span class="outer-line"></span>
			<span class="fa fa-vcard" aria-hidden="true"></span>
			<span class="outer-line"></span>
		</div>
		<!-- Divider Ends -->
		<div class="container">
			<div class="row">
				<div class="content col s12 m8 l8 xl8">
					<!-- Article Starts -->
					@if(count($posts) > 0)
						@foreach($posts as $post)
							<article>
								<a href="{{ url('blogpost')}}/{{$post->slug}}"><h4>{{$post->title}}</h4></a>
								<!-- Figure Starts -->
								<figure class="blog-figure">
									<a href="{{ url('blogpost')}}/{{$post->slug}}">
									<img class="responsive-img" src="{{asset('storage/cover_images')}}/{{$post->cover_image}}" alt="">
									</a>
								</figure>
								<!-- Figure Ends -->
								<!-- Body text starts-->
									<div class="body second-font">
										{!! substr($post->body, 0, 300) !!}
									</div>
								<!-- Excerpt Starts -->
								<div class="blog-meta-content">
									<a href="{{ url('blogpost')}}/{{$post->slug}}"  class="blog-meta-btn waves-effect waves-light btn readmore font-weight-500">
										Read more 
									</a>
									
									<!-- Meta Starts -->
									<div class="meta second-font">
										<p style="margin-left: -4rem;"><i class="fa fa-user"></i> <a href="#">&nbsp;Admin</a></p>
										<p style="margin-left: -4rem;" class="date"><i class="fa fa-calendar"></i>&nbsp; {{ date_format($post->created_at, ' M-d-Y') }}</p>
										<p style="margin-left: -4rem;"><i class="fa fa-tags"></i>&nbsp;
											{{$post->category->name}}
										</p>
									</div>
									<!-- Meta Ends -->
								</div>
								<!-- Excerpt Ends -->
							</article>
						<!-- Article Ends -->
						@endforeach
					@else
					<h3>There is no post connected with this category</h3>
					@endif
					<ul class="pagination center-align">
						{{$posts->links()}}
					</ul>
				</div>
				<!-- Sidebar Starts -->
				<div class="sidebar col s12 m4 l4 xl4">
					<div class="row">
						<div class="col s12 m12 l12 xl12">
							<a href="index-dark.html" class="btn back">
								<i class="fa fa-home"></i> Home
							</a>
						</div>
					</div>
					<!-- Search Widget Starts -->
					<div class="widget widget-search">
						<div>
							<input placeholder="Search in my blog ..." type="search">
						</div>
					</div>
					<!-- Search Widget Ends -->
					<!-- Latest Posts Widget Ends -->
					<div class="widget recent-posts">
						<h3 class="widget-title">Recent Posts</h3>
						<ul class="unstyled clearfix">
						@foreach($posts->slice(0, 3) as $post)
						<!-- Recent Post Widget Starts -->
							<li>
								<div class="posts-thumb pull-left"> 
									<a href="{{ url('blogpost')}}/{{$post->slug}}">
										<img alt="img" src="{{asset('storage/cover_images')}}/{{$post->cover_image}}">
									</a>
								</div>
								<div class="post-info">
									<h4 class="entry-title">
										<a href="{{ url('blogpost')}}/{{$post->slug}}">{{ $post->title}}</a>
									</h4>
									<p class="post-meta second-font">
										<span class="post-date"> {{ date_format($post->created_at, ' M-d-Y') }}</span>
									</p>
								</div>
								<div class="clearfix"></div>
							</li>
							<!-- Recent Post Widget Ends -->
						@endforeach
				
						</ul>
					</div>
					<!-- Latest Posts Widget Ends -->
					<!-- Categories Widget Starts -->
					<div class="widget">
						<h3 class="widget-title">Categories</h3>

						<ul class="arrow nav nav-tabs second-font uppercase">
							@foreach($categories as $category)
								<li>
									<a href="{{ url('blogcategory')}}/{{$category->id}}/{{preg_replace('/\s+/', '-', strtolower($category->name))}}">
										{{$category->name}}
									</a>
								</li>
								
							@endforeach
						</ul>
					</div>
					<!-- Categories Widget Ends -->
	
					<!-- Tags Widget Starts -->
					<div class="widget widget-tags">
						<h3 class="widget-title">Popular Tags </h3>
						<ul class="unstyled clearfix">
							@foreach($post->tags as $tag)
								<li><a href="#">{{$tag->name}}</a></li>
							@endforeach
			            </ul>
					</div>
					<!-- Tags Widget Ends -->
				</div>
				<!-- Sidebar Ends -->
			</div>
		</div>
    </div>
    <!-- Wrapper Ends -->

@endsection


