<div
  class="remodal p-modal p-modal__selfCheck"
  data-remodal-id="modal_submission"
  data-remodal-options="hashTracking: false, closeOnOutsideClick: false, appendTo: #answer_form"
>
  <button data-remodal-action="close" class="remodal-close p-modal__close">閉じる</button>
  <div class="p-modal__head">
    <p class="title">評価記入内容を登録</p>
    <p class="description">セルフチェックシートの記入を登録します。よろしいですか。<br />登録後は評価者がシートを確認するフローへ進みます。</p>
  </div>
  <div class="p-modal__body">

    <div
      class="
        between p-check
        @if($user->reviewers()->count() < 2)
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

        @if($user->reviewers()->count() === 0)
          <div class="p-check__select u-align">
            <span class="p-check__select--text">評価者を選択</span>
          </div>
        @elseif($user->reviewers()->count() === 1)
          <div class="p-check__select u-align p-check__select--user">
            <div class="u-align u-gap8 p-user">
              <div
                class="p-user__image"
                style='background-image:url("{{ data_get(
                  $selfCheckRating,
                  "reviewer.avatar_url",
                  data_get($user->reviewers->first(), 'manager.avatar_url')
                ) }}")'
              ></div>
              <div class="p-user__text">
                <span class="label">評価者</span>
                <p>{{ data_get(
                  $selfCheckRating,
                  "reviewer.full_name",
                  data_get($user->reviewers->first(), 'manager.full_name')
                ) }}</p>
              </div>
            </div>
            <input
              type="radio"
              name="reviewer_id"
              value="{{ data_get($user->reviewers->first(), 'manager_user_id') }}"
              checked
              style="display:none;"
            />
          </div>
        @else
          <div
            class="
              p-check__select u-align
              @if(data_get($selfCheckRating, "reviewer_id"))
                p-check__select--user
              @endif
            "
          >
            <div id="selected_reviewer">
              @if(!data_get($selfCheckRating, "reviewer_id"))
                <span class="p-check__select--text">評価者を選択</span>
              @else
                <div class="u-align u-gap8 p-user">
                  <div
                    class="p-user__image"
                    style='background-image:url("{{ data_get($selfCheckRating, "reviewer.avatar_url") }}")'
                  ></div>
                  <div class="p-user__text">
                    <span class="label">評価者</span>
                    <p>{{ data_get($selfCheckRating, "reviewer.full_name") }}</p>
                  </div>
                </div>
              @endif
            </div>
            <div class="p-check__select--list">
              <ul>
                @foreach($user->reviewers as $reviewer)
                  <li>
                    <label
                      class="p-check__checkbox p-check__account"
                    >
                      <input
                        type="radio"
                        name="reviewer_id"
                        value="{{ $reviewer->manager_user_id }}"
                        @if(data_get($selfCheckRating, "reviewer_id") === $reviewer->manager_user_id)
                          checked
                        @endif
                        data-image="{{ data_get($reviewer, 'manager.avatar_url') }}"
                        data-name="{{ data_get($reviewer, 'manager.full_name') }}"
                        onclick="selectReviewer(event, this)"
                      />
                      <div class="p-user__image c-noImage">
                        <img
                          src="{{ data_get($reviewer, 'manager.avatar_url') }}"
                          alt=""
                          class="c-image c-image--round"
                        />
                      </div>
                      <div class="p-user__text">
                        <p>{{ data_get($reviewer, 'manager.full_name') }}</p>
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
