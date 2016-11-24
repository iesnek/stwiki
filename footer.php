<footer id="footer" class="l-footer">
  <div class="pagetopBar asanoha"><a id="pagetopBtn" href="#"><span>ページトップへ戻る</span></a></div><!-- .pagetopBar bg_asanoha -->
  <div class="foot_wrap">
  <?php if ( function_exists( 'is_multi_device' ) )://PCの場合
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