<div class="p-tableBox">
  <div class="p-tableBox__head">
    <div class="mainText">
      <p class="status--4">結果確定</p>
      <p class="title">基幹職 仕事ぶりチェック</p>
    </div>
  </div>
  
  <div class="p-tableBox__body" style="padding:0">
    <form action="">
      {{-- テーブル一覧 --}}
      <div class="p-table__check c-scroll noneBtn">
        <div class="t-wrapper">
          <table class="t-table t-table__narrow">
            <thead>
              <tr>
                <th colspan="3" rowspan="2" class="sticky_1 c-border_r2">
                  <div class="p-table__check--head">セルフチェック項目</div>
                </th>
                <th colspan="24">
                  <div class="cell sticky_4 p-table__check--month c-border_0 u-tac">期間 : 2024.07 ~ 2025.06</div>
                  <div class="p-table__cell--input">
                    <div class="p-table__cell">
                      <?php for($p = 7; $p < 9; $p++){ ?>  
                      <div class="u-tac c-txt__xs cell u-w140">
                        <strong class="c-txt__lg c-txt__weight--700"><?= $p; ?></strong>月
                      </div>
                      <?php }?>
                      <?php for($p = 9; $p < 13; $p++){ ?>  
                      <div class="u-tac c-txt__xs cell u-w100">
                        <strong class="c-txt__lg c-txt__weight--700"><?= $p; ?></strong>月
                      </div>
                      <?php }?>
                      <?php for($p = 1; $p < 7; $p++){ ?>  
                      <div class="u-tac c-txt__xs cell u-w100">
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
                <th class="u-w300 sticky_3 c-border_r2">
                  <p class="c-txt__xs">
                    組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                  </p>
                </th>
                <td>
                  <div class="p-table__cell--input">
                    <div class="p-table__cell">
                      <div class="u-flex u-w140 cell cell--item">
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                        <div class="cell--number c-txt__md c-txt__weight--600">4</div>
                        <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

来月も頑張りましょう!</p>
                      </div>
                      <div class="u-flex u-w140 cell cell--item">
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                        <div class="cell--number c-txt__md c-txt__weight--600">4</div>
                        <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

来月も頑張りましょう!</p>
                      </div>
                      <?php for($p = 0; $p < 10; $p++){ ?>
                      <div class="u-flex cell cell--item u-w100"></div>
                      <?php }?>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th rowspan="" class="sticky_2">成長力</td>
                <th class="sticky_3 c-border_r2">
                  <p class="c-txt__xs">
                  業務を遂行する上で、今期の成長課題を克服したか？
                  </p>
                </th>
                <td>
                  <div class="p-table__cell--input">
                    <div class="p-table__cell">
                      <div class="u-flex cell u-w140 cell--item">
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                        <div class="cell--number c-txt__md c-txt__weight--600">4</div>
                        <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

来月も頑張りましょう!</p>
                      </div>
                      <div class="u-flex u-w140 cell cell--item">
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                        <div class="cell--number c-txt__md c-txt__weight--600">4</div>
                        <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

来月も頑張りましょう!</p>
                      </div>
                      <?php for($p = 0; $p < 10; $p++){ ?>
                      <div class="u-flex cell cell--item u-w100"></div>
                      <?php }?>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th rowspan="" class="sticky_2">成長（業務分担書）</th>
                <th class="sticky_3 c-border_r2">
                  <p class="c-txt__xs">
                  業務を遂行するか？
                  </p>
                </th>
                <td>
                  <div class="p-table__cell--input">
                    <div class="p-table__cell">
                      <div class="u-flex cell u-w140 cell--item">
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                        <div class="cell--number c-txt__md c-txt__weight--600">4</div>
                        <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

来月も頑張りましょう!</p>
                      </div>
                      <div class="u-flex u-w140 cell cell--item">
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                        <div class="cell--number c-txt__md c-txt__weight--600">4</div>
                        <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

来月も頑張りましょう!</p>
                      </div>
                      <?php for($p = 0; $p < 10; $p++){ ?>
                      <div class="u-flex cell cell--item u-w100"></div>
                      <?php }?>
                    </div>
                  </div>
                </td>
              </tr>

              <?php for($p = 0; $p < 6; $p++){ ?>
              <tr>
                <th rowspan="" class="u-w100 sticky_1">行動規範</th>
                <th class="u-w140 sticky_2">クラスコ10<?= $p; ?>%</th>
                <th class="u-w300 sticky_3 c-border_r2">
                  <p class="c-txt__xs">
                    組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                  </p>
                </th>
                <td>
                  <div class="p-table__cell--input">
                    <div class="p-table__cell">
                      <div class="u-flex cell u-w140 cell--item">
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                        <div class="cell--number c-txt__md c-txt__weight--600">4</div>
                        <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

来月も頑張りましょう!</p>
                      </div>
                      <div class="u-flex u-w140 cell cell--item">
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                        <div class="cell--number c-txt__md c-txt__weight--600">4</div>
                        <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

来月も頑張りましょう!</p>
                      </div>
                      <div class="u-flex cell cell--item u-w100"></div>
                      <div class="u-flex cell cell--item u-w100"></div>
                      <div class="u-flex cell cell--item u-w100"></div>
                      <div class="u-flex cell cell--item u-w100"></div>
                      <div class="u-flex cell cell--item u-w100"></div>
                      <div class="u-flex cell cell--item u-w100"></div>
                      <div class="u-flex cell cell--item u-w100"></div>
                      <div class="u-flex cell cell--item u-w100"></div>
                      <div class="u-flex cell cell--item u-w100"></div>
                      <div class="u-flex cell cell--item u-w100"></div>
                    </div>
                  </div>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>

        </div>
      </div>
      <div class="u-align--end u-pd12">
      </div>
    </form>
  </div>
</div>