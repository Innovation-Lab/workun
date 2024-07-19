/* ! ==================================================

- 共通JS

================================================== */
// サイドメニュー開閉
$(document).on('click', '.js-toggleMenu--button', function(){
  let This = $(this),
      Tag = $('.p-sideNav');
  if(Tag.hasClass('close')){
    This.removeClass('close');
    Tag.removeClass('close');
    $('body').removeClass('sideNav--close');
  }else{
    This.addClass('close');
    Tag.addClass('close');
    $('body').addClass('sideNav--close');
  }
});

// table tr　リンク
$('[data-href]').on('click', function(e) {
  const href = $(this).data('href');
  window.location.href = href;
});

// チェックボックス 一括チェック
$('#all').on('click',function() {
  $('input[name="check[]"]').prop('checked',this.checked);
});
$('input[name="check[]"]').on('click',function(){
  if ($('input[name="check[]"]').length === $('input[name="check[]"]:checked').length) {
    $('#all').prop('checked', true);
  } else {
    $('#all').prop('checked', false);
  }
});