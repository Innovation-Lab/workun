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
          {{--  シートのタグを表示  --}}
          <x-self-check-sheet.sheet-tag :type="$type" />
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
