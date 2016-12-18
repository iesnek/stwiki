<?php //metaキーワードとディスクリプション
$term = get_current_term(); //カテゴリー・タグ・タームの取得
  if (is_front_page()) { //トップページの場合
    echo '<meta name="keyword" content="戦国の虎,戦虎,セントラ,攻略,wiki">';echo "\n";
    echo '<meta name="description" content="'; bloginfo('description'); echo '">';echo "\n";
  } elseif (is_post_type_archive('db')) { //データベースアーカイブの場合
    echo '<meta name="keyword" content="戦国の虎,戦虎,セントラ,データベース">';echo "\n";
    echo '<meta name="description" content="『戦国の虎z データベース&攻略wiki』は誰でも編集できる情報共有サイトです。">';echo "\n";
  } elseif (is_category()) { //カテゴリーアーカイブの場合
    echo '<meta name="keyword" content="戦国の虎,戦虎,セントラ,'; echo $term->name; echo '">';echo "\n";
    echo '<meta name="description" content="カテゴリー「'; echo $term->name; echo '」の一覧ページです。">';echo "\n";
  } elseif (is_tag()) { //タグアーカイブの場合
    echo '<meta name="keyword" content="戦国の虎,戦虎,セントラ,'; echo $term->name; echo '">';echo "\n";
    echo '<meta name="description" content="タグ「'; echo $term->name; echo '」の一覧ページです。">';echo "\n";
  } elseif (is_search()) { //検索結果ページの場合
    echo '<meta name="keyword" content="戦国の虎,戦虎,セントラ,'; the_search_query(); echo '">';echo "\n";
    echo '<meta name="description" content="「'; the_search_query(); echo '」の検索結果ページです。">';echo "\n";
  } elseif (is_single()) { //各投稿ページの場合
    echo '<meta name="keyword" content="戦国の虎,戦虎,セントラ,';
    $posttags = get_the_tags();
    $count = count($posttags);
    $loop = 0;
    if ($posttags) { foreach ($posttags as $tag) {
      $loop++;
      if ($count == $loop){ echo $tag->name . ''; }
      else { echo $tag->name . ','; }
    } }
    echo '">';echo "\n";
    echo '<meta name="description" content="';
    $digest = strip_tags($post->post_content); //記事内の余計なタグを取り除く
    $digest = ereg_replace('(rn|r|n)', '', $digest); //正規表現による置換
    $digest = mb_substr($digest, 0, 100). '…'; //マルチバイトに対応した文字数をカウント
    echo $digest;
    echo '">';echo "\n";
  } elseif (is_page()) { //各固定ページの場合
    echo '<meta name="keyword" content="戦国の虎,戦虎,セントラ">';echo "\n";
    echo '<meta name="description" content="';
    $digest = strip_tags($post->post_content); //記事内の余計なタグを取り除く
    $digest = ereg_replace('(rn|r|n)', '', $digest); //正規表現による置換
    $digest = mb_substr($digest, 0, 100). '…'; //マルチバイトに対応した文字数をカウント
    echo $digest;
    echo '">';echo "\n";
  } elseif (is_404()) { //404ページの場合
    echo '<meta name="keyword" content="戦国の虎,戦虎,セントラ">';echo "\n";
    echo '<meta name="description" content="404エラー　お探しのページはみつかりませんでした。">';echo "\n";
  } else { //その他
    echo '<meta name="keyword" content="戦国の虎,戦虎,セントラ">';echo "\n";
    echo '<meta name="description" content="'; bloginfo('description'); echo '">';echo "\n";
  }
?>

  <title><?php //タイトル
  if( !is_front_page() ) { wp_title('|', true, 'right'); } bloginfo('name');
  ?></title>