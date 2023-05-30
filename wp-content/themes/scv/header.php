<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,minimum-scale=0.5">
		<!--    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1">-->
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
<!--		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">-->
<!--        <link rel="stylesheet" href="https://use.typekit.net/rpr7ugj.css">-->
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/noto-san.js"></script>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/font-proxima-nova.css">

        <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/aos.css" rel="stylesheet">
        <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/css/slick.css">
		<link rel="stylesheet" media="all" href="<?php bloginfo('stylesheet_url'); ?>?ver=<?php echo rand(); ?>">
		<link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/homepage.css">
        <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/service-page.css">
        <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/page-custom.css">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<script>
			if(!sessionStorage.getItem("checkLocation")){
				sessionStorage.setItem("checkLocation", "Done");
			}
		</script>
		
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/fontawesome.js" crossorigin="anonymous"></script>
		<?php
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2.4');
		wp_head();
		?>

		<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">-->
		<!--    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.min.js"></script>-->
		<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.152.2/three.min.js"></script>-->
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/aos.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/slick.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/main.js"></script>

		<?php if (is_admin_bar_showing()): ?>
		<style type="text/css" media="screen">
			html {
				margin-top: 32px !important;
			}
			#header-menu .header-nav.scroll-header{
				top: 32px !important;
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

	<?php
	if($_SERVER['REMOTE_ADDR'] != '127.0.0.1'):
	$ip = $_SERVER['REMOTE_ADDR'];
	$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
	$country = $details->country;

	if($country == "JP"):
	echo <<<EOM
        <script>
            var check = sessionStorage.getItem("checkLocation");
			var plang = location.pathname.split('/')[1];
            if(check === "Done" && plang === "vi"){
				sessionStorage.setItem("checkLocation", "jp");
	  			var lang = "vi";
                var plang = location.pathname.split('/')[1];
                location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname.replace('/' + plang + '/', '/') + location.search;
            } else if(check === "Done" && plang === "en"){
				sessionStorage.setItem("checkLocation", "jp");
				var lang = "en";
                var plang = location.pathname.split('/')[1];
                location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname.replace('/' + plang + '/', '/') + location.search;
            } else if(check === "Done" && plang != "vi" && plang != "en"){
                sessionStorage.setItem("checkLocation", "jp");
			}
        </script>
EOM;
	elseif($country == "VN"):
	echo <<<EOM
        <script>
            var check = sessionStorage.getItem("checkLocation");
			var plang = location.pathname.split('/')[1];
            if(check === "Done" && plang === "en"){
				sessionStorage.setItem("checkLocation", "vi");
                var lang = "en";
                var plang = location.pathname.split('/')[1];
                location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname.replace('/' + plang + '/', '/') + location.search;
            } else if(check === "Done" && plang === ""){
				sessionStorage.setItem("checkLocation", "vi");
				var lang = "vi";
                var plang = location.pathname.split('/')[1];
                location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname.replace('/' + plang + '/', '/') + location.search;
			} else if(check === "Done" && plang != "" && plang != "en"){
				sessionStorage.setItem("checkLocation", "vi");
				var lang = "vi";
                var plang = location.pathname.split('/')[1];
                location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname.replace('/' + plang + '/', '/') + location.search;
			} else if(check === "Done" && plang != "vi" && plang != "en" && plang != ""){
				sessionStorage.setItem("checkLocation", "vi");
			}
        </script>
EOM;
	else:
	echo <<<EOM
        <script>
			var check = sessionStorage.getItem("checkLocation");
			var plang = location.pathname.split('/')[1];
			if(check === "Done" && plang === "vi"){
				sessionStorage.setItem("checkLocation", "en");
                var lang = "vi";
                var plang = location.pathname.split('/')[1];
                location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname.replace('/' + plang + '/', '/') + location.search;
            } else if(check === "Done" && plang === ""){
				sessionStorage.setItem("checkLocation", "en");
				var lang = "en";
                var plang = location.pathname.split('/')[1];
                location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname.replace('/' + plang + '/', '/') + location.search;
			} else if(check === "Done" && plang != "" && plang != "vi"){
				sessionStorage.setItem("checkLocation", "vi");
				var lang = "vi";
                var plang = location.pathname.split('/')[1];
                location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname.replace('/' + plang + '/', '/') + location.search;
			} else if(check === "Done" && plang != "vi" && plang != "en" && plang != ""){
				sessionStorage.setItem("checkLocation", "en");
			}
        </script>
