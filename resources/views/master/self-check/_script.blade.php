<script>
  $(document).ready(function() {

    // シート階層選択
    $('select').change(function() {
      var selectedOption = $(this).children('option:selected').val();
      
      // クラスを削除
      $('div').removeClass('selected');
      
      // 選択されたオプションに応じてクラスを追加
      if (selectedOption === '1階層') {
        $('.layer1 > .layer--item').addClass('first-level');
      } else if (selectedOption === '2階層') {
        $('.layer2 > .layer--item').addClass('second-level');
      } else if (selectedOption === '3階層') {
        $('.layer3 > .layer--item').addClass('third-level');
      }
    });

    // 1階層目追加
    $(document).on('click', '.add-layer1', function() {
      // 新しい項目のHTMLを作成
      var newLayer1 = `
        <div class="p-inputField p-inputField--sheetItem layer1">
          <label class="label" for="">項目1</label>
          <div class="layer--item">
            <input type="text" placeholder="タイトルを記入してください" class="p-inputField--full">
            <input type="text" placeholder="動画タイトル">
            <input type="url" placeholder="動画URLを設置">
          </div>
          <div class="layer2-container">
            <div class="p-formBlock__action">
              <button class="c-button c-button--brandPrimary c-button--icon c-button--sm u-w120 add-layer3">
                <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg> 
                階層3を追加
              </button>
              <button class="c-button c-button--cancel c-button--icon c-button--sm u-w120 delete-layer2">
                <svg width="11" height="2"><use xlink:href="#delete_btn_round" /></svg>
                階層2を削除
              </button>
            </div>
          </div>
          <div class="p-formBlock__action">
            <button class="c-button c-button--brandPrimary c-button--icon c-button--sm u-w120 add-layer2">
              <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg> 
              階層2を追加
            </button>
            <button class="c-button c-button--cancel c-button--icon c-button--sm u-w120 delete-layer1">
              <svg width="11" height="11"><use xlink:href="#delete_btn_round" /></svg> 
              項目を削除
            </button>
          </div>
        </div>
      `;
      $('.layer1-container').append(newLayer1);
    });

    // 階層1削除
    $(document).on('click', '.delete-layer1', function() {
      $(this).closest('.p-inputField--sheetItem').remove();
    });

    // 階層2追加
    $(document).on('click', '.add-layer2', function() {
      // 新しい階層2のHTMLを作成
      var newLayer2 = `
        <div class="layer2">
          <label class="label layer--label" for="">階層2</label>
          <div class="layer--item">
            <input type="text" placeholder="タイトルを記入してください" class="p-inputField--full">
            <input type="text" placeholder="動画タイトル">
            <input type="url" placeholder="動画URLを設置">
          </div>
          <div class="layer3-container"></div>
          <div class="p-formBlock__action">
            <button class="c-button c-button--brandPrimary c-button--icon c-button--xs u-w120 add-layer3">
              <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg> 
              階層3を追加
            </button>
            <button class="c-button c-button--cancel c-button--icon c-button--xs u-w120 delete-layer2">
              <svg width="11" height="2"><use xlink:href="#delete_btn_round" /></svg>
              階層2を削除
            </button>
          </div>
        </div>
      `;
      $(this).parent().siblings('.layer2-container').append(newLayer2);
    });

    // 階層2削除
    $(document).on('click', '.delete-layer2', function() {
      $(this).closest('.layer2').remove();
    });

    // 階層3追加（layer2の場合）
    $(document).on('click', '.layer2 .add-layer3', function() {
      // 新しい階層3のHTMLを作成
      var newLayer3 = `
        <div class="layer3">
          <label class="label layer--label" for="">階層3</label>
          <div class="layer--item">
            <input type="text" placeholder="タイトルを記入してください" class="p-inputField--full">
            <input type="text" placeholder="動画タイトル">
            <input type="url" placeholder="動画URLを設置">
          </div>
          <div class="p-formBlock__action">
            <button class="c-button c-button--brandPrimary c-button--icon c-button--xs u-w120 add-layer3">
              <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg>
              階層3を追加
            </button>
            <button class="c-button c-button--cancel c-button--icon c-button--xs u-w120 delete-layer3">
              <svg width="11" height="2"><use xlink:href="#delete_btn_round" /></svg>
              階層3を削除
            </button>
          </div>
        </div>
      `;
      $(this).parent().siblings('.layer3-container').append(newLayer3);
    });

    // 階層3削除
    $(document).on('click', '.delete-layer3', function() {
      // 親要素の.childを削除する
      $(this).closest('.layer3').remove();
    });

    // 階層3追加（layer3の場合）
    $(document).on('click', '.layer3 .add-layer3', function() {
      // 新しい階層3のHTMLを作成
      var newLayer3 = `
        <div class="layer3">
          <label class="label layer--label" for="">階層3</label>
          <div class="layer--item">
            <input type="text" placeholder="タイトルを記入してください" class="p-inputField--full">
            <input type="text" placeholder="動画タイトル">
            <input type="url" placeholder="動画URLを設置">
          </div>
          <div class="p-formBlock__action">
            <button class="c-button c-button--brandPrimary c-button--icon c-button--xs u-w120 add-layer3">
              <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg>
              階層3を追加
            </button>
            <button class="c-button c-button--cancel c-button--icon c-button--xs u-w120 delete-layer3">
              <svg width="11" height="2"><use xlink:href="#delete_btn_round" /></svg>
              階層3を削除
            </button>
          </div>
        </div>
      `;
      $(this).closest('.layer3-container').append(newLayer3);
    });
  });
</script>