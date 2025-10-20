<aside class="sidebar">
  <p class="title <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></p>
  <ul class="sidebar__nav">
      <li>
        <span class="open">終活について</span>
        <ul class="sidebar__navchild" style="display: block;">
<?php
$args = array(
'post_type' => 'ready', //投稿タイプ名
'posts_per_page' => -1, //出力する記事の数
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

          <li><a href="<?php the_permalink(); ?>">
            <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>);"></div>
            <div class="info">
              <span class="info__new">New!</span>
              <p class="info__title"><?php the_title(); ?></p>
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
        <span>費用の準備</span>
        <ul class="sidebar__navchild">
<?php
$args = array(
'post_type' => 'ready', //投稿タイプ名
'posts_per_page' => -1, //出力する記事の数
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

          <li><a href="<?php the_permalink(); ?>">
            <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>);"></div>
            <div class="info">
              <span class="info__new">New!</span>
              <p class="info__title"><?php the_title(); ?></p>
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
        <span>エンディングノートを作ろう</span>
        <ul class="sidebar__navchild">
<?php
$args = array(
'post_type' => 'ready', //投稿タイプ名
'posts_per_page' => -1, //出力する記事の数
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

          <li><a href="<?php the_permalink(); ?>">
            <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>);"></div>
            <div class="info">
              <span class="info__new">New!</span>
              <p class="info__title"><?php the_title(); ?></p>
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
        <span>生前予約</span>
        <ul class="sidebar__navchild">
<?php
$args = array(
'post_type' => 'ready', //投稿タイプ名
'posts_per_page' => 10, //出力する記事の数
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

          <li><a href="<?php the_permalink(); ?>">
            <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>);"></div>
            <div class="info">
              <span class="info__new">New!</span>
              <p class="info__title"><?php the_title(); ?></p>
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
</aside>
