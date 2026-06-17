<?php
/**
 * Front page (homepage) — VCC redesign.
 * Structure ported from /vcc/page/homepage.html.
 * Text comes from ACF (group_vcc_home) with Vietnamese fallbacks, so WPML can
 * translate each field independently for JA / EN.
 */
get_header();

$var = function_exists('languageString') ? languageString() : array();
$contact = home_url('/contact/');
?>

<!-- ================= HERO ================= -->
<section class="hero">
	<div class="hgrid" aria-hidden="true"></div>
	<div class="hglow" aria-hidden="true"></div>
	<div class="hglow two" aria-hidden="true"></div>
	<div class="container hero-inner">
		<div class="hero-text reveal in">
			<span class="hero-pill"><span class="tag"><?php echo esc_html(vcc_field('hero_tag', 'CAMCOM GROUP')); ?></span> <?php echo esc_html(vcc_field('hero_pill', 'Kết nối nhân lực Việt Nam & Nhật Bản')); ?></span>
			<h1><?php echo vcc_field('hero_title', 'Phát triển con người,<br />sáng tạo nên<br /><span class="accent">"công việc có giá trị"</span>'); ?></h1>
			<p class="lead"><?php echo vcc_field('hero_lead', 'VIETNAM CAMCOM hỗ trợ nguồn nhân lực Việt Nam làm việc tại Nhật Bản tiếp tục phát triển sự nghiệp sau khi về nước — tạo nên vòng tuần hoàn nhân lực bền vững giữa hai quốc gia.'); ?></p>
			<div class="hero-cta">
				<a href="#services" class="btn btn-light"><?php echo esc_html(vcc_field('hero_cta1', 'Khám phá dịch vụ')); ?> <span class="arr">&rarr;</span></a>
				<a href="<?php echo $contact; ?>" class="btn btn-outline-light"><?php echo esc_html(vcc_field('hero_cta2', 'Liên hệ với chúng tôi')); ?></a>
			</div>
			<div class="hero-meta">
				<div class="hm"><b>2019</b><span><?php echo esc_html($var['home_hm1']); ?></span></div>
				<div class="div"></div>
				<div class="hm"><b data-count="33" data-suffix="+">33+</b><span><?php echo esc_html($var['home_hm2']); ?></span></div>
				<div class="div"></div>
				<div class="hm"><b>05</b><span><?php echo esc_html($var['home_hm3']); ?></span></div>
			</div>
		</div>
		<div class="hero-visual reveal in d1">
			<div class="circle-wrap">
				<div class="orbit o1"></div>
				<div class="orbit o2"></div>
				<div class="orbit o3"></div>
				<div class="core">
					<div class="clab"><?php echo esc_html($var['home_circle_lab']); ?></div>
					<div class="cbig"><?php echo $var['home_circle_big']; ?></div>
				</div>
				<div class="node jp"><span class="flag">🇯🇵</span> <?php echo esc_html($var['home_node_jp']); ?></div>
				<div class="node vn"><span class="flag">🇻🇳</span> <?php echo esc_html($var['home_node_vn']); ?></div>
			</div>
		</div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#f4f6fb" d="M0,48 C240,90 480,90 720,60 C960,30 1200,10 1440,40 L1440,90 L0,90 Z"></path></svg>
	</div>
</section>

