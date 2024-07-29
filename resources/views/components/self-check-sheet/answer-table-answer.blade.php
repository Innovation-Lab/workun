@foreach($months as $month)
  @if($month === $term)
    <div class="u-flex cell cell--item u-w100">
      <x-form.select
        id=""
        class="p-table__cell--select full"
        name="self_check_sheet_item[{{ $selfCheckSheetItem->id }}]"
        empty=""
        :selects="array_combine(range(5, 1), range(5, 1))"
        :value='old("self_check_sheet_item.{$selfCheckSheetItem->id}", data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.answer", 3))'
      />
    </div>
  @elseif($month !== $term && data_get($selfCheckRatingHistories, $month))
    <div class="u-flex u-w140 cell cell--item">
      <div class="cell--number targeter c-txt__md c-txt__weight--600">
        {{ data_get($selfCheckRatingHistories, "{$month}.details.{$selfCheckSheetItem->id}.answer", "-") }}
      </div>
      <div class="cell--number c-txt__md c-txt__weight--600">
        {{ data_get($selfCheckRatingHistories, "{$month}.details.{$selfCheckSheetItem->id}.rating", "-") }}
      </div>
      <p
        class="comment"
        data-remodal-target="modal_comment_{{ data_get($selfCheckRatingHistories, "{$month}.details.{$selfCheckSheetItem->id}.id") }}"
      >{{ data_get($selfCheckRatingHistories, "{$month}.details.{$selfCheckSheetItem->id}.short_comment") }}</p>
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
