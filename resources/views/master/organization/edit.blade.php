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
            <button class="c-button u-w180" data-remodal-target="modal_preview">プレビューを表示</button>
            <button
              class="c-button c-button--primary u-w180"
              onclick='$("#departments-form").submit()'
            >
              組織図を保存
            </button>
          </div>
        </div>
      </div>
      <div class="p-page__body">
        <div class="p-formBlock">
          <div class="p-formBlock__body">
            <div class="c-scroll h-auto">
              <form id="departments-form" method="post">
                @csrf
                <div class="p-inputField--organizationBox">
                  <div class="layer--container">
                    <div class="layer--item">
                      <div class="p-inputField p-inputField--organization layer1--item">
                        <div class="item">
                          <div class="item--checkbox">
                            <label class="round">
                              <input type="radio" name="organization" data-name="departments[0]" data-parent="" onclick="toggleButtonsBasedOnCheckbox()" checked />
                            </label>
                          </div>
                          <div class="item--input">
                            <span class="label">順序</span>
                            <input type="number" name="departments[0][seq]" value="1" step="1" min="1" class="gray" placeholder="1" disabled />
                            <input type="text" value="{{ $organization->name }}" name="departments[0][name]" class="gray" placeholder="名称を記入" disabled />
                          </div>
                        </div>
                      </div>
                      <div class="layer--container">
                        @foreach($organization->first_departments as $department)
                          @include('master.organization._layer_item', [
                            'parent' => 'departments[0]',
                            'index' => $loop->index,
                            'department' => $department
                          ])
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <div class="p-formBlock__action fixed">
                  <span>選択した項目の</span>
                  <a class="c-button c-button--sm c-button--white" id="add-below">直下に追加</a>
                  <a class="c-button c-button--sm c-button--white" id="add-align">並列に追加</a>
                  <a class="c-button c-button--sm c-button--delete" id="delete-item" data-remodal-target="modal_delete">削除</a>
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
  @include('master.organization.modal._edit_preview')
@endsection
