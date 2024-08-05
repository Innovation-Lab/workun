{{--  セルフチェックシートを参照  --}}
@extends('layout.layout--base')
@section('title', '1 on 1マスタ')
@section('content')
  <div class="l-index">
    <div class="p-page p-page--selfCheck">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <p class="title">1 on 1マスタ</p>
          <div class="action">
            <a href="{{ route('master.performance-review.add') }}" class="c-button--add">
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
          <form id="search_form">
            <div class="p-tableBox__middle">
              <div class="p-search">
                <div class="p-search__wrap">
                  <div class="p-search__keyword">
                    <div class="p-input">
                      <input type="search" name="keyword" placeholder="キーワード検索" value="{{ request('keyword') }}" />
                    </div>
                  </div>
                  <div class="p-search__action">
                    <div class="p-search__detail">
                      {{--  @if($condition)  --}}
                        <div class="p-search__setData">
                          <p class="title">
                            詳細条件 :
                          </p>
                          <a
                            href=""
                            class="close"
                          >
                            <svg width="12" height="12"><use xlink:href="#close" /></svg>
                          </a>
                        </div>
                      {{--  @endif  --}}
                      <p class="c-button" data-remodal-target="modal_search">詳細検索</p>
                    </div>
                    <button type="submit" class="c-button c-button--brandPrimary p-search__button">絞り込む</button>
                  </div>
                </div>
              </div>
            </div>
            {{--  @include('self-check.components.modal._search')  --}}
          </form>

          <div class="p-tableBox__body">
            {{-- ページング(件数のみ) --}}
            <div class="p-pager">
              <p class="count">
                全 24 件中
                1～24 件目
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
                  {{--  @foreach($selfCheckSheets as $selfCheckSheet)  --}}
                    <tr>
                      <!-- タイトル -->
                      <td>
                        <div class="item title">
                          2025年度上期 業務仕事ぶり(行動)評価
                        </div>
                      </td>
                      <!-- 対象人数 -->
                      <td class="u-tac">
                        <div class="item">
                          249
                        </div>
                      </td>
                      <!-- 評価期間 -->
                      <td>
                        <div class="item c-txt__gray">
                          2024年 通常通期
                        </div>
                      </td>
                      <!-- 作成者 / 作成日 -->
                      <td>
                        <div class="item">
                          山田 テスト
                          <small>2024.04.08</small>
                        </div>
                      </td>
                      <!-- アクション -->
                      <td>
                        <div class="item row">
                          <a href="{{ route('master.performance-review.edit') }}" class="c-button--text">編集</a>
                          <a href="{{ route('master.performance-review.copy') }}" class="c-button--text">複製</a>
                          <a href="" class="c-button--text" data-remodal-target="modal_delete_1">削除</a>
                          {{--  @can('delete', $selfCheckSheet)
                            <a href="" class="c-button--text" data-remodal-target="modal_delete_{{ $selfCheckSheet->id }}">削除</a>
                            @include('master.self-check.modal._delete')
                          @endcan  --}}
                        </div>
                      </td>
                    </tr>
                  {{--  @endforeach  --}}
                </tbody>
              </table>
            </div>
            {{-- ページング --}}
            {{--  <x-pager :pagination="$selfCheckSheets->appends($request->all())"/>  --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
