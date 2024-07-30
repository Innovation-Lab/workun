<div class="p-tableBox">
  <div class="p-tableBox__head">
    <div class="mainText">
      <x-self-check-sheet.answer-status
        :status="data_get($selfCheckRating, 'status', \App\Models\SelfCheckRating::STATUS_NOT_ANSWERED)"
      />
      <p class="title">
        {{ $selfCheckSheet->display_title }}
      </p>
    </div>
    @if($selfCheckRating->remand_flag)
      <div class="comment">
        <svg width="20" height="20"><use xlink:href="#remand_comment" /></svg>
        <p>{{ $selfCheckRating->remand_reason }}</p>
      </div>
    @endif
  </div>

  <div class="p-tableBox__body" style="padding:0">
    <form id="answer_form" method="post">
      @csrf
      {{-- テーブル一覧 --}}
      <div class="p-table__check c-scroll">
        <div class="t-wrapper">
          <x-self-check-sheet.answer-table
            type="answer"
            :selfCheckSheet="$selfCheckSheet"
            :term="$term"
            :user="$user"
            :selfCheckRating="$selfCheckRating"
          />
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
