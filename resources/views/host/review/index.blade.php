@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
          
           
            <div class="card">
                <div class="card-header">{{ $user->name }}さんのレビュー</div>
							
                @if (session('status'))
									<div class="alert alert-success">
											{{ session('status') }}
									</div>
								@endif
               
                <div class="card-body">
                <h5></h5>
                <p>レビュー一覧を表示。この画面内でレビューに返信できるよにしたい</p>
                </div>
                
               
            </div>
        </div>
    </div>
</div>
@endsection

