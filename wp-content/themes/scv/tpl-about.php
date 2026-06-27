<?php
/**
 * Template Name: VCC — Về chúng tôi
 *
 * Structure ported from /vcc/page/about.html. Editable text comes from ACF
 * (group_vcc_about) with Vietnamese fallbacks; WPML translates each field per
 * language post. Assign this template to the "Về chúng tôi" page (and its
 * EN/JA translations) via Page Attributes → Template.
 */
get_header();
$contact = home_url('/contact/');
?>

<!-- ================= PAGE HEADER ================= -->
<section class="page-head">
	<div class="hgrid" aria-hidden="true"></div>
	<div class="hglow" aria-hidden="true"></div>
	<div class="hglow two" aria-hidden="true"></div>
	<div class="container">
		<div class="ph-inner">
			<div class="ph-text reveal in">
				<nav class="crumb" aria-label="Breadcrumb">
					<a href="<?php echo home_url('/'); ?>"><?php echo esc_html(vcc_field('crumb_home', 'Trang chủ')); ?></a>
					<span class="sep">/</span>
					<span class="here"><?php echo esc_html(vcc_field('crumb_here', 'Về chúng tôi')); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html(vcc_field('ph_eye', 'Why VIETNAM CAMCOM')); ?></span>
				<h1><?php echo nl2br(esc_html(vcc_field('ph_title', "Về\nVIETNAM CAMCOM"))); ?></h1>
				<p class="lead"><?php echo esc_html(vcc_field('ph_lead', 'Kết nối nhu cầu nhân lực của doanh nghiệp Nhật Bản với khát vọng phát triển chuyên môn của nguồn nhân lực Việt Nam — tạo nên vòng tuần hoàn nhân lực bền vững giữa hai quốc gia.')); ?></p>
				<div class="hero-cta">
					<a href="#our-strengths" class="btn btn-light"><?php echo esc_html(vcc_field('ph_cta1', 'Thế mạnh của chúng tôi')); ?> <span class="arr">&rarr;</span></a>
					<a href="#direction" class="btn btn-outline-light"><?php echo esc_html(vcc_field('ph_cta2', 'Giá trị & Tầm nhìn')); ?></a>
				</div>
			</div>
			<div class="ph-media reveal in d1">
				<div class="frame">
					<img src="/wp-content/uploads/scv_home_img01_pc.png" alt="VIETNAM CAMCOM" loading="eager" />
				</div>
				<div class="float-badge">
					<span class="fb-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="8" width="18" height="13" rx="2"/><path d="M8 8V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v3"/><path d="M3 13h18"/></svg></span>
					<div><b><?php echo esc_html(vcc_field('fb_value', '2019')); ?></b><span><?php echo esc_html(vcc_field('fb_label', 'Thành lập tại Việt Nam')); ?></span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#ffffff" d="M0,48 C240,90 480,90 720,60 C960,30 1200,10 1440,40 L1440,90 L0,90 Z"></path></svg>
	</div>
</section>

<!-- ================= SECTION TABS ================= -->
<div class="svc-tabs">
	<div class="container">
		<a href="#our-strengths" class="tab active"><span class="tn">01</span> <?php echo esc_html(vcc_field('tab1', 'Thế mạnh của chúng tôi')); ?></a>
		<a href="#direction" class="tab"><span class="tn">02</span> <?php echo esc_html(vcc_field('tab2', 'Giá trị · Sứ mệnh · Tầm nhìn · Mục đích')); ?></a>
	</div>
</div>

