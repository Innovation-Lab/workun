<!-- 本日のタスク -->
<div class="p-todo">
  <div class="p-todo__head">
    <div class="p-todo__text">
      <p class="title">TODO</p>
      <p class="desc">以下のタスクを完了させましょう</p>
    </div>
    <?php
      $url = $_SERVER['REQUEST_URI'];
    ?>
    @if(!strstr($url,'self-check'))
      <div class="p-todo__action">
        <a href="" class="c-button c-button--brandPrimary">全ての人事務を評価</a>
      </div>
    @else
    @endif
  </div>
  <div class="p-todo__body">
    @foreach ([
      '実施対象' => $answer_self_check_sheets,
      '評価入力' => $rating_self_check_sheets,
      '評価承認' => $approving_self_check_sheets
    ] as $title => $sheets)
      @if(!$show_only_answer || $title === '実施対象')
        <div class="p-todo__block">
          <p class="title">{{ $title }}</p>
          <ul class="p-todo__list">
            @foreach ($sheets as $sheet)
              <li class="p-todo__item p-todo__item--{{ data_get($sheet, 'rating.status_css', 'alert') }}">
                <a href="{{ route('self-check.' . $sheet->action_type, [
                  'selfCheckSheet' => $sheet,
                  'term' => $term
                ]) }}"></a>
                <span class="date">
                  {{ $sheet->display_period_for_todo_task }}
                </span>
                <div class="mainInfo">
                  <span class="c-status c-status--paused">
                    @if($title === '評価承認')
                      {{--  完了数/全シート数  --}}
                      {{ number_format($sheet->approved_target_count) }} /
                      {{ number_format($sheet->all_target_count) }}
                    @else
                      {{--  ステータス  --}}
                      <x-self-check-sheet.answer-status
                        :status="data_get($sheet, 'rating.status', \App\Models\SelfCheckRating::STATUS_NOT_ANSWERED)"
                      />
                    @endif
                  </span>
                  <p class="title">
                    セルフチェック - {{ $sheet->display_title }}
                  </p>
                </div>
                <p class="name">
                  対象期間 : {{ $sheet->display_term_for_todo_task }}
                </p>
              </li>
            @endforeach
            @if($sheets->isEmpty())
              <li class="p-todo__item p-todo__item--clean">
                <p class="u-tac">{{ $title }}タスクは0件です</p>
              </li>
            @endif
          </ul>
        </div>
      @endif
    @endforeach
  </div>
</div>
