<div
  @if(old("self_check_sheet_items." . $first_index . ".self_check_sheet_items." . $second_index . ".self_check_sheet_items." . $third_index . ".delete"))
    class="layer3 delete"
    style="display: none;"
  @else
    class="layer3"
  @endif
>
  <label class="label md navy layer--label" for="">階層3</label>
  <div class="layer--item active">
    <input
      type="text"
      name="self_check_sheet_items[{{ $first_index }}][self_check_sheet_items][{{ $second_index }}][self_check_sheet_items][{{ $third_index }}][title]"
      placeholder="タイトルを記入してください"
      class="p-inputField--full"
      value="{{ old("self_check_sheet_items." . $first_index . ".self_check_sheet_items." . $second_index . ".self_check_sheet_items." . $third_index . ".title", data_get($third_self_check_sheet_item, 'title')) }}"
    />
    <input
      type="text"
      name="self_check_sheet_items[{{ $first_index }}][self_check_sheet_items][{{ $second_index }}][self_check_sheet_items][{{ $third_index }}][movie_title]"
      placeholder="動画タイトル"
      class="video"
      value="{{ old("self_check_sheet_items." . $first_index . ".self_check_sheet_items." . $second_index . ".self_check_sheet_items." . $third_index . ".movie_title", data_get($third_self_check_sheet_item, 'movie_title')) }}"
    />
    <input
      type="url"
      name="self_check_sheet_items[{{ $first_index }}][self_check_sheet_items][{{ $second_index }}][self_check_sheet_items][{{ $third_index }}][movie_url]"
      placeholder="動画URL"
      class="video"
      value="{{ old("self_check_sheet_items." . $first_index . ".self_check_sheet_items." . $second_index . ".self_check_sheet_items." . $third_index . ".movie_url", data_get($third_self_check_sheet_item, 'movie_url')) }}"
    />
    <div>
      <x-form.alert type="self_check_sheet_items.{{ $first_index }}.self_check_sheet_items.{{ $second_index }}.self_check_sheet_items.{{ $third_index }}.title" />
      <x-form.alert type="self_check_sheet_items.{{ $first_index }}.self_check_sheet_items.{{ $second_index }}.self_check_sheet_items.{{ $third_index }}.movie_title" />
      <x-form.alert type="self_check_sheet_items.{{ $first_index }}.self_check_sheet_items.{{ $second_index }}.self_check_sheet_items.{{ $third_index }}.movie_url" />
    </div>
  </div>
  <div class="p-formBlock__action">
    <a
      onclick="deleteThird(this)"
      class="c-button c-button--cancel c-button--icon c-button--xs u-w120 delete-layer3"
    >
      <svg width="11" height="2"><use xlink:href="#delete_btn_round"></use></svg>
      階層3を削除
    </a>
  </div>
  <input
    type="hidden"
    name="self_check_sheet_items[{{ $first_index }}][self_check_sheet_items][{{ $second_index }}][self_check_sheet_items][{{ $third_index }}][delete]"
    class="delete"
    value="{{ old("self_check_sheet_items." . $first_index . ".self_check_sheet_items." . $second_index . ".self_check_sheet_items." . $third_index . ".delete") }}"
  />
</div>
