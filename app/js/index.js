import 'normalize.css';
import {inputForm} from "./input";
import {aboutParallax} from './aboutParallax'
import {openVideo, closeVideo} from "./openVideo"
import {setCategory} from "./rubricator";
import {statisticsNav} from "./statistics";
import {teamNav} from "./teamSlider";
import {mobile} from "./mobile";

$(document).ready(function(){
  aboutParallax();
  setCategory();

  $('input').on('input', inputForm);
  $('.page-video__item').on('click', openVideo);
  $('.modal-video__close').on('click', closeVideo);
  $('.statistics__coin-count--nav .nav .item').on('click', statisticsNav);
  $('.team__slider__nav .item-nav').on('click', teamNav);
  $('.mobile-menu-btn').on('click', mobile);

  $('#about-form').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '/wp-content/themes/ertc/mail.php',
      type: 'POST',
      data: 'name=' + $('#input-name').val() + '&tel=' + $('#input-tel').val() + '&comment=' + $('#input-comment').val(),
      success: function( data ) {
        $('#input-name').val('');
        $('#input-tel').val('');
        $('#input-comment').val('');
        $('#input-name').parent('.input-wrapper--active').removeClass('input-wrapper--active');
        $('#input-tel').parent('.input-wrapper--active').removeClass('input-wrapper--active');
        $('#input-comment').parent('.input-wrapper--active').removeClass('input-wrapper--active');
        const modal = $('.modal-alert');
        modal.fadeIn('slow').css('display', 'flex');
      }
    });
  });
});

$(window).resize(function () {

});

$(window).scroll(() => {
  aboutParallax();
});

$(document).on('click', function (e) {
  let modal = $('.modal-video');
  let btn = $('.page-video__item');

  if (!btn.is(e.target) && btn.has(e.target).length === 0) {
    if (!modal.is(e.target) && modal.has(e.target).length === 0) {
      closeVideo();
    }
  }
});