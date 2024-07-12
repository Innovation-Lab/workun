@extends('layout.layout--base')
@section('title', 'ダッシュボード')
@section('content')
  <div class="l-main">
    <div class="l-dashbord">
      <div class="p-dashboard">
        <div class="p-todo">
          <div class="p-todo__head">
            <div class="p-todo__text">
              <p class="title">TODO</p>
              <p class="desc">以下のタスクを完了させましょう</p>
            </div>
            <div class="p-todo__action">
              <a href="" class="c-button c-button--brandPrimary">全ての人事業務を評価</a>
            </div>
          </div>
          <div class="p-todo__body">
            @if($answer_self_check_sheets->isNotEmpty())
              <div class="p-todo__block">
                <p class="title">実施対象</p>
                <ul class="p-todo__list">
                  @foreach($answer_self_check_sheets as $self_check_sheet)
                    <x-task-list
                      :listClass="$self_check_sheet->list_class"
                      :statusClass="$self_check_sheet->status_class"
                      :term="$self_check_sheet->display_term"
                      :title="$self_check_sheet->display_title"
                      :subTitle="$self_check_sheet->display_sub_title"
                      :status="$self_check_sheet->display_status"
                    />
                  @endforeach
                </ul>
              </div>
            @endif


            @foreach ([
              '評価入力',
              '評価承認',
            ] as $key => $todoBlock)
              <div class="p-todo__block">
                <p class="title">{!! $todoBlock; !!}</p>
                <ul class="p-todo__list">
                  <!-- 評価入力 -->
                  @if($key == 0)
                    <li class="p-todo__item p-todo__item--assessment">
                      <a href=""></a>
                      <span class="date">2024.12.01 - 2024.12.08</span>
                      <div class="mainInfo">
                        <span class="c-status c-status--assessment">評価待ち</span>
                        <p class="title">セルフチェック - 2024年11月</p>
                      </div>
                      <p class="name">第8期 | 基本挨拶、身だしなみセルフチェック表</p>
                    </li>
                  @endif
                  <!-- 評価承認 -->
                  @if($key == 1)
                    <li class="p-todo__item p-todo__item--clean">
                      <p class="u-tac">{!! $todoBlock; !!}タスクは0件です</p>
                    </li>
                  @endif
                </ul>
              </div>
            @endforeach
          </div>
        </div>
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
