<?php
/**
 * Template Name: VCC — Tổng quan công ty
 *
 * Structure ported from /vcc/page/company.html. Editable text comes from ACF
 * (group_vcc_company) with Vietnamese fallbacks; WPML translates each field per
 * language post. Uses camcom-light.css / camcom-hr.css classes (loaded globally
 * in header.php). Assign this template to the company page (vi/en/ja).
 */
get_header();
$contact = home_url('/contact/');
$biz_urls = array(home_url('/hr/'), home_url('/bpo/'), home_url('/web/'), home_url('/fdi-support/'));
$email = vcc_field('val_email', 'info_scv@sougo-career-vietnam.com');
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
					<span class="here"><?php echo esc_html(vcc_field('crumb_here', 'Tổng quan công ty')); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html(vcc_field('ph_eye', 'Company Profile')); ?></span>
				<h1><?php echo nl2br(esc_html(vcc_field('ph_title', "Tổng quan\ncông ty"))); ?></h1>
				<p class="lead"><?php echo esc_html(vcc_field('ph_lead', 'Công ty TNHH VIỆT NAM CAMCOM — thành viên của Tập đoàn Camcom, kết nối nguồn nhân lực Việt Nam và Nhật Bản với hai văn phòng tại Hà Nội và Thành phố Hồ Chí Minh.')); ?></p>
				<div class="hero-cta">
					<a href="#offices" class="btn btn-light"><?php echo esc_html(vcc_field('ph_cta1', 'Văn phòng & bản đồ')); ?> <span class="arr">&rarr;</span></a>
					<a href="#contact" class="btn btn-outline-light"><?php echo esc_html(vcc_field('ph_cta2', 'Liên hệ')); ?></a>
				</div>
			</div>
			<div class="ph-media reveal in d1">
				<div class="frame">
					<img src="/wp-content/uploads/scv_home_img01_pc.png" alt="VIETNAM CAMCOM" loading="eager" />
				</div>
				<div class="float-badge">
					<span class="fb-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4M9 9h.01M9 13h.01M9 17h.01"/></svg></span>
					<div><b><?php echo esc_html(vcc_field('fb_value', '2 VP')); ?></b><span><?php echo esc_html(vcc_field('fb_label', 'Hà Nội · Hồ Chí Minh')); ?></span></div>
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
		<a href="#info" class="tab active"><span class="tn">01</span> <?php echo esc_html(vcc_field('tab1', 'Thông tin công ty')); ?></a>
		<a href="#group" class="tab"><span class="tn">02</span> <?php echo esc_html(vcc_field('tab2', 'Quy mô tập đoàn')); ?></a>
		<a href="#offices" class="tab"><span class="tn">03</span> <?php echo esc_html(vcc_field('tab3', 'Văn phòng')); ?></a>
	</div>
</div>

