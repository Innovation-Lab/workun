<div class="item">
  <div class="close">×</div>
  <div class="head u-align between">
    <p class="title c-txt__md c-txt__weight--600">「{{ $title }}」従業員数</p>
    <a href="{{route('master.organization.edit_link_employee')}}" class="c-button--text">編集</a>
  </div>
  <div class="count">
    <span class="unit">全</span>
    <p class="number">
      {{ number_format($members->count()) }}
    </p>
    <span class="unit">名</span>
  </div>
  <div class="body u-p0">
    <div class="c-scroll">
      <ul>
        @foreach ($members as $member)
          <li>
            <div class="p-user">
              <div class="p-user__image c-noImage">
                <img class="c-image c-image--round" src="">
              </div>
              <div class="p-user__text">
                <div class="name">
                  {{ $member->full_name }}
                </div>
              </div>
            </div>
            <p class="position">
              {{ $member->position_label }}
            </p>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
