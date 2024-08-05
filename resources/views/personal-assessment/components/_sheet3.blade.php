{{-- self-check-sheet.components._sheet1からコピーしました --}}
<div class="p-tableBox__head">
  <div class="mainText">
    <p class="title">個人評価｜シート一覧</p>
  </div>
  <form
    id="term_select"
    class="c-tab__content--sort"
  >
    <input type="hidden" name="type" value="" />
    <label>
      実施月:
      <select name="month">
        <option value="202401">2024/01</option>
      </select>
      <button>
        全てのシートを確認
      </button>
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
          'title' => '承認期限',
          'width' => '90',
          'class' => null,
        ],[
          'title' => '評価期間',
          'width' => '180',
          'class' => null,
        ],[
          'title' => '評価者',
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
        {{--  @foreach($self_check_sheets as $self_check_sheet)  --}}
          <tr data-href="{{ route('personal-assessment.approvals') }}">
            <td>
              <div class="item">
                未回答
              </div>
            </td>
            <td>
              <div class="item">
                セルフチェックシート
              </div>
            </td>
            <td>
              <div class="item">
                2024/01
              </div>
            </td>
            <td>
              <div class="item">
                2024/01 ~ 2024/02
              </div>
            </td>
            <td>
              <div class="item">
                <p>
                  <span>評価：山田 テスト</span>
                </p>
              </div>
            </td>
          </tr>
        {{--  @endforeach  --}}
      </tbody>
    </table>
  </div>
  {{-- ページング --}}
  {{--  <x-pager :pagination="$self_check_sheets->appends(request()->all())"/>  --}}
</div>
