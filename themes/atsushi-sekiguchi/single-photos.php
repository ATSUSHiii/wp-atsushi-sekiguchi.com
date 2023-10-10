<?php get_header(); ?>

<main class="l-main js-headerH">
  <div class="l-main__inner">

    <section class="p-works">

      <?php if (!post_password_required($post->ID)) : ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="p-works__inner">
              <ul class="js-slick">
                <li class="p-works__img">
                  <?php the_post_thumbnail(); ?>
                </li>
                <?php
                $img_set = SCF::get('img_set');
                foreach ($img_set as $fields) {
                  $img_url = wp_get_attachment_image_src($fields['photo'], 'large');
                  if (!empty($fields['photo'])) {
                    echo '
                  <li class="p-works__img">
                    <img src="' . $img_url[0] . '" alt="photos">
                  </li>
                  ';
                  }
                } ?>
              </ul>
              <h1 class="p-works__heading"><?php the_title(); ?></h1>
              <div class="p-works__tag">
                <div class="c-tag">
                  <?php
                  $cats = get_the_terms($post->ID, 'photos_cat');
                  foreach ($cats as $cat) {
                    echo '<a class="c-tag__item" href="' . get_term_link($cat) . '">' . $cat->name . '</a>';
                  }
                  ?>
                </div>
              </div>
              <div class="p-works__contents">
                <?php if (!empty(SCF::get('photo_client'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">クライアント</dt>
                    <dd class="c-definition__description">
                      <?php if (!empty(SCF::get('photo_client_url'))) : ?>
                        <a href="<?php echo SCF::get('photo_client_url'); ?>" target="_blank" rel="noopener noreferrer"><?php echo SCF::get('photo_client'); ?></a>
                      <?php else : ?>
                        <?php echo SCF::get('photo_client'); ?>
                      <?php endif; ?>
                    </dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('buy_name'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">販売先</dt>
                    <dd class="c-definition__description">
                      <?php if (!empty(SCF::get('buy_url'))) : ?>
                        <a href="<?php echo SCF::get('buy_url'); ?>" target="_blank" rel="noopener noreferrer"><?php echo SCF::get('buy_name'); ?></a>
                      <?php else : ?>
                        <?php echo SCF::get('buy_name'); ?>
                      <?php endif; ?>
                    </dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('photo_overview'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">撮影概要</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('photo_overview'); ?></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('photo_place'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">撮影地</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('photo_place'); ?></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('photo_item'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">撮影機材</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('photo_item'); ?></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('photo_setting'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">撮影設定</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('photo_setting'); ?></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('photo_soft'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">編集環境</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('photo_soft'); ?></dd>
                  </dl>
                <?php endif; ?>
              </div>

              <div class="p-works__contents">
                <?php the_content(); ?>
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