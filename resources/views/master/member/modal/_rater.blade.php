<div class="remodal p-modal" data-remodal-id="modal_rater" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">人事業務の評価者の選択</p>
    <p class="description">人事業務の評価者を設定してください。</p>
  </div>
  <div class="p-modal__middle p-formBlock__form list">
    <div class="p-inputField">
      <label class="label" for="">部署</label>
      <select name="" id="" class="u-w190 primary">
        <option value="">全て</option>
      </select>
    </div>
    <div class="p-inputField">
      <label class="label" for="">役職</label>
      <select name="" id="" class="u-w140 primary">
        <option value="">全て</option>
      </select>
    </div>
    <button class="c-button c-button--xs c-button--brandAccent u-w120">絞り込む</button>
  </div>
  <div class="p-modal__body">
    <div class="p-table c-scroll">
      <?php 
        $tableHead = [
          [
            'title' => null,
            'width' => '40px',
            'class' => 'checkbox',
          ],[
            'title' => '氏名',
            'width' => '150px',
            'class' => null,
          ],[
            'title' => '部署',
            'width' => '130px',
            'class' => null,
          ],[
            'title' => '役職',
            'width' => 'auto',
            'class' => null,
          ]
        ]
      ?>
      <table class="sticky">
        <colgroup>
          @foreach($tableHead as $key => $theadItem)
            <col style="width: {!! $theadItem['width'] !!}" />
          @endforeach
        </colgroup>
        <thead>
          <tr>
            @foreach($tableHead as $key => $theadItem)
              @if ($theadItem['class'] === 'checkbox')
                <th class="{!! $theadItem['class'] !!}">
                  <!-- チェックボックス専用のHTML -->
                  <div class="item">
                    <label for="" class="none">
                      <input type="checkbox" name="all_check" id="all">
                    </label>
                  </div>
                </th>
              @else
                <th class="{!! $theadItem['class'] !!}">
                  <div class="item">{!! $theadItem['title'] !!}</div>
                </th>
              @endif
            @endforeach
          </tr>
        </thead>
        <tbody>
          @for($tableBody = 0; $tableBody < 20; $tableBody++)
            <tr>
              <!-- チェックボックス -->
              <td><div class="item">
                <label for="check_rater{{ $tableBody }}">
                  <input type="checkbox" id="check_rater{{ $tableBody }}" name="check[]" class="check" value="">
                </label>
              </div></td>
              <!-- 氏名 -->
              <td><div class="item">
                <div class="p-user">
                  <div class="p-user__image">
                    <img class="c-image c-image--round" src="">
                  </div>
                  <div class="p-uesr__text">
                    <div class="name">酒井 雄輝</div>
                  </div>
                </div>
              </div></td>
              <!-- 部署 -->
              <td><div class="item">売買の窓口</div></td>
              <!-- 役員 -->
              <td><div class="item">一般社員</div></td>
            </tr>
          @endfor
        </tbody>
      </table>
    </div>
    <div class="p-formBlock__action">
      <button data-remodal-action="close" class="c-button c-button--cancel u-w120">キャンセル</button>
      <button class="c-button c-button--brandPrimary u-w160">評価者を登録</button>
    </div>
  </div>
</div>