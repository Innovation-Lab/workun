<div class="remodal p-modal p-modal__selfCheck" data-remodal-id="modal_request" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">承認内容を確定 / 最終承認を依頼</p>
    <p class="description">セルフチェックシートの承認を完了します。よろしいですか。<br />完了後は承認者がシートを承認するフローへ進みます。</p>
  </div>
  <div class="p-modal__body">
    <form action="">
      {{-- ↓↓↓↓初期状態↓↓↓↓ --}}
      <div class="between p-check">
      {{-- ↑↑↑↑↑初期状態↑↑↑↑↑ --}}

      {{-- ↓↓↓↓評価者の選択がない場合は「p-check--noSelect」クラスを追加↓↓↓↓ --}}
      <!-- <div class="between p-check p-check--noSelect"> -->
      {{-- ↑↑↑↑評価者の選択がない場合は「p-check--noSelect」クラスを追加↑↑↑↑ --}}


        <div class="p-check__account u-align u-gap8">
          <div class="p-user__image" style="background-image:url(../../img/common/noImage/noimage.webp)"></div>
          <div class="p-user__text">
            <p>酒井 雄輝</p>
          </div>
        </div>
        <div class="u-align p-check__arrow">
          <img src="/img/common/icon/chevron_three.svg" height="20" width="20" alt="矢印アイコン">
        </div>
        <div class="p-check__select--wrap">

          {{-- ↓↓↓↓初期状態↓↓↓↓ --}}
          <div class="p-check__select u-align">
          {{-- ↑↑↑↑↑初期状態↑↑↑↑↑ --}}
          
          {{-- ↓↓↓↓ユーザーが選択された状態の時に「p-check__select--user」クラスを追加↓↓↓↓ --}}
          <!-- <div class="p-check__select u-align p-check__select--user"> -->
          {{-- ↑↑↑↑↑ユーザーが選択された状態の時に「p-check__select--user」クラスを追加↑↑↑↑↑ --}}


            {{-- ↓↓↓↓初期状態↓↓↓↓ --}}
            <span class="p-check__select--text">承認者を選択</span>
            <div class="p-check__select--list">
              <ul>
                <li>
                  <label class="p-check__checkbox p-check__account">
                    <input type="checkbox" name="">
                    <div class="p-user__image c-noImage">
                      <img src="" alt="" class="c-image c-image--round">
                    </div>
                    <div class="p-user__text">
                      <p>酒井 雄輝</p>
                    </div>
                  </label>
                </li>
                <?php for($p = 1; $p < 4; $p++){ ?>
                <li>
                  <label class="p-check__checkbox p-check__account">
                    <input type="checkbox" name="">
                    <div class="p-user__image c-noImage">
                      <img src="" alt="" class="c-image c-image--round">
                    </div>
                    <div class="p-user__text">
                      <p>酒井 雄輝</p>
                    </div>
                  </label>
                </li>
                <?php }?>
              </ul>
            </div>
            {{-- ↑↑↑↑↑初期状態↑↑↑↑↑ --}}

            {{-- ↓↓↓↓ユーザーが選択された状態の時に表示↓↓↓↓ --}}
            <!-- <div class="u-align u-gap8 p-user">
              <div class="p-user__image" style="background-image:url(../../img/common/noImage/noimage.webp)"></div>
              <div class="p-user__text">
                <span class="label">評価者</span>
                <p>酒井 雄輝</p>
              </div>
            </div> -->
            {{-- ↑↑↑↑↑ユーザーが選択された状態の時に表示↑↑↑↑↑ --}}

          </div>
        </div>
      </div>
      <div class="p-formBlock__action">
        <button data-remodal-action="close" class="c-button c-button--cancel u-w120">キャンセル</button>
        <!-- <button class="c-button c-button--brandPrimary u-w130">登録する</button> -->
        <a href="{{ route('self-check.approval') }}?flash=successApproval" class="c-button c-button--brandPrimary u-w130">登録する</a>
      </div>
    </form>
  </div>
</div>