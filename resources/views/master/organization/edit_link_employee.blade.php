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
          <p class="title">「賃貸営業部」の従業員登録</p>
          <div class="action"></div>
        </div>
      </div>
      <div class="p-page__body">
        {{-- 検索機能 --}}
        <form>
          <div class="p-search p-formBlock__form list">
            <div class="p-inputField">
              <lable class="label">氏名</lable>
              <div class="u-w160">
                <input type="text" placeholder="氏名を記入" class="primary">
              </div>
            </div>
            <div class="p-inputField">
              <lable class="label">メールアドレス</lable>
              <div class="u-w200">
                <input type="email" class="primary" placeholder="sample@example.com">
              </div>
            </div>
            <div class="p-inputField">
              <lable class="label">電話番号</lable>
              <div class="u-w160">
                <input type="tel" class="primary" placeholder="09012345678">
              </div>
            </div>
            <div class="p-inputField">
              <lable class="label">役職</lable>
              <select name="" id="" class="u-w140 primary">
                <option value="">全て</option>
              </select>
            </div>
            <button class="c-button c-button--xs c-button--brandAccent u-w120">絞り込む</button>
          </div>
        </form>
        <form>
          <div class="p-tableBox link_employee">
            <div class="p-tableBox__head">
              <div class="mainText">
                <p class="title">従業員数</p>
                <div class="count">
                  <span class="unit">全</span>
                  <p class="number">20</p>
                  <span class="unit">名</span>
                </div>
              </div>
              <div class="action"></div>
            </div>
            <div class="p-tableBox__body u-p0">
              {{-- ページング(件数のみ) --}}
              <div class="p-pager">
                <p class="count">
                  全 20 件中
                  1～20 件目
                </p>
              </div>
              {{-- テーブル一覧 --}}
              <div class="p-table c-scroll h-auto">
                <?php
                  $tableHead = [
                    [
                      'title' => null,
                      'width' => '40px',
                      'class' => 'checkbox',
                    ],[
                      'title' => '氏名',
                      'width' => '150px',
                      'class' => null,
                    ],[
                      'title' => 'メールアドレス',
                      'width' => '200px',
                      'class' => null,
                    ],[
                      'title' => '電話番号',
                      'width' => '140px',
                      'class' => null,
                    ],[
                      'title' => '役職',
                      'width' => '130px',
                      'class' => null,
                    ],[
                      'title' => '雇用形態',
                      'width' => 'auto',
                      'class' => null,
                    ]
                    
                  ]
                ?>
                <table class="w-auto sticky">
                  <colgroup>
                    @foreach($tableHead as $key => $theadItem)
                      <col style="width: {!! $theadItem['width'] !!}" />
                    @endforeach
                  </colgroup>
                  <thead>
                    <tr>
                      @foreach($tableHead as $key => $theadItem)
                        @if ($theadItem['class'] === 'checkbox')
                          <th class="{!! $theadItem['class'] !!}">
                            <!-- チェックボックス専用のHTML -->
                            <div class="item">
                              <label for="all_users">
                                <input
                                  id="all_users"
                                  type="checkbox"
                                  name="all_check"
                                />
                              </label>
                            </div>
                          </th>
                        @else
                          <th class="{!! $theadItem['class'] !!}">
                            <div class="item">{!! $theadItem['title'] !!}</div>
                          </th>
                        @endif
                      @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    @for($tableBody = 1; $tableBody < 20; $tableBody++)
                      <tr>
                        <!-- チェックボックス -->
                        <td>
                          <div class="item">
                            <label for="check_{{ $tableBody }}">
                              <input
                                id="check_{{ $tableBody }}"
                                type="checkbox"
                                class="check"
                                name="user_id"
                                value="{{ $tableBody }}"
                              />
                            </label>
                          </div>
                        </td>
                        <!-- 氏名 -->
                        <td>
                          <div class="item">
                            <div class="p-user">
                              <div class="p-user__image c-noImage">
                                <img
                                  class="c-image c-image--round"
                                  src=""
                                />
                              </div>
                              <div class="p-uesr__text">
                                <div class="name">山田 太郎</div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <!-- メールアドレス -->
                        <td><div class="item">sample@example.com</div></td>
                        <!-- 電話番号 -->
                        <td><div class="item">08012345678</div></td>
                        <!-- 役職 -->
                        <td><div class="item">代表取締役社長</div></td>
                        <!-- 雇用形態 -->
                        <td><div class="item">アルバイト・パート</div></td>
                      </tr>
                    @endfor
                  </tbody>
                </table>
              </div>
              {{-- ページング --}}
              <div class="p-pager">
                <p class="count">全 20 件中 1～20 件目</p>
                <div class="pageNav">
                  <a href="" class="arrowButton arrowButton--prev disabled">
                    <svg width="28" height="28"><use xlink:href="#pageNav_prev" /></svg>
                  </a>
                  <div class="p-input">
                    <input type="text" placeholder="" value="1" id="">
                    <span class="total">/ 1</span>
                  </div>
                  <a href="" class="arrowButton arrowButton--next">
                    <svg width="28" height="28"><use xlink:href="#pageNav_next" /></svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="p-formBlock__action fixed sticky">
            <a href="{{route('master.organization.index')}}" class="c-button c-button--gray c-button--sm u-w120">戻る</a>
            <button class="c-button c-button--white c-button--sm u-w220">登録する</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection    