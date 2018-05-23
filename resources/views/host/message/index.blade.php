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
                <p>普通のメッセージ機能を実装する</p>
                </div>
                
               
            </div>
        </div>
    </div>
</div>
@endsection

