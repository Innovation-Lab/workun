<select
  name="{{ $key }}"
  @if($id)
    id="{{ $id }}"
  @endif
  @if($class)
    class="{{ $class }}"
  @endif
>
  @foreach($month_list as $month_key => $month_label)
    <option
      value="{{ $month_key }}"
      @if($month_key === $value)
        selected
      @endif
    >
      {{ $month_label }}
    </option>
  @endforeach
</select>
