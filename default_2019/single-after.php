<?php get_header('under'); ?>
<main class="single-main">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <nav class="breadcrumb">
      <ul>
        <li><a href="<?php echo home_url(); ?>">TOP</a></li>
        <li>『<?php the_title(); ?>』</li>
      </ul>
    </nav>
    <article class="article">
        <div class="article__container">
            <div class="article__info">
                <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>);"></div>
                <div class="custom-type-name <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>">
                    <p><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></p>
                </div>
                <div class="article__info--text">
                    <p class="category <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></p>
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
                echo apply_filters('the_content', $content);
              ?>
            </div>
        </div>
        <?php get_template_part('parts/sidelist_after'); ?>
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
<?php // 現在表示されている投稿と同じタームに分類された投稿を取得
  $taxonomy_slug = 'custom_tag'; // タクソノミーのスラッグを指定
  $post_type_slug = array(
    'manner',
    'knowledge',
    'after',
    'ready'
  ); // 投稿タイプのスラッグを指定
  $post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タクソノミーの指定
  if( $post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
    $terms_slug = array(); // 配列のセット
    foreach( $post_terms as $value ){ // 配列の作成
      $terms_slug[] = $value->slug; // タームのスラッグを配列に追加
    }
  }
  $args = array(
    'post_type' => $post_type_slug, // 投稿タイプを指定
    'posts_per_page' => 4, // 表示件数を指定
    'orderby' =>  'rand', // ランダムに投稿を取得
    'post__not_in' => array($post->ID), // 現在の投稿を除外
    'tax_query' => array( // タクソノミーパラメーターを使用
      array(
        'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
        'field' => 'slug', // スラッグに一致するタームを返す
        'terms' => $terms_slug // タームの配列を指定
      )
    )
  );
  $the_query = new WP_Query($args); if($the_query->have_posts()):
?>
<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                    <article>
                        <a href="<?php the_permalink(); ?>">
                            <div class="flex">
                                <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>)"></div>
                                <div class="info">
                                    <p class="post-type-name <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></p>
                                    <h3 class="title"><?php the_title(); ?></h3>
                                </div>
                            </div>
                            <div class="read-more">
                                <span>もっと読む</span>
                            </div>
                        </a>
                    </article>
<?php endwhile; ?>
<?php else: ?>
<p class="no-article">関連記事はありません。</p>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section id="sp-sidelist" class="sp-sidelist">
        <p class="title <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></p>
        <ul class="sidebar__nav">
      <li>
        <span>お墓と仏壇</span>
        <ul class="sidebar__navchild">
<?php
$args = array(
'post_type' => 'after', //投稿タイプ名
'posts_per_page' => 10, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'after_category', //タクソノミー名
'field' => 'slug',
'terms' => 'お墓と仏壇' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
          <li><a href="<?php the_permalink();?>">
            <div class="info">
              <p class="info__title"><?php the_title(); ?><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></p>
            </div>
          </a></li>
<?php endforeach; ?>
<?php else : ?>
<li>表示する記事がありません。</li>
<?php endif;
wp_reset_postdata(); ?>
        </ul>
      </li>
      <li>
        <span>法要</span>
        <ul class="sidebar__navchild">
<?php
$args = array(
'post_type' => 'after', //投稿タイプ名
'posts_per_page' => 10, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'after_category', //タクソノミー名
'field' => 'slug',
'terms' => '法要' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
          <li><a href="<?php the_permalink();?>">
            <div class="info">
              <p class="info__title"><?php the_title(); ?><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></p>
            </div>
          </a></li>
<?php endforeach; ?>
<?php else : ?>
<li>表示する記事がありません。</li>
<?php endif;
wp_reset_postdata(); ?>
        </ul>
      </li>
      <li>
        <span>遺品と取扱い</span>
        <ul class="sidebar__navchild">
<?php
$args = array(
'post_type' => 'after', //投稿タイプ名
'posts_per_page' => 10, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'after_category', //タクソノミー名
'field' => 'slug',
'terms' => '遺品と取扱い' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
          <li><a href="<?php the_permalink();?>">
            <div class="info">
              <p class="info__title"><?php the_title(); ?><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></p>
            </div>
          </a></li>
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
