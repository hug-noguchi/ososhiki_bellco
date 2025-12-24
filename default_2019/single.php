<?php get_header('under'); ?>
<main class="single-main">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
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
                </div>
            </div>
            <div class="read-time">
                <?php echo sprintf('読了予測：約%s分', get_time_to_content_read(get_the_content())); ?>
            </div>
            <div class="article__content">
              <?php
                $content = get_field('contents');
                echo apply_filters('the_content', $content);
              ?>
            </div>
        </div>
        <?php get_template_part('parts/sidelist'); ?>
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
                    <article>
                        <a href="<?php the_permalink(); ?>">
                            <div class="flex">
                                <div class="thumbnail" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/main_visual.jpg)"></div>
                                <div class="info">
                                    <p class="post-type-name">お葬式の豆知識</p>
                                    <h3 class="title">グリーフケアとお葬式</h3>
                                </div>
                            </div>
                            <div class="read-more">
                                <span>もっと読む</span>
                            </div>
                        </a>
                    </article>
                    <article>
                        <a href="<?php the_permalink(); ?>">
                            <div class="flex">
                                <div class="thumbnail" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/main_visual.jpg)"></div>
                                <div class="info">
                                    <p class="post-type-name">お葬式の豆知識</p>
                                    <h3 class="title">グリーフケアとお葬式</h3>
                                </div>
                            </div>
                            <div class="read-more">
                                <span>もっと読む</span>
                            </div>
                        </a>
                    </article>
                    <article>
                        <a href="<?php the_permalink(); ?>">
                            <div class="flex">
                                <div class="thumbnail" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/main_visual.jpg)"></div>
                                <div class="info">
                                    <p class="post-type-name">お葬式の豆知識</p>
                                    <h3 class="title">グリーフケアとお葬式</h3>
                                </div>
                            </div>
                            <div class="read-more">
                                <span>もっと読む</span>
                            </div>
                        </a>
                    </article>
                    <article>
                        <a href="<?php the_permalink(); ?>">
                            <div class="flex">
                                <div class="thumbnail" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/main_visual.jpg)"></div>
                                <div class="info">
                                    <p class="post-type-name">お葬式の豆知識</p>
                                    <h3 class="title">グリーフケアとお葬式</h3>
                                </div>
                            </div>
                            <div class="read-more">
                                <span>もっと読む</span>
                            </div>
                        </a>
                    </article>
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
          <li><a href="#">
            <div class="info">
              <p class="info__title">ドライブスルーのお葬式<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></p>
            </div>
          </a></li>
          <li><a href="#">
            <div class="info">
              <p class="info__title">ドライブスルーのお葬式<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></p>
            </div>
          </a></li>
        </ul>
      </li>
      <li>
        <span>お葬式の種類</span>
        <ul class="sidebar__navchild">
          <li><a href="#">
            <div class="info">
              <p class="info__title">ドライブスルーのお葬式<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></p>
            </div>
          </a></li>
          <li><a href="#">
            <div class="info">
              <p class="info__title">ドライブスルーのお葬式<img src="<?php echo get_template_directory_uri(); ?>/images/svg/arrow.svg" alt="" width="48" height="7"></p>
            </div>
          </a></li>
        </ul>
      </li>
  </ul>
    </section>
    <?php get_template_part('parts/categoryarticle'); ?>
</main>
<?php get_footer(); ?>
