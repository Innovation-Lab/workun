<script>
  $(document).ready(function() {
    // シート階層選択
    $('.layer--select').on('change', function() {
      $("[data-remodal-id='modal_alert_sheet']").remodal().open()
    })
  })

  function changeHierarchy()
  {
    let hierarchy = $('[name=hierarchy]').val()
    let url = "{{ route('master.self-check.add') }}"
    location.href = `${url}?hierarchy=${hierarchy}`;
  }

  function cancelHierarchy()
  {
    $('[name=hierarchy]').val({{ $selfCheckSheet->hierarchy }})
  }

  function addFirst(self)
  {
    let hierarchy = $('[name=hierarchy]').val()
    let container = $(self).parents('.layer1-container')
    let first_index = $(container).find('.layer1').length
    $.ajax({
      url:'{{ route('master.self-check._loadFirst') }}',
      type:'GET',
      data:{
        'hierarchy': hierarchy,
        'first_index': first_index,
      }
    })
      .done(function (data) {
        container.children('.list').append(data)
      })
      .fail(function () {
        alert('エラーが発生しました。')
      })
  }

  function deleteFirst(self)
  {
    let third_index = $(self).parents('.layer1-container').find('.layer1:not(.delete)').length
    if (third_index < 2) {
      alert("階層1は１つ以上必要です。")
    } else {
      let layer = $(self).parents('.layer1')
      layer.find('.delete').val(1)
      layer.addClass('delete')
      layer.hide()
    }
  }

  function addSecond(self)
  {
    let hierarchy = $('[name=hierarchy]').val()
    let first_index = $(self).parents('.layer1').data('index')
    let container = $(self).parents('.layer2-container')
    let second_index = $(container).find('.layer2').length
    $.ajax({
      url:'{{ route('master.self-check._loadSecond') }}',
      type:'GET',
      data:{
        'hierarchy': hierarchy,
        'first_index': first_index,
        'second_index': second_index,
      }
    })
      .done(function (data) {
        container.children('.list').append(data)
      })
      .fail(function () {
        alert('エラーが発生しました。')
      })
  }

  function deleteSecond(self)
  {
    let third_index = $(self).parents('.layer2-container').find('.layer2:not(.delete)').length
    if (third_index < 2) {
      alert("階層2は１つ以上必要です。")
    } else {
      let layer = $(self).parents('.layer2')
      layer.find('.delete').val(1)
      layer.addClass('delete')
      layer.hide()
    }
  }

  function addThird(self)
  {
    let hierarchy = $('[name=hierarchy]').val()
    let first_index = $(self).parents('.layer1').data('index')
    let second_index = $(self).parents('.layer2').data('index')
    let container = $(self).parents('.layer3-container')
    let third_index = $(container).find('.layer3').length
    $.ajax({
        url:'{{ route('master.self-check._loadThird') }}',
        type:'GET',
        data:{
          'hierarchy': hierarchy,
          'first_index': first_index,
          'second_index': second_index,
          'third_index': third_index,
        }
      })
      .done(function (data) {
        container.children('.list').append(data)
      })
      .fail(function () {
        alert('エラーが発生しました。')
      })
  }

  function deleteThird(self)
  {
    let third_index = $(self).parents('.layer3-container').find('.layer3:not(.delete)').length
    if (third_index < 2) {
      alert("階層3は１つ以上必要です。")
    } else {
      let layer = $(self).parents('.layer3')
      layer.find('.delete').val(1)
      layer.addClass('delete')
      layer.hide()
    }
  }

  function searchUsers()
  {
    let department_id = $("#user_select_form [name=department_id]").val()
    let position_id = $("#user_select_form [name=position_id]").val()
    $.ajax({
        url:'{{ route('master.self-check._loadUsers') }}',
        type:'GET',
        data:{
          'department_id': department_id,
          'position_id': position_id,
        }
      })
      .done(function (data) {
        $('#user_list').html(data)
      })
      .fail(function () {
        alert('エラーが発生しました。')
      })
  }

  function selectUsers()
  {
    let selected_users_table = $('#selected_users tbody')
    let selected_users = $("#user_select [name=user_id]:checked")
    for (let user_index = 0; user_index < selected_users.length; user_index++) {
      let selected_user = selected_users[user_index]
      let user_id = $(selected_user).data('id')
      if ($(`#selected_users [data-user_id=${user_id}]`).length > 0) {
        continue
      }
      let user_image = $(selected_user).data('image')
      let user_name = $(selected_user).data('name')
      let user_department = $(selected_user).data('department')
      selected_users_table.append(`
<tr data-user_id="${user_id}">
  <td>
    <input
      type="hidden"
      name="self_check_sheet_targets[]"
      value="${user_id}"
    />
    <div class="item">
      <div class="p-user">
        <div class="p-user__image c-noImage">
          <img
            class="c-image c-image--round"
            src="${user_image}"
          />
        </div>
        <div class="p-uesr__text">
          <div class="name">
            ${user_name}
          </div>
        </div>
      </div>
    </div>
  </td>
  <td>
    <div class="item">
      ${user_department}
    </div>
  </td>
</tr>
        `)
    }
    if (selected_users.length > 0) {
      $("#no_user_area").hide()
      let selected_user_count = $("#selected_users tr").length
      $("#selected_user_count").text(selected_user_count.toLocaleString())
    }
  }
</script>
