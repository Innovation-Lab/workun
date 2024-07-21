<div
  data-index="{{ $second_index }}"
  @if(old("self_check_sheet_items." . $first_index . ".self_check_sheet_items." . $second_index . ".delete"))
    class="layer2 delete"
    style="display: none;"
  @else
    class="layer2"
  @endif
>
  <label class="label md navy layer--label" for="">階層2</label>
  <div
    class="layer--item"
    @if($hierarchy < \App\Models\SelfCheckSheetItem::HIERARCHY_SECOND)
      style="display: none;"
    @endif
  >
    <input
      type="text"
      name="self_check_sheet_items[{{ $first_index }}][self_check_sheet_items][{{ $second_index }}][title]"
      placeholder="タイトルを記入してください"
      class="p-inputField--full"
      value="{{ old("self_check_sheet_items." . $first_index . ".self_check_sheet_items." . $second_index . ".title", data_get($second_self_check_sheet_item, 'title')) }}"
    />
    <x-form.alert type="self_check_sheet_items.{{ $first_index }}.self_check_sheet_items.{{ $second_index }}.title" />
  </div>
  <div class="layer3-container">
    <div class="list">
      @foreach(data_get($second_self_check_sheet_item, 'third_self_check_sheet_items', []) as $third_self_check_sheet_item)
        @include('master.self-check._third', [
          'hierarchy' => $hierarchy,
          'first_index' => $first_index,
          'second_index' => $second_index,
          'third_index' => $loop->index,
          'third_self_check_sheet_item' => $third_self_check_sheet_item
        ])
      @endforeach
      @if(old("self_check_sheet_items." . $first_index . ".self_check_sheet_items." . $second_index . ".self_check_sheet_items"))
        @foreach(old("self_check_sheet_items." . $first_index . ".self_check_sheet_items." . $second_index . ".self_check_sheet_items") as $third_self_check_sheet_item)
          @if($loop->index >= count(data_get($second_self_check_sheet_item, 'third_self_check_sheet_items', [])))
            @include('master.self-check._third', [
              'first_index' => $first_index,
              'second_index' => $second_index,
              'third_index' => $loop->index,
              'third_self_check_sheet_item' => $third_self_check_sheet_item
            ])
          @endif
        @endforeach
      @endif
    </div>
    <div class="p-formBlock__action">
      <a
        onclick="addThird(this)"
        class="c-button c-button--brandPrimary c-button--icon c-button--xs u-w120 add-layer3"
      >
        <svg width="11" height="11"><use xlink:href="#add_btn_round"></use></svg>
        階層3を追加
      </a>
      <a
        onclick="deleteSecond(this)"
        class="c-button c-button--cancel c-button--icon c-button--xs u-w120 delete-layer2"
      >
        <svg width="11" height="2"><use xlink:href="#delete_btn_round"></use></svg>
        階層2を削除
      </a>
    </div>
  </div>
  <input
    type="hidden"
    name="self_check_sheet_items[{{ $first_index }}][self_check_sheet_items][{{ $second_index }}][delete]"
    class="delete"
    value="{{ old("self_check_sheet_items." . $first_index . ".self_check_sheet_items." . $second_index . ".delete") }}"
  />
</div>
