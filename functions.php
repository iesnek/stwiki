<?php

////////// 目次 //////////
//基本設定
//アーカイブページで現在のカテゴリー・タグ・タームを取得する
//ログイン画面のロゴ変更
//投稿記事一覧にアイキャッチ画像を表示
//条件分岐タグ「is_first_post」を定義
//アーカイブにカスタム投稿タイプを表示
//いろいろな犬種アーカイブページの表示変更
//カスタム投稿タイプ-いろいろな犬種
//カスタムフィールド-いろいろな犬種
//カスタム投稿タイプ-動画紹介
//カスタムフィールド-動画紹介


////////// 基本設定 //////////

// Javascriptの読み込み
 function my_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'script',get_template_directory_uri().'/assets/js/script.js',array('jquery'));
  }
    add_action( 'wp_enqueue_scripts', 'my_scripts' );

// メインカラムの幅を指定
if ( ! isset( $content_width ) ) $content_width = 750;

// <head>内に RSSフィードのリンクを表示
add_theme_support( 'automatic-feed-links' );

// カスタム投稿タイプをRSS配信する
function mysite_feed_request($vars) {
  if ( isset($vars['feed']) && !isset($vars['post_type']) ){
    $vars['post_type'] = array(
      'post',
      'mov',
      'dogs'
    );
  }
  return $vars;
}
add_filter( 'request', 'mysite_feed_request' );

// アイキャッチ画像を有効化する
add_theme_support( 'post-thumbnails' );

// アイキャッチ画像のサイズ追加
add_image_size( 'thumbnail2', 330, 220, true );
add_image_size( 'thumbnail3', 240, 160, true );
add_image_size( 'thumbnail4', 120, 80, true );

// 抜粋文の末尾の文字を変更[...]→...
function new_excerpt_more($more){
  return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// アーカイブページに「link rel="prev"」,「link rel="next"」を追加
function add_rel_link() {
  if(is_home() || is_archive()) {
    global $wp_query;
    $max_page  = $wp_query->max_num_pages;
    if($max_page > 1) {
      if(get_query_var('paged')) {
        echo '<link rel="prev" href="'.previous_posts(false).'" />'."\n";
      }
      if(get_query_var('paged') < $max_page) {
        echo '<link rel="next" href="'.next_posts($max_page, false).'" />'."\n";
      }
    }
  }
}
add_action('wp_head', 'add_rel_link');


////////// アーカイブページで現在のカテゴリー・タグ・タームを取得する //////////
function get_current_term(){

  $id;
  $tax_slug;

  if(is_category()){
    $tax_slug = "category";
    $id = get_query_var('cat'); 
  }else if(is_tag()){
    $tax_slug = "post_tag";
    $id = get_query_var('tag_id');  
  }else if(is_tax()){
    $tax_slug = get_query_var('taxonomy');  
    $term_slug = get_query_var('term'); 
    $term = get_term_by("slug",$term_slug,$tax_slug);
    $id = $term->term_id;
  }

  return get_term($id,$tax_slug);
}


////////// ログイン画面のロゴ変更 //////////
function login_logo() {
echo '<style type="text/css">
#login h1 a {
background: url('.get_template_directory_uri().'/svg/logo-h.png) no-repeat;
width: 250px;
height: 50px;
background-size:100% auto;
}
</style>';
}
add_action('login_head', 'login_logo');


////////// 投稿記事一覧にアイキャッチ画像を表示 //////////
function customize_admin_manage_posts_columns($columns) {
  $columns['thumbnail'] = __('Thumbnail');
  return $columns;
}
function customize_admin_add_column($column_name, $post_id) {
  if ( 'thumbnail' == $column_name) {
    //テーマで設定されているサムネイルを利用する場合
    $thum = get_the_post_thumbnail($post_id, 'thumbnail4', array( 'style'=>'width:120px;height:auto;' ));
  }
  if ( isset($thum) && $thum ) {
    echo $thum;
  }
}
//カラムの挿入
add_filter( 'manage_posts_columns', 'customize_admin_manage_posts_columns' );
//サムネイルの挿入
add_action( 'manage_posts_custom_column', 'customize_admin_add_column', 10, 2 );


////////// 条件分岐タグ「is_first_post」を定義 //////////
function is_first_post(){
  global $wp_query;
  return ($wp_query->current_post === 0);
}


////////// アーカイブにカスタム投稿タイプを表示 //////////
function set_post_per_page( $query ) {
  if ( is_admin() || !$query->is_main_query() )
    return;

  if ( $query->is_post_type_archive( 'dogs' ) ) {
    return;
  }

  if ( $query->is_home() || $query->is_archive() ) {
    $query->set( 'post_type', array( 'post', 'mov' ) );
    return;
  }
}
add_action( 'pre_get_posts', 'set_post_per_page' );


////////// いろいろな犬種アーカイブページの表示変更 //////////
function change_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( $query->is_post_type_archive( 'dogs' ) ) {
        $query->set( 'posts_per_page', '12' );
        $query->set( 'orderby', 'meta_value' );
        $query->set( 'meta_key', 'dogs_yomi' );
        $query->set( 'order', 'asc' );
    }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );


