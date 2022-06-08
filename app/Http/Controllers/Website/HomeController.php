<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::where('status',0)->get();
        return view('website.index',compact('sliders'));
    }
    public function contact()
    {
        return view('website.contact');
    }
    public function about()
    {
        return view('website.about');
    }
    public function blog()
    {
        $blogs=Blog::all();
        return view('website.blog',compact('blogs'));
    }
    public function product()
    {
        $products=Product::with('subCategory')->paginate(20);
        return view('website.product',compact('products'));
    }
    public function category($id)
    {
        $category=SubCategory::with('product')->findOrfail($id);
        //dd($category);
        return view('website.category',compact('category'));
    }
    public function singleProduct($id)
    {
        $product = Product::findOrfail($id);

        return view('website.product_single', compact('product'));
    }
    public function singleBlog($id)
    {
        $blog = Blog::findOrfail($id);

        return view('website.blog-single', compact('blog'));
    }
    public function categoryProduct($id)
    {
        $category = Category::findOrfail($id);
        $products = [];
       
        foreach ($category->subCategory->load('product') as $subCategory) {
            
           foreach($subCategory->product->load('subCategory') as $product)
          {
              $products[]=$product;
          }
        }
        $products=$this->paginate($products);
        
       return view('website.product',compact('products'));
    }
    public function paginate($items, $perPage = 20, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
