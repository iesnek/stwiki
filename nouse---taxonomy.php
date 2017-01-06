<?php get_header(); ?>

<div class="l-wrap clearfix">

<div class="breadcrumb">
<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
</div><!-- .breadcrumb -->

<main id="main" class="l-main">


<section class="l-section">

<?php if(is_tax('equip',array('buki','bushi','yari','yumi','miko','ninja','yokenshi'))): ?>
  <section class="l-block dbMenu dbMenu_buki">
    <ul class="arrow">
      <li class="dbMenu_parent"><a href="<?php echo get_term_link('buki','equip'); ?>">すべての武器</a></li>
      <li class="dbMenu_child u-bd0">
        <ul>
          <li><a href="<?php echo get_term_link('bushi','equip'); ?>">武士</a></li>
          <li><a href="<?php echo get_term_link('yari','equip'); ?>">槍使い</a></li>
          <li><a href="<?php echo get_term_link('yumi','equip'); ?>">狙撃手</a></li>
          <li><a href="<?php echo get_term_link('miko','equip'); ?>">巫女</a></li>
          <li><a href="<?php echo get_term_link('ninja','equip'); ?>">忍者</a></li>
          <li><a href="<?php echo get_term_link('yokenshi','equip'); ?>">妖拳士</a></li>
        </ul>
      </li>
    </ul>
  </section><!-- .l-block dbMenu dbMenu_buki -->
<?php elseif(is_tax('equip',array('bogu','head','mask','neck','body','waist','shoulder','arm','leg'))): ?>
  <section class="l-block dbMenu dbMenu_bogu">
    <ul class="arrow">
      <li class="dbMenu_parent"><a href="<?php echo get_term_link('bogu','equip'); ?>">すべての防具</a></li>
      <li class="dbMenu_child u-bd0">
        <ul>
          <li><a href="<?php echo get_term_link('head','equip'); ?>">頭</a></li>
          <li><a href="<?php echo get_term_link('mask','equip'); ?>">マスク</a></li>
          <li><a href="<?php echo get_term_link('neck','equip'); ?>">首</a></li>
          <li><a href="<?php echo get_term_link('body','equip'); ?>">胴</a></li>
          <li><a href="<?php echo get_term_link('waist','equip'); ?>">腰</a></li>
          <li><a href="<?php echo get_term_link('shoulder','equip'); ?>">肩</a></li>
          <li><a href="<?php echo get_term_link('arm','equip'); ?>">腕</a></li>
          <li><a href="<?php echo get_term_link('leg','equip'); ?>">すね</a></li>
        </ul>
      </li>
    </ul>
  </section><!-- .l-block dbMenu dbMenu_bogu -->
<?php elseif(is_tax('equip',array('irui','inner','outer','shoes','front','option'))): ?>
  <section class="l-block dbMenu dbMenu_irui">
    <ul class="arrow">
      <li class="dbMenu_parent"><a href="<?php echo get_term_link('irui','equip'); ?>">すべての衣類</a></li>
      <li class="dbMenu_child u-bd0">
        <ul>
          <li><a href="<?php echo get_term_link('inner','equip'); ?>">インナー</a></li>
          <li><a href="<?php echo get_term_link('outer','equip'); ?>">アウター</a></li>
          <li><a href="<?php echo get_term_link('shoes','equip'); ?>">靴</a></li>
          <li><a href="<?php echo get_term_link('front','equip'); ?>">前面</a></li>
          <li><a href="<?php echo get_term_link('option','equip'); ?>">オプション</a></li>
        </ul>
      </li>
    </ul>
  </section><!-- .l-block dbMenu dbMenu_irui -->
