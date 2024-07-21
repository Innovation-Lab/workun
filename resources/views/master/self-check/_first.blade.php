<div
  data-index="{{ $first_index }}"
  @if(old("self_check_sheet_items." . $first_index . ".delete"))
    class="layer1 delete"
    style="display: none;"
  @else
    class="layer1"
  @endif
>
  <label class="label md navy" for="">項目{{ $first_index + 1 }}</label>
  <div
    class="layer--item"
    @if($hierarchy < \App\Models\SelfCheckSheetItem::HIERARCHY_THIRD)
      style="display: none;"
    @endif
  >
    <input
      type="text"
      name="self_check_sheet_items[{{ $first_index }}][title]"
      placeholder="タイトルを記入してください"
      class="p-inputField--full"
      value="{{ old("self_check_sheet_items." . $first_index . ".title", data_get($first_self_check_sheet_item, 'title')) }}"
    />
    <x-form.alert type="self_check_sheet_items.{{ $first_index }}.title" />
  </div>
  <div class="layer2-container">
    <div class="list">
      @foreach(data_get($first_self_check_sheet_item, 'second_self_check_sheet_items', []) as $second_self_check_sheet_item)
        @include('master.self-check._second', [
          'hierarchy' => $hierarchy,
          'first_index' => $first_index,
          'second_index' => $loop->index,
          'second_self_check_sheet_item' => $second_self_check_sheet_item
        ])
      @endforeach
      @if(old("self_check_sheet_items." . $first_index . ".self_check_sheet_items"))
        @foreach(old("self_check_sheet_items." . $first_index . ".self_check_sheet_items") as $second_self_check_sheet_item)
          @if($loop->index >= count(data_get($first_self_check_sheet_item, 'second_self_check_sheet_items', [])))
            @include('master.self-check._second', [
              'first_index' => $first_index,
              'second_index' => $loop->index,
              'second_self_check_sheet_item' => $second_self_check_sheet_item
            ])
          @endif
        @endforeach
      @endif
    </div>
    <div class="p-formBlock__action">
      <a
        onclick="addSecond(this)"
        class="c-button c-button--brandPrimary c-button--icon c-button--sm u-w120 add-layer2"
      >
        <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg>
        階層2を追加
      </a>
      <a
        onclick="deleteFirst(this)"
        class="c-button c-button--cancel c-button--icon c-button--sm u-w120 delete-layer1"
      >
        <svg width="11" height="11"><use xlink:href="#delete_btn_round" /></svg>
        項目を削除
      </a>
    </div>
  </div>
  <input
    type="hidden"
    name="self_check_sheet_items[{{ $first_index }}][delete]"
    class="delete"
    value="{{ old("self_check_sheet_items." . $first_index  . ".delete") }}"
  />
</div>
