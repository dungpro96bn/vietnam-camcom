<?php
/**
 * News archive — VCC redesign.
 * Chrome strings (title/eyebrow/lead/empty) come from languageString() (vi/en/ja).
 * News posts themselves are translated per WPML (each language = own post).
 */
get_header();
global $sitepress;
$var = languageString();
$current_language = $sitepress->get_current_language();
$cat_label = isset($var['cat_news']) ? $var['cat_news'] : 'Tin tức';
?>

<style>
/* ---- news archive (VCC) ---- */
#news-archive .arc-list { display: flex; flex-direction: column; gap: 0; border-top: 1px solid var(--line); }
#news-archive .news-pagi { margin-top: 48px; }
#news-archive .wp-pagenavi { display: flex; flex-wrap: wrap; gap: 8px; justify-content: center; align-items: center; }
#news-archive .wp-pagenavi a,
#news-archive .wp-pagenavi span {
  display: inline-grid; place-items: center; min-width: 42px; height: 42px; padding: 0 12px;
  border: 1px solid var(--line); border-radius: 11px; background: #fff;
  font-family: var(--f-mono); font-size: 14px; color: var(--body); text-decoration: none;
  transition: background .2s, color .2s, border-color .2s;
}
#news-archive .wp-pagenavi a:hover { border-color: var(--blue); color: var(--blue); }
#news-archive .wp-pagenavi span.current { background: var(--blue); border-color: var(--blue); color: #fff; }
#news-archive .news-none { padding: 40px 0; color: var(--muted); }
@media (max-width: 640px) { #news-archive .wp-pagenavi a, #news-archive .wp-pagenavi span { min-width: 38px; height: 38px; } }
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
					<span class="here"><?php echo esc_html($var['news_title']); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html($var['news_eyebrow']); ?></span>
				<h1><?php echo esc_html($var['news_title']); ?></h1>
				<p class="lead"><?php echo esc_html($var['news_lead']); ?></p>
			</div>
		</div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#ffffff" d="M0,48 C240,90 480,90 720,60 C960,30 1200,10 1440,40 L1440,90 L0,90 Z"></path></svg>
	</div>
</section>

<!-- ================= NEWS LIST ================= -->
<section id="news-archive">
	<div class="container">
		<?php
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$result = new WP_Query(array(
			'post_type'      => 'news',
			'post_status'    => 'publish',
			'order'          => 'DESC',
			'paged'          => $paged,
			'posts_per_page' => 10,
		));
		if ($result->have_posts()) : ?>
			<div class="news-list arc-list">
				<?php while ($result->have_posts()) : $result->the_post(); ?>
				<a href="<?php the_permalink(); ?>" class="news-item reveal">
					<span class="date"><?php echo get_the_date('Y.m.d'); ?></span><span class="cat"><?php echo esc_html($cat_label); ?></span>
					<span class="nt"><?php the_title(); ?></span>
					<span class="narr">&rarr;</span>
				</a>
				<?php endwhile; ?>
			</div>
			<?php if ($result->max_num_pages > 1 && function_exists('wp_pagenavi')) : ?>
				<div class="news-pagi"><?php wp_pagenavi(array('query' => $result)); ?></div>
			<?php endif; ?>
		<?php else : ?>
			<p class="news-none"><?php echo esc_html($var['news_empty']); ?></p>
		<?php endif;
		wp_reset_postdata(); ?>
	</div>
</section>

<?php get_footer(); ?>
