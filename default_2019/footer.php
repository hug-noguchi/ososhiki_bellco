      <!-- footer -->
      <footer id="footer" class="footer" role="contentinfo">
        <div class="to-top">
          <a href="#header"></a>
        </div>
        <div class="wrapper">
          <ul class="footer__nav">
              <li><a href="https://www.bellco.co.jp/regist/" target="_blank">特定商取引に基づく表記</a></li>
              <li><a href="https://www.bellco.co.jp/policy/" target="_blank">プライバシーポリシー</a></li>
              <li><a href="https://www.bellco.co.jp/browser/" target="_blank">推奨環境</a></li>
              <li><a href="https://www.bellco.co.jp/sitemap/" target="_blank">サイトマップ</a></li>
          </ul>
          <p class="copyright"><small>Copyright©2019 BELLCO Co, ltd All Rights Reserved.</small></p>
        </div>
      </footer>
      <!-- /footer -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

    <?php wp_footer(); ?>
    <!-- ファーストビュー以外の画像は loading="lazy"付与 -->
    <?php if ( is_singular() ) : ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {

      const imgs = document.querySelectorAll('img');

      imgs.forEach((img) => {

        // ▼ すでにloading指定されている場合は何もしない
        if (img.hasAttribute('loading') && img.getAttribute('loading') !== 'lazy') return;

        // ▼ 画像がファーストビュー内(viewport内)かどうか判定
        const rect = img.getBoundingClientRect();
        const isInView = rect.top < window.innerHeight && rect.bottom > 0;

        if (isInView) {
          // viewport内にある画像 → eager読み込み
          img.removeAttribute('loading');
          img.setAttribute('fetchpriority', 'high'); // LCP改善
          img.setAttribute('decoding', 'async');
        } else {
          // viewport外 → lazy
          img.setAttribute('loading', 'lazy');
        }

      });

    });
    </script>
    <?php endif; ?>
  </body>
</html>
