<?php get_header(); ?>

<main class="l-main js-headerH">
  <div class="l-main__inner">

    <section class="p-about">
      <div class="p-about__inner">
        <div class="p-about__contents container">
          <div class="row">
            <div class="col-md-4 text-center">
              <?php
              $image = SCF::get('about_img');
              echo wp_get_attachment_image($image, 'large');
              ?>
            </div>
            <div class="col-md-8">
              <div class="p-about__container">
                <div class="p-about__heading">
                  <h2 class="c-heading">ABOUT</h2>
                </div>
                <div class="p-about__item">
                  <dl class="c-definition">
                    <dt class="c-definition__term">名前</dt>
                    <dd class="c-definition__description">関口 敦</dd>
                  </dl>
                  <dl class="c-definition">
                    <dt class="c-definition__term">所在地</dt>
                    <dd class="c-definition__description"><?php echo SCF::get('about_place'); ?></dd>
                  </dl>
                </div>
                <div class="p-about__item">
                  <?php the_content(); ?>
                </div>
              </div>
              <?php if (!empty(SCF::get('about_history'))) : ?>
                <div class="p-about__container">
                  <div class="p-about__heading">
                    <h2 class="c-heading">HISTORY</h2>
                  </div>
                  <div class="p-about__item">
                    <?php
                    $about_history = SCF::get('about_history');
                    foreach ($about_history as $fields) { ?>
                      <dl class="c-definition">
                        <dt class="c-definition__term"><?php echo $fields['about_year']; ?></dt>
                        <dd class="c-definition__description"><?php echo $fields['about_event']; ?></dd>
                      </dl>
                    <?php } ?>
                  </div>
                </div>
              <?php endif; ?>
              <?php if (!empty(SCF::get('skill_set'))) : ?>
                <div class="p-about__container">
                  <div class="p-about__heading">
                    <h2 class="c-heading">SKILL</h2>
                  </div>
                  <div class="p-about__item">
                    <?php
                    $skill_set = SCF::get('skill_set');
                    foreach ($skill_set as $fields) { ?>
                      <dl class="c-definition">
                        <dt class="c-definition__term"><?php echo $fields['skill_name']; ?></dt>
                        <dd class="c-definition__description"><?php echo $fields['skill_years']; ?></dd>
                      </dl>
                    <?php } ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</main>

<?php get_footer(); ?>