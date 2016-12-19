<?php

////////// 目次 //////////
// 基本設定
// アーカイブページで現在のカテゴリー・タグ・タームを取得する
// ログイン画面のロゴ変更
// 投稿記事一覧にアイキャッチ画像を表示
// アーカイブにカスタム投稿タイプを表示
// カスタム投稿タイプ-データベース
// 管理画面に任意のCSSを読み込ませる
// 管理画面のカテゴリーの追加ボタンを消す
// タイトルの入力を必須にし、プレースホルダーを変更する
// カスタムフィールドの値を使って他のカスタムフィールドを自動入力する


////////// 基本設定 //////////

// Javascriptの読み込み
 function my_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'script',get_template_directory_uri().'/assets/js/script.js',array('jquery'));
  }
    add_action( 'wp_enqueue_scripts', 'my_scripts' );

// メインカラムの幅を指定
if( ! isset( $content_width ) ) $content_width = 750;

// <head>内に RSSフィードのリンクを表示
add_theme_support( 'automatic-feed-links' );

// カスタム投稿タイプをRSS配信する
function mysite_feed_request($vars) {
  if( isset($vars['feed']) && !isset($vars['post_type']) ){
    $vars['post_type'] = array(
      'post',
      'db'
    );
  }
  return $vars;
}
add_filter( 'request', 'mysite_feed_request' );

// アイキャッチ画像を有効化する
add_theme_support( 'post-thumbnails' );

// アイキャッチ画像のサイズ追加
add_image_size( 'fuda', 450, 564, true );

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
background: url('.get_template_directory_uri().'/assets/img/logo.jpg) no-repeat;
width: 300px;
height: 200px;
background-size:contain;
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
  if( 'thumbnail' == $column_name) {
    //テーマで設定されているサムネイルを利用する場合
    $thum = get_the_post_thumbnail($post_id, 'thumbnail4', array( 'style'=>'width:120px;height:auto;' ));
  }
  if( isset($thum) && $thum ) {
    echo $thum;
  }
}
//カラムの挿入
add_filter( 'manage_posts_columns', 'customize_admin_manage_posts_columns' );
//サムネイルの挿入
add_action( 'manage_posts_custom_column', 'customize_admin_add_column', 10, 2 );


////////// アーカイブにカスタム投稿タイプを表示 //////////
function set_post_per_page( $query ) {
  if( is_admin() || !$query->is_main_query() )
    return;

  if( $query->is_post_type_archive( 'db' ) ) {
    return;
  }

  if( $query->is_home() || $query->is_archive() ) {
    $query->set( 'post_type', array( 'post', 'db' ) );
    return;
  }
}
add_action( 'pre_get_posts', 'set_post_per_page' );


////////// カスタム投稿タイプ-データベース //////////
add_action( 'init', 'register_cpt_db' );

function register_cpt_db() {

  $labels = array( 
    'menu_name'          => _x( 'データベース', 'db' ),    //サイドメニューのラベル
    'all_items'          => _x( '装備一覧', 'db' ),        //サイドメニューの一覧ラベル
    'add_new'            => _x( '新規追加', 'db' ),        //サイドメニューの新規ラベル
    'name'               => _x( 'データベース', 'db' ),    //データベース画面のタイトル
    'singular_name'      => _x( 'データベース', 'db' ),    //よくわからん
    'add_new_item'       => _x( '装備を登録', 'db' ),  //新規追加ページのタイトル
    'edit_item'          => _x( '情報を編集', 'db' ),       //編集ページのタイトル
    'new_item'           => _x( '新しい装備', 'db' ),       //よくわからん
    'search_items'       => _x( '検索', 'db' ),       //検索する時
    'not_found'          => _x( '見つかりませんでした', 'db' ), //投稿が無い時
    'not_found_in_trash' => _x( '見つかりませんでした', 'db' ), //ゴミ箱にも投稿が無い時
    'parent_item_colon'  => _x( 'Parent Item', 'db' ),
  );

  $args = array( 
    'labels'       => $labels,
    'hierarchical' => false,  //階層ありならtrue（固定ページぽく） or 階層無しならfalse（投稿ぽく）

    'supports' => array( 'title','comments' ),

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

  register_post_type( 'db', $args );
}

//カスタムタクソノミーを追加
register_taxonomy(
  'equip',  // 追加するタクソノミー名（英小文字とアンダースコアのみ）
  'db',  // どのカスタム投稿タイプに追加するか
  array(
    'label' => 'カテゴリー',  // 管理画面上に表示される名前（投稿で言うカテゴリー）
    'labels' => array(
      'all_items' => 'カテゴリー一覧',  // 投稿画面の右カラムに表示されるテキスト（投稿で言うカテゴリー一覧）
      'add_new_item' => 'カテゴリーを追加'  // 投稿画面の右カラムに表示されるカテゴリ追加リンク
    ),
    'hierarchical' => true,  // タクソノミーを階層化するか否か（子カテゴリを作れるか否か）
  )
);


//カスタム投稿タイプのアイコン変更
//https://developer.wordpress.org/resource/dashicons/　からアイコン選ぶ
function db_icons_styles(){
   echo '<style>
    #adminmenu #menu-posts-db div.wp-menu-image:before {
      content: "\f495";
    }
   </style>';
}
add_action( 'admin_head', 'db_icons_styles' );


