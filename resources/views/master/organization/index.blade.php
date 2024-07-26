@extends('layout.layout--base')
@section('title', '組織作成')
@section('content')
  <div class="l-index">
    <div class="p-page p-page--organization">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <p class="title">組織作成</p>
          <div class="action"></div>
        </div>
      </div>
      <div class="p-page__body">
        <!-- 組織項目の設定 -->
        <div class=" p-organization item">
          <div class="p-organization__head">
            <p class="title">
              <span class="icon">
                <svg width="18" height="18"><use xlink:href="#organizational_item" /></svg>
              </span>
              組織項目の設定
            </p>
          </div>

          {{--  組織項目の一覧  --}}
          <x-organizations.position-hierarchy />

        </div>
        <!-- 組織図の作成 -->
        <div class="p-organization chart">
          <div class="p-organization__head">
            <p class="title">
              <span class="icon">
                <svg width="18" height="18"><use xlink:href="#organizational_chart" /></svg>
              </span>
              組織図の作成
            </p>
          </div>
          <div class="p-organization__body">
            <a href="{{route('master.organization.edit')}}" class="c-button c-button--lineAccent ">
              <svg width="20" height="20"><use xlink:href="#organizational_chart_edit" /></svg>
            </a>
            <div class="c-scroll h-auto" id="scrollContainer">
              <!-- 組織図 -->
              <x-organizations.form-index />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('master.organization._script_layer')
@endsection
