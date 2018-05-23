@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
          
           
            <div class="card">
                <div class="card-header">{{ $user->name }}さんのメッセージ</div>
							
                @if (session('status'))
									<div class="alert alert-success">
											{{ session('status') }}
									</div>
								@endif
               
                <div class="card-body">
                <h5></h5>
                <p>申し込みしてきたゲストとメッセージのやり取りをするよ、翻訳とか地図を出すとかそういうのするよねきっと</p>
                </div>
                
               
            </div>
        </div>
    </div>
</div>
@endsection

