<div class="remodal p-modal p-modal--delete" data-remodal-id="modal_delete" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">雇用形態「{{ $employment->name }}」の削除</p>
    <p class="description">雇用形態「{{ $employment->name }}」を削除します。よろしいですか。<br>従業員情報に紐付いたこの値は全て空欄になります。</p>
  </div>
  <div class="p-modal__body">
    <div class="p-formBlock__action">
      <form method="post">
        @csrf
        @method('delete')
        <input type="hidden" name="_method" value="delete" />
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
