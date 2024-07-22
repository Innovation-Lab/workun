@extends('layout.layout--base')
@section('title', '評価期間の編集')
@section('content')
  <div class="l-edit">
    <div class="p-page p-page--term">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{ route('master.term.index') }}" class="return">
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          <p class="title">評価期間の編集</p>
        </div>
      </div>
      <div class="p-page__body min">
        <form class="p-formBlock" method="post">
          @csrf
          <div class="p-formBlock__body">
            <x-term.form :period="$period" />
          </div>
          @cannot('update', $period)
            <div class="p-formBlock__middle p-inputField">
              <p class="alertBox">セルフチェックシート作成後は途中で変更することが出来ません。</p>
            </div>
          @endcannot
          @can('delete', $period)
            <div class="p-formBlock__middle u-tar">
              <button data-remodal-target="modal_delete" class="c-button--text">
                この項目を削除する
              </button>
            </div>
          @endcan
          <div class="p-formBlock__foot">
            <div class="p-formBlock__action">
              <a
                href="{{ route('master.term.index') }}"
                class="c-button c-button--cancel c-button--sm u-w120"
              >
                戻る
              </a>
              @can('update', $period)
                <button
                  type="submit"
                  class="c-button c-button--brandPrimary c-button--sm u-w220"
                >
                  評価期間を変更する
                </button>
              @endcan
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  @include('master.term.modal._delete')
@endsection