<!-- ================= STRENGTHS ================= -->
<section class="strip" id="strengths">
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('str_eyebrow', 'Why VIETNAM CAMCOM')); ?></span>
			<h2><?php echo esc_html(vcc_field('str_title', 'Thế mạnh của chúng tôi')); ?></h2>
			<p class="lead"><?php echo esc_html(vcc_field('str_lead', 'Bí quyết của một công ty nhân sự Nhật Bản dày dạn, kết hợp công nghệ hiện đại và mạng lưới đào tạo trong nước.')); ?></p>
		</div>
		<?php
		$str_icons = array(
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M3 21h18M6 21V8l6-4 6 4v13"/><path d="M10 21v-5h4v5"/><path d="M9 11h.01M15 11h.01"/></svg>',
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M13 2 3 14h7l-1 8 10-12h-7l1-8z"/></svg>',
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M22 10 12 5 2 10l10 5 10-5z"/><path d="M6 12v5c3 2 9 2 12 0v-5"/></svg>',
		);
		$strengths = vcc_list('strengths', array('title', 'text'), array(
			array('title' => 'Công ty tuyển dụng Nhật Bản', 'text' => 'Thuộc nhóm công ty nhân sự Nhật Bản với hơn 33 năm hoạt động. Chúng tôi cung cấp dịch vụ bằng bí quyết chuyên môn và công nghệ mới nhất.'),
			array('title' => 'Hiệu suất & độ chính xác cao', 'text' => 'Công nghệ chuẩn hóa và tổng hợp dữ liệu hàng loạt phát triển tại Nhật Bản mang lại tốc độ và chất lượng vượt trội so với các đơn vị khác.'),
			array('title' => 'Hợp tác với đại học trong nước', 'text' => 'Xây dựng mối quan hệ với các trường đại học Việt Nam để giới thiệu thực tập sinh và sinh viên mới ra trường đến doanh nghiệp Nhật Bản.'),
		));
		?>
		<div class="strengths">
			<?php foreach ($strengths as $i => $s) : ?>
			<article class="str-card reveal<?php echo $i ? ' d' . $i : ''; ?>">
				<span class="num">0<?php echo $i + 1; ?></span>
				<div class="ic"><?php echo isset($str_icons[$i]) ? $str_icons[$i] : $str_icons[0]; ?></div>
				<h3><?php echo esc_html($s['title']); ?></h3>
				<p><?php echo esc_html($s['text']); ?></p>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= ABOUT ================= -->
<section id="about">
	<div class="container">
		<div class="about">
			<div class="about-media reveal">
				<div class="ph"><img style="width: 100%; height: auto" src="/wp-content/uploads/home_service_banner_pc.png" alt=""></div>
				<div class="badge">
					<span class="b-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2 4 7v6c0 5 3.5 8 8 9 4.5-1 8-4 8-9V7l-8-5z"/><path d="m9 12 2 2 4-4"/></svg></span>
					<div><b>ISO 27001</b><span><?php echo esc_html($var['home_iso_sub']); ?></span></div>
				</div>
			</div>
			<div class="about-copy reveal d1">
				<span class="eyebrow"><?php echo esc_html(vcc_field('about_eyebrow', 'Về VIETNAM CAMCOM')); ?></span>
				<h2><?php echo esc_html(vcc_field('about_title', 'Kết nối nhu cầu Nhật Bản với khát vọng Việt Nam')); ?></h2>
				<p><?php echo esc_html(vcc_field('about_text', 'Công ty thành lập vào tháng 9 năm 2019. Sứ mệnh của chúng tôi là kết nối nhu cầu nhân lực nước ngoài của doanh nghiệp Nhật Bản với nhu cầu phát triển chuyên môn của nguồn nhân lực Việt Nam.')); ?></p>
				<?php
				$about_list = vcc_list('about_list', array('item'), array(
					array('item' => 'Tạo vòng tuần hoàn cung ứng nhân lực Việt – Nhật bền vững'),
					array('item' => 'Tạo "công việc có giá trị" cho người lao động về nước'),
					array('item' => 'Đồng hành cùng sự phát triển sự nghiệp dài hạn'),
				));
				?>
				<ul class="about-list">
					<?php foreach ($about_list as $li) : ?>
					<li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6 9 17l-5-5"/></svg></span><?php echo esc_html($li['item']); ?></li>
					<?php endforeach; ?>
				</ul>
				<a href="<?php echo home_url('/about/'); ?>" class="btn btn-primary"><?php echo esc_html(vcc_field('about_btn', 'Xem thêm về chúng tôi')); ?> <span class="arr">&rarr;</span></a>
			</div>
		</div>
	</div>
</section>