<?php elseif(is_tax('equip',array('fuda','bushi-fuda','yari-fuda','yumi-fuda','miko-fuda','ninja-fuda','yokenshi-fuda'))): ?>
  <section class="l-block dbMenu dbMenu_fuda">
    <ul class="arrow">
      <li class="dbMenu_parent"><a href="<?php echo get_term_link('fuda','equip'); ?>">すべての陰陽札</a></li>
      <li class="dbMenu_child u-bd0">
        <ul>
          <li><a href="<?php echo get_term_link('bushi-fuda','equip'); ?>">武士</a></li>
          <li><a href="<?php echo get_term_link('yari-fuda','equip'); ?>">槍使い</a></li>
          <li><a href="<?php echo get_term_link('yumi-fuda','equip'); ?>">狙撃手</a></li>
          <li><a href="<?php echo get_term_link('miko-fuda','equip'); ?>">巫女</a></li>
          <li><a href="<?php echo get_term_link('ninja-fuda','equip'); ?>">忍者</a></li>
          <li><a href="<?php echo get_term_link('yokenshi-fuda','equip'); ?>">妖拳士</a></li>
        </ul>
      </li>
    </ul>
  </section><!-- .l-block dbMenu dbMenu_fuda -->
<?php elseif(is_tax('equip',array('make','hair','eye','mouth','face','skin','background'))): ?>
  <section class="l-block dbMenu dbMenu_make">
    <ul class="arrow">
<?php if ( function_exists( 'is_multi_device' ) )://スマホかタブレットの場合
  if ( is_multi_device('smart') || is_multi_device('tablet') ): ?>
    <li class="dbMenu_parent"><a href="<?php echo get_term_link('make','equip'); ?>">すべてのキャラメイク</a></li>
<?php else: //そうじゃない場合 ?>
    <li class="dbMenu_parent"><a href="<?php echo get_term_link('make','equip'); ?>">すべての<br>キャラメイク</a></li>
<?php endif; endif; ?>
      <li class="dbMenu_child u-bd0">
        <ul>
          <li><a href="<?php echo get_term_link('hair','equip'); ?>">髪型</a></li>
          <li><a href="<?php echo get_term_link('eye','equip'); ?>">目</a></li>
          <li><a href="<?php echo get_term_link('mouth  ','equip'); ?>">口</a></li>
          <li><a href="<?php echo get_term_link('face','equip'); ?>">輪郭</a></li>
          <li><a href="<?php echo get_term_link('skin','equip'); ?>">肌色</a></li>
          <li><a href="<?php echo get_term_link('background','equip'); ?>">背景</a></li>
        </ul>
      </li>
    </ul>
  </section><!-- .l-block dbMenu dbMenu_make -->
<?php endif; ?>
</section><!-- .l-section -->

<aside class="pr"></aside><!-- .pr -->

<article class="archives l-section">

<p class="notes">上段…通常時MAXステータス,　下段…限界突破時MAXステータス<br>※各ステータス値は、これまでに確認できた最大の値を入れています。強化のされ方によって±5程度の個体差がある場合があります。</p>

