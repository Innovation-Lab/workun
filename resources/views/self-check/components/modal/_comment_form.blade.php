<div class="remodal p-modal p-modal--comment form" data-remodal-id="modal_commentForm" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">コメント</p>
  </div>
  <form action="">
    <div class="p-modal__body">
      <div class="p-inputField">
        <label for="" class="label">内容</label>
        <textarea name="" id="" placeholder="コメントを記入してください。"></textarea>
      </div>
      <div class="u-pd20"></div>
      <div class="p-formBlock__action">
        <a href="{{ route('self-check.result') }}?flash=successEvaluate" class="c-button c-button--brandPrimary u-w150">記入内容を登録</a>
      </div>
    </div>
  </form>
</div>