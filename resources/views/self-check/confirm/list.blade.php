@extends('layout.layout--base')
@section('title', 'セルフチェック-評価対象者一覧')
@section('content')
  <div class="l-index">
    <div class="p-page">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a href="{{route('master.member.index')}}" class="return">
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          <p class="title">2024年 9月 :  基幹職 仕事ぶりチェック</p>
        </div>
      </div>
      <div class="p-page__body">
        <div class="p-tableBox">
          <div class="p-tableBox__head">
            <div class="mainText">
              <p class="title">評価対象者一覧</p>            
            </div>
          </div>
          <div class="p-tableBox__body">
            {{-- テーブル一覧 --}}
            <div class="p-table c-scroll h-auto">
              <?php
                $tableHead = [
                  [
                    'title' => '記入日',
                    'width' => '100',
                    'class' => 'u-tac',
                  ],[
                    'title' => 'ステータス',
                    'width' => '90',
                    'class' => null,
                  ],[
                    'title' => '氏名',
                    'width' => '150',
                    'class' => null,
                  ],[
                    'title' => '部署',
                    'width' => '130',
                    'class' => null,
                  ],[
                    'title' => '役職',
                    'width' => '170',
                    'class' => null,
                  ],[
                    'title' => '等級',
                    'width' => '100',
                    'class' => null,
                  ],[
                    'title' => '雇用形態',
                    'width' => 'auto',
                    'class' => null,
                  ]
                ]
              ?>
              <table>
                <colgroup>
                  @foreach($tableHead as $key => $theadItem)
                    <col class="u-w{!! $theadItem['width'] !!}" />
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
                  @for($tableBody = 1; $tableBody < 4; $tableBody++)
                  <tr data-href="{{ route('self-check.confirm') }}">
                    <!-- 部署 -->
                    <td class="u-tac"><div class="item">2024/09/05</div></td>
                    <!-- ステータス -->
                    <td>
                      <div class="item">
                        <span class="status--1">未評価</span>
                        <span class="status--4">評価済み</span>
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
                    <!-- 部署 -->
                    <td><div class="item">売買の窓口</div></td>
                    <!-- 役職 -->
                    <td><div class="item">一般社員</div></td>
                    <!-- 等級 -->
                    <td><div class="item">M1</div></td>
                    <!-- 雇用形態 -->
                    <td><div class="item">正社員</div></td>
                  </tr>
                  @endfor
                </tbody>
              </table>
            </div>
            {{-- ページング --}}
            <div class="p-pager">
              <p class="count">全 4 件中 1～4 件目</p>
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
      </div>
    </div>
  </div>
@endsection
    