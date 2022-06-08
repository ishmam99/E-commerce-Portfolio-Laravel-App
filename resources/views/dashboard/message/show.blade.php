@extends('layouts.dashboard')

@section('content')
  {{-- @if($errors->any())
     @foreach ($errors->all() as $item)
        <p class="text-danger">{{ $item }}</p>
  @endforeach
  @endif --}}
  <div class="card card-custom card-sticky" id="kt_page_sticky_card">
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
     
      <h3>Public Message</h3>
    </div>
    <div class="card-body">
      <!--begin::Form-->
      <div class="row">
    <h4 class="card col-3">Name :</h4> <h4 class="card col-9"> {{$message->name}}</h4>
    <h4 class="card col-3">Email :</h4><h4 class="card col-9"> {{$message->email}}</h4>
    <h4 class="card col-3"> Details : </h4><p class="card col-9">{{$message->message}}</p>
    <h4 class="card col-3">Attachment : </h4><img src="{{setImage($message->attachment)}}" width="200px" alt="" class="card col-9">
  </div>
    </div>
  </div>

@endsection
