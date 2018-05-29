@extends('layouts.guest')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">{{ $profile->user_name }}さんの食卓を予約する</div>
          
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif

         
          <div class="card-body">
            <h2>プロフィール</h2>
            <div class="panel panel-default">
              <p>{{ $profile->user_name }}</p>
              <p><img src="../../{{$profile->header_image}}" style="width:100px;"></p>
              <p><img src="../../{{$profile->profile_image}}" style="width:100px;"></p>
              <p>{{ $profile->text }}</p>
              <p>レビュー評価</p>
              <p>いいね</p>
              <p>{{$faved}}</p>
              <p>Facebook</p>
              <p>Instagram</p>
              <p>Twitter</p>
              <p><a href="{{ url('/message/contact', $profile) }}">メッセージを送る</a></p>
              
              
              {{ Form::open(['url' => '/favorite/register', 'method'=>'post']) }}

              {{ Form::hidden('fav', Auth::user()->profile->id) }}
              {{ Form::hidden('faved', $profile->id) }}

              {{ Form::submit('お気に入り') }}
              {{ Form::close() }}
              
            </div>
          </div>
          
          <h2>メニュー</h2>
          <p>予約したいメニューにチェックを入れて下さい</p>
          @foreach($menus as $menu)
          <div class="card-body" style="border-bottom:1px solid black;">
            <div class="panel panel-default">
              <img src="../../{{$menu->image}}" style="width:100px;">
              <a href=""></a>
              <p>タイトル：{{ $menu->title }}</p>
              <p>説明：{{ $menu->body }}</p>
              <p>価格：{{ $menu->price }}円</p>
            </div>
          </div>
          @endforeach
          
          <div class="card-body">
            <p><a href="{{url('/reserve', $profile)}}">予約する</a></p>
          </div>
          
      </div>
    </div>
  </div>
</div>

@endsection