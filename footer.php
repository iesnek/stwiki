<footer id="footer" class="l-footer">
  <div class="pagetopBar asanoha"><a id="pagetopBtn" href="#"><span>ページトップへ戻る</span></a></div><!-- .pagetopBar bg_asanoha -->
  <div class="foot_wrap">
  <?php if ( function_exists( 'is_multi_device' ) )://PCの場合
    if ( !is_multi_device('smart') && !is_multi_device('tablet') ): ?>
    <ul class="footNav">
      <li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
      <li><a href="<?php echo get_page_link(145); ?>">本サイトについて</a></li>
      <li><a href="<?php echo get_page_link(147); ?>">利用規約</a></li>
      <li><a href="<?php echo get_page_link(149); ?>">免責事項</a></li>
      <li><a href="<?php echo get_page_link(151); ?>">プライバシーポリシー</a></li>
      <li><a href="<?php echo get_page_link(154); ?>">お問い合わせ</a></li>
      <li><a href="http://sentora.jp">戦国の虎z 公式サイト</a></li>
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