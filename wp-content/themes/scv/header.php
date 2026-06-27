<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MQCHJP3');</script>
<!-- End Google Tag Manager -->

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="facebook-domain-verification" content="tm70gapdrnlhemdigsbuz8ufda3zif" />
	<title><?php
		global $page, $paged;
		wp_title('|', true, 'right');
		bloginfo('name');
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page())) {
			echo " | $site_description";
		}
		if ($paged >= 2 || $page >= 2) {
			echo ' | ' . sprintf(__('Page %s', 'cTpl'), max($paged, $page));
		}
		?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php // Google Fonts — nạp non-blocking bằng JS-inject (thay cho @import; resilient với LiteSpeed). preconnect do wp_resource_hints. ?>
    <?php $scv_fonts = 'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap'; ?>
    <link rel="preload" as="style" href="<?php echo esc_url($scv_fonts); ?>">
    <script>(function(){var l=document.createElement('link');l.rel='stylesheet';l.href='<?php echo esc_url($scv_fonts); ?>';document.head.appendChild(l);})();</script>
    <noscript><link rel="stylesheet" href="<?php echo esc_url($scv_fonts); ?>"></noscript>

    <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/camcom-light.css">
    <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/camcom-hr.css">

	<?php
	// jQuery is still used by footer contact form + page.php scripts.
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2.4');
	wp_head();
	?>

    <?php if (is_admin_bar_showing()): ?>
        <style type="text/css" media="screen">
            body {
                margin-top: 32px !important;
            }
            @media (max-width: 1000px){
                #header-menu .right-header{
                    height: calc(100vh - 32px) !important;
                }
            }
            @media screen and (max-width: 782px) {
                html {
                    margin-top: 46px !important;
                }
                #header-menu .header-nav.scroll-header{
                    top: 46px !important;
                }
                #header-menu .right-header{
                    height: calc(100vh - 46px) !important;
                }
            }
        </style>
    <?php endif; ?>

	<?php
	global $sitepress;
	$var = languageString();
	$current_language = $sitepress->get_current_language();
	?>
</head>

<body <?php body_class('vcc'); ?> id="top">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQCHJP3" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<div class="bg-field" aria-hidden="true">
	<div class="blob a"></div>
	<div class="blob b"></div>
</div>

<!-- ================= NAV ================= -->
<header class="nav">
	<div class="container nav-inner">
		<a href="<?php echo home_url('/'); ?>" class="brand">
            <img class="brand-logo brand-logo-white skip-lazy" src="/wp-content/themes/scv/images/scv_logo_white-980.png" width="980" height="83" alt="VIETNAM CAMCOM" loading="eager" fetchpriority="high" decoding="sync" data-no-lazy="1" data-skip-lazy="1" />
            <img class="brand-logo brand-logo-dark skip-lazy" src="/wp-content/themes/scv/images/scv_logo_header-980.png" width="980" height="83" alt="VIETNAM CAMCOM" loading="eager" fetchpriority="high" decoding="sync" data-no-lazy="1" data-skip-lazy="1" />
		</a>
		<nav class="nav-links">
			<a href="<?php echo home_url('/about/'); ?>"><?php echo $var['nav_about']; ?></a>
			<div class="nav-drop">
				<button type="button"><?php echo $var['nav_services']; ?> <svg class="caret" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg></button>
				<div class="dropdown">
					<a href="<?php echo home_url('/hr/'); ?>"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/></svg></span><?php echo $var['svc_hr']; ?></a>
					<a href="<?php echo home_url('/bpo/'); ?>"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg></span><?php echo $var['svc_bpo']; ?></a>
					<a href="<?php echo home_url('/web/'); ?>"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="m18 16 4-4-4-4M6 8l-4 4 4 4M14.5 4l-5 16"/></svg></span><?php echo $var['svc_web']; ?></a>
					<a href="<?php echo home_url('/fdi-support/'); ?>"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/></svg></span><?php echo $var['svc_fdi']; ?></a>
					<a href="<?php echo home_url('/labor-management/'); ?>"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 11l3 3 8-8"/><path d="M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h9"/></svg></span><?php echo $var['svc_labor']; ?></a>
				</div>
			</div>
			<a href="<?php echo home_url('/company/'); ?>"><?php echo $var['nav_company']; ?></a>
			<a href="<?php echo home_url('/recruit/'); ?>"><?php echo $var['nav_recruit']; ?></a>
		</nav>
		<div class="nav-right">
			<div class="lang">
				<button type="button" value="ja|ja" onclick="doGTranslate(this)" <?php if ($current_language == 'ja') echo 'class="on"'; ?>>JA</button>
				<button type="button" value="ja|vi" onclick="doGTranslate(this)" <?php if ($current_language == 'vi') echo 'class="on"'; ?>>VI</button>
				<button type="button" value="ja|en" onclick="doGTranslate(this)" <?php if ($current_language == 'en') echo 'class="on"'; ?>>EN</button>
			</div>
			<a href="<?php echo home_url('/contact/'); ?>" class="btn btn-primary"><?php echo $var['btn_contact']; ?> <span class="arr">&rarr;</span></a>
			<button class="menu-btn" aria-label="<?php echo esc_attr($var['menu_label']); ?>"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M3 12h18M3 18h18"/></svg></button>
		</div>
	</div>
</header>

<script type="text/javascript">
	function getCurrentLangFromPath() {
		var firstPath = location.pathname.split('/')[1];
		if (firstPath === 'vi') return 'vi';
		if (firstPath === 'en') return 'en';
		return 'ja';
	}
	function doGTranslate(el) {
		var lang_pair = el && el.value ? el.value : el;
		if (lang_pair === '') return;
		var lang = lang_pair.split('|')[1];
		var plang = location.pathname.split('/')[1];
		if (lang === getCurrentLangFromPath()) return;
		if (plang !== "" && plang !== "en" && plang !== "vi") {
			if (lang === "ja") {
				location.href = location.protocol + '//' + location.host + location.pathname + location.search;
			} else {
				location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname + location.search;
			}
		} else if (lang === "ja" && (plang === "en" || plang === "vi")) {
			location.href = location.protocol + '//' + location.host + location.pathname.replace('/' + plang + '/', '/') + location.search;
		} else {
			location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname.replace('/' + plang + '/', '/') + location.search;
		}
	}
</script>

<main role="main">
