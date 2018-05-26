@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
           <p>
           	<a href="{{ url('/home') }}">ホーム</a> /
           </p>
           

                
                <div class="card">

                  <div class="card-header">{{ $user->name }}さんのメニューを追加する</div>

                  @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                  @endif


                  {!! Form::open(['url' => '/host/menu/create', 'method'=>'post', 'files' => true]) !!}
                  {!! Form::token() !!}


                  <h6>料理画像</h6>
                  <p>
                    {!! Form::file('image', ['v-on:change'=>'onFileHeaderChange', 'accept'=>'.jpg,.JPG,.jpeg,.JPEG,.png,.PNG,.gif,.GIF', 'enctype'=>'multipart/form-data']) !!}
                  </p>
                  

                  <p>
                    <img v-show="uploadedHeaderImage" :src="uploadedHeaderImage" style="width:100px;">
                  </p>


                  <h6>タイトル</h6>
                  <p>
                    {!! Form::text('title', !empty(old('title'))?old('title'):'') !!}
                  </p>

                  <h6>説明</h6>
                  <p>
                    {!! Form::textarea('body', !empty($profile->body)?$profile->text:old('body') )!!}
                  </p>
                  
                  <h6>価格</h6>
                  <p>
                    {!! Form::text('price', !empty(old('price'))?old('price'):'') !!}
                  </p>


                  {!! Form::submit('メニューを追加する') !!}
                  {!! Form::close() !!}

                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection

