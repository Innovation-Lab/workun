@extends('layout.layout--base')
@section('title', '1 on 1')
@section('content')
{{--  セルフチェックシートからコピーしました。  --}}
  <div class="l-index__split">
    {{--  TODOリスト  --}}
    <x-todo-task />
    <div class="p-page">
      <div class="p-page__head u-align u-gap40">
        <h1 class="p-page__head--title">1 on 1</h1>
        <div class="p-page__head--action">
          <a href="{{ route('performance-review.index') }}" class="c-button--text">対象シート</a>
          <a href="{{ route('performance-review.all') }}" class="c-button--text is-current">全てのシート</a>
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
                            href="{{ route('performance-review.all') }}"
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
                  {{--  @foreach($self_check_sheets as $self_check_sheet)  --}}
                    <tr data-href="{{ route('performance-review.resultAll') }}">
                      <td>
                        <div class="item">
                          営業実績に関する個人面談
                        </div>
                      </td>
                      <td>
                        <div class="item">
                          2024年 上期
                        </div>
                      </td>
                      <td>
                        <div class="item">
                          <p>
                            <span>評価：山田 テスト</span><br />
                            <span>承認：山田 テスト</span>
                          </p>
                        </div>
                      </td>
                    </tr>
                  {{--  @endforeach  --}}
                </tbody>
              </table>
            </div>
            {{-- ページング --}}
            {{--  <x-pager :pagination="$self_check_sheets->appends($request->all())"/>  --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  {{--  @include('self-check._script')  --}}
@endsection
