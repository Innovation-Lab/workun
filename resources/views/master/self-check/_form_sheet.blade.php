<div class="p-formBlock">
  <div class="p-formBlock__body min">
    <div class="p-formBlock__form spance_min">
      <div class="p-inputField p-inputField--full">
        <label class="label md navy" >シートタイトル</label>
        <input
          type="text"
          name="title"
          value="{{ old('title', $selfCheckSheet->title) }}"
          placeholder="シートタイトルを記入してください"
        >
        <x-form.alert type="title" />
      </div>
      <div class="p-inputField p-inputField--full">
        <label class="label md navy" >評価期間</label>
        <x-form.select
          id=""
          class=""
          name="period_id"
          empty="評価期間を選択"
          :selects="$period_list"
          :value="old('period_id', $selfCheckSheet->period_id)"
        />
        <x-form.alert type="period_id" />
      </div>
      <div class="p-inputField p-inputField--full">
        <label class="label md navy" >評価方法</label>
        <x-form.select
          id=""
          class="u-w140"
          name="method"
          empty=""
          :selects="$method_list"
          :value="old('method', $selfCheckSheet->method)"
        />
        <x-form.alert type="method" />
      </div>
      <hr>
      <div class="p-inputField">
        <label class="label md navy" >入力期限</label>
        <x-form.select
          id=""
          class="u-w140"
          name="check_days"
          empty="入力期限を選択"
          :selects="$day_list"
          :value="old('check_days', $selfCheckSheet->check_days)"
        />
        <x-form.alert type="check_days" />
      </div>
      <div class="p-inputField left">
        <label class="label md navy" >評価期限</label>
        <x-form.select
          id=""
          class="u-w140"
          name="rating_days"
          empty="評価期限を選択"
          :selects="$day_list"
          :value="old('rating_days', $selfCheckSheet->rating_days)"
        />
        <x-form.alert type="rating_days" />
      </div>
      <div class="p-inputField">
        <label class="label md navy" >承認期限</label>
        <x-form.select
          id=""
          class="u-w140"
          name="approval_days"
          empty="承認期限を選択"
          :selects="$day_list"
          :value="old('approval_days', $selfCheckSheet->approval_days)"
        />
        <x-form.alert type="approval_days" />
      </div>
      <div class="p-inputField p-inputField--full">
        <div class="p-tableBox__head between u-p0">
          <label class="label lg navy" >対象者</label>
          {{-- 対象者を選択したら表示されるカウント/変更ボタン --}}
          <div class="u-flex baseline u-gap8">
            <div class="count min">
              <span class="unit">全</span>
              <p id="selected_user_count" class="number">
                {{ number_format(count(
                  old(
                    'self_check_sheet_targets',
                    $selfCheckSheet->self_check_sheet_targets->pluck('user_id')
                  )
)               ) }}
              </p>
              <span class="unit">名</span>
            </div>
            <button
              class="c-button--text"
              data-remodal-target="modal_tergeter"
              onclick="searchUsers()"
            >
              変更
            </button>
          </div>
        </div>

        <div class="p-inputField--userSelect">
          @if(count(
            old(
              'self_check_sheet_targets',
              $selfCheckSheet->self_check_sheet_targets->pluck('user_id')
            )
          ) < 1)
            <div
              id="no_user_area"
              class="c-button c-button--large"
              data-remodal-target="modal_tergeter"
              onclick="searchUsers()"
            >
              対象者を選択
            </div>
          @endif
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
            <table
              id="selected_users"
              class="w-auto"
            >
              <colgroup>
                @foreach($tableHead as $key => $theadItem)
                <col class="u-w{!! $theadItem['width'] !!}" />
                @endforeach
              </colgroup>
              <tbody>
                @foreach(
                  old(
                    'self_check_sheet_targets',
                    $selfCheckSheet->self_check_sheet_targets->pluck('user_id')
                  ) as $self_check_sheet_target
                )
                  <x-self-check-sheet.form-selected-user :id="$self_check_sheet_target" />
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        @include('master.self-check.modal._tergeter')
      </div>
      <div class="p-formBlock__action center u-align--horizontal">
        <button class="c-button c-button--brandAccent c-button--md u-w240">
          @if(!$selfCheckSheet->id)
            セルフチェックシートを追加
          @else
            セルフチェックシートを更新
          @endif
        </button>
        @if($selfCheckSheet->id)
          @can('delete', $selfCheckSheet)
            <button
              type="button"
              class="c-button--text"
              data-remodal-target="modal_delete_{{ $selfCheckSheet->id }}"
            >
              このシートを削除する
            </button>
          @endcan
        @endif
      </div>
    </div>
  </div>
</div>
