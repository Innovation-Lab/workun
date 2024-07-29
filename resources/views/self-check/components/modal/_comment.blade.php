<div
  class="remodal p-modal p-modal--comment"
  data-remodal-id="modal_comment_{{ $self_check_rating_detail->id }}"
  data-remodal-options="hashTracking: false, closeOnOutsideClick: false"
>
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">コメント</p>
  </div>
  <div class="p-modal__body c-scroll">
    <p>{{ $self_check_rating_detail->comment }}</p>
  </div>
  <div class="p-modal__foot">
    <div class="p-user">
      <div class="p-user__image c-noImage">
        <img
          class="c-image c-image--round"
          src="{{ data_get($self_check_rating, 'reviewer.avatar_url') }}"
        />
      </div>
      <div class="p-user__text">
        <p>{{ data_get($self_check_rating, 'reviewer.full_name') }}</p>
        <p class="c-txt__gray-500 c-txt__xs">記入日：{{ $self_check_rating->display_reviewed }}</p>
      </div>
    </div>
  </div>
</div>
