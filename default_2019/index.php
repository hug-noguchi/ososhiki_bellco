<?php get_header(); ?>
<main>
  <section id="top-article" class="top-article">
    <div class="section-ttl">
      <h2>最新の記事</h2>
      <p>Latest Articles</p>
    </div>
<?php
$posts = get_posts(array(
  'post_type' => array(
    'column', 'ready', 'knowledge', 'manner', 'after'
  ),
  'meta_query' => array(
    array(
      'key' => 'featured_article',
      'compare' => '==',
      'value' => '1'
    )
  ),
  'posts_per_page' => 1
));
foreach( $posts as $post ):
setup_postdata( $post );
?>
    <article class="article">
      <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>);">
      </div>
      <div class="article__info">
        <p><span class="category <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>
"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span></p>
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
    </article>
<?php
endforeach;
wp_reset_postdata(); ?>
  </section>
  <section id="pickup" class="pickup">
    <div class="wrapper">
      <div class="section-ttl">
        <h2>注目の記事</h2>
        <p>Featured Articles</p>
      </div>
      <div class="pickup__container">
<?php
$posts = get_posts(array(
  'post_type' => array(
    'column', 'ready', 'knowledge', 'manner', 'after'
  ),
  'meta_query' => array(
    array(
      'key' => 'featured_article',
      'compare' => '==',
      'value' => '1'
    )
  ),
  'posts_per_page' => 6
));
foreach( $posts as $post ):
setup_postdata( $post );
?>
        <article class="pickup__article">
          <a href="<?php the_permalink(); ?>">
            <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>)"></div>
            <div class="pickup__article--infos">
              <p class="category <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>
"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></p>
              <h3 class="title"><?php the_title(); ?></h3>
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
                <span>もっと読む</span>
              </div>
            </div>
          </a>
        </article>
<?php
endforeach;
wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  <section id="category-article" class="category-article">
    <div class="section-ttl">
      <h2>カテゴリで記事を探す</h2>
      <p>Category Articles</p>
    </div>
    <div class="category-article__left preparation__container">
      <div class="thumbnail preparation"></div>
      <div class="category-article__infos variable-height">
        <h3 class="title">お葬式の準備</h3>
        <ul class="category-article__nav">
<?php
$args = array(
'post_type' => 'ready', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'ready_category', //タクソノミー名
'field' => 'slug',
'terms' => '費用の準備' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
<li><a href="<?php the_permalink(); ?>">費用の準備<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>


<?php
$args = array(
'post_type' => 'ready', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'ready_category', //タクソノミー名
'field' => 'slug',
'terms' => '終活について' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
<li><a href="<?php the_permalink(); ?>">終活について<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>

<?php
$args = array(
'post_type' => 'ready', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'ready_category', //タクソノミー名
'field' => 'slug',
'terms' => 'エンディングノートを作ろう' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
<li class="ending-note"><a href="<?php the_permalink(); ?>"><span>エンディングノートを作ろう</span><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>

<?php
$args = array(
'post_type' => 'ready', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'ready_category', //タクソノミー名
'field' => 'slug',
'terms' => '生前予約' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
<li><a href="<?php the_permalink(); ?>">生前予約<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
    <div class="category-article__right">
      <div class="thumbnail manner"></div>
      <div class="category-article__infos">
        <h3 class="title">お葬式のマナー</h3>
        <ul class="category-article__nav">
<?php
$args = array(
'post_type' => 'manner', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'manner_category', //タクソノミー名
'field' => 'slug',
'terms' => '喪主・施主のマナー' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
<li><a href="<?php the_permalink(); ?>">喪主・施主のマナー<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>

<?php
$args = array(
'post_type' => 'manner', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'manner_category', //タクソノミー名
'field' => 'slug',
'terms' => '参列者のマナー' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
<li><a href="<?php the_permalink(); ?>">参列者のマナー<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>

<?php
$args = array(
'post_type' => 'manner', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'manner_category', //タクソノミー名
'field' => 'slug',
'terms' => 'その他のマナー' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
<li><a href="<?php the_permalink(); ?>">その他のマナー<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
    <div class="category-article__left">
      <div class="thumbnail knowledge"></div>
      <div class="category-article__infos">
        <h3 class="title">お葬式の豆知識</h3>
        <ul class="category-article__nav">
<?php
$args = array(
'post_type' => 'knowledge', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'knowledge_category', //タクソノミー名
'field' => 'slug',
'terms' => 'お葬式の種類' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
<li><a href="<?php the_permalink(); ?>">お葬式の種類<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>

<?php
$args = array(
'post_type' => 'knowledge', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'knowledge_category', //タクソノミー名
'field' => 'slug',
'terms' => 'お葬式用語' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
<li><a href="<?php the_permalink(); ?>">お葬式用語<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>

<?php
$args = array(
'post_type' => 'knowledge', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'knowledge_category', //タクソノミー名
'field' => 'slug',
'terms' => '宗教と宗派' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
<li><a href="<?php the_permalink(); ?>">宗教と宗派<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
    <div class="category-article__right">
      <div class="thumbnail after"></div>
      <div class="category-article__infos">
        <h3 class="title">お葬式のあと</h3>
        <ul class="category-article__nav">
<?php
$args = array(
'post_type' => 'after', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
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
<li><a href="<?php the_permalink(); ?>">法要<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>

<?php
$args = array(
'post_type' => 'after', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
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
<li><a href="<?php the_permalink(); ?>">お墓と仏壇<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>

<?php
$args = array(
'post_type' => 'after', //投稿タイプ名
'posts_per_page' => 1, //出力する記事の数
'tax_query' => array(
array(
'taxonomy' => 'after_category', //タクソノミー名
'field' => 'slug',
'terms' => '遺産と相続' //タームのスラッグ
)
)
);
$domestic_post = get_posts($args);
if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
<li><a href="<?php the_permalink(); ?>">遺産と相続<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></a></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
  </section>
  <div class="hanairo-banner">
    <a href="https://hanairo-kazokusou.jp/" target="_blank">
      <picture>
        <source srcset="<?php echo get_template_directory_uri(); ?>/images/bn_pc.png" media="(min-width: 768px)">
        <img src="<?php echo get_template_directory_uri(); ?>/images/bn_sp.png" alt="家族葬専門式場はないろ">
      </picture>
    </a>
  </div>
</main>

<?php get_footer(); ?>