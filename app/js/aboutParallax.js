const img = $('.about-home__img');
const about = $('.about-text--new');
const wrapper = $('.about-wrapper');

const aboutParallax = () => {
  if(img.length > 0) {
    const limit =  +about.height() + +about.css('padding-top').split('px')[0] + +about.css('padding-bottom').split('px')[0];
    // hide other
    const stop = +wrapper.height() - limit;

    if(pageYOffset > limit) {
      img.css({
        'position' : `absolute`,
        'top' : `100%`
      })
    } else {
      img.css({
        'position' : `fixed`,
        'top' : `auto`
      })
    }
  }
};

export {aboutParallax}