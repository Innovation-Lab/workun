@extends('layout.layout--base')
@section('title', '個人チェック評価')
@section('content')
{{--  セルフチェックシートからコピーしました。  --}}
<div class="l-index__split">
  {{--  TODOリスト  --}}
  <x-todo-task />
  <div class="p-page">
    <div class="p-page__head u-align u-gap40">
      <h1 class="p-page__head--title">定期評価</h1>
      <div class="p-page__head--action">
        <a href="{{ route('personal-assessment.index') }}" class="c-button--text">個人評価</a>
        <a href="{{ route('personal-assessment.check') }}" class="c-button--text is-current">個人チェック評価</a>
      </div>
    </div>
    <div class="p-page__body">
      <div class="c-tab p-tableBox">
        {{--  シートのタグを表示  --}}
        <div class="c-tab__head">
          <a
            class="
              c-tab__btn c-tab--01
              @if($type === "answer")
                is-active
              @endif
            "
            href="{{ route('personal-assessment.check') }}"
          >
            <svg width="20" height="20"><use xlink:href="#user" /></svg>
            実施対象
          </a>
          <a
            class="c-tab__btn c-tab--02
              @if($type === "rating")
                is-active
              @endif
            "
            href="{{ route('personal-assessment.check', ['type' => 'rating']) }}"
          >
            <svg width="20" height="20"><use xlink:href="#check" /></svg>
            評価入力
          </a>
          <a
            class="c-tab__btn c-tab--03
              @if($type === "confirm")
                is-active
              @endif
            "
            href="{{ route('personal-assessment.check', ['type' => 'confirm']) }}"
          >
            <svg width="20" height="20"><use xlink:href="#eye-open" /></svg>
          評価承認
        </a>
        </div>

        {{--  各シートを表示  --}}
        <div class="c-tab__body">
          @switch($type)
            @case("answer")
              <div class="c-tab__content is-display">
                @include('personal-assessment.components._self-check-sheet1')
              </div>
            @break
            @case("rating")
              <div class="c-tab__content is-display">
                @include('personal-assessment.components._self-check-sheet2')
              </div>
            @break
            @case("confirm")
              <div class="c-tab__content is-display">
                @include('personal-assessment.components._self-check-sheet3')
              </div>
            @break
          @endswitch
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
