<script>
  // 検索機能
  function serachApprover()
  {
    let departmentId = $('#approver_department_id').val();
    let positionId = $('#approver_position_id').val();

    $.ajax({
      url:'{{ route('master.member._lodeUsers',  ['type' => 'authorizer']) }}',
      type:'GET',
      data:{
        'department_id': departmentId,
        'position_id': positionId
      }
    })
    .done(function (data) {
      $('#approver-list').html(data);
    })
    .fail(function () {
      alert('承認者を取得できませんでした。')
    })
  }

  // 承認者を表示
  function showApprovers() {
    var selectedApprovers = [];
    $('#approver-list input[type="checkbox"]:checked').each(function() {
      var userId = $(this).val();
      var userName = $(this).closest('tr').find('.name').text();
      var imgPath = $(this).closest('tr').find('[name="img_path"]').attr('src');
      selectedApprovers.push({ id: userId, name: userName, img_path: imgPath });
    });

    var approverHtml = '';
    selectedApprovers.forEach(function(approver) {
      if ($(`input[name="approvers[]"][value="${approver.id}"]`).length === 0) {
        approverHtml += `
          <div class="p-user" name="approver_lists">
            <input type="hidden" name="approvers[]" value="${approver.id}">
            <div class="p-user__image c-noImage">
              <img class="c-image c-image--round" src="${approver.img_path}">
            </div>
            <div class="p-user__text">
              <div class="name">${approver.name}</div>
            </div>
            <span class="p-user__delete">
              <svg width="14" height="14"><use xlink:href="#close" /></svg>
            </span>
          </div>
        `;
      };
    });

    $('#selected-approvers').prepend(approverHtml);
    $('[data-remodal-id=modal_approver]').remodal().close();
  }

  // 評価者の検索機能
  function serachReviewer()
  {
    let departmentId = $('#reviewer_department_id').val();
    let positionId = $('#reviewer_position_id').val();

    $.ajax({
      url:'{{ route('master.member._lodeUsers',  ['type' => 'rater']) }}',
      type:'GET',
      data:{
        'department_id': departmentId,
        'position_id': positionId
      }
    })
    .done(function (data) {
      $('#reviewer-list').html(data);
    })
    .fail(function () {
      alert('評価者を取得できませんでした。')
    })
  }

  // 承認者を表示
  function showReviewers() {
    var selectedReviewers = [];
    $('#reviewer-list input[type="checkbox"]:checked').each(function() {
      var userId = $(this).val();
      var userName = $(this).closest('tr').find('.name').text();
      var imgPath = $(this).closest('tr').find('[name="img_path"]').attr('src');
      selectedReviewers.push({ id: userId, name: userName, img_path: imgPath });
    });

    var reviewerHtml = '';
    selectedReviewers.forEach(function(reviewer) {
      if ($(`input[name="reviewers[]"][value="${reviewer.id}"]`).length === 0) {
        reviewerHtml += `
          <div class="p-user" name="reviewer_lists">
            <input type="hidden" name="reviewers[]" value="${reviewer.id}">
            <div class="p-user__image c-noImage">
              <img class="c-image c-image--round" src="${reviewer.img_path}">
            </div>
            <div class="p-user__text">
              <div class="name">${reviewer.name}</div>
            </div>
            <span class="p-user__delete">
              <svg width="14" height="14"><use xlink:href="#close" /></svg>
            </span>
          </div>
        `;
      };
    });

    $('#selected-reviewers').prepend(reviewerHtml);
    $('[data-remodal-id=modal_reviewer]').remodal().close();
  }

  // p-user__deleteをクリックした時、親のdiv.p-userを削除
  $(document).on('click', '.p-user__delete', function() {
    $(this).closest('.p-user').remove();
  });
</script>
