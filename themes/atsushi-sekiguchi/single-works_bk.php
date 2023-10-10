<?php get_header(); ?>

<main class="l-main js-headerH">
  <div class="l-main__inner">

    <section class="p-works">

      <?php if (!post_password_required($post->ID)) : ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="p-works__inner">
              <div class="p-works__contents">

                <div class="p-works__imgArea">
                  <ul class="c-slick js-slick">
                    <?php
                    $img_set = SCF::get('img_set');
                    foreach ($img_set as $fields) {
                      $imgurl = wp_get_attachment_image_src($fields['thumbnail'], 'large');
                    ?>
                      <!-- 画像がない時はthumbnail画像を表示 -->
                      <?php if ($fields['thumbnail'] === "") { ?>
                        <li class="c-slick__img">
                          <?php the_post_thumbnai(); ?>
                        </li>
                        <!-- それ以外（画像がある時）画像を表示 -->
                      <?php } else { ?>
                        <li class="c-slick__img">
                          <img src="<?php echo $imgurl[0]; ?>">
                        </li>
                      <?php } ?>
                    <?php } ?>
                  </ul>
                </div>
                <div class="p-works__item">
                  <h1 class="p-works__title">
                    <a class="p-works__link" href="<?php echo SCF::get('site_link'); ?>" target="_blank" rel="noopener noreferrer"><?php the_title(); ?></a>
                  </h1>
                  <div class="p-works__tagArea">
                    <div class="c-tag">
                      <?php
                      $tags = get_the_terms($post->ID, 'works_tag');
                      foreach ($tags as $tag) {
                        echo '<span class="c-tag__item">' . $tag->name . '</span>';
                      }
                      ?>
                    </div>
                  </div>
                  <div class="p-works__text">
                    <p><?php echo SCF::get('production_content'); ?></p>
                  </div>
                </div>
                <div class="p-works__item">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
        <?php endwhile;
        endif; ?>
      <?php else : ?>
        <?php echo get_the_password_form(); ?>
      <?php endif; ?>
    </section>

  </div>
</main>

<?php get_footer(); ?>