<header class="archive_headline">
  <ul>
    <li class="img">画像<br>-</li>
    <li class="name">名称<br>-</li>
    <li>
      <?php $url = $_SERVER['REQUEST_URI'];
      if(strstr($url,'cost')==true && strstr($url,'ASC')==true){ echo '<a href="' . add_query_arg( array('meta_key' => 'cost', 'orderby' => 'meta_value_num', 'order' => 'DESC'), get_pagenum_link(1) ) . '">コスト<br>▲</a>'; }
      elseif(strstr($url,'cost')==true && strstr($url,'DESC')==true){ echo '<a href="' . add_query_arg( array('meta_key' => 'cost', 'orderby' => 'meta_value_num', 'order' => 'ASC'), get_pagenum_link(1) ) . '">コスト<br>▼</a>'; }
      else{ echo '<a href="' . add_query_arg( array('meta_key' => 'cost', 'orderby' => 'meta_value_num', 'order' => 'DESC'), get_pagenum_link(1) ) . '">コスト<br>▽</a>'; }
      ?>
    </li>
    <li>
      <?php $url = $_SERVER['REQUEST_URI'];
      if(strstr($url,'attack_n')==true && strstr($url,'ASC')==true){ echo '<a href="' . add_query_arg( array('meta_key' => 'attack_n', 'orderby' => 'meta_value_num', 'order' => 'DESC'), get_pagenum_link(1) ) . '">攻撃<br>▲</a>'; }
      elseif(strstr($url,'attack_n')==true && strstr($url,'DESC')==true){ echo '<a href="' . add_query_arg( array('meta_key' => 'attack_n', 'orderby' => 'meta_value_num', 'order' => 'ASC'), get_pagenum_link(1) ) . '">攻撃<br>▼</a>'; }
      else{ echo '<a href="' . add_query_arg( array('meta_key' => 'attack_n', 'orderby' => 'meta_value_num', 'order' => 'DESC'), get_pagenum_link(1) ) . '">攻撃<br>▽</a>'; }
      ?>
    </li>
    <li>
      <?php $url = $_SERVER['REQUEST_URI'];
      if(strstr($url,'defence_n')==true && strstr($url,'ASC')==true){ echo '<a href="' . add_query_arg( array('meta_key' => 'defence_n', 'orderby' => 'meta_value_num', 'order' => 'DESC'), get_pagenum_link(1) ) . '">防御<br>▲</a>'; }
      elseif(strstr($url,'defence_n')==true && strstr($url,'DESC')==true){ echo '<a href="' . add_query_arg( array('meta_key' => 'defence_n', 'orderby' => 'meta_value_num', 'order' => 'ASC'), get_pagenum_link(1) ) . '">防御<br>▼</a>'; }
      else{ echo '<a href="' . add_query_arg( array('meta_key' => 'defence_n', 'orderby' => 'meta_value_num', 'order' => 'DESC'), get_pagenum_link(1) ) . '">防御<br>▽</a>'; }
      ?>
    </li>
    <li>
      <?php $url = $_SERVER['REQUEST_URI'];
      if(strstr($url,'speed_n')==true && strstr($url,'ASC')==true){ echo '<a href="' . add_query_arg( array('meta_key' => 'speed_n', 'orderby' => 'meta_value_num', 'order' => 'DESC'), get_pagenum_link(1) ) . '">早さ<br>▲</a>'; }
      elseif(strstr($url,'speed_n')==true && strstr($url,'DESC')==true){ echo '<a href="' . add_query_arg( array('meta_key' => 'speed_n', 'orderby' => 'meta_value_num', 'order' => 'ASC'), get_pagenum_link(1) ) . '">早さ<br>▼</a>'; }
      else{ echo '<a href="' . add_query_arg( array('meta_key' => 'speed_n', 'orderby' => 'meta_value_num', 'order' => 'DESC'), get_pagenum_link(1) ) . '">早さ<br>▽</a>'; }
      ?>
    </li>
    <li>
      <?php $url = $_SERVER['REQUEST_URI'];
      if(strstr($url,'mental_n')==true && strstr($url,'ASC')==true){ echo '<a href="' . add_query_arg( array('meta_key' => 'mental_n', 'orderby' => 'meta_value_num', 'order' => 'DESC'), get_pagenum_link(1) ) . '">気合<br>▲</a>'; }
      elseif(strstr($url,'mental_n')==true && strstr($url,'DESC')==true){ echo '<a href="' . add_query_arg( array('meta_key' => 'mental_n', 'orderby' => 'meta_value_num', 'order' => 'ASC'), get_pagenum_link(1) ) . '">気合<br>▼</a>'; }
      else{ echo '<a href="' . add_query_arg( array('meta_key' => 'mental_n', 'orderby' => 'meta_value_num', 'order' => 'DESC'), get_pagenum_link(1) ) . '">気合<br>▽</a>'; }
      ?>
    </li>
    <li>
      <?php $url = $_SERVER['REQUEST_URI'];
      if(strstr($url,'total_n')==true && strstr($url,'ASC')==true){ echo '<a href="' . add_query_arg( array('meta_key' => 'total_n', 'orderby' => 'meta_value_num', 'order' => 'DESC'), get_pagenum_link(1) ) . '">合計<br>▲</a>'; }
      elseif(strstr($url,'total_n')==true && strstr($url,'DESC')==true){ echo '<a href="' . add_query_arg( array('meta_key' => 'total_n', 'orderby' => 'meta_value_num', 'order' => 'ASC'), get_pagenum_link(1) ) . '">合計<br>▼</a>'; }
      else{ echo '<a href="' . add_query_arg( array('meta_key' => 'total_n', 'orderby' => 'meta_value_num', 'order' => 'DESC'), get_pagenum_link(1) ) . '">合計<br>▽</a>'; }
      ?>
    </li>
  </ul>
