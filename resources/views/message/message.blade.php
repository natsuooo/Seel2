@extends('layouts.guest')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">{{ $profile->user_name }}さんのメッセージボックス</div>

          
          <div class="card-body">
            @foreach($messages as $message)
            <div class="card-body" style="border-bottom:1px solid black;"> 
             
              @if($message->profile->id===$user->id)
                <p><a href="{{url('/message/private', $message->from)}}">User: {{$message->profile->user_name}}</a></p>
              @else
                <p><a href="{{url('/message/private', $message->profile->id)}}">User: {{$message->profile->user_name}}</a></p>
              @endif
              
              
              <p><img src="../../{{$message->profile->profile_image}}" style="width:100px;"></p>
              <p>Latest Message: {{$message->message}}</p>
              <p>Created at: {{$message->created_at}}</p>
            </div>
            @endforeach
          </div>
          
          
          
      </div>
    </div>
  </div>
</div>
@endsection