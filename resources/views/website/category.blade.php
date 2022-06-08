@extends('layouts.includes.website.main')
@section('main')
   
 
        <main class="main">
          <div class="container" style="padding: 5%">

                <nav aria-label="breadcrumb" style="padding-top:10%;" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Category</li>
					</ol>
				</div><!-- End .container -->
			</nav>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url('{{ setImage($category->image) }}');">
                            <div class="row">
                                <div class="pb-5 pb-md-0 col-sm-5 col-lg-5 offset-1">
                                    <h3 class="mb-2 ls-10">{{$category->name}}<br>Deals</h3>
                                    <a href="#" class="btn btn-dark btn-black ls-10">Get Yours!</a>
                                </div>
                               
                            </div>
                        </div>

                        

                        <div class="row">
                            @foreach ($category->product as $product)
                                
                          
                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="product.html">
                                            <img src="{{ setImage($product->image_one) }}" width="280" height="280" alt="product" />
                                            <img src="{{ setImage($product->image_two) }}" width="280" height="280" alt="product" />
                                        </a>

                                        
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="{{route('category_product',$category->id)}}" class="product-category">{{$category}}</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="{{route('show_product',$product->id)}}">{{$product->name}}</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                         
                                            <span class="product-price">${{$product->price}}</span>
                                        </div>
                                        
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                              @endforeach
                           
                        </div>
                        <!-- End .row -->

                        <nav class="toolbox toolbox-pagination">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
										<option value="12">12</option>
										<option value="24">24</option>
										<option value="36">36</option>
									</select>
                                </div>
                                <!-- End .select-custom -->
                            </div>
                            <!-- End .toolbox-item -->

                            <ul class="pagination toolbox-item">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><span class="page-link">...</span></li>
                                <li class="page-item">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                        <div class="sidebar-wrapper">
                           <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Categories</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            @foreach (App\Models\Category::with('subCategory')->get() as $category)
                                                
                                           
                                            <li>
                                                <a href="#widget-category-1" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="widget-category-1">
													{{$category->name}}<span class="products-count">({{$category->subCategory->count()}})</span>
													<span class="toggle"></span>
												</a>
                                                <div class="collapse show" id="widget-category-1">
                                                    <ul class="cat-sublist">
                                                        @foreach ($category->subCategory->load('product') as $subCategory)

                                                             <li><a href="{{route('category_product',$subCategory->id)}}">{{$subCategory->name}}<span class="products-count">({{$subCategory->product->count()}})</span></a></li>
                                                        @endforeach
                                                       
                                                        
                                                    </ul>
                                                </div>
                                            </li> @endforeach
                                           
                                        </ul>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                           
                        </div>
                        <!-- End .sidebar-wrapper -->
                    </aside>
                    <!-- End .col-lg-3 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->

            <div class="mb-4"></div>
            <!-- margin -->
        </main>
        <!-- End .main -->

@endsection