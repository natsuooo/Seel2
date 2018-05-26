@extends('layouts.guest')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">{{ $profile->user_name }}さんへメッセージを送る</div>

          <div class="card-body">
            {!! Form::open(['url' => '/guest/message', 'method'=>'post', 'files' => true]) !!}
            {!! Form::token() !!} 
           
            {!! Form::textarea('message', !empty(old('message'))?old('message'):'') !!}
            
            {!! Form::submit('メッセージを送る') !!}
            {!! Form::close() !!}
          </div>
          
          
      </div>
    </div>
  </div>
</div>
@endsection