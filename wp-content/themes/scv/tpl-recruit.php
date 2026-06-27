<?php
/**
 * Template Name: VCC — Tuyển dụng
 *
 * Structure ported from /vcc/page/recruit.html. Editable text comes from ACF
 * (group_vcc_recruit) with Vietnamese fallbacks; WPML translates each field per
 * language post. Uses camcom-light.css / camcom-hr.css classes (loaded globally
 * in header.php). Assign this template to the recruit page (vi/en/ja).
 */
get_header();
$fb = 'https://www.facebook.com/VIETNAM.CAMCOM';
$cta_email = vcc_field('cta_email', 'info_scv@sougo-career-vietnam.com');

// category key -> icon (class is "cat {key}", text comes from cat_label field)
$cat_icons = array(
	'data'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v14a9 3 0 0 0 18 0V5M3 12a9 3 0 0 0 18 0"/></svg>',
	'sales'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3v18h18"/><path d="m7 14 4-4 3 3 5-6"/></svg>',
	'finance' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 8h10M7 12h6M7 16h4"/></svg>',
	'web'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m18 16 4-4-4-4M6 8l-4 4 4 4M14.5 4l-5 16"/></svg>',
);
$clock_icon  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>';
$salary_icon = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v10M9.5 9.5h4a1.5 1.5 0 0 1 0 3h-3a1.5 1.5 0 0 0 0 3h4"/></svg>';

$hours_label  = vcc_field('hours_label', 'Giờ làm');
$hours_value  = vcc_field('hours_value', '8:00 – 17:00');
$salary_label = vcc_field('salary_label', 'Lương');
$apply_label  = vcc_field('apply_label', 'Ứng tuyển');
?>

<!-- ================= PAGE HEADER ================= -->
<section class="page-head recruit">
	<div class="hgrid" aria-hidden="true"></div>
	<div class="hglow" aria-hidden="true"></div>
	<div class="hglow two" aria-hidden="true"></div>
	<div class="container">
		<div class="ph-inner">
			<div class="ph-text reveal in">
				<nav class="crumb" aria-label="Breadcrumb">
					<a href="<?php echo home_url('/'); ?>"><?php echo esc_html(vcc_field('crumb_home', 'Trang chủ')); ?></a>
					<span class="sep">/</span>
					<span class="here"><?php echo esc_html(vcc_field('crumb_here', 'Tuyển dụng')); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html(vcc_field('ph_eye', "We're Hiring")); ?></span>
				<h1><?php echo nl2br(esc_html(vcc_field('ph_title', "Cùng kiến tạo\nsự nghiệp tại CAMCOM"))); ?></h1>
				<p class="lead"><?php echo esc_html(vcc_field('ph_lead', 'VIETNAM CAMCOM đang tuyển dụng nhiều vị trí ở đa dạng ngành nghề. Đừng ngần ngại — hãy ứng tuyển ngay hôm nay để cùng chúng tôi tạo nên "công việc có giá trị"!')); ?></p>
				<div class="hero-cta">
					<a href="#jobs" class="btn btn-light"><?php echo esc_html(vcc_field('ph_cta1', 'Xem vị trí tuyển dụng')); ?> <span class="arr">&rarr;</span></a>
					<a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener" class="btn btn-outline-light"><?php echo esc_html(vcc_field('ph_cta2', 'Ứng tuyển qua Facebook')); ?></a>
				</div>
			</div>
			<div class="ph-media reveal in d1">
				<div class="frame">
					<img src="/wp-content/uploads/recruit_mainImg_pc_02.png" alt="Tuyển dụng VIETNAM CAMCOM" loading="eager" />
				</div>
				<div class="float-badge">
					<span class="fb-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8v6M22 11h-6"/></svg></span>
					<div><b><?php echo esc_html(vcc_field('fb_value', '6 vị trí')); ?></b><span><?php echo esc_html(vcc_field('fb_label', 'Đang tuyển dụng')); ?></span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#ffffff" d="M0,48 C240,90 480,90 720,60 C960,30 1200,10 1440,40 L1440,90 L0,90 Z"></path></svg>
	</div>
</section>

