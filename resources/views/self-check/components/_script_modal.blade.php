<script>
  // 個別シートのモーダル表示
  $(document).ready(function() {
    var commentModal = $("[data-remodal-id=modal_comment]").remodal();
    var selfCheckModal = $("[data-remodal-id=modal_selfCheck]").remodal();
    var isPModalTriggered = false;

    // p-modal内のコメントモーダルを開くトリガー
    $('.p-modal .comment').on('click', function() {
      isPModalTriggered = true; // フラグを立てる
      commentModal.open();
    });

    // コメントモーダルが閉じられた場合の処理
    $(document).on('closed', '[data-remodal-id=modal_comment]', function() {
      if (isPModalTriggered) {
        selfCheckModal.open();
        isPModalTriggered = false; // フラグをリセット
      }
    });
  });
</script>