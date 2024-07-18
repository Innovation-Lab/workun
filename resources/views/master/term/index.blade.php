@extends('layout.layout--base')
@section('title', '評価期間一覧')
@section('content')
  <div class="l-index">
    <div class="p-page p-page--term min">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <p class="title">評価期間設定</p>
          <div class="action">
            <a href="{{route('master.term.add')}}" class="c-button--add">
              <svg width="12" height="12"><use xlink:href="#add_btn" /></svg>
            </a>
          </div>
        </div>
      </div>
      <div class="p-page__body">
        <div class="p-tableBox">
          <div class="p-tableBox__head">
            <div class="mainText">
              <p class="title">評価期間一覧</p>
            </div>
            <div class="action"></div>
          </div>
          <form>
            <div class="p-tableBox__middle">
              <div class="p-search">
                <div class="p-search__wrap">
                  <div class="p-search__keyword">
                    <div class="p-input">
                      <input type="search" name="keyword" placeholder="キーワード検索" value="{{ request('keyword') }}" />
                    </div>
                  </div>
                  <div class="p-search__action">
                    <button type="submit" class="c-button c-button--brandPrimary p-search__button">絞り込む</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="p-tableBox__body">
            {{-- ページング(件数のみ) --}}
            <div class="p-pager">
              <p class="count">
                全 {{ number_format($periods->total()) }} 件中
                {{ number_format($periods->firstItem()) }}～{{ number_format($periods->lastItem()) }} 件目
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
                    'title' => '評価開始年月',
                    'width' => '120px',
                    'class' => 'u-tac',
                  ],[
                    'title' => '評価終了年月',
                    'width' => '120px',
                    'class' => 'u-tac',
                  ]
                ]
              ?>
              <table class="w-auto">
                <colgroup>
                  @foreach($tableHead as $key => $theadItem)
                    <col style="width: {!! $theadItem['width'] !!}" />
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
                  @foreach($periods as $period)
                    <tr data-href="{{ route('master.term.edit') }}">
                      <!-- タイトル -->
                      <td><div class="item title">{{ $period->name }}</div></td>
                      <!-- 評価開始年月 -->
                      <td class="u-tac"><div class="item term_arrow">{{ $period->display_start }}</div></td>
                      <!-- 評価終了年月 -->
                      <td class="u-tac"><div class="item">{{ $period->display_end }}</div></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{-- ページング --}}
            <x-pager :pagination="$periods->appends($request->all())"/>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
