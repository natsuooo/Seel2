@extends('layouts.guest')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">{{ $profile->user_name }}さんの受信ボックス　　　<a href="{{url('/message/send')}}">送信ボックス</a></div>

          
          <div class="card-body">
            @foreach($receives as $receive)
            <div class="card-body" style="border-bottom:1px solid black;"> 
             
              <p><a href="{{url('/message/private', $receive->profile)}}">User: {{$receive->profile->user_name}}</a></p>
              <p><img src="../../{{$receive->profile->profile_image}}" style="width:100px;"></p>
              <p>Latest Message: {{$receive->message}}</p>
              <p>Created at: {{$receive->created_at}}</p>
              
            </div>
            @endforeach
          </div>
          
      </div>
    </div>
  </div>
</div>
@endsection