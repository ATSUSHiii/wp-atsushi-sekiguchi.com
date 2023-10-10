<?php

/*********************
共通メタタグ出力設定
 *********************/
if (is_home() or is_front_page()) {
  echo '<meta property="og:type" content="website" />';
} else {
  echo '<meta property="og:type" content="article" />';
}
?>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<meta property="og:locale" content="ja_JP" />
<meta name="twitter:site" content="@ATSUSHI__WEB" />
<meta name="twitter:creator" content="@ATSUSHI__WEB" />
<meta name="twitter:domain" content="atsushi-sekiguchi.com" />
<meta name="twitter:card" content="summary_large_image" />
<meta property="article:published_time" content="<?php the_time('Y/m/d'); ?> <?php the_time('G:i'); ?>" />
<meta property="article:modified_time" content="<?php the_modified_date('Y/m/d'); ?>　<?php the_modified_time(); ?>" />