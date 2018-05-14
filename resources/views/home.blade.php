@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}さんのダッシュボード</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
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
              			{{ $photos->links() }}
               			
               			
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
