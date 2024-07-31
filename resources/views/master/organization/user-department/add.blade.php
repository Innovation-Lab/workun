@extends('layout.layout--base')
@section('title', '組織図と従業員の紐付け')
@section('content')
  <div class="l-edit">
    <div class="p-page p-page--organization">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{route('master.organization.index')}}" class="return">
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          <p class="title">「{{ $department->name }}」の従業員登録</p>
          <div class="action"></div>
        </div>
      </div>
      <div class="p-page__body">
        {{--  検索機能  --}}
        @include('master.organization.user-department._user_search')

        <form
          method="POST"
          action="{{ route('master.organization.user_department.add', $department) }}"
        >
          @csrf
          {{--  従業員一覧を表示 --}}
          @include('master.organization.user-department._user_form')

          <div class="p-formBlock__action fixed sticky">
            <a href="{{route('master.organization.index')}}" class="c-button c-button--gray c-button--sm u-w120">戻る</a>
            <button
              class="c-button c-button--white c-button--sm u-w220"
              name="register_selected"
              style="display: none;"
            >
              選択した従業員を登録する
            </button>
            <button
              class="c-button c-button--white c-button--sm u-w220"
              name="register_all"
            >
              全ての従業員を登録する
            </button>
          </div>
        </form>
      </div>
      @include('master.organization.user-department._script')
    </div>
  </div>
@endsection

