<script>
  // チェックボックスの状態を監視してボタンを有効/無効にする関数
  function toggleButtonsBasedOnCheckbox() {
    const isCheckboxChecked = $('.layer1--item input[type="radio"]').is(':checked');
    if (isCheckboxChecked) {
      $('#add-align, #delete-item').addClass('disabled');
    } else {
      $('#add-align, #delete-item').removeClass('disabled');
    }
  }

  // 部署削除
  function deleteDepartment () {
    let $checkedItem = $('.p-inputField--organizationBox .layer--item input[type="radio"]:checked').closest('.layer--item')
    $checkedItem.children(".p-inputField").find(".delete").val(1)
    $checkedItem.hide()
    $('[data-name="departments[0]"]').prop('checked', true)
    toggleButtonsBasedOnCheckbox()
  }

  // プレビュー
  function preview () {
    let formData = $("#departments-form").serialize()
    $.ajax({
      type: 'POST',
      url: '{{ route('master.organization._preview') }}', // フォームデータを送信するURL
      data: formData,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // これが必要
      },
      success: function(response) {
        // 成功時の処理
        $("#preview").html(response)
      },
      error: function(xhr, status, error) {
        // エラー時の処理
        alert('エラーが発生しました。');
      }
    })
  }

  $(document).ready(function() {

    // 初期のボタン有効/無効設定
    toggleButtonsBasedOnCheckbox();

    // 直下に追加
    $('#add-below').on('click', function() {
      // チェックされているラジオボタンを含む .layer--item を取得
      let $checkedItem = $('.p-inputField--organizationBox .layer--item input[type="radio"]:checked').closest('.layer--item');

      let parent_name = $('.layer--item input[type="radio"]:checked').data('name')

      let item_index = $checkedItem.children('.layer--container').children('.layer--item').length

      // 新しい .layer--item を作成
      let newLayerItem = `
<div class="layer--item">
  <div class="p-inputField p-inputField--organization">
    <div class="item js-clearableRadio">
      <div class="item--checkbox">
        <label class="round">
          <input
            type="radio"
            name="organization"
            data-name="${parent_name}[departments][${item_index}]"
            data-parent="${parent_name}"
            onclick="toggleButtonsBasedOnCheckbox()"
          />
        </label>
      </div>
      <div class="item--input">
        <span class="label">順序</span>
        <input
          type="number"
          name="${parent_name}[departments][${item_index}][seq]"
          step="1" min="1" class="gray" placeholder="1"
        />
        <input
          type="text"
          name="${parent_name}[departments][${item_index}][name]"
          class="gray"
          placeholder="名称を記入"
        />
        <input
          type="hidden"
          name="${parent_name}[departments][${item_index}][delete]"
          class="delete"
          value=""
        />
      </div>
    </div>
  </div>
  <div class="layer--container"></div>
</div>
      `;

        // .layer--container 内に新しい .layer--item を追加
        $checkedItem.children('.p-inputField--organization').siblings('.layer--container').append(newLayerItem);
    });

    // 並列に追加
    $('#add-align').on('click', function() {
      // チェックされているラジオボタンを含む .layer--item を取得
      let $checkedItem = $('.p-inputField--organizationBox .layer--item input[type="radio"]:checked').closest('.layer--item');

      let parent_name = $('.layer--item input[type="radio"]:checked').data('parent')

      let item_index = $checkedItem.parent().children('.layer--item').length

      // 新しい .layer--item を作成
      var newLayerItem = `
<div class="layer--item">
  <div class="p-inputField p-inputField--organization">
    <div class="item">
      <div class="item--checkbox">
        <label class="round">
          <input
            type="radio"
            name="organization"
            data-name="${parent_name}[departments][${item_index}]"
            data-parent="${parent_name}"
            onclick="toggleButtonsBasedOnCheckbox()"
          />
        </label>
      </div>
      <div class="item--input">
        <span class="label">順序</span>
        <input
          type="number"
          name="${parent_name}[departments][${item_index}][seq]"
          step="1" min="1" class="gray" placeholder="1"
        />
        <input
          type="text"
          name="${parent_name}[departments][${item_index}][name]"
          class="gray"
          placeholder="名称を記入"
        />
        <input
          type="hidden"
          name="${parent_name}[departments][${item_index}][delete]"
          class="delete"
          value=""
        />
      </div>
    </div>
  </div>
  <div class="layer--container"></div>
</div>
      `;

      // チェックされているラジオボタンを含む .layer--item の兄弟要素として追加
      $checkedItem.after(newLayerItem);
    });

    // 削除
    $('#delete-item').on('click', function() {
      let $checkedItem = $('.p-inputField--organizationBox .layer--item input[type="radio"]:checked').closest('.layer--item')
      let name = $checkedItem.children(".p-inputField").find("[type=text]").val()
      let modal = $('[ data-remodal-id="modal_delete"]')
      modal.find('.title').text(`組織図の項目「${name}」の削除`)
      modal.find('.name').text(name)
    })

  });
</script>

<script>
  $(document).ready(function() {

    // 組織図　幅
    var totalWidth = 0;
    $('.p-organizationChart__underLayer .p-organizationChart__layer.layer2').each(function() {
      totalWidth += $(this).outerWidth();
    });
    var finalWidth = totalWidth + 80;
    $('.p-organizationChart').css('width', finalWidth);


    // スクロール位置　真ん中
    function centerScrollContainer() {
      var $container = $('#scrollContainer');
      var containerWidth = $container.width();
      var contentWidth = $container[0].scrollWidth;
      var scrollPosition = (contentWidth - containerWidth) / 2;
      $container.scrollLeft(scrollPosition);
    }
    centerScrollContainer();
    $(window).on('resize', function() {
      centerScrollContainer();
    });

    // 組織図に紐づいている従業員リストの表示
    $('.p-organizationChart__item .button').on('click', function() {
      var $button = $(this);
      var $userList = $button.closest('.p-organizationChart').siblings('.p-organizationChart__userList');
      var departmentId = $button.data('department-id');

      // ユーザーリストを取得
      $.ajax({
        url: '{{ route('master.organization._lodeMembers') }}',
        type:'GET',
        data: {
          'department_id': departmentId
        }
      })
      .done(function ($data) {
        $userList.html($data);
        $button.addClass('is-open');
        $userList.addClass('is-open');
      })
      .fail(function () {
        alert('従業員情報を取得できませんでした。')
      })
    });

    $(document).on('click', '.p-organizationChart__userList .item .close', function() {
      $('.p-organizationChart__item .button').removeClass('is-open');
      $('.p-organizationChart__userList').removeClass('is-open');
    });
    $('.p-organizationChart__item .button').hover(
      function() {
        $(this).closest('.button__area').addClass('hover');
      },
      function() {
        $(this).closest('.button__area').removeClass('hover');
      }
    );

    // モーダルが開いた後にスクロール位置を設定する
    $(document).on('opening.remodal', function(e) {
      if ($(e.target).is('[data-remodal-id="modal_preview"]')) {
        // モーダルが開いた後にスクロール位置を設定
        setTimeout(function() {
          var $container = $('#scrollContainer');
          var containerWidth = $container.width();
          var contentWidth = $container[0].scrollWidth;
          var scrollPosition = (contentWidth - containerWidth) / 2;
          $container.scrollLeft(scrollPosition);
        }, 0);
      }
    });

  });
</script>
