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
        <h3 class="card-label">Message List</h3>
      </div>
    
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
          <thead>
            <tr>
              <th>SL</th>
              <th>Name</th> 
              <th>Email</th>
              <th>Attachment</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            @foreach($messages as $message)
              <tr>
                <td>{{ $loop->iteration + $messages->firstItem() - 1 }}</td>
                <td>{{$message->name}}</td>
                <td>{{ $message->email }}</td>
                <td> <img style="width: 50px;" src="{{ setImage($message->attachment) }}" alt=""></td>
                <td><a href="{{route('message.show',$message->id)}}">Details</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $messages->links() }}
    </div>
  </div>

@endsection
