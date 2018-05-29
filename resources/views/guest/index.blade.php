@extends('layouts.guest')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  @if (Route::has('login'))
    <div class="top-right links">
      @auth
        <a href="{{ url('/') }}">Seel</a>
        <a href="{{ url('/home') }}">ホスト</a>
      @else
        <a href="{{ route('login') }}">ログイン</a>
        <a href="{{ route('register') }}">新規登録</a>
      @endauth
    </div>
  @endif
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">メニュー一覧</div>

         
          <div class="card-body">
            @foreach($menus as $menu)
            <div class="card-body" style="border-bottom:1px solid black;">
              <div class="panel panel-default">
                <img src="{{$menu->image}}" style="width:100px;">
                <a href=""></a>
                <p>タイトル：{{ $menu->title }}</p>
                <p>説明：{{ $menu->body }}</p>
                <p>価格：{{ $menu->price }}</p>
                <p><a href="{{ url('/table', $menu->profile) }}">{{ $menu->profile->user_name }}</a></p>
                <a href="{{ url('/table', $menu->profile) }}"><img src="{{$menu->profile->profile_image}}" style="width:100px;"></a>
              </div>
            </div>
            @endforeach
          </div>
          
          
          
      </div>
    </div>
  </div>
</div>
@endsection
