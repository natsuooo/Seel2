@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
          
           
            <div class="card">
                <div class="card-header">{{ $user->name }}さんのダッシュボード</div>
							
                @if (session('status'))
									<div class="alert alert-success">
											{{ session('status') }}
									</div>
								@endif
               
               
                
                <div class="card-body">
                <h5>プロフィール</h5>
                <p><a href="{{ url('/profile') }}">プロフィールを編集する</a></p>
                @foreach($profiles as $profile)
									<h6>ヘッダー画像</h6>
									<img src="../{{$profile->header_image}}">
									<p></p>
									<h6>プロフィール画像</h6>
									<img src="../{{$profile->profile_image}}">
									<p></p>
									<h6>ユーザーネーム</h6>
									<p>{{ $profile->user_name }}</p>
             			<h6>フェイスブック</h6>
									<p>{{ $profile->facebook }}</p>
             			<h6>インスタグラム</h6>
									<p>{{ $profile->instagram }}</p>
              		<h6>ツイッター</h6>
									<p>{{ $profile->twitter }}</p>
             			<h6>自己紹介</h6>
									<p>{{ $profile->text }}</p>
              	
               	@endforeach		
                </div>
                
                
                
                
                <div class="card-body">
                	<h5 class="card-title">メニュー</h5>
                	
                		<h6><a href="{{ url('/menu/create') }}">メニューを追加する</a></h6>
                		
               			@foreach($menus as $menu)
               			<div class="panel panel-default">
											<p>
												<img src="../{{$menu->image}}">
											</p>
											<p>タイトル：{{ $menu->title }}</p>
											<p>説明：{{ $menu->body }}</p>
											<p>価格：{{ $menu->price }}</p>
										</div>
               			@endforeach
                </div>
                
                

<!--
                <div class="card-body">
                   <h5 class="card-title">プロフィール画像（連続）</h5>
                    

                    
                    <p>
                    	{!! Form::open(['url' => '/accountImageStore', 'method'=>'post', 'files' => true]) !!}
											{!! Form::label('fileName', 'アップロード') !!}
											{!! Form::file('fileName') !!}
											{!! Form::submit('アップロードする') !!}
											{!! Form::close() !!}
               			</p>
               			
               			@foreach($photos as $photo)
										<div class="panel panel-default">
											<div class="panel-heading">
												アップロードした日付:{{$photo->created_at}}
											</div>
											<ul class="list-group">
												<li class="list-group-item">
													<img src="{{$photo->path}}">
												</li>
											</ul>
										</div>  
										@endforeach
-->
               			
               			
               			
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
@endsection

