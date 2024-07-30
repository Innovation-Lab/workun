<div class="p-tableBox">
  <div class="p-tableBox__head">
    <div class="mainText">
      <p class="title">
        {{ date('Y年m月', strtotime("{$term}-01")) }}
        評価入力  :  {{ $selfCheckSheet->display_title }}
      </p>
      <div class="count border">
        <span class="unit">対象者</span>
        <p class="number">{{ number_format($selfCheckRatings->count()) }}</p>
        <span class="unit">名</span>
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
            type="approvals"
            :selfCheckSheet="$selfCheckSheet"
            :term="$term"
            :selfCheckRatings="$selfCheckRatings"
          />
        </div>
      </div>
{{--      <div class="u-align--end u-pd24">--}}
{{--        <input type="submit" class="c-button--text" value="下書き保存する">--}}
{{--        <a data-remodal-target="modal_remand" class="c-button c-button--delete" >差戻し</a>--}}
{{--        <a data-remodal-target="modal_approval" class="c-button c-button--primary u-w160">この結果を承認する</a>--}}
{{--      </div>--}}
    </form>
  </div>
</div>