EOM;
	endif;

	endif;
	?>


	<body <?php body_class(); ?>>
		<div class="outer page" data-scroll-container>
			<header id="header-menu" class="header-menu">
				<div class="header-nav">
					<div class="header-logo">
						<a class="link-logo" href="<?php echo home_url(); ?>">
							<picture class="logo-pc">
								<source srcset="<?php bloginfo('template_directory'); ?>/images/scv_logo_header.svg">
								<img class="sizes" src="<?php bloginfo('template_directory'); ?>/images/scv_logo_header.svg" alt="<?php bloginfo('name'); ?>">
							</picture>
							<picture class="logo-sp">
								<source srcset="<?php bloginfo('template_directory'); ?>/images/scv_logo_footer.svg">
								<img class="sizes" src="<?php bloginfo('template_directory'); ?>/images/scv_logo_footer.svg" alt="<?php bloginfo('name'); ?>">
							</picture>
						</a>
					</div><!-- .header-logo -->
					<div class="right-header header-megamenu <?php if ($current_language != "ja") { echo "en";}?>">
						<?php wp_nav_menu(
                            array(
                                'menu_class'      => 'navMenu',
                                'menu_id'         => 'navList-menu',
                                'container'       => 'div',
                                'container_id'    => 'nav-container'
                            )
                        ); ?>
						<div class="action-container">
							<div class="language-site">
                                <div class="label-click">
                                    <label class="title-language en" for="language">Language</label>
                                    <select class="en" id="language" name="language" onchange="doGTranslate(this);">
                                        <option value="ja|ja" <?php if($current_language == "ja"){echo "selected";} ?>>JA</option>
                                        <option value="ja|vi" <?php if($current_language == "vi"){echo "selected";} ?>>VI</option>
                                        <option value="ja|en" <?php if($current_language == "en"){echo "selected";} ?>>EN</option>
                                    </select>
                                </div>
								<div class="list-language en">
									<label class="item-language">
										<input type="radio" name="language" <?php if($current_language == "ja"){echo "checked";} ?> onchange="doGTranslate(this);" value="ja|ja" placeholder="JA">
										<span class="name-language en">JA</span>
									</label>
									<label class="item-language">
										<input type="radio" name="language" <?php if($current_language == "vi"){echo "checked";} ?> onchange="doGTranslate(this);" value="ja|vi" placeholder="VI">
										<span class="name-language en">VI</span>
									</label>
									<label class="item-language">
										<input type="radio" name="language" <?php if($current_language == "en"){echo "checked";} ?> onchange="doGTranslate(this);" value="ja|en" placeholder="EN">
										<span class="name-language en">EN</span>
									</label>
								</div>
							</div>
							<div class="contact-action">
								<a class="contact-btn <?php if ($current_language != "ja") { echo "en";}?>" href="<?php echo home_url(); ?>/contact/"><?php echo $var['btn_contact']; ?></a>
							</div>
							<script type="text/javascript">
								function doGTranslate(lang_pair) {
									if(lang_pair.value)lang_pair=lang_pair.value;
									if(lang_pair=='')
										return;
									var lang=lang_pair.split('|')[1];
									var plang=location.pathname.split('/')[1];
                                    if(plang != "" && plang != "en" && plang != "vi"){
                                        location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname;
                                    } else if(lang == "ja" && (plang == "en" || plang == "vi")){
                                        location.href = location.protocol + '//' + location.host + '/' + location.pathname.replace('/' + plang + '/', '/') + location.search;
                                    } else{
                                        location.href = location.protocol + '//' + location.host + '/' + lang + location.pathname.replace('/' + plang + '/', '/') + location.search;
                                    }
								}
							</script>
						</div>
					</div>
					<div class="btn-openMenu">
						<div class="toggle-btn">
							<span></span>
						</div>
					</div>

				</div><!-- .header-nav -->
			</header><!-- #header-menu -->
			<!--    <canvas class="bg_canvas" data-engine="three.js r145" width="2048" height="570"></canvas>-->
			<div>
				<main role="main">