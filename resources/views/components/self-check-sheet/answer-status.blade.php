@switch($status)
  @case(\App\Models\SelfCheckRating::STATUS_NOT_ANSWERED)
    <span class="status--1">未回答</span>
    @break
  @case(\App\Models\SelfCheckRating::STATUS_ANSWERING)
    <span class="status--1">回答中</span>
    @break
  @case(\App\Models\SelfCheckRating::STATUS_RATING)
    <span class="status--2">評価中</span>
    @break
  @case(\App\Models\SelfCheckRating::STATUS_APPROVING)
    <span class="status--3">承認中</span>
    @break
  @case(\App\Models\SelfCheckRating::STATUS_APPROVED)
    <span class="status--4">評価確定</span>
    @break
@endswitch
