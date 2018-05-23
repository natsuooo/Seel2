@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
          
           
            <div class="card">
                <div class="card-header">{{ $user->name }}さんのエリア設定</div>
							
                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif
               
                <div class="card-body">
                <h5></h5>
                <p>住所とか相手に表示されるエリアの設定とかいい感じにやる</p>
                <p>住所入力は必須、旗が建てられる</p>
                <p>住所を入力すると自動的に半径100mの円が表示。できれば円の位置は微妙にずらせる。</p>
                </div>
                
                <div id="maps" style="width:400px;height:400px;"></div>
               
            </div>
        </div>
    </div>
</div>


  <script src="//maps.googleapis.com/maps/api/js?key="></script>
  <script>
    function initMap() {
      var mapPosition = {lat: 35.170662, lng: 136.923430}
      var mapArea = document.getElementById('maps');
      var mapOptions = {
        center: mapPosition,
        zoom: 16,
      };
      var map = new google.maps.Map(mapArea, mapOptions);
    }
  </script>

@endsection

