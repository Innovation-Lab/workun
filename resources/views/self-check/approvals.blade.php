@extends('layout.layout--base')
@section('title', 'セルフチェック-人事業務承認')
@section('content')
  <div class="l-index p-approval">
    <div class="p-page">
      <div class="p-page__head">
        <h1 class="p-page__head--title u-align">
          <a
            href="{{ route('self-check.index', ['type' => 'confirm']) }}"
            class="c-button__back"
          >
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          セルフチェック詳細
        </h1>
      </div>
      <div class="p-page__body">
        <x-self-check-sheet.approvals
          :selfCheckSheet="$selfCheckSheet"
          :selfCheckRatings="$self_check_ratings"
          :term="$term"
        />
      </div>
    </div>
  </div>
{{--  @include('self-check.components.modal._selfCheck')--}}
{{--  @include('self-check.components.modal._approval')--}}
{{--  @include('self-check.components.modal._remand')--}}
{{--  @include('self-check.components._script_modal')--}}
  @include('self-check.components._script_tableWidth')
@endsection
