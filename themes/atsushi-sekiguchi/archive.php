<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$the_query = new WP_Query(array(
  'post_status' => 'publish',
  'post_type' => 'works', // ページの種類（例、page、post、カスタム投稿タイプ名）
  'paged' => $paged,
  'posts_per_page' => get_option('posts_per_page'), // 表示件数
  'orderby' => 'date',
  'order' => 'DESC',
  'cat' => $catid // カテゴリID指定
)); ?>

<main class="l-main js-headerH">
  <div class="l-main__inner">

    <section class="p-section">
      <div class="p-section__inner">
        <h2 class="c-heading">WORKS</h2>
        <div class="p-section__item">
          <div class="c-tab">
            <div class="c-tab__col">
              <a class="c-tab__button" href="all">ALL</a>
            </div>
            <?php
            $cats = get_the_terms($post->ID, 'works_cat');
            foreach ($cats as $cat) {
              echo '<div class="c-tab__col"><a class="c-tab__button" href=".' . get_term_link($cat) . '">' . $cat->name . '</a></div>';
            }
            ?>
          </div>
        </div>

        <div class="p-section__item row js-sort-item">

          <?php if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
          ?>
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
                  <div class="p-card__tagWrap">
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
                'total' => $the_query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '＜',
                'next_text' => '＞',
              ));
              ?>
            </div>
          </div>
        </div>

      </div>
    </section>

  </div>
</main>

<?php get_footer(); ?>