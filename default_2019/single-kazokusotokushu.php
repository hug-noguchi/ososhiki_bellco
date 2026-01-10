<?php get_header('under'); ?>
<style>
.post-nav {
  display: flex;
  justify-content: space-between;
  gap: 16px;
  padding: 0 6vw 60px;
}
.post-nav__btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 12px 28px;
  border: 1px solid #96969e;
  font-size: 1.6rem;
  text-decoration: none;
  color: #1e1e1e;
  position: relative;
  transition: 0.2s ease;
  line-height: 1;
  gap: 10px;
}
.post-nav__prev::before {
  content: "\21BD"; /* ↽ */
  font-size: 1.9rem;
  display: inline-block;
  margin-right: 6px;
  line-height: 1;
}
.post-nav__next::after {
  content: "\21C0"; /* ⇀ */
  font-size: 1.9rem;
  display: inline-block;
  margin-left: 6px;
  line-height: 1;
}
.post-nav__btn:hover {
  background-color: #8c5e5e;
  border-color: #8c5e5e;
  color: #fff;
}
</style>
<main class="single-main">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <nav class="breadcrumb">
      <ul>
        <li><a href="<?php echo home_url(); ?>">TOP</a></li>
        <li><a href="<?php echo get_post_type_archive_link('kazokusotokushu'); ?>">家族葬特集</a></li>

        <!-- <?php
        $terms = get_the_terms(get_the_ID(), 'kazokusotokushu_category');
        if ($terms && !is_wp_error($terms)) :
          $term = array_shift($terms); // 最初のカテゴリーのみ表示
        ?>
          <li><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a></li>
        <?php endif; ?> -->

        <li>
          <?php
          $terms = get_the_terms(get_the_ID(), 'kazokusotokushu_category');
          if ($terms && !is_wp_error($terms)) :
            $term = array_shift($terms); // 最初のカテゴリーのみ表示
          ?>
            <?php echo $term->name; ?>
          <?php endif; ?>
          『<?php the_title(); ?>』
        </li>
      </ul>
    </nav>
    <article class="article">
        <div class="article__container">
            <div class="article__info">
                <?php
                $thumb = get_field('main_image');
                $noimage = get_template_directory_uri() . '/images/noimage.png';
                ?>
                <div class="thumbnail">
                  <img src="<?php echo $thumb ? esc_url($thumb) : esc_url($noimage); ?>" alt="<?php the_title(); ?>" class="thumb-img">
                </div>
                <div class="custom-type-name <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>">
                    <p>家族葬<br>特集</p>
                </div>
                <div class="article__info--text">
                  <p class="category <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></p>
                  <p class="day">
                    <span class="pc">記事公開日：<?php the_time('Y.m.d');?>／最終更新日：<?php the_modified_date('Y.m.d') ?></span>
                    <span class="sp">記事公開日：<?php the_time('Y.m.d');?><br>最終更新日：<?php the_modified_date('Y.m.d') ?></span>
                  </p>
                  <h1 class="title"><?php the_title(); ?></h1>
                  <div class="read-time">
                    <?php echo sprintf('読了予測：約%s分', get_time_to_content_read(get_the_content())); ?>
                  </div>
                  <div class="contents">
                    <?php the_content(); ?>
                  </div>
                </div>
            </div>
<div class="article__content">
  <?php
    $content = get_field('contents');
    $content = do_shortcode($content);
    $output = apply_filters('the_content', $content);
    $cta_html = do_shortcode('[btn_cta]');

    if (strpos($output, 'id="toc_container"') !== false) {
        $output = preg_replace(
            '/(<div id="toc_container".*?<\/div>)/s',
            '$1' . $cta_html,
            $output,
            1
        );
    } else {
        $output = preg_replace('/<h2.*?>/i', $cta_html . '$0', $output, 1);
    }

    echo $output;
  ?>
</div>
<?php
$current_id = get_the_ID();

// 対象タクソノミー
$terms = get_the_terms( $current_id, 'kazokusotokushu_category' );
$term_ids = $terms && ! is_wp_error( $terms ) ? wp_list_pluck( $terms, 'term_id' ) : array();

// 記事一覧と同じ「更新日（modified）降順」で取得
$args = array(
  'post_type'      => 'kazokusotokushu',
  'posts_per_page' => -1,
  'orderby'        => 'modified', // ←ここ重要
  'order'          => 'DESC',     // ←更新日が新しい順に並べる
);

if ( $term_ids ) {
  $args['tax_query'] = array(
    array(
      'taxonomy' => 'kazokusotokushu_category',
      'field'    => 'term_id',
      'terms'    => $term_ids,
    ),
  );
}

$all_posts = get_posts( $args );
$ids       = wp_list_pluck( $all_posts, 'ID' );
$index     = array_search( $current_id, $ids, true);

// Prev = 古い方（リストの次）
$prev_id = ( $index !== false && isset( $ids[ $index + 1 ] ) ) ? $ids[ $index + 1 ] : null;

// Next = 新しい方（リストの前）
$next_id = ( $index !== false && $index > 0 && isset( $ids[ $index - 1 ] ) ) ? $ids[ $index - 1 ] : null;
?>

<nav class="post-nav">
  <?php if ( $prev_id ) : ?>
    <a class="post-nav__btn post-nav__prev" href="<?php echo get_permalink( $prev_id ); ?>">
      Prev
    </a>
  <?php endif; ?>

  <?php if ( $next_id ) : ?>
    <a class="post-nav__btn post-nav__next" href="<?php echo get_permalink( $next_id ); ?>">
      Next
    </a>
  <?php endif; ?>
</nav>

        </div>
        <?php get_template_part('parts/sidelist_kazokusotokushu'); ?>
    </article>
    <?php endwhile; endif; ?>
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
                <div class="thumbnail">
                  <img src="<?php echo $thumb ? esc_url($thumb) : esc_url($noimage); ?>" alt="<?php the_title(); ?>" class="thumb-img">
                </div>
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
            'post_type' => 'kazokusotokushu',
            'posts_per_page' => -1,
            'tax_query' => array(
            array(
            'taxonomy' => 'kazokusotokushu_category',
            'field' => 'slug',
            'terms' => '家族葬について'
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
            'post_type' => 'kazokusotokushu',
            'posts_per_page' => -1,
            'tax_query' => array(
            array(
            'taxonomy' => 'kazokusotokushu_category',
            'field' => 'slug',
            'terms' => '家族葬費用'
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
