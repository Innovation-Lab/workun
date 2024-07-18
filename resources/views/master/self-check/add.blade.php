@extends('layout.layout--base')
@section('title', 'セルフチェックシート 新規作成')
@section('content')
  <div class="l-edit">
    <div class="p-page p-page--selfCheck">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{route('master.self-check.index')}}" class="return">
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          <p class="title">セルフチェックシート 新規作成</p>
        </div>
      </div>
      <div class="p-page__body row2">
        <div class="p-formBlock">
          <div class="p-formBlock__head">
            <div class="p-inputField p-inputField--full">
              <label class="label" for="">シート階層選択</label>
              <select name="" id="" class="u-w290">
                <option value="">1階層</option>
                <option value="">2階層</option>
                <option value="">3階層</option>
              </select>
            </div>
          </div>
          <div class="p-formBlock__body">
            <div class="p-formBlock__form">
              <?php  for($p = 1; $p < 4; $p++){ ?>
                <div class="p-inputField--sheetItemBox p-inputField--full layer1-container">
                  <div class="p-inputField p-inputField--sheetItem layer1">
                    <label class="label" for="">項目<?php echo $p; ?></label>
                    <div class="layer--item">
                      <input type="text" placeholder="タイトルを記入してください" class="p-inputField--full">
                      <input type="text" placeholder="動画タイトル">
                      <input type="url" placeholder="動画URLを設置">
                    </div>
                    <div class="layer2-container"></div>
                    <div class="p-formBlock__action">
                      <button class="c-button c-button--brandPrimary c-button--icon c-button--sm u-w120 add-layer2">
                        <svg width="11" height="11"><use xlink:href="#add_btn_round" /></svg> 
                        階層2を追加
                      </button>
                      <button class="c-button c-button--cancel c-button--icon c-button--sm u-w120 delete-layer1">
                        <svg width="11" height="11"><use xlink:href="#delete_btn_round" /></svg> 
                        項目を削除
                      </button>
                    </div>
                  </div>
                </div>
              <?php } ?> 
              <div class="p-formBlock__action">
                <button class="c-button c-button--brandPrimary u-w150 add-layer1">項目を追加</button>
              </div>
            </div>
            @include('master.self-check._script')
          </div>
        </div>
        <div class="p-formBlock">
          <div class="p-formBlock__body min">
            @include('master.self-check._add_sheet')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection