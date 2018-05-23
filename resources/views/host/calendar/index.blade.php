@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
          
           
            <div class="card">
                <div class="card-header">{{ $user->name }}さんのカレンダー</div>
							
                @if (session('status'))
									<div class="alert alert-success">
											{{ session('status') }}
									</div>
								@endif
               
                <div class="card-body">
                <h5>予約管理</h5>
                <p>カレンダーをなんかいい感じに表示する、予約申し込みと自分の受け入れ可能に知事を同時に管理したいですいえい</p>
                </div>
                
               
            </div>
        </div>
    </div>
</div>
@endsection

