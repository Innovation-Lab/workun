@extends('layout.layout--base')
@section('title', '従業員一覧')
@section('content')
  <div class="l-index">
    <div class="p-page">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <p class="title">従業員情報</p>
          <div class="action"></div>
        </div>
      </div>
      <div class="p-page__body">
        <div class="p-tableBox">
          <div class="p-tableBox__head">
            <div class="mainText">
              <p class="title">従業員一覧</p>
              <div class="count">
                <span class="unit">全</span>
                <p class="number">{{ number_format($users->total()) }}</p>
                <span class="unit">名</span>
              </div>
            </div>
            <div class="action"></div>
          </div>
          <div class="p-tableBox__middle">
            <div class="p-search">
              <div class="p-search__wrap">
                <div class="p-search__keyword">
                  <div class="p-input">
                    <input type="search" placeholder="キーワード検索" value="" id="">
                  </div>
                </div>
                <div class="p-search__action">
                  <div class="p-search__detail">
                    <div class="p-search__setData">
                      <p class="title">詳細条件 : 営業部 / リーダー / M3</p>
                      <button class="close">
                        <svg width="12" height="12"><use xlink:href="#close" /></svg>
                      </button>
                    </div>
                    <p class="c-button">詳細検索</p>
                  </div>
                  <button type="submit" class="c-button c-button--brandPrimary p-search__button">絞り込む</button>
                </div>
              </div>
            </div>
          </div>
          <div class="p-tableBox__body">
            {{-- ページング(件数のみ) --}}
            <div class="p-pager">
              <p class="count">
                全 {{ number_format($users->total()) }} 件中
                {{ number_format($users->firstItem()) }}～{{ number_format($users->lastItem()) }} 件目
              </p>
            </div>
            {{-- テーブル一覧 --}}
            <div class="p-table">
              <?php
                $tableHead = [
                  [
                    'title' => '氏名',
                    'width' => '150px',
                    'class' => null,
                  ],[
                    'title' => '部署',
                    'width' => '130px',
                    'class' => null,
                  ],[
                    'title' => '役職',
                    'width' => 'auto',
                    'class' => null,
                  ],[
                    'title' => '等級',
                    'width' => '100px',
                    'class' => null,
                  ],[
                    'title' => '号俸',
                    'width' => '100px',
                    'class' => null,
                  ],[
                    'title' => '雇用形態',
                    'width' => '100px',
                    'class' => null,
                  ],[
                    'title' => '入社日',
                    'width' => '100px',
                    'class' => 'u-tac',
                  ],[
                    'title' => 'ログインID',
                    'width' => '120px',
                    'class' => null,
                  ],[
                    'title' => '評価者/承認者',
                    'width' => '120px',
                    'class' => null,
                  ],[
                    'title' => '作成日',
                    'width' => '100px',
                    'class' => 'u-tac',
                  ]
                ]
              ?>
              <table>
                <colgroup>
                  @foreach($tableHead as $key => $theadItem)
                    <col style="width: {!! $theadItem['width'] !!}" />
                  @endforeach
                </colgroup>
                <thead>
                  <tr>
                    @foreach($tableHead as $key => $theadItem)
                      <th class="{!! $theadItem['class'] !!}">
                        <div class="item">{!! $theadItem['title'] !!}</div>
                      </th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                    <tr>
                      <!-- 氏名 -->
                      <td><div class="item">
                          <div class="p-user">
                            <div class="p-user__image">
                              <img class="c-image c-image--round" src="{{ $user->avatar_url }}" />
                            </div>
                            <div class="p-uesr__text">
                              <div class="name">{{ $user->full_name }}</div>
                            </div>
                          </div>
                        </div></td>
                      <!-- 部署 -->
                      <td><div class="item">{{ $user->department_label }}</div></td>
                      <!-- 役職 -->
                      <td><div class="item">{{ $user->position_label }}</div></td>
                      <!-- 等級 -->
                      <td><div class="item">{{ $user->grade_label }}</div></td>
                      <!-- 号俸 -->
                      <td><div class="item">{{ $user->salary_label }}</div></td>
                      <!-- 雇用形態 -->
                      <td><div class="item">{{ $user->employment_label }}</div></td>
                      <!-- 入社日 -->
                      <td class="u-tac"><div class="item">{{ $user->display_joined }}</div></td>
                      <!-- ログインID -->
                      <td><div class="item">{{ $user->login_code }}</div></td>
                      <!-- 評価者/承認者 -->
                      <td><div class="item item--step">
                          <p class="name">評価 : <span>山田 啓介</span></p>
                          <p class="name">承認 : <span>佐々木 誠</span></p>
                        </div></td>
                      <!-- 作成日 -->
                      <td class="u-tac"><div class="item">{{ $user->display_created }}</div></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{-- ページング --}}
            <x-pager :pagination="$users->appends($request->all())"/>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
