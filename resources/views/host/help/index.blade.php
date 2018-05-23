@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
          
           
            <div class="card">
                <div class="card-header">{{ $user->name }}さんのヘルプ</div>
							
                @if (session('status'))
									<div class="alert alert-success">
											{{ session('status') }}
									</div>
								@endif
               
                <div class="card-body">
                <h5></h5>
                <p>よくある質問とかお問い合わせフォームとか、botくんもいれたいなぁ</p>
                </div>
                
               
            </div>
        </div>
    </div>
</div>
@endsection

