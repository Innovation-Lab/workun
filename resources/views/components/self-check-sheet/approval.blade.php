<div class="p-tableBox">
  <div class="p-tableBox__head between">
    <div class="mainText">
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
  </div>

  <div class="p-tableBox__body" style="padding:0">
    <form id="approval_form" method="post">
      @csrf
      {{-- テーブル一覧 --}}
      <div class="p-table__check c-scroll">
        <div class="t-wrapper">
          <x-self-check-sheet.answer-table
            type="approval"
            :selfCheckSheet="$selfCheckSheet"
            :term="$selfCheckRating->target"
            :user="$selfCheckRating->user"
            :selfCheckRating="$selfCheckRating"
          />
        </div>
      </div>
      <div class="u-align--end u-pd24">
        <input type="hidden" name="remand" value="" />
        <a data-remodal-target="modal_remand" class="c-button c-button--delete u-w100">差戻し</a>
        <a data-remodal-target="modal_approval" class="c-button c-button--primary u-w160">この結果を承認する</a>
      </div>
    </form>
  </div>
</div>
@include('self-check.components.modal._rating_remand')
@include('self-check.components.modal._approval')
<script>
  function saveRemand(self)
  {
    let remand_reason = $("#remand_reason").val()
    if (remand_reason.length < 1) {
      alert('差戻し理由を入力してください。')
    } else {
      $(self).prop('disabled', true)
      $("#approval_form [name=remand]").val(1)
      $("#approval_form").submit()
    }
  }
  function saveAnswer(self)
  {
    $(self).prop('disabled', true)
    $("#approval_form [name=remand]").val("")
    $("#approval_form").submit()
  }
</script>
