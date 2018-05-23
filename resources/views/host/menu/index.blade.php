@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
          
           
            <div class="card">
                <div class="card-header">{{ $user->name }}さんのメニュー一覧</div>
							
                @if (session('status'))
									<div class="alert alert-success">
											{{ session('status') }}
									</div>
								@endif
               
               
                
                
                
                
                <div class="card-body">
									<h6><a href="{{ url('/host/menu/create') }}">メニューを追加する</a></h6>
                	<h5 class="card-title">メニュー</h5>
                	
                		
                		
               			@foreach($menus as $menu)
               			<div class="panel panel-default">
											<p>
												<img src="../{{$menu->image}}">
											</p>
											<p>タイトル：{{ $menu->title }}</p>
											<p>説明：{{ $menu->body }}</p>
											<p>価格：{{ $menu->price }}</p>
											<p>
												<a href="{{ url('/host/menu/edit') }}">編集</a>
											</p>
											<p>
												<a href="{{ url('/host/menu/delete') }}">削除</a>
											</p>
											<p>
												<a href="#">公開</a>
											</p>
											<p>
												<a href="#">シェア</a>
											</p>
										</div>
               			@endforeach
                </div>
                
                

               
                
                
              
                
                
               
            </div>
        </div>
    </div>
</div>
@endsection

