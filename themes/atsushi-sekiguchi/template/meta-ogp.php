<?php
/*********************
OGP画像タグ出力設定
 *********************/
  global $post;
  //便宜上同じファイル名のように書いていますが、実際はdefaultOGP、tagOGP、catOGP、limitedOGPで定義する画像名は全部異なるものを指定してください。
  $defaultDLC = get_template_directory_uri();
  $defaultOGP = $defaultDLC.'/img/common/ogp'.'.png';
  $ogpField= get_post_meta($post->ID, 'OGP', true);
  $ogpLimitedField= get_post_meta($post->ID, 'works', true);
  $tagOGP = $defaultDLC.'/img/common/ogp'.'.png';
  $catOGP = $defaultDLC.'/img/common/ogp'.'.png';
  $limitedOGP = $defaultDLC.'/img/common/ogp'.'.png';

  if ( is_home() ) {
    //トップページは共通OGPを表示
    echo '<meta name="twitter:image" content="'.$defaultOGP.'" />';
    echo '<meta property="og:image" content="'.$defaultOGP.'" />';
    echo '<meta name="twitter:card" content="summary_large_image" />';
  } elseif ( is_category() ) {
    echo '<meta name="twitter:image" content="'.$catOGP.'" />';
    echo '<meta property="og:image" content="'.$catOGP.'" />';
    echo '<meta name="twitter:card" content="summary_large_image" />';
  } elseif ( is_tag() ) {
		if( is_tag('limited') ) {
      $tagOGP=$limitedOGP;
    }
    echo '<meta name="twitter:image" content="'.$tagOGP.'" />';
    echo '<meta property="og:image" content="'.$tagOGP.'" />';
    echo '<meta name="twitter:card" content="summary_large_image" />';
  } elseif ( is_single() or is_page() ) {
    //投稿・固定ページはアイキャッチで対応。なければ共通のものを
    if (!empty($ogpField)) {
      $ogpURL = post_custom('OGP');
      echo '<meta name="twitter:image" content="'.$ogpURL.'" />';
      echo '<meta property="og:image" content="'.$ogpURL.'" />';
      echo '<meta name="twitter:card" content="summary_large_image" />';
    } elseif (!empty($ogpLimitedField)) {
      echo '<meta name="twitter:image" content="'.$limitedOGP.'" />';
      echo '<meta property="og:image" content="'.$limitedOGP.'" />';
      echo '<meta name="twitter:card" content="summary_large_image" />';
    } elseif (has_post_thumbnail()) {
      $thumbnailURL = get_the_post_thumbnail_url(get_the_ID(), 'large');
      echo '<meta name="twitter:image" content="'.$thumbnailURL.'" />';
      echo '<meta property="og:image" content="'.$thumbnailURL.'" />';
      echo '<meta name="twitter:card" content="summary" />';
    } else {
      echo '<meta name="twitter:image" content="'.$defaultOGP.'" />';
      echo '<meta property="og:image" content="'.$defaultOGP.'" />';
      echo '<meta name="twitter:card" content="summary_large_image" />';
    }
  } elseif ( is_404() ) {
    //404はシェアされることはないのでOGPは出さない
  } else {
    //その他のページは共通画像で対応
    echo '<meta name="twitter:image" content="'.$defaultOGP.'" />';
    echo '<meta property="og:image" content="'.$defaultOGP.'" />';
    echo '<meta name="twitter:card" content="summary_large_image" />';
  }

?>