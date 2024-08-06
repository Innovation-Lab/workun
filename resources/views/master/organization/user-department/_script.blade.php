<script>
  $(document).ready(function() {
    $('#all_users').click(function() {
      $('input.check').prop('checked', this.checked);
      toggleButtons();
    });

    $('input.check').change(function() {
      toggleButtons();
    });

    function toggleButtons() {
      const hasChecked = $('input.check:checked').length > 0;
      $('button[name="register_selected"]').toggle(hasChecked);
      $('button[name="register_all"]').toggle(!hasChecked);
      $('button[name="delete_selected"]').toggle(hasChecked);
      $('button[name="delete_all"]').toggle(!hasChecked);
    }

    // 初期状態のボタン表示を設定
    toggleButtons();
  });

  function handleButtonClick(confirmMessage, button, actionType) {
    if (confirm(confirmMessage)) {
      $(button).prop('disabled', true); // ボタンを無効化
      $('<input>').attr({
        type: 'hidden',
        name: 'actionType',
        value: actionType
      }).appendTo('form');
      $('form').submit();
    } else {
      return false;
    }
  }

  $("button[name='register_all']").click(function(event) {
    event.preventDefault();
    return handleButtonClick('全ての従業員を登録しますか？',this, 'register');
  });
  $("button[name='delete_all']").click(function(event) {
    event.preventDefault();
    return handleButtonClick('全ての従業員を削除しますか？', this, 'delete');
  });
</script>
