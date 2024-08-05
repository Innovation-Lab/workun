@extends('layout.layout--base')
@section('title', '1 on 1シート 編集')
@section('content')
  <div class="l-edit">
    <div class="p-page p-page--selfCheck">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{ route('master.performance-review.index') }}" class="return">
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          <p class="title">1 on 1シート 編集</p>
        </div>
      </div>

      {{-- @include('master.self-check.modal._delete')  --}}
    </div>
  </div>
@endsection
