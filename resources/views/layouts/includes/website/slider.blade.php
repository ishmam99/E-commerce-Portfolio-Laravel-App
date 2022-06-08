<div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big">
    @foreach ($sliders as $slider)
        
    
                <div class="home-slide home-slide1 banner d-flex align-items-center" >
                    <img class="slide-bg" src="{{setImage($slider->photo)}}"
                        style="background-color: #ecc;" alt="home banner">
                    <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                        <!--<h2 style="color:{{$slider->color}}">{{$slider->name}}</h2>-->
                        <!--<h3 class="text-uppercase mb-0" style="color:{{$slider->color}}">{{$slider->discount}}</h3>-->
                        <!--<h4 class="m-b-4" style="color:{{$slider->color}}">{{$slider->product}}</h4>-->

                        <!--{{-- <h5 class="text-uppercase" style="color:{{$slider->color}}">Starting at<span-->
                                <!--class="coupon-sale-text"><sup>$</sup>199<sup>99</sup></span></h5> --}}-->
                        <!--<a href="{{route('products')}}" class="btn btn-dark btn-xl" role="button">Shop Now</a>-->
                    </div><!-- End .banner-layer -->
                </div><!-- End .home-slide -->

                @endforeach
            </div>