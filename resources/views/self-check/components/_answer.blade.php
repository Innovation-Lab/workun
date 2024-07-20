<div class="p-tableBox">
  <div class="p-tableBox__head">
    <div class="mainText">
      <p class="status--4">結果確定</p>
      <p class="title">基幹職 仕事ぶりチェック</p>
    </div>
    <div class="action u-align u-gap8">
      <div class="p-user__image c-noImage">
        <img class="c-image c-image--round" src="">
      </div>
      <div class="p-user__text">
        <p>酒井 雄輝</p>
        <p class="c-txt__gray-500 c-txt__xs">評価確定日：{{ date('Y/m/d') }}</p>
      </div>
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
                <th colspan="26">
                  <div class="cell sticky_4 p-table__check--month c-border_0 u-tac">期間 : 2024.07 ~ 2025.06</div>
                  <div class="p-table__cell--input">
                  {{-- <div class="u-tac c-txt__xs cell sticky_4" style="line-height:2.3">平均</div> --}}
                    <div class="p-table__cell">
                      <?php for($p = 7; $p < 13; $p++){ ?>  
                      <div class="u-tac c-txt__xs cell">
                        <strong class="c-txt__lg c-txt__weight--700"><?= $p; ?></strong>月
                      </div>
                      <?php }?>
                      <?php for($p = 1; $p < 7; $p++){ ?>  
                      <div class="u-tac c-txt__xs cell">
                        <strong class="c-txt__lg c-txt__weight--700"><?= $p; ?></strong>月
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
                  <div class="p-table__cell--input">
                    {{-- <div class="u-flex sticky_4">
                      <p class="c-txt__md c-txt__gray-600">3.2</p>
                      <p class="c-txt__md c-txt__weight--600">4.6</p>
                    </div> --}}
                    <div class="p-table__cell">
                      <div class="u-flex">
                        <p class="c-txt__md c-txt__weight--600">4</p>
                      </div>
                      <div class="u-flex">
                        <select name="" class="p-table__cell--select">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3" selected>3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
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
                    {{-- <div class="u-flex sticky_4">
                      <p class="c-txt__md c-txt__gray-600">3.2</p>
                      <p class="c-txt__md c-txt__weight--600">4.6</p>
                    </div> --}}
                    <div class="p-table__cell">
                      <div class="u-flex">
                        <p class="c-txt__md c-txt__weight--600">4</p>
                      </div>
                      <div class="u-flex">
                        <select name="" class="p-table__cell--select">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3" selected>3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
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
                    {{-- <div class="u-flex sticky_4">
                      <p class="c-txt__md c-txt__gray-600">3.2</p>
                      <p class="c-txt__md c-txt__weight--600">4.6</p>
                    </div> --}}
                    <div class="p-table__cell">
                      <div class="u-flex">
                        <p class="c-txt__md c-txt__weight--600">4</p>
                      </div>
                      <div class="u-flex">
                        <select name="" class="p-table__cell--select">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3" selected>3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
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
                  <div class="p-table__cell--input">
                    {{-- <div class="u-flex sticky_4">
                      <p class="c-txt__md c-txt__gray-600">3.2</p>
                      <p class="c-txt__md c-txt__weight--600">4.6</p>
                    </div> --}}
                    <div class="p-table__cell">
                      <div class="u-flex">
                        <p class="c-txt__md c-txt__weight--600">4</p>
                      </div>
                      <div class="u-flex">
                        <select name="" class="p-table__cell--select">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3" selected>3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
                      <div class="u-flex"></div>
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
        <input type="submit" class="c-button c-button--primary" value="記入を完了する">
      </div>
    </form>
  </div>
</div>