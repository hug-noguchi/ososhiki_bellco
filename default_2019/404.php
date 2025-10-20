<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage default_2019
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="error-404 not-found">
				<header class="page-header">
					<h3 class="page-title"><?php _e( 'お探しのページは公開が終了しているか、URLが変更されています。', 'default_2019' ); ?></h3>
				</header><!-- .page-header -->
				<div class="page-top">
					<a href="<?php echo home_url(); ?>">TOPへお戻りください。</a>
				</div>
			</div><!-- .error-404 -->
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();