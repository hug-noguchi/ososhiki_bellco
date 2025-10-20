<?php get_header('under'); ?>
<?php
global $wp_query;
$total_results = $wp_query->found_posts;
 ?>
<main class="single-main">
    <section id="search" class="search">
        <div class="search__container">
            <h1 class="search__title">検索結果<span><?php echo $total_results; ?></span>件</h1>
            <div class="pagination">
                <?php custom_search_pagination(); ?>
            </div>
<?php
if( $total_results >0 ):
if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

            <article class="search__block">
                <a href="<?php the_permalink(); ?>">
                    <div class="flex">
                        <div class="thumbnail" style="background-image: url(<?php the_field('main_image'); ?>);"></div>
                        <div class="info">
                            <h2 class="title"><?php the_title(); ?></h2>
                            <p class="excerpt">
<?php
if(mb_strlen(get_field('contents'))>100){
$text= mb_substr(strip_tags(get_field('contents')), 0, 100);
echo $text.'…';
}else{
echo strip_tags(get_field('contents'));
}?>
                            </p>
                        </div>
                    </div>
                    <div class="read-more">
                        <span>もっと読む</span>
                    </div>
                </a>
            </article>
<?php endwhile; endif; else: ?>
<p class="no-article">検索された記事は存在しません。</p>
<?php endif; ?>
<div class="pagination bottom-pagination">
                <?php custom_search_pagination(); ?>
            </div>
        </div>
    </section>
    <?php get_template_part('parts/categoryarticle'); ?>
</main>
<?php get_footer(); ?>

