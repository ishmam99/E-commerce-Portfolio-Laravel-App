<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Mar 2022 07:08:10 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Stylez Valley</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/website/assets/images/icons/favicon.png')}}">

    <script>
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = '{{ asset('assets/website/assets/js/webfont.js')}}';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/website/assets/css/bootstrap.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/website/assets/css/demo3.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/assets/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/assets/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
</head>

<body class="full-screen-slider">
    <div class="page-wrapper">
        <header class="header ">
            <div class="header-middle sticky-header" style="padding-top:0;padding-bottom:0">
                <div class="container">
                  @include('layouts.includes.website.header')
                    <!-- End .header- -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->
@yield('main')

		<footer class="footer bg-dark">
			<div class="footer-middle" style="padding-top:2px;padding-bottom:1px;">
				<div class="container text-light" style="padding-top:2px;padding-bottom:1px;">
					<div class="row">
						<div class="col-lg-4 col-sm-4">
							<div class="widget">
								<h4 class="widget-title text-light">About</h4>
								<ul class="contact-info">
									<li>
										<span class="contact-info-label">Address:</span>123 Street Name, City, England
									</li>
									<li>
										<span class="contact-info-label">Phone:</span><a href="tel:">(123)
											456-7890</a>
									</li>
									<li>
										<span class="contact-info-label">Email:</span> <a
											href="mailto:mail@example.com">mail@example.com</a>
									</li>
									<li>
										<span class="contact-info-label">Working Days/Hours:</span>
										Mon - Sun / 9:00 AM - 8:00 PM
									</li>
								</ul>
							<!-- End .social-icons -->
							</div><!-- End .widget -->
						</div><!-- End .col-lg-3 -->

						<div class="col-lg-4 col-sm-4">
							<div class="widget">
								<h4 class="widget-title text-light">Customer Service</h4>

								<ul class="links">
									<li><a href="#">Help & FAQs</a></li>
									
									<li><a href="#">Careers</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Corporate Sales</a></li>
									<li><a href="#">Privacy</a></li>
								</ul>
								<h4 class="widget-title text-light">Socials</h4>
									<div class="social-icons" >
									<a href="#" class="social-icon social-facebook icon-facebook" style="color:#2e70f3;background:white" target="_blank"
										title="Facebook"></a>
									<a href="#" class="social-icon social-twitter icon-twitter" style="color:#2eb9f3;background:white" target="_blank"
										title="Twitter"></a>
									<a href="#" class="social-icon social-instagram icon-instagram" style="color:#de1010;background:white" target="_blank"
										title="Instagram"></a>
								</div>
							</div><!-- End .widget -->
						</div><!-- End .col-lg-3 -->

						
                     <div class="col-lg-4 col-sm-4">
							<div class="widget">
								<h4 class="widget-title text-light">Customer Service</h4>

								<img src="{{ asset('default/payment.png')}}">
							</div><!-- End .widget -->
						</div><!-- End .col-lg-3 -->
				
					</div><!-- End .row -->
				</div><!-- End .container -->
			</div><!-- End .footer-middle -->

			<div class="container" style="padding-top:2px;padding-bottom:1px;">
				<div class="footer-bottom" style="padding-top:2px;padding-bottom:1px;">
					<div class="container d-sm-flex align-items-center" style="padding-top:2px;padding-bottom:1px;">
						<div class="footer-left">
							<span class="footer-copyright">© Spinner TECH. 2022. All Rights Reserved</span>
						</div>

					
					</div>
				</div><!-- End .footer-bottom -->
			</div><!-- End .container -->
		</footer><!-- End .footer -->
    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
  <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                  
                                <li class="active">
                                    <a href="{{route('home')}}">Home</a>
                                </li>
                                <li>
                                    <a href="#">Categories</a>
                                    <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                        <div class="row">
                                            <div class="col-lg-4">
                                               
                                                <ul class="submenu">
                                                  @foreach (App\Models\Category::with('subCategory')->get() as $category)
                                                       <li><a href="{{route('category_product',$category->id)}}">{{$category->name}}</a>
                                                            {{-- <ul  style="position: relative">
                                                                @foreach ($category->subCategory as $subcategory)
                                                                    <li> <a href="{{route('category_product',$subcategory->id)}}">{{$subcategory->name}}</a></li>
                                                             
                                                               
                                                            </ul>   @endforeach --}}
                                                    </li>
                                                  @endforeach
                                                   
                                                   
                                                </ul>
                                            </div>
                                           
                                           
                                        </div>
                                    </div><!-- End .megamenu -->
                                </li>
                                <li>
                                    <a href="{{route('products')}}">Products</a>
                                   
                                </li>
                                <li><a href="{{route('blogs')}}">Blog</a></li>
                                 <li><a href="{{route('about')}}">About Us</a></li>
                                  <li><a href="{{route('contact')}}">Contact Us</a></li>
                            </ul>
               
            </nav><!-- End .mobile-nav -->

           

          
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Plugins JS File -->
    <script src="{{ asset('assets/website/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/website/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/website/assets/js/plugins.min.js')}}"></script>
    <script src="{{ asset('assets/website/assets/js/jquery.appear.min.js')}}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/website/assets/js/main.min.js')}}"></script>
</body>


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Mar 2022 07:08:48 GMT -->
</html>