<?php get_header('under'); ?>
  <style>
    .article-list .section-ttl {
      padding-bottom: 55px;
    }
    .article-list .section-ttl > h2 {
      color: #8c5e5e;
    }
    .article-list .kazokusotokushu_list {
      padding: 50px;
    }
    @media screen and (max-width: 768px) {
      .article-list .kazokusotokushu_list {
        padding: 20px 0;
      }
      .article-list .section-ttl {
        padding: 35px;
      }
    }
    .article-list .sidebar {
      width: 380px;
      -ms-flex-negative: 0;
      flex-shrink: 0;
      background-color: #f8f8fb;
      padding: 60px 3vw;
    }

    @media screen and (max-width: 1200px) {
      .article-list .sidebar {
        width: 30vw;
      }
    }

    @media screen and (max-width: 992px) {
      .article-list .sidebar {
        display: none;
      }
    }

    .article-list .sidebar .manner {
      color: #5a477b;
    }

    .article-list .sidebar .knowledge {
      color: #2f4d26;
    }

    .article-list .sidebar .after {
      color: #5b4428;
    }

    .article-list .sidebar .ready {
      color: #3f445e;
    }

    .article-list .sidebar .column {
      color: #1e1e1e;
    }

    .article-list .sidebar .title {
      font-size: 2.1rem;
      font-weight: 600;
      margin-bottom: 25px;
      margin-top: 0;
    }

    .article-list .sidebar__nav {
      padding: 0;
    }

    .article-list .sidebar__nav > li {
      list-style-type: none;
      position: relative;
    }

    .article-list .sidebar__nav > li > span {
      font-size: 1.6rem;
      font-family: "游ゴシック体", YuGothic, "游ゴシック Medium", "Yu Gothic Medium", "游ゴシック", "Yu Gothic", sans-serif;
      font-weight: bold;
      color: #96969e;
      display: block;
      margin-bottom: 25px;
      cursor: pointer;
    }

    .article-list .sidebar__nav > li > span::before {
      content: "";
      display: block;
      width: 24px;
      height: 24px;
      border-radius: 50%;
      background-color: #96969e;
      position: absolute;
      top: 0;
      right: 0;
    }

    .article-list .sidebar__nav > li > span::after {
      content: "";
      display: block;
      width: 6px;
      height: 6px;
      border-right: 2px #fff solid;
      border-top: 2px #fff solid;
      -webkit-transform: rotate(135deg);
      -ms-transform: rotate(135deg);
      transform: rotate(135deg);
      position: absolute;
      top: 6px;
      right: 8px;
      -webkit-transition: all 0.25s ease-out;
      -o-transition: all 0.25s ease-out;
      transition: all 0.25s ease-out;
    }

    @media screen and (max-width: 768px) {
      .article-list .sp-sidelist .sidebar__nav > li > span::before {
        right: 30vw;
      }
    }

    @media screen and (max-width: 480px) {
      .article-list .sp-sidelist .sidebar__nav > li > span::before {
        right: 19vw;
      }
    }

    @media screen and (max-width: 480px) {
      .article-list .sp-sidelist .sidebar__nav > li > span::after {
        right: calc(19vw + 8px);
      }
    }

    .article-list .sidebar__nav > li > .open::after {
      -webkit-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
      transform: rotate(-45deg);
      top: 9px;
    }

    .article-list .sidebar__navchild {
      padding: 0;
      display: none;
    }

    .article-list .sidebar__navchild > li {
      list-style-type: none;
      margin-bottom: 9px;
      padding-bottom: 9px;
      border-bottom: 1px solid #dcdcdc;
    }

    .article-list .sidebar__navchild > li:nth-child(n + 2) > a .info .info__new {
      display: none;
    }

    .article-list .sidebar__navchild > li > a {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: justify;
      -ms-flex-pack: justify;
      justify-content: space-between;
      text-decoration: none;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      position: relative;
    }

    .article-list .sidebar__navchild > li > a .thumbnail {
      width: 30%;
      height: 50px;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .article-list .sidebar__navchild > li > a .info {
      width: 65%;
    }

    .article-list .sidebar__navchild > li > a .info__new {
      font-weight: 600;
      color: #c30404;
      font-size: 1.4rem;
      position: absolute;
      top: -20px;
      left: 35%;
    }

    .article-list .sidebar__navchild > li > a .info__title {
      font-size: 1.6rem;
      font-weight: 400;
      font-family: "游ゴシック体", YuGothic, "游ゴシック Medium", "Yu Gothic Medium", "游ゴシック", "Yu Gothic", sans-serif;
      color: #1e1e1e;
      margin: 0;
      line-height: 1;
    }

    .article-list .article {
      width: calc(100vw - 130px);
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: justify;
      -ms-flex-pack: justify;
      justify-content: space-between;
      margin-left: 130px;
    }

    @media screen and (max-width: 992px) {
      .article-list .article {
        margin-left: 0;
        width: 100vw;
      }
    }

    .article-list .article__container {
      width: 100%;
    }

    .article-list .article__content {
      padding: 60px 6vw;
      font-family: "游ゴシック体", YuGothic, "游ゴシック Medium", "Yu Gothic Medium", "游ゴシック", "Yu Gothic", sans-serif;
    }

    @media screen and (max-width: 992px) {
      .article-list .article__content {
        padding: 40px 20px;
      }
    }

    .article-list .article__content table {
      border-color: #969696;
      border-collapse: collapse;
      border-spacing: 0;
    }

    .article-list .article__content table th,
    .article-list .article__content table td {
      padding: 2px;
    }

    .article-list .article__content img {
      height: auto;
    }

    .article-list .article__content p,
    .article-list .article__content strong {
      font-family: "游ゴシック体", YuGothic, "游ゴシック Medium", "Yu Gothic Medium", "游ゴシック", "Yu Gothic", sans-serif;
    }

    .article-list .article__content h5 {
      font-size: 2.8rem;
      font-family: "Yu Mincho", "YuMincho", serif;
      font-weight: 400;
    }

    .article-list .article__content h5 strong {
      font-family: "Yu Mincho", "YuMincho", serif;
      font-weight: 400;
    }

    .article-list .article__content h2 {
      padding-left: 15px;
      border-left: 4px solid #4a90e2;
      line-height: 1.6;
      margin: 30px 0 20px;
    }

    .article-list .article__content h3 {
      padding-left: 15px;
      border-left: 4px solid #cccccc;
      line-height: 1.6;
      margin: 25px 0 15px;
    }

    .article-list .article__info .thumbnail {
      width: 45%;
      height: 335px;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    @media screen and (max-width: 1200px) {
      .article-list .article__info .thumbnail {
        -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
        order: 1;
        width: 100%;
      }
    }

    @media screen and (max-width: 480px) {
      .article-list .article__info .thumbnail {
        height: 50vw;
      }
    }

    .article-list .article__info--text {
      width: 55%;
      font-family: "游ゴシック体", YuGothic, "游ゴシック Medium", "Yu Gothic Medium", "游ゴシック", "Yu Gothic", sans-serif;
      font-size: 1.8rem;
    }

    @media screen and (max-width: 1200px) {
      .article-list .article__info--text {
        -webkit-box-ordinal-group: 1;
        -ms-flex-order: 0;
        order: 0;
        width: 100%;
      }
    }

    .article-list .article__info--text .contents {
      padding: 0 20px;
    }

    .article-list .article__info--text .contents p {
      font-family: "游ゴシック体", YuGothic, "游ゴシック Medium", "Yu Gothic Medium", "游ゴシック", "Yu Gothic", sans-serif;
      font-size: 1.6rem;
    }

    .article-list .kazokusotokushu_item {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      margin-bottom: 50px;
    }

    .article-list .kazokusotokushu_item .article__info .title {
      font-size: 2.2rem;
      font-weight: 400;
      color: #1e1e1e;
      margin-top: 17px;
      margin-bottom: 28px;
    }

    .article-list .kazokusotokushu_item .article__info .title span {
      font-weight: 600;
      color: #c30404;
      font-size: 1.7rem;
      margin-left: 20px;
    }

    .article-list .kazokusotokushu_item .article__info .excerpt {
      word-wrap: break-word;
      font-family: "游ゴシック体", YuGothic, "游ゴシック Medium", "Yu Gothic Medium", "游ゴシック", "Yu Gothic", sans-serif;
      font-size: 1.6rem;
      color: #1e1e1e;
    }

    .article-list .kazokusotokushu_item .article__info .read-more {
      position: absolute;
      bottom: -26px;
      right: 0;
    }

    .article-list .kazokusotokushu_item .article__info .read-more::before {
      content: "";
      display: block;
      width: 40vw;
      height: 1px;
      background-color: #dcdcdc;
      position: absolute;
      left: calc(72px - 40vw);
      top: 28px;
      -webkit-transition: all 0.25s ease-out;
      -o-transition: all 0.25s ease-out;
      transition: all 0.25s ease-out;
    }

    .article-list .kazokusotokushu_item .article__info .read-more > a {
      display: block;
      color: #1e1e1e;
      font-size: 1.4rem;
      border: 1px solid #96969e;
      padding: 16px 84px;
      text-decoration: none;
    }

    .article-list .kazokusotokushu_item .article__info .read-more::after {
        content: "";
        display: block;
        width: 20px;
        height: 1px;
        background-color: #dcdcdc;
        -webkit-transform: rotate(-150deg);
        -ms-transform: rotate(-150deg);
        transform: rotate(-150deg);
        position: absolute;
        top: 23px;
        left: 54px;
        opacity: 0;
        -webkit-transition: all 0.25s ease-out;
        -o-transition: all 0.25s ease-out;
        transition: all 0.25s ease-out;
    }

    @media screen and (max-width: 1200px) {
      .article-list .kazokusotokushu_item .article__info .read-more {
        right: 8vw;
      }
    }

    @media screen and (max-width: 768px) {
      .article-list .kazokusotokushu_item {
        margin-bottom: 145px;
        flex-wrap: wrap;
      }
      .article-list .kazokusotokushu_item .article__info .title {
        margin-top: 0;
      }
      .article-list .kazokusotokushu_item .article__info .read-more {
        bottom: -235px;
        right: 10%;
      }
      .article-list .kazokusotokushu_item .article__info .read-more::before {
        width: 70vw;
        left: calc(72px - 70vw);
      }
    }

    .article-list .article__info .custom-type-name.manner {
      background-color: #5a477b;
    }

    .article-list .article__info .custom-type-name.knowledge {
      background-color: #2f4d26;
    }

    .article-list .article__info .custom-type-name.after {
      background-color: #5b4428;
    }

    .article-list .article__info .custom-type-name.after p {
      font-size: 1.4rem;
    }

    .article-list .article__info .custom-type-name.ready {
      background-color: #3f445e;
    }

    .article-list .article__info .custom-type-name.column {
      background-color: #1e1e1e;
    }

    .article-list .article__info .custom-type-name.kazokusotokushu {
      background-color: #8c5e5e;
    }

    .article-list .article__info .category.manner {
      color: #5a477b;
    }

    .article-list .article__info .category.knowledge {
      color: #2f4d26;
    }

    .article-list .article__info .category.after {
      color: #5b4428;
    }

    .article-list .article__info .category.ready {
      color: #3f445e;
    }

    .article-list .article__info .category.column {
      color: #1e1e1e;
    }

    .article-list .article__info .category.kazokusotokushu {
      color: #8c5e5e;
    }

    .article-list .article__info .custom-type-name {
      width: 138px;
      height: 138px;
      border-radius: 50%;
      padding: 43px 31px;
      position: absolute;
      top: 0;
      left: calc(45% - 69px);
      text-align: center;
    }

    @media screen and (max-width: 1200px) {
      .article-list .article__info .custom-type-name {
        width: 100px;
        height: 100px;
        padding: 27px 10px;
        left: 20px;
      }
    }

    @media screen and (max-width: 992px) {
      .article-list .article__info .custom-type-name {
        top: 18px;
      }
    }

    .article-list .article__info .custom-type-name p {
      color: #fff;
      margin: 0;
      font-size: 1.6rem;
    }

    /* リスト */
    .article-list .article .thumbnail {
      height: 295px;
      width: 50%;
      -ms-flex-negative: 0;
      flex-shrink: 0;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      z-index: 2;
    }
    .article-list .article__info {
      -ms-flex-negative: 0;
      flex-shrink: 0;
      width: 50%;
      height: 270px;
      padding: 0 0 55px 35px;
      position: relative;
      -ms-flex-item-align: start;
      align-self: flex-start;
    }

    @media screen and (max-width: 1200px) {
      .article-list .article__info {
        padding: 35px 8vw 55px 4vw;
      }
    }

    @media screen and (max-width: 768px) {
      .article-list .kazokusotokushu_item {
        flex-wrap: wrap;
      }
      .article-list .article .thumbnail {
        width: 100%;
        height: 130px;
        -webkit-box-ordinal-group: 2;
        order: 1;
      }
      .article-list .article__info {
        width: 100%;
        -webkit-box-ordinal-group: 1;
        -ms-flex-order: 0;
        order: 0;
        padding: 20px 20px 25px;
        height: auto;
      }
    }
    /* ページネーション */
    /* .pagination {
      text-align: center;
      margin: 40px 0;
    }

    .pagination a,
    .pagination span {
      color: #1e1e1e;
      display: inline-block;
      padding: 8px 12px;
      margin: 0 4px;
      border: 1px solid #96969e;
      text-decoration: none;
    }

    .pagination .current {
      background: #333;
      color: #fff;
      border-color: #333;
    } */
  </style>

  <main class="article-list">

    <article class="article">
      <div class="kazokusotokushu_list">
        <div class="section-ttl">
          <h2>家族葬特集</h2>
          <p>Kazokusotokushu</p>
        </div>
        <?php
        $wp_query = new WP_Query();
        $my_posts = array(
          'post_type' => 'kazokusotokushu',// 投稿タイプを設定
          'posts_per_page' => '10',// 表示する記事数を設定
          'paged'          => $paged,
        );

        $wp_query->query($my_posts);
        if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
          $obj = get_post_type_object($post->post_type); //投稿タイプ情報を取得
        ?>
        <div class="kazokusotokushu_item">
          <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>);"></div>
            <div class="article__info">
              <h3 class="title"><?php the_title(); ?><span>New!</span></h3>
              <p class="excerpt">
                <?php
                if(mb_strlen(get_field('contents'))>100){
                $text= mb_substr(strip_tags(get_field('contents')), 0, 60);
                echo $text.'…';
                }else{
                echo strip_tags(get_field('contents'));
                }?>
              </p>
              <div class="read-more">
                <a href="<?php the_permalink(); ?>">もっと読む</a>
              </div>
            </div>
          </div>
          <?php endwhile;
          endif;
          wp_reset_postdata();
          ?>
        <!-- ▼ ページネーション -->
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total'     => $wp_query->max_num_pages,
                'current'   => $paged,
                'mid_size'  => 1,
                'prev_text' => '« 前へ',
                'next_text' => '次へ »',
                'type'      => 'plain',
                // 修正箇所：出力の前後にラップして色付け用クラス
                'before_page_number' => '<span class="modified">',
                'after_page_number'  => '</span>',
            ));
            ?>
        </div>
        </div>
      </div>
      <?php get_template_part('parts/sidelist_kazokusotokushu'); ?>
    </article>

    <section id="related-post" class="related-post">
      <div class="section-ttl">
        <h2>関連する記事</h2>
        <p>Related Articles</p>
      </div>
      <div class="related-post__container">
        <div class="wrapper">
          <div class="related-post__article-container">
    <?php
      $taxonomy_slug  = 'custom_tag';
      $post_type_slug = array('manner','knowledge','after','ready','kazokusotokushu');

      $current_id  = get_the_ID();
      $current_pt  = get_post_type($current_id);

      // custom_tagが紐づく投稿タイプだけを抽出（kazokusotokushuは除外される想定）
      $pt_supporting_tax = array_values(array_filter($post_type_slug, function($pt) use ($taxonomy_slug){
        return is_object_in_taxonomy($pt, $taxonomy_slug);
      }));

      // 現在の投稿タイプがcustom_tagに対応しているか
      $current_supports_tax = is_object_in_taxonomy($current_pt, $taxonomy_slug);

      // 現在投稿のタームslug（対応している時のみ取得）
      $terms_slug = array();
      if ($current_supports_tax) {
        $terms_slug = wp_list_pluck(
          wp_get_object_terms($current_id, $taxonomy_slug, array('fields'=>'all')),
          'slug'
        );
      }

      // 基本引数（管理者テスト用にdraft含む。公開時はpublishのみに戻す）
      $args = array(
        'posts_per_page'       => 4,
        'orderby'              => 'rand',
        'post__not_in'         => array($current_id),
        'post_status'          => array('publish','draft'), // ←テスト用。公開時は 'publish' のみに。
        'no_found_rows'        => true,
        'ignore_sticky_posts'  => true,
      );

      if ( !empty($terms_slug) && !empty($pt_supporting_tax) ) {
        // タームが取得できた→タームで関連記事取得（custom_tag対応PTのみ対象）
        $args['post_type'] = $pt_supporting_tax;
        $args['tax_query'] = array(
          array(
            'taxonomy' => $taxonomy_slug,
            'field'    => 'slug',
            'terms'    => $terms_slug,
            'operator' => 'IN',
          ),
        );
      } else {
        // フォールバック：同一投稿タイプからランダムに取得（ターム条件ナシ）
        // もし同一PTの記事が極端に少ないなら、全PTから取得したい場合は下の行を $post_type_slug に変更
        $args['post_type'] = $current_pt; // or $post_type_slug
      }

      $the_query = new WP_Query($args);

      if ($the_query->have_posts()):
        while ($the_query->have_posts()): $the_query->the_post(); ?>
          <article>
            <a href="<?php the_permalink(); ?>">
              <div class="flex">
                <div class="thumbnail" style="background-image: url(<?php echo esc_url(get_field('main_image')); ?>)"></div>
                <div class="info">
                  <?php $pto = get_post_type_object(get_post_type()); ?>
                  <p class="post-type-name <?php echo esc_attr($pto->name); ?>">
                    <?php echo esc_html($pto->label); ?>
                  </p>
                  <h3 class="title"><?php the_title(); ?></h3>
                </div>
              </div>
              <div class="read-more"><span>もっと読む</span></div>
            </a>
          </article>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="no-article">関連記事はありません。</p>
      <?php endif; wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </section>

    <section id="sp-sidelist" class="sp-sidelist">
      <p class="title <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></p>
      <ul class="sidebar__nav">
        <li>
          <span>家族葬について</span>
          <ul class="sidebar__navchild">
            <?php
            $args = array(
            'post_type' => 'kazokusotokushu', //投稿タイプ名
            'posts_per_page' => -1, //出力する記事の数
            'tax_query' => array(
            array(
            'taxonomy' => 'kazokusotokushu_category', //タクソノミー名
            'field' => 'slug',
            'terms' => '家族葬について' //タームのスラッグ
            )
            )
            );
            $domestic_post = get_posts($args);
            if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>

              <li>
                <a href="<?php the_permalink(); ?>">
                  <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>);"></div>
                  <div class="info">
                    <span class="info__new">New!</span>
                    <p class="info__title"><?php the_title(); ?></p>
                  </div>
                </a>
              </li>

            <?php endforeach; ?>
            <?php else : ?>
            <li>表示する記事がありません。</li>
            <?php endif;
            wp_reset_postdata(); ?>
          </ul>
        </li>
        <li>
          <span>家族葬費用</span>
          <ul class="sidebar__navchild">
            <?php
            $args = array(
            'post_type' => 'kazokusotokushu', //投稿タイプ名
            'posts_per_page' => -1, //出力する記事の数
            'tax_query' => array(
            array(
            'taxonomy' => 'kazokusotokushu_category', //タクソノミー名
            'field' => 'slug',
            'terms' => '家族葬費用' //タームのスラッグ
            )
            )
            );
            $domestic_post = get_posts($args);
            if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>

              <li>
                <a href="<?php the_permalink(); ?>">
                  <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>);"></div>
                  <div class="info">
                    <span class="info__new">New!</span>
                    <p class="info__title"><?php the_title(); ?></p>
                  </div>
                </a>
              </li>

            <?php endforeach; ?>
            <?php else : ?>
            <li>表示する記事がありません。</li>
            <?php endif;
            wp_reset_postdata(); ?>
          </ul>
        </li>
      </ul>
    </section>
    <?php get_template_part('parts/categoryarticle'); ?>
  </main>
<?php get_footer(); ?>
