<div
  class="remodal p-modal p-modal--delete"
  data-remodal-id="modal_delete"
  data-remodal-options="hashTracking: false, closeOnOutsideClick: false"
>
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">組織図の項目「賃貸営業部」の削除</p>
    <p class="description">
      組織図の項目「<span class="name">賃貸営業部</span>」を削除します。よろしいですか。<br>
      削除した後の復元は出来なのでご注意ください。<br><br>
      ※この項目に紐づいた下層の項目も合わせて削除されます。
    </p>
  </div>
  <div class="p-modal__body">
    <div class="p-formBlock__action">
      <button data-remodal-action="close" class="c-button c-button--cancel u-w130">キャンセル</button>
      <button
        class="c-button c-button--delete u-w130"
        data-remodal-action="close"
        onclick="deleteDepartment()"
      >
        削除する
      </button>
    </div>
  </div>
</div>
