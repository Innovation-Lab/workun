<div class="layer--item">
  <div class="p-inputField p-inputField--organization">
    <div class="item js-clearableRadio">
      <div class="item--checkbox">
        <label class="round">
          <input
            type="radio"
            name="organization"
            data-name="{{ $parent }}[departments][{{ $index }}]"
            data-parent="{{ $parent }}"
            onclick="toggleButtonsBasedOnCheckbox()"
          />
        </label>
      </div>
      <div class="item--input">
        <span class="label">順序</span>
        <input
          type="number"
          name="{{ $parent }}[departments][{{ $index }}][seq]"
          value="{{ old(preg_replace('/\[(.*?)\]/', '.$1', $parent) . '.departments.' . $index . '.seq', $department->seq) }}"
          step="1" min="1" class="gray" placeholder="1"
        />
        <input
          type="text"
          name="{{ $parent }}[departments][{{ $index }}][name]"
          class="gray"
          value="{{ old(preg_replace('/\[(.*?)\]/', '.$1', $parent) . '.departments.' . $index . '.name', $department->name) }}"
          placeholder="名称を記入"
        />
        <input
          type="hidden"
          name="{{ $parent }}[departments][{{ $index }}][id]"
          value="{{ isset($department->id) ? $department->id : '' }}"
        />
        <input
          type="hidden"
          class="delete"
          name="{{ $parent }}[departments][{{ $index }}][delete]"
          value=""
        />
      </div>
      {{-- TODO: エラーメッセージのスタイルを調整 --}}
      {{--  エラーメッセージを表示 --}}
      <x-form.alert type="{{ $parent }}.departments.{{ $index }}.seq" />
      <x-form.alert type="{{ $parent }}.departments.{{ $index }}.name" />
    </div>
  </div>
  <div class="layer--container">
    @if(old('departments'))
      @if (isset($department->departments) && $department->departments)
        @foreach($department->departments as $childDepartment)
          @include('master.organization._layer_item', [
            'parent' => "{$parent}[departments][{$index}]",
            'index' => $loop->index,
            'department' => (object) $childDepartment
          ])
        @endforeach
      @endif
    @else
      @foreach($department->childDepartments as $childDepartment)
        @include('master.organization._layer_item', [
          'parent' => "{$parent}[departments][{$index}]",
          'index' => $loop->index,
          'department' => $childDepartment
        ])
      @endforeach
    @endif
  </div>
</div>
