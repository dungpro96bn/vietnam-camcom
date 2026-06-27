<?php
remove_action('wp_head', 'wp_generator');

/* ============================================================
   VCC — dọn <head> để load nhẹ hơn (an toàn, áp dụng mọi trang)
   ============================================================ */
function scv_head_cleanup() {
    // Bỏ script phát hiện emoji (wp-emoji) — không cần cho site này.
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    // Bỏ các link/meta thừa trong <head>.
    remove_action('wp_head', 'rsd_link');                       // RSD
    remove_action('wp_head', 'wlwmanifest_link');               // Windows Live Writer
    remove_action('wp_head', 'wp_shortlink_wp_head');           // shortlink
    remove_action('wp_head', 'feed_links_extra', 3);            // extra feed links
    remove_action('wp_head', 'rest_output_link_wp_head');       // REST link
    remove_action('wp_head', 'wp_oembed_add_discovery_links');  // oEmbed discovery
    remove_action('wp_head', 'wp_oembed_add_host_js');          // oEmbed host js
    remove_action('template_redirect', 'rest_output_link_header', 11);
}
add_action('init', 'scv_head_cleanup');

// Bỏ script wp-embed.min.js (không nhúng nội dung WP ngoài).
function scv_dequeue_embed() { wp_dequeue_script('wp-embed'); }
add_action('wp_footer', 'scv_dequeue_embed');

//サイトナビゲーション用
register_nav_menus(array('gnav' => 'ナビゲーション'));

//アイキャッチ有効
add_theme_support('post-thumbnails');

//ショートコード
function uploadPath() { return content_url() . '/uploads/'; }
add_shortcode('uploadPath', 'uploadPath');

function homePath() { return home_url() . '/'; }
add_shortcode('homePath', 'homePath');

function my_custom_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/css/style-admin.css' );
}
add_action( 'login_enqueue_scripts', 'my_custom_login_stylesheet' );

add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
    wp_enqueue_style( 'style-admin', get_template_directory_uri() . '/assets/css/style-admin.css', false, '1.0.0' );
}

function pine_add_page_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = 'page-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'pine_add_page_slug_body_class' );

//ウィジェット
function my_theme_widgets_init() {
  register_sidebar( array(
    'name' => 'ウィジェットエリア',
    'id' => 'widgets',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'
  ));
}
add_action('widgets_init', 'my_theme_widgets_init');

//パンくずリスト
function breadcrumb($divOption = array("id" => "breadcrumb", "class" => "breadcrumb")){
	global $post;
	global $homeName;
	if ($homeName == '') {
		$homeName = 'HOME';
	}
	$str ='';
	if(!is_home()&&!is_admin()){
		$tagAttribute = '';
		foreach($divOption as $attrName => $attrValue){
			$tagAttribute .= sprintf(' %s="%s"', $attrName, $attrValue);
		}
		$str.= '<div'. $tagAttribute .'>';
		$str.= '<ol>';
		$str.= '<li><a href="'. home_url() .'/">' . $homeName . '</a></li>';

		if(is_category()) {
			$cat = get_queried_object();
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_category_link($ancestor) .'">'. get_cat_name($ancestor) .'</a></li>';
				}
			}
			$str.='<li>'. $cat -> name . '</li>';
		} elseif(is_single()){
			$categories = get_the_category($post->ID);
			$cat = $categories[0];
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_category_link($ancestor).'">'. get_cat_name($ancestor). '</a></li>';
				}
			}
			$str.='<li><a href="'. get_category_link($cat -> term_id). '">'. $cat-> cat_name . '</a></li>';
			$str.= '<li>'. $post -> post_title .'</li>';
		} elseif(is_page()){
			if($post -> post_parent != 0 ){
				$ancestors = array_reverse(get_post_ancestors( $post->ID ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_permalink($ancestor).'">'. get_the_title($ancestor) .'</a></li>';
				}
			}
			$str.= '<li>'. $post -> post_title .'</li>';
		} elseif(is_date()){
			if(get_query_var('day') != 0){
				$str.='<li><a href="'. get_year_link(get_query_var('year')). '">' . get_query_var('year'). '年</a></li>';
				$str.='<li><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')). '">'. get_query_var('monthnum') .'月</a></li>';
				$str.='<li>'. get_query_var('day'). '日</li>';
			} elseif(get_query_var('monthnum') != 0){
				$str.='<li><a href="'. get_year_link(get_query_var('year')) .'">'. get_query_var('year') .'年</a></li>';
				$str.='<li>'. get_query_var('monthnum'). '月</li>';
			} else {
				$str.='<li>'. get_query_var('year') .'年</li>';
			}
		} elseif(is_search()) {
			$str.='<li>「'. get_search_query() .'」で検索した結果</li>';
		} elseif(is_author()){
			$str .='<li>投稿者 : '. get_the_author_meta('display_name', get_query_var('author')).'</li>';
		} elseif(is_tag()){
			$str.='<li>タグ : '. single_tag_title( '' , false ). '</li>';
		} elseif(is_attachment()){
			$str.= '<li>'. $post -> post_title .'</li>';
		} elseif(is_404()){
			$str.='<li>ページがみつかりません。</li>';
		} else{
			$str.='<li>'. wp_title('', true) .'</li>';
		}
		$str.='</ol>';
		$str.='</div>';
	}
	echo $str;
}

