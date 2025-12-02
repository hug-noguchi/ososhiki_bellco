<?php get_header('under'); ?>
  <main class="article-list">
    <article class="article">
      <div class="kazokusotokushu_list">
        <div class="section-ttl">
          <h1>家族葬特集</h1>
          <p>Kazokusotokushu</p>
        </div>
        <?php
        $wp_query = new WP_Query();
        $my_posts = array(
          'post_type' => 'kazokusotokushu',
          'posts_per_page' => '10',
          'paged'          => $paged,
        );
        $wp_query->query($my_posts);
        if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
          $obj = get_post_type_object($post->post_type);
        ?>
        <div class="kazokusotokushu_item">
          <?php
          $thumb = get_field('main_image');
          $noimage = get_template_directory_uri() . '/images/noimage.png';
          ?>
          <div class="thumbnail" style="background-image: url('<?php echo $thumb ? $thumb : $noimage; ?>');"></div>
          <div class="article__info">
            <h2 class="title"><?php the_title(); ?><span>New!</span></h2>
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
              'before_page_number' => '<span class="modified">',
              'after_page_number'  => '</span>',
            ));
          ?>
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
              <?php
              $thumb = get_field('main_image');
              $noimage = get_template_directory_uri() . '/images/noimage.png';
              ?>
              <div class="thumbnail" style="background-image: url('<?php echo $thumb ? $thumb : $noimage; ?>');"></div>
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
                  <?php
                  $thumb = get_field('main_image');
                  $noimage = get_template_directory_uri() . '/images/noimage.png';
                  ?>
                  <div class="thumbnail" style="background-image: url('<?php echo $thumb ? $thumb : $noimage; ?>');"></div>
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
