@extends('layouts.guest')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">{{ $profile->user_name }}さんの食卓</div>

          <div class="card-body">
            <h2>プロフィール</h2>
            <div class="panel panel-default">
              <p>{{ $profile->user_name }}</p>
              <img src="../../{{$profile->profile_image}}" style="width:100px;">
              <p>{{ $profile->text }}</p>
              <p>レビュー評価</p>
              <p>いいね</p>
              <p>平均お値段</p>
              <p>Facebook</p>
              <p>Instagram</p>
              <p>Twitter</p>
              <p><a href="{{ url('/guest/message', $profile) }}">メッセージを送る</a></p>
            </div>
          </div>
          
          <h2>メニュー</h2>
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
          
      </div>
    </div>
  </div>
</div>
@endsection