</header><!-- .archive_headline -->


<?php
if (have_posts()) :
while (have_posts()) : the_post();

///////////////////// アドバンスドカスタムフィールドの値を取得
  $rarity = get_field('rarity'); // 基本情報-レアリティ
  $img = get_field('img'); // 基本情報-画像-通常時
  $imgurl = wp_get_attachment_image_src($img, 'medium'); // 基本情報-画像-通常時
  $img2 = get_field('img2'); // 基本情報-画像-限界突破時
  $img2url = wp_get_attachment_image_src($img2, 'medium'); // 基本情報-画像-限界突破時
  $attack_n = get_field('attack_n'); // 通常時ステータス-攻撃
  $defence_n = get_field('defence_n'); // 通常時ステータス-防御
  $speed_n = get_field('speed_n'); // 通常時ステータス-早さ
  $mental_n = get_field('mental_n'); // 通常時ステータス-気合
  $total_n = get_field('total_n'); // 通常時ステータス-合計
  $limit_break = get_field('limit_break'); // 限界突破するか否か
  $attack_l = get_field('attack_l'); // 限界突破時ステータス-攻撃
  $defence_l = get_field('defence_l'); // 限界突破時ステータス-防御
  $speed_l = get_field('speed_l'); // 限界突破時ステータス-早さ
  $mental_l = get_field('mental_l'); // 限界突破時ステータス-気合

///////////////////// そのページのタクソノミーを取得
  $bushi = is_object_in_term($post->ID, 'equip','bushi');
  $yari = is_object_in_term($post->ID, 'equip','yari');
  $yumi = is_object_in_term($post->ID, 'equip','yumi');
  $miko = is_object_in_term($post->ID, 'equip','miko');
  $ninja = is_object_in_term($post->ID, 'equip','ninja');
  $yokenshi = is_object_in_term($post->ID, 'equip','yokenshi');
    $fuda_bushi = is_object_in_term($post->ID, 'equip','bushi-fuda');
    $fuda_yari = is_object_in_term($post->ID, 'equip','yari-fuda');
    $fuda_yumi = is_object_in_term($post->ID, 'equip','yumi-fuda');
    $fuda_miko = is_object_in_term($post->ID, 'equip','miko-fuda');
    $fuda_ninja = is_object_in_term($post->ID, 'equip','ninja-fuda');
    $fuda_yokenshi = is_object_in_term($post->ID, 'equip','yokenshi-fuda');

  $cost0 = is_object_in_term($post->ID, 'cost','cost0');
  $cost1 = is_object_in_term($post->ID, 'cost','cost1');
  $cost2 = is_object_in_term($post->ID, 'cost','cost2');
  $cost3 = is_object_in_term($post->ID, 'cost','cost3');
  $cost4 = is_object_in_term($post->ID, 'cost','cost4');
  $cost5 = is_object_in_term($post->ID, 'cost','cost5');
  $cost6 = is_object_in_term($post->ID, 'cost','cost6');
  $cost7 = is_object_in_term($post->ID, 'cost','cost7');
?>

