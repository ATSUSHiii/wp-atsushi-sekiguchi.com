<?php
/*********************
descriptionタグ出力設定
 *********************/
function get_description() {
  if ( is_front_page() or is_home() ) {
    //トップページはブログの説明文を表示
    $description = get_bloginfo( 'description' );
  } elseif ( is_category() ) {
    //カテゴリページはカテゴリの説明文を表示。説明文がなければカテゴリー名そのものを表示
    $description = category_description();
    if ($description=='') {
      $description = single_cat_title('カテゴリー:「',false).'」のページ';
    } else {
      $description = category_description();
    }
  } elseif ( is_tag() ) {
      $description = tag_description();
      if($description==''){
        $description = single_cat_title('タグ:「',false).'」がついたページ';
      }else{
        $description = tag_description();
      }
  } elseif ( is_page() or is_single() ) {
      //固定ページ、投稿ページ
      $excerpt = get_the_excerpt();
      if ($excerpt=='') {
      $post = get_queried_object();
      $description = strip_tags( $post->post_content );
      $description = str_replace( ["\n","\r","<p>","</p>","<br />"], "", $description );
      } else {
        $description = str_replace( ["\n","\r","<p>","</p>","<br />"], "", $excerpt );
      }
  } else { //その他のページはブログ説明文を表示
    $description = get_bloginfo( 'description' );
  }
    $description = mb_substr( $description, 0, 120 ); //文字数指定
          echo '<meta name="description" content="'.$description.'"/>';
          echo '<meta name="twitter:description" content="'.$description.'" />';
          echo '<meta property="og:description" content="'.$description.'" />';
}
  get_description();

?>