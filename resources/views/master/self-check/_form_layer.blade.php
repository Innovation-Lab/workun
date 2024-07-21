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
          <div class="layer1">
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
              @foreach($first_self_check_sheet_item->scecond_self_check_sheet_items as $scecond_self_check_sheet_item)
                <div class="layer2">
                  <label class="label md navy layer--label" for="">階層2</label>
                  <div class="layer--item ">
                    <input
                      type="text"
                      name="self_check_sheet_items[{{ $loop->parent->index }}][self_check_sheet_items][{{ $loop->index }}][title]"
                      placeholder="タイトルを記入してください"
                      class="p-inputField--full"
                      value="{{ old("self_check_sheet_items." . $loop->parent->index . ".self_check_sheet_items." . $loop->index . ".title", $scecond_self_check_sheet_item->title) }}"
                    />
                    <x-form.alert type="self_check_sheet_items.{{ $loop->parent->index }}.self_check_sheet_items.{{ $loop->index }}.title" />
                  </div>
                  <div class="layer3-container">
                    @foreach($scecond_self_check_sheet_item->third_self_check_sheet_items as $third_self_check_sheet_item)
                      <div class="layer3">
                        <label class="label md navy layer--label" for="">階層3</label>
                        <div class="layer--item active">
                          <input
                            type="text"
                            name="self_check_sheet_items[{{ $loop->parent->parent->index }}][self_check_sheet_items][{{ $loop->parent->index }}][self_check_sheet_items][{{ $loop->index }}][title]"
                            placeholder="タイトルを記入してください"
                            class="p-inputField--full"
                            value="{{ old("self_check_sheet_items." . $loop->parent->parent->index . ".self_check_sheet_items." . $loop->parent->index . ".self_check_sheet_items." . $loop->index . ".title", $third_self_check_sheet_item->title) }}"
                          />
                          <input
                            type="text"
                            name="self_check_sheet_items[{{ $loop->parent->parent->index }}][self_check_sheet_items][{{ $loop->parent->index }}][self_check_sheet_items][{{ $loop->index }}][movie_title]"
                            placeholder="動画タイトル"
                            class="video"
                            value="{{ old("self_check_sheet_items." . $loop->parent->parent->index . ".self_check_sheet_items." . $loop->parent->index . ".self_check_sheet_items." . $loop->index . ".movie_title", $third_self_check_sheet_item->movie_title) }}"
                          />
                          <input
                            type="url"
                            name="self_check_sheet_items[{{ $loop->parent->parent->index }}][self_check_sheet_items][{{ $loop->parent->index }}][self_check_sheet_items][{{ $loop->index }}][movie_url]"
                            placeholder="動画URL"
                            class="video"
                            value="{{ old("self_check_sheet_items." . $loop->parent->parent->index . ".self_check_sheet_items." . $loop->parent->index . ".self_check_sheet_items." . $loop->index . ".movie_url", $third_self_check_sheet_item->movie_url) }}"
                          />
                          <div>
                            <x-form.alert type="self_check_sheet_items.{{ $loop->parent->parent->index }}.self_check_sheet_items.{{ $loop->parent->index }}.self_check_sheet_items.{{ $loop->index }}.title" />
                            <x-form.alert type="self_check_sheet_items.{{ $loop->parent->parent->index }}.self_check_sheet_items.{{ $loop->parent->index }}.self_check_sheet_items.{{ $loop->index }}.movie_title" />
                            <x-form.alert type="self_check_sheet_items.{{ $loop->parent->parent->index }}.self_check_sheet_items.{{ $loop->parent->index }}.self_check_sheet_items.{{ $loop->index }}.movie_url" />
                          </div>
                        </div>
                        <div class="p-formBlock__action">
                          <a class="c-button c-button--cancel c-button--icon c-button--xs u-w120 delete-layer3">
                            <svg width="11" height="2"><use xlink:href="#delete_btn_round"></use></svg>
                            階層3を削除
                          </a>
                        </div>
                      </div>
                    @endforeach
                    <div class="p-formBlock__action">
                      <a class="c-button c-button--brandPrimary c-button--icon c-button--xs u-w120 add-layer3">
                        <svg width="11" height="11"><use xlink:href="#add_btn_round"></use></svg>
                        階層3を追加
                      </a>
                      <a class="c-button c-button--cancel c-button--icon c-button--xs u-w120 delete-layer2">
                        <svg width="11" height="2"><use xlink:href="#delete_btn_round"></use></svg>
                        階層2を削除
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
              <div class="p-formBlock__action">
                <a class="c-button c-button--brandPrimary c-button--icon c-button--sm u-w120 add-layer2">
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
{{--        <?php  for($p = 1; $p < 4; $p++){ ?>--}}
{{--          <div class="layer1">--}}
{{--            <label class="label md navy" for="">項目<?php echo $p; ?></label>--}}
{{--            <div class="layer--item">--}}
{{--              <input type="text" placeholder="タイトルを記入してください" class="p-inputField--full">--}}
{{--              <input type="text" placeholder="動画タイトル" class="video">--}}
{{--              <input type="url" placeholder="動画URLを設置" class="video">--}}
{{--            </div>--}}
{{--            <div class="layer2-container"></div>--}}
{{--            <div class="p-formBlock__action">--}}
{{--              <a class="c-button c-button--brandPrimary c-button--icon c-button--sm u-w120 add-layer2">--}}
{{--                <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg>--}}
{{--                階層2を追加--}}
{{--              </a>--}}
{{--              <a class="c-button c-button--cancel c-button--icon c-button--sm u-w120 delete-layer1">--}}
{{--                <svg width="11" height="11"><use xlink:href="#delete_btn_round" /></svg>--}}
{{--                項目を削除--}}
{{--              </a>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        <?php } ?>--}}
      </div>
    </div>
    @include('master.self-check._script_layer')
  </div>
</div>
