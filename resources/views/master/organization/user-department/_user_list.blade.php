{{-- テーブル一覧 --}}
<div class="p-tableBox__body u-p0">
  <div class="p-table c-scroll h-auto">
    <?php
      $tableHead = [
        [
          'title' => null,
          'width' => '40px',
          'class' => 'checkbox',
        ],[
          'title' => '氏名',
          'width' => '150px',
          'class' => null,
        ],[
          'title' => 'メールアドレス',
          'width' => '200px',
          'class' => null,
        ],[
          'title' => '電話番号',
          'width' => '140px',
          'class' => null,
        ],[
          'title' => '役職',
          'width' => '130px',
          'class' => null,
        ],[
          'title' => '雇用形態',
          'width' => 'auto',
          'class' => null,
        ]

      ]
    ?>
    <table class="w-auto sticky">
      <colgroup>
        @foreach($tableHead as $key => $theadItem)
          <col style="width: {!! $theadItem['width'] !!}" />
        @endforeach
      </colgroup>
      <thead>
        <tr>
          @foreach($tableHead as $key => $theadItem)
            @if ($theadItem['class'] === 'checkbox')
              <th class="{!! $theadItem['class'] !!}">
                <!-- チェックボックス専用のHTML -->
                <div class="item">
                  <label for="all_users">
                    <input
                      id="all_users"
                      type="checkbox"
                      name="all_check"
                    />
                  </label>
                </div>
              </th>
            @else
              <th class="{!! $theadItem['class'] !!}">
                <div class="item">{!! $theadItem['title'] !!}</div>
              </th>
            @endif
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <!-- チェックボックス -->
            <td>
              <div class="item">
                <label for="check_{{ $user->id }}">
                  <input
                    id="check_{{ $user->id }}"
                    type="checkbox"
                    class="check"
                    name="user_id"
                    value="{{ $user->id }}"
                  />
                </label>
              </div>
            </td>
            <!-- 氏名 -->
            <td>
              <div class="item">
                <div class="p-user">
                  <div class="p-user__image c-noImage">
                    <img
                      class="c-image c-image--round"
                      src=src="{{ $user->avatar_url }}"
                    />
                  </div>
                  <div class="p-uesr__text">
                    <div class="name">
                      {{ $user->full_name }}
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <!-- メールアドレス -->
            <td>
              <div class="item">
                {{ $user->email }}
              </div>
            </td>
            <!-- 電話番号 -->
            <td>
              <div class="item">
                {{ $user->number }}
              </div>
            </td>
            <!-- 役職 -->
            <td>
              <div class="item">
                {{ $user->position_label}}
              </div>
            </td>
            <!-- 雇用形態 -->
            <td>
              <div class="item">
                {{ $user->employment_label }}
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
