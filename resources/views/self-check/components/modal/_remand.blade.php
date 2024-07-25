<div class="remodal p-modal p-modal--delete" data-remodal-id="modal_remand" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <?php
      $url = $_SERVER['REQUEST_URI'];
    ?>
    @if(strstr($url,'confirm'))
      <p class="title">入力内容を差戻し</p>
    @elseif(strstr($url,'approval'))
      <p class="title">評価内容を差戻し</p>
    @else
    @endif
    <p class="description">セルフチェックシートを差戻します。よろしいですか。<br>差戻し後、評価者に再度評価のタスクが設定されます。</p>
  </div>
  <div class="p-modal__body">
    <form action="">
      <div class="p-inputField">
        <label for="" class="label">差戻し理由</label>
        <textarea name="" id="" placeholder="記入された数値が適当ではないため、記入のやり直しをお願いします。"></textarea>
      </div>
      <div class="u-pd16"></div>
      <div class="p-formBlock__action">
        <button data-remodal-action="close" class="c-button c-button--cancel u-w120">キャンセル</button>
        <!-- <button class="c-button c-button--brandPrimary u-w130">承認する</button> -->
        <a href="{{ route('self-check.result') }}?flash=successEvaluate" class="c-button c-button--delete u-w130">差戻す</a>
      </div>
    </form>
  </div>
</div>