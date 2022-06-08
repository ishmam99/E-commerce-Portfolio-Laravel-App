@extends('layouts.dashboard')

@section('content')
  <div class="card card-custom card-sticky" id="kt_page_sticky_card" style="background-color: blanchedalmond">
    @if(session()->has('success'))
      <div class="alert alert-success">
        {{session()->get('success')}}
      </div>
    @elseif(session()->has('error'))
      <div class="alert alert-danger">
        {{session()->get('error')}}
      </div>
    @endif
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">
          Add Slider
        </h3>
      </div>
      <div class="card-toolbar">
        <a href="{{ route('sliders.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
        <div class="btn-group">
          <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder submit">
            <i class="ki ki-check icon-sm"></i>
            Save Slider
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form class="form" id="kt_form" method="post" action="{{ route('sliders.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-xl-12">
            <div class="my-5">

              <div class="col-lg-4 col-xl-4"> 
                <label class="col-xl-6 col-form-label">Slider Photo</label>
                <div class="image-input image-input-outline image-input" id="kt_image_3">
                  <div class="image-input-wrapper" style="width: 220px; background-position: center; background-image: url()"></div>
                  <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" name="photo" accept=".png, .jpg, .jpeg"/>
                    <input type="hidden" name="photo_remove"/>
                  </label>
                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                      <i class="ki ki-bold-close icon-xs text-muted"></i>
                     </span>
                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                      <i class="ki ki-bold-close icon-xs text-muted"></i>
                     </span>
                </div>
                <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="name">Title <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="name" id="name" required value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror" type="text">
                  @error('name')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

             <div class="form-group row">
                <label class="col-md-2 col-form-label" for="discount">Discount Text <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="discount" id="discount" value="{{ old('discount') }}" class="form-control  @error('discount') is-invalid @enderror" type="text">
                  @error('discount')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="product">Product Text <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="product" id="product" value="{{ old('product') }}" class="form-control  @error('product') is-invalid @enderror" type="text">
                  @error('product')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
               <div class="form-group row">
                <label class="col-md-2 col-form-label" for="product">Product Text <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="product" id="product" value="{{ old('product') }}" class="form-control  @error('product') is-invalid @enderror" type="text">
                  @error('product')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div> <div class="form-group row">
                <label class="col-md-2 col-form-label" for="color">Product Text Color<span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="color" id="color" value="{{ old('color') }}" class="form-control  @error('color') is-invalid @enderror" type="text">
                  @error('color')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="status">Publish <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input type="hidden" value="0" name="status"/>
                  <span class="switch switch-icon">
                    <label>
                      <input type="checkbox" checked value="1" name="status"/>
                      <span></span>
                    </label>
                  </span>
                </div>
              </div>

            </div>
          </div>
        </div>
      </form>
    </div>
  </div
@endsection

@push('script')
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create( document.querySelector( '#content' ) )
      .catch( error => {
        console.error( error );
      } );
  </script>
   <script src="{{ asset('assets/dashboard/js/pages/crud/file-upload/image-input.js') }}"></script>
  <script>
    
     let avatar3 = new KTImageInput('user_image');
  </script>
@endpush
