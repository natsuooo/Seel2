@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
          
           
            <div class="card">
                <div class="card-header">{{ $profile->user_name }}さんのダッシュボード</div>
							
                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif
               
               
                
                <div class="card-body">
                <h5>プロフィール</h5>
                <p><a href="{{ url('/profile') }}">プロフィール</a></p>
                <h6>ヘッダー画像</h6>
                <img src="../{{!empty($profile->header_image)?$profile->header_image:'images/image.png'}}" style="width:100px;">
                <p></p>
                <h6>プロフィール画像</h6>
                <img src="../{{!empty($profile->profile_image)?$profile->profile_image:'images/image.png'}}" style="width:100px;">
                <p></p>
                <h6>ユーザーネーム</h6>
                <p>{{ !empty($profile->user_name)?$profile->user_name:'' }}</p>
                <h6>フェイスブック</h6>
                <p>{{ !empty($profile->facebook)?$profile->facebook:'' }}</p>
                <h6>インスタグラム</h6>
                <p>{{ !empty($profile->instagram)?$profile->instagram:'' }}</p>
                <h6>ツイッター</h6>
                <p>{{ !empty($profile->twitter)?$profile->twitter:'' }}</p>
                <h6>自己紹介</h6>
                <p>{{ !empty($profile->text)?$profile->text:'' }}</p>
              	
                </div>
                
                
                
                
                <div class="card-body">
                  <h5 class="card-title">メニュー</h5>
                	
                  <h6><a href="{{ url('/menu/create') }}">メニューを追加する</a></h6>
                		
                    @forelse($menus as $menu)
                    <div class="panel panel-default">
                      <img src="../{{$menu->image}}" style="width:100px;">
                      <p>タイトル：{{ $menu->title }}</p>
                      <p>説明：{{ $menu->body }}</p>
                      <p>価格：{{ $menu->price }}</p>
                      <p><a href="{{ action('Host\MenuController@edit', $menu) }}">編集する</a></p>
                      <a href="#" class="btn btn-danger btn-sm" data-id="{{ $menu->id }}" onclick="deleteMenu(this);">削除</a>
                      <form method="post" action="{{ url('/menu', $menu->id) }}" id="form_{{ $menu->id }}">
                          {{ csrf_field() }}
                          {{ method_field('delete') }}
                      </form>
                    </div>
                    @empty
                    <p>No menu yet</p>
                    @endforelse
                </div>
                
                
                
							<div class="card-body">
								<h5>予約管理</h5>
								<p>カレンダー的な</p>
							</div>

							<div class="card-body">
								<h5>ホスティング概要</h5>
								<p>PV数とかグラフで表示</p>
							</div>  	

							<div class="card-body">
								<h5>エリア</h5>
								<p>地図表示</p>
							</div> 

							<div class="card-body">
								<h5>レビュー</h5>
								<p>ユーザーに紐づける</p>
								<p>返信できるようにする</p>
							</div>
            	 
             
              <div class="card-body">
								<h5>キャンセルポリシー</h5>
								<p>airbnb参考</p>
							</div> 
              
              <div class="card-body">
								<h5>予約可能な日時</h5>
								<p>カレンダー表示</p>
							</div> 

           
            </div>
        </div>
    </div>
</div>
<script>
	function deleteMenu(e){
		'use strict';
		if(confirm('本当に削除していいですか？')){
			document.getElementById('form_'+e.dataset.id).submit();
		}
	}
</script>
@endsection

