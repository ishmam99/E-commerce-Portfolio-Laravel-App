@extends('layouts.dashboard')

@section('content')
  {{-- @if($errors->any())
     @foreach ($errors->all() as $item)
        <p class="text-titlenger">{{ $item }}</p>
  @endforeach
  @endif --}}
  <div class="card card-custom card-sticky" id="kt_page_sticky_card">
    @if(session()->has('success'))
      <div class="alert alert-success">
        {{session()->get('success')}}
      </div>
    @elseif(session()->has('error'))
      <div class="alert alert-titlenger">
        {{session()->get('error')}}
      </div>
    @endif
    <div class="card-header">
    
      <div class="card-toolbar">
        <a href="{{ route('blog.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
        <div class="btn-group">
          <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder submit">
            <i class="ki ki-check icon-sm"></i>
          
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <!--begin::Form-->
    
        <div class="row">
          <div class="col-xl-2"></div>
          <div class="col-xl-8">
            <div class="my-5">

             

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="title">Title <span class="text-danger"></span></label>
                <div class="col-md-9">
                  <span>{{$blog->title}}</span>
                  @error('title')
                  <div class="text-titlenger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="pa">Details <span class="text-titlenger"></span></label>
                <div class="col-md-9">
                 <p>{{$blog->details}}</p>
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="pa">Image <span class="text-titlenger"></span></label>
                <div class="col-md-9">
                 <img src="{{setImage($blog->image)}}">
                </div>
              </div>
         
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="status">Publish</label>
                <div class="col-md-9">
               
                  <span class="switch switch-icon">
                  <label>
                    <input type="checkbox" {{ $blog->status == 0 ?'checked':'' }} value="1" name="status"/>
                    <span></span>
                  </label>
                </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-2"></div>
        </div>
      </form>
    </div>
  </div>

@endsection
