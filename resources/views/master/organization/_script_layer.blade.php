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