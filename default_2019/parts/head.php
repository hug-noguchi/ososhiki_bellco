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
    if (is_home()) {
        echo '家族葬やお葬式の費用・流れ・マナーをわかりやすく解説する情報サイトです。初めての葬儀で不安な方に向けて、費用相場や準備の手順、宗派ごとの知識、葬儀後の法要まで丁寧に紹介しています。';
    }
    elseif (is_archive()) {
        echo '家族葬特集では、家族葬の費用相場や内訳、直葬・一日葬との違い、流れ、メリット・デメリットなどを分かりやすく解説した記事をまとめています。家族葬を検討中の方が知っておきたい情報を厳選してご紹介します。';
    }
    elseif (is_single() && get_post_type() === 'post') {
        echo esc_attr($content_summary);
    }
    elseif (is_singular('kazokusotokushu')) {
        $seo_description = get_post_meta(get_the_ID(), 'seo_description', true);
        if (!empty($seo_description)) {
            echo esc_attr($seo_description);
        } else {
            echo isset($content_summary) ? esc_attr($content_summary) : '';
        }
    }
    else {
        bloginfo('description');
    }
  ?>">
  <meta name="keywords" content="<?php
      if (is_singular('kazokusotokushu')) {
          $seo_keywords = get_post_meta(get_the_ID(), 'seo_keywords', true);
          if (!empty($seo_keywords)) {
              echo esc_attr($seo_keywords);
          }
      }
  ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
  <?php if (is_home()) : ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "お葬式なるほどチャンネル",
      "url": "https://ososhiki.bellco.co.jp/",
      "description": "家族葬やお葬式の費用・流れ・マナーをわかりやすく解説する葬儀情報サイトです。初めての葬儀で不安な方に向けて、費用相場や準備の手順、宗派ごとの知識、葬儀後の法要まで丁寧に紹介しています。",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://ososhiki.bellco.co.jp/?s={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "株式会社ベルコ",
      "url": "https://www.bellco.co.jp/",
      "logo": "https://ososhiki.bellco.co.jp/wp/wp-content/themes/default_2019/images/svg/bell_logo02.svg",
      "description": "株式会社ベルコが運営する葬儀情報メディア『お葬式なるほどチャンネル』です。家族葬やお葬式に関する基礎知識やマナー、費用の考え方などをわかりやすくお届けします。"
    }
    </script>
  <?php elseif (is_archive()) : ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "お葬式なるほどチャンネル",
          "item": "https://ososhiki.bellco.co.jp/"
        },
        {
          "@type": "ListItem",
          "position": 2",
          "name": "家族葬特集",
          "item": "https://ososhiki.bellco.co.jp/kazokusotokushu/"
        }
      ]
    }
    </script>

  <?php endif; ?>
  <?php wp_head(); ?>
</head>
