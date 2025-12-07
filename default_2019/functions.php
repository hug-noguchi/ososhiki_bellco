<?php

/* __ CONFIG __ */



/* ////////////////////////////////////////////////////////////////////////////////////////////////////////////

			管理画面用CSS読み込ませる

//////////////////////////////////////////////////////////////////////////////////////////////////////////// */
function wp_custom_admin_css() {
	echo "\n" . '<link href="' . get_stylesheet_directory_uri() . '/admin_style.css' . '" rel="stylesheet" type="text/css">' . "\n";
}
add_action('admin_head', 'wp_custom_admin_css', 100);

function wp_custom_admin_js() {
	echo "\n".'<script type="text/javascript" src="' . get_stylesheet_directory_uri() . '/admin_js.js' . '"></script>' . "\n";
}
add_action('admin_head', 'wp_custom_admin_js', 100);



add_filter('admin_footer_text', 'custom_admin_footer');
function custom_admin_footer() {
	echo 'footer';
}






// メニューを非表示にする
function remove_menus () {
	remove_menu_page('wpcf7'); //Contact Form 7
	global $menu;

	unset($menu[2]); // ダッシュボード
	//unset($menu[4]); // メニューの線1
	unset($menu[5]); // 投稿
	//unset($menu[10]); // メディア
	unset($menu[15]); // リンク
	unset($menu[20]); // 固定ページ
	unset($menu[25]); // コメント
	//unset($menu[59]); // メニューの線2
	unset($menu[60]); // 外観
	//unset($menu[65]); // プラグイン
	//unset($menu[70]); // プロフィール
	//unset($menu[75]); // ツール
	//unset($menu[80]); // 設定
	//unset($menu[81]); // カスタムフィールド
	//unset($menu[90]); // メニューの線3
	//unset($menu[100]); // Custom Post Types

}
add_action('admin_menu', 'remove_menus');

function remove_submenus() {
	global $submenu;
	/*
	print "<!--";
	print_r($submenu);
	print "-->";
	*/

	// 設定

	//print_r($submenu);exit;
	unset($submenu['edit.php?post_type=contents_top'][15]); // カテゴリ
	unset($submenu['edit.php?post_type=contents_top'][16]); // カテゴリ
	unset($submenu['edit.php?post_type=contents_top'][17]); // カテゴリ
	unset($submenu['edit.php?post_type=contents_top'][18]); // カテゴリ

	/*
	unset($submenu['edit.php?post_type=works'][15]); // カテゴリ
	unset($submenu['edit.php?post_type=works'][16]); // タクソノミーオーダー
	unset($submenu['edit.php?post_type=faq'][15]); // カテゴリ
	unset($submenu['edit.php?post_type=faq'][16]); // タクソノミーオーダー

	unset($submenu['options-general.php'][41]); // AA PassPro
	unset($submenu['options-general.php'][43]); // Taxonomy Terms Order
	*/
}
add_action('admin_menu', 'remove_submenus', 102);



// ダッシュボードウィジェット非表示
function example_remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); // アクティビティ
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム

}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');




function custom_search_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}
add_action('init', 'custom_search_pagination');

// 検索結果にカスタム投稿を含める
function search_exclude_custom_post_type( $query ) {
	if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
		$query->set( 'post_type', array( 'ready', 'knowledge', 'manner', 'after', 'kazokusotokushu' ) );
	}
}
add_filter( 'pre_get_posts', 'search_exclude_custom_post_type' );

//ユーザーが検索したワードをハイライト
function wps_highlight_results($text) {
    if(is_search()){
    $sr = get_query_var('s');
    $keys = explode(" ",$sr);
    $text = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="searchhighlight">'.$sr.'</span>', $text);
    }
    return $text;
}
add_filter('the_title', 'wps_highlight_results');
add_filter('the_content', 'wps_highlight_results');