<!-- ================= SERVICES ================= -->
<section id="services" style="background:var(--bg-soft);border-block:1px solid var(--line);">
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('svc_eyebrow', 'Dịch vụ')); ?></span>
			<h2><?php echo esc_html(vcc_field('svc_title', 'Năm lĩnh vực, một mục tiêu')); ?></h2>
			<p class="lead"><?php echo esc_html(vcc_field('svc_lead', 'Giải pháp toàn diện cho doanh nghiệp Nhật Bản và Việt Nam — từ nhân lực, vận hành đến công nghệ và mở rộng thị trường.')); ?></p>
		</div>
		<?php
		$svc_icons = array(
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8"/></svg>',
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>',
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="m18 16 4-4-4-4M6 8l-4 4 4 4M14.5 4l-5 16"/></svg>',
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/><path d="M9 9h.01M9 13h.01M9 17h.01"/></svg>',
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M9 11l3 3 8-8"/><path d="M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h9"/></svg>',
		);
		$svc_urls = array(home_url('/hr/'), home_url('/bpo/'), home_url('/web/'), home_url('/fdi-support/'), home_url('/labor-management/'));
		$services = vcc_list('services', array('title', 'text', 'url'), array(
			array('title' => 'Giới thiệu nguồn nhân lực', 'text' => 'Kết nối kỹ sư, thực tập sinh và nhân sự Việt Nam với doanh nghiệp Nhật Bản, đảm bảo phù hợp cả về chuyên môn lẫn văn hóa.', 'url' => ''),
			array('title' => 'Dịch vụ BPO', 'text' => 'Thuê ngoài quy trình nghiệp vụ với công nghệ chuẩn hóa và tổng hợp dữ liệu hàng loạt — tốc độ cao, độ chính xác vượt trội.', 'url' => ''),
			array('title' => 'Phát triển WEB & nội dung', 'text' => 'Thiết kế, phát triển website và sáng tạo nội dung số chuyên nghiệp cho thương hiệu của bạn ở cả hai thị trường.', 'url' => ''),
			array('title' => 'Hỗ trợ mở rộng thị trường VN', 'text' => 'Đồng hành cùng doanh nghiệp Nhật Bản đầu tư (FDI) và mở rộng kinh doanh tại Việt Nam, từ thủ tục đến vận hành.', 'url' => ''),
			array('title' => 'Hỗ trợ quản lý lao động', 'text' => 'Tư vấn và hỗ trợ doanh nghiệp quản lý lao động đúng quy định, tối ưu năng suất và xây dựng môi trường làm việc bền vững.', 'url' => ''),
		));
		?>
		<div class="svc-grid">
			<?php foreach ($services as $i => $sv) :
				$url = !empty($sv['url']) ? $sv['url'] : (isset($svc_urls[$i]) ? $svc_urls[$i] : $contact);
				$delay = $i % 3; ?>
			<a href="<?php echo esc_url($url); ?>" class="svc reveal<?php echo $delay ? ' d' . $delay : ''; ?>">
				<div class="snum">0<?php echo $i + 1; ?></div>
				<div class="sic"><?php echo isset($svc_icons[$i]) ? $svc_icons[$i] : $svc_icons[0]; ?></div>
				<h3><?php echo esc_html($sv['title']); ?></h3>
				<p><?php echo esc_html($sv['text']); ?></p>
				<span class="more"><?php echo esc_html($var['view_more']); ?> <span class="arr">&rarr;</span></span>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= PHILOSOPHY ================= -->
