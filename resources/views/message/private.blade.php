@extends('layouts.guest')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">{{ $profile->user_name }}さん</div>

          
          <div class="card-body">
            @foreach($messages as $message)
            <div class="card-body" style="border-bottom:1px solid black;"> 
             
              @if($message->from===$user->id)
                <p>From: {{$user->profile->user_name}}</p>
                <p><img src="../../{{$user->profile->profile_image}}" style="width:100px;"></p>
              @elseif($message->from===$profile->id)
                <p>From: {{$profile->user_name}}</p>
                <p><img src="../../{{$profile->profile_image}}" style="width:100px;"></p>
              @endif
              
              <p>Message: {{$message->message}}</p>
              <p>Created at: {{$message->created_at}}</p>
            </div>
            @endforeach
          </div>
          
          <div class="card-body">
            {{ Form::open(['url' => '/message/submit', 'method'=>'post']) }}
           
            {{ Form::textarea('message', !empty(old('message'))?old('message'):'') }}
            
            {{ Form::hidden('from', Auth::user()->profile->id) }}
            {{ Form::hidden('profile_id', $profile->id) }}
            
            {{ Form::submit('メッセージを送る') }}
            {{ Form::close() }}
          </div>
          
      </div>
    </div>
  </div>
</div>
@endsection