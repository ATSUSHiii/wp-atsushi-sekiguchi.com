<?php
/*********************
canonicalタグ出力設定
 *********************/
function get_canonical(){
  global $page, $paged;
  if (is_front_page() or is_home()) {
    //トップページ
    $canonicalURL = get_home_url().'/';
  } elseif(is_page() or is_single()) {
    //固定ページ、投稿ページ
    $canonicalURL = get_permalink();
  } elseif(is_category()) {
    //カテゴリー
    $category = get_the_category();
    $categoryId = $category[0]->cat_ID;
    $categoryURL = get_category_link($categoryId);
    $canonicalURL = $categoryURL;
  } elseif(is_tag()) {
    //タグ
    $tagName = single_tag_title( '' ,false);
    $tag = get_term_by('name', $tagName, 'post_tag');
    $tagId = $tag->term_id;
    $tagURL = get_tag_link($tagId);
    $canonicalURL = $tagURL;
  } elseif(is_year()) {
    //アーカイブページ（このサイトは年別のものしか用意していないのでis_yearのみ）
    $year = get_the_time('Y');
    $canonicalURL = get_year_link($year);
  } if($paged >= 2 || $page >= 2) {
    //2ページ目以降の場合
    if (is_front_page() or is_home()){
    $canonicalURL = $canonicalURL.'page/'.max( $paged, $page ).'/';
    }else{
    $canonicalURL = $canonicalURL.'/page/'.max( $paged, $page ).'/';
    }
  }
    echo '<link rel="canonical" href="' .$canonicalURL. '">';
    echo '<meta property="og:url" content="' .$canonicalURL. '">';
}
  get_canonical();

?>