register_sidebar(array(
    'name' => 'Footer menu bottom ja',
    'id' => 'footer-menu-bottom-ja',
    'class' => 'footer__navSub',
    'description' => 'Add widgets here to appear in your SideBar.',
    'before_widget' => '<nav class="footer__navList">',
    'after_widget' => '</nav>',
));

register_sidebar(array(
    'name' => 'Footer menu bottom vi',
    'id' => 'footer-menu-bottom-vi',
    'class' => 'footer__navSub',
    'description' => 'Add widgets here to appear in your SideBar.',
    'before_widget' => '<nav class="footer__navList">',
    'after_widget' => '</nav>',
));

register_sidebar(array(
    'name' => 'Footer menu bottom en',
    'id' => 'footer-menu-bottom-en',
    'class' => 'footer__navSub',
    'description' => 'Add widgets here to appear in your SideBar.',
    'before_widget' => '<nav class="footer__navList">',
    'after_widget' => '</nav>',
));

function languageString ()
{
    global $sitepress;
    $current_language = $sitepress->get_current_language();

    $br = "<br/>";
    $brSp = "<br class='sp-br'/>";

    if ($current_language == 'vi') {
		$var['btn_back'] = "Quay Lại";
        $var['btn_contact'] = "Liên hệ";
        $var['btn_language'] = "Ngôn ngữ";
        $var['company_name'] = "Công ty TNHH VIỆT NAM CAMCOM";
        $var['subTitle_01_banner_home'] = "CAMCOM GROUP";
        $var['subTitle_02_banner_home'] = "VIETNAM CAMCOM";
        $var['title_contact_banner'] = "Liên hệ";
        $var['text_contact_banner'] = "Nếu bạn muốn biết thêm thông tin, xin vui lòng liên hệ với chúng tôi ở đây.";
        $var['title_archive_news_page'] = "Tin Tức";
        $var['view_more'] = "Xem thêm";
        $var['cat_news'] = "Tin tức";
    } elseif ($current_language == 'en'){
		$var['btn_back'] = "Back";
        $var['btn_contact'] = "Contact";
        $var['btn_language'] = "Language";
        $var['company_name'] = "VIETNAM CAMCOM Co., Ltd";
        $var['subTitle_01_banner_home'] = "CAMCOM GROUP";
        $var['subTitle_02_banner_home'] = "VIETNAM CAMCOM";
        $var['title_contact_banner'] = "Contact";
        $var['text_contact_banner'] = "If you have any inquiries or questions, please feel free to contact us.";
        $var['title_archive_news_page'] = "NEWS";
        $var['view_more'] = "View more";
        $var['cat_news'] = "News";
    } else{
        $var['btn_contact'] = "お問い合わせ";
        $var['btn_language'] = "言語";
        $var['company_name'] = "ベトナムキャムコム有限会社";
        $var['subTitle_01_banner_home'] = "キャムコムグループ";
        $var['subTitle_02_banner_home'] = "ベトナムキャムコム";
        $var['title_contact_banner'] = "Contact";
        $var['text_contact_banner'] = "詳細情報など希望される方は、".$brSp."こちらからお問い合わせください";
        $var['title_archive_news_page'] = "NEWS";
        $var['view_more'] = "View more";
        $var['cat_news'] = "News";
		$var['btn_back'] = "一覧へ戻る";
    }

    // ===== VCC redesign — nav / footer labels =====
    if ($current_language == 'vi') {
        $var['nav_home']      = 'Trang chủ';
        $var['nav_about']     = 'Về chúng tôi';
        $var['nav_services']  = 'Dịch vụ';
        $var['nav_news']      = 'Tin tức';
        $var['nav_company']   = 'Công ty';
        $var['nav_recruit']   = 'Tuyển dụng';
        $var['svc_hr']        = 'Giới thiệu nguồn nhân lực';
        $var['svc_bpo']       = 'Dịch vụ BPO';
        $var['svc_web']       = 'Phát triển WEB & nội dung';
        $var['svc_fdi']       = 'Hỗ trợ mở rộng thị trường VN';
        $var['svc_labor']     = 'Hỗ trợ quản lý lao động';
        $var['menu_label']    = 'Menu';
    } elseif ($current_language == 'en') {
        $var['nav_home']      = 'Home';
        $var['nav_about']     = 'About us';
        $var['nav_services']  = 'Services';
        $var['nav_news']      = 'News';
        $var['nav_company']   = 'Company';
        $var['nav_recruit']   = 'Careers';
        $var['svc_hr']        = 'Human resources';
        $var['svc_bpo']       = 'BPO service';
        $var['svc_web']       = 'WEB & content development';
        $var['svc_fdi']       = 'Vietnam market expansion';
        $var['svc_labor']     = 'Labor management support';
        $var['menu_label']    = 'Menu';
    } else {
        $var['nav_home']      = 'ホーム';
        $var['nav_about']     = '私たちについて';
        $var['nav_services']  = 'サービス';
        $var['nav_news']      = 'ニュース';
        $var['nav_company']   = '会社概要';
        $var['nav_recruit']   = '採用情報';
        $var['svc_hr']        = '人材紹介';
        $var['svc_bpo']       = 'BPOサービス';
        $var['svc_web']       = 'WEB・コンテンツ制作';
        $var['svc_fdi']       = 'ベトナム進出支援';
        $var['svc_labor']     = '労務管理支援';
        $var['menu_label']    = 'メニュー';
    }

    // ===== VCC redesign — homepage chrome (strings not stored in ACF) =====
    if ($current_language == 'vi') {
        $var['home_hm1']        = 'Năm thành lập';
        $var['home_hm2']        = 'Năm kinh nghiệm nhân sự';
        $var['home_hm3']        = 'Lĩnh vực dịch vụ';
        $var['home_circle_lab'] = 'Vòng tuần hoàn';
        $var['home_circle_big'] = 'Nhân lực<br />Việt&nbsp;&ndash;&nbsp;Nhật';
        $var['home_node_jp']    = 'Nhật Bản';
        $var['home_node_vn']    = 'Việt Nam';
        $var['home_iso_sub']    = 'Chứng nhận an toàn thông tin';
        $var['home_iso_cert']   = 'Chứng nhận hệ thống quản lý an toàn thông tin';
        $var['home_news_empty'] = 'Chưa có tin tức.';
    } elseif ($current_language == 'en') {
        $var['home_hm1']        = 'Established';
        $var['home_hm2']        = 'Years of HR expertise';
        $var['home_hm3']        = 'Service fields';
        $var['home_circle_lab'] = 'Circulation';
        $var['home_circle_big'] = 'Vietnam&nbsp;&ndash;&nbsp;Japan<br />talent';
        $var['home_node_jp']    = 'Japan';
        $var['home_node_vn']    = 'Vietnam';
        $var['home_iso_sub']    = 'Information security certified';
        $var['home_iso_cert']   = 'Information Security Management System certification';
        $var['home_news_empty'] = 'No news yet.';
    } else {
        $var['home_hm1']        = '設立';
        $var['home_hm2']        = '人材の経験年数';
        $var['home_hm3']        = 'サービス領域';
        $var['home_circle_lab'] = '循環';
        $var['home_circle_big'] = 'ベトナム&nbsp;&ndash;&nbsp;日本<br />人材';
        $var['home_node_jp']    = '日本';
        $var['home_node_vn']    = 'ベトナム';
        $var['home_iso_sub']    = '情報セキュリティ認証';
        $var['home_iso_cert']   = '情報セキュリティマネジメントシステム認証';
        $var['home_news_empty'] = 'ニュースはまだありません。';
    }

    // ===== VCC redesign — footer labels =====
    if ($current_language == 'vi') {
        $var['foot_tagline']   = 'Phát triển con người, sáng tạo nên "công việc có giá trị", tạo ra vòng tuần hoàn nhân lực bền vững giữa Việt Nam và Nhật Bản.';
        $var['foot_country']   = 'Việt Nam';
        $var['foot_company']   = 'Công ty';
        $var['foot_strengths'] = 'Thế mạnh';
        $var['foot_support']   = 'Hỗ trợ';
        $var['foot_privacy']   = 'Chính sách bảo mật';
        $var['foot_infosec']   = 'Chính sách bảo mật thông tin';
        $var['foot_overview']  = 'Tổng quan công ty';
    } elseif ($current_language == 'en') {
        $var['foot_tagline']   = 'Developing people and creating "work that matters" — building a sustainable cycle of human resources between Vietnam and Japan.';
        $var['foot_country']   = 'Vietnam';
        $var['foot_company']   = 'Company';
        $var['foot_strengths'] = 'Strengths';
        $var['foot_support']   = 'Support';
        $var['foot_privacy']   = 'Privacy Policy';
        $var['foot_infosec']   = 'Information Security Policy';
        $var['foot_overview']  = 'Company overview';
    } else {
        $var['foot_tagline']   = '人を育て、「価値ある仕事」を創造し、ベトナムと日本の間に持続可能な人材循環を生み出します。';
        $var['foot_country']   = 'ベトナム';
        $var['foot_company']   = '会社';
        $var['foot_strengths'] = '強み';
        $var['foot_support']   = 'サポート';
        $var['foot_privacy']   = 'プライバシーポリシー';
        $var['foot_infosec']   = '情報セキュリティ方針';
        $var['foot_overview']  = '会社概要';
    }

    // ===== VCC redesign — news (archive + single) =====
    if ($current_language == 'vi') {
        $var['news_eyebrow'] = 'News';
        $var['news_title']   = 'Tin tức';
        $var['news_lead']    = 'Cập nhật hoạt động, sự kiện và thông tin mới nhất từ VIETNAM CAMCOM.';
        $var['news_empty']   = 'Chưa có tin tức.';
        $var['news_back']    = 'Quay lại danh sách tin tức';
    } elseif ($current_language == 'en') {
        $var['news_eyebrow'] = 'News';
        $var['news_title']   = 'News';
        $var['news_lead']    = 'Latest updates, events and announcements from VIETNAM CAMCOM.';
        $var['news_empty']   = 'No news yet.';
        $var['news_back']    = 'Back to news list';
    } else {
        $var['news_eyebrow'] = 'News';
        $var['news_title']   = 'ニュース';
        $var['news_lead']    = 'ベトナムキャムコムの最新情報・お知らせをご覧いただけます。';
        $var['news_empty']   = 'ニュースはまだありません。';
        $var['news_back']    = 'ニュース一覧へ戻る';
    }

    return $var;
}

