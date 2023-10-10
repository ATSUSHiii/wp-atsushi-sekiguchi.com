<?php get_header(); ?>

<main class="l-main js-headerH">
  <div class="l-main__inner">

    <section class="p-section">
      <div class="p-section__inner">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h2 class="c-heading"><?php the_title(); ?></h2>
            <div class="p-section__item">
              <div class="p-gallery" id="app">
                <!-- Gallery Categories -->
                <div class="p-gallery__categories row">
                  <div v-for="(category, index) in categories" :key="index" class="category p-card col-md-4" @click="openModal(index)">
                    <div class="p-card__link">
                      <div class="p-card__img">
                        <img :src="category.thumbnail" :alt="category.name">
                      </div>
                      <h3 class="p-card__label category-name">{{ category.name }}</h3>
                    </div>
                  </div>
                </div>

                <!-- Gallery Modal -->
                <div class="p-gallery__modal" v-if="modalVisible">
                  <div class="p-gallery__contents">
                    <div class="swiper-container">
                      <div class="swiper-wrapper">
                        <div v-for="(image, index) in categories[selectedCategory].images" :key="index" class="swiper-slide">
                          <img :src="image.src" :alt="image.alt">
                        </div>
                      </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="p-gallery__closeBtn" @click="closeModal"><i class="fa fa-times" aria-hidden="true"></i></div>

                  </div>
                </div>
              </div>
            </div>
        <?php endwhile;
        endif; ?>
      </div>
    </section>

  </div>
</main>

<?php get_footer(); ?>