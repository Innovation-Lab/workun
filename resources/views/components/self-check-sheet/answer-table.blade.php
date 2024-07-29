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
                @foreach($months as $month)
                  @if($month === $term)
                    @if($type === "answer")
                      <div class="u-flex cell cell--item u-w100">
                        <x-form.select
                          id=""
                          class="p-table__cell--select full"
                          name="self_check_sheet_item[{{ $third_self_check_sheet_item->id }}]"
                          empty=""
                          :selects="array_combine(range(5, 1), range(5, 1))"
                          :value='old("self_check_sheet_item.{$third_self_check_sheet_item->id}", data_get($selfCheckRating, "details.{$third_self_check_sheet_item->id}.answer", 3))'
                        />
                      </div>
                    @elseif($type === "rating")
                      <div class="u-flex u-w140 cell cell--item currentMonth">
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">
                          {{ data_get($selfCheckRating, "details.{$third_self_check_sheet_item->id}.answer", '-') }}
                        </div>
                        <div class="cell--number c-txt__md c-txt__weight--600">
                          <x-form.select
                            id=""
                            class="p-table__cell--select full"
                            name="self_check_sheet_item[{{ $third_self_check_sheet_item->id }}][rating]"
                            empty=""
                            :selects="array_combine(range(5, 1), range(5, 1))"
                            :value='old(
                              "self_check_sheet_item.{$third_self_check_sheet_item->id}.rating",
                              data_get($selfCheckRating, "details.{$third_self_check_sheet_item->id}.rating", 3) !== 0 ?
                              data_get($selfCheckRating, "details.{$third_self_check_sheet_item->id}.rating", 3) :
                              3
                            )'
                          />
                        </div>
                        <p
                          id="p_self_check_sheet_item_comment_{{ $third_self_check_sheet_item->id }}"
                          class="
                            comment
                            @if(!old("self_check_sheet_item.{$third_self_check_sheet_item->id}.comment", data_get($selfCheckRating, "details.{$third_self_check_sheet_item->id}.comment")))
                              c-empty
                            @endif
                          "
                          data-remodal-target="modal_commentForm_{{ $third_self_check_sheet_item->id }}"
                        >{{ old("self_check_sheet_item.{$third_self_check_sheet_item->id}.comment", data_get($selfCheckRating, "details.{$third_self_check_sheet_item->id}.comment", '備考があれば記入')) }}</p>
                        <input
                          id="input_self_check_sheet_item_comment_{{ $third_self_check_sheet_item->id }}"
                          type="hidden"
                          name="self_check_sheet_item[{{ $third_self_check_sheet_item->id }}][comment]"
                          value="{{ old("self_check_sheet_item.{$third_self_check_sheet_item->id}.comment", data_get($selfCheckRating, "details.{$third_self_check_sheet_item->id}.comment")) }}"
                        />
                        @include('self-check.components.modal._comment_form', [
                          'self_check_rating' => $selfCheckRating,
                          'self_check_rating_detail' => data_get($selfCheckRating, "details.{$third_self_check_sheet_item->id}"),
                        ])
                      </div>
                    @endif
                  @elseif($month !== $term && data_get($selfCheckRatingHistories, $month))
                    <div class="u-flex u-w140 cell cell--item">
                      @if($type === "answer")
                        <div class="cell--number targeter c-txt__md c-txt__weight--600">
                          {{ data_get($selfCheckRatingHistories, "{$month}.details.{$third_self_check_sheet_item->id}.answer", "-") }}
                        </div>
                        <div class="cell--number c-txt__md c-txt__weight--600">
                          {{ data_get($selfCheckRatingHistories, "{$month}.details.{$third_self_check_sheet_item->id}.rating", "-") }}
                        </div>
                      @elseif($type === "rating")
                        <div class="cell--number full c-txt__md c-txt__weight--600">
                          {{ data_get($selfCheckRatingHistories, "{$month}.details.{$third_self_check_sheet_item->id}.rating", "-") }}
                        </div>
                      @endif
                      <p
                        class="comment"
                        data-remodal-target="modal_comment_{{ data_get($selfCheckRatingHistories, "{$month}.details.{$third_self_check_sheet_item->id}.id") }}"
                      >{{ data_get($selfCheckRatingHistories, "{$month}.details.{$third_self_check_sheet_item->id}.short_comment") }}</p>
                      @if(data_get($selfCheckRatingHistories, "{$month}.details.{$third_self_check_sheet_item->id}"))
                        @include('self-check.components.modal._comment', [
                          'self_check_rating' => data_get($selfCheckRatingHistories, $month),
                          'self_check_rating_detail' => data_get($selfCheckRatingHistories, "{$month}.details.{$third_self_check_sheet_item->id}"),
                        ])
                      @endif
                    </div>
                  @else
                    <div class="u-flex cell cell--item u-w100"></div>
                  @endif
                @endforeach
              </div>
            </td>
          </tr>
        @endforeach
      @endforeach
    @endforeach
  </tbody>
</table>
