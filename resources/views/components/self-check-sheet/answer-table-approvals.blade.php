@foreach($selfCheckRatings as $selfCheckRating)
  <div class="u-flex u-w140 cell cell--item">
    <div class="cell--number targeter c-txt__md c-txt__weight--600">
      {{ data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.answer", '-') }}
    </div>
    <div class="cell--number c-txt__md c-txt__weight--600">
      {{ data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.rating", '-') }}
    </div>
    <p
      class="
        comment
        @if(!data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.short_comment"))
          c-noData
        @endif
      "
      data-remodal-target="modal_comment_{{ data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.id") }}"
    >{{ data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}.short_comment", '-') }}</p>
    @if(data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}"))
      @include('self-check.components.modal._comment', [
        'self_check_rating' => $selfCheckRating,
        'self_check_rating_detail' => data_get($selfCheckRating, "details.{$selfCheckSheetItem->id}"),
      ])
    @endif
  </div>
@endforeach
