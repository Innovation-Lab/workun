<div class="c-tab__head">
  <a
    class="
      c-tab__btn c-tab--01
      @if($type === "answer")
        is-active
      @endif
    "
    href="{{ route('self-check.index') }}"
  >
    <svg width="20" height="20"><use xlink:href="#user" /></svg>
    実施対象
  </a>
  @if(!$show_only_answer)
    <a
      class="
        c-tab__btn c-tab--02
        @if($type === "rating")
          is-active
        @endif
      "
      href="{{ route('self-check.index', ['type' => 'rating']) }}"
    >
      <svg width="20" height="20"><use xlink:href="#check" /></svg>
      評価入力
    </a>
    <a
      class="
        c-tab__btn c-tab--03
        @if($type === "confirm")
          is-active
        @endif
      "
      href="{{ route('self-check.index', ['type' => 'confirm']) }}"
    >
      <svg width="20" height="20"><use xlink:href="#eye-open" /></svg>
      評価承認
    </a>
  @endif
</div>
