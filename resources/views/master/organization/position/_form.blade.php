<div class="p-formBlock__form">
  <div class="p-inputField p-inputField--full row">
    <label class="label" for="">名称</label>
    <div class="u-w370">
      <input type="text" name="name" placeholder="役職" value="{{ old('name', $position->name) }}">
    </div>
    @if ($errors->has('name'))
      <p class="alert">{{ $errors->first('name') }}</p>
    @endif
  </div>
  {{--  <div class="p-inputField p-inputField--full row">
    <label class="label" for="">権限</label>
    <select name="" id="" class="u-w190 primary">
      <option value="">権限を選択</option>
    </select>
    <p class="alert">権限を選択してください</p>
  </div>  --}}
</div>
