@extends('layouts.guest')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">{{ $profile->user_name }}さんの送信ボックス　　　<a href="{{url('/message/receive')}}">受信ボックス</a></div>

          
          <div class="card-body">
            @foreach($sends as $send)
            <div class="card-body" style="border-bottom:1px solid black;"> 
             
              <p><a href="{{url('/message/private', $send->profile)}}">User: {{$send->profile->user_name}}</a></p>
              <p><img src="../../{{$send->profile->profile_image}}" style="width:100px;"></p>
              <p>Latest Message: {{$send->message}}</p>
              <p>Created at: {{$send->created_at}}</p>
              
            </div>
            @endforeach
          </div>
          
      </div>
    </div>
  </div>
</div>
@endsection