<div class="p-formBlock__form">
  <div class="p-inputField p-inputField--full row">
    <label class="label" for="">名称</label>
    <div class="u-w370">
      <input
        type="text"
        name="name"
        placeholder="2024年 通常通期"
        value="{{ old('name', $period->name) }}"
      />
    </div>
    <x-form.alert type="name" />
  </div>
  <div class="p-inputField p-inputField--full row">
    <label class="label" for="">評価開始年月</label>
    <select name="start" class="u-w190">
      @foreach($month_list as $month_key => $month_label)
        <option
          value="{{ $month_key }}"
          @if(old('start', $period->start) === $month_key)
            selected
          @endif
        >
          {{ $month_label }}
        </option>
        @if($month_key === date('Y-m', strtotime(date('Y-m'))))
          <option
            value=""
            @if(!old('start', $period->start))
              selected
            @endif
          >
            評価開始年月を選択
          </option>
        @endif
      @endforeach
    </select>
    <x-form.alert type="start" />
  </div>
  <div class="p-inputField p-inputField--full row">
    <label class="label" for="">評価終了年月</label>
    <select name="end" class="u-w190">
      @foreach($month_list as $month_key => $month_label)
        <option
          value="{{ $month_key }}"
          @if(old('end', $period->end) === $month_key)
            selected
          @endif
        >
          {{ $month_label }}
        </option>
        @if($month_key === date('Y-m', strtotime(date('Y-m'))))
          <option
            value=""
            @if(!old('end', $period->end))
              selected
            @endif
          >
            評価終了年月を選択
          </option>
        @endif
      @endforeach
    </select>
    <x-form.alert type="end" />
  </div>
</div>
