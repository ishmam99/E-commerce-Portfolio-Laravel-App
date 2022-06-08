<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(10);
        return view('dashboard.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slider.create');
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
            'color' =>'nullable',
            'name'  => 'required|string',
            'discount'  => 'nullable',
            'product'  =>'nullable',
            'photo' => 'required'
        ]);
        $input['photo'] = uploadFile($request->file('photo'));
        Slider::create($input);
        return redirect()->route('sliders.index')->with('success','Slider Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('dashboard.slider.view',compact('slider'));;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('dashboard.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $input = $request->validate([
           'name'  => 'required|string',
            'discount'  => 'nullable',
            'product'  =>'nullable',
            'photo' => 'nullable',
            'color' =>'nullable',
        ]);
         if ($request->hasFile('photo')) {
            if (File::exists('storage/' . $slider->photo)) {
               
                File::delete('storage/' . $slider->photo);
            }
            
            $input['photo'] = uploadFile($request->file('photo'));
        }
        // $input['photo'] = updateFile($request->file('photo'),$slider->photo);
        $slider->update($input);
        return view('dashboard.slider.view',compact('slider'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        deleteFile($slider->photo);
        $slider->delete();
        return redirect()->back()->with('success','Slider Deleted Successfully');
    }
}