<section class="philo">
	<div class="bg-field-dark" aria-hidden="true"></div>
	<div class="container">
		<div class="motto reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('philo_eyebrow', 'Value · Mission · Vision · Purpose')); ?></span>
			<div class="big"><?php echo vcc_field('philo_big', 'Phát triển con người. Sáng tạo nên <span class="accent">"công việc có giá trị"</span> và một xã hội tràn đầy sức sống.'); ?></div>
		</div>
		<?php
		$values = vcc_list('values', array('title', 'text'), array(
			array('title' => 'Đạt được mục tiêu — Challenge', 'text' => 'Nơi tìm hiểu con đường dẫn đến thành công và phát triển cá nhân.'),
			array('title' => 'Cảm ơn & tôn trọng — Thanks & Respect', 'text' => 'Biết ơn và tôn trọng mọi người xung quanh cùng môi trường phát triển.'),
			array('title' => 'Hướng tới tiện lợi — Accessibility', 'text' => 'Tạo hệ thống giúp nguồn nhân lực chủ động hơn với ý tưởng và công nghệ.'),
		));
		?>
		<div class="values-row reveal">
			<?php foreach ($values as $i => $v) : ?>
			<div class="vr"><span class="vn"><?php echo $i + 1; ?></span><div><b><?php echo esc_html($v['title']); ?></b><span><?php echo esc_html($v['text']); ?></span></div></div>
			<?php endforeach; ?>
		</div>
		<?php
		$vmvp = vcc_list('vmvp', array('key', 'title', 'text'), array(
			array('key' => 'Value', 'title' => 'Giá trị', 'text' => 'Phát triển con người. Sáng tạo nên "công việc có giá trị" — phương châm dẫn lối mọi hành động.'),
			array('key' => 'Mission', 'title' => 'Sứ mệnh', 'text' => 'Thuận tiện cho cả công ty và người lao động, tập trung vào con người, cải thiện năng suất và tạo cơ hội việc làm.'),
			array('key' => 'Vision', 'title' => 'Tầm nhìn', 'text' => 'Trở thành công ty tạo ra nhiều "công việc có giá trị" nhất.'),
			array('key' => 'Purpose', 'title' => 'Mục đích', 'text' => 'Mang ý tưởng và công nghệ đến người lao động, để niềm vui trong công việc có giá trị lan tỏa khắp xã hội.'),
		));
		?>
		<div class="vmvp reveal" style="margin-top:18px;">
			<?php foreach ($vmvp as $v) : ?>
			<div class="vcard"><div class="vk"><?php echo esc_html($v['key']); ?></div><h3><?php echo esc_html($v['title']); ?></h3><p><?php echo esc_html($v['text']); ?></p></div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= STATS ================= -->
<section class="stats">
	<div class="container">
		<?php
		$stats = vcc_list('stats', array('value', 'suffix', 'label'), array(
			array('value' => '2019', 'suffix' => '', 'label' => 'Năm thành lập tại Việt Nam'),
			array('value' => '33', 'suffix' => '+', 'label' => 'Năm kinh nghiệm nhân sự Nhật Bản'),
			array('value' => '5', 'suffix' => '', 'label' => 'Lĩnh vực dịch vụ trọng tâm'),
			array('value' => '2', 'suffix' => '', 'label' => 'Quốc gia trong vòng tuần hoàn nhân lực'),
		));
		?>
		<div class="stats-grid">
			<?php foreach ($stats as $i => $st) : ?>
			<div class="stat reveal<?php echo $i ? ' d' . $i : ''; ?>">
				<div class="sv"><span data-count="<?php echo esc_attr($st['value']); ?>"<?php echo $st['suffix'] ? ' data-suffix="' . esc_attr($st['suffix']) . '"' : ''; ?>><?php echo esc_html($st['value'] . $st['suffix']); ?></span></div>
				<div class="sl"><?php echo esc_html($st['label']); ?></div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= NEWS ================= -->
