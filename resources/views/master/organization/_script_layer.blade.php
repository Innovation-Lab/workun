<script>
  $(document).ready(function() {

    // チェックボックスの状態を監視してボタンを有効/無効にする関数
    function toggleButtonsBasedOnCheckbox() {
      const isCheckboxChecked = $('.layer1--item input[type="checkbox"]').is(':checked');
      if (isCheckboxChecked) {
        $('#add-align, #delete-item').addClass('disabled');
      } else {
        $('#add-align, #delete-item').removeClass('disabled');
      }
    }

    // チェックボックスの状態変更イベントを監視
    $('.layer1--item input[type="checkbox"]').on('change', function() {
      toggleButtonsBasedOnCheckbox();
    });

    // 初期のボタン有効/無効設定
    toggleButtonsBasedOnCheckbox();

    // 直下に追加
    $('#add-below').on('click', function() {
      // チェックされているラジオボタンを含む .layer--item を取得
      var $checkedItem = $('.p-inputField--organizationBox .layer--item input[type="checkbox"]:checked').closest('.layer--item');
      
      // ラジオボタンが選択されている場合のみ処理
      if ($checkedItem.length) {
        // 現在のラジオボタンの最大番号を取得
        var maxId = 0;
        $('.p-inputField--organizationBox input[type="checkbox"]').each(function() {
          var id = $(this).attr('id');
          if (id) {
            var number = parseInt(id.replace('organization', ''), 10);
            if (number > maxId) {
              maxId = number;
            }
          }
        });

        // 新しいラジオボタンの番号を設定
        var newRadioId = 'organization' + (maxId + 1);

        // 新しい .layer--item を作成
        var newLayerItem = `
          <div class="layer--item">
            <div class="p-inputField p-inputField--organization">
              <div class="item js-clearableRadio">
                <div class="item--checkbox">
                  <label for="${newRadioId}" class="round">
                    <input type="checkbox" id="${newRadioId}" name="organization" value="">
                  </label>
                </div>            
                <div class="item--input">
                  <span class="label">順序</span>
                  <input type="number" value="" class="gray" placeholder="1"> 
                  <input type="text" value="" class="gray" placeholder="名称を記入"> 
                </div>
              </div>
            </div>
            <div class="layer--container"></div>
          </div>
        `;

        // .layer--container 内に新しい .layer--item を追加
        $checkedItem.find('.p-inputField--organization').siblings('.layer--container').append(newLayerItem);
      }
    });

    // 並列に追加
    $('#add-align').on('click', function() {
      // チェックされているラジオボタンを含む .layer--item を取得
      var $checkedItem = $('.p-inputField--organizationBox .layer--item input[type="checkbox"]:checked').closest('.layer--item');
      
      // ラジオボタンが選択されている場合のみ処理
      if ($checkedItem.length) {
        // 現在のラジオボタンの最大番号を取得
        var maxId = 0;
        $('.p-inputField--organizationBox input[type="checkbox"]').each(function() {
          var id = $(this).attr('id');
          if (id) {
            var number = parseInt(id.replace('organization', ''), 10);
            if (number > maxId) {
              maxId = number;
            }
          }
        });

        // 新しいラジオボタンの番号を設定
        var newRadioId = 'organization' + (maxId + 1);

        // 新しい .layer--item を作成
        var newLayerItem = `
          <div class="layer--item">
            <div class="p-inputField p-inputField--organization">
              <div class="item">
                <div class="item--radio">
                  <label for="${newRadioId}" class="round">
                    <input type="checkbox" id="${newRadioId}" name="organization" value="">
                  </label>
                </div>            
                <div class="item--input">
                  <span class="label">順序</span>
                  <input type="number" value="" class="gray" placeholder="1"> 
                  <input type="text" value="" class="gray" placeholder="名称を記入"> 
                </div>
              </div>
            </div>
            <div class="layer--container"></div>
          </div>
        `;

        // チェックされているラジオボタンを含む .layer--item の兄弟要素として追加
        $checkedItem.after(newLayerItem);
      }
    });

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
      var organizationId = $button.data('organization-id');
      var departmentId = $button.data('department-id');
      console.log(organizationId, departmentId);

      // ユーザーリストを取得
      $.ajax({
        url: '{{ route('master.organization._lodeMembers') }}',
        type:'GET',
        data: {
          'organization_id': organizationId,
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