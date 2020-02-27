const openVideo = () => {
  const modalBox = $('.modal-wrapper-video');
  const current = $(event.currentTarget);
  const link = current.attr('data-link');

  $('#video-modal').attr('src', `https://www.youtube.com/embed/${link}`);
  modalBox.fadeIn('slow').css('display', 'flex');
};

const closeVideo = () => {
  $('#video-modal').attr('src', 'https://www.youtube.com/embed/');
  $('.modal-wrapper-video').fadeOut('slow');
};

export {openVideo, closeVideo}