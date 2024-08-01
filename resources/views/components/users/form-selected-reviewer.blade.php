<div class="p-user" name="reviewer_lists">
  <input
    type="hidden"
    name="reviewers[]"
    value="{{ $user->id }}">
  <div class="p-user__image c-noImage">
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
