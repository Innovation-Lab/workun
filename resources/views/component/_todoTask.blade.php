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
      <a href="" class="c-button c-button--brandPrimary">全ての人事業務を評価</a>
    </div>
    @else
    @endif
  </div>
  <div class="p-todo__body">
    @foreach ([
      '実施対象',
      '評価入力',
      '評価承認',
    ] as $key => $todoBlock)
    <div class="p-todo__block">
      <p class="title">{!! $todoBlock; !!}</p>
      <ul class="p-todo__list">
        <!-- 実施対象 -->
        @if($key == 0)
        <!-- 下書き中 / 未登録アラート -->
        <li class="p-todo__item p-todo__item--alert">
          <a href=""></a>
          <span class="date">2024.12.01 - 2024.12.08</span>
          <div class="mainInfo">
            <span class="c-status c-status--paused">下書き</span>
            <p class="title">未登録 : セルフチェック - 2024年10月</p>
          </div>
          <p class="name">第8期 | 基本挨拶、身だしなみセルフチェック表</p>
        </li>
        <!-- 通常 -->
        <li class="p-todo__item">
          <a href=""></a>
          <span class="date">2024.12.01 - 2024.12.08</span>
          <div class="mainInfo">
            <span class="c-status c-status--waiting">未登録</span>
            <p class="title">セルフチェック - 2024年11月</p>
          </div>
          <p class="name">第8期 | 基本挨拶、身だしなみセルフチェック表</p>
        </li>
        @endif
        <!-- 評価入力 -->
        @if($key == 1)
        <li class="p-todo__item p-todo__item--assessment">
          <a href=""></a>
          <span class="date">2024.12.01 - 2024.12.08</span>
          <div class="mainInfo">
            <span class="c-status c-status--assessment">評価待ち</span>
            <p class="title">セルフチェック - 2024年11月</p>
          </div>
          <p class="name">第8期 | 基本挨拶、身だしなみセルフチェック表</p>
        </li>
        @endif
        <!-- 評価承認 -->
        @if($key == 2)
        <li class="p-todo__item p-todo__item--clean">
          <p class="u-tac">{!! $todoBlock; !!}タスクは0件です</p>
        </li>
        @endif
      </ul>
    </div>
    @endforeach
  </div>
</div>
