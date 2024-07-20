@extends('layout.layout--base')
@section('title', '雇用形態の新規作成')
@section('content')
  <div class="l-edit">
    <div class="p-page p-page--organization">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{route('master.organization.index')}}" class="return">
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          <p class="title">雇用形態の新規作成</p>
        </div>
      </div>
      <div class="p-page__body min">
        <form class="p-formBlock">
          <div class="p-formBlock__body">
            @include('master.organization.employment._form')
          </div>
          <div class="p-formBlock__foot">
            <div class="p-formBlock__action">
              <a href="{{route('master.organization.index')}}" class="c-button c-button--cancel c-button--sm u-w120">戻る</a>
              <button class="c-button c-button--brandPrimary c-button--sm u-w220">雇用形態を追加する</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection