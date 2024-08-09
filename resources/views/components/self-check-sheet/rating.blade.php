<div class="p-tableBox">
  <div class="p-tableBox__head between">
    <div class="mainText">
      <x-self-check-sheet.answer-status
        :status="data_get($selfCheckRating, 'status', \App\Models\SelfCheckRating::STATUS_NOT_ANSWERED)"
      />
      <p class="title">
        {{ date('Y年m月', strtotime("{$selfCheckRating->target}-01")) }}
        評価入力 : {{ $selfCheckSheet->display_title }}
      </p>
      <div class="count border">
        <p class="number">
          {{ data_get($selfCheckRating, 'user.full_name') }}
        </p>
      </div>
    </div>
    @if($selfCheckRating->rating_remand_flag)
      <div class="comment">
        <svg width="20" height="20"><use xlink:href="#remand_comment" /></svg>
        <p>{{ $selfCheckRating->rating_remand_reason }}</p>
      </div>
    @endif
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
      @if($selfCheckRating->status == App\Models\SelfCheckRating::STATUS_RATING)
        <div class="u-align--end u-pd24">
          <input type="hidden" name="draft" value="" />
          <input type="hidden" name="remand" value="" />
          <input
            type="submit"
            class="c-button--text"
            onclick="saveDraft(this)"
            value="下書き保存する"
          />
          <a
            data-remodal-target="modal_remand"
            class="c-button c-button--delete u-w100"
          >
            差戻し
          </a>
          <a
            data-remodal-target="modal_request"
            class="c-button c-button--primary u-w160"
          >
            承認を依頼する
          </a>
        </div>
      @elseif ($selfCheckRating->remand_flag)
        <div class="u-align--end u-pd24">
          <a class="c-button c-button--delete u-w100">差戻し中</a>
        </div>
      @endif
{{--        <a class="c-button c-button--primary u-w160">入力内容を反映</a>--}}
    </form>
  </div>
</div>
@include('self-check.components.modal._remand')
@include('self-check.components.modal._request')
<script>
  function selectApprover(event, self)
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
    <span class="label">承認者</span>
    <p>${name}</p>
  </div>
</div>`
    $("#selected_approver").html(html)
    $('.p-check__select').removeClass('is-open')
    event.stopPropagation()
  }
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
      $("#rating_form [name=draft]").val("")
      $("#rating_form [name=remand]").val(1)
      $("#rating_form").submit()
    }
  }
  function saveDraft(self)
  {
    $(self).prop('disabled', true)
    $("#rating_form [name=draft]").val(1)
    $("#rating_form [name=remand]").val("")
    $("#rating_form").submit()
  }
  function saveAnswer(self)
  {
    let approver_id = $("#rating_form [name=approver_id]:checked").val()
    if (!approver_id) {
      alert("承認者を選択してください。")
    } else {
      $(self).prop('disabled', true)
      $("#rating_form [name=draft]").val("")
      $("#rating_form [name=remand]").val("")
      $("#rating_form").submit()
    }
  }
</script>
