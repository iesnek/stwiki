<?php

////////// 目次 //////////
// 基本設定
// アーカイブページで現在のカテゴリー・タグ・タームを取得する
// 投稿記事一覧にアイキャッチ画像を表示
// アーカイブにカスタム投稿タイプを表示
// カスタム投稿タイプ-データベース
// 管理画面に任意のCSSを読み込ませる
// 管理画面のbodyに権限ごとのクラスをつける
// タイトルの入力を必須にし、プレースホルダーを変更する
// カスタムフィールドの値で並び替えができるようにする
// カスタムフィールドの値を使って他のカスタムフィールドを自動入力する
// WPfooterの内容を「ページ上部へ戻る」に変更する
// ダッシュボードをカスタマイズ
// デフォルトの投稿のラベル変更
// 更新情報をメール通知する
// ビジュアルエディタのボタンカスタマイズ


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

// アドミンバーの非表示
add_filter( 'show_admin_bar', '__return_false' );


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


////////// カスタム投稿タイプ-装備 //////////
add_action( 'init', 'register_cpt_db' );

function register_cpt_db() {

  $labels = array( 
    'menu_name'          => _x( '装備', 'db' ),    //サイドメニューのラベル
    'all_items'          => _x( '装備一覧', 'db' ),        //サイドメニューの一覧ラベル
    'add_new'            => _x( '新規追加', 'db' ),        //サイドメニューの新規ラベル
    'name'               => _x( '装備', 'db' ),    //装備画面のタイトル
    'singular_name'      => _x( '装備', 'db' ),    //よくわからん
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
register_taxonomy(
  'cost',  // 追加するタクソノミー名（英小文字とアンダースコアのみ）
  'db',  // どのカスタム投稿タイプに追加するか
  array(
    'label' => 'コスト',  // 管理画面上に表示される名前（投稿で言うカテゴリー）
    'labels' => array(
      'all_items' => 'コスト一覧',  // 投稿画面の右カラムに表示されるテキスト（投稿で言うカテゴリー一覧）
      'add_new_item' => 'コストを追加'  // 投稿画面の右カラムに表示されるカテゴリ追加リンク
    ),
    'hierarchical' => false,  // タクソノミーを階層化するか否か（子カテゴリを作れるか否か）
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


////////// 管理画面のbodyに権限ごとのクラスをつける //////////
function add_user_role_class( $admin_body_class ) {
    global $current_user;
    if ( ! $admin_body_class ) {
        $admin_body_class .= ' ';
    }
    $admin_body_class .= 'role-' . urlencode( $current_user->roles[0] );
    return $admin_body_class;
}
add_filter( 'admin_body_class', 'add_user_role_class' );


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


////////// WPfooterの内容を「ページ上部へ戻る」に変更する //////////
add_filter('admin_footer_text', 'custom_admin_footer');
function custom_admin_footer() {
echo '<a class="pagetopLink" href="#">ページ上部へ戻る</a>';
}


////////// ダッシュボードをカスタマイズ //////////

// ダッシュボードから不要なものを非表示
function remove_dashboard_widgets() {
  remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );// 被リンク
  remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );// プラグイン
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );// WordPressブログ
  remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );// WordPressフォーラム
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );// クイック投稿
  remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' ); // 最近の下書き
  remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );// 現在の状況
  //remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');// アクティビティ
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

// アクティビティにカスタム投稿タイプを追加
add_filter( 'dashboard_recent_posts_query_args', 'my_dashboard_recent_posts_query_args', 10, 1 );
function my_dashboard_recent_posts_query_args( $query_args ) {
  $query_args['post_type'] = array( 'post', 'db' );
  if ( $query_args['post_status'] == "publish" )
    $query_args['posts_per_page'] = 10;
  return $query_args;
}

