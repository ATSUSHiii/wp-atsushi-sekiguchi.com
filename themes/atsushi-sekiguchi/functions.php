<?php

/*********************
【表示カスタマイズ】アイキャッチ画像の有効化
 *********************/
add_theme_support('post-thumbnails');


/*********************
【表示カスタマイズ】固定ページ抜粋有効化
 *********************/
add_post_type_support('page', 'excerpt');

// カテゴリーとタグのmeta descriptionからpタグを除去
remove_filter('term_description', 'wpautop');


/**********************
投稿アーカイブページの作成
 *********************/
function post_has_archive($args, $post_type)
{

   if ('post' == $post_type) {
      $args['rewrite'] = true;
      $args['has_archive'] = 'archive'; //任意のスラッグ名
   }
   return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);


/*********************
【管理画面】カスタム投稿を追加
 *********************/

/* カスタム投稿タイプを追加 */
function custom_post_type() {

   // サービス内容を追加
   $labels = array(
      'name' => 'SERVICE', //管理画面に表示する名前
      'add_new' => '新規追加', //新規追加ボタンの名前
      'add_new_item' => 'サービス', //新規追加ページのタイトル
      'edit_item' => '編集', //編集ページのタイトル
      'new_item' => '新規追加', //一覧ページの「新規追加」ボタンのラベル
      'view_item' => '表示', //編集ページの「投稿を表示」ボタンのラベル
      'search_items' => '検索', //一覧ページの検索ボタンのラベル
      'not_found' =>  '投稿されたサービスはありません', //一覧ページに投稿が見つからなかったときに表示
      'not_found_in_trash' => 'ゴミ箱にサービスはありません。', //ゴミ箱に何も入っていないときに表示
   );
   $args = array(
      'label' => __('Service'),
      'labels' => $labels,
      'public' => true, // 投稿タイプをパブリックにする
      'menu_position' => 6, //メニューに表示される順番
      'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
      'menu_icon' => 'dashicons-admin-customizer', //アイコンの設定
      'has_archive' => true,
      'show_in_rest' => true,
   );
   register_post_type('service', $args);

   // 制作事例を追加
   $labels = array(
      'name' => 'WORKS', //管理画面に表示する名前
      'add_new' => '新規追加', //新規追加ボタンの名前
      'add_new_item' => '制作事例', //新規追加ページのタイトル
      'edit_item' => '編集', //編集ページのタイトル
      'new_item' => '新規追加', //一覧ページの「新規追加」ボタンのラベル
      'view_item' => '表示', //編集ページの「投稿を表示」ボタンのラベル
      'search_items' => '検索', //一覧ページの検索ボタンのラベル
      'not_found' =>  '投稿された制作事例はありません', //一覧ページに投稿が見つからなかったときに表示
      'not_found_in_trash' => 'ゴミ箱に制作事例はありません。', //ゴミ箱に何も入っていないときに表示
   );
   $args = array(
      'label' => __('Works'),
      'labels' => $labels,
      'public' => true, // 投稿タイプをパブリックにする
      'menu_position' => 6, //メニューに表示される順番
      'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
      'menu_icon' => 'dashicons-admin-customizer', //アイコンの設定
      'has_archive' => true,
      'show_in_rest' => true,
   );
   register_post_type('works', $args);

   // 写真撮影を追加
   $labels = array(
      'name' => 'PHOTO', //管理画面に表示する名前
      'add_new' => '新規追加', //新規追加ボタンの名前
      'add_new_item' => '撮影事例', //新規追加ページのタイトル
      'edit_item' => '編集', //編集ページのタイトル
      'new_item' => '新規追加', //一覧ページの「新規追加」ボタンのラベル
      'view_item' => '表示', //編集ページの「投稿を表示」ボタンのラベル
      'search_items' => '検索', //一覧ページの検索ボタンのラベル
      'not_found' =>  '投稿された撮影事例はありません', //一覧ページに投稿が見つからなかったときに表示
      'not_found_in_trash' => 'ゴミ箱に写真撮影はありません。', //ゴミ箱に何も入っていないときに表示
   );
   $args = array(
      'label' => __('Photos'),
      'labels' => $labels,
      'public' => true, // 投稿タイプをパブリックにする
      'menu_position' => 6, //メニューに表示される順番
      'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
      'menu_icon' => 'dashicons-admin-customizer', //アイコンの設定
      'has_archive' => true,
      'show_in_rest' => true,
   );
   register_post_type('photos', $args);

      // メインビジュアルを追加
      $labels = array(
         'name' => 'MV', //管理画面に表示する名前
         'add_new' => '新規追加', //新規追加ボタンの名前
         'add_new_item' => 'メインビジュアル', //新規追加ページのタイトル
         'edit_item' => '編集', //編集ページのタイトル
         'new_item' => '新規追加', //一覧ページの「新規追加」ボタンのラベル
         'view_item' => '表示', //編集ページの「投稿を表示」ボタンのラベル
         'search_items' => '検索', //一覧ページの検索ボタンのラベル
         'not_found' =>  '投稿されたメインビジュアルはありません', //一覧ページに投稿が見つからなかったときに表示
         'not_found_in_trash' => 'ゴミ箱にメインビジュアルはありません。', //ゴミ箱に何も入っていないときに表示
      );
      $args = array(
         'label' => __('Mainvisual'),
         'labels' => $labels,
         'public' => true, // 投稿タイプをパブリックにする
         'menu_position' => 6, //メニューに表示される順番
         'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
         'menu_icon' => 'dashicons-admin-customizer', //アイコンの設定
         'has_archive' => true,
         'show_in_rest' => true,
      );
      register_post_type('mainvisual', $args);
}
add_action('init', 'custom_post_type');


