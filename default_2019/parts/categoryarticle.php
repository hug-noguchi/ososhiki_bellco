<section id="single-category" class="single-category">
        <div class="section-ttl">
            <h2>カテゴリで記事を探す</h2>
            <p>Category Articles</p>
        </div>
        <div class="single-category__container">
            <div class="single-category__block preparation">
                <div class="single-category__block--inner">
                    <h3 class="title">お葬式の準備</h3>
                    <ul>
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
<li><a href="<?php the_permalink(); ?>">費用の準備</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
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
<li><a href="<?php the_permalink(); ?>">終活について</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
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
<li class="ending-note"><a href="<?php the_permalink(); ?>">エンディングノートを作ろう</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
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
<li><a href="<?php the_permalink(); ?>">生前予約</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
            <div class="single-category__block manner">
                <div class="single-category__block--inner">
                    <h3 class="title">お葬式のマナー</h3>
                    <ul>
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
<li><a href="<?php the_permalink(); ?>">喪主・施主のマナー</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
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
<li><a href="<?php the_permalink(); ?>">参列者のマナー</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
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
<li><a href="<?php the_permalink(); ?>">その他のマナー</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
            <div class="single-category__block knowledge">
                <div class="single-category__block--inner">
                    <h3 class="title">お葬式の豆知識</h3>
                    <ul>
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
<li><a href="<?php the_permalink(); ?>">お葬式の種類</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
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
<li><a href="<?php the_permalink(); ?>">お葬式用語</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
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
<li><a href="<?php the_permalink(); ?>">宗教と宗派</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
            <div class="single-category__block after">
                <div class="single-category__block--inner">
                    <h3 class="title">お葬式のあと</h3>
                    <ul>
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
<li><a href="<?php the_permalink(); ?>">法要</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
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
<li><a href="<?php the_permalink(); ?>">お墓と仏壇</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
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
<li><a href="<?php the_permalink(); ?>">遺産と相続</a><img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></li>
<?php endforeach; ?>
<?php endif;
wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>