<?php get_header(); ?>

<main class="l-main js-headerH">
  <div class="l-main__inner">

    <section class="p-single">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php if (has_post_thumbnail()) : ?>
            <div class="p-single__thumbnail">
              <?php the_post_thumbnai(); ?>
            </div>
          <?php endif; ?>

          <h1><?php the_title(); ?></h1>
          <div>
            <?php the_content(); ?>
          </div>
      <?php endwhile;
      endif; ?>
    </section>

  </div>
</main>

<?php get_footer(); ?>