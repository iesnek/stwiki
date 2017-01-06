<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php get_template_part('meta'); ?>

  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/fav.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/fav.ico" type="image/x-icon" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/assets/img/webclip.png" />

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
<!-- 高さ揃え -->
<script>
  jQuery(function(){
    jQuery('.matchHeight').matchHeight();
  });
</script>

</head>
<body <?php body_class(); ?>>

<!-- Google Analytics トラッキングコード -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43680545-3', 'auto');
  ga('send', 'pageview');

</script>
<!-- /Google Analytics トラッキングコード -->


<div id="wrap">

<header id="header" class="header">

  <div class="l-head_wrap clearfix">
    <div class="l-head_l">
      <h1 class="head_logo"><a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.jpg" alt="戦国の虎z データベース&攻略wiki"></a></h1><!-- .head_logo -->
    </div><!-- .l-head_l -->
    <div class="l-head_r">
      <ul class="head_link">
        <li><a href="
        <?php if(is_single()) {
        echo get_admin_url() . '/post.php?post=' . get_the_id() . '&action=edit';
        } else {
        echo get_admin_url();
        } ?>">
          <svg><title>情報を編集する</title><use xlink:href="#write"/></svg>
        <p>情報を編集する</p></a></li>
        <li>
        <?php if( is_user_logged_in() ): ?>
          <a href="<?php echo get_page_link('210'); ?>"><svg><title>マイページ</title><use xlink:href="#my"/></svg><p>マイページ</p></a>
        <?php else: ?>
          <a href="<?php echo get_page_link('204'); ?>"><svg><title>ログイン</title><use xlink:href="#login"/></svg><p>ログイン</p></a>
        <?php endif; ?>
        </li>
      </ul>
      <nav class="l-nav">
        <ul class="nav asanoha">
          <li><a href="<?php echo home_url('/'); ?>"><svg><title>HOME</title><use xlink:href="#home"/></svg><br>ホーム</a></li>
          <li><a href="<?php echo get_term_link('buki','equip'); ?>"><svg><title>武器</title><use xlink:href="#buki"/></svg><br>武　器</a></li>
          <li><a href="<?php echo get_term_link('bogu','equip'); ?>"><svg><title>防具</title><use xlink:href="#bogu"/></svg><br>防　具</a></li>
          <li><a href="<?php echo get_term_link('irui','equip'); ?>"><svg><title>衣類</title><use xlink:href="#irui"/></svg><br>衣　類</a></li>
          <li><a href="<?php echo get_term_link('fuda','equip'); ?>"><svg><title>陰陽札</title><use xlink:href="#fuda"/></svg><br>陰陽札</a></li>
        </ul><!-- .nav asanoha -->
      </nav><!-- .l-nav -->
    </div><!-- .l-head_r -->
  </div><!-- .l-head_wrap -->

<?php if( is_home() ): ?>
  <div class="head_cvr asanoha"><div>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mainv_sp.jpg"
         sizes="100vw"
         srcset="<?php echo get_template_directory_uri(); ?>/assets/img/mainv_sp.jpg 750w,
                 <?php echo get_template_directory_uri(); ?>/assets/img/mainv_pc.jpg 1150w"
         alt="戦国の虎z">

    <div class="head_cvr_inner arrow">
      <h2>戦国の虎z データベース&攻略wiki</h2>
      <p>当サイト、は誰でも編集できる『戦国の虎z』の情報共有サイト(非公式)です。</p>
      <a href="<?php if(is_user_logged_in()){ echo get_admin_url(); } else { echo get_page_link('204'); } ?>">情報を編集する</a>
    </div><!-- .head_cvr_inner -->

  </div></div>
<?php endif; ?>


</header><!-- #header .l-header -->