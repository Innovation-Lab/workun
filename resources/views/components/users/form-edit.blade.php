{{--  TODO バリデーション部署の登録を後日実装 --}}
<form method="POST" action="{{ route('master.member.edit', $user) }}">
  @csrf
  <div class="p-formBlock__form">
    <div class="p-inputField">
      <label class="label" for="">部署</label>
      <select name="department_id" id="">
        @foreach($departments as $department)
          <option value="{{ $department->id }}" {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }}>
            {{ $department->name }}
          </option>
        @endforeach
      </select>
      {{--  <p class="alert">部署を選択してください</p>  --}}
    </div>
    <div class="p-inputField">
      <label class="label" for="">役職</label>
      <select name="position_id" id="" value="{{ request('position_id') }}">
        @foreach($positions as $position)
          <option value="{{ $position->id }}" {{ old('position_id', $user->position_id) == $position->id ? 'selected' : '' }}>
            {{ $position->name }}
          </option>
        @endforeach
      </select>
      {{--  <p class="alert">役職を選択してください</p>  --}}
    </div>
    <div class="p-inputField">
      <label class="label" for="">等級</label>
      <select name="grade_id" id="">
        @foreach($grades as $grade)
          <option value="{{ $grade->id }}" {{ old('grade_id', $user->grade_id) == $grade->id ? 'selected' : '' }}>
            {{ $grade->name }}
          </option>
        @endforeach
      </select>
      {{--  <p class="alert">等級を選択してください</p>  --}}
    </div>
    <div class="p-inputField">
      <label class="label" for="">雇用形態</label>
      <select name="employment_id" id="">
        @foreach($employments as $employment)
          <option value="{{ $employment->id }}" {{ old('employment_id', $user->employment_id) == $employment->id ? 'selected' : '' }}>
            {{ $employment->name }}
          </option>
        @endforeach
      </select>
      {{--  <p class="alert">雇用形態を選択してください</p>  --}}
    </div>
    <div class="p-inputField">
      <label class="label" for="">評価者</label>
      <div class="p-inputField--userSelect">
        <div class="p-user">
          <input type="hidden">
          <div class="p-user__image c-noImage">
            <img class="c-image c-image--round" src="">
          </div>
          <div class="p-user__text">
            <div class="name">酒井 雄輝</div>
          </div>
          <span class="p-user__delete">
            <svg width="12" height="12"><use xlink:href="#close" /></svg>
          </span>
        </div>
        <div data-remodal-target="modal_rater" class="c-button">評価者を登録</div>
        <p class="alert">評価者を登録してください</p>
      </div>
    </div>
    <div class="p-inputField">
      <label class="label" for="">承認者</label>
      <div class="p-inputField--userSelect">
        <div class="p-user">
          <input type="hidden">
          <div class="p-user__image c-noImage">
            <img class="c-image c-image--round" src="">
          </div>
          <div class="p-user__text">
            <div class="name">酒井 雄輝</div>
          </div>
          <span class="p-user__delete">
            <svg width="14" height="14"><use xlink:href="#close" /></svg>
          </span>
        </div>
        <div data-remodal-target="modal_authorizer" class="c-button">承認者を登録</div>
        <p class="alert">承認者を登録してください</p>
      </div>
    </div>
    <div class="p-inputField">
      <label class="label" for="">アカウント権限</label>
      <select name="role" id="" value="{{ request('role') }}">
        @foreach($roles as $key => $role)
          <option value="{{ $key }}" {{ old('role', $user->role) == $key ? 'selected' : '' }}>
            {{ $role }}
          </option>
        @endforeach
      </select>
      {{--  <p class="alert">アカウント権限を選択してください</p>  --}}
    </div>
    <div class="p-inputField p-inputField--textarea">
      <label class="label" for="">わーくんメモ</label>
      <textarea name="memo" id="" placeholder="わーくんメモを記入">{{ old('memo', $user->memo) }}</textarea>
    </div>
    <div class="p-formBlock__action">
      <button class="c-button c-button--brandPrimary u-w120">更新する</button>
    </div>
  </div>

</form>
