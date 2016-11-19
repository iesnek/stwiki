<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="keyword" content="戦国の虎,戦虎,セントラ,攻略">
  <meta name="description" content="">

  <title></title>

  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/webclip.png" />

  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="all" />


<?php wp_head(); ?>

<!-- MMENU -->
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery("#mm-sub").mmenu({
    });
  });
</script>


</head>
<body>

<div id="wrap">

<header id="header" class="header">
  <div class="l-headBar headBar asanoha">
    <div class="l-headBar_wrap clearfix">
      <h1 class="headBar_title">戦国の虎z 攻略&データベースwiki</h1>
      <ul class="headBar_link">
        <li><a href="">
          <svg><title>wikiを編集する</title><use xlink:href="#write"/></svg>
        <p>wikiを編集する</p></a></li>
        <li><a href="">
          <svg><title>ログイン</title><use xlink:href="#login"/></svg>
        <p>ログイン</p></a></li>
      </ul><!-- .headBar_link -->
    </div><!-- .headBar_wrap -->
  </div><!-- .l-headBar headBar asanoha -->
  <div class="l-head_wrap">
    <div class="head_logo"><a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.jpg" alt="戦国の虎z 攻略&データベースwiki"></a></div><!-- .head_logo -->

<?php if ( function_exists( 'is_multi_device' ) ):
  if ( !is_multi_device('smart') && !is_multi_device('tablet') ): //PCの場合 ?>

    <div class="l-head_bnr head_bnr"><a href="">
      <h2>wikiを編集</h2>
      <p>『戦国の虎z 攻略＆データベースwiki』は<br>　誰でも編集できる情報共有サイトです</p>
    </a></div>

<?php endif; endif; ?>

    <nav class="l-nav">
      <ul class="nav asanoha">
        <li><a href=""><svg><title>HOME</title><use xlink:href="#home"/></svg><br>ホーム</a></li>
        <li><a href=""><svg><title>武器</title><use xlink:href="#buki"/></svg><br>武　器</a></li>
        <li><a href=""><svg><title>防具</title><use xlink:href="#bogu"/></svg><br>防　具</a></li>
        <li><a href=""><svg><title>衣類</title><use xlink:href="#irui"/></svg><br>衣　類</a></li>
        <li><a href=""><svg><title>陰陽札</title><use xlink:href="#fuda"/></svg><br>陰陽札</a></li>
      </ul><!-- .nav asanoha -->
    </nav><!-- .l-nav -->
  </div><!-- .l-head_wrap -->

  <div class="head_cvr asanoha"><div>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mainv_sp.jpg"
         sizes="100vw"
         srcset="<?php echo get_template_directory_uri(); ?>/assets/img/mainv_sp.jpg 750w,
                 <?php echo get_template_directory_uri(); ?>/assets/img/mainv_pc.jpg 1150w"
         alt="戦国の虎z">
  </div></div>

<?php if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') || is_multi_device('tablet') ): //スマホかタブレットの場合 ?>

  <div class="head_bnr asanoha"><a href="">
    <h2>wikiを編集</h2>
    <p>『戦国の虎z 攻略＆データベースwiki』 は誰でも編集できる情報共有サイトです</p>
  </a></div>

<?php endif; endif; ?>


</header><!-- #header .l-header -->


<div class="l-wrap clearfix">
<main id="main" class="l-main">

<section class="l-section">
  <h2 class="headline">新着情報</h2><!-- .headline -->
  <ul class="news">
    <li><a href=""><span class="date">2016/10/31</span>『装備名が入ります』の情報を更新しました。</a></li>
    <li><a href=""><span class="date">2016/10/31</span>『装備名が入ります』の情報を更新しました。</a></li>
    <li><a href=""><span class="date">2016/10/31</span>『装備名が入ります』の情報を更新しました。</a></li>
    <li><a href=""><span class="date">2016/10/31</span>『記事タイトルが入ります。記事タイトルが入ります。記事タイトルが入ります。』</a></li>
    <li><a href=""><span class="date">2016/10/31</span>『装備名が入ります』の情報を更新しました。</a></li>
  </ul><!-- .news -->
</section><!-- .l-section -->

<aside class="pr"></aside><!-- .pr -->

<aside class="l-section clearfix">
  <div class="bnr bnr_basic arrow asanoha u-fLh">
    <a href=""><p>基本情報</p></a>
  </div>
  <div class="bnr bnr_strategy arrow asanoha u-fRh">
    <a href=""><p>攻略情報</p></a>
  </div>
