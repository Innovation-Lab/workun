<div class="remodal p-modal p-modal--delete" data-remodal-id="modal_delete" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">評価期間「{{ $period->name }}」の削除</p>
    <p class="description">評価期間「{{ $period->name }}」を削除します。よろしいですか。</p>
  </div>
  <div class="p-modal__body">
    <div class="p-formBlock__action">
      <form method="post">
        @csrf
        @method('delete')
        <button data-remodal-action="close" class="c-button c-button--cancel u-w130">キャンセル</button>
        <button
          type="submit"
          class="c-button c-button--delelte u-w130"
        >
          削除する
        </button>
      </form>
    </div>
  </div>
</div>
