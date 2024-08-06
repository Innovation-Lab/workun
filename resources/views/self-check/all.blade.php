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
          <a href="{{ route('self-check.index') }}"  class="c-button--text">対象シート</a>
          <a class="c-button--text is-current">すべてのシート</a>
        </div>
      </div>
      <div class="p-page__body">

        <div class="p-tableBox">
          <div class="p-tableBox__head">
            <div class="mainText">
              <p class="title">シート一覧</p>
            </div>
          </div>
          {{--  検索機能  --}}
          <x-self-check-sheet.form-index action-type="self-check.all"/>
          <div class="p-tableBox__body">
            {{-- テーブル一覧 --}}
            <div class="p-table c-scroll">
              <?php
                $tableHead = [
                  [
                    'title' => 'タイトル',
                    'width' => 'auto',
                    'class' => null,
                  ],[
                    'title' => '評価期間',
                    'width' => '180',
                    'class' => null,
                  ],[
                    'title' => '評価者/承認者',
                    'width' => '160',
                    'class' => null,
                  ]
                ]
              ?>
              <table class="t-table__900 u-w__inherit sticky">
                <colgroup>
                  @foreach($tableHead as $key => $theadItem)
                    <col class="u-w{!! $theadItem['width'] !!}" />
                  @endforeach
                </colgroup>
                <thead>
                  <tr>
                    @foreach($tableHead as $key => $theadItem)
                      <th class="{!! $theadItem['class'] !!}">
                        <div class="item">
                          {!! $theadItem['title'] !!}
                        </div>
                      </th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($self_check_sheets as $self_check_sheet)
                    <tr data-href="{{ route('self-check.resultall') }}">
                      <td>
                        <div class="item">
                          {{ $self_check_sheet->display_title }}
                        </div>
                      </td>
                      <td>
                        <div class="item">
                          {{ $self_check_sheet->period_name }}
                        </div>
                      </td>
                      <td>
                        <div class="item">
                          <p>
                            <span>評価：{{ data_get($self_check_sheet, 'rating.reviewer.full_name', '未登録') }}</span><br />
                            <span>承認：{{ data_get($self_check_sheet, 'rating.approver.full_name', '未登録') }}</span>
                          </p>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{-- ページング --}}
            <x-pager :pagination="$self_check_sheets->appends($request->all())"/>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
