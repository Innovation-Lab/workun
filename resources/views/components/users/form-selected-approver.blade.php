<div class="p-user" name="approver_lists">
  <input
    type="hidden"
    name="approvers[]"
    value="{{ $user->id }}">
  <div class="p-user__image">
    <img class="c-image c-image--round" src="{{ $user->avatar_url }}">
  </div>
  <div class="p-user__text">
    <div class="name">
      {{ $user->full_name }}
    </div>
  </div>
  <span class="p-user__delete">
    <svg width="14" height="14"><use xlink:href="#close" /></svg>
  </span>
</div>
