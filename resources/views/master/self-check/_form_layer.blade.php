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
        :value="old('hierarchy', data_get($selfCheckSheet, 'hierarchy', \App\Models\SelfCheckSheet::HIERARCHY_TRIPLE))"
      />
      <x-form.alert type="hierarchy" />
    </div>
  </div>
  <div class="p-formBlock__body">
    <div class="p-formBlock__form">
      <div class="p-inputField p-inputField--sheetItem p-inputField--full layer1-container">
        <div class="list">
          @foreach($selfCheckSheet->first_self_check_sheet_items as $first_self_check_sheet_item)
            @include('master.self-check._first', [
              'hierarchy' => old('hierarchy', data_get($selfCheckSheet, 'hierarchy', \App\Models\SelfCheckSheet::HIERARCHY_TRIPLE)),
              'first_index' => $loop->index,
              'first_self_check_sheet_item' => $first_self_check_sheet_item
            ])
          @endforeach
          @if(old("self_check_sheet_items"))
            @foreach(old("self_check_sheet_items") as $first_self_check_sheet_item)
              @if($loop->index >= count(data_get($selfCheckSheet, 'first_self_check_sheet_items', [])))
                @include('master.self-check._first', [
                  'hierarchy' => old('hierarchy', data_get($selfCheckSheet, 'hierarchy', \App\Models\SelfCheckSheet::HIERARCHY_TRIPLE)),
                  'first_index' => $loop->index,
                  'first_self_check_sheet_item' => $first_self_check_sheet_item
                ])
              @endif
            @endforeach
          @endif
        </div>
        <div class="p-formBlock__action">
          <a
            onclick="addFirst(this)"
            class="c-button c-button--brandPrimary u-w150 add-layer1"
          >
            項目を追加
          </a>
        </div>
      </div>
    </div>
    @include('master.self-check._script_layer')
  </div>
</div>
