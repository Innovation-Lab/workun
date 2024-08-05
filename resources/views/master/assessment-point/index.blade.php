{{--  セルフチェックシートを参照  --}}
@extends('layout.layout--base')
@section('title', '評価点設定')
@section('content')
  <div class="l-index">
    <div class="p-page p-page--selfCheck">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <p class="title">評価点設定</p>
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
            {{-- ページング --}}
            {{--  <x-pager :pagination="$selfCheckSheets->appends($request->all())"/>  --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