////////// 管理画面に任意のCSSを読み込ませる //////////
function wp_custom_admin_css() {
  echo "\n" . '<link href="' .get_bloginfo('template_directory'). '/admin.css' . '" rel="stylesheet" type="text/css" />' . "\n";
}
add_action('admin_head', 'wp_custom_admin_css', 100);


////////// タイトルの入力を必須にし、プレースホルダーを変更する //////////
add_action( 'admin_head-post-new.php', 'post_edit_required' );
add_action( 'admin_head-post.php', 'post_edit_required' );
function post_edit_required() {
?>
<script type="text/javascript">
jQuery(function($) {
  if( 'db' == $('#post_type').val() ) {
    $('#post').submit(function(e) {
      // タイトル
      if( '' == $('#title').val() ) {
        alert('装備名を入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#title').focus();
        return false;
      }
    });
  }
});
</script>
<?php
}
function change_default_title( $title ) {
  $screen = get_current_screen();
  if( 'db' == $screen->post_type ) {
    $title = '装備名を入力してください';
  }
  return $title;
}
add_filter('enter_title_here', 'change_default_title');


////////// カスタムフィールドの値で並び替えができるようにする //////////
function add_meta_query_vars( $public_query_vars ) {
    $public_query_vars[] = 'meta_key'; //カスタムフィールドのキー
    $public_query_vars[] = 'meta_value_num'; //カスタムフィールドの値（文字列）
    return $public_query_vars;
}
add_filter( 'query_vars', 'add_meta_query_vars' );


////////// カスタムフィールドの値を使って他のカスタムフィールドを自動入力する //////////
function replace_custom_field($id) {
  $post = get_post($id);
  // post_typeを判定(post, page, カスタム投稿)
  if( $post->post_type == 'db' ){
    $custom_fields = get_post_custom($id);
    $attack_n = $custom_fields['attack_n'][0];
    $defence_n = $custom_fields['defence_n'][0];
    $speed_n = $custom_fields['speed_n'][0];
    $mental_n = $custom_fields['mental_n'][0];
    $attack_l = $custom_fields['attack_l'][0];
    $defence_l = $custom_fields['defence_l'][0];
    $speed_l = $custom_fields['speed_l'][0];
    $mental_l = $custom_fields['mental_l'][0];
    $total_n = $attack_n + $defence_n + $speed_n + $mental_n;
    $total_l = $attack_l + $defence_l + $speed_l + $mental_l;

    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { //自動保存時
      return $post_id; // 何もしない
    } elseif( !empty( $_POST ) ) { //投稿更新時
      if(empty($attack_n) && (!empty($attack_l) || $attack_l == '0')){
        update_post_meta($id, 'attack_n', round($attack_l / 1.1,0));
      }
      if(empty($defence_n) && (!empty($defence_l) || $defence == '0')){
        update_post_meta($id, 'defence_n', round($defence_l / 1.1,0));
      }
      if(empty($speed_n) && (!empty($speed_l) || $speed_l == '0' )){
        update_post_meta($id, 'speed_n', round($speed_l / 1.1,0));
      }
      if(empty($mental_n) && (!empty($mental_l) || $mental_l == '0')){
        update_post_meta($id, 'mental_n', round($mental_l / 1.1,0));
      }
      if((!empty($attack_n) || $attack_n == '0') && (!empty($defence_n) || $defence_n == '0') && (!empty($speed_n) || $speed_n == '0') && (!empty($mental_n) || $mental_n == '0')){
      update_post_meta($id, 'total_n', $total_n);
      } elseif((!empty($attack_l) || $attack_l == '0') && (!empty($defence_l) || $defence_l == '0') && (!empty($speed_l) || $speed_l == '0') && (!empty($mental_l) || $mental_l == '0')){
      update_post_meta($id, 'total_n', round($total_l / 1.1,0));
      }
    }
  }
}
add_action( 'save_post', 'replace_custom_field' );

?>