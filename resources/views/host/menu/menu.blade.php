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
                  <h5 class="card-title">メニュー</h5>
                	
                  <h6><a href="{{ url('/host/menu/create') }}">メニューを追加する</a></h6>
                		
                    @forelse($menus as $menu)
                    <div class="panel panel-default">
                      <img src="../{{$menu->image}}" style="width:100px;">
                      <p>タイトル：{{ $menu->title }}</p>
                      <p>説明：{{ $menu->body }}</p>
                      <p>価格：{{ $menu->price }}</p>
                      <p><a href="{{ action('MenuController@edit', $menu) }}">編集する</a></p>
                      <a href="#" class="btn btn-danger btn-sm" data-id="{{ $menu->id }}" onclick="deleteMenu(this);">削除</a>
											<form method="post" action="{{ url('/host/menu', $menu->id) }}" id="form_{{ $menu->id }}">
												{{ csrf_field() }}
												{{ method_field('delete') }}
											</form>
                    </div>
                    @empty
                    <p>No menu yet</p>
                    @endforelse
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection

