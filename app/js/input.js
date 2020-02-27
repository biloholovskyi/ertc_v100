const inputForm = () => {
  const current = $(event.currentTarget);

  if(current.val()) {
    current.parent('.input-wrapper').addClass('input-wrapper--active');
  } else {
    current.parent('.input-wrapper').removeClass('input-wrapper--active');
  }
};

export {inputForm}