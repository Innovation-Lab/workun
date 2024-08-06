@extends('layout.layout--base')
@section('title', 'ダッシュボード')
@section('content')
  <div class="l-main">
    <div class="l-dashbord">
      <div class="p-dashboard">
        {{--  TODOリスト  --}}
        <x-todo-task />
      </div>
      <div class="p-crascoService">
        <div class="p-crascoService__head">
          <p class="title">その他のご利用可能なサービス</p>
        </div>
        <div class="p-crascoService__body">
          <div class="p-crascoService__list">
            <a
              class="p-crascoService__item"
              href="{{ config('url.kyouikun') }}"
              target="_blank"
            >
              <div class="logo">
                <img src="{{ asset('img/common/logo/logo_kyouikun.png') }}" alt=""height="32">
              </div>
              <p class="title">効率的なスタッフトレーニング</p>
            </a>
            <a
              class="p-crascoService__item"
              href="{{ config('url.retech_portal') }}"
              target="_blank"
            >
              <div class="logo">
                <img src="{{asset('img/common/logo/logo_portal.png')}}" alt="" height="17">
              </div>
              <p class="title">従業員情報等の管理</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
