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
          thumbnail: '/wp-content/uploads/2022/06/IMG_9048-scaled.jpg',
          images: [{
              src: '/wp-content/uploads/2023/04/20110405-IMG_9457-scaled.jpg',
              alt: 'スナップ'
            },
            {
              src: '/wp-content/uploads/2023/04/20110711-IMG_0095-scaled.jpg',
              alt: 'スナップ'
            },
            {
              src: '/wp-content/uploads/2023/04/20110906-IMG_0606-scaled.jpg',
              alt: 'スナップ'
            },
            {
              src: '/wp-content/uploads/2023/04/20120822-_MG_7882-scaled.jpg',
              alt: 'スナップ'
            },
            {
              src: '/wp-content/uploads/2023/04/20121024-_MG_8870-バージョン-2-scaled.jpg',
              alt: 'スナップ'
            },
            {
              src: '/wp-content/uploads/2023/04/20130216-IMG_0884-バージョン-2-scaled.jpg',
              alt: 'スナップ'
            },
            {
              src: '/wp-content/uploads/2023/04/20130216-IMG_0914-バージョン-2-Conflicted-copy-from-関口敦-の-MacBook-on-2016-08-07-scaled.jpg',
              alt: 'スナップ'
            },
            {
              src: '/wp-content/uploads/2023/04/20130415-IMG_2170-scaled.jpg',
              alt: 'スナップ'
            },
            {
              src: '/wp-content/uploads/2023/04/20140725-IMG_1116-scaled.jpg',
              alt: 'スナップ'
            },
            {
              src: '/wp-content/uploads/2023/04/20140725-IMG_1132-scaled.jpg',
              alt: 'スナップ'
            },
            {
              src: '/wp-content/uploads/2023/04/20140805-IMG_1353-バージョン-2-Conflicted-copy-from-関口敦-の-MacBook-on-2016-08-07-scaled.jpg',
              alt: 'スナップ'
            },
          ]
        },
        {
          name: 'ファミリー',
          thumbnail: '/wp-content/uploads/2023/04/20171129-IMG_7615-scaled.jpg',
          images: [{
              src: '/wp-content/uploads/2023/04/20171129-IMG_7615-scaled.jpg',
              alt: 'ファミリー'
            },
            {
              src: '/wp-content/uploads/2023/04/20171129-IMG_7842-scaled.jpg',
              alt: 'ファミリー'
            },
            {
              src: '/wp-content/uploads/2023/04/20171129-IMG_7968-scaled.jpg',
              alt: 'ファミリー'
            },
            {
              src: '/wp-content/uploads/2023/04/20181113-128-scaled.jpg',
              alt: 'ファミリー'
            },
            {
              src: '/wp-content/uploads/2023/04/20181113-054-scaled.jpg',
              alt: 'ファミリー'
            },
            {
              src: '/wp-content/uploads/2023/04/20191020-077-scaled.jpg',
              alt: 'ファミリー'
            },
            {
              src: '/wp-content/uploads/2023/04/20191020-100-scaled.jpg',
              alt: 'ファミリー'
            },
          ]
        },
        {
          name: 'モデル',
          thumbnail: '/wp-content/uploads/2023/04/20220207-2H4A8786-scaled.jpg',
          images: [{
              src: '/wp-content/uploads/2023/04/20220207-2H4A8786-scaled.jpg',
              alt: 'モデル'
            },
            {
              src: '/wp-content/uploads/2023/04/20220207-2H4A8621-scaled.jpg',
              alt: 'モデル'
            },
            {
              src: '/wp-content/uploads/2023/04/20220207-2H4A9252-scaled.jpg',
              alt: 'モデル'
            },
            {
              src: '/wp-content/uploads/2023/04/20220207-2H4A9398-scaled.jpg',
              alt: 'モデル'
            },
            {
              src: '/wp-content/uploads/2023/04/20220207-2H4A9630-scaled.jpg',
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