// カテゴリー・タグ管理画面追加
function add_taxonomies()
{

   //サービスカテゴリー
   register_taxonomy(
      'service_cat',
      array('service'),
      array(
         'label' => 'カテゴリー', //表示名
         'public' => true,
         'show_in_menu' => true,
         'show_ui' => true,
         'show_admin_column' => true,
         'show_in_nav_menus' => true,
         'hierarchical' => true, //trueはカテゴリー・falseはタグ
         'rewrite' => array('slug' => 'service_cat', 'with_front' => true,), //パーマリンクの設定
         'show_in_rest' => true,
         'rest_base' => "",
      )
   );

   //サービスタグ
   register_taxonomy(
      'service_tag',
      array('service'),
      array(
         'label' => 'タグ', //表示名
         'public' => true,
         'show_in_menu' => true,
         'show_ui' => true,
         'show_admin_column' => true,
         'show_in_nav_menus' => true,
         'hierarchical' => false, //trueはカテゴリー・falseはタグ
         'rewrite' => array('slug' => 'service_tag', 'with_front' => true,), //パーマリンクの設定
         'show_in_rest' => true,
         'rest_base' => "",
      )
   );

   //制作実績カテゴリー
   register_taxonomy(
      'works_cat', //「works_cat」はお好みで変更してください
      array('works'), //「works」は作成したカスタム投稿タイプの名前にしてください
      array(
         'label' => 'カテゴリー', //表示名
         'public' => true,
         'show_in_menu' => true,
         'show_ui' => true,
         'show_admin_column' => true,
         'show_in_nav_menus' => true,
         'hierarchical' => true, //trueはカテゴリー・falseはタグ
         'rewrite' => array('slug' => 'works_cat', 'with_front' => true,), //パーマリンクの設定
         'show_in_rest' => true,
         'rest_base' => "",
      )
   );

   //制作実績タグ
   register_taxonomy(
      'works_tag', //「works_tag」はお好みで変更してください
      array('works'), //「works」は作成したカスタム投稿タイプの名前にしてください
      array(
         'label' => 'タグ', //表示名
         'public' => true,
         'show_in_menu' => true,
         'show_ui' => true,
         'show_admin_column' => true,
         'show_in_nav_menus' => true,
         'hierarchical' => false, //trueはカテゴリー・falseはタグ
         'rewrite' => array('slug' => 'works_tag', 'with_front' => true,), //パーマリンクの設定
         'show_in_rest' => true,
         'rest_base' => "",
      )
   );

   //写真撮影カテゴリー
   register_taxonomy(
      'photos_cat', //「photo_cat」はお好みで変更してください
      array('photos'), //「photo」は作成したカスタム投稿タイプの名前にしてください
      array(
         'label' => 'カテゴリー', //表示名
         'public' => true,
         'show_in_menu' => true,
         'show_ui' => true,
         'show_admin_column' => true,
         'show_in_nav_menus' => true,
         'hierarchical' => true, //trueはカテゴリー・falseはタグ
         'rewrite' => array('slug' => 'photos_cat', 'with_front' => true,), //パーマリンクの設定
         'show_in_rest' => true,
         'rest_base' => "",
      )
   );

   //写真撮影タグ
   register_taxonomy(
      'photos_tag', //「photo_tag」はお好みで変更してください
      array('photos'), //「photo」は作成したカスタム投稿タイプの名前にしてください
      array(
         'label' => 'タグ', //表示名
         'public' => true,
         'show_in_menu' => true,
         'show_ui' => true,
         'show_admin_column' => true,
         'show_in_nav_menus' => true,
         'hierarchical' => false, //trueはカテゴリー・falseはタグ
         'rewrite' => array('slug' => 'photos_tag', 'with_front' => true,), //パーマリンクの設定
         'show_in_rest' => true,
         'rest_base' => "",
      )
   );
}
add_action('init', 'add_taxonomies', 0);


/*********************
Contact Form 7の自動pタグ無効
 *********************/
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
   return false;
}


/*********************
保護中記事タイトルから保護中をとる
 *********************/
function prefix_password_protected()
{
   return '%s';
}
add_filter('protected_title_format', 'prefix_password_protected');
