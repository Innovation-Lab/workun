@extends('layout.layout--base')
@section('title', 'セルフチェック-人事業務入力')
@section('content')
  <div class="l-index">
    <div class="p-page">
      <div class="p-page__head">
        <h1 class="p-page__head--title u-align">
          <a href="javascript:history.back()" class="c-button__back">
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          セルフチェック
        </h1>
      </div>
      <div class="p-page__body">
        @include('self-check.components._answer')
      </div>
    </div>
  </div>
  @include('self-check.components.modal._submission')
  @include('self-check.components.modal._comment')
@endsection
    