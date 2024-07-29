@extends('layout.layout--base')
@section('title', 'セルフチェック-評価対象者一覧')
@section('content')
  <div class="l-index">
    <div class="p-page">
      <div class="p-page__head">
        <!-- ページタイトル -->
        <div class="p-head">
          <a
            href="{{ route('self-check.index', ['type' => 'rating']) }}"
            class="c-button__back"
          >
            <svg width="28" height="28"><use xlink:href="#chevron_left" /></svg>
          </a>
          <p class="title">
            {{ date('Y年m月', strtotime("{$term}-01")) }} :
            {{ $selfCheckSheet->display_title }}
          </p>
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
                'title' => '号俸',
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
                  @foreach($self_check_ratings as $self_check_rating)
                    <tr data-href="{{ route('self-check.rating', $self_check_rating) }}">
                      <!-- 部署 -->
                      <td class="u-tac">
                        <div class="item">{{ $self_check_rating->display_answered }}</div>
                      </td>
                      <!-- ステータス -->
                      <td>
                        <div class="item">
                          <x-self-check-sheet.answer-status
                            :status="data_get($self_check_rating, 'status')"
                          />
                        </div>
                      </td>
                      <!-- 氏名 -->
                      <td>
                        <div class="item">
                          <div class="p-user">
                            <div class="p-user__image c-noImage">
                              <img
                                class="c-image c-image--round"
                                src="{{ data_get($self_check_rating, 'user.avatar_url') }}"
                              />
                            </div>
                            <div class="p-uesr__text">
                              <div class="name">
                                {{ data_get($self_check_rating, 'user.full_name') }}
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <!-- 部署 -->
                      <td><div class="item">{{ data_get($self_check_rating, 'user.department_label') }}</div></td>
                      <!-- 役職 -->
                      <td><div class="item">{{ data_get($self_check_rating, 'user.position_label') }}</div></td>
                      <!-- 等級 -->
                      <td><div class="item">{{ data_get($self_check_rating, 'user.grade_label') }}</div></td>
                      <!-- 号俸 -->
                      <td><div class="item">{{ data_get($self_check_rating, 'user.salary_label') }}</div></td>
                      <!-- 雇用形態 -->
                      <td><div class="item">{{ data_get($self_check_rating, 'user.employment_label') }}</div></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{-- ページング --}}
            <x-pager :pagination="$self_check_ratings->appends(request()->all())"/>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

