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
          <p class="title">「{{ $department->name }}」の従業員編集</p>
          <div class="action"></div>
        </div>
      </div>
      <div class="p-page__body">
        <form
          method="POST"
          action="{{ route('master.organization.user_department.edit', $department) }}"
        >
          @csrf
          @method('delete')
          {{--  従業員一覧を表示 --}}
          @include('master.organization.user-department._user_form')

          <div class="p-formBlock__action fixed sticky">
            <a href="{{route('master.organization.index')}}" class="c-button c-button--gray c-button--sm u-w120">戻る</a>
            <button
              class="c-button c-button--white c-button--sm u-w220"
              name="delete_selected"
              style="display: none;"
            >
              選択した従業員を削除する
            </button>
            <button
              class="c-button c-button--white c-button--sm u-w220"
              name="delete_all"
            >
              全ての従業員を削除する
            </button>
          </div>
        </form>
      </div>
      @include('master.organization.user-department._script')
    </div>
  </div>
@endsection

