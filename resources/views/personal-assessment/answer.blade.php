@extends('layout.layout--base')
@section('title', '定期評価｜個人評価')
@section('content')
  <div class="p-page">
    <div class="p-page__head">
      <h1 class="p-page__head--title u-align">
        <a
          href="{{ route('personal-assessment.index', ['type' => 'answer']) }}"
          class="c-button__back"
        >
          <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
        </a>
        定期評価｜個人評価
      </h1>
    </div>
  </div>
@endsection