/*********************
OGPタグ/Twitterカード設定を出力
*********************/
function my_meta_ogp() {

  if( is_front_page() || is_home() || is_singular() ){
    global $post;

    // ★ 家族葬特集の投稿の場合 → OGP出力しない
    if ( is_singular('kazokusotokushu') ) {
      return;
    }

    $ogp_title = '';
    $ogp_descr = '';
    $ogp_url = '';
    $ogp_img = '';
    $insert = '';

    if( is_singular() ) {
       setup_postdata($post);
       $ogp_title = $post->post_title;
       $ogp_descr = mb_substr(get_field('contents'), 0, 100);
       $ogp_url = get_permalink();
       wp_reset_postdata();
    } elseif ( is_front_page() || is_home() ) {
       $ogp_title = get_bloginfo('name');
       $ogp_descr = get_bloginfo('description');
       $ogp_url = home_url();
    }

    $ogp_type = ( is_front_page() || is_home() ) ? 'website' : 'article';

    if ( is_single() ) {
       $ogp_img = get_field('main_image');
    } else {
     $ogp_img = '';
    }

    // ▼ ここ以下が出力対象
    $insert .= '<meta property="og:title" content="'.esc_attr($ogp_title).'" />' . "\n";
    $insert .= '<meta property="og:description" content="'.esc_attr($ogp_descr).'" />' . "\n";
    $insert .= '<meta property="og:type" content="'.$ogp_type.'" />' . "\n";
    $insert .= '<meta property="og:url" content="'.esc_url($ogp_url).'" />' . "\n";
    $insert .= '<meta property="og:image" content="'.esc_url($ogp_img).'" />' . "\n";
    $insert .= '<meta property="og:site_name" content="'.esc_attr(get_bloginfo('name')).'" />' . "\n";
    $insert .= '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    $insert .= '<meta name="twitter:site" content="" />' . "\n";
    $insert .= '<meta property="og:locale" content="ja_JP" />' . "\n";

    echo $insert;
  }
}

add_action('wp_head','my_meta_ogp');

function custom_feed($vars) {
    if ( isset( $vars['feed'] ) && !isset( $vars['post_type'] ) ) {
        $vars['post_type'] = array(
          'after',
          'knowledge',
          'manner',
          'ready',
          'kazokusotokushu'
          );
    }
    return $vars;
}
add_filter( 'request', 'custom_feed' );

function fields_in_feed($content) {
    if(is_feed()) {
        $post_id = get_the_ID();
        $output = '<description>' . get_field('main_image') . '</description>';
        $output .= '<content:encoded>' . get_post_meta($post_id, 'contents', true) . '</content:encoded>';
        $output .= '<category>' . esc_html(get_post_type_object(get_post_type())->label) . '</category>';
        $content = $content.$output;
    }
    return $content;
}
add_filter('the_content','fields_in_feed');

// カスタム投稿にSEO用カスタムフィールドを追加
function add_seo_meta_boxes() {
    add_meta_box(
        'seo_meta_box',
        'SEO設定',
        'seo_meta_box_html',
        ['kazokusotokushu'],
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_seo_meta_boxes');

function seo_meta_box_html($post) {
    $seo_title       = get_post_meta($post->ID, 'seo_title', true);
    $seo_description = get_post_meta($post->ID, 'seo_description', true);
    $seo_keywords    = get_post_meta($post->ID, 'seo_keywords', true);
    wp_nonce_field('save_seo_meta', 'seo_meta_nonce');
    ?>

    <p>
        <label>タイトル</label><br>
        <input type="text" name="seo_title" value="<?php echo esc_attr($seo_title); ?>" style="width:100%;">
    </p>

    <p>
        <label>ディスクリプション</label><br>
        <textarea name="seo_description" rows="3" style="width:100%;"><?php echo esc_textarea($seo_description); ?></textarea>
    </p>

    <p>
        <label>キーワード（カンマ区切り）</label><br>
        <input type="text" name="seo_keywords" value="<?php echo esc_attr($seo_keywords); ?>" style="width:100%;">
    </p>

    <?php
}

// 保存処理
function save_seo_meta($post_id) {

    if (!isset($_POST['seo_meta_nonce']) || !wp_verify_nonce($_POST['seo_meta_nonce'], 'save_seo_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    update_post_meta($post_id, 'seo_title', sanitize_text_field($_POST['seo_title']));
    update_post_meta($post_id, 'seo_description', sanitize_textarea_field($_POST['seo_description']));
    update_post_meta($post_id, 'seo_keywords', sanitize_text_field($_POST['seo_keywords']));
}
add_action('save_post', 'save_seo_meta');

add_filter( 'wp_get_attachment_image_attributes', function( $attr, $attachment ) {

    // 対象：すべての「記事詳細ページ(single)」のみ
    if ( ! is_singular() ) {
        return $attr;
    }

    // 画像が出現する順番を管理
    static $first_image_loaded = false;

    if ( ! $first_image_loaded ) {
        // 1枚目は lazy を付けない（即読み込み）
        unset( $attr['loading'] );
        $first_image_loaded = true;
    } else {
        // 2枚目以降は lazy を付ける
        $attr['loading'] = 'lazy';
    }

    return $attr;

}, 10, 2 );

remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
