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