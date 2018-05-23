@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
          
           
            <div class="card">
              <div class="card-header">{{ $user->name }}さんのキャンセルポリシー</div>

              @if (session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
              @endif

              <div class="card-body">
              <h5></h5>
              <p>キャンセルポリシーを選択肢から選んで設定できるようにする</p>
              
              <p>
                {!! Form::radio('cancel', 'cancel_ok', true) !!}期限内にキャンセルすれば全額返金
                {!! Form::radio('cancel', 'cancel_no') !!}キャンセルしても返金不可
              </p>
              
              
              <!--キャンセル可-->
              {!! Form::text('due') !!}日前までにキャンセルすれば全額返金<br>
              （例：28日の予約で3日前までの場合、25日23:59までにキャンセルすれば全額返金）
              </div>
                
               
            </div>
        </div>
    </div>
</div>
@endsection

