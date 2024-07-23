<div
  class="remodal p-modal p-modal--search"
  data-remodal-id="modal_search"
  data-remodal-options="
    hashTracking: false,
    closeOnOutsideClick: false,
    appendTo: #search_form
  "
>
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">詳細検索</p>
  </div>
  <div class="p-modal__body">
    <div class="p-formBlock__form">
      <div class="p-inputField">
        <label class="label" for="">部署</label>
        <select name="department_id" id="" class="primary">
          <option value="">部署を選択</option>
          @foreach($departments as $department)
            <option value="{{ $department->id }}">{{ $department->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="p-inputField">
        <label class="label" for="">役職</label>
        <select name="position_id" id="" class="primary">
          <option value="">役職を選択</option>
          @foreach($positions as $position)
            <option value="{{ $position->id }}">{{ $position->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="p-inputField">
        <label class="label" for="">等級</label>
        <select name="grade_id" id="" class="primary">
          <option value="">等級を選択</option>
          @foreach($grades as $grade)
            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="p-inputField">
        <label class="label" for="employment_id">雇用形態</label>
        <select name="employment_id" id="" class="primary">
          <option value="">雇用形態を選択</option>
          @foreach($employments as $employment)
            <option value="{{ $employment->id }}">{{ $employment->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="p-inputField p-inputField--full">
        <span class="label" >表示条件</span>
        <div class="p-inputField--checkbox">
          <label for="display_format" class="tab tab--ghost">
            <input type="checkbox" id="display_format" name="" value="">評価者 / 承認者 の未登録ユーザーのみを表示
          </label>
        </div>
      </div>
    </div>
    <div class="p-formBlock__action">
      <a href="{{ route('master.member.index')  }}" class="c-button--text">条件をリセット</a>
      <button class="c-button c-button--brandPrimary u-w120">絞り込む</button>
    </div>
  </div>
</div>