</aside><!-- .l-section clearfix -->

<section class="l-section">
  <h2 class="headline">装備メニュー</h2><!-- .headline -->
  <section class="l-block dbMenu dbMenu_buki">
    <ul class="arrow">
      <li class="dbMenu_parent"><a href="">すべての武器</a></li>
      <li class="dbMenu_child u-bd0">
        <ul>
          <li><a href="">武士</a></li>
          <li><a href="">槍使い</a></li>
          <li><a href="">狙撃手</a></li>
          <li><a href="">巫女</a></li>
          <li><a href="">忍者</a></li>
          <li><a href="">妖拳士</a></li>
        </ul>
      </li>
    </ul>
  </section><!-- .l-block dbMenu dbMenu_buki -->

  <section class="l-block dbMenu dbMenu_bogu">
    <ul class="arrow">
      <li class="dbMenu_parent"><a href="">すべての防具</a></li>
      <li class="dbMenu_child u-bd0">
        <ul>
          <li><a href="">頭</a></li>
          <li><a href="">マスク</a></li>
          <li><a href="">首</a></li>
          <li><a href="">胴</a></li>
          <li><a href="">腰</a></li>
          <li><a href="">肩</a></li>
          <li><a href="">腕</a></li>
          <li><a href="">すね</a></li>
        </ul>
      </li>
    </ul>
  </section><!-- .l-block dbMenu dbMenu_bogu -->

  <section class="l-block dbMenu dbMenu_irui">
    <ul class="arrow">
      <li class="dbMenu_parent"><a href="">すべての衣類</a></li>
      <li class="dbMenu_child u-bd0">
        <ul>
          <li><a href="">インナー</a></li>
          <li><a href="">アウター</a></li>
          <li><a href="">靴</a></li>
          <li><a href="">前面</a></li>
          <li><a href="">オプション</a></li>
        </ul>
      </li>
    </ul>
  </section><!-- .l-block dbMenu dbMenu_irui -->

  <section class="l-block dbMenu dbMenu_fuda">
    <ul class="arrow">
      <li class="dbMenu_parent"><a href="">すべての陰陽札</a></li>
      <li class="dbMenu_child u-bd0">
        <ul>
          <li><a href="">武士</a></li>
          <li><a href="">槍使い</a></li>
          <li><a href="">狙撃手</a></li>
          <li><a href="">巫女</a></li>
          <li><a href="">忍者</a></li>
          <li><a href="">妖拳士</a></li>
        </ul>
      </li>
    </ul>
  </section><!-- .l-block dbMenu dbMenu_fuda -->

  <section class="l-block dbMenu dbMenu_make">
    <ul class="arrow">
<?php if ( function_exists( 'is_multi_device' ) ): //スマホかタブレットの場合
  if ( is_multi_device('smart') || is_multi_device('tablet') ): ?>
    <li class="dbMenu_parent"><a href="">すべてのキャラメイク</a></li>
<?php else: ?>
    <li class="dbMenu_parent"><a href="">すべての<br>キャラメイク</a></li>
<?php endif; endif; ?>
      <li class="dbMenu_child u-bd0">
        <ul>
          <li><a href="">髪型</a></li>
          <li><a href="">目</a></li>
          <li><a href="">口</a></li>
          <li><a href="">輪郭</a></li>
          <li><a href="">肌色</a></li>
          <li><a href="">背景</a></li>
        </ul>
      </li>
    </ul>
  </section><!-- .l-block dbMenu dbMenu_make -->

</section><!-- .database -->

<aside class="pr"></aside><!-- .pr -->


</main><!-- #main.l-main -->


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
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.jpg" alt="戦国の虎z 攻略&データベースwiki">
  <p class="l-block">『戦国の虎z 攻略＆データベースwiki』 は<br>誰でも編集できる情報共有サイトです</p>
</header><!-- .subHead -->
<div class="l-block subHead_btn subHead_write arrow">
  <a href=""><svg><title>wikiを編集する</title><use xlink:href="#write"/></svg>wikiを編集する</a>
