@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
          
           
            <div class="card">
                <div class="card-header">{{ $user->name }}さんのデータ</div>
							
                @if (session('status'))
									<div class="alert alert-success">
											{{ session('status') }}
									</div>
								@endif
               
                <div class="card-body">
                <h5>データ</h5>
                <p>自分のアカウントのPVとかお気に入りの数とかフォロワーとかそういう感じでいこう</p>
                </div>
                
               
            </div>
        </div>
    </div>
</div>
@endsection

