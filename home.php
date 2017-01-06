<?php get_header(); ?>

<div class="l-wrap clearfix">
<main id="main" class="l-main">

<section class="l-section">
  <h2 class="headline">うんこうんこちーんちん</h2><!-- .headline -->
  <div class="news">
    <?php
      global $post;
      $my_posts= get_posts(array(
      'post_type' => array('post','db'), //post_typeを複数指定
      'numberposts' => 7      //表示させる記事数
      ));
      foreach($my_posts as $post):setup_postdata($post);
      $rarity = get_field('rarity');
    ?>
    <dl>
      <dt><?php the_time('Y.m.d'); ?></dt>
      <?php if( get_post_type() == 'db' ): ?>
      <dd>
      <?php
      $days=7; //Newをつける日数
      $today=date_i18n('U'); $entry=get_the_time('U');
      $diff1=date('U',($today - $entry))/86400;
      if ($days > $diff1){
      echo'<span>New</span>';
      }
      ?>
      <a href="<?php the_permalink(); ?>">『 <?php echo $rarity; echo '&nbsp;'; the_title(); ?> 』</a>の情報を更新しました。</dd>
      <?php else: ?>
      <dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
      <?php endif; ?>
    </dl>
    <?php endforeach; ?>
  </div><!-- .news -->
</section><!-- .l-section -->

<aside class="pr"></aside><!-- .pr -->

<aside class="l-section clearfix">
  <div class="bnr bnr_basic arrow asanoha u-fLh">
    <a href="<?php echo get_category_link('74'); ?>"><p>基本情報</p></a>
  </div>
  <div class="bnr bnr_strategy arrow asanoha u-fRh">
    <a href="<?php echo get_category_link('75'); ?>"><p>攻略情報</p></a>
  </div>
</aside><!-- .l-section clearfix -->

<section class="l-section">
  <h2 class="headline">装備メニュー</h2><!-- .headline -->
  <div class="l-block dbMenu dbMenu_buki">
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
  </div><!-- .l-block dbMenu dbMenu_buki -->

  <div class="l-block dbMenu dbMenu_bogu">
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
  </div><!-- .l-block dbMenu dbMenu_bogu -->

  <div class="l-block dbMenu dbMenu_irui">
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
  </div><!-- .l-block dbMenu dbMenu_irui -->

  <div class="l-block dbMenu dbMenu_fuda">
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
  </div><!-- .l-block dbMenu dbMenu_fuda -->

  <div class="l-block dbMenu dbMenu_make">
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
  </div><!-- .l-block dbMenu dbMenu_make -->

</section><!-- .l-section -->

<aside class="pr"></aside><!-- .pr -->


</main><!-- #main.l-main -->

<?php get_sidebar(); ?>

</div><!-- .l-wrap clearfix -->

<?php get_footer(); ?>