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
    $ogp_title = '';
    $ogp_descr = '';
    $ogp_url = '';
    $ogp_img = '';
    $insert = '';

    if( is_singular() ) { //記事＆固定ページ
       setup_postdata($post);
       $ogp_title = $post->post_title;
       $ogp_descr = mb_substr(get_field('contents'), 0, 100);
       $ogp_url = get_permalink();
       wp_reset_postdata();
    } elseif ( is_front_page() || is_home() ) { //トップページ
       $ogp_title = get_bloginfo('name');
       $ogp_descr = get_bloginfo('description');
       $ogp_url = home_url();
    }

    //og:type
    $ogp_type = ( is_front_page() || is_home() ) ? 'website' : 'article';

    //og:image
    if ( is_single() ) {
       $ogp_img = get_field('main_image');
    } else {
     $ogp_img = '';
    }

    //出力するOGPタグをまとめる
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
} //END my_meta_ogp

add_action('wp_head','my_meta_ogp');//headにOGPを出力




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