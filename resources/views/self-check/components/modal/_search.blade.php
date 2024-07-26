<div class="remodal p-modal p-modal--search" data-remodal-id="modal_search" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">詳細検索</p>
  </div>
  <div class="p-modal__body">
    <div class="p-formBlock__form">
      <div class="p-inputField p-inputField--full">
        <label class="label">評価期間</label>
        <select name="department_id" class="primary">
          <option value="">評価期間を選択</option>
        </select>
      </div>
      <div class="p-inputField">
        <label class="label">部署</label>
        <select name="department_id" class="primary">
          <option value="">部署を選択</option>
        </select>
      </div>
      <div class="p-inputField">
        <label class="label">役職</label>
        <select name="position_id" class="primary">
          <option value="">役職を選択</option>
        </select>
      </div>
      <div class="p-inputField">
        <label class="label">等級</label>
        <select name="grade_id" class="primary">
          <option value="">等級を選択</option>
        </select>
      </div>
      <div class="p-inputField">
        <label class="label" for="employment_id">雇用形態</label>
        <select name="employment_id" class="primary">
          <option value="">雇用形態を選択</option>
        </select>
      </div>
    </div>
    <div class="p-formBlock__action">
      <a href="{{ route('self-check.all')  }}" class="c-button--text">条件をリセット</a>
      <button class="c-button c-button--brandPrimary u-w120">絞り込む</button>
    </div>
  </div>
</div>
