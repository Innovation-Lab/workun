@extends('layout.layout--base')
@section('title', 'セルフチェックマスタ')
@section('content')
  <div class="l-index">
    <div class="p-page p-page--selfCheck">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <p class="title">セルフチェックマスタ</p>
          <div class="action">
            <a href="{{ route('master.self-check.add') }}" class="c-button--add">
              <svg width="12" height="12"><use xlink:href="#add_btn" /></svg>
            </a>
          </div>
        </div>
      </div>
      <div class="p-page__body">
        <div class="p-tableBox">
          <div class="p-tableBox__head">
            <div class="mainText">
              <p class="title">作成シート一覧</p>
            </div>
            <div class="action"></div>
          </div>
          {{--  検索機能  --}}
          <x-self-check-sheet.form-index action-type="master.self-check.index"/>
          <div class="p-tableBox__body">
            {{-- ページング(件数のみ) --}}
            <div class="p-pager">
              <p class="count">
                全 {{ number_format($selfCheckSheets->total()) }} 件中
                {{ number_format($selfCheckSheets->firstItem()) }}～{{ number_format($selfCheckSheets->lastItem()) }} 件目
              </p>
            </div>
            {{-- テーブル一覧 --}}
            <div class="p-table c-scroll">
              <?php
                $tableHead = [
                  [
                    'title' => 'タイトル',
                    'width' => 'auto',
                    'class' => null,
                  ],[
                    'title' => '評価方法',
                    'width' => '100',
                    'class' => 'u-tac',
                  ],[
                    'title' => '対象人数',
                    'width' => '100',
                    'class' => 'u-tac',
                  ],[
                    'title' => '評価期間',
                    'width' => '180',
                    'class' => null,
                  ],[
                    'title' => '作成者 / 作成日',
                    'width' => '120',
                    'class' => null,
                  ],[
                    'title' => 'アクション',
                    'width' => '140',
                    'class' => 'u-tac',
                  ]
                ]
              ?>
              <table class="sticky">
                <colgroup>
                  @foreach($tableHead as $key => $theadItem)
                    <col class="u-w{!! $theadItem['width'] !!}" />
                  @endforeach
                </colgroup>
                <thead>
                  <tr>
                    @foreach($tableHead as $key => $theadItem)
                      <th class="{!! $theadItem['class'] !!}">
                        <div class="item">{!! $theadItem['title'] !!}</div>
                      </th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($selfCheckSheets as $selfCheckSheet)
                    <tr>
                      <!-- タイトル -->
                      <td><div class="item title">{{ $selfCheckSheet->display_title }}</div></td>
                      <!-- 評価方法 -->
                      <td class="u-tac"><div class="item c-txt__gray">{{ $selfCheckSheet->method_label }}</div></td>
                      <!-- 対象人数 -->
                      <td class="u-tac"><div class="item">{{ number_format($selfCheckSheet->self_check_sheet_targets()->count()) }}</div></td>
                      <!-- 評価期間 -->
                      <td><div class="item c-txt__gray">{{ $selfCheckSheet->period_name }}</div></td>
                      <!-- 作成者 / 作成日 -->
                      <td>
                        <div class="item">
                          {{ $selfCheckSheet->user_full_name }}
                          <small>{{ $selfCheckSheet->display_created }}</small>
                        </div>
                      </td>
                      <!-- アクション -->
                      <td>
                        <div class="item row">
                          <a href="{{ route('master.self-check.edit', $selfCheckSheet) }}" class="c-button--text">編集</a>
                          <a href="{{ route('master.self-check.copy', $selfCheckSheet) }}" class="c-button--text">複製</a>
                          @can('delete', $selfCheckSheet)
                            <a href="" class="c-button--text" data-remodal-target="modal_delete_{{ $selfCheckSheet->id }}">削除</a>
                            @include('master.self-check.modal._delete')
                          @endcan
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{-- ページング --}}
            <x-pager :pagination="$selfCheckSheets->appends($request->all())"/>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
