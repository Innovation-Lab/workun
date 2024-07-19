<div
  class="remodal p-modal p-modal--search"
  data-remodal-id="modal_search"
  data-remodal-options="hashTracking: false, closeOnOutsideClick: false, appendTo: #search_form"
>
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">詳細検索</p>
  </div>
  <div class="p-modal__body">
    <div class="p-formBlock__form">
      <div class="p-inputField p-inputField--full">
        <label class="label" for="">評価期間</label>
        <select name="period_id" class="primary">
          <option value="">評価期間を選択</option>
          @foreach($period_list as $period_key => $period_label)
            <option
              value="{{ $period_key }}"
              @if($period_key == request('period_id'))
                selected
              @endif
            >
              {{ $period_label }}
            </option>
          @endforeach
        </select>
      </div>
{{--      <div class="p-inputField">--}}
{{--        <label class="label" for="">部署</label>--}}
{{--        <select name="department_id" class="primary">--}}
{{--          <option value="">部署を選択</option>--}}
{{--        </select>--}}
{{--      </div>--}}
{{--      <div class="p-inputField">--}}
{{--        <label class="label" for="">役職</label>--}}
{{--        <select name="position_id" class="primary">--}}
{{--          <option value="">役職を選択</option>--}}
{{--        </select>--}}
{{--      </div>--}}
{{--      <div class="p-inputField">--}}
{{--        <label class="label" for="">等級</label>--}}
{{--        <select name="grade_id" class="primary">--}}
{{--          <option value="">等級を選択</option>--}}
{{--        </select>--}}
{{--      </div>--}}
{{--      <div class="p-inputField">--}}
{{--        <label class="label" for="employment_id">雇用形態</label>--}}
{{--        <select name="employment_id" class="primary">--}}
{{--          <option value="">雇用形態を選択</option>--}}
{{--        </select>--}}
{{--      </div>--}}
    </div>
    <div class="p-formBlock__action">
      <a
        href="{{ route('master.self-check.index')  }}"
        class="c-button--text"
      >
        条件をリセット
      </a>
      <button
        type="submit"
        class="c-button c-button--brandPrimary u-w120"
      >
        絞り込む
      </button>
    </div>
  </div>
</div>
