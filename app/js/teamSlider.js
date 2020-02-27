const teamNav = () => {
  const slide = $('.team__slider .item');
  const current = $(event.currentTarget);
  const count = $('.team').attr('data-count');
  const next = $('.team__slider__nav .next');
  const prev = $('.team__slider__nav .prev');

  if(!current.hasClass('item-nav--disabled')) {
    if(current.hasClass('next')) {
      const index = +count - 1;
      const translate = index * 310;
      $('.team').attr('data-count', index);
      slide.css({
        'transform' : `translateX(${translate}px`
      });
      prev.removeClass('item-nav--disabled');
      const stop = $(window).width() > 991 ? 4 : $(window).width() > 640 ? 3 : 2;
      if((slide.length - stop) < (index * -1)) {
        next.addClass('item-nav--disabled');
      }
    } else {
      const index = +count + 1;
      const translate = index * 310;
      $('.team').attr('data-count', index);
      slide.css({
        'transform' : `translateX(${translate}px`
      });
      next.removeClass('item-nav--disabled');
      if(index === 0) {
        prev.addClass('item-nav--disabled');
      }
    }
  }
};

export {teamNav}