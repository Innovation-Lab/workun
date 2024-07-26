<div class="p-formBlock__head">
  <p class="title">従業員情報</p>
</div>
<div class="p-formBlock__body">
  <div class="p-formBlock__info">
    <div class="item space">
      <div class="label">画像</div>
      <div class="data image c-noImage">
        <img src="{{ $user->avatar_url }}" alt="">
      </div>
    </div>
    <div class="item">
      <div class="label">ニックネーム</div>
      <div class="data">
        {{ $user->nice_name }}
      </div>
    </div>
    <div class="item">
      <div class="label">氏名</div>
      <div class="data">
        {{ $user->full_name }}
      </div>
    </div>
    <div class="item">
      <div class="label">ふりがな</div>
      <div class="data">
        {{ $user->full_name_kana }}
      </div>
    </div>
    <div class="item">
      <div class="label">生年月日</div>
      <div class="data">
        {{ $user->display_birth }}
      </div>
    </div>
    <div class="item">
      <div class="label">入社日</div>
      <div class="data">
        {{ $user->display_joined_for_edit }}
      </div>
    </div>
    <div class="item">
      <div class="label">電話番号</div>
      <div class="data">
        {{ $user->number }}
      </div>
    </div>
    <div class="item space">
      <div class="label">メールアドレス</div>
      <div class="data">
        {{ $user->email }}
      </div>
    </div>
    <hr>
    <div class="item column">
      <div class="label">メモ</div>
      <div class="data">
        {{ $user->memo }}
      </div>
    </div>
  </div>
</div>