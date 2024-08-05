@extends('layout.layout--base')
@section('title', '1 on 1シート 新規作成')
@section('content')
  <div class="l-edit">
    <div class="p-page p-page--selfCheck">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{ route('master.performance-review.index') }}" class="return">
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          <p class="title">1 on 1シート 新規作成</p>
        </div>
      </div>

      {{--  @include('master.self-check.modal._alert_sheet')  --}}
    </div>
  </div>
@endsection
