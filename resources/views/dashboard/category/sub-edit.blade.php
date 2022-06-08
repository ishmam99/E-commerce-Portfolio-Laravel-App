@extends('layouts.dashboard')

@section('content')

  <div class="card card-custom">
    @if(session()->has('success'))
      <div class="alert alert-success">
        {{session()->get('success')}}
      </div>
    @elseif(session()->has('error'))
      <div class="alert alert-danger">
        {{session()->get('error')}}
      </div>
    @endif
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
      <div class="card-title">
        <h3 class="card-label">
          
        Sub Categories</h3>
      </div>
    
    </div>
    <div class="card-body">
      
  
      <form action="{{route('subCategory.update',$subCategory->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <label for="name" class="form-control">Sub Category Name</label>
       <input type="text" class="form-control" name="name" value="{{$subCategory->name}}" id="name">
       <label for="category_id" class="form-control">Category Name</label>
       <select name="category_id" class="form-control" id="category_id">
         @foreach (App\Models\Category::all() as $item)
           <option value="{{$item->id}}"<?php if ($subCategory->category_id==$item->id) {
                            echo "Selected"; } ?> >{{$item->name}}</option>
         @endforeach
       </select>
       <div class="col-lg-4 col-xl-4"> 
                <label class="col-xl-6 col-form-label">Sub Category Photo</label>
                <div class="image-input image-input-outline image-input" id="kt_image_3">
                  <div class="image-input-wrapper" style="width: 220px; background-position: center; background-image: url({{setImage($subCategory->image)}})"></div>
                  <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
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
              </div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
      </div>
  </div>
    
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