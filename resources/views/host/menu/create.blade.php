@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
           <p>
           	<a href="{{ url('/home') }}">ホーム</a> /
           </p>
           
           
            <div class="card">
               
                <div class="card-header">{{ $user->name }}さんのメニューを追加する</div>
							
                @if (session('status'))
									<div class="alert alert-success">
											{{ session('status') }}
									</div>
								@endif
               
                
                <div class="card-body">
                	
                		<h6>料理画像</h6>
                		
              			<p>
                    	{!! Form::open(['url' => '/menu/create/image', 'method'=>'post', 'files' => true]) !!}
                    	{!! Form::token() !!}
											{!! Form::file('fileName') !!}
											{!! Form::submit('アップロードする') !!}
											{!! Form::close() !!}
               			</p>
               			
               			
										
              			
										{!! Form::open(['url' => '/menu/create', 'method'=>'post']) !!}
										{!! Form::token() !!}
										
								
										<h6>タイトル</h6>
										<p>
											{!! Form::text('title') !!}
										</p>
										<h6>説明</h6>
										<p>
											{!! Form::textarea('body') !!}
										</p>
										<h6>価格</h6>
										<p>
											{!! Form::text('price') !!}
										</p>
										
								

										{!! Form::submit('プロフィールを編集する') !!}
										{!! Form::close() !!}
              			
              			
               			
                </div>
                
                
                

               
                
                
               			
                
                
                
               
            </div>
        </div>
    </div>
</div>
@endsection

