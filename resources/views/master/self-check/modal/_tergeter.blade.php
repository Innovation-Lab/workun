<div
  class="remodal p-modal"
  data-remodal-id="modal_tergeter"
  data-remodal-options="hashTracking: false, closeOnOutsideClick: false"
>
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">対象者の選択</p>
    <p class="description">セルフチェックシートの対象者を設定してください。</p>
  </div>
  <div
    id="user_select_form"
    class="p-modal__middle"
  >
    <div class="p-inputField">
      <label class="label" for="">部署</label>
      <select name="department_id" class="u-w190 primary">
        <option value="">全て</option>
        @foreach($departments as $department_key => $department_label)
          <option value="{{ $department_key }}">{{ $department_label }}</option>
        @endforeach
      </select>
    </div>
    <div class="p-inputField">
      <label class="label" for="">役職</label>
      <select name="position_id" class="u-w140 primary">
        <option value="">全て</option>
        @foreach($positions as $positions_key => $positions_label)
          <option value="{{ $positions_key }}">{{ $positions_label }}</option>
        @endforeach
      </select>
    </div>
    <button
      class="c-button c-button--xs c-button--brandAccent u-w120"
      onclick="searchUsers()"
    >
      絞り込む
    </button>
  </div>
  <div class="p-modal__body">
    <div id="user_list" class="p-table c-scroll"></div>
    <div class="p-formBlock__action">
      <button
        data-remodal-action="close"
        class="c-button c-button--cancel u-w120"
      >
        キャンセル
      </button>
      <button
        data-remodal-action="close"
        class="c-button c-button--brandPrimary u-w160"
        onclick="selectUsers()"
      >
        対象者を登録
      </button>
    </div>
  </div>
</div>
