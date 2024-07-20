@extends('layout.layout--base')
@section('title', 'セルフチェック-人事業務詳細')
@section('content')
  <div class="l-index p-approval">
    <div class="p-page">
      <div class="p-page__head">
        <h1 class="p-page__head--title u-align">
          <a href="javascript:history.back()" class="c-button__back">
            <svg width="20" height="20"><use xlink:href="#chevron_left" /></svg>
          </a>
          セルフチェック詳細
        </h1>
      </div>
      <div class="p-page__body">
        
        <div class="p-tableBox">
          <div class="p-tableBox__head">
            <div class="mainText">
              <p class="title">2024年 9月 評価承認  :  基幹職 仕事ぶりチェック</p>
              <p class="c-txt__xs">対象者<span class="c-txt__lg c-txt__weight--700">12</span>名</p>
            </div>
          </div>
          
          <div class="p-tableBox__body" style="padding:0">
            <form action="">
              {{-- テーブル一覧 --}}
              <div class="p-table__check c-scroll">
                <div class="t-wrapper">
                  <table class="t-table t-table__narrow">
                    <thead>
                      <tr>
                        <th colspan="3" rowspan="2" class="sticky_1">
                          <div class="p-table__check--head">セルフチェック項目</div>
                        </th>
                        <th colspan="14">{{-- 人物数の2倍の数colspan --}}
                          <div class="cell sticky_4 p-table__check--month c-border_0">
                            <div class="u-align between">
                              <button type="button" class="c-txt__weight--700">
                                <svg width="20" height="20"><use xlink:href="#chevron_left" /></svg>
                                8<small class="c-txt__min">月</small>
                              </button>
                              <p class="u-tac c-txt__xs">
                                <strong class="c-txt__lg c-txt__weight--700">9</strong>月
                              </p>
                              <button disabled type="button" class="c-txt__weight--700">
                                10<small class="c-txt__min">月</small>
                                <svg width="20" height="20"><use xlink:href="#chevron_right" /></svg>
                              </button>
                            </div>
                          </div>
                          <div class="p-table__cell--input">
                            <div class="cell u-w90 u-tac c-txt__xs">
                              <a data-remodal-target="modal_selfCheck" class="name">山口 太郎</a>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="cell u-w90 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">佐藤 英恵</a></div>
                            <div class="cell u-w90 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">勅使河原 倫太郎</a></div>
                            <div class="cell u-w90 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">和久 明</a></div>
                            <div class="cell u-w90 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">林 健</a></div>
                            <div class="cell u-w90 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">田井中川 一郎</a></div>
                            <div class="cell u-w90 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">綾小路 康太</a></div>
                            <div class="cell u-w90 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">斎藤 加奈子</a></div>
                            <div class="cell u-w90 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">長良川 花梨</a></div>
                            <div class="cell u-w90 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">金子 真由</a></div>

                          </div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th rowspan="3" class="u-w100 sticky_1">業務遂行力</th>
                        <th class="u-w140 sticky_2">マネジメント力</th>
                        <th class="u-w300 sticky_3">
                          <p class="c-txt__xs">
                            組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="" class="sticky_2">成長力</td>
                        <th class="sticky_3">
                          <p class="c-txt__xs">
                          業務を遂行する上で、今期の成長課題を克服したか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="" class="sticky_2">成長（業務分担書）</th>
                        <th class="sticky_3">
                          <p class="c-txt__xs">
                          業務を遂行するか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="3" class="u-w100 sticky_1">業務遂行力</th>
                        <th class="u-w140 sticky_2">マネジメント力</th>
                        <th class="u-w300 sticky_3">
                          <p class="c-txt__xs">
                            組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="" class="sticky_2">成長力</td>
                        <th class="sticky_3">
                          <p class="c-txt__xs">
                          業務を遂行する上で、今期の成長課題を克服したか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="" class="sticky_2">成長（業務分担書）</th>
                        <th class="sticky_3">
                          <p class="c-txt__xs">
                          業務を遂行するか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="2" class="u-w100 sticky_1">業務遂行力</th>
                        <th class="u-w140 sticky_2">マネジメント力</th>
                        <th class="u-w300 sticky_3">
                          <p class="c-txt__xs">
                            組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="" class="sticky_2">成長（業務分担書）</th>
                        <th class="sticky_3">
                          <p class="c-txt__xs">
                          業務を遂行するか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="3" class="u-w100 sticky_1">業務遂行力</th>
                        <th class="u-w140 sticky_2">マネジメント力</th>
                        <th class="u-w300 sticky_3">
                          <p class="c-txt__xs">
                            組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="" class="sticky_2">成長力</td>
                        <th class="sticky_3">
                          <p class="c-txt__xs">
                          業務を遂行する上で、今期の成長課題を克服したか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="" class="sticky_2">成長（業務分担書）</th>
                        <th class="sticky_3">
                          <p class="c-txt__xs">
                          業務を遂行するか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="4" class="u-w100 sticky_1">業務遂行力</th>
                        <th class="u-w140 sticky_2">マネジメント力</th>
                        <th class="u-w300 sticky_3">
                          <p class="c-txt__xs">
                            組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="" class="sticky_2">成長力</td>
                        <th class="sticky_3">
                          <p class="c-txt__xs">
                          業務を遂行する上で、今期の成長課題を克服したか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="" class="sticky_2">成長（業務分担書）</th>
                        <th class="sticky_3">
                          <p class="c-txt__xs">
                          業務を遂行するか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th rowspan="" class="sticky_2">成長（業務分担書）</th>
                        <th class="sticky_3">
                          <p class="c-txt__xs">
                          業務を遂行するか？
                          </p>
                        </th>
                        <td>
                          <div class="p-table__cell--input">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <select name="" class="p-table__cell--select">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3" selected>3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            {{-- 上と同じ開発時に削除 --}}
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select>
                            </div>
                          </div>
                        </td>
                      </tr>

                    </tbody>
                  </table>

                </div>
              </div>
              <div class="u-align--end u-pd24">
                <input type="submit" class="c-button--text" value="下書き保存する">
                <input type="submit" class="c-button c-button--primary" value="この結果を承認する">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('components.modal._selfCheck')

@endsection