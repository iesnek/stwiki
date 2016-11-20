<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php get_template_part('meta'); ?>

  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="all" />

<?php if ( is_singular() ) { wp_enqueue_script( "comment-reply" ); } ?>

<?php get_template_part('ogp');?>

<?php wp_head(); ?>

<!-- MMENU -->
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery("#mm-sub").mmenu({
    });
  });
</script>

</head>
<body <?php body_class(); ?>>

<!-- Google Analytics トラッキングコード -->

<!-- /Google Analytics トラッキングコード -->


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