</div>
<div class="l-block subHead_btn subHead_login arrow">
  <a href=""><svg><title>ログイン</title><use xlink:href="#login"/></svg>ログイン</a>
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
      <a class="subNav_parent" href=""><svg><title>武器</title><use xlink:href="#buki"/></svg>すべての武器</a>
      <ul>
        <li><a href="">武士</a></li>
        <li><a href="">槍使い</a></li>
        <li><a href="">狙撃手</a></li>
        <li><a href="">巫女</a></li>
        <li><a href="">忍者</a></li>
        <li><a href="">妖拳士</a></li>
      </ul>
    </li>
    <li class="subNav_list subNav_bogu">
      <a class="subNav_parent" href=""><svg><title>防具</title><use xlink:href="#bogu"/></svg>すべての防具</a>
      <ul>
        <li><a href="">頭</a></li>
        <li><a href="">マスク</a></li>
        <li><a href="">首</a></li>
        <li><a href="">胴</a></li>
        <li><a href="">腰</a></li>
        <li><a href="">肩</a></li>
        <li><a href="">腕</a></li>
        <li><a href="">すね</a></li>
      </ul>
    </li>
    <li class="subNav_list subNav_irui">
      <a class="subNav_parent" href=""><svg><title>衣類</title><use xlink:href="#irui"/></svg>すべての衣類</a>
      <ul>
        <li><a href="">インナー</a></li>
        <li><a href="">アウター</a></li>
        <li><a href="">靴</a></li>
        <li><a href="">前面</a></li>
        <li><a href="">オプション</a></li>
      </ul>
    </li>
    <li class="subNav_list subNav_fuda">
      <a class="subNav_parent" href=""><svg><title>陰陽札</title><use xlink:href="#fuda"/></svg>すべての陰陽札</a>
      <ul>
        <li><a href="">武士</a></li>
        <li><a href="">槍使い</a></li>
        <li><a href="">狙撃手</a></li>
        <li><a href="">巫女</a></li>
        <li><a href="">忍者</a></li>
        <li><a href="">妖拳士</a></li>
      </ul>
    </li>
    <li class="subNav_list subNav_make">
      <a class="subNav_parent" href=""><svg><title>キャラメイク</title><use xlink:href="#make"/></svg>すべてのキャラメイク</a>
      <ul>
        <li><a href="">髪型</a></li>
        <li><a href="">目</a></li>
        <li><a href="">口</a></li>
        <li><a href="">輪郭</a></li>
        <li><a href="">肌色</a></li>
        <li><a href="">背景</a></li>
      </ul>
    </li>
  </ul><!-- .subNav -->

  <div class="l-block bnr bnr_basic arrow asanoha">
    <a href=""><p>基本情報</p></a>
  </div>
  <div class="l-block bnr bnr_strategy arrow asanoha">
    <a href=""><p>攻略情報</p></a>
  </div>

  <?php if ( function_exists( 'is_multi_device' ) ): //スマホかタブレットの場合
    if ( is_multi_device('smart') || is_multi_device('tablet') ): ?>
  <ul class="subNav_other">
    <li><a href="">ホーム</a></li>
    <li><a href="">本サイトについて</a></li>
    <li><a href="">利用規約</a></li>
    <li><a href="">免責事項</a></li>
    <li><a href="">プライバシーポリシー</a></li>
    <li><a href="">お問い合わせ</a></li>
    <li><a href="">戦国の虎z 公式サイト</a></li>
  </ul><!-- .subNav -->
  <?php endif; endif; ?>
</nav><!-- .subNav_wrap -->

</div><!-- .sub_wrap -->
</aside><!-- #sub.l-sub -->


</div><!-- .l-wrap clearfix -->


<footer id="footer" class="l-footer">
  <div class="pagetopBar asanoha"><a id="pagetopBtn" href="#"><span>ページトップへ戻る</span></a></div><!-- .pagetopBar bg_asanoha -->
  <div class="foot_wrap">
  <?php if ( function_exists( 'is_multi_device' ) ): //PCの場合
    if ( !is_multi_device('smart') && !is_multi_device('tablet') ): ?>
    <ul class="footNav">
      <li><a href="">ホーム</a></li>
      <li><a href="">本サイトについて</a></li>
      <li><a href="">利用規約</a></li>
      <li><a href="">免責事項</a></li>
      <li><a href="">プライバシーポリシー</a></li>
      <li><a href="">お問い合わせ</a></li>
      <li><a href="">戦国の虎z 公式サイト</a></li>
    </ul><!-- .subNav -->
  <?php endif; endif; ?>

    <p class="copyright">© 2016 kitano</p><!-- .copyright -->
  </div><!-- .foot_wrap -->
</footer><!-- #footer .l-footer -->


</div><!-- #wrap -->

<?php include_once("assets/svg/icon.svg"); //svgスプライトの呼び出し ?>
<?php wp_footer(); ?>
</body>
</html>