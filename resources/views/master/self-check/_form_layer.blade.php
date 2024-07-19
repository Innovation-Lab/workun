<div class="p-formBlock">
  <div class="p-formBlock__head">
    <div class="p-inputField p-inputField--full">
      <label class="label md navy" for="">シート階層選択</label>
      <select name="" id="" class="u-w290 layer--select">
        <option value="">階層を選択してください</option>
        <option value="1">1階層</option>
        <option value="2">2階層</option>
        <option value="3">3階層</option>
      </select>
    </div>
  </div>
  <div class="p-formBlock__body">
    <div class="p-formBlock__form">
      <div class="p-inputField p-inputField--sheetItem p-inputField--full layer1-container">
        <?php  for($p = 1; $p < 4; $p++){ ?>
          <div class="layer1">
            <label class="label md navy" for="">項目<?php echo $p; ?></label>
            <div class="layer--item">
              <input type="text" placeholder="タイトルを記入してください" class="p-inputField--full">
              <input type="text" placeholder="動画タイトル" class="video">
              <input type="url" placeholder="動画URLを設置" class="video">
            </div>
            <div class="layer2-container"></div>
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
        <?php } ?> 
      </div>
      <div class="p-formBlock__action">
        <a class="c-button c-button--brandPrimary u-w150 add-layer1">項目を追加</a>
      </div>
    </div>
    @include('master.self-check._script_layer')
  </div>
</div>