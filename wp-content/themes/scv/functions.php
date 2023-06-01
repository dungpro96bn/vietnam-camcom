<?php
remove_action('wp_head', 'wp_generator');

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
        $var['btn_contact'] = "Liên hệ";
        $var['btn_language'] = "Ngôn ngữ";
        $var['company_name'] = "Công ty TNHH CAMCOM Việt Nam";
        $var['subTitle_01_banner_home'] = "CAMCOM GROUP";
        $var['subTitle_02_banner_home'] = "VIETNAM CAMCOM";
        $var['title_contact_banner'] = "Liên hệ";
        $var['text_contact_banner'] = "Nếu bạn muốn biết thêm thông tin, xin vui lòng liên hệ với chúng tôi ở đây.";
        $var['title_archive_news_page'] = "Tin Tức";
        $var['view_more'] = "Xem thêm";
    } elseif ($current_language == 'en'){
        $var['btn_contact'] = "Contact";
        $var['btn_language'] = "Language";
        $var['company_name'] = "VIETNAM CAMCOM Co., Ltd";
        $var['subTitle_01_banner_home'] = "CAMCOM GROUP";
        $var['subTitle_02_banner_home'] = "VIETNAM CAMCOM";
        $var['title_contact_banner'] = "Contact";
        $var['text_contact_banner'] = "If you would like more information, please contact us here.";
        $var['title_archive_news_page'] = "NEWS";
        $var['view_more'] = "View more";
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
    }

    return $var;
}


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
