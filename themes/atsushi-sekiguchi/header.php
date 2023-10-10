<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- タイトル -->
  <?php get_template_part('template/meta', 'title'); ?>
  <!-- ディスクリプション -->
  <?php get_template_part('template/meta', 'description'); ?>
  <!-- canonical -->
  <?php get_template_part('template/meta', 'canonical'); ?>
  <!-- 共通meta -->
  <?php get_template_part('template/meta', 'other'); ?>
  <!-- OGP画像 -->
  <?php get_template_part('template/meta', 'ogp'); ?>

  <!-- keywords -->
  <meta name="keywords" content="WEB制作,WordPress,コーディング,カメラマン,クリエイター">


  <!-- サイトアイコンの指定 -->
  <link rel="icon" href="<?php $url = get_site_icon_url(); ?>" sizes="16x16" type="image/png" />
  <!-- スマホ用アイコン画像 -->
  <link rel="apple-touch-icon-precomposed" href="<?php $url = get_site_icon_url(); ?>" />
  <!-- Windows用タイル設定 -->
  <meta name="msapplication-TileImage" content="<?php $url = get_site_icon_url(); ?>" />
  <meta name="msapplication-TileColor" content="#fff" />
  <!-- 電話番号やメールアドレスの変換設定 -->
  <meta name="format-detection" content="email=no,telephone=no,address=no" />

  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
  <!-- fontawesome -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- slick -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick/slick.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick/slick-theme.min.css">
  <!-- Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <!-- CSS読み込み -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/swiper/swiper.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="l-header js-header">
    <div class="l-header__inner">
      <h1 class="l-header__title">
        <a href="<?php echo esc_url(home_url()); ?>/">ATSUSHI<br>SEKIGUCHI</a>
      </h1>
      <div class="l-header__item">
        <div class="c-globalNav">
          <div class="c-globalNav__hamburger js-hamburger">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <div class="c-globalNav__inner js-globalNav">
            <nav class="c-globalNav__menu">
              <ul class="c-globalNav__menuList">
                <li class="c-globalNav__menuItem"><a href="<?php echo esc_url(home_url()); ?>/">TOP</a></li>
                <li class="c-globalNav__menuItem"><a href="<?php echo esc_url(home_url()); ?>/about/">ABOUT</a></li>
                <li class="c-globalNav__menuItem"><a href="<?php echo esc_url(home_url()); ?>/works/">WORKS</a></li>
                <li class="c-globalNav__menuItem"><a href="<?php echo esc_url(home_url()); ?>/photos/">PHOTO</a></li>
                <!-- <li class="c-globalNav__menuItem"><a href="https://atsushi-photographer.com/" target="_blank">PHOTO</a></li> -->
                <li class="c-globalNav__menuItem"><a href="<?php echo esc_url(home_url()); ?>/contact/">CONTACT</a></li>
              </ul>
            </nav>
            <ul class="c-globalNav__sns">
              <li class="c-globalNav__snsList">
                <a href="https://www.instagram.com/atsushi_photographer/" target="_blank" rel="noopener noreferrer">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
              <li class="c-globalNav__snsList">
                <a href="https://twitter.com/ATSUSHI__WEB/" target="_blank" rel="noopener noreferrer">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>