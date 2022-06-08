@extends('layouts.includes.website.main')
@section('main')
   
    
      <main class="main">
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Blog Post</li>
					</ol>
				</div><!-- End .container -->
			</nav>

			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<article class="post single">
							<div class="post-media">
								<img src="{{setImage($blog->image)}}" height="50px" width="50px"alt="Post">
							</div><!-- End .post-media -->

							<div class="post-body">
								<div class="post-date">
											<span class="day">{{Carbon\Carbon::parse($blog->created_at)->isoFormat(' DD')}}</span>
											<span class="month">{{Carbon\Carbon::parse($blog->created_at)->isoFormat(' MMM')}}</span>
										</div>

								<h2 class="post-title">{{$blog->title}}</h2>

								

								<div class="post-content">
									<p>{{$blog->details}}
									</p>

									
								</div><!-- End .post-content -->

								<div class="post-share">
									<h3 class="d-flex align-items-center">
										<i class="fas fa-share"></i>
										Share this post
									</h3>

									

								

							
							</div><!-- End .post-body -->
						</article><!-- End .post -->

						<hr class="mt-2 mb-1">

						
					</div><!-- End .col-lg-9 -->

					
					<div class="sidebar-overlay"></div>
				
				</div><!-- End .row -->
			</div><!-- End .container -->
		</main><!-- End .main -->
@endsection