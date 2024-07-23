@extends('layout.layout--base')
@section('title', 'セルフチェック-人事業務評価')
@section('content')
  <div class="l-index p-approval">
    <div class="p-page">
      <div class="p-page__head">
        <h1 class="p-page__head--title u-align">
          <a href="javascript:history.back()" class="c-button__back">
            <svg width="20" height="20"><use xlink:href="#chevron_left" /></svg>
          </a>
          セルフチェック評価
        </h1>
      </div>
      <div class="p-page__body">
        @include('self-check.components._approval')
      </div>
    </div>
  </div>
  @include('self-check.components.modal._selfCheck')
  @include('self-check.components.modal._approval')
@endsection