/* ============================================================
   VCC redesign — asset loading + ACF body fields
   ============================================================ */
function scv_vcc_assets() {
    $uri = get_template_directory_uri();
    $dir = get_template_directory();
    wp_enqueue_script(
        'vcc-app',
        $uri . '/assets/js/app.js',
        array(),
        file_exists($dir . '/assets/js/app.js') ? filemtime($dir . '/assets/js/app.js') : '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'scv_vcc_assets', 20);

// ACF field groups for the converted (template-based) pages.
$scv_acf = get_template_directory() . '/inc/acf-vcc-fields.php';
if (file_exists($scv_acf)) {
    require_once $scv_acf;
}


/* ============================================================
   VCC — Tối ưu PageSpeed (render-blocking / unused JS / TBT)
   ============================================================ */

// 1) reCAPTCHA (CF7 core) chỉ load trên trang Liên hệ.
//    Mặc định CF7 enqueue google-recaptcha + badge trên MỌI trang
//    → ~591 KiB JS không dùng + ~2.1s thực thi. Gỡ ở mọi nơi trừ
//    trang dùng template contact.
function scv_limit_recaptcha_scripts() {
    if (is_page_template('tpl-contact.php') || is_page_template('tpl-contact-confirm.php')) {
        return; // giữ reCAPTCHA cho form liên hệ
    }
    wp_dequeue_script('google-recaptcha');
    wp_dequeue_script('wpcf7-recaptcha');
}
add_action('wp_enqueue_scripts', 'scv_limit_recaptcha_scripts', 100);

// 2) jQuery: defer để không chặn render. Các template legacy gọi
//    jQuery ngay khi parse (page.php / page-complete.php) đã được bọc
//    trong DOMContentLoaded nên an toàn.
function scv_defer_scripts($tag, $handle) {
    $defer = array('jquery', 'vcc-app');
    if (in_array($handle, $defer, true) && strpos($tag, ' defer') === false) {
        $tag = str_replace(' src=', ' defer src=', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'scv_defer_scripts', 10, 2);

// 3) Resource hints: mở sẵn kết nối tới host bên thứ ba dùng sớm.
function scv_resource_hints($urls, $relation_type) {
    if ('preconnect' === $relation_type) {
        $urls[] = array('href' => 'https://fonts.gstatic.com', 'crossorigin');
        $urls[] = 'https://fonts.googleapis.com';
        $urls[] = 'https://ajax.googleapis.com';
    }
    return $urls;
}
add_filter('wp_resource_hints', 'scv_resource_hints', 10, 2);

add_shortcode("urlLanguage", "urlLanguage");
function urlLanguage (){
    global $sitepress;
    $current_language = $sitepress->get_current_language();
    if($current_language != 'ja'):
        echo $urlLanguage = home_url().$current_language;
    else:
        echo $urlLanguage = home_url();
    endif;
}
