@extends('layout.layout--base')
@section('title', 'セルフチェック-人事業務結果')
@section('content')
  <div class="l-index p-approval">
    <div class="p-page">
      <div class="p-page__head">
        <h1 class="p-page__head--title u-align">
          <a href="javascript:history.back()" class="c-button__back">
            <svg width="20" height="20"><use xlink:href="#chevron_left" /></svg>
          </a>
          セルフチェック
        </h1>
      </div>
      <div class="p-page__body">
        @include('self-check.components._resultall')
      </div>
    </div>
  </div>
  @include('self-check.components.modal._comment')
  @include('self-check.components.modal._selfCheckResult')
  @include('self-check.components._script_modal')
@endsection
    