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
          <div class="card-header">メニュー一覧{{Auth::user()->id}}{{$user->id}}{{session('user')}}</div>
          
          
          <div id="router">
            <router-view></router-view>
          </div>
         
         <div id="app">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <passport-clients></passport-clients>
                        <passport-authorized-clients></passport-authorized-clients>
                        <passport-personal-access-tokens></passport-personal-access-tokens>
                    </div>
                </div>
            </div>
        </div>
          
      </div>
    </div>
  </div>
</div>
@endsection