////////// カスタム投稿タイプ-いろいろな犬種 //////////

add_action( 'init', 'register_cpt_dogs' );

function register_cpt_dogs() {

  $labels = array( 
    'menu_name'          => _x( 'いろいろな犬種', 'dogs' ),    //サイドメニューのラベル
    'all_items'          => _x( '犬種一覧', 'dogs' ),        //サイドメニューの一覧ラベル
    'add_new'            => _x( '新規追加', 'dogs' ),        //サイドメニューの新規ラベル
    'name'               => _x( 'いろいろな犬種', 'dogs' ),    //いろいろな犬種画面のタイトル
    'singular_name'      => _x( 'いろいろな犬種', 'dogs' ),    //よくわからん
    'add_new_item'       => _x( '新しい犬種を追加', 'dogs' ),  //新規追加ページのタイトル
    'edit_item'          => _x( '犬種を編集', 'dogs' ),       //編集ページのタイトル
    'new_item'           => _x( '新しい犬種', 'dogs' ),       //よくわからん
    'search_items'       => _x( '犬種を検索', 'dogs' ),       //検索する時
    'not_found'          => _x( '見つかりませんでした', 'dogs' ), //投稿が無い時
    'not_found_in_trash' => _x( '見つかりませんでした', 'dogs' ), //ゴミ箱にも投稿が無い時
    'parent_item_colon'  => _x( '親犬種', 'dogs' ),
  );

  $args = array( 
    'labels'       => $labels,
    'hierarchical' => false,  //階層ありならtrue（固定ページぽく） or 階層無しならfalse（投稿ぽく）

    'supports' => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies' => array( 'post_tag' ),  //通常のタグを使う

    'public'       => true,
    'show_ui'      => true,
    'show_in_menu' => true,


    'show_in_nav_menus'   => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'has_archive'         => true,  //アーカイブするかどうか
    'query_var'           => true,
    'can_export'          => true,
    'rewrite'             => true,
    'capability_type'     => 'post'
  );

  register_post_type( 'dogs', $args );
}

//カスタム投稿タイプのアイコン変更
//https://developer.wordpress.org/resource/dashicons/　からアイコン選ぶ
function dogs_icons_styles(){
   echo '<style>
    #adminmenu #menu-posts-dogs div.wp-menu-image:before {
      content: "\f511";
    }
   </style>';
}
add_action( 'admin_head', 'dogs_icons_styles' );


////////// カスタムフィールド-いろいろな犬種 //////////

///// カスタムフィールドを追加
function add_dogs_field() {  //メタボックスのID,メタボックス名,メタボックスの関数名,表示する場所
  add_meta_box('dogs_subtitle_box', 'ソート用読み仮名＆サブタイトル', 'dogs_subtitle_form', 'dogs');
}
add_action('add_meta_boxes', 'add_dogs_field');

//第3パラメータで指定した関数の作成
function dogs_subtitle_form() {  //「サブタイトル」メタボックスに表示する内容
  global $post;  //編集中の記事に関するデータを保存
  wp_nonce_field(wp_create_nonce(__FILE__), 'my_nonce');  //CSRF対策の設定（フォームにhiddenフィールドとして追加するためのnonceを「'my_nonce」として設定）
?>
  <p><label>読み仮名　　　<input type="text" name="dogs_yomi" value="<?php echo esc_html(get_post_meta($post->ID, 'dogs_yomi', true)); ?>" style="width:50%" /></label></p>
  <p><label>サブタイトル<br><input type="text" name="dogs_subtitle" value="<?php echo esc_html(get_post_meta($post->ID, 'dogs_subtitle', true)); ?>" style="width:100%" /></label></p>
<?php
}

///// カスタムフィールドの値を保存
function dogs_customfields_save($post_id) {
  global $post;  //編集中の記事に関するデータを保存
  $my_nonce = isset($_POST['my_nonce']) ? $_POST['my_nonce'] : null;  //設定したnonce を取得（CSRF対策）
  if(!wp_verify_nonce($my_nonce, wp_create_nonce(__FILE__))) {  //nonce を確認し、値が書き換えられていれば、何もしない（CSRF対策）
    return $post_id;
  }
  if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
  //自動保存ルーチンかどうかチェック。そうだった場合は何もしない（記事の自動保存処理として呼び出された場合の対策）
  if(!current_user_can('edit_post', $post->ID)) { return $post_id; }
  //ユーザーが編集権限を持っていない場合は何もしない。
  if($_POST['post_type'] == 'dogs'){  //'dogs' 投稿タイプの場合のみ実行  
  //入力フィールドに入力された情報を保存＆更新するように指定
    update_post_meta($post->ID, 'dogs_yomi', $_POST['dogs_yomi']);
    update_post_meta($post->ID, 'dogs_subtitle', $_POST['dogs_subtitle']);
  }
}
add_action('save_post', 'dogs_customfields_save');


/////カスタムフィールドを投稿より上に表示(admin-script.js必須)
function dogs_enqueue_scripts() {
  wp_enqueue_script('my-admin-script', get_bloginfo('template_directory').'/js/admin-script.js', array('jquery'), false, true);
  echo '<style> #dogs_subtitle_box { margin-top: 20px; } </style>';
}
add_action('admin_enqueue_scripts', 'dogs_enqueue_scripts');


