<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $subcategories=SubCategory::with('category')->paginate(20);
       return view('dashboard.category.sub',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|unique:sub_categories,name',
            'category_id'   =>'required|exists:categories,id',
            'image' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $input['image'] = uploadFile($request->file('image'));
        }

        SubCategory::create($input);
        return back()->with('success', 'New Sub Category Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        return view('dashboard.category.sub-edit',compact('subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $input = $request->validate([
            'name' => 'required',
            'category_id'   => 'required|exists:categories,id',
            'image' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $input['image'] = updateFile($request->file('image'),'images',$subCategory->image);
        }

        $subCategory->update($input);
        return back()->with('success', ' Sub Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        deleteFile($subCategory->image);
        $subCategory->delete();
        return back()->with('success','Sub Category Deleted');
    }
}
