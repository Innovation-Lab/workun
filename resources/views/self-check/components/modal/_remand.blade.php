<div
  class="remodal p-modal p-modal--delete"
  data-remodal-id="modal_remand"
  data-remodal-options="hashTracking: false, closeOnOutsideClick: false, appendTo: #rating_form"
>
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">入力内容を差戻し</p>
{{--      <p class="title">評価内容を差戻し</p>--}}
    <p class="description">セルフチェックシートを差戻します。よろしいですか。</p>
  </div>
  <div class="p-modal__body">
    <div class="p-inputField space">
      <label for="" class="label">差戻し理由</label>
      <textarea
        id="remand_reason"
        name="remand_reason"
        placeholder="記入された数値が適当ではないため、記入のやり直しをお願いします。"
      >{{ $selfCheckRating->remand_reason }}</textarea>
    </div>
    <div class="u-pd16"></div>
    <div class="p-formBlock__action">
      <button data-remodal-action="close" class="c-button c-button--cancel u-w120">キャンセル</button>
      <button
        type="button"
        class="c-button c-button--delete u-w130"
        onclick="saveRemand(self)"
      >
        差戻す
      </button>
    </div>
  </div>
</div>