////////// カスタム投稿タイプ-動画紹介 //////////

add_action( 'init', 'register_cpt_mov' );

function register_cpt_mov() {

  $labels = array( 
    'menu_name'          => _x( '動画紹介記事', 'mov' ),    //サイドメニューのラベル
    'all_items'          => _x( '動画紹介記事一覧', 'mov' ),        //サイドメニューの一覧ラベル
    'add_new'            => _x( '新規追加', 'mov' ),        //サイドメニューの新規ラベル
    'name'               => _x( '動画紹介', 'mov' ),    //動画紹介画面のタイトル
    'singular_name'      => _x( '動画紹介', 'mov' ),    //よくわからん
    'add_new_item'       => _x( '新しい記事を追加', 'mov' ),  //新規追加ページのタイトル
    'edit_item'          => _x( '記事を編集', 'mov' ),       //編集ページのタイトル
    'new_item'           => _x( '新しい記事', 'mov' ),       //よくわからん
    'search_items'       => _x( '動画紹介記事を検索', 'mov' ),       //検索する時
    'not_found'          => _x( '見つかりませんでした', 'mov' ), //投稿が無い時
    'not_found_in_trash' => _x( '見つかりませんでした', 'mov' ), //ゴミ箱にも投稿が無い時
    'parent_item_colon'  => _x( '親記事', 'mov' ),
  );

  $args = array( 
    'labels'       => $labels,
    'hierarchical' => false,  //階層ありならtrue（固定ページぽく） or 階層無しならfalse（投稿ぽく）

    'supports'   => array( 'title', 'editor', 'thumbnail', 'comments' ),
    'taxonomies' => array( 'category', 'post_tag' ),  //通常のカテゴリーとタグを使う

    'public'       => true,
    'show_ui'      => true,
    'show_in_menu' => true,


    'show_in_nav_menus'   => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'has_archive'         => true,  //アーカイブするかどうか
    'query_var'           => true,
    'can_export'          => true,
    'rewrite'             => true,
    'capability_type'     => 'post'
  );

  register_post_type( 'mov', $args );
}

add_action('init', 'my_add_default_boxes');

function my_add_default_boxes() {  //通常のカテゴリーとタグを使う
  register_taxonomy_for_object_type('category', 'mov');
  register_taxonomy_for_object_type('post_tag', 'mov');
}


//カスタム投稿タイプのアイコン変更
//https://developer.wordpress.org/resource/dashicons/　からアイコン選ぶ
function mov_icons_styles(){
   echo '<style>
    #adminmenu #menu-posts-mov div.wp-menu-image:before {
      content: "\f126";
    }
   </style>';
}
add_action( 'admin_head', 'mov_icons_styles' );


////////// カスタムフィールド-動画紹介 //////////

///// カスタムフィールドを追加
function add_mov_field() {  //メタボックスのID,メタボックス名,メタボックスの関数名,表示する場所
  add_meta_box('mov_note', 'コピペ用HTMLタグ', 'mov_note_form', 'dogs', 'side', 'low');
  add_meta_box('mov_note', 'コピペ用HTMLタグ', 'mov_note_form', 'mov', 'side', 'low');
}
add_action('add_meta_boxes', 'add_mov_field');

function mov_note_form() {  //「コピペ用HTMLタグ」メタボックスに表示する内容
?>
  <div class="m-articleBody">
    <p><label><span class="b">太字にしたい</span><br><input type="text" name="" value='<span class="b">この中に文字</span>' style="width:100%" /></label></p>
    <p><label><span class="bred">太字で赤にしたい</span><br><input type="text" name="" value='<span class="bred">この中に文字</span>' style="width:100%" /></label></p>
    <p><label><span class="bb">ものすごい太字にしたい</span><br><input type="text" name="" value='<span class="bb">この中に文字</span>' style="width:100%" /></label></p>
    <p><label><span class="bm">マーカー付の太字にしたい</span><br><input type="text" name="" value='<span class="bm">この中に文字</span>' style="width:100%" /></label></p>
    <p><label><span class="m">マーカー引きたい</span><br><input type="text" name="" value='<span class="m">この中に文字</span>' style="width:100%" /></label></p>
    <p><label><small>小さい文字にしたい（補足とか）</small><br><input type="text" name="" value='<small>この中に文字</small>' style="width:100%" /></label></p>
    <p><label><span class="b">リンクを貼りたい</span><br><input type="text" name="" value='<a target="_brank" href="この中にＵＲＬ">この中にリンク先のタイトル</a>' style="width:100%" /></label></p>
  </div><!-- /.m-articleBody -->
<?php
}

///// 管理画面に任意のCSSを読み込ませる
function wp_custom_admin_css() {
  echo "\n" . '<link href="' .get_bloginfo('template_directory'). '/admin.css' . '" rel="stylesheet" type="text/css" />' . "\n";
}
add_action('admin_head', 'wp_custom_admin_css', 100);



?>