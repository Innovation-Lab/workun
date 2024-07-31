{{--  検索一覧  --}}
<form
  method="GET"
  action="{{ route('master.organization.user_department.add', $department) }}"
>
  <div class="p-search p-formBlock__form list">
    <div class="p-inputField">
      <label class="label">氏名</label>
      <div class="u-w160">
        <input
          type="text"
          name="name"
          placeholder="氏名を記入"
          class="primary"
          value="{{ request('name') }}">
      </div>
    </div>
    <div class="p-inputField">
      <label class="label">メールアドレス</label>
      <div class="u-w200">
        <input
          type="email"
          name="email"
          class="primary"
          placeholder="sample@example.com"
          value="{{ request('email') }}">
      </div>
    </div>
    <div class="p-inputField">
      <label class="label">電話番号</label>
      <div class="u-w160">
        <input
          type="tel"
          name="number"
          class="primary"
          placeholder="09012345678"
          value="{{ request('number') }}">
      </div>
    </div>
    <div class="p-inputField">
      <label class="label">役職</label>
      <select
        name="position_id"
        class="u-w140 primary"
      >
        <option value="">全て</option>
          @foreach($positions as $position)
            <option
              value="{{ $position->id }}"
              {{ request('position_id') == $position->id ? 'selected' : '' }}
            >
              {{ $position->name }}
            </option>
          @endforeach
      </select>
    </div>
    <button class="c-button c-button--xs c-button--brandAccent u-w120">
      絞り込む
    </button>
  </div>
</form>

