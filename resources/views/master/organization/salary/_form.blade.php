<div class="p-formBlock__form">
  <div class="p-inputField p-inputField--full row">
    <label class="label" for="">名称</label>
    <div class="u-w370">
      <input type="text" name="name" placeholder="号俸" value="{{ old('name', $salary->name) }}">
    </div>
    @if ($errors->has('name'))
      <p class="alert">{{ $errors->first('name') }}</p>
    @endif
  </div>
</div>
