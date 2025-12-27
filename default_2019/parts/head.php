<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-NK2GJXM');</script>
  <!-- End Google Tag Manager -->
  <meta charset="utf-8">
  <title><?php if ( is_front_page() || is_home() ) : ?>家族葬などの費用のお得情報 | <?php bloginfo('name'); ?><?php else : ?><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?><?php endif; ?></title>
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
      // まずは専用のSEOディスクリプションがあればそれを全文出す
      $seo_description = get_post_meta(get_the_ID(), 'seo_description', true);

      if (!empty($seo_description)) {
          echo esc_attr($seo_description);
      } else {
          // なければ contents を全文使う（途中で切らない）
          $contents = get_field('contents');
          if (!empty($contents)) {
              // タグを削除して、改行・余分な空白を1つのスペースにまとめる
              $contents_plain = strip_tags($contents);
              $contents_plain = preg_replace('/\s+/u', ' ', $contents_plain);
              echo esc_attr($contents_plain);
          } else {
              // それもなければブログ全体の説明
              bloginfo('description');
          }
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
          "position": 2,
          "name": "家族葬特集",
          "item": "https://ososhiki.bellco.co.jp/kazokusotokushu/"
        }
      ]
    }
    </script>

    <?php elseif ( is_singular('kazokusotokushu') ) : ?>

    <?php
    $terms = get_the_terms(get_the_ID(), 'kazokusotokushu_category');
    $term = ($terms && !is_wp_error($terms)) ? $terms[0] : null;

    $category_name = $term ? $term->name : '';
    $category_link = $term ? get_term_link($term) : '';

    $headline      = get_the_title();
    $url           = get_permalink();
    $datePublished = get_the_date('Y-m-d');
    $dateModified  = get_the_modified_date('Y-m-d');

    $thumb     = get_field('main_image');
    $noimage   = get_template_directory_uri() . '/images/noimage.png';
    $image_url = $thumb ? esc_url($thumb) : esc_url($noimage);

    $seo_description = get_post_meta(get_the_ID(), 'seo_description', true);

    if (!empty($seo_description)) {
      $description = $seo_description;
    } else {
      $contents = get_field('contents');
      if (!empty($contents)) {
        $description = preg_replace('/\s+/u', ' ', strip_tags($contents));
      } else {
        $description = get_bloginfo('description');
      }
    }
    ?>

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
          "position": 2,
          "name": "家族葬特集",
          "item": "https://ososhiki.bellco.co.jp/kazokusotokushu/"
        }
        <?php if( $category_name ) : ?>,
        {
          "@type": "ListItem",
          "position": 3,
          "name": "<?php echo esc_html($category_name); ?>",
          "item": "<?php echo esc_url($category_link); ?>"
        }
        <?php endif; ?>,
        {
          "@type": "ListItem",
          "position": <?php echo $category_name ? 4 : 3; ?>,
          "name": "<?php echo esc_html($headline); ?>",
          "item": "<?php echo esc_url($url); ?>"
        }
      ]
    }
    </script>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BlogPosting",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php echo esc_url($url); ?>"
      },
      "headline": "<?php echo esc_html($headline); ?>",
      "image": [
        "<?php echo $image_url; ?>"
      ],
      "datePublished": "<?php echo esc_html($datePublished); ?>",
      "dateModified": "<?php echo esc_html($dateModified); ?>",
      "author": {
        "@type": "Organization",
        "name": "お葬式なるほどチャンネル"
      },
      "publisher": {
        "@type": "Organization",
        "name": "お葬式なるほどチャンネル",
        "logo": {
          "@type": "ImageObject",
          "url": "https://ososhiki.bellco.co.jp/wp/wp-content/themes/default_2019/images/svg/bell_logo02.svg"
        }
      },
      "description": "<?php echo esc_attr($description); ?>"
    }
    </script>

    <?php endif; ?>
  <?php wp_head(); ?>
</head>
