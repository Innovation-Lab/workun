<div class="p-tableBox">
  <div class="p-tableBox__head">
    <div class="mainText">
      <x-self-check-sheet.answer-status
        :status="data_get($selfCheckSheet, 'self_check_rating.status', \App\Models\SelfCheckRating::STATUS_NOT_ANSWERED)"
      />
      <p class="title">
        {{ $selfCheckSheet->display_title }}
      </p>
    </div>
    <div class="comment">
      <svg width="20" height="20"><use xlink:href="#remand_comment" /></svg>
      <p>「チーム活性化行動」に関して再度記入のし直しをお願いします。</p>
    </div>
  </div>

  <div class="p-tableBox__body" style="padding:0">
    <form id="answer_form" method="post">
      @csrf
      {{-- テーブル一覧 --}}
      <div class="p-table__check c-scroll">
        <div class="t-wrapper">
          <table
            id="answer_table"
            class="t-table t-table__narrow"
          >
            <thead>
              <tr>
                <th colspan="3" rowspan="" class="sticky_1 p-table__check--head">
                  <div class="u-pd16">セルフチェック項目</div>
                </th>
                <th colspan="" rowspan="" class="sticky_4 c-border_r2 p-table__check--head2">
                  <div class="u-pd16">確認動画</div>
                </th>
                <th>
                  <div class="cell sticky_5 p-table__check--month c-border_0 u-tac">
                    期間 : {{ $selfCheckSheet->display_period }}
                  </div>
                  <div class="p-table__cell--input">
                    @foreach($selfCheckSheet->months as $month)
                      <div
                        @if($month === $term)
                          id="current_term"
                        @endif
                        class="
                          u-tac c-txt__xs cell
                          @if(
                            $month === $term ||
                            ($month !== $term && !data_get($selfCheckSheet->self_check_rating_histories, $month))
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
                      <td>
                        <div class="p-table__cell--input">
                          @foreach($selfCheckSheet->months as $month)
                            @if($month === $term)
                              <div class="u-flex cell cell--item u-w100">
                                <x-form.select
                                  id=""
                                  class="p-table__cell--select full"
                                  name="self_check_sheet_item[{{ $third_self_check_sheet_item->id }}]"
                                  empty=""
                                  :selects="array_combine(range(5, 1), range(5, 1))"
                                  :value='old("self_check_sheet_item.{$third_self_check_sheet_item->id}", data_get($selfCheckSheet->self_check_rating_histories, "{$month}.details.{$third_self_check_sheet_item->id}.answer", 3))'
                                />
                              </div>
                            @elseif($month !== $term && data_get($selfCheckSheet->self_check_rating_histories, $month))
                              <div class="u-flex u-w140 cell cell--item">
                                <div class="cell--number targeter c-txt__md c-txt__weight--600">
                                  {{ data_get($selfCheckSheet->self_check_rating_histories, "{$month}.details.{$third_self_check_sheet_item->id}.answer", "-") }}
                                </div>
                                <div class="cell--number c-txt__md c-txt__weight--600">
                                  {{ data_get($selfCheckSheet->self_check_rating_histories, "{$month}.details.{$third_self_check_sheet_item->id}.rating", "-") }}
                                </div>
                                <p
                                  class="comment"
                                  data-remodal-target="modal_comment_{{ data_get($selfCheckSheet->self_check_rating_histories, "{$month}.details.{$third_self_check_sheet_item->id}.id") }}"
                                >{{ data_get($selfCheckSheet->self_check_rating_histories, "{$month}.details.{$third_self_check_sheet_item->id}.short_comment") }}</p>
                                @if(data_get($selfCheckSheet->self_check_rating_histories, "{$month}.details.{$third_self_check_sheet_item->id}"))
                                  @include('self-check.components.modal._comment', [
                                    'self_check_rating' => data_get($selfCheckSheet->self_check_rating_histories, $month),
                                    'self_check_rating_detail' => data_get($selfCheckSheet->self_check_rating_histories, "{$month}.details.{$third_self_check_sheet_item->id}"),
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
        </div>
      </div>
      <div class="u-align--end u-pd24">
        <input type="hidden" name="draft" value="" />
        <input
          type="submit"
          class="c-button--text"
          onclick="saveDraft(this)"
          value="下書き保存する"
        />
        <a
          data-remodal-target="modal_submission"
          class="c-button c-button--primary u-w160"
        >
          記入を完了する
        </a>
        <!-- <input type="submit" class="c-button c-button--primary u-w160" value="記入を完了する"> -->
        <!-- <a data-remodal-target="modal_submission" class="c-button c-button--primary u-w160">入力内容を反映する</a> -->
        <!-- <input type="submit" class="c-button c-button--primary u-w160" value="入力内容を反映する"> -->
      </div>
    </form>
  </div>
</div>
@include('self-check.components.modal._submission')
<script>
  function selectReviewer(event, self)
  {
    let image = $(self).data('image')
    let name = $(self).data('name')
    let html = `
<div class="u-align u-gap8 p-user">
  <div
    class="p-user__image"
    style='background-image:url(${image})'
  ></div>
  <div class="p-user__text">
    <span class="label">評価者</span>
    <p>${name}</p>
  </div>
</div>`
    $("#selected_reviewer").html(html)
    $('.p-check__select').removeClass('is-open')
    event.stopPropagation()
  }
  function saveDraft(self)
  {
    $(self).prop('disabled', true)
    $("#answer_form [name=draft]").val(1)
    $("#answer_form").submit()
  }
  function saveAnswer(self)
  {
    let reviewer_id = $("#answer_form [name=reviewer_id]:checked").val()
    if (!reviewer_id) {
      alert("評価者を選択してください。")
    } else {
      $(self).prop('disabled', true)
      $("#answer_form [name=draft]").val("")
      $("#answer_form").submit()
    }
  }
</script>
