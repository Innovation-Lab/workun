<form id="search_form">
  <div class="p-tableBox__middle">
    <div class="p-search">
      <div class="p-search__wrap">
        <div class="p-search__keyword">
          <div class="p-input">
            <input type="search" name="keyword" placeholder="キーワード検索" value="{{ request('keyword') }}" />
          </div>
        </div>
        <div class="p-search__action">
          <div class="p-search__detail">
            @if($condition)
              <div class="p-search__setData">
                <p class="title">
                  詳細条件 : {{ $condition }}
                </p>
                <a
                  href="{{ route('master.self-check.index') }}"
                  class="close"
                >
                  <svg width="12" height="12"><use xlink:href="#close" /></svg>
                </a>
              </div>
            @endif
            <p class="c-button" data-remodal-target="modal_search">詳細検索</p>
          </div>
          <button type="submit" class="c-button c-button--brandPrimary p-search__button">絞り込む</button>
        </div>
      </div>
    </div>
  </div>
  @include('master.self-check.modal._search')
</form>
