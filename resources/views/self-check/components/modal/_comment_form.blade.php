<div
  class="remodal p-modal p-modal--comment form"
  data-remodal-id="modal_commentForm_{{ $self_check_sheet_item->id }}"
  data-remodal-options="hashTracking: false, closeOnOutsideClick: false, appendTo: #rating_form"
>
  <div class="p-modal__head">
    <p class="title">コメント</p>
  </div>
    <div class="p-modal__body">
      <div class="p-inputField">
        <label for="" class="label">内容</label>
        <textarea
          id="self_check_sheet_item_comment_{{ $self_check_sheet_item->id }}"
          placeholder="コメントを記入してください。"
        >{{ data_get($self_check_rating_detail, 'comment') }}</textarea>
      </div>
      <div class="u-pd20"></div>
      <div class="p-formBlock__action">
        <a
          data-remodal-action="close"
          data-id="{{ $self_check_sheet_item->id }}"
          class="c-button c-button--brandPrimary u-w150"
          onclick="setComment(this)"
        >
          記入内容を登録
        </a>
      </div>
    </div>
  </form>
</div>
