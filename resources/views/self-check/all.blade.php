@extends('layout.layout--base')
@section('title', 'セルフチェック-人事業務')
@section('content')
  <div class="l-index__split">
    @include('component._todoTask')
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
          <div class="p-tableBox__middle">
            <div class="p-search">
              <div class="p-search__wrap">
                <div class="p-search__keyword">
                  <div class="p-input">
                    <input type="search" placeholder="キーワード検索" value="" id="">
                  </div>
                </div>
                <div class="p-search__action">
                  <div class="p-search__detail">
                    <div class="p-search__setData">
                      <p class="title">詳細条件 : 営業部 / リーダー / M3</p>
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
                  @for($tableBody = 0; $tableBody < 20; $tableBody++)
                    <tr data-href="">
                      <td>
                        <div class="item">
                          第8期 | 基本挨拶、身だしなみセルフチェック表
                        </div>
                      </td>
                      <td>
                        <div class="item">
                          2024年 四半期 (7月 ~ 9月)
                        </div>
                      </td>
                      <td>
                        <div class="item">
                          <p>
                            <span>評価：山田 啓介</span>
                          </p>
                        </div>
                      </td>
                    </tr>
                  @endfor
                </tbody>
              </table>
            </div>
            {{-- ページング --}}
            <div class="p-pager">
              <p class="count">全 320 件中 1～20 件目</p>
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
    