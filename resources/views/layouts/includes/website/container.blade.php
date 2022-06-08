 <h2 class="section-title ls-n-15 text-center pt-2 m-b-4">Shop By Category</h2>

                <div class="owl-carousel owl-theme nav-image-center show-nav-hover nav-outer cats-slider appear-animate"
                    data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">
                    @foreach (App\Models\Category::all() as $category)
                        
                   
                    <div class="product-category">
                        <a href="{{route('category_product',$category->id)}}">
                            <figure>
                                <img style="max-width: 100%; width:100%;height:215px;border-radius:2%" src="{{ setImage($category->image) }}"
                                    alt="category" />
                            </figure>
                            <div class="category-content" style="padding: 0.5rem;
    margin-bottom: 1.9rem;
    background: black;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;">
                                <h3 style="font-weight: 700;color: white;
    font-size: 1.3rem;
    line-height: 1;
    font-family: "Open Sans",sans-serif;
    letter-spacing: -0.005em;
    margin-bottom: 1rem;
    text-transform: uppercase;
    ">{{$category->name}}</h3>
                                <span style="opacity: 0.7;
    color: white"><mark class="count"></mark> products</span>
                            </div>
                        </a>
                    </div> @endforeach
                   
            