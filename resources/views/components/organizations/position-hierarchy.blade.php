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
              @foreach($positions as $position)
                <tr data-href="{{ route('master.organization.position.edit', $position) }}">
                  <!-- 名称 -->
                  <td>
                    <div class="item">
                      {{ $position->name }}
                    </div>
                  </td>
                  <!-- 人数 -->
                  <td>
                    <div class="item" data-unit="名">
                      {{ number_format($position->users()->count()) }}
                    </div>
                  </td>
              @endforeach
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
              @foreach($grades as $grade)
                <tr data-href="{{ route('master.organization.grade.edit', $grade) }}">
                  <!-- 名称 -->
                  <td>
                    <div class="item">
                      {{ $grade->name }}
                    </div>
                  </td>
                  <!-- 人数 -->
                  <td>
                    <div class="item" data-unit="名">
                      {{ number_format($grade->users()->count()) }}
                    </div>
                  </td>
              @endforeach
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
              @foreach($salaries as $salary)
                <tr data-href="{{ route('master.organization.salary.edit', $salary) }}">
                  <!-- 名称 -->
                  <td>
                    <div class="item">
                      {{ $salary->name }}
                    </div>
                  </td>
              @endforeach
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
              @foreach($employments as $employment)
                <tr data-href="{{ route('master.organization.employment.edit', $employment) }}">
                  <!-- 名称 -->
                  <td>
                    <div class="item">
                      {{ $employment->name }}
                    </div>
                  </td>
                  <!-- 人数 -->
                  <td>
                    <div class="item" data-unit="名">
                      {{ number_format($employment->users()->count()) }}
                    </div>
                  </td>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </li>
  </ul>
</div>
