<li
  class="p-todo__item p-todo__item--{{ $selfCheckSheet->list_class }}"
>
  <a href="{{ route('self-check.' . $selfCheckSheet->action_type, [
    'selfCheckSheet' => $selfCheckSheet,
    'term' => $term
  ]) }}"></a>
  <span class="date">
    {{ $selfCheckSheet->display_period_for_task }}
  </span>
  <div class="mainInfo">
    <span
      class="c-status c-status--{{ $selfCheckSheet->status_class }}"
    >
      @if($title === '評価承認')
        {{--  完了数/全シート数  --}}
        {{ number_format($selfCheckSheet->approved_target_count) }} /
        {{ number_format($selfCheckSheet->all_target_count) }}
      @else
        {{ $selfCheckSheet->display_status }}
      @endif
    </span>
    <p class="title">
      {{ $selfCheckSheet->display_title }}
    </p>
  </div>
  <p class="name">
    対象期間 : {{ $selfCheckSheet->sub_title }}
  </p>
</li>
