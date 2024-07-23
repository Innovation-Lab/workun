<tr data-user_id="{{ data_get($user, 'id') }}">
  <!-- 対象者 -->
  <td>
    <input
      type="hidden"
      name="self_check_sheet_targets[]"
      value="{{ data_get($user, 'id') }}"
    />
    <div class="item">
      <div class="p-user">
        <div class="p-user__image c-noImage">
          <img
            class="c-image c-image--round"
            src="{{ data_get($user, 'avatar_url') }}"
          />
        </div>
        <div class="p-uesr__text">
          <div class="name">
            {{ data_get($user, 'full_name') }}
          </div>
        </div>
      </div>
    </div>
  </td>
  <!-- 部署 -->
  <td>
    <div class="item">
      {{ data_get($user, 'department_label') }}
    </div>
  </td>
</tr>