<!-- ================= COMPANY INFO ================= -->
<section>
	<span id="info" class="anchor"></span>
	<div class="container">
		<div class="section-head reveal" style="text-align:left;max-width:none;">
			<span class="eyebrow"><?php echo esc_html(vcc_field('info_eyebrow', 'Corporate Information')); ?></span>
			<h2><?php echo esc_html(vcc_field('info_title', 'Thông tin công ty')); ?></h2>
		</div>

		<div class="spec reveal">
			<div class="row">
				<div class="k"><span class="ki"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/></svg></span><?php echo esc_html(vcc_field('lbl_name', 'Tên công ty')); ?></div>
				<div class="v"><?php echo esc_html(vcc_field('val_name', 'Công ty TNHH VIỆT NAM CAMCOM')); ?></div>
			</div>
			<div class="row">
				<div class="k"><span class="ki"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 21v-1a6 6 0 0 1 12 0v1"/></svg></span><?php echo esc_html(vcc_field('lbl_rep', 'Người đại diện')); ?></div>
				<div class="v"><?php echo esc_html(vcc_field('val_rep', 'HAYASHIDA HISASHI')); ?></div>
			</div>
			<div class="row">
				<div class="k"><span class="ki"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg></span><?php echo esc_html(vcc_field('lbl_biz', 'Nội dung kinh doanh')); ?></div>
				<div class="v">
					<?php
					$biz_items = array();
					foreach (preg_split('/\r\n|\r|\n/', (string) vcc_field('biz_list', "Giới thiệu nguồn nhân lực\nDịch vụ BPO\nPhát triển WEB và Sáng tạo nội dung\nHỗ trợ mở rộng thị trường tại Việt Nam")) as $i => $line) {
						$line = trim($line);
						if ($line === '') continue;
						$url = isset($biz_urls[count($biz_items)]) ? $biz_urls[count($biz_items)] : home_url('/#services');
						$biz_items[] = '<a href="' . esc_url($url) . '">' . esc_html($line) . '</a>';
					}
					echo implode(' · ', $biz_items);
					?>
				</div>
			</div>
			<div class="row">
				<div class="k"><span class="ki"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg></span><?php echo esc_html(vcc_field('lbl_addr', 'Địa chỉ')); ?></div>
				<div class="v">
					<div class="ofc"><b><?php echo esc_html(vcc_field('addr_hq_label', 'Trụ sở Hà Nội')); ?></b><?php echo esc_html(vcc_field('addr_hq', 'Tầng 11, Văn phòng 2 – Dự án Sunsquare, Số 21 Đường Lê Đức Thọ, Phường Từ Liêm, Thành phố Hà Nội, Việt Nam')); ?></div>
					<div class="ofc"><b><?php echo esc_html(vcc_field('addr_hcm_label', 'Chi nhánh Hồ Chí Minh')); ?></b><?php echo esc_html(vcc_field('addr_hcm', 'Tầng 9 Tòa nhà HBT, Số 456-458 Hai Bà Trưng, Phường Tân Định, TP. Hồ Chí Minh, Việt Nam')); ?></div>
				</div>
			</div>
			<div class="row">
				<div class="k"><span class="ki"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.6A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.4-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2Z"/></svg></span><?php echo esc_html(vcc_field('lbl_phone', 'Số điện thoại')); ?></div>
				<div class="v"><a href="tel:02471094510">024-7109-4510</a></div>
			</div>
			<div class="row">
				<div class="k"><span class="ki"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg></span><?php echo esc_html(vcc_field('lbl_email', 'E-mail')); ?></div>
				<div class="v"><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></div>
			</div>
			<div class="row">
				<div class="k"><span class="ki"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></span><?php echo esc_html(vcc_field('lbl_founded', 'Thành lập')); ?></div>
				<div class="v"><?php echo esc_html(vcc_field('val_founded', 'Ngày 16 tháng 9 năm 2019')); ?></div>
			</div>
		</div>
	</div>
</section>

<!-- ================= GROUP SCALE ================= -->
<section class="strip">
	<span id="group" class="anchor"></span>
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('group_eyebrow', 'Camcom Group')); ?></span>
			<h2><?php echo esc_html(vcc_field('group_title', 'Quy mô tập đoàn')); ?></h2>
			<p class="lead"><?php echo esc_html(vcc_field('group_lead', 'Các con số dưới đây phản ánh quy mô của toàn Tập đoàn Camcom (tính đến ngày 31 tháng 3 năm 2023).')); ?></p>
		</div>
		<?php
		$figs = vcc_list('figures', array('fv', 'fl', 'coral'), array(
			array('fv' => '<span data-count="400">400</span><span class="u" style="font-size:.5em;"> triệu ¥</span>', 'fl' => 'Nguồn vốn (toàn tập đoàn)',                'coral' => false),
			array('fv' => '<span data-count="2385">2.385</span>',                                                  'fl' => 'Số lượng nhân viên',                       'coral' => true),
			array('fv' => '<span data-count="169">169</span>',                                                    'fl' => 'Số cơ sở hoạt động',                       'coral' => false),
			array('fv' => '<span data-count="1292">1.292</span><span class="u" style="font-size:.5em;"> tỷ ¥</span>', 'fl' => 'Doanh thu (ước tính 2024: 1.500 tỷ ¥)', 'coral' => false),
		));
		?>
		<div class="hr-figures reveal" style="grid-template-columns:repeat(4,1fr);">
			<?php foreach ($figs as $f) : ?>
			<div class="hr-fig<?php echo !empty($f['coral']) ? ' coral' : ''; ?>">
				<div class="fv"><?php echo $f['fv']; ?></div>
				<div class="fl"><?php echo esc_html($f['fl']); ?></div>
			</div>
			<?php endforeach; ?>
		</div>
		<p class="spec-note reveal" style="justify-content:center;margin-top:22px;">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
			<?php echo esc_html(vcc_field('group_note', 'Số liệu của Tổng công ty, tính đến 31/03/2023, không bao gồm nhân viên tạm thời.')); ?>
		</p>
	</div>
</section>

