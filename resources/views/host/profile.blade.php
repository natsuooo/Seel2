@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

     <p>
      <a href="{{ url('/host/home') }}">ホーム</a> /
      <a href="{{ url('/host/profile') }}">プロフィール</a> /
     </p>


      <div class="card">

        <div class="card-header">{{ $user->name }}さんのプロフィール</div>

        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif


        {!! Form::open(['url' => '/host/profile', 'method'=>'post', 'files' => true]) !!}
        {!! Form::token() !!}


        <h6>ヘッダー画像</h6>
        <p>
          {!! Form::file('header_image', ['v-on:change'=>'onFileHeaderChange', 'accept'=>'.jpg,.JPG,.jpeg,.JPEG,.png,.PNG,.gif,.GIF', 'enctype'=>'multipart/form-data']) !!}
        </p>
        @isset($profile->header_image)
        <p>
          <img src="../../{{$profile->header_image}}" v-if="header_old_show">
        </p>
        @endisset

        <p>
          <img v-if="header_new_show" :src="uploadedHeaderImage" style="width:100px;">
        </p>


        <h6>プロフィール画像</h6>
        <p>
          {!! Form::file('profile_image', ['v-on:change'=>'onFileProfileChange', 'accept'=>'.jpg,.JPG,.jpeg,.JPEG,.png,.PNG,.gif,.GIF', 'enctype'=>'multipart/form-data']) !!}
        </p>
        @isset($profile->profile_image)
        <p>
          <img src="../../{{$profile->profile_image}}" v-if="profile_old_show">
        </p>
        @endisset
        <p>
          <img v-if="profile_new_show" :src="uploadedProfileImage" style="width:100px;">
        </p>

        <h6>ユーザーネーム</h6>
        <p>
          @isset($profile->user_name)
          {!! Form::text('user_name', !empty(old('user_name'))?old('user_name'):$profile->user_name) !!}

          @else
          {!! Form::text('user_name', !empty(old('user_name'))?old('user_name'):$user->name) !!}

          @endisset
        </p>

        <h6>フェイスブック</h6>
        <p>
          @isset($profile->facebook)
          {!! Form::text('facebook', !empty(old('facebook'))?old('facebook'):$profile->facebook) !!}

          @else
          {!! Form::text('facebook', !empty(old('facebook'))?old('facebook'):'') !!}

          @endisset
        </p>
        <h6>インスタグラム</h6>
        <p>
          @isset($profile->instagram)
          {!! Form::text('instagram', !empty(old('instagram'))?old('instagram'):$profile->instagram) !!}

          @else
          {!! Form::text('instagram', !empty(old('instagram'))?old('instagram'):'') !!}

          @endisset
        </p>
        <h6>ツイッター</h6>
        <p>
          @isset($profile->twitter)
          {!! Form::text('twitter', !empty(old('twitter'))?old('twitter'):$profile->twitter) !!}

          @else
          {!! Form::text('twitter', !empty(old('twitter'))?old('twitter'):'') !!}

          @endisset
        </p>
        <h6>自己紹介</h6>
        <p>
          @isset($profile->text)
          {!! Form::textarea('text', !empty(old('text'))?old('text'):$profile->text) !!}

          @else
          {!! Form::textarea('text', !empty(old('text'))?old('text'):'') !!}

          @endisset
        </p>


        {!! Form::submit('プロフィールを編集する') !!}
        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

@endsection

