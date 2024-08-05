@extends('layout.layout--base')
@section('title', '1 on 1')
@section('content')
{{--  セルフチェックシートからコピーしました。  --}}
  <div class="l-index__split">
    {{--  TODOリスト  --}}
    <x-todo-task />
    <div class="p-page">
      <div class="p-page__head u-align u-gap40">
        <h1 class="p-page__head--title">1 on 1</h1>
        <div class="p-page__head--action">
          <a href="{{ route('performance-review.index') }}" class="c-button--text is-current">対象シート</a>
          <a href="{{ route('performance-review.all') }}" class="c-button--text">全てのシート</a>
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
              href="{{ route('performance-review.index') }}"
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
              href="{{ route('performance-review.index', ['type' => 'rating']) }}"
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
                  @include('performance-review.components._sheet1')
                </div>
              @break
              @case("rating")
                <div class="c-tab__content is-display">
                  @include('performance-review.components._sheet2')
                </div>
              @break
            @endswitch
          </div>
        </div>
      </div>
    </div>
  </div>
  {{--  @include('self-check._script')  --}}
@endsection
