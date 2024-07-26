<div class="p-tableBox">
  <div class="p-tableBox__head">
    <div class="mainText">
      <p class="title">2024年 9月 評価入力  :  基幹職 仕事ぶりチェック</p>
      <div class="count border">
        <span class="unit">対象者</span>
        <p class="number">5</p>
        <span class="unit">名</span>
      </div>
    </div>    
  </div>
  
  <div class="p-tableBox__body" style="padding:0">
    <form action="">
      {{-- テーブル一覧 --}}
      @php
        use Illuminate\Support\Str;
        $comment = '一定期間休職があったため次回正式に再評価を行います。
来月のチェック記入時には、その点も含めてセルフチェックを行ってください。

来月も頑張りましょう!';
        $limitedComment = Str::limit($comment, 100);
      @endphp
      <div class="p-table__check c-scroll">
        <div class="t-wrapper">
          <table class="t-table t-table__narrow">
            <thead>
              <tr>
                <th colspan="3" rowspan="" class="sticky_1 c-border_r2 p-table__check--head">
                  <div class="u-pd16">セルフチェック項目</div>
                </th>
                <th colspan="">{{-- 人物数の2倍の数colspan --}}
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
                    <div class="cell u-w140 u-tac c-txt__xs">
                      <a data-remodal-target="modal_selfCheck" class="name">山口 太郎</a>
                    </div>
                    {{-- 上と同じ開発時に削除 --}}
                    <div class="cell u-w140 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">佐藤 英恵</a></div>
                    <div class="cell u-w140 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">勅使河原 倫太郎</a></div>
                    <div class="cell u-w140 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">和久 明</a></div>
                    <div class="cell u-w140 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">林 健</a></div>
                    <div class="cell u-w140 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">田井中川 一郎</a></div>
                    <div class="cell u-w140 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">綾小路 康太</a></div>
                    <div class="cell u-w140 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">斎藤 加奈子</a></div>
                    <div class="cell u-w140 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">長良川 花梨</a></div>
                    <div class="cell u-w140 u-tac c-txt__xs"><a data-remodal-target="modal_selfCheck" class="name">金子 真由</a></div>
                  </div>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th rowspan="3" class="sticky_1">
                  <div><p>業務遂行力</p></div></th>
                <th class="sticky_2"><div><p>マネジメント力</p></div></th>
                <th class="sticky_3 c-border_r2">
                  <p class="c-txt__xs">
                    組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で実行、成果を達成することをマネジメントできていたか？
                  </p>
                </th>
                <td>
                  <div class="p-table__cell--input">
                    <div class="u-flex u-w140 cell cell--item">
                      <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                      <div class="cell--number c-txt__md c-txt__weight--600">
                        <select name="" class="p-table__cell--select">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3" selected>3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <p class="comment" data-remodal-target="modal_comment">{{ $limitedComment }}</p>
                    </div>
                    <div class="u-flex u-w140 cell cell--item">
                      <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                      <div class="cell--number c-txt__md c-txt__weight--600">
                        <select name="" class="p-table__cell--select">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3" selected>3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <p class="comment c-noData" data-remodal-target="modal_comment">-</p>
                    </div>
                    <?php for($p = 0; $p < 8; $p++){ ?>
                    <div class="p-table__cell">
                      <div class="u-flex u-w140 cell cell--item">
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                        <div class="cell--number c-txt__md c-txt__weight--600">
                          <select name="" class="p-table__cell--select">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3" selected>3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                          </select>
                        </div>
                        <p class="comment" data-remodal-target="modal_comment">{{ $limitedComment }}</p>
                    </div>
                    <?php }?>
                  </div>
                </td>
              </tr>
              <tr>
                <th rowspan="" class="sticky_2"><div><p>成長力</p></div></td>
                <th class="sticky_3 c-border_r2">
                  <p class="c-txt__xs">
                  業務を遂行する上で、今期の成長課題を克服したか？
                  </p>
                </th>
                <td>
                  <div class="p-table__cell--input">
                    <div class="u-flex u-w140 cell cell--item">
                      <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                      <div class="cell--number c-txt__md c-txt__weight--600">
                        <select name="" class="p-table__cell--select">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3" selected>3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <p class="comment" data-remodal-target="modal_comment">{{ $limitedComment }}</p>
                    </div>
                    <div class="u-flex u-w140 cell cell--item">
                      <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                      <div class="cell--number c-txt__md c-txt__weight--600">
                        <select name="" class="p-table__cell--select">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3" selected>3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <p class="comment c-noData" data-remodal-target="modal_comment">-</p>
                    </div>
                    <?php for($p = 0; $p < 8; $p++){ ?>
                    <div class="p-table__cell">
                      <div class="u-flex u-w140 cell cell--item">
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                        <div class="cell--number c-txt__md c-txt__weight--600">
                          <select name="" class="p-table__cell--select">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3" selected>3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                          </select>
                        </div>
                        <p class="comment" data-remodal-target="modal_comment">{{ $limitedComment }}</p>
                    </div>
                    <?php }?>
                  </div>
                </td>
              </tr>
              <tr>
                <th rowspan="" class="sticky_2"><div><p>成長（業務分担書）</p></div></th>
                <th class="sticky_3 c-border_r2">
                  <p class="c-txt__xs">
                  業務を遂行するか？
                  </p>
                </th>
                <td>
                  <div class="p-table__cell--input">
                    <div class="u-flex u-w140 cell cell--item">
                      <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                      <div class="cell--number c-txt__md c-txt__weight--600">
                        <select name="" class="p-table__cell--select">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3" selected>3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <p class="comment" data-remodal-target="modal_comment">{{ $limitedComment }}</p>
                    </div>
                    <div class="u-flex u-w140 cell cell--item">
                      <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                      <div class="cell--number c-txt__md c-txt__weight--600">
                        <select name="" class="p-table__cell--select">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3" selected>3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <p class="comment c-noData" data-remodal-target="modal_comment">-</p>
                    </div>
                    <?php for($p = 0; $p < 8; $p++){ ?>
                    <div class="p-table__cell">
                      <div class="u-flex u-w140 cell cell--item">
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                        <div class="cell--number c-txt__md c-txt__weight--600">
                          <select name="" class="p-table__cell--select">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3" selected>3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                          </select>
                        </div>
                        <p class="comment" data-remodal-target="modal_comment">{{ $limitedComment }}</p>
                    </div>
                    <?php }?>
                  </div>
                </td>
              </tr>

              <?php for($p = 0; $p < 6; $p++){ ?>
              <tr>
                <th rowspan="" class="sticky_1"><div><p>行動規範</p></div></th>
                <th class="sticky_2"><div><p>クラスコ10<?= $p; ?>%</p></div></th>
                <th class="sticky_3 c-border_r2">
                  <p class="c-txt__xs">
                    組織ビジョン、GOFAN、目標をチームに浸透させ、チーム全員で実行、成果を達成することをマネジメントできていたか？
                  </p>
                </th>
                <td>
                  <div class="p-table__cell--input">
                    <div class="u-flex u-w140 cell cell--item">
                      <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                      <div class="cell--number c-txt__md c-txt__weight--600">
                        <select name="" class="p-table__cell--select">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3" selected>3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <p class="comment" data-remodal-target="modal_comment">{{ $limitedComment }}</p>
                    </div>
                    <div class="u-flex u-w140 cell cell--item">
                      <div class="cell--number targeter c-txt__md c-txt__weight--600">4</div>
                      <div class="cell--number c-txt__md c-txt__weight--600">
                        <select name="" class="p-table__cell--select">
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3" selected>3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <p class="comment c-noData" data-remodal-target="modal_comment">-</p>
                    </div>
                    <div class="u-flex u-w140 cell cell--item"><div class="cell--number targeter c-txt__md c-txt__weight--600">4</div><div class="cell--number c-txt__md c-txt__weight--600"><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select></div><p class="comment c-noData" data-remodal-target="modal_comment">-</p></div>
                    <div class="u-flex u-w140 cell cell--item"><div class="cell--number targeter c-txt__md c-txt__weight--600">4</div><div class="cell--number c-txt__md c-txt__weight--600"><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select></div><p class="comment c-noData" data-remodal-target="modal_comment">-</p></div>
                    <div class="u-flex u-w140 cell cell--item"><div class="cell--number targeter c-txt__md c-txt__weight--600">4</div><div class="cell--number c-txt__md c-txt__weight--600"><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select></div><p class="comment c-noData" data-remodal-target="modal_comment">-</p></div>
                    <div class="u-flex u-w140 cell cell--item"><div class="cell--number targeter c-txt__md c-txt__weight--600">4</div><div class="cell--number c-txt__md c-txt__weight--600"><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select></div><p class="comment c-noData" data-remodal-target="modal_comment">-</p></div>
                    <div class="u-flex u-w140 cell cell--item"><div class="cell--number targeter c-txt__md c-txt__weight--600">4</div><div class="cell--number c-txt__md c-txt__weight--600"><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select></div><p class="comment c-noData" data-remodal-target="modal_comment">-</p></div>
                    <div class="u-flex u-w140 cell cell--item"><div class="cell--number targeter c-txt__md c-txt__weight--600">4</div><div class="cell--number c-txt__md c-txt__weight--600"><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select></div><p class="comment c-noData" data-remodal-target="modal_comment">-</p></div>
                    <div class="u-flex u-w140 cell cell--item"><div class="cell--number targeter c-txt__md c-txt__weight--600">4</div><div class="cell--number c-txt__md c-txt__weight--600"><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select></div><p class="comment c-noData" data-remodal-target="modal_comment">-</p></div>
                    <div class="u-flex u-w140 cell cell--item"><div class="cell--number targeter c-txt__md c-txt__weight--600">4</div><div class="cell--number c-txt__md c-txt__weight--600"><select name="" class="p-table__cell--select"><option value="5">5</option><option value="4">4</option><option value="3" selected>3</option><option value="2">2</option><option value="1">1</option></select></div><p class="comment c-noData" data-remodal-target="modal_comment">-</p></div>
                  </div>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>

        </div>
      </div>
      <div class="u-align--end u-pd24">
        <input type="submit" class="c-button--text" value="下書き保存する">
        <a data-remodal-target="modal_remand" class="c-button c-button--delete" >差戻し</a>
        <a data-remodal-target="modal_approval" class="c-button c-button--primary u-w160">この結果を承認する</a>
      </div>
    </form>
  </div>
</div>