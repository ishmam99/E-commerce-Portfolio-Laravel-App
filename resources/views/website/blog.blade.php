@extends('layouts.includes.website.main')
@section('main')
   
    
        <main class="main">
			

			<div class="container" style="padding: 5%">

                <nav aria-label="breadcrumb" style="padding-top:5%;" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Blog</li>
					</ol>
				</div><!-- End .container -->
			</nav>
				<div class="row justify-content-center">
					<div class="col-lg-9">
						<div class="blog-section row">
							@foreach ($blogs as $blog)
								
							
							<div class="col-md-6 col-lg-4">
								<article class="post">
									<div class="post-media">
										<a href="{{route('single.blog',$blog->id)}}">
											<img src="{{setImage($blog->image)}}" alt="Post" width="225"
												height="280">
										</a>
										<div class="post-date">
											<span class="day">{{Carbon\Carbon::parse($blog->created_at)->isoFormat(' DD')}}</span>
											<span class="month">{{Carbon\Carbon::parse($blog->created_at)->isoFormat(' MMM')}}</span>
										</div>
									</div><!-- End .post-media -->

									<div class="post-body">
										<h2 class="post-title">
											<a href="#">{{$blog->title}}</a>
										</h2>
										<div class="post-content">
											<p>{{$blog->details}}</p>
										</div><!-- End .post-content -->
										
									</div><!-- End .post-body -->
								</article><!-- End .post -->
							</div>
@endforeach
							
						</div>
					</div><!-- End .col-lg-9 -->

					<div class="sidebar-toggle custom-sidebar-toggle">
						<i class="fas fa-sliders-h"></i>
					</div>
					<div class="sidebar-overlay"></div>
					
				</div><!-- End .row -->
			</div><!-- End .container -->
		</main><!-- End .main -->
  
@endsection