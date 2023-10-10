<?php
/*********************
titleタグ出力設定
 *********************/
function get_title(){
  global $page, $paged;
    if (is_front_page() or is_home()) {
			// トップページ
      $title = get_bloginfo('name'). ' | ' .get_bloginfo('description');
    } elseif (is_page() or is_single()) {
			// 固定ページ、投稿ページ
      $title = the_title('',' | ',false) .get_bloginfo('name');
    } elseif (is_category() or is_tag()){
			// カテゴリー、タグページ
      $title = single_term_title('',false). ' | ' .get_bloginfo('name');
    } elseif (is_tax()){
			// タクソノミー
      $title = single_term_title('',false). ' | ' .get_bloginfo('name');
    } elseif (is_archive() || is_post_type_archive()) {
			// アーカイブページ
      $title = post_type_archive_title('',false). ' | ' .get_bloginfo('name');
    } elseif (is_search()) {//404ページ
      $title =  '検索結果 | '.get_bloginfo('name');
    } elseif (is_404()) {//404ページ
      $title =  '404 | '.get_bloginfo('name');
    }
    if ($paged >= 2 || $page >= 2) {
			//各ページに2ページ目以降がある場合は「nページ」を追加
      $title = $title. ' | ' . sprintf('%sページ',max($paged,$page));
    }
    echo '<title>'.$title.'</title>';
    echo '<meta property="og:title" content="'.$title.'" />';
    echo '<meta name="twitter:title" content="'.$title.'" />';
	}
	get_title();

	?>