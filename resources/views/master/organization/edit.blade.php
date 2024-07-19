@extends('layout.layout--base')
@section('title', '組織図の編集')
@section('content')
  <div class="l-edit">
    <div class="p-page p-page--organization fixed">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{route('master.organization.index')}}" class="return">
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          <p class="title">組織図の編集</p>
          <div class="action">
            <!-- <button class="c-button u-w180">プレビューを表示</button> -->
            <button class="c-button c-button--primary u-w180">組織図を保存</button>
          </div>
        </div>
      </div>
      <div class="p-page__body">
        <div class="p-formBlock">
          <div class="p-formBlock__body">
            <div class="c-scroll h-auto">
              <form>
                <div class="p-inputField--organizationBox">
                  <div class="layer--container">
                    <div class="layer--item">
                      <div class="p-inputField p-inputField--organization layer1--item">
                        <div class="item">
                          <div class="item--checkbox">
                            <label for="organization1" class="round">
                              <input type="checkbox" id="organization1" name="organization" value="">
                            </label>
                          </div>            
                          <div class="item--input">
                            <span class="label">順序</span>
                            <input type="number" value="1"  class="gray" placeholder="1"> 
                            <input type="text" value="クラスコ" class="gray" placeholder="名称を記入"> 
                          </div>
                        </div>
                      </div>
                      <div class="layer--container"></div>
                    </div>
                  </div>
                </div>
                <div class="p-formBlock__action fixed">
                  <span>選択した項目の</span>
                  <a class="c-button c-button--sm c-button--white" id="add-below">直下に追加</a>
                  <a class="c-button c-button--sm c-button--white" id="add-align">並列に追加</a>
                  <a class="c-button c-button--sm c-button--delelte" id="delete-item" data-remodal-target="modal_delete">削除</a>
                </div>
                @include('master.organization.modal._delete')
                @include('master.organization._script_layer')
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection