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
          value="{{ $department->seq }}"
          step="1" min="1" class="gray" placeholder="1"
        />
        <input
          type="text"
          name="{{ $parent }}[departments][{{ $index }}][name]"
          class="gray"
          value="{{ $department->name }}"
          placeholder="名称を記入"
        />
        <input
          type="hidden"
          name="{{ $parent }}[departments][{{ $index }}][id]"
          value="{{ $department->id }}"
        />
      </div>
    </div>
  </div>
  <div class="layer--container">
    @foreach($department->childDepartments as $childDepartment)
      @include('master.organization._layer_item', [
        'parent' => "{$parent}[departments][{$index}]",
        'index' => $loop->index,
        'department' => $childDepartment
      ])
    @endforeach
  </div>
</div>
