@extends('layout.layout--base')
@section('title', 'セルフチェック-人事業務評価')
@section('content')
  <div class="l-index p-approval">
    <div class="p-page">
      <div class="p-page__head">
        <h1 class="p-page__head--title u-align">
          <a
            href="{{ route('self-check.answers', [
              'selfCheckSheet' => $selfCheckSheet,
              'term' => $term,
            ]) }}"
            class="c-button__back"
          >
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          セルフチェック評価
        </h1>
      </div>
      <div class="p-page__body">
        <x-self-check-sheet.rating
          :selfCheckSheet="$selfCheckSheet"
          :selfCheckRating="$selfCheckRating"
        />
      </div>
    </div>
  </div>
  @include('self-check.components._script_tableWidth')
@endsection
