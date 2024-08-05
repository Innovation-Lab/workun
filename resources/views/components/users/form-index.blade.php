<form
  id="search_form"
  method="GET" action="{{ route('master.member.index') }}"
>
<div class="p-tableBox__middle">
  <div class="p-search">
    <div class="p-search__wrap">
      <div class="p-search__keyword">
        <div class="p-input">
          <input type="search" name="keyword" placeholder="キーワード検索" value="{{ request('keyword') }}" id="">
        </div>
      </div>
      <div class="p-search__action">
        <div class="p-search__detail">
          <div class="p-search__setData">
            <p class="title">
              詳細条件 :
                @if(request('department_id'))   {{ $departments->find(request('department_id'))->name }} @endif
                @if(request('position_id'))   / {{ $positions->find(request('position_id'))->name }}     @endif
                @if(request('grade_id'))      / {{ $grades->find(request('grade_id'))->name }}           @endif
                @if(request('employment_id')) / {{ $employments->find(request('employment_id'))->name }} @endif
                @if(request('unregistered_reviewer_and_approver')) / 表示条件あり                          @endif
            </p>
            <a
              href="{{ $back_action }}"
              class="close"
            >
              <svg width="12" height="12"><use xlink:href="#close" /></svg>
            </a>
          </div>
          <p class="c-button" data-remodal-target="modal_search">詳細検索</p>
        </div>
        <button type="submit" class="c-button c-button--brandPrimary p-search__button">絞り込む</button>
      </div>
    </div>
  </div>
</div>
@include('master.member.modal._search')
</form>


