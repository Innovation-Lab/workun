@foreach($months as $month)
  @if($month === $term)
    <div class="u-flex u-w140 cell cell--item currentMonth">
      <div class="cell--number targeter c-txt__md c-txt__weight--600">
        {{ data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.answer", '-') }}
      </div>
      <div class="cell--number c-txt__md c-txt__weight--600">
        {{ data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.rating", '-') }}
      </div>
      <p
        id="p_self_check_sheet_item_comment_{{ $selfCheckSheetItem->id }}"
        class="
          comment
          @if(!data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.comment"))
            c-noData
          @endif
        "
        data-remodal-target="modal_comment_{{ data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.id") }}"
      >{{ old("self_check_sheet_item.{$selfCheckSheetItem->id}.comment", data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.comment", "-")) }}</p>
      @include('self-check.components.modal._comment', [
        'self_check_rating' => $selfCheckRating,
        'self_check_rating_detail' => data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}"),
      ])
    </div>
  @elseif($month !== $term && data_get($selfCheckRatingHistories, $month))
    <div class="u-flex u-w140 cell cell--item">
      <div class="cell--number full c-txt__md c-txt__weight--600">
        {{ data_get($selfCheckRatingHistories, "{$month}.details.{$selfCheckSheetItem->id}.rating", "-") }}
      </div>
      <p
        class="
          comment
          @if(!data_get($selfCheckRatingHistories, "{$month}.details.{$selfCheckSheetItem->id}.short_comment"))
            c-noData
          @endif
        "
        data-remodal-target="modal_comment_{{ data_get($selfCheckRatingHistories, "{$month}.details.{$selfCheckSheetItem->id}.id") }}"
      >{{ data_get($selfCheckRatingHistories, "{$month}.details.{$selfCheckSheetItem->id}.short_comment", "-") }}</p>
      @if(data_get($selfCheckRatingHistories, "{$month}.details.{$selfCheckSheetItem->id}"))
        @include('self-check.components.modal._comment', [
          'self_check_rating' => data_get($selfCheckRatingHistories, $month),
          'self_check_rating_detail' => data_get($selfCheckRatingHistories, "{$month}.details.{$selfCheckSheetItem->id}"),
        ])
      @endif
    </div>
  @else
    <div class="u-flex cell cell--item u-w100"></div>
  @endif
@endforeach
