<?php get_header(); ?>

<main class="l-main js-headerH">
  <div class="l-main__inner">

    <section class="p-works">

      <?php if (!post_password_required($post->ID)) : ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="p-works__inner">

              <div class="p-works__img">
                <?php the_post_thumbnail(); ?>
              </div>
              <h1 class="p-works__heading"><?php the_title(); ?></h1>
              <div class="p-works__tag">
                <div class="c-tag">
                  <?php
                  $cats = get_the_terms($post->ID, 'works_cat');
                  foreach ($cats as $cat) {
                    echo '<a class="c-tag__item" href="' . get_term_link($cat) . '">' . $cat->name . '</a>';
                  }
                  ?>
                </div>
              </div>
              <div class="p-works__contents">
                <?php if (!empty(SCF::get('site_link'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">URL</dt>
                    <dd class="c-definition__description"><a href="<?php echo SCF::get('site_link'); ?>" target="_blank" rel="noopener noreferrer"><?php echo SCF::get('site_link'); ?></a></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('production_content'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">制作概要</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('production_content'); ?></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('production_items'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">担当業務</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('production_items'); ?></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('production_time'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">制作期間</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('production_time'); ?></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('development_used'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">開発環境</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('development_used'); ?></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('cms_used'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">CMS</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('cms_used'); ?></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('css_design'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">CSS設計</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('css_design'); ?></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('library_used'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">ライブラリ</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('library_used'); ?></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty(SCF::get('tools_used'))) : ?>
                  <dl class="c-definition">
                    <dt class="c-definition__term">ツール</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('tools_used'); ?></dd>
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