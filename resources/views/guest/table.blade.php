@extends('layouts.guest')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">{{ $profile->user_name }}さんの食卓</div>
          
          @if (session('status'))
            <div class="alert alert-success">
              {!! session('status') !!}
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
            <p>{{$profile->user_name}}さんは大体平日・休日の19:00以降にホストすることができます。</p>
          </div>
          
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">予約リクエスト</button>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$profile->user_name}}さんの食卓を予約リクエスト</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                {{ Form::open(['url' => ['/reserve', $profile], 'method'=>'post']) }}
                <div class="modal-body">
                  
                    <div class="form-group">
                      {{Form::label('number', 'ゲストの人数', ['class'=>'col-form-label'])}}
                      {{Form::number('number', 1, ['class'=>'form-control', 'min'=>'1'])}}
                    </div>
                    <div class="form-group" id="menu">
                    <p>予約したいメニューを選択して下さい。</p>
                      @foreach($menus as $menu)
                      <div class="form-check">
                        {{Form::checkbox('reserved_menu[]', $menu->id), []}}
                        {{$menu->title}} （{{$menu->price}}円）
                      </div>
                      @endforeach
                    </div>
                    
                    <div class="form-group">
                      {{Form::label('calendar', '予定日時をカレンダーから選択して下さい。', ['class'=>'col-form-label'])}}
                      {{Form::text('calendar', null, ['id'=>'calendar'])}}
                    </div>
                   
                    <div class="form-group">
                      {{Form::label('message', 'メッセージ', ['class'=>'col-form-label'])}}
                      {{Form::textarea('message', null, ['placeholder'=>'楽しみにしています。よろしくお願いします。', 'class'=>'form-control'])}}
                    </div>
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                  <button type="submit" class="btn btn-primary">確認する</button>
                  
                </div>
                {{Form::close()}}
                
                
                
                
              </div>
            </div>
          </div>
          
      </div>
    </div>
  </div>
</div>

@endsection
