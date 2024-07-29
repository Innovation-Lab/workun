<div class="p-tableBox">
  <div class="p-tableBox__head between">
    <div class="mainText">
      <p class="title">
        {{ date('Y年m月', strtotime("{$selfCheckRating->target}-01")) }}
        評価入力 : {{ $selfCheckSheet->display_title }}
      </p>
    </div>
  </div>

  <div class="p-tableBox__body" style="padding:0">
    <form id="rating_form" method="post">
      @csrf
      {{-- テーブル一覧 --}}
      <div class="p-table__check c-scroll">
        <div class="t-wrapper">
          <x-self-check-sheet.answer-table
            type="rating"
            :selfCheckSheet="$selfCheckSheet"
            :term="$selfCheckRating->target"
            :user="$selfCheckRating->user"
            :selfCheckRating="$selfCheckRating"
          />
        </div>
      </div>
      <div class="u-align--end u-pd24">
        <input type="hidden" name="draft" value="" />
        <input type="hidden" name="remand" value="" />
        <input
          type="submit"
          class="c-button--text"
          onclick="saveDraft(this)"
          value="下書き保存する"
        />
        <a data-remodal-target="modal_remand" class="c-button c-button--delete u-w100">差戻し</a>
        <a data-remodal-target="modal_request" class="c-button c-button--primary u-w160">承認を依頼する</a>
{{--        <a class="c-button c-button--primary u-w160">入力内容を反映</a>--}}
      </div>
    </form>
  </div>
</div>
@include('self-check.components.modal._remand')
@include('self-check.components.modal._request')
<script>
  function setComment(self)
  {
    let id = $(self).data('id')
    let comment = $(`#self_check_sheet_item_comment_${id}`).val()
    let tag = $(`#p_self_check_sheet_item_comment_${id}`)
    let input = $(`#input_self_check_sheet_item_comment_${id}`)
    tag.text(comment)
    input.val(comment)
    if (comment.length > 0) {
      tag.removeClass('c-empty')
    } else {
      tag.addClass('c-empty')
      tag.text("備考があれば記入")
    }
  }
  function saveRemand(self)
  {
    let remand_reason = $("#remand_reason").val()
    if (remand_reason.length < 1) {
      alert('差戻し理由を入力してください。')
    } else {
      $(self).prop('disabled', true)
      $("#rating_form [name=remand]").val(1)
      $("#rating_form").submit()
    }
  }
  function saveDraft(self)
  {
    $(self).prop('disabled', true)
    $("#rating_form [name=draft]").val(1)
    $("#rating_form").submit()
  }
</script>
