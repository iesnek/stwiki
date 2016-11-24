<?php

////////// 目次 //////////
//基本設定
//アーカイブページで現在のカテゴリー・タグ・タームを取得する
//ログイン画面のロゴ変更
//投稿記事一覧にアイキャッチ画像を表示
//アーカイブにカスタム投稿タイプを表示
//カスタム投稿タイプ-データベース
//管理画面に任意のCSSを読み込ませる
//管理画面のカテゴリーの追加ボタンを消す


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
background: url('.get_template_directory_uri().'/assets/img/defaultImg.png) no-repeat;
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


////////// アーカイブにカスタム投稿タイプを表示 //////////
function set_post_per_page( $query ) {
  if ( is_admin() || !$query->is_main_query() )
    return;

  if ( $query->is_post_type_archive( 'db' ) ) {
    return;
  }

  if ( $query->is_home() || $query->is_archive() ) {
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

    'supports' => array( 'title', 'thumbnail' ),

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
  'db_taxonomy',  // 追加するタクソノミー名（英小文字とアンダースコアのみ）
  'db',  // どのカスタム投稿タイプに追加するか
  array(
    'label' => 'カテゴリー',  // 管理画面上に表示される名前（投稿で言うカテゴリー）
    'labels' => array(
      'all_items' => 'カテゴリー一覧',  // 投稿画面の右カラムに表示されるテキスト（投稿で言うカテゴリー一覧）
      'add_new_item' => 'カテゴリーを追加'  // 投稿画面の右カラムに表示されるカテゴリ追加リンク
    ),
    'hierarchical' => true  // タクソノミーを階層化するか否か（子カテゴリを作れるか否か）
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


////////// 管理画面のカテゴリーの追加ボタンを消す //////////
function hide_category_add() {
   global $pagenow;
   global $post_type;//投稿タイプで切り分けたいときに使う
   if (is_admin() && ($pagenow=='post-new.php' || $pagenow=='post.php') && $post_type=="db"){
       echo '<style type="text/css">
       #db_taxonomy-adder{display:none;}
       #db_taxonomy-tabs{display:none;}
       </style>';
   }
}
  add_action( 'admin_head', 'hide_category_add'  );




////////// 管理画面の親カテゴリーのチェックボックスを外す //////////
require_once(ABSPATH . '/wp-admin/includes/template.php');
class Danda_Category_Checklist extends Walker_Category_Checklist {
 
     function start_el( &$output, $db_taxonomy, $depth, $args, $id = 0 ) {
        extract($args);
        if ( empty($taxonomy) )
            $taxonomy = 'db_taxonomy';
 
        if ( $taxonomy == 'db_taxonomy' )
            $name = 'post_db_taxonomy';
        else
            $name = 'tax_input['.$taxonomy.']';
 
        $class = in_array( $db_taxonomy->term_id, $popular_cats ) ? ' class="popular-db_taxonomy"' : '';
        //親カテゴリの時はチェックボックス表示しない
        if($db_taxonomy->parent == 0){
               $output .= "\n<li id='{$taxonomy}-{$db_taxonomy->term_id}'$class>" . '<label class="selectit">' . esc_html( apply_filters('the_db_taxonomy', $db_taxonomy->name )) . '</label>';
        }else{
            $output .= "\n<li id='{$taxonomy}-{$db_taxonomy->term_id}'$class>" . '<label class="selectit"><input value="' . $db_taxonomy->term_id . '" type="checkbox" name="'.$name.'[]" id="in-'.$taxonomy.'-' . $db_taxonomy->term_id . '"' . checked( in_array( $db_taxonomy->term_id, $selected_cats ), true, false ) . disabled( empty( $args['disabled'] ), false, false ) . ' /> ' . esc_html( apply_filters('the_db_taxonomy', $db_taxonomy->name )) . '</label>';
        }
    }
 
}


?>