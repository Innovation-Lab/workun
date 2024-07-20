@extends('layout.layout--base')
@section('title', '従業員情報 編集')
@section('content')
  <div class="l-edit">
    <div class="p-page p-page--member">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{route('master.member.index')}}" class="return">
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          <p class="title">従業員情報 編集</p>
        </div>
      </div>
      <div class="p-page__body row2">
        <div class="p-formBlock">
          <div class="p-formBlock__head">
            <p class="title">部署設定</p>
          </div>
          <div class="p-formBlock__body">
            <x-users.form-edit :$user/>
          </div>
        </div>
        <div class="p-formBlock min">
           @include('master.member._memberInfo')
        </div>
      </div>
    </div>
  </div>

  @include('master.member.modal._rater')
  @include('master.member.modal._authorizer')
@endsection
    