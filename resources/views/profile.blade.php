@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
           <p>
           	<a href="{{ url('/home') }}">ホーム</a> /
           </p>
           
           
            <div class="card">
               
                <div class="card-header">{{ $user->name }}さんのプロフィールを編集する</div>
							
                @if (session('status'))
									<div class="alert alert-success">
											{{ session('status') }}
									</div>
								@endif
               
               
                
                <div class="card-body">
                	<h5 class="card-title">ヘッダー画像</h5>
               			
               			@foreach($profiles as $profile)
										<div class="panel panel-default">
											
											<img src="{{$profile->header_image}}">
										</div>  
										@endforeach
              			
              			<p>
                    	{!! Form::open(['url' => '/headerUpload', 'method'=>'post', 'files' => true]) !!}
                    	{!! Form::token() !!}
											{!! Form::file('fileName') !!}
											{!! Form::submit('アップロードする') !!}
											{!! Form::close() !!}
               			</p>
               			
                </div>
                
                
                
                
                
                
                
                <div class="card-body">
                	<h5 class="card-title">プロフィール画像</h5>
               			
               			@foreach($profiles as $profile)
										<div class="panel panel-default">
											
											<img src="{{$profile->profile_image}}">
										</div>
										@endforeach
              			
              			<p>
                    	{!! Form::open(['url' => '/profileImageUpload', 'method'=>'post', 'files' => true]) !!}
                    	{!! Form::token() !!}
											{!! Form::file('fileName') !!}
											{!! Form::submit('アップロードする') !!}
											{!! Form::close() !!}
               			</p>
               			
                </div>
                
                
                <div class="card-body">
                	<h5 class="card-title">プロフィールを編集する</h5>
               			
               			@foreach($profiles as $profile)
										<div class="panel panel-default">
											
										</div>  
										
              			
										{!! Form::open(['url' => '/profileUpload', 'method'=>'post', 'files' => true]) !!}
										{!! Form::token() !!}
										<h6>ユーザーネーム</h6>
										<p>
											{!! Form::text('user_name', $profile->user_name) !!}
										</p>
										<h6>フェイスブック</h6>
										<p>
											{!! Form::text('facebook', $profile->facebook) !!}
										</p>
										<h6>インスタグラム</h6>
										<p>
											{!! Form::text('instagram', $profile->instagram) !!}
										</p>
										<h6>ツイッター</h6>
										<p>
											{!! Form::text('twitter', $profile->twitter) !!}
										</p>
										<h6>自己紹介</h6>
										<p>
											{!! Form::textarea('text', $profile->text) !!}
										</p>
										
										

										{!! Form::submit('プロフィールを編集する') !!}
										{!! Form::close() !!}
              			
              			@endforeach
               			
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

