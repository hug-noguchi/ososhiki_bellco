<aside class="sidebar">
  <p class="title <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></p>
  <ul class="sidebar__nav">
      <li>
        <span class="open">その他のマナー</span>
        <ul class="sidebar__navchild" style="display: block;">
<?php
$args = array(
'post_type' => 'manner', //投稿タイプ名
'posts_per_page' => -1, //出力する記事の数
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
        <span>参列者のマナー</span>
        <ul class="sidebar__navchild">
<?php
$args = array(
'post_type' => 'manner', //投稿タイプ名
'posts_per_page' => -1, //出力する記事の数
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
        <span>喪主・施主のマナー</span>
        <ul class="sidebar__navchild">
<?php
$args = array(
'post_type' => 'manner', //投稿タイプ名
'posts_per_page' => -1, //出力する記事の数
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
