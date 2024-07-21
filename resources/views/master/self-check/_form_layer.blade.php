<div class="p-formBlock">
  <div class="p-formBlock__head">
    <div class="p-inputField p-inputField--full">
      <label class="label md navy" for="">シート階層</label>
      <x-form.select
        id=""
        class="u-w290 layer--select"
        name="hierarchy"
        empty=""
        :selects="$hierarchy_list"
        :value="old('hierarchy', $selfCheckSheet->hierarchy)"
      />
      <x-form.alert type="hierarchy" />
    </div>
  </div>
  <div class="p-formBlock__body">
    <div class="p-formBlock__form">
      <div class="p-inputField p-inputField--sheetItem p-inputField--full layer1-container">
        @foreach($selfCheckSheet->first_self_check_sheet_items as $first_self_check_sheet_item)
          <div
            class="layer1"
            data-index="{{ $loop->index }}"
          >
            <label class="label md navy" for="">項目{{ $loop->iteration }}</label>
            <div
              class="layer--item"
              @if($selfCheckSheet->hierarchy < \App\Models\SelfCheckSheetItem::HIERARCHY_THIRD)
                style="display: none;"
              @endif
            >
              <input
                type="text"
                name="self_check_sheet_items[{{ $loop->index }}][title]"
                placeholder="タイトルを記入してください"
                class="p-inputField--full"
                value="{{ old("self_check_sheet_items." . $loop->index . ".title", $first_self_check_sheet_item->title) }}"
              />
              <x-form.alert type="self_check_sheet_items.{{ $loop->index }}.title" />
            </div>
            <div class="layer2-container">
              <div class="list">
                @foreach($first_self_check_sheet_item->second_self_check_sheet_items as $second_self_check_sheet_item)
                  @include('master.self-check._second', [
                    'first_index' => $loop->parent->index,
                    'second_index' => $loop->index,
                    'second_self_check_sheet_item' => $second_self_check_sheet_item
                  ])
                @endforeach
                @if(old("self_check_sheet_items." . $loop->index . ".self_check_sheet_items"))
                  @foreach(old("self_check_sheet_items." . $loop->index . ".self_check_sheet_items") as $second_self_check_sheet_item)
                    @if($loop->index >= count(data_get($first_self_check_sheet_item, 'second_self_check_sheet_items')))
                      @include('master.self-check._second', [
                        'first_index' => $loop->parent->index,
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
                <a class="c-button c-button--cancel c-button--icon c-button--sm u-w120 delete-layer1">
                  <svg width="11" height="11"><use xlink:href="#delete_btn_round" /></svg>
                  項目を削除
                </a>
              </div>
            </div>
          </div>
        @endforeach
        <div class="p-formBlock__action">
          <a class="c-button c-button--brandPrimary u-w150 add-layer1">
            項目を追加
          </a>
        </div>
      </div>
    </div>
    @include('master.self-check._script_layer')
  </div>
</div>
