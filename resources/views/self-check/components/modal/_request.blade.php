<div
  class="remodal p-modal p-modal__selfCheck"
  data-remodal-id="modal_request"
  data-remodal-options="hashTracking: false, closeOnOutsideClick: false, appendTo: #rating_form"
>
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">承認内容を確定 / 最終承認を依頼</p>
    <p class="description">セルフチェックシートの承認を完了します。よろしいですか。<br />完了後は承認者がシートを承認するフローへ進みます。</p>
  </div>
  <div class="p-modal__body">

    <div
      class="
        between p-check
        @if($user->approvers()->count() < 2)
          p-check--noSelect
        @endif
      "
    >
      <div class="p-check__account u-align u-gap8">
        <div
          class="p-user__image"
          style='background-image:url("{{ data_get($user, 'avatar_url') }}")'
        ></div>
        <div class="p-user__text">
          <p>{{ $user->full_name }}</p>
        </div>
      </div>
      <div class="u-align p-check__arrow">
        <img src="/img/common/icon/chevron_three.svg" height="20" width="20" alt="矢印アイコン">
      </div>
      <div class="p-check__select--wrap">

        @if($user->approvers()->count() === 0)
          <div class="p-check__select u-align">
            <span class="p-check__select--text">承認者を選択</span>
          </div>
        @elseif($user->approvers()->count() === 1)
          <div class="p-check__select u-align p-check__select--user">
            <div class="u-align u-gap8 p-user">
              <div
                class="p-user__image"
                style='background-image:url("{{ data_get(
                  $selfCheckRating,
                  "reviewer.avatar_url",
                  data_get($user->approvers->first(), 'manager.avatar_url')
                ) }}")'
              ></div>
              <div class="p-user__text">
                <span class="label">承認者</span>
                <p>{{ data_get(
                  $selfCheckRating,
                  "reviewer.full_name",
                  data_get($user->approvers->first(), 'manager.full_name')
                ) }}</p>
              </div>
            </div>
            <input
              type="radio"
              name="approver_id"
              value="{{ data_get($user->approvers->first(), 'manager_user_id') }}"
              checked
              style="display:none;"
            />
          </div>
        @else
          <div
            class="
              p-check__select u-align
              @if(data_get($selfCheckRating, "approver_id"))
                p-check__select--user
              @endif
            "
          >
            <div id="selected_approver">
              @if(!data_get($selfCheckRating, "approver_id"))
                <span class="p-check__select--text">承認者を選択</span>
              @else
                <div class="u-align u-gap8 p-user">
                  <div
                    class="p-user__image"
                    style='background-image:url("{{ data_get($selfCheckRating, "approver.avatar_url") }}")'
                  ></div>
                  <div class="p-user__text">
                    <span class="label">承認者</span>
                    <p>{{ data_get($selfCheckRating, "approver.full_name") }}</p>
                  </div>
                </div>
              @endif
            </div>
            <div class="p-check__select--list">
              <ul>
                @foreach($user->approvers as $approver)
                  <li>
                    <label
                      class="p-check__checkbox p-check__account"
                    >
                      <input
                        type="radio"
                        name="approver_id"
                        value="{{ $approver->manager_user_id }}"
                        @if(data_get($selfCheckRating, "approver_id") === $approver->manager_user_id)
                          checked
                        @endif
                        data-image="{{ data_get($approver, 'manager.avatar_url') }}"
                        data-name="{{ data_get($approver, 'manager.full_name') }}"
                        onclick="selectApprover(event, this)"
                      />
                      <div class="p-user__image c-noImage">
                        <img
                          src="{{ data_get($approver, 'manager.avatar_url') }}"
                          alt=""
                          class="c-image c-image--round"
                        />
                      </div>
                      <div class="p-user__text">
                        <p>{{ data_get($approver, 'manager.full_name') }}</p>
                      </div>
                    </label>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        @endif
      </div>
    </div>
    <div class="p-formBlock__action">
      <button data-remodal-action="close" class="c-button c-button--cancel u-w120">キャンセル</button>
      <button
        type="button"
        onclick="saveAnswer(this)"
        class="c-button c-button--brandPrimary u-w130"
      >
        登録する
      </button>
    </div>

  </div>
</div>
