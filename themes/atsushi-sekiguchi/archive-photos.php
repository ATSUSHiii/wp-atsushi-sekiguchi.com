<?php get_header(); ?>

<main class="l-main js-headerH">
  <div class="l-main__inner">

    <section class="p-section">
      <div class="p-section__inner">
        <h2 class="c-heading">撮影事例<span class="c-heading__small">PHOTO</span></h2>

        <div class="p-section__item row">
          <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $wp_query = new WP_Query(array(
            'post_status' => 'publish',
            'post_type' => 'Photos', // ページの種類（例、page、post、カスタム投稿タイプ名）
            'paged' => $paged,
            'posts_per_page' => get_option('posts_per_page'), // 表示件数
            'orderby' => 'date',
            'order' => 'DESC',
            'cat' => $catid // カテゴリID指定
          )); ?>

          <?php if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) : $wp_query->the_post();
          ?>

              <?php $pass = $post->post_password; ?>
              <div class="p-card col-sm-6 col-lg-4 <?php if ($pass !== '') : ?>is-secret<?php endif; ?>">
                <div class="p-card__link">
                  <a href="<?php the_permalink(); ?>">
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

            <?php endwhile;
          else : ?>

            <p>記事がありません。</p>

          <?php endif; ?>
        </div>

        <!-- Page nation -->
        <div class="p-section__item">
          <div class="c-pagination">
            <div class="c-pagination__inner">
              <?php //ページリスト表示処理
              global $wp_rewrite;
              $paginate_base = get_pagenum_link(1);
              if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
                $paginate_format = '';
                $paginate_base = add_query_arg('paged', '%#%');
              } else {
                $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') .
                  user_trailingslashit('page/%#%/', 'paged');
                $paginate_base .= '%_%';
              }
              echo paginate_links(array(
                'base' => $paginate_base,
                'format' => $paginate_format,
                'total' => $wp_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '＜',
                'next_text' => '＞',
              ));
              ?>
            </div>
          </div>
        </div>

    </section>

  </div>
</main>

<?php get_footer(); ?>