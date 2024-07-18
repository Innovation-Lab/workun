<div class="remodal p-modal p-modal__selfCheck" data-remodal-id="modal_approval" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">評価内容を最終承認 / 評価を確定</p>
    <p class="description">セルフチェックシートの記入内容を承認します。よろしいですか。<br />承認後は対象者が最終的な評価を閲覧することが可能になります。</p>
  </div>
  <div class="p-modal__body">
    <form action="">
      <div class="p-formBlock__action">
        <button data-remodal-action="close" class="c-button c-button--cancel u-w120">キャンセル</button>
        <!-- <button class="c-button c-button--brandPrimary u-w130">承認する</button> -->
        <a href="{{ route('self-check.result') }}" class="c-button c-button--brandPrimary u-w130">承認する</a>
      </div>
    </form>
  </div>
</div>