// ダッシュボードにオリジナルのメニューウィジェットを追加
function adminmenu_dashboard_widget_function() {
  echo '
    <div class="dashboard_nav">
      <ul class="dbNav_my mb">
        <li>
          <a href="'.get_bloginfo("url").'"><div class="dashicons dashicons-desktop"></div><p>サイトを見る</p></a>
        </li>
        <li>
          <a href="'.get_page_link('210').'"><div class="dashicons dashicons-admin-users"></div>
            <p>マイページ</p></a>
        </li>
      </ul>
      <ul class="dbNav_db mb">
        <li>
          <a href="./post-new.php?post_type=db"><div class="dashicons dashicons-edit"></div><p>装備情報を追加する</p></a>
        </li>
        <li>
          <a href="./edit.php?post_type=db"><div class="dashicons dashicons-welcome-write-blog"></div><p>装備情報を編集する</p></a>
        </li>
      </ul>
      <ul class="dbNav_post mb">
        <li>
          <a href="./post-new.php"><div class="dashicons dashicons-edit"></div><p>攻略情報を書く</p></a>
        </li>
        <li>
          <a href="./edit.php"><div class="dashicons dashicons-welcome-write-blog"></div><p>攻略情報を編集する</p></a>
        </li>
      </ul>
    </div>
  ';
}
function adminmenu_dashboard_widgets() {
  wp_add_dashboard_widget('adminmenu_dashboard_widget', '更新者用メニュー', 'adminmenu_dashboard_widget_function');
  // ダッシュボードの並び順を変更する
  // メタボックス配列をグローバライズする。これには wp-admin のすべてのウィジェットが含まれる。
  global $wp_meta_boxes;

  // 通常のダッシュボードウィジェット配列を取得
  // (最後に新しいウィジェットが追加されている)
  $normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

  // バックアップして新しいダッシュボードウィジェットを配列の最後から削除
  $admin_widget_backup = array( 'adminmenu_dashboard_widget' => $normal_dashboard['adminmenu_dashboard_widget'] );
  unset( $normal_dashboard['adminmenu_dashboard_widget'] );

  // 2つの配列を統合して新しいウィジェットが最初にくるようにする
  $sorted_dashboard = array_merge( $admin_widget_backup, $normal_dashboard );

  // 並べ替えた配列を元のメタボックスに保存し直す
  $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action('wp_dashboard_setup', 'adminmenu_dashboard_widgets' );


////////// デフォルトの投稿のラベル変更 //////////
function change_post_menu_label() {
global $menu;
global $submenu;
$menu[5][0] = '攻略情報';
$submenu['edit.php'][5][0] = '攻略情報一覧';
$submenu['edit.php'][10][0] = '新規追加';
$submenu['edit.php'][16][0] = 'タグ';
//echo ";
}
function change_post_object_label() {
global $wp_post_types;
$labels = &$wp_post_types['post']->labels;
$labels->name = '攻略情報';
$labels->singular_name = '攻略情報';
$labels->add_new = _x('新規追加', '攻略情報');
$labels->add_new_item = '新規追加';
$labels->edit_item = '攻略情報の編集';
$labels->new_item = '新規攻略情報';
$labels->view_item = '記事を表示';
$labels->search_items = '記事を検索';
$labels->not_found = '記事が見つかりませんでした';
$labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );


////////// 更新情報をメール通知する //////////
add_action( 'transition_post_status', function( $new_status, $old_status, $post ) {
  if ( 'publish' == $new_status  &&  'publish' != $old_status && 'db' == $post->post_type ) {
    $header = array( 'From: info@sentora-wiki.com' );
    // ブログ名(サイト名)
    $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
    // 投稿名
    $post_title = wp_specialchars_decode($post->post_title, ENT_QUOTES);
    // 送信先(管理者)
    $to = get_option('admin_email');
    // 件名
    $subject = "【戦虎wiki】更新通知「{$post_title}」";
    // 本文
    $message = "「{$post_title}」が投稿されました。\r\n";
    $message .= "\r\n";
    $message .= "編集リンク: \r\n";
    $message .= wp_specialchars_decode(get_edit_post_link( $post->ID ), ENT_QUOTES) . "\r\n";
    // メールを送信
    wp_mail( $to, $subject, $message, $header );
  }
}, 10, 3 );


////////// ビジュアルエディタのボタンカスタマイズ //////////
//TinyMCE追加用のスタイルを初期化
//http://com4tis.net/tinymce-advanced-post-custom/
add_editor_style();
if ( !function_exists( 'initialize_tinymce_styles' ) ):
function initialize_tinymce_styles($init_array) {
  //追加するスタイルの配列を作成
  $style_formats = array(
    array(
      'title' => '大見出し',
      'block' => 'h2',
      'classes' => 'h2'
    ),
    array(
      'title' => '小見出し',
      'block' => 'h3',
      'classes' => 'h3'
    ),
    array(
      'title' => '太字-黒',
      'inline' => 'span',
      'classes' => 'bold_black'
    ),
    array(
      'title' => '太字-赤',
      'inline' => 'span',
      'classes' => 'bold_red'
    ),
    array(
      'title' => '大きい字-黒',
      'inline' => 'span',
      'classes' => 'big_black'
    ),
    array(
      'title' => '大きい字-赤',
      'inline' => 'span',
      'classes' => 'big_red'
    ),
    array(
      'title' => '大きい太字-黒',
      'inline' => 'span',
      'classes' => 'big_bold_black'
    ),
    array(
      'title' => '大きい太字-赤',
      'inline' => 'span',
      'classes' => 'big_bold_red'
    ),
    array(
      'title' => 'すごく大きい字-黒',
      'inline' => 'span',
      'classes' => 'big_big_black'
    ),
    array(
      'title' => 'マーカー',
      'inline' => 'span',
      'classes' => 'marker'
    ),
    array(
      'title' => 'マーカー-太字',
      'inline' => 'span',
      'classes' => 'marker_bold'
    ),
  );
  //JSONに変換
  $init_array['style_formats'] = json_encode($style_formats);
  return $init_array;
}
endif;
add_filter('tiny_mce_before_init', 'initialize_tinymce_styles', 10000);

//TinyMCEにスタイルセレクトボックスを追加
//https://codex.wordpress.org/Plugin_API/Filter_Reference/mce_buttons,_mce_buttons_2,_mce_buttons_3,_mce_buttons_4
if ( !function_exists( 'add_styles_to_tinymce_buttons' ) ):
function add_styles_to_tinymce_buttons($buttons) {
  //見出しなどが入っているセレクトボックスを取り出す
  $temp = array_shift($buttons);
  //先頭にスタイルセレクトボックスを追加
  array_unshift($buttons, 'styleselect');
  //先頭に見出しのセレクトボックスを追加
  array_unshift($buttons, $temp);

  return $buttons;
}
endif;
add_filter('mce_buttons_2','add_styles_to_tinymce_buttons');


?>