<!-- ================= OFFICES ================= -->
<section>
	<span id="offices" class="anchor"></span>
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('off_eyebrow', 'Our Offices')); ?></span>
			<h2><?php echo esc_html(vcc_field('off_title', 'Văn phòng của chúng tôi')); ?></h2>
			<p class="lead"><?php echo esc_html(vcc_field('off_lead', 'Hai văn phòng tại hai trung tâm kinh tế lớn nhất Việt Nam, sẵn sàng đồng hành cùng doanh nghiệp.')); ?></p>
		</div>
		<div class="offices">
			<article class="office reveal">
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.4835628262063!2d105.76993050859984!3d21.034380627347524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b9e41b1799%3A0x6547e8d232acf8c8!2zMjEgxJDGsOG7nW5nIEzDqiDEkOG7qWMgVGjhu40sIE3hu7kgxJDDrG5oLCBU4burIExpw6ptLCBIw6AgTuG7mWksIOODmeODiOODiuODoA!5e0!3m2!1sja!2sjp!4v1572590945772!5m2!1sja!2sjp" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Bản đồ trụ sở Hà Nội"></iframe>
				</div>
				<div class="ob">
					<span class="tag"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg> <?php echo esc_html(vcc_field('off_hq_tag', 'Trụ sở chính')); ?></span>
					<h3><?php echo esc_html(vcc_field('off_hq_title', 'Văn phòng Hà Nội')); ?></h3>
					<p><?php echo esc_html(vcc_field('off_hq_addr', 'Tầng 11, Văn phòng 2 – Dự án Sunsquare, Số 21 Đường Lê Đức Thọ, Phường Từ Liêm, Hà Nội, Việt Nam')); ?></p>
				</div>
			</article>
			<article class="office reveal d1">
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2529579114366!2d106.68460551129553!3d10.791927889313397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528d28fd590c3%3A0xb921f16c43899605!2zNDU4IEhhaSBCw6AgVHLGsG5nLCBQaMaw4budbmcgVMOibiDEkOG7i25oLCBRdeG6rW4gMSwgSOG7kyBDaMOtIE1pbmggNzAwMDAg44OZ44OI44OK44Og!5e0!3m2!1sja!2sjp!4v1744880860604!5m2!1sja!2sjp" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Bản đồ chi nhánh Hồ Chí Minh"></iframe>
				</div>
				<div class="ob">
					<span class="tag"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg> <?php echo esc_html(vcc_field('off_hcm_tag', 'Chi nhánh')); ?></span>
					<h3><?php echo esc_html(vcc_field('off_hcm_title', 'Văn phòng Hồ Chí Minh')); ?></h3>
					<p><?php echo esc_html(vcc_field('off_hcm_addr', 'Tầng 9 Tòa nhà HBT, Số 456-458 Hai Bà Trưng, Phường Tân Định, TP. Hồ Chí Minh, Việt Nam')); ?></p>
				</div>
			</article>
		</div>

		<div class="iso reveal">
			<div class="seal"><img src="/wp-content/uploads/security-logo.png" alt="ISO/IEC 27001 logo" loading="lazy" /></div>
			<div class="it">
				<b><?php echo esc_html(vcc_field('iso_title', 'Chứng nhận ISO/IEC 27001:2022')); ?></b>
				<span><?php echo esc_html(vcc_field('iso_text', 'Hệ thống quản lý an toàn thông tin (ISMS)')); ?> · </span><span class="no"><?php echo esc_html(vcc_field('iso_no', 'No. 20201260018841')); ?></span>
			</div>
		</div>
	</div>
</section>

<!-- ================= CONTACT CTA ================= -->
<section id="contact">
	<div class="container">
		<div class="cta-wrap reveal">
			<div class="hglow" aria-hidden="true"></div>
			<h2><?php echo esc_html(vcc_field('cta_title', 'Bạn muốn biết thêm thông tin?')); ?></h2>
			<p><?php echo esc_html(vcc_field('cta_text', 'Nếu bạn cần thêm thông tin về VIETNAM CAMCOM, xin vui lòng liên hệ với chúng tôi — đội ngũ của chúng tôi sẽ phản hồi trong thời gian sớm nhất.')); ?></p>
			<div class="cta-btns">
				<a href="<?php echo $contact; ?>" class="btn btn-light"><?php echo esc_html(vcc_field('cta_btn1', 'Gửi yêu cầu liên hệ')); ?> <span class="arr">&rarr;</span></a>
				<a href="tel:02471094510" class="btn btn-outline-light"><?php echo esc_html(vcc_field('cta_btn2', '024-7109-4510')); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
