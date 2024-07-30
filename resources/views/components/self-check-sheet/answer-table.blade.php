<table
  id="answer_table"
  class="t-table t-table__narrow"
>
  <thead>
    <tr>
      <th colspan="3" rowspan="" class="sticky_1 p-table__check--head">
        <div class="u-pd16">セルフチェック項目</div>
      </th>
      @if($type === "answer")
        <th colspan="" rowspan="" class="sticky_4 c-border_r2 p-table__check--head2">
          <div class="u-pd16">確認動画</div>
        </th>
      @endif
      @switch($type)
        @case("answer")
        @case("rating")
          <th>
            <div class="cell sticky_5 p-table__check--month c-border_0 u-tac">
              期間 : {{ $selfCheckSheet->display_period }}
            </div>
            <div class="p-table__cell--input">
              @foreach($months as $month)
                <div
                  @if($month === $term)
                    id="current_term"
                  @endif
                  class="
                u-tac c-txt__xs cell
                @if(
                  $month === $term ||
                  ($month !== $term && !data_get($selfCheckRatingHistories, $month))
                )
                  u-w100
                @else
                  u-w140
                @endif
              "
                >
                  <strong class="c-txt__lg c-txt__weight--700">
                    {{ date('n', strtotime("{$month}-01")) }}
                  </strong>月
                </div>
              @endforeach
            </div>
          </th>
          @break
        @case("approvals")
          <th>
            <div class="cell sticky_4 p-table__check--month c-border_0">
              <div class="u-align between">
                <button
                  type="button"
                  class="c-txt__weight--700"
                  onclick="window.location.href = '{{ route('self-check.approvals', [
                    'selfCheckSheet' => $selfCheckSheet,
                    'term' => date('Y-m', strtotime("{$term}-01 -1 month")),
                  ]) }}'"
                >
                  <svg width="20" height="20"><use xlink:href="#chevron_left" /></svg>
                  {{ date('n', strtotime("{$term}-01 -1 month")) }}
                  <small class="c-txt__min">月</small>
                </button>
                <p class="u-tac c-txt__xs">
                  <strong class="c-txt__lg c-txt__weight--700">
                    {{ date('n', strtotime("{$term}-01")) }}
                  </strong>月
                </p>
                <button
                  type="button"
                  class="c-txt__weight--700"
                  onclick="window.location.href = '{{ route('self-check.approvals', [
                    'selfCheckSheet' => $selfCheckSheet,
                    'term' => date('Y-m', strtotime("{$term}-01 +1 month")),
                  ]) }}'"
                >
                  {{ date('n', strtotime("{$term}-01 +1 month")) }}
                  <small class="c-txt__min">月</small>
                  <svg width="20" height="20"><use xlink:href="#chevron_right" /></svg>
                </button>
              </div>
            </div>
            <div class="p-table__cell--input">
              @foreach($selfCheckRatings as $selfCheckRating)
                <div class="cell u-w140 u-tac c-txt__xs">
                  <a
                    data-remodal-target="modal_selfCheck"
                    class="name"
                  >
                    {{ data_get($selfCheckRating, 'user.full_name') }}
                  </a>
                </div>
              @endforeach
            </div>
          </th>
          @break
      @endswitch
    </tr>
  </thead>
  <tbody>
    @foreach($selfCheckSheet->first_self_check_sheet_items as $first_self_check_sheet_item)
      @foreach($first_self_check_sheet_item->second_self_check_sheet_items as $second_self_check_sheet_item)
        @foreach($second_self_check_sheet_item->third_self_check_sheet_items as $third_self_check_sheet_item)
          <tr>
            @if($loop->parent->index < 1 && $loop->index < 1)
              <th
                rowspan="{{ $first_self_check_sheet_item->rowspan }}"
                class="u-w100 sticky_1"
                @if($selfCheckSheet->hierarchy < \App\Models\SelfCheckSheet::HIERARCHY_TRIPLE)
                  style="display: none;"
                @endif
              >
                {{ $first_self_check_sheet_item->title }}
              </th>
            @endif
            @if($loop->index < 1)
              <th
                rowspan="{{ $second_self_check_sheet_item->rowspan }}"
                class="u-w140 sticky_2"
                @if($selfCheckSheet->hierarchy < \App\Models\SelfCheckSheet::HIERARCHY_TWICE)
                  style="display: none;"
                @endif
              >
                {{ $second_self_check_sheet_item->title }}
              </th>
            @endif
            <th class="u-w300 sticky_3">
              <p class="c-txt__xs">
                {{ $third_self_check_sheet_item->title }}
              </p>
            </th>
            @if($type === "answer")
              <th class="u-w200 sticky_4 c-border_r2">
                @if($third_self_check_sheet_item->movie_url)
                  <a
                    class="c-button--underline"
                    href="{{ $third_self_check_sheet_item->movie_url }}"
                    target="_blank"
                  >
                    {{ data_get($third_self_check_sheet_item, 'movie_title', '-') }}
                  </a>
                @endif
              </th>
            @endif
            <td>
              <div class="p-table__cell--input">
                @switch($type)
                  @case("answer")
                    <x-self-check-sheet.answer-table-answer
                      :months="$months"
                      :term="$term"
                      :selfCheckSheetItem="$third_self_check_sheet_item"
                      :selfCheckRating="$selfCheckRating"
                      :selfCheckRatingHistories="$selfCheckRatingHistories"
                    />
                    @break
                  @case("rating")
                    <x-self-check-sheet.answer-table-rating
                      :months="$months"
                      :term="$term"
                      :selfCheckSheetItem="$third_self_check_sheet_item"
                      :selfCheckRating="$selfCheckRating"
                      :selfCheckRatingHistories="$selfCheckRatingHistories"
                    />
                    @break
                  @case("approvals")
                    <x-self-check-sheet.answer-table-approvals
                      :selfCheckSheetItem="$third_self_check_sheet_item"
                      :selfCheckRatings="$selfCheckRatings"
                    />
                    @break
                @endswitch
              </div>
            </td>
          </tr>
        @endforeach
      @endforeach
    @endforeach
  </tbody>
</table>
