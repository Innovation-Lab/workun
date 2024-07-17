@extends('layout.layout--base')
@section('title', 'ダッシュボード')
@section('content')
  <div class="l-edit">
    <div class="p-page p-page--member">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{route('master.member.index')}}" class="return"></a>
          <p class="title">従業員情報 編集</p>
        </div>
      </div>
      <div class="p-page__body row2">
        <div class="p-formBlock">
          <div class="p-formBlock__head">
            <p class="title">部署設定</p>
          </div>
          <div class="p-formBlock__body">
            @include('master.member._form')
          </div>
        </div>
        <div class="p-formBlock min">
           @include('master.member._memberInfo')
        </div>
      </div>
    </div>
  </div>

  @include('master.member.modal._rater')
@endsection
    