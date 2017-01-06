<?php get_header(); ?>

<div class="l-wrap clearfix">

<div class="breadcrumb">
<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
</div><!-- .m-breadcrumb -->

<main id="main" class="l-main">


<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>

<article id="post-<?php the_ID(); ?>" class="l-article article">
  <h1><?php the_title(); ?></h1>
  <div class="l-section">

  <?php the_content(); ?>

  </div><!-- /.articleBody -->
</article><!-- /.l-article -->

<?php
  endwhile;
else :
      get_template_part('content', 'none');  //コンテントノーン呼び出し
endif;
?>

</main><!-- #main.l-main -->

<?php get_sidebar(); ?>

</div><!-- .l-wrap clearfix -->

<?php get_footer(); ?>