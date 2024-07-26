<div 
  class="remodal p-modal p-modal--preview" 
  data-remodal-id="modal_preview" 
  data-remodal-options="hashTracking: false, closeOnOutsideClick: false"
>
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">組織図プレビュー</p>
  </div>
  <div class="p-modal__body c-scroll h-auto" id="scrollContainer">    
    <!-- 組織図 -->
    @include('master.organization._chart')
  </div>
</div>