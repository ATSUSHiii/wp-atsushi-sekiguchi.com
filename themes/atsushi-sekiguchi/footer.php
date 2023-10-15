  <div class="c-pageTop js-pageTop">
    <button class="c-pageTop__btn js-pageTop">
      <i class="fas fa-chevron-up"></i>
    </button>
  </div>

  <footer class="l-footer js-fixedTarget">
    <div class="l-footer__inner">
      <p class="l-footer__copy"><a href="/">©︎ATSUSHI-SEKIGUCHI</a></p>
    </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/common/jquery.easing.1.3.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick/slick.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/app.min.js"></script>


  <?php if ( is_page( 'photo' ) ): ?>
  <!-- swiper -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <!-- vue.global.js -->
  <script src="https://cdn.jsdelivr.net/npm/vue@3.0.5/dist/vue.global.js"></script>
  <!-- Vueコンポーネント -->
  <script>
    // Gallery data
    const galleryData = {
      categories: [{
          name: 'スナップ',
          thumbnail: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0001.png',
          images: [{
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0001.png',
              alt: 'スナップ'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0002.png',
              alt: 'スナップ'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0003.png',
              alt: 'スナップ'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0004.png',
              alt: 'スナップ'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0005.png',
              alt: 'スナップ'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0006.png',
              alt: 'スナップ'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0007.png',
              alt: 'スナップ'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0008.png',
              alt: 'スナップ'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0009.png',
              alt: 'スナップ'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0010.png',
              alt: 'スナップ'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0011.png',
              alt: 'スナップ'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0012.png',
              alt: 'スナップ'
            },
          ]
        },
        {
          name: 'イベント',
          thumbnail: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0013_01.png',
          images: [{
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0013_01.png',
              alt: 'イベント'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0013_02.png',
              alt: 'イベント'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0013_03.png',
              alt: 'イベント'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0013_04.png',
              alt: 'イベント'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0013_05.png',
              alt: 'イベント'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0013_06.png',
              alt: 'イベント'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0013_07.png',
              alt: 'イベント'
            },
          ]
        },
        {
          name: 'ファミリー',
          thumbnail: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0014_01.jpg',
          images: [{
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0014_01.jpg',
              alt: 'ファミリー'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0014_02.jpg',
              alt: 'ファミリー'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0014_03.jpg',
              alt: 'ファミリー'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0014_04.jpg',
              alt: 'ファミリー'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0014_05.jpg',
              alt: 'ファミリー'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0014_06.jpg',
              alt: 'ファミリー'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0014_07.jpg',
              alt: 'ファミリー'
            },
          ]
        },
        {
          name: '七五三',
          thumbnail: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0015_01.jpg',
          images: [{
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0015_01.jpg',
              alt: 'ファミリー'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0015_02.jpg',
              alt: 'ファミリー'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0015_03.jpg',
              alt: 'ファミリー'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0015_04.jpg',
              alt: 'ファミリー'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0015_05.jpg',
              alt: 'ファミリー'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0015_06.jpg',
              alt: 'ファミリー'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0015_07.jpg',
              alt: 'ファミリー'
            },
          ]
        },
        {
          name: 'モデル',
          thumbnail: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0016_01.jpg',
          images: [{
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0016_01.jpg',
              alt: 'モデル'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0016_02.jpg',
              alt: 'モデル'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0016_03.jpg',
              alt: 'モデル'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0016_04.jpg',
              alt: 'モデル'
            },
            {
              src: '<?php echo get_template_directory_uri(); ?>/img/photo/photo_0016_05.jpg',
              alt: 'モデル'
            },
          ]
        }
      ]
    };

    const app = Vue.createApp({
      data() {
        return {
          categories: galleryData.categories,
          modalVisible: false,
          selectedCategory: 0,
          swiper: null
        };
      },
      methods: {
        openModal(index) {
          this.selectedCategory = index;
          this.modalVisible = true;
          this.$nextTick(() => {
            this.swiper = new Swiper('.swiper-container', {
              loop: true,
              slidesPerView: 'auto',
              spaceBetween: 16,
              pagination: {
                el: ".swiper-pagination",
              },
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
            });
          });
        },
        closeModal() {
          if (this.swiper) {
            this.swiper.destroy();
            this.swiper = null;
          }
          this.modalVisible = false;
        }
      }

    });

    app.mount('#app');
  </script>
  <?php endif; ?>

  <?php wp_footer(); ?>
  </body>

</html>