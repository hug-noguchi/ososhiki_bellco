<?php get_header('under'); ?>
<main class="single-main">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <article class="article">
        <div class="article__container">
            <div class="article__info">
                <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>);"></div>
                <div class="custom-type-name <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>">
                    <p>家族葬<br>特集</p>
                </div>
                <div class="article__info--text">
                    <p class="category <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></p>
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div class="contents">
                      <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="article__content">
                <?php the_field('contents'); ?>
            </div>
        </div>
        <?php get_template_part('parts/sidelist_knowledge'); ?>
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
        <span>お葬式の種類</span>
        <ul class="sidebar__navchild">
<?php
$args = array(
'post_type' => 'kazokusotokushu', //投稿タイプ名
'posts_per_page' => 10, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'kazokusotokushu_category', //タクソノミー名
'field' => 'slug',
'terms' => 'お葬式の種類' //タームのスラッグ
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
        <span>お葬式用語</span>
        <ul class="sidebar__navchild">
<?php
$args = array(
'post_type' => 'kazokusotokushu', //投稿タイプ名
'posts_per_page' => 10, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'kazokusotokushu_category', //タクソノミー名
'field' => 'slug',
'terms' => 'お葬式用語' //タームのスラッグ
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
        <span>宗教と宗派</span>
        <ul class="sidebar__navchild">
<?php
$args = array(
'post_type' => 'kazokusotokushu', //投稿タイプ名
'posts_per_page' => 10, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'kazokusotokushu_category', //タクソノミー名
'field' => 'slug',
'terms' => '宗教と宗派' //タームのスラッグ
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
