<?php get_header(); ?>

<main class="l-main js-headerH">

  <div class="js-slick">
    <?php
    $args = array(
      'post_type' => 'mainvisual', // 投稿タイプを指定
      'posts_per_page' => -1, // 表示する記事数
      'order' => 'ASC',
    );
    $wp_query = new WP_Query($args);
    if ($wp_query->have_posts()) :
      while ($wp_query->have_posts()) :
        $wp_query->the_post();
    ?>
        <figure class="c-mainVisual js-mainVisual">
          <?php the_post_thumbnail(); ?>
        </figure>
      <?php endwhile; ?>
    <?php else : ?>
    <?php endif;
    wp_reset_postdata();
    ?>

  </div>

  <div class="l-main__inner">

    <section class="p-section u-fadeUp js-fade">
      <div class="p-section__inner">
        <h2 class="c-heading">サービス<span class="c-heading__small">SERVICE</span></h2>
        <div class="p-section__item row">
          <?php
          $args = array(
            'post_type' => 'service', // 投稿タイプを指定
            'posts_per_page' => 3, // 表示する記事数
          );
          $wp_query = new WP_Query($args);
          if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) :
              $wp_query->the_post();
          ?>

              <div class="p-card col-sm-4">
                <!-- <a class="p-card__inner" href="<?php echo get_permalink(); ?>" target="_blank" rel="noopener noreferrer"> -->
                <h3 class="p-card__title"><?php the_title(); ?><span class="p-card__titleE"><?php echo SCF::get('service_title'); ?></span></h3>
                <div class="p-card__icon">
                  <?php
                  $service_icon = SCF::get('service_icon');
                  echo wp_get_attachment_image($service_icon, 'large');
                  ?>
                </div>
                <div class="p-card__text"><?php the_content(); ?></div>
                <!-- </a> -->
              </div>
            <?php endwhile; ?>
          <?php else : ?>
          <?php endif;
          wp_reset_postdata();
          ?>
        </div>
      </div>
    </section>

    <section class="p-section u-fadeUp js-fade">
      <div class="p-section__inner">
        <h2 class="c-heading">制作事例<span class="c-heading__small">WORKS</span></h2>

        <div class="p-section__item row">
          <?php
          $args = array(
            'post_type' => 'works', // 投稿タイプを指定
            'posts_per_page' => 6, // 表示する記事数
          );
          $wp_query = new WP_Query($args);
          if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) :
              $wp_query->the_post();
          ?>
              <?php $pass = $post->post_password; ?>
              <div class="p-card col-sm-6 col-lg-4 <?php if ($pass !== '') : ?>is-secret<?php endif; ?>">
                <div class="p-card__link">
                  <a href="<?php echo get_permalink(); ?>">
                    <div class="p-card__img">
                      <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="p-card__label">
                      <p><?php the_title(); ?></p>
                    </div>
                  </a>
                  <div class="p-card__tag">
                    <div class="c-tag">
                      <?php
                      $tags = get_the_terms($post->ID, 'works_tag');
                      foreach ($tags as $tag) {
                        echo '<a class="c-tag__item" href="' . get_term_link($tag) . '">' . $tag->name . '</a>';
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
          <?php endif;
          wp_reset_postdata();
          ?>

        </div>

        <div class="p-section__button">
          <a href="<?php echo esc_url(home_url()); ?>/works/" class="c-button">more</a>
        </div>
      </div>
    </section>

    <section class="p-section u-fadeUp js-fade">
      <div class="p-section__inner">
        <h2 class="c-heading">撮影事例<span class="c-heading__small">PHOTO</span></h2>

        <div class="p-section__item row">
          <?php
          $args = array(
            'post_type' => 'photos', // 投稿タイプを指定
            'posts_per_page' => 6, // 表示する記事数
          );
          $wp_query = new WP_Query($args);
          if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) :
              $wp_query->the_post();
          ?>
              <?php $pass = $post->post_password; ?>
              <div class="p-card col-sm-6 col-lg-4 <?php if ($pass !== '') : ?>is-secret<?php endif; ?>">
                <div class="p-card__link">
                  <a href="<?php echo get_permalink(); ?>">
                    <div class="p-card__img">
                      <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="p-card__label">
                      <p><?php the_title(); ?></p>
                    </div>
                  </a>
                  <div class="p-card__tag">
                    <div class="c-tag">
                      <?php
                      $tags = get_the_terms($post->ID, 'photos_tag');
                      foreach ($tags as $tag) {
                        echo '<a class="c-tag__item" href="' . get_term_link($tag) . '">' . $tag->name . '</a>';
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
          <?php endif;
          wp_reset_postdata();
          ?>

        </div>

        <div class="p-section__button">
          <a href="<?php echo esc_url(home_url()); ?>/photos/" class="c-button">more</a>
        </div>
      </div>
    </section>

  </div>
</main>

<?php get_footer(); ?>