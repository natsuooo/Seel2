@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            <div class="card">
                <div class="card-header">「{{$menu->title}}」を変更する</div>
							
                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif
               
                <div class="card-body">
                <h5 class="card-title">メニュー</h5>
                
                {!! Form::open(['url' => ['/host/menu', $menu], 'method'=>'patch', 'files' => true]) !!}
                {!! Form::token() !!}


                <h6>料理画像</h6>
                <p>
                  {!! Form::file('image', ['v-on:change'=>'onFileHeaderChange', 'accept'=>'.jpg,.JPG,.jpeg,.JPEG,.png,.PNG,.gif,.GIF', 'enctype'=>'multipart/form-data']) !!}
                </p>
                <p>
                  <img src="../../../{{$menu->image}}" v-if="header_old_show" style="width:100px;">
                </p>

                <p>
                  <img v-if="header_new_show" :src="uploadedHeaderImage" style="width:100px;">
                </p>

                <h6>タイトル</h6>
                <p>
                  {!! Form::text('title', !empty(old('title'))?old('title'):$menu->title) !!}
                </p>
                
                <h6>説明</h6>
                <p>
                  {!! Form::textarea('body', !empty(old('body'))?old('body'):$menu->body )!!}
                </p>
                
                <h6>価格</h6>
                <p>
                  {!! Form::text('price', !empty(old('price'))?old('price'):$menu->price) !!}
                </p>
                
                


                {!! Form::submit('メニューを編集する') !!}
                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</div>
@endsection

