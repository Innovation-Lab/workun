<div class="remodal p-modal" data-remodal-id="modal_selfCheck" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
  <div class="p-modal__action">
    <div class="p-user">
      <div class="p-user__image c-noImage">
        <img class="c-image c-image--round" src="">
      </div>
      <div class="p-user__text">
        <p>酒井 雄輝</p>
        <p class="c-txt__gray-500 c-txt__xs">評価確定日：{{ date('Y/m/d') }}</p>
      </div>
    </div>
    <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  </div>
  <div class="p-modal__body">
    @include('self-check.components._resultall')
  </div>
</div>