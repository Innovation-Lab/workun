@extends('layout.layout--base')
@section('title', '評価期間の編集')
@section('content')
  <div class="l-edit">
    <div class="p-page p-page--term">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{route('master.term.index')}}" class="return"></a>
          <p class="title">評価期間の編集</p>
        </div>
      </div>
      <div class="p-page__body min">
        <form class="p-formBlock">
          <div class="p-formBlock__body">
            @include('master.term._form')
          </div>
          <div class="p-formBlock__middle p-inputField">
            <p class="alertBox">セルフチェックシート作成後は途中で変更することが出来ません。</p>
          </div>
          <div class="p-formBlock__foot">
            <div class="p-formBlock__action">
              <a href="{{route('master.term.index')}}" class="c-button c-button--cancel c-button--sm u-w120">戻る</a>
              <button class="c-button c-button--brandPrimary c-button--sm u-w220">評価期間を変更する</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  @include('master.member.modal._rater')
  @include('master.member.modal._authorizer')
@endsection
    