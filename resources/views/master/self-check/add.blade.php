@extends('layout.layout--base')
@section('title', 'セルフチェックシート 新規作成')
@section('content')
  <div class="l-edit">
    <div class="p-page p-page--selfCheck">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{route('master.self-check.index')}}" class="return">
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          <p class="title">セルフチェックシート 新規作成</p>
        </div>
      </div>
      <form class="p-page__body row2">
        @include('master.self-check._form_layer')
        @include('master.self-check._form_sheet')
      </form>
    </div>
  </div>
@endsection