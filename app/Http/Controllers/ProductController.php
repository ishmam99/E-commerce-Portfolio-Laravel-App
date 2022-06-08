<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);
        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name'   => 'required|string',
            'price'  => 'required|numeric',
            'details' => 'required',
            'status' => 'required',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'image_one'  => 'required',
            'image_two'  => 'nullable',
            'image_three'  => 'nullable'
        ]);


        if ($request->hasFile('image_one')) {

           
            $input['image_one'] = uploadFile($request->file('image_one'));
        }
        if ($request->hasFile('image_two')) {

            $input['image_two'] = uploadFile($request->file('image_two'));
        }
        if ($request->hasFile('image_three')) {

            $input['image_three'] = uploadFile($request->file('image_three'));
        }
        Product::create($input);
        return redirect()->route('product.index')->with('success', 'New Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('dashboard.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->validate([
            'name'   => 'required|string',
            'price'  => 'required|numeric',
            'details' => 'required',
            'status' => 'required',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'image_one'  => 'nullable',
            'image_two'  => 'nullable',
            'image_three'  => 'nullable'
        ]);


        if ($request->hasFile('image_one')) {
          
            $input['image_one'] = updateFile($request->file('image_one'),'images',$product->image_one);
        }
        if ($request->hasFile('image_two')) {
            $input['image_two'] = updateFile($request->file('image_two'), 'images', $product->image_two);
        }
        if ($request->hasFile('image_three')) {
            $input['image_three'] = updateFile($request->file('image_three'), 'images', $product->image_three);
        }
        $product->update($input);
        return redirect()->route('product.index')->with('success', ' Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        deleteFile($product->image_one);
        deleteFile($product->image_two);
        deleteFile($product->image_three);
        $product->delete();
        return redirect()->back()->with('success', ' Product Deleted');   
    }
}
