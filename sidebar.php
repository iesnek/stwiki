<?php if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') || is_multi_device('tablet') ): //スマホかタブレットの場合 ?>

<aside class="l-menuBtn menuBtn">
  <a href="#mm-sub">
    <svg><title>メニューボタン</title><use xlink:href="#menu"/></svg>
  </a>
</aside><!-- .l-menuBtn -->

<?php endif; endif; ?>


<?php if ( function_exists( 'is_multi_device' ) ): //スマホかタブレットの場合
  if ( is_multi_device('smart') || is_multi_device('tablet') ): ?>
<aside id="mm-sub" class="l-sub">
<?php else: ?>
<aside id="sub" class="l-sub">
<?php endif; endif; ?>


<div class="sub_wrap">

<?php if ( function_exists( 'is_multi_device' ) ): //スマホかタブレットの場合
  if ( is_multi_device('smart') || is_multi_device('tablet') ): ?>

<header class="subHead">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.jpg" alt="戦国の虎z データベース&攻略wiki">
  <p class="l-block">『戦国の虎z データベース&攻略wiki』 は<br>誰でも編集できる情報共有サイトです</p>
</header><!-- .subHead -->
<div class="l-block subHead_btn subHead_write arrow">
  <a href="<?php echo get_admin_url(); ?>"><svg><title>情報を編集する</title><use xlink:href="#write"/></svg>情報を編集する</a>
</div>
<div class="l-block subHead_btn subHead_login arrow">
  <?php if( is_user_logged_in() ): ?>
    <a href="<?php echo get_page_link('210'); ?>"><svg><title>マイページ</title><use xlink:href="#my"/></svg><p>マイページ</p></a>
  <?php else: ?>
    <a href="<?php echo get_page_link('204'); ?>"><svg><title>ログイン</title><use xlink:href="#login"/></svg><p>ログイン</p></a>
  <?php endif; ?>
</div>
<div class="l-block mm-search">
  <?php get_search_form(); ?>
</div>

<?php else: ?>

<div class="l-section search">
  <?php get_search_form(); ?>
</div>
<aside class="pr"></aside><!-- .pr -->

<?php endif; endif; ?>


<nav class="subNav_wrap">
  <h2 class="headline">MENU</h2><!-- .headline -->

<?php if ( function_exists( 'is_multi_device' ) ): //スマホかタブレットの場合
  if ( is_multi_device('smart') || is_multi_device('tablet') ): ?>
  <ul class="subNav">
<?php else: ?>
  <ul class="subNav arrow">
<?php endif; endif; ?>
    <li class="subNav_list subNav_buki">
      <a class="subNav_parent" href="<?php echo get_term_link('buki','equip'); ?>"><svg><title>武器</title><use xlink:href="#buki"/></svg>すべての武器</a>
      <ul>
        <li><a href="<?php echo get_term_link('bushi','equip'); ?>">武士</a></li>
        <li><a href="<?php echo get_term_link('yari','equip'); ?>">槍使い</a></li>
        <li><a href="<?php echo get_term_link('yumi','equip'); ?>">狙撃手</a></li>
        <li><a href="<?php echo get_term_link('miko','equip'); ?>">巫女</a></li>
        <li><a href="<?php echo get_term_link('ninja','equip'); ?>">忍者</a></li>
        <li><a href="<?php echo get_term_link('yokenshi','equip'); ?>">妖拳士</a></li>
      </ul>
    </li>
    <li class="subNav_list subNav_bogu">
      <a class="subNav_parent" href="<?php echo get_term_link('bogu','equip'); ?>"><svg><title>防具</title><use xlink:href="#bogu"/></svg>すべての防具</a>
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
    <li class="subNav_list subNav_irui">
      <a class="subNav_parent" href="<?php echo get_term_link('irui','equip'); ?>"><svg><title>衣類</title><use xlink:href="#irui"/></svg>すべての衣類</a>
      <ul>
        <li><a href="<?php echo get_term_link('inner','equip'); ?>">インナー</a></li>
        <li><a href="<?php echo get_term_link('outer','equip'); ?>">アウター</a></li>
        <li><a href="<?php echo get_term_link('shoes','equip'); ?>">靴</a></li>
        <li><a href="<?php echo get_term_link('front','equip'); ?>">前面</a></li>
        <li><a href="<?php echo get_term_link('option','equip'); ?>">オプション</a></li>
      </ul>
    </li>
    <li class="subNav_list subNav_fuda">
      <a class="subNav_parent" href="<?php echo get_term_link('fuda','equip'); ?>"><svg><title>陰陽札</title><use xlink:href="#fuda"/></svg>すべての陰陽札</a>
      <ul>
        <li><a href="<?php echo get_term_link('bushi-fuda','equip'); ?>">武士</a></li>
        <li><a href="<?php echo get_term_link('yari-fuda','equip'); ?>">槍使い</a></li>
        <li><a href="<?php echo get_term_link('yumi-fuda','equip'); ?>">狙撃手</a></li>
        <li><a href="<?php echo get_term_link('miko-fuda','equip'); ?>">巫女</a></li>
        <li><a href="<?php echo get_term_link('ninja-fuda','equip'); ?>">忍者</a></li>
        <li><a href="<?php echo get_term_link('yokenshi-fuda','equip'); ?>">妖拳士</a></li>
      </ul>
    </li>
    <li class="subNav_list subNav_make">
      <a class="subNav_parent" href="<?php echo get_term_link('make','equip'); ?>"><svg><title>キャラメイク</title><use xlink:href="#make"/></svg>すべてのキャラメイク</a>
      <ul>
          <li><a href="<?php echo get_term_link('hair','equip'); ?>">髪型</a></li>
          <li><a href="<?php echo get_term_link('eye','equip'); ?>">目</a></li>
          <li><a href="<?php echo get_term_link('mouth  ','equip'); ?>">口</a></li>
          <li><a href="<?php echo get_term_link('face','equip'); ?>">輪郭</a></li>
          <li><a href="<?php echo get_term_link('skin','equip'); ?>">肌色</a></li>
          <li><a href="<?php echo get_term_link('background','equip'); ?>">背景</a></li>
      </ul>
    </li>
  </ul><!-- .subNav -->

  <div class="l-block bnr bnr_basic arrow asanoha">
    <a href="<?php echo get_category_link('74'); ?>"><p>基本情報</p></a>
  </div>
  <div class="l-block bnr bnr_strategy arrow asanoha">
    <a href="<?php echo get_category_link('75'); ?>"><p>攻略情報</p></a>
  </div>

  <?php if ( function_exists( 'is_multi_device' ) ): //スマホかタブレットの場合
    if ( is_multi_device('smart') || is_multi_device('tablet') ): ?>
  <ul class="subNav_other">
    <li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
    <li><a href="<?php echo get_page_link(145); ?>">本サイトについて</a></li>
    <li><a href="<?php echo get_page_link(147); ?>">利用規約</a></li>
    <li><a href="<?php echo get_page_link(151); ?>">プライバシーポリシー</a></li>
    <li><a href="<?php echo get_page_link(154); ?>">お問い合わせ</a></li>
    <li><a target="_blank" href="http://sentora.jp">戦国の虎z 公式サイト</a></li>
  </ul><!-- .subNav -->
  <?php endif; endif; ?>
</nav><!-- .subNav_wrap -->

</div><!-- .sub_wrap -->
</aside><!-- #sub.l-sub -->