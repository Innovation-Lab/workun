@extends('layout.layout--base')
@section('title', 'セルフチェック-人事業務')
@section('content')
  <div class="l-index__split">
    {{--  TODOリスト  --}}
    <x-todo-task />
    <div class="p-page">
      <div class="p-page__head u-align u-gap40">
        <h1 class="p-page__head--title">セルフチェック</h1>
        <div class="p-page__head--action">
          <a class="c-button--text is-current">対象シート</a>
          <a href="{{ route('self-check.all') }}" class="c-button--text">すべてのシート</a>
        </div>
      </div>
      <div class="p-page__body">
        <div class="c-tab p-tableBox">
          <div class="c-tab__head">
            <a
              class="
                c-tab__btn c-tab--01
                @if($type === "answer")
                  is-active
                @endif
              "
              href="{{ route('self-check.index') }}"
            >
              <svg width="20" height="20"><use xlink:href="#user" /></svg>
              実施対象
            </a>
            {{--  @if(!$show_only_answer)  --}}
              <a
                class="
                  c-tab__btn c-tab--02
                  @if($type === "rating")
                    is-active
                  @endif
                "
                href="{{ route('self-check.index', ['type' => 'rating']) }}"
              >
                <svg width="20" height="20"><use xlink:href="#check" /></svg>
                評価入力
              </a>
              <a
                class="
                  c-tab__btn c-tab--03
                  @if($type === "confirm")
                    is-active
                  @endif
                "
                href="{{ route('self-check.index', ['type' => 'confirm']) }}"
              >
                <svg width="20" height="20"><use xlink:href="#eye-open" /></svg>
                評価承認
              </a>
            {{--  @endif  --}}
          </div>
          <div class="c-tab__body">
            @switch($type)
              @case("answer")
                <div class="c-tab__content is-display">
                  @include('self-check.components._sheet1')
                </div>
              @break
              @case("rating")
                <div class="c-tab__content is-display">
                  @include('self-check.components._sheet2')
                </div>
              @break
              @case("confirm")
                <div class="c-tab__content is-display">
                  @include('self-check.components._sheet3')
                </div>
              @break
            @endswitch
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('self-check._script')
@endsection
