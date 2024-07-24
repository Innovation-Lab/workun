<div class="remodal p-modal" data-remodal-id="modal_reviewer" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">人事業務の承認者の選択</p>
    <p class="description">人事業務の承認者を設定してください。</p>
  </div>
  <div class="p-modal__middle">
    <div class="p-inputField">
      <label class="label" for="">部署</label>
      <select id="reviewer_department_id" class="u-w190" value="{{ request('department_id') }}">
        <option value="">全て</option>
        @foreach($departments as $department)
          <option value="{{ $department->id }}">
            {{ $department->name }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="p-inputField">
      <label class="label" for="">役職</label>
      <select id="reviewer_position_id"  class="u-w140" value="{{ request('position_id') }}">
        <option value="">全て</option>
        @foreach($positions as $position)
          <option value="{{ $position->id }}">
            {{ $position->name }}
          </option>
        @endforeach
      </select>
    </div>
    <button
      class="c-button c-button--xs c-button--brandAccent u-w120"
      onclick="serachReviewer()"
    >
      絞り込む
    </button>
  </div>
  <div class="p-modal__body">
    <div id="reviewer-list" class="p-table c-scroll">
      {{--  ここに承認者一覧が表示される。  --}}
    </div>
    <div class="p-formBlock__action">
      <button data-remodal-action="close" class="c-button c-button--cancel u-w120">キャンセル</button>
      <button
        onclick="showReviewers()"
        class="c-button c-button--brandPrimary u-w160">承認者を登録</button>
    </div>
  </div>
</div>
