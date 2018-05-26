<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Seel</a>
                        <a href="{{ url('/host/home') }}">ホスト</a>
                    @else
                        <a href="{{ route('login') }}">ログイン</a>
                        <a href="{{ route('register') }}">新規登録</a>
                    @endauth
                </div>
            @endif
            
            <div class="content">
							<div class="title m-b-md">Seel</div>
						</div>
        </div>
        
        <div class="content">
          <h1>メニュー一覧</h1>
            @foreach($menus as $menu)
            <div class="card-body" style="border-bottom:1px solid black;">
              <div class="panel panel-default">
                <img src="{{$menu->image}}" style="width:100px;">
                <a href=""></a>
                <p>タイトル：{{ $menu->title }}</p>
                <p>説明：{{ $menu->body }}</p>
                <p>価格：{{ $menu->price }}</p>
                <p><a href="{{ url('/guest/table', $menu->profile) }}">{{ $menu->profile->user_name }}</a></p>
                <a href="{{ url('/guest/table', $menu->profile) }}"><img src="{{$menu->profile->profile_image}}" style="width:100px;"></a>
              </div>
            </div>
            @endforeach
          </div>
    </body>
</html>
