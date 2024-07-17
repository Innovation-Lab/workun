  <div class="p-tableBox__head">
    <div class="mainText">
      <p class="title">セルフチェックシート一覧</p>
    </div>
    <form action="" class="c-tab__content--sort">
      <label>
        実施月:
        <select name="">
          <option value="">2024年8月</option>
          <option value="">2024年7月</option>
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
          @for($tableBody = 0; $tableBody < 20; $tableBody++)
            <tr data-href="">
              <td>
                <div class="item">
                  <span class="status--1">未評価</span>
                  <span class="status--2">評価中</span>
                  <span class="status--3">確定待ち</span>
                </div>
              </td>
              <td>
                <div class="item">
                  第8期 | 基本挨拶、身だしなみセルフチェック表
                </div>
              </td>
              <td>
                <div class="item">
                  2024/07/08
                </div>
              </td>
              <td>
                <div class="item">
                  2024年 四半期 (7月 ~ 9月)
                </div>
              </td>
              <td>
                <div class="item">
                  <p>
                    <span>評価：山田 啓介</span><br />
                    <span>承認：佐々木 誠一郎</span>
                  </p>
                </div>
              </td>
            </tr>
          @endfor
        </tbody>
      </table>
    </div>
    {{-- ページング --}}
    <div class="p-pager">
      <p class="count">全 320 件中 1～20 件目</p>
      <div class="pageNav">
        <a href="" class="arrowButton arrowButton--prev disabled">
          <svg width="28" height="28"><use xlink:href="#pageNav_prev" /></svg>
        </a>
        <div class="p-input">
          <input type="text" placeholder="" value="1" id="">
          <span class="total">/ 1</span>
        </div>
        <a href="" class="arrowButton arrowButton--next">
          <svg width="28" height="28"><use xlink:href="#pageNav_next" /></svg>
        </a>
      </div>
    </div>
  </div>