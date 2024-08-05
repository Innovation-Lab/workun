{{-- self-check-sheet.components._sheet1からコピーしました --}}
<div class="p-tableBox__head">
  <div class="mainText">
    <p class="title">個人チェック評価｜シート一覧</p>
  </div>
  <form
    id="term_select"
    class="c-tab__content--sort"
  >
    <input type="hidden" name="type" value="{{ $type }}" />
    <label>
      実施月:
      <x-form.year-month
        key="term"
        :value="$term"
        id="term_select"
      />
    </label>
  </form>
</div>
<div class="p-tab__content--body">
  {{-- テーブル一覧 --}}
  <div class="p-table c-scroll">
    <?php
      $tableHead = [
        [
          'title' => 'ステータス',
          'width' => '100',
          'class' => null,
        ],[
          'title' => 'タイトル',
          'width' => 'auto',
          'class' => null,
        ],[
          'title' => '登録期限',
          'width' => '90',
          'class' => null,
        ],[
          'title' => '評価期間',
          'width' => '180',
          'class' => null,
        ],[
          'title' => '評価者/承認者',
          'width' => '160',
          'class' => null,
        ]
      ]
    ?>
    <table class="t-table__900 sticky">
      <colgroup>
        @foreach($tableHead as $key => $theadItem)
          <col class="u-w{!! $theadItem['width'] !!}" />
        @endforeach
      </colgroup>
      <thead>
        <tr>
          @foreach($tableHead as $key => $theadItem)
            <th class="{!! $theadItem['class'] !!}">
              {!! $theadItem['title'] !!}
            </th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach($self_check_sheets as $self_check_sheet)
          <tr data-href="{{ route('self-check.answer', [
            'selfCheckSheet' => $self_check_sheet,
            'term' => $term,
          ]) }}">
            <td>
              <div class="item">
                <x-self-check-sheet.answer-status
                  :status="data_get($self_check_sheet, 'rating.status', \App\Models\SelfCheckRating::STATUS_NOT_ANSWERED)"
                />
              </div>
            </td>
            <td>
              <div class="item">
                {{ $self_check_sheet->display_title }}
              </div>
            </td>
            <td>
              <div class="item">
                {{ $self_check_sheet->display_term }}
              </div>
            </td>
            <td>
              <div class="item">
                {{ $self_check_sheet->display_period }}
              </div>
            </td>
            <td>
              <div class="item">
                <p>
                  <span>評価：{{ data_get($self_check_sheet, 'rating.reviewer.full_name', '未登録') }}</span><br />
                  <span>承認：{{ data_get($self_check_sheet, 'rating.approver.full_name', '未登録') }}</span>
                </p>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{-- ページング --}}
  <x-pager :pagination="$self_check_sheets->appends(request()->all())"/>
</div>
