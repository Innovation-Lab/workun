<div
  class="remodal p-modal p-modal--delete"
  data-remodal-id="modal_alert_sheet"
  data-remodal-options="hashTracking: false, closeOnOutsideClick: false, closeOnEscape: false"
>
  <button
    onclick="cancelHierarchy()"
    data-remodal-action="close"
    class="remodal-close p-modal__close"
  >
    閉じる
  </button>
  <div class="p-modal__head">
    <p class="title">シート階層変更の確認</p>
    <p class="description">
      階層を変更すると入力内容がリセットされます。<br>
      階層を変更してよろしいですか？
    </p>
  </div>
  <div class="p-modal__body">
    <div class="p-formBlock__action">
      <button
        onclick="cancelHierarchy()"
        data-remodal-action="close" class="c-button c-button--cancel u-w130"
      >
        キャンセル
      </button>
      <button
        onclick="changeHierarchy()"
        class="c-button c-button--delete u-w130"
      >
        変更する
      </button>
    </div>
  </div>
</div>
