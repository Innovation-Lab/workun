<!-- 本日のタスク -->
<div class="p-todo">
  <div class="p-todo__head">
    <div class="p-todo__text">
      <p class="title">TODO</p>
      <p class="desc">以下のタスクを完了させましょう</p>
    </div>
    {{-- TODO: セルフチェックシート以外のページで使用するかわからない為一旦コメントアウト --}}
    {{--  <?php
      $url = $_SERVER['REQUEST_URI'];
    ?>
    @if(!strstr($url,'self-check'))
      <div class="p-todo__action">
        <a
          href="{{route('self-check.index')}}"
          class="c-button c-button--brandPrimary"
        >
          全ての人事務を評価
        </a>
      </div>
    @endif  --}}
  </div>
  <div class="p-todo__body">
    @foreach ([
      '実施対象' => $answer_self_check_sheets,
      '評価入力' => $rating_self_check_sheets,
      '評価承認' => $approving_self_check_sheets
    ] as $title => $sheets)
      @if(!$show_only_answer || $title === '実施対象')
        <div class="p-todo__block">
          <p class="title">
            {{ $title }}
          </p>
          <ul class="p-todo__list">
            @foreach ($sheets as $self_check_sheet)
              {{--  タスクリストを取得  --}}
              <x-task-list
                :selfCheckSheet="$self_check_sheet"
                :term="$term"
                :title="$title"
              />
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
