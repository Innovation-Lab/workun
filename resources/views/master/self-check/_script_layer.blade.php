<script>
  $(document).ready(function() {

    // シート階層選択
  $('.layer--select').on('change', function() {
    // 選択された値を取得
    var selectedValue = $(this).val();

    // すべての.layer--itemから.activeクラスを削除
    $('.layer--item').removeClass('active');

    // 選択された値に応じて.activeクラスを追加
    if (selectedValue === "1") {
      $('.layer1 .layer--item').addClass('active');
    } else if (selectedValue === "2") {
      $('.layer2 .layer--item').addClass('active');
    } else if (selectedValue === "3") {
      $('.layer3 .layer--item').addClass('active');
    }
  });

    // 項目カウンターを初期化
    var itemCount = $('.layer1-container .layer1').length;

    // 1階層目追加
    $(document).on('click', '.add-layer1', function() {

      // カウンターをインクリメント
      itemCount++;

      // 選択された値を取得
      var selectedValue = $('.layer--select').val();
      
      // 新しい項目のHTMLを作成
      var newLayer1 = `
        <div class="layer1">
          <label class="label md navy" for="">項目${itemCount}</label>
          <div class="layer--item ${selectedValue === '1' ? 'active' : ''}">
            <input type="text" placeholder="タイトルを記入してください" class="p-inputField--full">
            <input type="text" placeholder="動画タイトル" class="video">
            <input type="url" placeholder="動画URLを設置" class="video">
          </div>
          <div class="layer2-container">
            <div class="p-formBlock__action">
              <a class="c-button c-button--brandPrimary c-button--icon c-button--sm u-w120 add-layer3">
                <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg> 
                階層3を追加
              </a>
              <a class="c-button c-button--cancel c-button--icon c-button--sm u-w120 delete-layer2">
                <svg width="11" height="2"><use xlink:href="#delete_btn_round" /></svg>
                階層2を削除
              </a>
            </div>
          </div>
          <div class="p-formBlock__action">
            <a class="c-button c-button--brandPrimary c-button--icon c-button--sm u-w120 add-layer2">
              <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg> 
              階層2を追加
            </a>
            <a class="c-button c-button--cancel c-button--icon c-button--sm u-w120 delete-layer1">
              <svg width="11" height="11"><use xlink:href="#delete_btn_round" /></svg> 
              項目を削除
            </a>
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

      // 選択された値を取得
      var selectedValue = $('.layer--select').val();

      // 新しい階層2のHTMLを作成
      var newLayer2 = `
        <div class="layer2">
          <label class="label md navy layer--label" for="">階層2</label>
          <div class="layer--item ${selectedValue === '2' ? 'active' : ''}">
            <input type="text" placeholder="タイトルを記入してください" class="p-inputField--full">
            <input type="text" placeholder="動画タイトル" class="video">
            <input type="url" placeholder="動画URLを設置" class="video">
          </div>
          <div class="layer3-container"></div>
          <div class="p-formBlock__action">
            <a class="c-button c-button--brandPrimary c-button--icon c-button--xs u-w120 add-layer3">
              <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg> 
              階層3を追加
            </a>
            <a class="c-button c-button--cancel c-button--icon c-button--xs u-w120 delete-layer2">
              <svg width="11" height="2"><use xlink:href="#delete_btn_round" /></svg>
              階層2を削除
            </a>
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

      // 選択された値を取得
      var selectedValue = $('.layer--select').val();

      // 新しい階層3のHTMLを作成
      var newLayer3 = `
        <div class="layer3">
          <label class="label md navy layer--label" for="">階層3</label>
          <div class="layer--item ${selectedValue === '3' ? 'active' : ''}">
            <input type="text" placeholder="タイトルを記入してください" class="p-inputField--full">
            <input type="text" placeholder="動画タイトル" class="video">
            <input type="url" placeholder="動画URLを設置" class="video">
          </div>
          <div class="p-formBlock__action">
            <a class="c-button c-button--brandPrimary c-button--icon c-button--xs u-w120 add-layer3">
              <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg>
              階層3を追加
            </a>
            <a class="c-button c-button--cancel c-button--icon c-button--xs u-w120 delete-layer3">
              <svg width="11" height="2"><use xlink:href="#delete_btn_round" /></svg>
              階層3を削除
            </a>
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

      // 選択された値を取得
      var selectedValue = $('.layer--select').val();

      // 新しい階層3のHTMLを作成
      var newLayer3 = `
        <div class="layer3">
          <label class="label md navy layer--label" for="">階層3</label>
          <div class="layer--item ${selectedValue === '3' ? 'active' : ''}">
            <input type="text" placeholder="タイトルを記入してください" class="p-inputField--full">
            <input type="text" placeholder="動画タイトル" class="video">
            <input type="url" placeholder="動画URLを設置" class="video">
          </div>
          <div class="p-formBlock__action">
            <a class="c-button c-button--brandPrimary c-button--icon c-button--xs u-w120 add-layer3">
              <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg>
              階層3を追加
            </a>
            <a class="c-button c-button--cancel c-button--icon c-button--xs u-w120 delete-layer3">
              <svg width="11" height="2"><use xlink:href="#delete_btn_round" /></svg>
              階層3を削除
            </a>
          </div>
        </div>
      `;
      $(this).closest('.layer3-container').append(newLayer3);
    });
  });
</script>