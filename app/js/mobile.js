const mobile = () => {
  const modal = $('.new-menu-modal');
  const btn = $(event.currentTarget);

  if(btn.hasClass('show')) {
    btn.removeClass('show');
    modal.css('top', '-150%');
  } else {
    btn.addClass('show');
    modal.css('top', '0');
  }
};

export {mobile}