<?php
/**
 * Template Name: VCC — Giới thiệu nguồn nhân lực
 *
 * Structure ported from /vcc/page/hr.html. Editable text comes from ACF
 * (group_vcc_hr) with Vietnamese fallbacks; WPML translates each field per
 * language post. Uses camcom-hr.css classes (loaded globally in header.php).
 * Assign this template to the HR page (and its EN/JA translations).
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
					<span><?php echo esc_html(vcc_field('crumb_parent', 'Dịch vụ')); ?></span>
					<span class="sep">/</span>
					<span class="here"><?php echo esc_html(vcc_field('crumb_here', 'Giới thiệu nguồn nhân lực')); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html(vcc_field('ph_eye', 'Service 01')); ?></span>
				<h1><?php echo nl2br(esc_html(vcc_field('ph_title', "Giới thiệu\nnguồn nhân lực"))); ?></h1>
				<p class="lead"><?php echo esc_html(vcc_field('ph_lead', 'Với kinh nghiệm nhiều năm trong ngành tuyển dụng, mạng lưới rộng khắp và ứng dụng công nghệ, chúng tôi giới thiệu nguồn nhân lực xuất sắc cho các công ty ở cả Nhật Bản và Việt Nam.')); ?></p>
				<div class="hero-cta">
					<a href="#contact" class="btn btn-light"><?php echo esc_html(vcc_field('ph_cta1', 'Liên hệ tư vấn')); ?> <span class="arr">&rarr;</span></a>
					<a href="#block02" class="btn btn-outline-light"><?php echo esc_html(vcc_field('ph_cta2', 'Trang web tuyển dụng')); ?></a>
				</div>
			</div>
			<div class="ph-media reveal in d1">
				<div class="frame">
					<img src="https://vietnam-camcom.com/wp-content/uploads/hr_mainImg_pc.png" alt="Giới thiệu nguồn nhân lực VIETNAM CAMCOM" loading="eager" />
				</div>
				<div class="float-badge">
					<span class="fb-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/></svg></span>
					<div><b><?php echo esc_html(vcc_field('fb_value', '5.000+')); ?></b><span><?php echo esc_html(vcc_field('fb_label', 'Doanh nghiệp Nhật đã hợp tác')); ?></span></div>
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
		<a href="#block01" class="tab active"><span class="tn">01</span> <?php echo esc_html(vcc_field('tab1', 'Giới thiệu nhân lực')); ?></a>
		<a href="#block02" class="tab"><span class="tn">02</span> <?php echo esc_html(vcc_field('tab2', 'Vận hành trang web tuyển dụng')); ?></a>
	</div>
</div>

<!-- ================= BLOCK 01 — GIỚI THIỆU NHÂN LỰC ================= -->
<section>
	<span id="block01" class="anchor"></span>
	<div class="container">
		<div class="hr-intro">
			<div class="reveal">
				<span class="logo-chip">
					<span class="lc-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.2-8.6"/><path d="M21 4v5h-5"/></svg></span>
					<b><?php echo esc_html(vcc_field('b1_chip', 'Camcom Group')); ?></b>
				</span>
				<h2><?php echo esc_html(vcc_field('b1_title', 'Dành cho các công ty Nhật Bản còn băn khoăn về tuyển dụng nhân lực')); ?></h2>
				<p><?php echo vcc_field('b1_text', 'Tập đoàn Camcom là một công ty cung cấp dịch vụ nhân sự đã phát triển hơn <strong>30 năm</strong>, tự hào với thành tích giao dịch với hơn <strong>5.000 công ty</strong> tại Nhật Bản. Kinh nghiệm, mạng lưới và công nghệ tích lũy ấy chính là nền tảng cho dịch vụ giới thiệu nhân lực của VIETNAM CAMCOM.'); ?></p>
			</div>
			<?php
			$figs = vcc_list('figures', array('value', 'suffix', 'label', 'coral'), array(
				array('value' => '30',   'suffix' => '+', 'label' => 'Năm kinh nghiệm trong ngành nhân sự',     'coral' => false),
				array('value' => '5000', 'suffix' => '+', 'label' => 'Doanh nghiệp Nhật Bản đã giao dịch',      'coral' => true),
				array('value' => '2',    'suffix' => '',  'label' => 'Thị trường kết nối: Việt Nam & Nhật Bản', 'coral' => false),
				array('value' => 'VN',   'suffix' => '',  'label' => 'Mạng lưới đại học & ứng viên trong nước', 'coral' => false),
			));
			?>
			<div class="hr-figures reveal d1">
				<?php foreach ($figs as $f) :
					$is_num = is_numeric($f['value']); ?>
				<div class="hr-fig<?php echo !empty($f['coral']) ? ' coral' : ''; ?>">
					<div class="fv"><?php if ($is_num) : ?><span data-count="<?php echo esc_attr($f['value']); ?>"<?php echo $f['suffix'] ? ' data-suffix="' . esc_attr($f['suffix']) . '"' : ''; ?>><?php echo esc_html($f['value'] . $f['suffix']); ?></span><?php else : ?><span class="u"><?php echo esc_html($f['value']); ?></span><?php endif; ?></div>
					<div class="fl"><?php echo esc_html($f['label']); ?></div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="hr-banner reveal">
			<div class="bg-field-dark" aria-hidden="true"></div>
			<span class="bspark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2 3 14h7l-1 8 10-12h-7l1-8z"/></svg></span>
			<p><?php echo vcc_field('banner', 'Đến với VIETNAM CAMCOM, bạn sẽ tiếp cận được những <span class="accent">nguồn nhân lực xuất sắc</span> có kinh nghiệm thực tế!'); ?></p>
		</div>

		<?php
		$card_imgs = array('technical_training_image01_pc.png', 'technical_training_image02_pc.png');
		$cards = vcc_list('cards', array('tag', 'title', 'text'), array(
			array('tag' => 'Công ty Nhật Bản tại Việt Nam', 'title' => 'Giới thiệu nguồn nhân lực có tay nghề cao', 'text' => 'Chúng tôi đề xuất nhanh chóng nguồn nhân lực thành thạo ngôn ngữ từng du học Nhật Bản, cùng đội ngũ có kinh nghiệm lâu năm trong ngành sản xuất Nhật Bản với kỹ năng đặc định.'),
			array('tag' => 'Dành cho thị trường Nhật Bản', 'title' => 'Giới thiệu nguồn nhân lực trình độ cao', 'text' => 'Kết hợp cùng công ty mẹ Camtech, chúng tôi giới thiệu các sinh viên ưu tú trong khu vực — sẵn sàng cho những vị trí trình độ cao tại doanh nghiệp Nhật Bản.'),
		));
		?>
		<div class="hr-cards">
			<?php foreach ($cards as $i => $c) : ?>
			<article class="hr-card reveal<?php echo $i ? ' d' . $i : ''; ?>">
				<div class="pic">
					<span class="tagchip"><?php echo esc_html($c['tag']); ?></span>
					<img src="https://vietnam-camcom.com/wp-content/uploads/<?php echo $card_imgs[$i % count($card_imgs)]; ?>" alt="<?php echo esc_attr($c['title']); ?>" loading="lazy" />
				</div>
				<div class="body">
					<h3><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6 9 17l-5-5"/></svg></span><?php echo esc_html($c['title']); ?></h3>
					<p><?php echo esc_html($c['text']); ?></p>
				</div>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= BLOCK 02 — TRANG WEB TUYỂN DỤNG ================= -->
<section style="background:var(--bg-soft);border-block:1px solid var(--line);">
	<span id="block02" class="anchor"></span>
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('b2_eyebrow', 'Service 02')); ?></span>
			<h2><?php echo esc_html(vcc_field('b2_title', 'Vận hành trang web tuyển dụng')); ?></h2>
			<p class="lead"><?php echo esc_html(vcc_field('b2_lead', 'Dịch vụ nhân sự tổng hợp, kiến tạo sự kết nối tối ưu giữa doanh nghiệp và người lao động ở cả hai thị trường.')); ?></p>
		</div>

		<div class="feature">
			<div class="feature-media reveal">
				<div class="frame">
					<img src="https://vietnam-camcom.com/wp-content/uploads/hr_vi_image03_pc.png" alt="mintoku work vietnam" loading="lazy" />
				</div>
			</div>
			<div class="feature-copy reveal d1">
				<div class="feat-brand">
					<span class="fb-mark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15 15 0 0 1 0 20M12 2a15 15 0 0 0 0 20"/></svg></span>
					<div class="fb-name"><b><?php echo esc_html(vcc_field('feat_bname', 'mintoku work vietnam')); ?></b><span><?php echo esc_html(vcc_field('feat_bsub', 'mintoku.vn')); ?></span></div>
				</div>
				<span class="feat-tag"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/></svg> <?php echo esc_html(vcc_field('feat_tag', 'Trang web việc làm trong nước')); ?></span>
				<h2><?php echo esc_html(vcc_field('feat_title', 'Kết nối doanh nghiệp & người lao động')); ?></h2>
				<p><?php echo esc_html(vcc_field('feat_text', 'Chúng tôi triển khai dịch vụ nhân sự tổng hợp nhằm tạo nên sự kết nối tối ưu giữa doanh nghiệp và người lao động, bao gồm:')); ?></p>
				<ul class="feat-list">
					<?php foreach (preg_split('/\r\n|\r|\n/', (string) vcc_field('feat_list', "Giới thiệu nhân lực chất lượng cao (visa Kỹ năng / Nhân văn / Nghiệp vụ Quốc tế) tại Nhật Bản.\nGiới thiệu nhân sự tay nghề cao cho doanh nghiệp Nhật Bản đang hoạt động tại Việt Nam.\nVận hành trang web tuyển dụng mintoku work vietnam.")) as $line) : if (trim($line) === '') continue; ?>
					<li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6 9 17l-5-5"/></svg></span><?php echo esc_html(trim($line)); ?></li>
					<?php endforeach; ?>
				</ul>
				<a href="https://mintoku.vn/" target="_blank" rel="noopener" class="btn btn-primary"><?php echo esc_html(vcc_field('feat_btn', 'Truy cập mintoku work vietnam')); ?> <span class="arr">&rarr;</span></a>
			</div>
		</div>

		<div class="fair reveal" style="margin-top:64px;">
			<div class="fair-copy">
				<span class="eyebrow"><?php echo esc_html(vcc_field('fair_eyebrow', 'Event')); ?></span>
				<h3><?php echo esc_html(vcc_field('fair_title', 'Ngày hội việc làm')); ?></h3>
				<p><?php echo esc_html(vcc_field('fair_text', 'Ngoài ra, chúng tôi còn tổ chức và điều hành các triển lãm, ngày hội việc làm được lên kế hoạch và vận hành bởi công ty mẹ Camtech — nơi doanh nghiệp gặp gỡ trực tiếp ứng viên tiềm năng.')); ?></p>
			</div>
			<div class="fair-pic">
				<img src="https://vietnam-camcom.com/wp-content/uploads/47740295_L.jpg" alt="Ngày hội việc làm Camtech" loading="lazy" />
			</div>
		</div>
	</div>
</section>

<!-- ================= CONTACT CTA ================= -->
<section id="contact">
	<div class="container">
		<div class="cta-wrap reveal">
			<div class="hglow" aria-hidden="true"></div>
			<h2><?php echo esc_html(vcc_field('cta_title', 'Bạn cần tư vấn về nguồn nhân lực?')); ?></h2>
			<p><?php echo esc_html(vcc_field('cta_text', 'Nếu bạn muốn biết thêm thông tin về dịch vụ giới thiệu nhân lực, hãy liên hệ với chúng tôi — đội ngũ VIETNAM CAMCOM sẽ phản hồi trong thời gian sớm nhất.')); ?></p>
			<div class="cta-btns">
				<a href="<?php echo $contact; ?>" class="btn btn-light"><?php echo esc_html(vcc_field('cta_btn1', 'Gửi yêu cầu liên hệ')); ?> <span class="arr">&rarr;</span></a>
				<a href="<?php echo home_url('/#services'); ?>" class="btn btn-outline-light"><?php echo esc_html(vcc_field('cta_btn2', 'Xem các dịch vụ khác')); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
