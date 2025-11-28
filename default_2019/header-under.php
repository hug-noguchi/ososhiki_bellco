<!doctype html>
<html lang="ja" class="no-js">
  <?php get_template_part('parts/head'); ?>
  <body <?php body_class(); ?>>
    <div class="header__under">
      <header id="header" class="header clear">
          <h1 class="header__logo">
            <a href="<?php echo home_url(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/svg/bell_logo02.svg" alt="ベルコロゴ" width="78" height="24">
              お葬式なるほどチャンネル
            </a>
          </h1>
          <nav class="header__nav">
            <div class="header__nav--close">
              <img src="<?php echo get_template_directory_uri(); ?>/images/svg/clear.svg" alt="" width="18" height="18">
            </div>
            <ul>
                <li>
                  <span>お葬式の準備</span>
                  <ul class="header__nav--child">
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
<?php endforeach;
endif;
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
<?php endforeach;
endif;
wp_reset_postdata(); ?>
                  </ul>
                </li>
                <li>
                  <span>お葬式のマナー</span>
                  <ul class="header__nav--child">
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
<?php endforeach;
endif;
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
<?php endforeach;
endif;
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
<?php endforeach;
endif;
wp_reset_postdata(); ?>
                  </ul>
                </li>
                <li>
                  <span>お葬式の豆知識</span>
                  <ul class="header__nav--child">
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
<?php endforeach;
endif;
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
<?php endforeach;
endif;
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
<?php endforeach;
endif;
wp_reset_postdata(); ?>
                  </ul>
                </li>
                <li>
                  <span>お葬式のあと</span>
                  <ul class="header__nav--child">
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
<?php endforeach;
endif;
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
<?php endforeach;
endif;
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
<?php endforeach;
endif;
wp_reset_postdata(); ?>
                  </ul>
                </li>
            </ul>
          </nav>
          <div class="mv__humberger">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <?php get_template_part('parts/searchform'); ?>
        <div class="mv__search">
          <img src="<?php echo get_template_directory_uri(); ?>/images/svg/search.svg" width="18" height="18" alt="">
        </div>
      </header>
    </div>
