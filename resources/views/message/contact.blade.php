@extends('layouts.guest')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">{{ $profile->user_name }}さんへメッセージを送る</div>

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