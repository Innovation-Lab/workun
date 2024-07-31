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
      'title' => '部署',
      'width' => '130px',
      'class' => null,
    ],[
      'title' => '役職',
      'width' => 'auto',
      'class' => null,
    ]
  ]
?>
<table class="sticky">
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
              <label for="" class="none">
                <input type="checkbox" name="all_check" id="all">
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
  <tbody id="{{ $type }}-list">
    @foreach($users as $user)
      <tr>
        <!-- チェックボックス -->
        <td>
          <div class="item">
            <label for="check_{{ $type }}{{ $user->id }}">
              <input
                type="checkbox"
                id="check_{{ $type }}{{ $user->id }}"
                name="check[]"
                class="check"
                value="{{ $user->id }}"
            </label>
          </div>
        </td>
        <!-- 氏名 -->
        <td>
          <div class="item">
            <div class="p-user">
              <div class="p-user__image">
                <img class="c-image c-image--round" name='img_path' src="{{ $user->avatar_url }}">
              </div>
              <div class="p-uesr__text">
                <div class="name">
                  {{ $user->full_name }}
                </div>
              </div>
            </div>
          </div>
        </td>
        <!-- 部署 -->
        <td>
          <div class="item">
            {{ $user->department_label }}
          </div>
        </td>
        <!-- 役員 -->
        <td>
          <div class="item">
            {{ $user->position_label }}
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
