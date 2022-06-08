@extends('layouts.includes.website.main')
@section('main')
   
        <main class="main">
         @include('layouts.includes.website.slider')
            <!-- End .home-slider -->

            <section class="container">
               @include('layouts.includes.website.container')
            </section>

       
            <section class="container pb-3 mb-1">
                <h2 class="section-title ls-n-15 text-center pb-2 m-b-4">Popular Products</h2>

                <div class="row py-4">
                  @foreach (App\Models\Product::with('subCategory')->get() as $product)
                      
                 
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="{{route('show_product',$product->id)}}">
                                    <img src="{{ setImage($product->image_one) }}" width="273"
                                        height="273" alt="productr" />
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    {{-- <div class="product-label label-sale">-20%</div> --}}
                                </div>
                                {{-- <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div> --}}
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="{{route('category_product',$product->subCategory->id)}}" class="product-category">{{$product->subCategory->name}}</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="{{route('show_product',$product->id)}}">{{$product->name}}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                 
                                    <span class="product-price">${{$product->price}}</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div> @endforeach
                  
                </div>

                <hr class="mt-3 mb-6">

                <div class="row feature-boxes-container pt-2">
                    
                    <img src="https://img.freepik.com/free-vector/elegant-sale-banner-with-golden-rose-colors_1361-1261.jpg?w=2000">
                    <!--<div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInRightShorter"-->
                    <!--    data-animation-delay="300" data-animation-duration="1000">-->
                    <!--    <div class="feature-box feature-box-simple text-center">-->
                    <!--        <i class="sicon-earphones-alt"></i>-->

                    <!--        <div class="feature-box-content p-0">-->
                    <!--            <h3 class="text-uppercase">Customer Support</h3>-->
                    <!--            <h5>Need Assistence?</h5>-->

                    <!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,-->
                    <!--                et dapibus lacus. Lorem ipsum dolor sit amet.</p>-->
                    <!--        </div><!-- End .feature-box-content -->
                    <!--    </div><!-- End .feature-box -->
                    <!--</div><!-- End .col-lg-3 -->

                    <!--<div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInRightShorter"-->
                    <!--    data-animation-delay="100" data-animation-duration="1000">-->
                    <!--    <div class="feature-box feature-box-simple text-center">-->
                    <!--        <i class="sicon-credit-card"></i>-->

                    <!--        <div class="feature-box-content p-0">-->
                    <!--            <h3 class="text-uppercase">Secured Payment</h3>-->
                    <!--            <h5>Safe & Fast</h5>-->

                    <!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,-->
                    <!--                et dapibus lacus. Lorem ipsum dolor sit amet.</p>-->
                    <!--        </div><!-- End .feature-box-content -->
                    <!--    </div><!-- End .feature-box -->
                    <!--</div><!-- End .col-lg-3 -->
                    <!--<div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInLeftShorter"-->
                    <!--    data-animation-delay="100" data-animation-duration="1000">-->
                    <!--    <div class="feature-box feature-box-simple text-center">-->
                    <!--        <i class="sicon-action-undo"></i>-->

                    <!--        <div class="feature-box-content p-0">-->
                    <!--            <h3 class="text-uppercase">Free Returns</h3>-->
                    <!--            <h5>Easy & Free</h5>-->

                    <!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,-->
                    <!--                et dapibus lacus. Lorem ipsum dolor sit amet.</p>-->
                    <!--        </div><!-- End .feature-box-content -->
                    <!--    </div><!-- End .feature-box -->
                    <!--</div><!-- End .col-lg-3 -->

                    <!--<div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInLeftShorter"-->
                    <!--    data-animation-delay="300" data-animation-duration="1000">-->
                    <!--    <div class="feature-box feature-box-simple text-center">-->
                    <!--        <i class="icon-shipping"></i>-->

                    <!--        <div class="feature-box-content p-0">-->
                    <!--            <h3 class="text-uppercase">Free Shipping</h3>-->
                    <!--            <h5>Orders Over $99</h5>-->

                    <!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,-->
                    <!--                et dapibus lacus. Lorem ipsum dolor sit amet.</p>-->
                    <!--        </div><!-- End .feature-box-content -->
                    <!--    </div><!-- End .feature-box -->
                    <!--</div><!-- End .col-lg-3 -->
                </div><!-- End .row .feature-boxes-container-->
            </section>
        </main><!-- End .main -->

      
    </div><!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

  
    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="{{route('home')}}">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="#" class="">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
       
    </div>

@endsection
