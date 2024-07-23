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
          <div class="p-organization__body">
            <ul class="p-organization__list">
              <!-- 役職 -->
              <li class="p-organization__item">
                <div class="head">
                  <p class="title">役職</p>
                  <div class="action">
                    <a href="{{route('master.organization.position.add')}}" class="c-button c-button--lineAccent c-button--xs">追加</a>
                  </div>
                </div>
                <div class="body">
                  <div class="p-table c-scroll">
                    <?php 
                      $tableHead = [
                        [
                          'title' => '名称',
                          'width' => 'auto',
                          'class' => null,
                        ],[
                          'title' => '人数',
                          'width' => '50px',
                          'class' => null,
                        ]
                      ]
                    ?>
                    <table class="sticky w-auto">
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
                        @for($tableBody = 1; $tableBody < 8; $tableBody++)
                          <tr data-href="{{route('master.organization.position.edit')}}">
                            <!-- 名称 -->
                            <td><div class="item">代表取締役社長</div></td>
                            <!-- 人数 -->
                            <td><div class="item" data-unit="名">{{ $tableBody }}</div></td>
                          </tr>
                        @endfor
                      </tbody>
                    </table>
                  </div> 
                </div>
              </li>
              <!-- 等級 -->
              <li class="p-organization__item">
                <div class="head">
                  <p class="title">等級</p>
                  <div class="action">
                    <a href="{{route('master.organization.grade.add')}}" class="c-button c-button--lineAccent c-button--xs">追加</a>
                  </div>
                </div>
                <div class="body">
                <div class="p-table c-scroll">
                    <?php 
                      $tableHead = [
                        [
                          'title' => '名称',
                          'width' => 'auto',
                          'class' => null,
                        ],[
                          'title' => '人数',
                          'width' => '50px',
                          'class' => null,
                        ]
                      ]
                    ?>
                    <table class="sticky w-auto">
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
                        @for($tableBody = 1; $tableBody < 8; $tableBody++)
                          <tr data-href="{{route('master.organization.grade.edit')}}">
                            <!-- 名称 -->
                            <td><div class="item">M3</div></td>
                            <!-- 人数 -->
                            <td><div class="item" data-unit="名">{{ $tableBody }}</div></td>
                          </tr>
                        @endfor
                      </tbody>
                    </table>
                  </div> 
                </div>
              </li>
              <!-- 号俸 -->
              <li class="p-organization__item">
                <div class="head">
                  <p class="title">号俸</p>
                  <div class="action">
                    <a href="{{route('master.organization.salary.add')}}" class="c-button c-button--lineAccent c-button--xs">追加</a>
                  </div>
                </div>
                <div class="body">
                <div class="p-table c-scroll">
                    <?php 
                      $tableHead = [
                        [
                          'title' => '名称',
                          'width' => 'auto',
                          'class' => null,
                        ]
                      ]
                    ?>
                    <table class="sticky w-auto">
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
                        @for($tableBody = 1; $tableBody < 21; $tableBody++)
                          <tr data-href="{{route('master.organization.salary.edit')}}">
                            <!-- 名称 -->
                            <td><div class="item">{{ $tableBody }}号</div></td>
                          </tr>
                        @endfor
                      </tbody>
                    </table>
                  </div> 
                </div>
              </li>
              <!-- 雇用形態 -->
              <li class="p-organization__item">
                <div class="head">
                  <p class="title">雇用形態</p>
                  <div class="action">
                    <a href="{{route('master.organization.employment.add')}}" class="c-button c-button--lineAccent c-button--xs">追加</a>
                  </div>
                </div>
                <div class="body">
                <div class="p-table c-scroll">
                    <?php 
                      $tableHead = [
                        [
                          'title' => '名称',
                          'width' => 'auto',
                          'class' => null,
                        ],[
                          'title' => '人数',
                          'width' => '50px',
                          'class' => null,
                        ]
                      ]
                    ?>
                    <table class="sticky w-auto">
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
                        @for($tableBody = 1; $tableBody < 4; $tableBody++)
                          <tr data-href="{{route('master.organization.employment.edit')}}">
                            <!-- 名称 -->
                            <td><div class="item">アルバイト・パート</div></td>
                            <!-- 人数 -->
                            <td><div class="item" data-unit="名">{{ $tableBody }}</div></td>
                          </tr>
                        @endfor
                      </tbody>
                    </table>
                  </div> 
                </div>
              </li>
            </ul>
          </div>
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
              @include('master.organization._chart')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('master.organization._script_layer')
@endsection
    