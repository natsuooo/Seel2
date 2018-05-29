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
          <div class="card-header">お気に入り一覧</div>
          
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif

         
          <div class="card-body">
            @forelse($favs as $fav)
            <div class="card-body" style="border-bottom:1px solid black;">
              <div class="panel panel-default">
                @foreach($fav->profiles as $profile)
                  <p><a href="{{url('/table', $profile)}}">Name: {{$profile->user_name}}</a></p>
                  <p><a href="{{url('/table', $profile)}}"><img src="../../{{$profile->profile_image}}" style="width:100px;"></a></p>
                  {{ Form::open(['url' => '/favorite/delete', 'method'=>'post']) }}

                  {{ Form::hidden('fav', Auth::user()->profile->id) }}
                  {{ Form::hidden('faved', $profile->id) }}

                  {{ Form::submit('お気に入りから外す') }}
                  {{ Form::close() }}
                @endforeach
              </div>
              
            </div>
            @empty
            <p>お気に入りはありません。</p>            
            @endforelse
          </div>
          
          
          
      </div>
    </div>
  </div>
</div>
@endsection
