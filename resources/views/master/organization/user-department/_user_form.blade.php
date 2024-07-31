<div class="p-tableBox link_employee">
  <div class="p-tableBox__head">
    <div class="mainText">
      <p class="title">従業員数</p>
      <div class="count">
        <span class="unit">全</span>
        <p class="number" id="total_users">{{ number_format($users->total()) }}</p>
        <span class="unit">名</span>
      </div>
    </div>
    <div class="action"></div>
  </div>
  {{-- ページング(件数のみ) --}}
    <div class="p-pager">
      <p class="count">
        全 {{ number_format($users->total()) }} 件中
        {{ number_format($users->firstItem()) }}～{{ number_format($users->lastItem()) }} 件目
      </p>
    </div>
  {{--  従業員一覧を表示  --}}
    @include('master.organization.user-department._user_list')
  {{-- ページング --}}
  <x-pager :pagination="$users->appends($request->all())" />
</div>

@include('master.organization.user-department._script')
