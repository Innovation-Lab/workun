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
            <a href="{{route('master.self-check.add')}}" class="c-button--add">
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
          <form>
            <div class="p-tableBox__middle">
              <div class="p-search">
                <div class="p-search__wrap">
                  <div class="p-search__keyword">
                    <div class="p-input">
                      <input type="search" name="keyword" placeholder="キーワード検索" value="" id="">
                    </div>
                  </div>
                  <div class="p-search__action">
                    <div class="p-search__detail">
                      <div class="p-search__setData">
                        <p class="title">
                          詳細条件 :
                        </p>
                        <button class="close">
                          <svg width="12" height="12"><use xlink:href="#close" /></svg>
                        </button>
                      </div>
                      <p class="c-button" data-remodal-target="modal_search">詳細検索</p>
                    </div>
                    <button type="submit" class="c-button c-button--brandPrimary p-search__button">絞り込む</button>
                  </div>
                </div>
              </div>
            </div>
            @include('master.self-check.modal._search')
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
                    'title' => '作成者 / 作成日時',
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
                  @for($tableBody = 0; $tableBody < 20; $tableBody++)
                    <tr>
                      <!-- タイトル -->
                      <td><div class="item title">基本挨拶、身だしなみ　セルフチェック表</div></td>                  
                      <!-- 評価方法 -->
                      <td class="u-tac"><div class="item c-txt__gray">5点評価</div></td>
                      <!-- 対象人数 -->
                      <td class="u-tac"><div class="item">249</div></td>
                      <!-- 評価期間 -->
                      <td><div class="item c-txt__gray">2024年 四半期 (7月~ 9月)</div></td>
                      <!-- 作成者 / 作成日時 -->
                      <td><div class="item">
                        大杉 雅也
                        <small>2024.04.08</small>
                      </div></td>
                      <!-- アクション -->
                      <td>
                        <div class="item row">
                          <a href="{{route('master.self-check.edit')}}" class="c-button--text">編集</a>
                          <a href="" class="c-button--text">複製</a>
                          <a href="" class="c-button--text" data-remodal-target="modal_delete_{{ $tableBody }}">削除</a>
                        </div>
                      </td>
                    </tr>
                    @include('master.self-check.modal._delete')
                  @endfor
                </tbody>
              </table>
            </div>
            {{-- ページング --}}
            <div class="p-pager">
              <p class="count">全 24 件中 1～24 件目</p>
              <div class="pageNav">
                <a href="" class="arrowButton arrowButton--prev disabled">
                  <svg width="28" height="28"><use xlink:href="#pageNav_prev" /></svg>
                </a>
                <div class="p-input">
                  <input type="text" placeholder="" value="1" id="">
                  <span class="total">/ 1</span>
                </div>
                <a href="" class="arrowButton arrowButton--next">
                  <svg width="28" height="28"><use xlink:href="#pageNav_next" /></svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
