@extends('layouts.guest')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
          <div class="card-header">{{ $user->profile->user_name }}さんの予約リクエスト一覧</div>
          
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
         
          <div class="card-body">
            @forelse($reserve_requests as $reserve_request)
              <div class="card-body" style="border-bottom:1px solid black;">
                <p>{{$reserve_request->created_at}}</p>
                <p>ホスト：<a href="{{url('/table', $reserve_request->profile)}}">{{$reserve_request->profile->user_name}}さん</a></p>
                <p>ゲスト人数：{{$reserve_request->number}}人</p>
                <p>メニュー：
                
                  <?php
                  $db_array=$reserve_request->reserved_menu;
                  $array=explode(',', $db_array);
                  $total=0;
                  for($i=0; $i<count($array); $i++){
                    $menus=App\Menu::where('id', intval($array[$i]))->get();
                    foreach($menus as $menu){
                      echo "<p>".$menu->title." (".$menu->price."円)</p>";
                      $total+=$menu->price;
                    }
                  }
                  ?>
                </p>
                <p>合計：{{$total*($reserve_request->number)}}円</p>
                <p>予約日時：{{$reserve_request->calendar}}</p>
                <p>メッセージ：{{$reserve_request->message}}</p>
              </div>
            @empty
            
            @endforelse
            
          </div>
          
      </div>
    </div>
  </div>
</div>

@endsection