<section id="news">
	<div class="container">
		<div class="news-head reveal">
			<div>
				<span class="eyebrow"><?php echo esc_html(vcc_field('news_eyebrow', 'News')); ?></span>
				<h2><?php echo esc_html(vcc_field('news_title', 'Tin tức mới nhất')); ?></h2>
			</div>
			<a href="<?php echo home_url('/news/'); ?>" class="btn btn-ghost"><?php echo esc_html(vcc_field('news_viewall', 'Xem tất cả tin tức')); ?> <span class="arr">&rarr;</span></a>
		</div>
		<?php
		// Pull latest posts from the "news" category/post type; fall back to none.
		$news_q = new WP_Query(array(
			'post_type'      => 'news',
			'posts_per_page' => 5,
			'no_found_rows'  => true,
		));
		$cat_label = isset($var['cat_news']) ? $var['cat_news'] : 'Tin tức';
		?>
		<div class="news-list">
			<?php if ($news_q->have_posts()) : while ($news_q->have_posts()) : $news_q->the_post(); ?>
			<a href="<?php the_permalink(); ?>" class="news-item reveal">
				<span class="date"><?php echo get_the_date('Y.m.d'); ?></span><span class="cat"><?php echo esc_html($cat_label); ?></span>
				<span class="nt"><?php the_title(); ?></span>
				<span class="narr">&rarr;</span>
			</a>
			<?php endwhile; wp_reset_postdata(); else : ?>
			<a href="<?php echo home_url('/news/'); ?>" class="news-item reveal">
				<span class="date"><?php echo date('Y.m.d'); ?></span><span class="cat"><?php echo esc_html($cat_label); ?></span>
				<span class="nt"><?php echo esc_html($var['home_news_empty']); ?></span>
				<span class="narr">&rarr;</span>
			</a>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- ================= GROUP / ISO ================= -->
<section style="background:var(--bg-soft);border-top:1px solid var(--line);">
	<div class="container">
		<div class="section-head reveal" style="margin-bottom:44px;">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('group_eyebrow', 'Group & Chứng nhận')); ?></span>
			<h2><?php echo esc_html(vcc_field('group_title', 'Một phần của CAMCOM GROUP')); ?></h2>
		</div>
		<div class="group-wrap">
			<div class="group-card reveal">
				<div class="hglow" aria-hidden="true"></div>
				<div class="gtag"><?php echo esc_html(vcc_field('group_tag', 'CAMCOM GROUP')); ?></div>
				<h3><?php echo esc_html(vcc_field('group_ctitle', 'Mạng lưới nhân sự & công nghệ toàn cầu')); ?></h3>
				<p><?php echo esc_html(vcc_field('group_ctext', 'Tầng 38, Tòa nhà Trung tâm Shinjuku, 1-25-1 Nishi-Shinjuku, Shinjuku-ku, Tokyo. Cùng tập đoàn, VIETNAM CAMCOM mang tới giải pháp nhân lực và công nghệ chuẩn Nhật Bản cho thị trường Việt Nam.')); ?></p>
				<a href="https://cam-com.inc/" target="_blank" rel="noopener" class="btn btn-light gbtn"><?php echo esc_html(vcc_field('group_btn', 'Tìm hiểu tập đoàn')); ?> <span class="arr">&rarr;</span></a>
			</div>
			<div class="iso-card reveal d1">
				<div class="shield"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 2 4 6v6c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10V6l-8-4z"/><path d="m9 12 2 2 4-4"/></svg></div>
				<b>ISO/IEC 27001:2022</b>
				<span><?php echo esc_html($var['home_iso_cert']); ?></span>
				<span class="no">No. 20201260018841</span>
			</div>
		</div>
	</div>
</section>

<!-- ================= CONTACT CTA ================= -->
<section id="contact">
	<div class="container">
		<div class="cta-wrap reveal">
			<div class="hglow" aria-hidden="true"></div>
			<h2><?php echo esc_html(vcc_field('cta_title', 'Cùng tạo nên "công việc có giá trị"')); ?></h2>
			<p><?php echo esc_html(vcc_field('cta_text', 'Bạn cần tư vấn về nhân lực, BPO, phát triển web hay mở rộng kinh doanh tại Việt Nam? Hãy liên hệ — đội ngũ của chúng tôi sẽ phản hồi sớm nhất.')); ?></p>
			<div class="cta-btns">
				<a href="<?php echo $contact; ?>" class="btn btn-light"><?php echo esc_html(vcc_field('cta_btn1', 'Gửi yêu cầu liên hệ')); ?> <span class="arr">&rarr;</span></a>
				<a href="<?php echo home_url('/recruit/'); ?>" class="btn btn-outline-light"><?php echo esc_html(vcc_field('cta_btn2', 'Cơ hội tuyển dụng')); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
