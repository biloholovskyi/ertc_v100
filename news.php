<section class="news">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 class="main-title">Новости</h3>
        <div class="news__title">Важные новости</div>
        <?php
        $args = array(
          'numberposts' => 1,
          'orderby' => 'date',
          'order' => 'DESC',
          'tag' => 'main',
          'post_type' => 'post',
          'suppress_filters' => true,
        );

        $posts = get_posts($args);
        foreach ($posts as $post) {
          setup_postdata($post);
          ?>
          <a href="<?php the_permalink(); ?>" class="news__important-top">
            <picture>
              <source type="image/img+svg"
                      srcset="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>">
              <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>"
                   alt="<?php echo $post->post_title; ?>">
            </picture>
            <span class="content">
<!--                  <span class="content__small-title">--><?php //$cat = get_the_category($post->ID);
              //                    echo $cat[0]->cat_name; ?><!--</span>-->
                  <span class="content__title"><?php echo $post->post_title; ?></span>
                </span>
          </a>
          <?php
        }
        wp_reset_postdata(); // сброс
        ?>
      </div>
    </div>
    <div class="row news__row">
      <?php
      $args = array(
        'numberposts' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
        'tag' => 'importants',
        'post_type' => 'post',
        'suppress_filters' => true,
      );

      $posts = get_posts($args);
      foreach ($posts as $post) {
        setup_postdata($post);
        ?>
        <div class="col-12 col-sm-4">
          <a href="<?php the_permalink(); ?>" class="news__item">
            <picture>
              <source type="image/img+svg"
                      srcset="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>">
              <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>"
                   alt="<?php the_title(); ?>">
            </picture>
            <!--            <div class="news__item__small-title">--><?php //$cat = get_the_category($post->ID);
            //              echo $cat[0]->cat_name; ?><!--</div>-->
            <div class="news__item__title"><?php the_title(); ?></div>
          </a>
        </div>
        <?php
      }
      wp_reset_postdata(); // сброс
      ?>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="news__title">Новости ERTC</div>
      </div>
    </div>
    <div class="row all-news">
      <?php
      $args = array(
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'post',
        'suppress_filters' => true,
      );

      $posts = get_posts($args);
      $news_count = 0;
      foreach ($posts as $post) {
        setup_postdata($post);
        $tag = get_the_tags($post->ID);
        if ($tag[0]->slug != "main" and $tag[0]->slug != "importants") {
          $news_count++;
          ?>
          <div class="col-12 col-sm-4">
            <a href="<?php the_permalink(); ?>" class="news__item <?php if ($news_count > 9) {
              echo 'hidden';
            } ?>">
              <picture>
                <source type="image/img+svg"
                        srcset="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>">
                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>"
                     alt="<?php the_title(); ?>">
              </picture>
              <!--              <div class="news__item__small-title">--><?php //$cat = get_the_category($post->ID);
              //                echo $cat[0]->cat_name; ?><!--</div>-->
              <div class="news__item__title"><?php the_title(); ?></div>
            </a>
          </div>
          <?php
        }
      }
      wp_reset_postdata(); // сброс
      ?>
      <div class="col-12" style="display: flex">
        <a href="./news/" class="more-news">Больше новостей</a>
      </div>
    </div>
  </div>
</section>


<?php
$current_video = 0;
$next_video = 0;
$video_index = 0;
?>
<div class="video">
  <div class="container">
    <div class="row">
      <?php
      $args = array(
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'video',
        'suppress_filters' => true,
      );

      $posts = get_posts($args);
      foreach ($posts as $post) {
        $next_video++;
        $video_index = $next_video - 2;
        if ($posts[$video_index]->post_title == '') {
          $video_index = count($posts) - 1;
        }
        ?>
        <div class="col-12 col-md-4 next-video__box <?php if ($next_video != 2) {
          echo 'next-video__box--hidden';
        } else {
          echo 'next-active';
        } ?>">
          <h3 class="video__title">Видео</h3>
          <div class="video__name"><?php echo $posts[$video_index]->post_title; ?></div>
          <div class="video__time"><?php the_field('time_video', $posts[$video_index]->ID); ?></div>
          <div class="next-text">Далее:</div>
          <picture class="next-video">
            <source type="image/img+svg"
                    srcset="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>">
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="video">
          </picture>
          <div class="video__name"><?php the_title(); ?></div>
          <div class="video__time none-margin-bottom"><?php the_field('time_video'); ?></div>
        </div>
        <?php
      }
      wp_reset_postdata(); // сброс
      ?>

      <?php
      $args = array(
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'video',
        'suppress_filters' => true,
      );

      $posts = get_posts($args);
      foreach ($posts as $post) {
        $current_video++;
        ?>
        <div class="col-12 col-md-8 current-video__wrapper <?php if ($current_video > 1) {
          echo 'current-video__wrapper--hidden';
        } else {
          echo 'cur-active';
        } ?>" data-video="<?php the_field('link_video'); ?>">
          <picture class="current-video">
            <source type="image/img+svg"
                    srcset="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>">
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="video">
          </picture>
          <div class="play"></div>
        </div>
        <?php
      }
      wp_reset_postdata(); // сброс
      ?>
    </div>
  </div>
</div>