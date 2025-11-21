<!doctype html>
<html lang="ja" class="no-js">
  <?php get_template_part('parts/head'); ?>
  <body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NK2GJXM"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
    <div class="header__container">
      <header id="header" class="header clear">
        <div class="header__logo">
          <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/svg/bell_logo02.svg" alt="ベルコロゴ" width="78" height="24">
          </a>
        </div>
        <p class="header__catch">さいごの別れについて<br>かんがえよう</p>
        <nav class="header__nav">
          <div class="header__nav--close">
            <img src="<?php echo get_template_directory_uri(); ?>/images/svg/clear.svg" alt="" width="18" height="18">
          </div>
          <ul>
            <li>
              <?php
              $args = array(
              'post_type' => 'kazokusotokushu',
              'posts_per_page' => 1,
              );
              $domestic_post = get_posts($args);
              if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
                <a href="/kazokusotokushu/">家族葬特集</a>
              <?php endforeach;
              endif;
              wp_reset_postdata(); ?>

              <ul class="header__nav--child">
                <?php
                $args = array(
                'post_type' => 'kazokusotokushu',
                'posts_per_page' => 1,
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
                  <a href="<?php the_permalink(); ?>">家族葬について</a>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
                </li>
                <?php endforeach;
                endif;
                wp_reset_postdata(); ?>

                <?php
                $args = array(
                'post_type' => 'kazokusotokushu',
                'posts_per_page' => 1,
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
                  <a href="<?php the_permalink(); ?>">家族葬費用</a>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
                </li>
                <?php endforeach;
                endif;
                wp_reset_postdata(); ?>
              </ul>
            </li>
            <li>
              <?php
              $args = array(
              'post_type' => 'ready', //投稿タイプ名
              'posts_per_page' => 1, //出力する記事の数
              );
              $domestic_post = get_posts($args);
              if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
                <a href="<?php the_permalink(); ?>">お葬式の準備</a>
              <?php endforeach;
              endif;
              wp_reset_postdata(); ?>

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
                <li>
                  <a href="<?php the_permalink(); ?>">費用の準備</a>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
                </li>
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
                <li>
                  <a href="<?php the_permalink(); ?>">終活について</a>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
                </li>
                <?php endforeach;
                endif;
                wp_reset_postdata(); ?>
              </ul>
            </li>
            <li>
              <?php
              $args = array(
              'post_type' => 'manner', //投稿タイプ名
              'posts_per_page' => 1, //出力する記事の数
              );
              $domestic_post = get_posts($args);
              if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
              <a href="<?php the_permalink(); ?>">お葬式のマナー</a>
              <?php endforeach;
              endif;
              wp_reset_postdata(); ?>
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
                <li>
                  <a href="<?php the_permalink(); ?>">喪主・施主のマナー</a>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
                </li>
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
                <li>
                  <a href="<?php the_permalink(); ?>">参列者のマナー</a>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
                </li>
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
                <li>
                  <a href="<?php the_permalink(); ?>">その他のマナー</a>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
                </li>
                <?php endforeach;
                endif;
                wp_reset_postdata(); ?>
              </ul>
            </li>
            <li>
              <?php
              $args = array(
              'post_type' => 'knowledge', //投稿タイプ名
              'posts_per_page' => 1, //出力する記事の数
              );
              $domestic_post = get_posts($args);
              if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
              <a href="<?php the_permalink(); ?>">お葬式の豆知識</a>
              <?php endforeach;
              endif;
              wp_reset_postdata(); ?>
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
              <li>
                <a href="<?php the_permalink(); ?>">お葬式の種類</a>
                <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
              </li>
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
                <li>
                  <a href="<?php the_permalink(); ?>">お葬式用語</a>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
                </li>
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
                <li>
                  <a href="<?php the_permalink(); ?>">宗教と宗派</a>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
                </li>
                <?php endforeach;
                endif;
                wp_reset_postdata(); ?>
              </ul>
            </li>
            <li>
              <?php
              $args = array(
              'post_type' => 'after', //投稿タイプ名
              'posts_per_page' => 1, //出力する記事の数
              );
              $domestic_post = get_posts($args);
              if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post ); ?>
              <a href="<?php the_permalink(); ?>">お葬式のあと</a>
              <?php endforeach;
              endif;
              wp_reset_postdata(); ?>
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
                <li>
                  <a href="<?php the_permalink(); ?>">法要</a>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
                </li>
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
                <li>
                  <a href="<?php the_permalink(); ?>">お墓と仏壇</a>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
                </li>
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
                <li>
                  <a href="<?php the_permalink(); ?>">遺産と相続</a>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7">
                </li>
                <?php endforeach;
                endif;
                wp_reset_postdata(); ?>
                </ul>
              </li>
            </ul>
          </nav>
          <div class="header__sns">
            <?php get_template_part('parts/sns'); ?>
          </div>
      </header>
      <div class="mv">
        <div class="mv__humberger">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <p class="mv__catch">さいごの別れについてかんがえよう</p>
        <div class="mv__search">
          <img src="<?php echo get_template_directory_uri(); ?>/images/svg/search_wh.svg" width="18" height="18" alt="">
        </div>
        <?php get_template_part('parts/searchform'); ?>
        <figure>
          <img src="<?php echo get_template_directory_uri(); ?>/images/svg/title02.svg" alt="お葬式なるほどチャンネル" width="161" height="142">
        </figure>
        <p class="mv__logo"><img src="<?php echo get_template_directory_uri(); ?>/images/svg/bell_logo02_wh.svg" alt="ベルコロゴ" width="48" height="15"></p>
      </div>
    </div>
