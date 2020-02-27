const statisticsNav = () => {
  const graph = $('.graph-wrapper');
  const current = $(event.currentTarget);
  let index = graph.attr('data-count');
  const next = $('.statistics__coin-count--nav .nav .next');
  const prev = $('.statistics__coin-count--nav .nav .prev');

  if(!current.hasClass('item--disabled')) {
    if(current.hasClass('prev')) {
      //calc percent
      const blockW = $('.statistics__graph').width();
      const graphW = 2000;
      const newIndex = +index + 1;

      let px = graphW - (graphW / 23 * newIndex);
      px = px < blockW ? blockW : px;

      graph.attr('data-count', newIndex);
      graph.css({
        'transform' : `translateX(-${px}px)`
      });
      next.removeClass('item--disabled');

      if(px < blockW || px === blockW) {
        prev.addClass('item--disabled');
      }
    } else {
      //calc percent
      const blockW = $('.statistics__graph').width();
      const graphW = 2000;
      const newIndex = +index - 1;

      let px = graphW - (graphW / 23 * newIndex);
      px = px < blockW ? blockW : px;

      graph.attr('data-count', newIndex);
      graph.css({
        'transform' : `translateX(-${px}px)`
      });
      prev.removeClass('item--disabled');

      if(newIndex === 0) {
        next.addClass('item--disabled');
      }
    }
  }
};

export {statisticsNav}