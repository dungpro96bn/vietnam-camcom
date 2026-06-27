<?php
/**
 * Single news article — VCC redesign.
 * Chrome strings come from languageString() (vi/en/ja); article body is WPML-translated.
 */
get_header();
global $post, $sitepress;
$var = languageString();
$current_language = $sitepress->get_current_language();
$cat_label = isset($var['cat_news']) ? $var['cat_news'] : 'Tin tức';
?>

<style>
/* ---- single news (VCC) ---- */
.page-head .doc-meta { display: flex; align-items: center; gap: 12px; margin-top: 22px; font-family: var(--f-mono); font-size: 13px; color: #c2d2f5; }
.page-head .doc-meta .cat { background: rgba(255,255,255,.14); color: #fff; padding: 3px 12px; border-radius: 999px; letter-spacing: .04em; }

#news-single .news-prose { max-width: 800px; margin: 0 auto; color: var(--body); font-size: 17px; line-height: 1.8; }
#news-single .news-prose > *:first-child { margin-top: 0; }
#news-single .news-prose p { margin: 0 0 22px; }
#news-single .news-prose h2 { font-size: clamp(22px,2.4vw,28px); font-weight: 800; color: var(--ink); letter-spacing: -.02em; margin: 44px 0 16px; }
#news-single .news-prose h3 { font-size: clamp(19px,2vw,22px); font-weight: 700; color: var(--ink); margin: 34px 0 14px; }
#news-single .news-prose ul, #news-single .news-prose ol { margin: 0 0 22px; padding-left: 24px; }
#news-single .news-prose li { margin: 0 0 8px; }
#news-single .news-prose a { color: var(--blue); text-decoration: underline; text-underline-offset: 2px; }
#news-single .news-prose img { border-radius: var(--radius); margin: 14px 0; }
#news-single .news-prose blockquote { margin: 24px 0; padding: 16px 22px; border-left: 3px solid var(--blue); background: var(--bg-soft); border-radius: 0 12px 12px 0; color: var(--muted); }
#news-single .news-prose table { width: 100%; border-collapse: collapse; margin: 24px 0; }
#news-single .news-prose th, #news-single .news-prose td { border: 1px solid var(--line); padding: 10px 14px; text-align: left; }
#news-single .news-back { max-width: 800px; margin: 48px auto 0; display: flex; }
</style>

<!-- ================= PAGE HEADER ================= -->
<section class="page-head">
	<div class="hgrid" aria-hidden="true"></div>
	<div class="hglow" aria-hidden="true"></div>
	<div class="hglow two" aria-hidden="true"></div>
	<div class="container">
		<div class="ph-inner" style="display:block;">
			<div class="ph-text reveal in">
				<nav class="crumb" aria-label="Breadcrumb">
					<a href="<?php echo home_url('/'); ?>"><?php echo esc_html($var['nav_home']); ?></a>
					<span class="sep">/</span>
					<a href="<?php echo home_url('/news/'); ?>"><?php echo esc_html($var['news_title']); ?></a>
					<span class="sep">/</span>
					<span class="here"><?php echo esc_html(get_the_title()); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html($var['news_eyebrow']); ?></span>
				<h1><?php the_title(); ?></h1>
				<div class="doc-meta">
					<span class="cat"><?php echo esc_html($cat_label); ?></span>
					<span class="dot"></span>
					<span><?php echo esc_html(get_the_date('Y.m.d')); ?></span>
				</div>
			</div>
		</div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#ffffff" d="M0,48 C240,90 480,90 720,60 C960,30 1200,10 1440,40 L1440,90 L0,90 Z"></path></svg>
	</div>
</section>

<!-- ================= ARTICLE ================= -->
<section id="news-single">
	<div class="container">
		<article class="news-prose reveal in">
			<?php
			if (have_posts()) : while (have_posts()) : the_post();
				the_content();
			endwhile; endif;
			?>
		</article>
		<div class="news-back">
			<a href="<?php echo home_url('/news/'); ?>" class="btn btn-ghost"><span class="arr">&larr;</span> <?php echo esc_html($var['news_back']); ?></a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
