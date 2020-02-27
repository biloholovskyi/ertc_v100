const setCategory = () => {
  const items = $('.rubricator .item ');

  let slug = window.location.href;
  slug = slug.split('/category/');

  if(slug.length > 1) {
    slug = slug[1].split('/')[0];

    $(`#${slug}`).addClass('item--active');
  }

};

export {setCategory}