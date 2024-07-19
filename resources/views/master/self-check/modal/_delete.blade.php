<div
  class="remodal p-modal p-modal--delete"
  data-remodal-id="modal_delete_{{ $selfCheckSheet->id }}"
  data-remodal-options="hashTracking: false, closeOnOutsideClick: false"
>
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">セルフチェックシート「{{ $selfCheckSheet->title }}」の削除</p>
    <p class="description">セルフチェックシート「{{ $selfCheckSheet->title }}」を削除します。よろしいですか。<br>登録された被評価者のタスクからも削除されます。</p>
  </div>
  <div class="p-modal__body">
    <div class="p-formBlock__action">
      <form action="{{ route('master.self-check.edit', $selfCheckSheet) }}" method="post">
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
