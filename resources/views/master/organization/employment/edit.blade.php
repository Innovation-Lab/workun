@extends('layout.layout--base')
@section('title', '雇用形態の編集')
@section('content')
  <div class="l-edit">
    <div class="p-page p-page--organization">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{route('master.organization.index')}}" class="return">
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          <p class="title">雇用形態の編集</p>
        </div>
      </div>
      <div class="p-page__body min">
        <form class="p-formBlock" method="post">
          @csrf
          <div class="p-formBlock__body">
            @include('master.organization.employment._form')
          </div>
          @can('delete', $employment)
            <div class="p-formBlock__middle u-tar">
              <button data-remodal-target="modal_delete" class="c-button--text">
                この項目を削除する
              </button>
            </div>
          @endcan
          <div class="p-formBlock__foot">
            <div class="p-formBlock__action">
              <a
                href="{{route('master.organization.index')}}"
                class="c-button c-button--cancel c-button--sm u-w120"
              >
                戻る
              </a>
              @can('update', $employment)
                <button
                  type="submit"
                  class="c-button c-button--brandPrimary c-button--sm u-w220"
                >
                  雇用形態を変更する
                </button>
              @endcan
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  @include('master.organization.employment.modal._delete')
@endsection
