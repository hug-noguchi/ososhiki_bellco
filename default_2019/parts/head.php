<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NK2GJXM');</script>
	<!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/images/icons/touch.png" rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$custome_post_article = get_field('contents');
$content_summary = strip_tags($custome_post_article);
$content_summary = str_replace("\n", "", $content_summary);
$content_summary = str_replace("\r", "", $content_summary);
$content_summary = mb_substr($content_summary, 0, 60). "...";
?>
    <meta name="description" content="<?php
if(is_home()){ bloginfo('description'); }
elseif (is_single()){
echo $content_summary; }
else { ?><?php bloginfo('description'); ?><?php } ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <?php wp_head(); ?>
  </head>