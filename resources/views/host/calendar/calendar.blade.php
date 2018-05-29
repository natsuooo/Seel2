@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">{{ $user->profile->user_name }}さんのカレンダー</div>

        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif

        <div class="card-body">
        <h5>カレンダー</h5>
          <table>
            <thead>
              <tr>
                <th><a href="{{url('/calendar', $prev)}}">&laquo;</a></th>
                <th colspan="5">{{ $yearMonth }}</th>
                <th><a href="{{url('/calendar', $next)}}">&raquo;</a></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Sun</td>
                <td>Mon</td>
                <td>Tue</td>
                <td>Wed</td>
                <td>Thu</td>
                <td>Fri</td>
                <td>Sat</td>
              </tr>
               {!! $calendar !!}
            </tbody>
            <tfoot>
              <th colspan="7"><a href="/calendar">Today</a></th>
            </tfoot>
          </table>
        </div>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

</body>
</html>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">受け入れ可能時間を追加する</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {{ Form::open(['url' => '/message/submit', 'method'=>'post']) }}
                {{ Form::token() }} 
                {{Form::select('from_hour', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24'])}}:
                {{Form::select('from_minute', ['00', '10', '20', '30', '40', '50'])}}~
                {{Form::select('to_hour', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24'])}}:
                {{Form::select('to_minute', ['00', '10', '20', '30', '40', '50'])}}
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{ Form::submit('追加する') }}
                {{ Form::close() }}
              </div>
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
  </div>
</div>
@endsection

