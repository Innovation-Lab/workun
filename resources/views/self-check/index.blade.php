@extends('layout.layout--base')
@section('title', 'セルフチェック-人事業務')
@section('content')
  <div class="l-index__devide">
    @include('component._todoTask')
    <div class="p-index">
      <div class="p-index__head">
        <h1 class="p-index__head--title">セルフチェック</h1>
        <div class="p-index__head--action">
          <a class="c-button--text is-current">対象シート</a>
          <a href="{{ route('self-check.all') }}" class="c-button--text">すべてのシート</a>
        </div>
      </div>
      <div class="p-index__body">
        <div class="c-tab p-tableBox">
          <div class="c-tab__head">
            <div class="c-tab__btn is-active c-tab--01">
              <svg width="20" height="20"><use xlink:href="#user" /></svg>
              実施対象
            </div>
            <div class="c-tab__btn c-tab--02">
              <svg width="20" height="20"><use xlink:href="#check" /></svg>
              評価入力
            </div>
            <div class="c-tab__btn c-tab--03">
              <svg width="20" height="20"><use xlink:href="#eye-open" /></svg>
              評価承認
            </div>
          </div>
          <div class="c-tab__body">
            <div class="c-tab__content is-display c-tab--01">
              @include('self-check.components._sheet1')
            </div>
            <div class="c-tab__content c-tab--02">
              @include('self-check.components._sheet2')
            </div>
            <div class="c-tab__content c-tab--03">
              @include('self-check.components._sheet3')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('self-check.components._script_tab')
@endsection
    