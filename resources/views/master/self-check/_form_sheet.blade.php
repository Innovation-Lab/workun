<div class="p-formBlock">
  <div class="p-formBlock__body min">
    <div class="p-formBlock__form spance_min">
      <div class="p-inputField p-inputField--full">
        <label class="label md navy" >シートタイトル</label>
        <input type="text" value="" placeholder="シートタイトルを記入してください">
        <p class="alert">シートタイトルを記入してください</p>
      </div>
      <div class="p-inputField p-inputField--full">
        <label class="label md navy" >評価期間</label>
        <select name="" id="">
          <option value="">評価期間を選択</option>
        </select>
        <p class="alert">評価期間を選択してください</p>
      </div>
      <div class="p-inputField p-inputField--full">
        <label class="label md navy" >評価方法</label>
        <select name="" id="" class="u-w140">
          <option value="">評価方法を選択</option>
        </select>
        <p class="alert">評価方法を選択してください</p>
      </div>  
      <hr>
      <div class="p-inputField p-inputField--full">
        <label class="label md navy" >タスク通知</label>
        <select name="" id="">
          <option value="">タスク通知を選択</option>
        </select>
        <p class="alert">タスク通知を選択してください</p>
      </div>
      <div class="p-inputField">
        <label class="label md navy" >入力期限</label>
        <select name="" id="">
          <option value="">入力期限を選択</option>
        </select>
        <p class="alert">入力期限を選択してください</p>
      </div>
      <div class="p-inputField left">
        <label class="label md navy" >評価期限</label>
        <select name="" id="">
          <option value="">評価期限を選択</option>
        </select>
        <p class="alert">評価期限を選択してください</p>
      </div>
      <div class="p-inputField">
        <label class="label md navy" >承認期限</label>
        <select name="" id="">
          <option value="">承認期限を選択</option>
        </select>
        <p class="alert">承認期限を選択してください</p>
      </div>
      <div class="p-inputField p-inputField--full">
        <div class="p-tableBox__head between u-p0">
          <label class="label lg navy" >対象者</label>
          {{-- 対象者を選択したら表示されるカウント/変更ボタン
          <div class="u-flex baseline u-gap8">
            <div class="count min">
              <span class="unit">全</span>
              <p class="number">24</p>
              <span class="unit">名</span>
            </div>
            <button class="c-button--text" data-remodal-target="modal_tergeter">変更</button>
          </div>
          --}}
        </div>
       
        <div class="p-inputField--userSelect">
          <div data-remodal-target="modal_tergeter" class="c-button c-button--large">対象者を選択</div>
          {{-- 対象者を選択したら表示されるテーブル
          <div class="p-table c-scroll">
            <?php
              $tableHead = [
                [
                  'title' => '対象者',
                  'width' => '150',
                  'class' => null,
                ],[
                  'title' => '部署',
                  'width' => 'atuo',
                  'class' => null,
                ]
              ]
            ?>
            <table class="w-auto">
              <colgroup>
                @foreach($tableHead as $key => $theadItem)
                <col class="u-w{!! $theadItem['width'] !!}" />
                @endforeach
              </colgroup>
              <tbody>
                @for($tableBody = 0; $tableBody < 10; $tableBody++)
                  <tr>
                    <!-- 対象者 -->
                    <td><div class="item">
                      <div class="p-user">
                        <div class="p-user__image c-noImage">
                          <img class="c-image c-image--round" src="">
                        </div>
                        <div class="p-uesr__text">
                          <div class="name">酒井 雄輝</div>
                        </div>
                      </div>
                    </div></td>          
                    <!-- 部署 -->
                    <td><div class="item">売買の窓口</div></td>
                  </tr>
                @endfor
              </tbody>
            </table>
          </div>
          --}}
          <p class="alert">対象者を登録してください</p>
        </div>
        @include('master.self-check.modal._tergeter')
      </div>
      <div class="p-formBlock__action center u-align--horizontal">
        <button class="c-button c-button--brandAccent c-button--md u-w240">セルフチェックシートを作成</button>
        @if(Route::current()->getName() == 'master.self-check.edit')
          <button class="c-button--text" data-remodal-target="modal_alert_sheet">このシートを削除する</button>
        @endif
      </div>
    </div>
  </div>
</div>