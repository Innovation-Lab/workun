@foreach($months as $month)
  @if(
    $month === $term &&
    $selfCheckRating->status == App\Models\SelfCheckRating::STATUS_RATING
  )
    <div class="u-flex u-w140 cell cell--item currentMonth">
      <div class="cell--number targeter c-txt__md c-txt__weight--600">
        {{ data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.answer", '-') }}
      </div>
      <div class="cell--number c-txt__md c-txt__weight--600">
        <x-form.select
          id=""
          class="p-table__cell--select full"
          name="self_check_sheet_item[{{ $selfCheckSheetItem->id }}][rating]"
          empty=""
          :selects="array_combine(range(5, 1), range(5, 1))"
          :value='old(
            "self_check_sheet_item.{$selfCheckSheetItem->id}.rating",
            data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.rating", 3) !== 0 ?
            data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.rating", 3) :
            3
          )'
        />
      </div>
      <p
        id="p_self_check_sheet_item_comment_{{ $selfCheckSheetItem->id }}"
        class="
          comment
          @if(!old("self_check_sheet_item.{$selfCheckSheetItem->id}.comment", data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.comment")))
            c-empty
          @endif
        "
        data-remodal-target="modal_commentForm_{{ $selfCheckSheetItem->id }}"
      >{{ old("self_check_sheet_item.{$selfCheckSheetItem->id}.comment", data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.comment", '備考があれば記入')) }}</p>
      <input
        id="input_self_check_sheet_item_comment_{{ $selfCheckSheetItem->id }}"
        type="hidden"
        name="self_check_sheet_item[{{ $selfCheckSheetItem->id }}][comment]"
        value="{{ old("self_check_sheet_item.{$selfCheckSheetItem->id}.comment", data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.comment")) }}"
      />
      @include('self-check.components.modal._comment_form', [
        'self_check_sheet_item' => $selfCheckSheetItem,
        'self_check_rating' => $selfCheckRating,
        'self_check_rating_detail' => data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}"),
      ])
    </div>
  @elseif(data_get($selfCheckRatingHistories, $month))
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
