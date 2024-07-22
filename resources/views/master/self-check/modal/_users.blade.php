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
<table
  id="user_select"
  class="sticky"
>
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
                onchange='$("#user_select [name=user_id]").prop("checked", $(this).prop("checked"))'
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
    <tr
      data-id="{{ $user->id }}"
      data-full_name="{{ $user->full_name }}"
      data-avatar_url="{{ $user->avatar_url }}"
    >
      <!-- チェックボックス -->
      <td>
        <div class="item">
          <label for="check_rater_{{ $user->id }}">
            <input
              id="check_rater_{{ $user->id }}"
              type="checkbox"
              class="check"
              name="user_id"
              value="{{ $user->id }}"
              data-id="{{ $user->id }}"
              data-image="{{ $user->avatar_url }}"
              data-name="{{ $user->full_name }}"
              data-department="{{ $user->department_label }}"
              data-position="{{ $user->position_label }}"
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
                src="{{ $user->avatar_url }}"
              />
            </div>
            <div class="p-uesr__text">
              <div class="name">{{ $user->full_name }}</div>
            </div>
          </div>
        </div>
      </td>
      <!-- 部署 -->
      <td><div class="item">{{ $user->department_label }}</div></td>
      <!-- 役員 -->
      <td><div class="item">{{ $user->position_label }}</div></td>
    </tr>
  @endforeach
  </tbody>
</table>
