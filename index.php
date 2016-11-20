<?php get_header(); ?>

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

<?php get_sidebar(); ?>

</div><!-- .l-wrap clearfix -->

<?php get_footer(); ?>