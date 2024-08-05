<div class="p-tableBox__head">
  <div class="mainText">
    <p class="title">1 on 1｜シート一覧</p>
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
          <tr data-href="{{ route('performance-review.answers') }}">
            <td>
              <div class="item">
                未実装
              </div>
            </td>
            <td>
              <div class="item">
                営業実績に関する個人面談
              </div>
            </td>
            <td>
              <div class="item">
                2024/07/08
              </div>
            </td>
            <td>
              <div class="item">
                2024年上期
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
