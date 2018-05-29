@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
          
           
            <div class="card">
                <div class="card-header">{{ $user->profile->user_name }}さんの通知</div>
							
                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif
               
                <div class="card-body">
                <h5></h5>
                <p></p>
                </div>
                
               
            </div>
        </div>
    </div>
</div>
@endsection