<!-- ================= MISSION INTRO ================= -->
<section>
	<div class="container">
		<div class="hr-intro">
			<div class="reveal">
				<span class="eyebrow"><?php echo esc_html(vcc_field('mi_eyebrow', 'Về VIETNAM CAMCOM')); ?></span>
				<h2><?php echo esc_html(vcc_field('mi_title', 'Kết nối nhu cầu Nhật Bản với khát vọng Việt Nam')); ?></h2>
				<p><?php echo vcc_field('mi_text1', 'Công ty thành lập vào <strong>tháng 9 năm 2019</strong>. Sứ mệnh của chúng tôi là kết nối nhu cầu nhân lực nước ngoài của doanh nghiệp Nhật Bản với nhu cầu phát triển chuyên môn của nguồn nhân lực Việt Nam.'); ?></p>
				<p><?php echo esc_html(vcc_field('mi_text2', 'Bằng cách tạo ra vòng tuần hoàn cung ứng nguồn nhân lực Việt Nam và Nhật Bản, chúng tôi mong muốn tạo ra công việc tốt cho người lao động từ Nhật Bản trở về Việt Nam, để họ có thể tiếp tục phát triển sự nghiệp lâu dài.')); ?></p>
			</div>
			<?php
			$figs = vcc_list('figures', array('value', 'suffix', 'label', 'coral'), array(
				array('value' => '2019', 'suffix' => '',  'label' => 'Năm thành lập tại Việt Nam',           'coral' => false),
				array('value' => '33',   'suffix' => '+', 'label' => 'Năm kinh nghiệm nhân sự Nhật Bản',      'coral' => true),
				array('value' => '2',    'suffix' => '',  'label' => 'Quốc gia trong vòng tuần hoàn nhân lực', 'coral' => false),
				array('value' => '5',    'suffix' => '',  'label' => 'Lĩnh vực dịch vụ trọng tâm',            'coral' => false),
			));
			?>
			<div class="hr-figures reveal d1">
				<?php foreach ($figs as $f) :
					$is_num = is_numeric($f['value']); ?>
				<div class="hr-fig<?php echo !empty($f['coral']) ? ' coral' : ''; ?>">
					<div class="fv"><?php if ($is_num) : ?><span <?php echo $f['suffix'] ? ' data-suffix="' . esc_attr($f['suffix']) . '"' : ''; ?>><?php echo esc_html($f['value'] . $f['suffix']); ?></span><?php else : ?><span class="u"><?php echo esc_html($f['value']); ?></span><?php endif; ?></div>
					<div class="fl"><?php echo esc_html($f['label']); ?></div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<!-- ================= STRENGTHS ================= -->
<section class="strip">
	<span id="our-strengths" class="anchor"></span>
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('str_eyebrow', 'Our Strengths')); ?></span>
			<h2><?php echo esc_html(vcc_field('str_title', 'Thế mạnh của chúng tôi')); ?></h2>
			<p class="lead"><?php echo esc_html(vcc_field('str_lead', 'Bí quyết của một công ty nhân sự Nhật Bản dày dạn, kết hợp công nghệ hiện đại và mạng lưới đào tạo trong nước.')); ?></p>
		</div>
		<?php
		$str_imgs = array('about_icon01_pc.png', 'about_icon02_pc.png', 'about_icon03_pc.png');
		$strengths = vcc_list('strengths', array('title', 'text'), array(
			array('title' => 'Công ty tuyển dụng Nhật Bản', 'text' => 'Thuộc nhóm công ty nhân sự Nhật Bản hoạt động kinh doanh hơn 33 năm. Chúng tôi cung cấp dịch vụ với bí quyết chuyên môn và công nghệ mới nhất.'),
			array('title' => 'Hiệu suất & độ chính xác cao', 'text' => 'Bí quyết chuẩn hóa cùng công nghệ tổng hợp dữ liệu hàng loạt phát triển tại Nhật Bản mang lại tốc độ và chất lượng vượt trội so với các đơn vị khác.'),
			array('title' => 'Hợp tác với đại học trong nước', 'text' => 'Xây dựng mối quan hệ với các trường đại học trong nước để giới thiệu thực tập sinh và sinh viên mới ra trường đến các doanh nghiệp Nhật Bản.'),
		));
		?>
		<div class="strengths">
			<?php foreach ($strengths as $i => $s) : ?>
			<article class="str-card reveal<?php echo $i ? ' d' . $i : ''; ?>">
				<span class="num"><?php echo sprintf('%02d', $i + 1); ?></span>
				<div class="ic img"><img src="/wp-content/uploads/<?php echo $str_imgs[$i % count($str_imgs)]; ?>" alt="" loading="lazy" /></div>
				<h3><?php echo esc_html($s['title']); ?></h3>
				<p><?php echo esc_html($s['text']); ?></p>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= DIRECTION (VALUE/MISSION/VISION/PURPOSE) ================= -->
