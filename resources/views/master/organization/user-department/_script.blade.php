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

  function handleButtonClick(confirmMessage, actionType) {

    if (confirm(confirmMessage)) {
      let requestData = {};
      const urlParams = new URLSearchParams(window.location.search);
      urlParams.forEach((value, key) => {
        requestData[key] = value;
      });
      requestData['actionType'] = actionType;

      $.ajax({
        url: '{{ route("master.organization.user_department._getAllUserIds", $department) }}',
        type: 'GET',
        data: requestData,
        success: function(data) {
          data.forEach(function(userId) {
            $('<input>').attr({
              type: 'hidden',
              name: 'user_id[]',
              value: userId
            }).appendTo('form');
          });
          $('form').submit();
        },
        error: function() {
          alert('エラーが発生しました。');
        }
      });
    } else {
      return false;
    }
  }

  $("button[name='register_all']").click(function() {
    return handleButtonClick('全ての従業員を登録しますか？', 'register');
  });
  $("button[name='delete_all']").click(function() {
    return handleButtonClick('全ての従業員を削除しますか？', 'delete');
  });
</script>
