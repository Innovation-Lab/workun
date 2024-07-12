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

