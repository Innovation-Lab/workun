@extends('layout.layout--base')
@section('title', 'セルフチェック-人事業務詳細')
@section('content')
  <div class="l-index">
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
              <p class="c-txt__xs">対象者<span class="c-txt__lg">12</span>名</p>
            </div>
          </div>
          
          <div class="p-tableBox__body" style="padding:0 0 1.5rem;">
            {{-- テーブル一覧 --}}
            <div class="p-table__check">
              <div class="t-wrapper">
                <table class="t-table">
                  <thead>
                    <tr>
                      <th colspan="3" rowspan="2" class="sticky_1">
                        <div class="p-table__check--head">セルフチェック項目</div>
                      </th>
                      <th colspan="26">
                        <div class="cell sticky_4 u-w200 c-border_0">期間 : 2024.07 ~ 2025.06</div>
                        <div class="p-table__cell--wrapper">
                          <div class="u-tac c-txt__min cell sticky_4" style="line-height:2.3">平均</div>
                          <div class="p-table__cell">
                            <?php for($p = 7; $p < 13; $p++){ ?>  
                            <div class="u-tac c-txt__min cell">
                              <strong class="c-txt__md c-txt__weight--700"><?= $p; ?></strong>月
                            </div>
                            <?php }?>
                            <?php for($p = 1; $p < 7; $p++){ ?>  
                            <div class="u-tac c-txt__min cell">
                              <strong class="c-txt__md c-txt__weight--700"><?= $p; ?></strong>月
                            </div>
                            <?php }?>
                          </div>
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
                        <div class="p-table__cell--wrapper">
                          <div class="u-flex sticky_4">
                            <p class="c-txt__md c-txt__gray-600">3.2</p>
                            <p class="c-txt__md c-txt__weight--600">4.6</p>
                          </div>
                          <div class="p-table__cell">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
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
                        <div class="p-table__cell--wrapper">
                          <div class="u-flex sticky_4">
                            <p class="c-txt__md c-txt__gray-600">3.2</p>
                            <p class="c-txt__md c-txt__weight--600">4.6</p>
                          </div>
                          <div class="p-table__cell">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
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
                        <div class="p-table__cell--wrapper">
                          <div class="u-flex sticky_4">
                            <p class="c-txt__md c-txt__gray-600">3.2</p>
                            <p class="c-txt__md c-txt__weight--600">4.6</p>
                          </div>
                          <div class="p-table__cell">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    {{-- このあたりのべた書き開発時に消してください --}}
                    <tr>
                      <th rowspan="" class="u-w100 sticky_1">行動規範</th>
                      <th class="u-w140 sticky_2">クラスコ100%</th>
                      <th class="u-w300 sticky_3">
                        <p class="c-txt__xs">
                          組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                        </p>
                      </th>
                      <td>
                        <div class="p-table__cell--wrapper">
                          <div class="u-flex sticky_4">
                            <p class="c-txt__md c-txt__gray-600">3.2</p>
                            <p class="c-txt__md c-txt__weight--600">4.6</p>
                          </div>
                          <div class="p-table__cell">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th rowspan="2" class="u-w100 sticky_1">主体的 / 問題解決行動</th>
                      <th class="u-w140 sticky_2">経営パートナー力</th>
                      <th class="u-w300 sticky_3">
                        <p class="c-txt__xs">
                          組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                        </p>
                      </th>
                      <td>
                        <div class="p-table__cell--wrapper">
                          <div class="u-flex sticky_4">
                            <p class="c-txt__md c-txt__gray-600">3.2</p>
                            <p class="c-txt__md c-txt__weight--600">4.6</p>
                          </div>
                          <div class="p-table__cell">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th class="u-w140 sticky_2">組織横断 問題解決</th>
                      <th class="u-w300 sticky_3">
                        <p class="c-txt__xs">
                          組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                        </p>
                      </th>
                      <td>
                        <div class="p-table__cell--wrapper">
                          <div class="u-flex sticky_4">
                            <p class="c-txt__md c-txt__gray-600">3.2</p>
                            <p class="c-txt__md c-txt__weight--600">4.6</p>
                          </div>
                          <div class="p-table__cell">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th rowspan="3" class="u-w100 sticky_1">チーム活性化行動</th>
                      <th class="u-w140 sticky_2">組織開発</th>
                      <th class="u-w300 sticky_3">
                        <p class="c-txt__xs">
                          組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                        </p>
                      </th>
                      <td>
                        <div class="p-table__cell--wrapper">
                          <div class="u-flex sticky_4">
                            <p class="c-txt__md c-txt__gray-600">3.2</p>
                            <p class="c-txt__md c-txt__weight--600">4.6</p>
                          </div>
                          <div class="p-table__cell">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th class="u-w140 sticky_2">人材育成力</th>
                      <th class="u-w300 sticky_3">
                        <p class="c-txt__xs">
                          組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                        </p>
                      </th>
                      <td>
                        <div class="p-table__cell--wrapper">
                          <div class="u-flex sticky_4">
                            <p class="c-txt__md c-txt__gray-600">3.2</p>
                            <p class="c-txt__md c-txt__weight--600">4.6</p>
                          </div>
                          <div class="p-table__cell">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th class="u-w140 sticky_2">育成（業務分担書）</th>
                      <th class="u-w300 sticky_3">
                        <p class="c-txt__xs">
                          組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                        </p>
                      </th>
                      <td>
                        <div class="p-table__cell--wrapper">
                          <div class="u-flex sticky_4">
                            <p class="c-txt__md c-txt__gray-600">3.2</p>
                            <p class="c-txt__md c-txt__weight--600">4.6</p>
                          </div>
                          <div class="p-table__cell">
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex">
                              <p class="c-txt__md c-txt__gray-600">3</p>
                              <p class="c-txt__md c-txt__weight--600">4</p>
                            </div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                            <div class="u-flex"><p class="c-txt__md c-txt__gray-600">3</p><p class="c-txt__md c-txt__weight--600">4</p></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    {{-- ここまで --}}
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection