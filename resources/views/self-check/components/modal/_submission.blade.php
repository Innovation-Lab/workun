<div class="remodal p-modal p-modal__selfCheck" data-remodal-id="modal_submission" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">評価記入内容を登録</p>
    <p class="description">セルフチェックシートの記入を登録します。よろしいですか。<br />登録後は評価者がシートを確認するフローへ進みます。</p>
  </div>
  <div class="p-modal__body">
    <form action="">
      <div class="u-align between p-check">
        <div class="p-check__account u-align u-gap16">
          <div class="p-user__image c-noImage">
            <img class="c-image c-image--round" src="">
          </div>
          <div class="p-user__text">
            <p>酒井 雄輝</p>
          </div>
        </div>
        <div>
          <img src="/img/common/icon/chevron_three.svg" height="20" width="20" alt="矢印アイコン">
        </div>
        <div class="p-check__account u-align u-gap8">
          <div class="p-user__image c-noImage">
            <img class="c-image c-image--round" src="">
          </div>
          <div class="p-user__text">
            <p class="c-txt__min c-txt__gray-500">評価者</p>
            <p>酒井 雄輝</p>
          </div>
        </div>
      </div>
      <div class="p-formBlock__action">
        <button data-remodal-action="close" class="c-button c-button--cancel u-w120">キャンセル</button>
        <!-- <button class="c-button c-button--brandPrimary u-w130">登録する</button> -->
        <a href="{{ route('self-check.confirm') }}" class="c-button c-button--brandPrimary u-w130">登録する</a>
      </div>
    </form>
  </div>
</div>