<!-- ================= JOBS ================= -->
<section>
	<span id="jobs" class="anchor"></span>
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('jobs_eyebrow', 'Open Positions')); ?></span>
			<h2><?php echo esc_html(vcc_field('jobs_title', 'Công việc tuyển dụng')); ?></h2>
			<p class="lead"><?php echo esc_html(vcc_field('jobs_lead', 'Tất cả vị trí làm việc tại Công ty TNHH Việt Nam CAMCOM · Giờ làm việc 8:00 – 17:00.')); ?></p>
		</div>
		<?php
		$jobs = vcc_list('jobs', array('cat', 'cat_label', 'lead_tag', 'title', 'desc', 'salary_vnd', 'salary_usd', 'perk'), array(
			array('cat' => 'data',    'cat_label' => 'Nhập liệu',  'lead_tag' => 'Team Leader', 'title' => 'Trưởng nhóm nhập dữ liệu', 'desc' => 'Nhập thông tin tham dự, nhập gia hạn hợp đồng và đào tạo người vận hành bằng hệ thống cốt lõi.', 'salary_vnd' => '10.471.500₫', 'salary_usd' => '$450', 'perk' => '+ trợ cấp tiếng Nhật'),
			array('cat' => 'data',    'cat_label' => 'Nhập liệu',  'lead_tag' => '',            'title' => 'Nhân viên nhập dữ liệu', 'desc' => 'Nhập thông tin chấm công và gia hạn hợp đồng bằng hệ thống cốt lõi.', 'salary_vnd' => '6.981.000₫', 'salary_usd' => '$300', 'perk' => '+ trợ cấp tiếng Nhật'),
			array('cat' => 'sales',   'cat_label' => 'Kinh doanh', 'lead_tag' => '',            'title' => 'Nhân viên kinh doanh', 'desc' => 'Đón tiếp các công ty Nhật Bản tham gia kiểm tra & phỏng vấn; kinh doanh dịch vụ giới thiệu nguồn nhân lực cho doanh nghiệp bản địa tại Việt Nam.', 'salary_vnd' => '11.635.000₫', 'salary_usd' => '$500', 'perk' => '+ trợ cấp tiếng Nhật'),
			array('cat' => 'finance', 'cat_label' => 'Tài chính',  'lead_tag' => '',            'title' => 'Kế toán tài chính', 'desc' => 'Tạo hóa đơn, quản lý hóa đơn, xử lý thanh toán và các nghiệp vụ kế toán liên quan.', 'salary_vnd' => '11.635.000₫', 'salary_usd' => '$500', 'perk' => '+ trợ cấp tiếng Nhật'),
			array('cat' => 'web',     'cat_label' => 'Lập trình',  'lead_tag' => 'Team Leader', 'title' => 'Trưởng nhóm lập trình Web', 'desc' => 'Lập trình & mã hóa, đào tạo người vận hành, kiểm soát chất lượng và giao tiếp với phía Nhật Bản.', 'salary_vnd' => '13.962.000₫', 'salary_usd' => '$600', 'perk' => '+ trợ cấp tiếng Nhật'),
			array('cat' => 'web',     'cat_label' => 'Lập trình',  'lead_tag' => '',            'title' => 'Nhân viên lập trình Web', 'desc' => 'Lập trình và mã hóa theo yêu cầu dự án, phối hợp cùng nhóm phát triển.', 'salary_vnd' => '10.471.500₫', 'salary_usd' => '$450', 'perk' => ''),
		));
		?>
		<div class="jobs">
			<?php foreach ($jobs as $i => $j) :
				$cat = isset($j['cat']) ? $j['cat'] : 'data';
				$icon = isset($cat_icons[$cat]) ? $cat_icons[$cat] : $cat_icons['data'];
			?>
			<article class="job reveal<?php echo ($i % 2) ? ' d1' : ''; ?>">
				<div class="jtop">
					<span class="cat <?php echo esc_attr($cat); ?>"><?php echo $icon; ?> <?php echo esc_html($j['cat_label']); ?></span>
					<?php if (!empty($j['lead_tag'])) : ?><span class="lead-tag"><?php echo esc_html($j['lead_tag']); ?></span><?php endif; ?>
				</div>
				<h3><?php echo esc_html($j['title']); ?></h3>
				<p class="desc"><?php echo esc_html($j['desc']); ?></p>
				<div class="jmeta">
					<div class="mi"><div class="ml"><?php echo $clock_icon; ?> <?php echo esc_html($hours_label); ?></div><div class="mv"><?php echo esc_html($hours_value); ?></div></div>
					<div class="mi"><div class="ml"><?php echo $salary_icon; ?> <?php echo esc_html($salary_label); ?></div><div class="mv"><?php echo esc_html($j['salary_vnd']); ?> <span class="usd"><?php echo esc_html($j['salary_usd']); ?></span><?php if (!empty($j['perk'])) : ?><span class="perk"><?php echo esc_html($j['perk']); ?></span><?php endif; ?></div></div>
				</div>
				<div class="apply"><a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener" class="btn btn-primary"><?php echo esc_html($apply_label); ?> <span class="arr">&rarr;</span></a></div>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= CONTACT CTA ================= -->
<section id="contact">
	<div class="container">
		<div class="cta-wrap reveal">
			<div class="hglow" aria-hidden="true"></div>
			<h2><?php echo esc_html(vcc_field('cta_title', 'Sẵn sàng gia nhập đội ngũ?')); ?></h2>
			<p><?php echo esc_html(vcc_field('cta_text', 'Đừng ngần ngại — hãy gửi hồ sơ hoặc nhắn tin cho chúng tôi qua Facebook. Đội ngũ tuyển dụng VIETNAM CAMCOM luôn sẵn sàng đồng hành cùng bạn.')); ?></p>
			<div class="cta-btns">
				<a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener" class="btn btn-light"><?php echo esc_html(vcc_field('cta_btn1', 'Liên hệ qua Facebook')); ?> <span class="arr">&rarr;</span></a>
				<a href="mailto:<?php echo esc_attr($cta_email); ?>" class="btn btn-outline-light"><?php echo esc_html(vcc_field('cta_btn2', 'Gửi hồ sơ qua email')); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
