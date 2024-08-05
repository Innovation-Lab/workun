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
          'title' => '評価状況',
          'width' => '100',
          'class' => null,
        ],[
          'title' => '評価状況',
          'width' => '100',
          'class' => null,
        ],[
          'title' => 'タイトル',
          'width' => 'auto',
          'class' => null,
        ],[
          'title' => '入力期限',
          'width' => '100',
          'class' => null,
        ],[
          'title' => '評価期間',
          'width' => '130',
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
          <tr data-href="{{ route('personal-assessment.answers') }}">
            <td>
              <div class="item">
                目標設定
              </div>
            </td>
            <td>
              <div class="item">
                1/4
              </div>
            </td>
            <td>
              <div class="item">
                第８期｜基本挨拶、身だしなみ、セルフチェック表
              </div>
            </td>
            <td>
              <div class="item">
                2024/07/15
              </div>
            </td>
            <td>
              <div class="item">
                <p>
                  2024年 通常通期
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
