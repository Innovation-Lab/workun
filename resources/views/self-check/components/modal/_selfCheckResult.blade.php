<div class="remodal p-modal" data-remodal-id="modal_selfCheck" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
  <div class="p-modal__action">
    <div class="p-user">
      <div class="p-user__image c-noImage">
        <img class="c-image c-image--round" src="">
      </div>
      <div class="p-user__text">
        <p>酒井 雄輝</p>
        <p class="c-txt__gray-500 c-txt__xs">評価確定日：{{ date('Y/m/d') }}</p>
      </div>
    </div>
    <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  </div>
  <div class="p-modal__body">
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
          <div class="p-table__check c-scroll">
            <div class="t-wrapper">
              <table class="t-table t-table__narrow t-table__confirm t-table__resultall">
                <thead>
                  <tr>
                    <th colspan="3" rowspan="2" class="sticky_1">
                      <div class="p-table__check--head">セルフチェック項目</div>
                    </th>
                    <th colspan="25">
                      <div class="cell sticky_4 p-table__check--month c-border_0 u-tac">期間 : 2024.07 ~ 2025.06</div>
                      <div class="p-table__cell--input">
                        <div class="p-table__cell">
                          <div class="u-tac u-w100 c-txt__sm cell sticky_4 c-border_r2" style="line-height: 2.2; border-right: 0;">平均</div>
                          <div class="u-tac c-txt__xs cell u-w140">
                            <strong class="c-txt__lg c-txt__weight--700">7</strong>月
                          </div>
                          <?php for($p = 8; $p < 13; $p++){ ?>  
                          <div class="u-tac c-txt__xs cell u-w140">
                            <strong class="c-txt__lg c-txt__weight--700"><?= $p; ?></strong>月
                          </div>
                          <?php }?>
                          <?php for($p = 1; $p < 7; $p++){ ?>  
                          <div class="u-tac c-txt__xs cell u-w140">
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
                    <th rowspan="4" class="u-w100 sticky_1">業務遂行力</th>
                    <th class="u-w140 sticky_2">マネジメント力</th>
                    <th class="u-w300 sticky_3">
                      <p class="c-txt__xs">
                        組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                      </p>
                    </th>
                    <td>
                      <div class="p-table__cell--input">
                        <div class="u-w100 sticky_4 c-border_r2 u-flex cell cell--item">
                          <p class="cell--number targeter c-txt__md c-txt__weight--600">3.2</p>
                          <p class="cell--number c-txt__md c-txt__weight--600">4.6</p>
                        </div>
                          <?php for($p = 0; $p < 12; $p++){ ?>
                          <div class="u-flex cell cell--item u-w140">
                            <div class="cell--number c-txt__md c-txt__weight--600 full">3</div>
                            <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
      来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

      来月も頑張りましょう!</p>
                          </div>
                          <?php }?>
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
                        <div class="u-w100 sticky_4 c-border_r2 u-flex cell cell--item">
                          <p class="cell--number targeter c-txt__md c-txt__weight--600">3.2</p>
                          <p class="cell--number c-txt__md c-txt__weight--600">4.6</p>
                        </div>
                          <?php for($p = 0; $p < 12; $p++){ ?>
                          <div class="u-flex cell cell--item u-w140">
                            <div class="cell--number c-txt__md c-txt__weight--600 full">3</div>
                            <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
      来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

      来月も頑張りましょう!</p>
                          </div>
                          <?php }?>
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
                        <div class="u-w100 sticky_4 c-border_r2 u-flex cell cell--item">
                          <p class="cell--number targeter c-txt__md c-txt__weight--600">3.2</p>
                          <p class="cell--number c-txt__md c-txt__weight--600">4.6</p>
                        </div>
                          <?php for($p = 0; $p < 12; $p++){ ?>
                          <div class="u-flex cell cell--item u-w140">
                            <div class="cell--number c-txt__md c-txt__weight--600 full">3</div>
                            <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
      来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

      来月も頑張りましょう!</p>
                          </div>
                          <?php }?>
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
                        <div class="u-w100 sticky_4 c-border_r2 u-flex cell cell--item">
                          <p class="cell--number targeter c-txt__md c-txt__weight--600">3.2</p>
                          <p class="cell--number c-txt__md c-txt__weight--600">4.6</p>
                        </div>
                          <?php for($p = 0; $p < 12; $p++){ ?>
                            <div class="u-flex cell cell--item u-w140">
                            <div class="cell--number c-txt__md c-txt__weight--600 full">3</div>
                            <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
      来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

      来月も頑張りましょう!</p>
                          </div>
                          <?php }?>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th rowspan="2" class="u-w100 sticky_1">行動規範</th>
                    <th class="u-w140 sticky_2">クラスコ100%</th>
                    <th class="u-w300 sticky_3">
                      <p class="c-txt__xs">
                        組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で 実行、成果を達成することをマネジメントできていたか？
                      </p>
                    </th>
                    <td>
                      <div class="p-table__cell--input">
                        <div class="u-w100 sticky_4 c-border_r2 u-flex cell cell--item">
                          <p class="cell--number targeter c-txt__md c-txt__weight--600">3.2</p>
                          <p class="cell--number c-txt__md c-txt__weight--600">4.6</p>
                        </div>
                          <?php for($p = 0; $p < 12; $p++){ ?>
                          <div class="u-flex cell cell--item u-w140">
                            <div class="cell--number c-txt__md c-txt__weight--600 full">3</div>
                            <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
      来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

      来月も頑張りましょう!</p>
                          </div>
                          <?php }?>
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
                        <div class="u-w100 sticky_4 c-border_r2 u-flex cell cell--item">
                          <p class="cell--number targeter c-txt__md c-txt__weight--600">3.2</p>
                          <p class="cell--number c-txt__md c-txt__weight--600">4.6</p>
                        </div>
                        <?php for($p = 0; $p < 12; $p++){ ?>
                        <div class="u-flex cell cell--item u-w140">
                          <div class="cell--number c-txt__md c-txt__weight--600 full">3</div>
                          <p class="comment" data-remodal-target="modal_comment">一定期間休職があったため次回正式に再評価を行います。
    来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

    来月も頑張りましょう!</p>
                        </div>
                        <?php }?>
                      </div>
                    </td>
                  </tr>

                </tbody>
              </table>

            </div>
          </div>
          <div class="u-align--end u-pd12">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>