<section class="philo">
	<span id="direction" class="anchor"></span>
	<div class="container">
		<div class="motto reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('philo_eyebrow', 'Value · Mission · Vision · Purpose')); ?></span>
			<div class="big"><?php echo vcc_field('philo_big', 'Phát triển con người. Sáng tạo nên <span class="accent">"công việc có giá trị"</span> và một xã hội tràn đầy sức sống.'); ?></div>
		</div>
		<?php
		$values = vcc_list('values', array('title', 'text'), array(
			array('title' => 'Đạt được mục tiêu — Challenge', 'text' => 'Nơi tìm hiểu con đường dẫn đến thành công và phát triển cá nhân.'),
			array('title' => 'Cảm ơn & tôn trọng — Thanks & Respect', 'text' => 'Biết ơn và tôn trọng mọi người xung quanh cùng môi trường phát triển.'),
			array('title' => 'Hướng tới tiện lợi — Accessibility', 'text' => 'Tạo ra hệ thống giúp nguồn nhân lực chủ động hơn với ý tưởng và công nghệ.'),
		));
		?>
		<div class="values-row reveal">
			<?php foreach ($values as $i => $v) : ?>
			<div class="vr"><span class="vn"><?php echo $i + 1; ?></span><div><b><?php echo esc_html($v['title']); ?></b><span><?php echo esc_html($v['text']); ?></span></div></div>
			<?php endforeach; ?>
		</div>
		<?php
		$vmvp = vcc_list('vmvp', array('key', 'title', 'text'), array(
			array('key' => 'Value', 'title' => 'Giá trị', 'text' => 'Phương châm hành động: Phát triển con người — sáng tạo nên "công việc có giá trị".'),
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
		<div class="dir-purpose reveal">
			<div class="vcard">
				<div class="vk"><?php echo esc_html(vcc_field('dir_purpose_kicker', 'Purpose · Chi tiết')); ?></div>
				<h3><?php echo esc_html(vcc_field('dir_purpose_title', 'Một xã hội tràn đầy sức sống')); ?></h3>
				<p><?php echo esc_html(vcc_field('dir_purpose_text', 'Phát triển con người, sáng tạo nên "công việc có giá trị" và tạo ra một xã hội tràn đầy sức sống. Chúng tôi cung cấp cho người lao động những ý tưởng và công nghệ, phát triển con người bằng cách bổ sung các năng lực mới — để nhiều người cảm thấy niềm vui khi làm công việc có giá trị, và để ngày càng nhiều doanh nghiệp tạo ra những "công việc có giá trị".')); ?></p>
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
			<p><?php echo esc_html(vcc_field('cta_text', 'Nếu bạn muốn biết thêm thông tin về VIETNAM CAMCOM, hãy liên hệ với chúng tôi — đội ngũ của chúng tôi sẽ phản hồi trong thời gian sớm nhất.')); ?></p>
			<div class="cta-btns">
				<a href="<?php echo $contact; ?>" class="btn btn-light"><?php echo esc_html(vcc_field('cta_btn1', 'Gửi yêu cầu liên hệ')); ?> <span class="arr">&rarr;</span></a>
				<a href="<?php echo home_url('/#services'); ?>" class="btn btn-outline-light"><?php echo esc_html(vcc_field('cta_btn2', 'Xem các dịch vụ')); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
