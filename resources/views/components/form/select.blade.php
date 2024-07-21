<select
  @if($name)
    name="{{ $name }}"
  @endif
  @if($id)
    class="{{ $id }}"
  @endif
  @if($class)
    class="{{ $class }}"
  @endif
>
  @if($empty)
    <option value="">
      {{ $empty }}
    </option>
  @endif
  @foreach($selects as $select_key => $select_label)
    <option
      value="{{ $select_key }}"
      @if($select_key == $value)
        selected
      @endif
    >
      {{ $select_label }}
    </option>
  @endforeach
</select>