<section class="dbItems">
  <a href="<?php the_permalink(); ?>" title="<?php echo $rarity . '&nbsp;'; the_title(); ?>">
    <div class="itemWrap">
      <div class="itemImg matchHeight">
      <?php if($imgurl): ?>
        <img src="<?php echo $imgurl[0]; ?>" alt="<?php the_title(); ?>">
      <?php else: if($bushi): ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-bushi.png" alt="">
        <?php elseif($yari): ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-yari.png" alt="">
        <?php elseif($yumi): ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-yumi.png" alt="">
        <?php elseif($miko): ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-miko.png" alt="">
        <?php elseif($ninja): ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-ninja.png" alt="">
        <?php elseif($yokenshi): ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-yokenshi.png" alt="">
        <?php elseif($fuda_bushi || $fuda_yari || $fuda_yumi || $fuda_miko || $fuda_ninja || $fuda_yokenshi): ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-fuda.png" alt="">
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-item.png" alt="">
      <?php endif; endif; ?>
      </div>
      <div class="itemMeta matchHeight">
        <h3 class="itemTitle"><?php echo $rarity . '&nbsp;'; the_title(); ?></h3>
        <div class="itemSpec_wrap">
          <ul class="itemSpec">
            <li class="itemCost"><?php if ($terms = get_the_terms($post->ID, 'cost')) { foreach ( $terms as $term ) { echo esc_html($term->name); }} ?></li>
            <li class="itemStatus u-bd0">
              <ul class="itemStatus_n">
                <li><?php if($attack_n){ echo $attack_n; } else{ echo '-'; } ?></li>
                <li><?php if($defence_n){ echo $defence_n; } else{ echo '-'; } ?></li>
                <li><?php if($speed_n){ echo $speed_n; } else{ echo '-'; } ?></li>
                <li><?php if($mental_n){ echo $mental_n; } else{ echo '-'; } ?></li>
                <li><?php if($total_n){ echo $total_n; } else{ echo '-'; } ?></li>
              </ul>
              <ul class="itemStatus_l">
                <li><?php if($attack_l){ echo $attack_l; } elseif($attack_n && $limit_break){ echo round($attack_n * 1.1,0); } else{ echo '-'; } ?></li>
                <li><?php if($defence_l){ echo $defence_l; } elseif($defence_n && $limit_break){ echo round($defence_n * 1.1,0); } else{ echo '-'; } ?></li>
                <li><?php if($speed_l){ echo $speed_l; } elseif($speed_n && $limit_break){ echo round($speed_n * 1.1,0); } else{ echo '-'; } ?></li>
                <li><?php if($mental_l){ echo $mental_l; } elseif($mental_n && $limit_break){ echo round($mental_n * 1.1,0); } else{ echo '-'; } ?></li>
                <li><?php if($attack_l && $defence_l && $speed_l && $mental_l){ echo $attack_l + $defence_l + $speed_l + $mental_l; } elseif($total_n && $limit_break){ echo round($total_n * 1.1,0); } else{ echo '-'; } ?></li>
              </ul>
            </li>
          </ul>
        </div><!-- .itemSpec_wrap -->
      </div><!-- .itemMeta -->
    </div><!-- .itemWrap -->
  </a>
</section><!-- /.dbItems -->

<?php
endwhile;
else :
  get_template_part('content', 'none');  //コンテントノーン呼び出し
endif;
?>

</article><!-- .archives l-section -->


<aside class="pager"> <!-- ページャー -->
  <?php global $wp_rewrite;
  $paginate_base = get_pagenum_link(1);
  if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
    $paginate_format = '';
    $paginate_base = add_query_arg('paged','%#%');
  }
  else{
    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
    user_trailingslashit('page/%#%/','paged');
    $paginate_base .= '%_%';
  }
  if ( function_exists( 'is_multi_device' ) ){ //スマホの場合
    if ( is_multi_device('smart') ){
  echo paginate_links(array(
    'base' => $paginate_base,
    'format' => $paginate_format,
    'total' => $wp_query->max_num_pages,
    'mid_size' => 2,
    'current' => ($paged ? $paged : 1),
    'prev_text' => '前のページ',
    'next_text' => '次のページ',
    )); } else {
  echo paginate_links(array(
    'base' => $paginate_base,
    'format' => $paginate_format,
    'total' => $wp_query->max_num_pages,
    'mid_size' => 5,
    'current' => ($paged ? $paged : 1),
    'prev_text' => '前のページ',
    'next_text' => '次のページ',
    )); }}
 ?>
</aside> <!-- /ページャー -->

</main><!-- #main.l-main -->

<?php get_sidebar(); ?>

</div><!-- .l-wrap clearfix -->

<?php get_footer(); ?>