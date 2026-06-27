<?php
/**
 * Template Name: VCC — Hỗ trợ mở rộng thị trường VN
 *
 * Structure ported from /vcc/page/fdi-support.html. Editable text comes from ACF
 * (group_vcc_fdi) with Vietnamese fallbacks; WPML translates each field per
 * language post. Uses camcom-hr.css classes (loaded globally in header.php).
 * Assign this template to the FDI-support page (and its EN/JA translations).
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
					<span class="here"><?php echo esc_html(vcc_field('crumb_here', 'Hỗ trợ mở rộng thị trường VN')); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html(vcc_field('ph_eye', 'Service 04')); ?></span>
				<h1><?php echo nl2br(esc_html(vcc_field('ph_title', "Hỗ trợ mở rộng\nthị trường tại Việt Nam"))); ?></h1>
				<p class="lead"><?php echo esc_html(vcc_field('ph_lead', 'Chúng tôi đồng hành cùng doanh nghiệp Nhật Bản đầu tư (FDI) và mở rộng kinh doanh tại Việt Nam — từ thành lập công ty con, văn phòng đại diện đến vận hành, quản lý lao động và thủ tục cho người nước ngoài.')); ?></p>
				<div class="hero-cta">
					<a href="#establishment" class="btn btn-light"><?php echo esc_html(vcc_field('ph_cta1', 'Khám phá dịch vụ')); ?> <span class="arr">&rarr;</span></a>
					<a href="#contact" class="btn btn-outline-light"><?php echo esc_html(vcc_field('ph_cta2', 'Liên hệ tư vấn')); ?></a>
				</div>
			</div>
			<div class="ph-media reveal in d1">
				<div class="frame">
					<img src="/wp-content/uploads/fdi_support_mainImg_pc.png" alt="Hỗ trợ mở rộng thị trường tại Việt Nam" loading="eager" />
				</div>
				<div class="float-badge">
					<span class="fb-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/><path d="M9 9h.01M9 13h.01M9 17h.01"/></svg></span>
					<div><b><?php echo esc_html(vcc_field('fb_value', 'FDI')); ?></b><span><?php echo esc_html(vcc_field('fb_label', 'Đầu tư & mở rộng tại Việt Nam')); ?></span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#ffffff" d="M0,48 C240,90 480,90 720,60 C960,30 1200,10 1440,40 L1440,90 L0,90 Z"></path></svg>
	</div>
</section>

<!-- ================= INTRO LOCKUP ================= -->
<section style="padding-bottom:60px;">
	<div class="container">
		<div class="hr-intro">
			<div class="reveal">
				<span class="logo-chip">
					<span class="lc-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/></svg></span>
					<b><?php echo esc_html(vcc_field('intro_chip', 'One-stop FDI Support')); ?></b>
				</span>
				<h2><?php echo esc_html(vcc_field('intro_title', 'Một đối tác, trọn quy trình đặt chân vào Việt Nam')); ?></h2>
				<p><?php echo esc_html(vcc_field('intro_text', 'Thành lập pháp nhân tại địa phương đòi hỏi nhiều thủ tục pháp lý, hồ sơ và am hiểu thực tiễn. Chúng tôi hỗ trợ doanh nghiệp Nhật Bản xử lý toàn bộ — từ tư vấn ban đầu, làm việc với cơ quan nhà nước, đến quản lý lao động và thủ tục cho người nước ngoài sau khi đi vào hoạt động.')); ?></p>
			</div>
			<?php
			$figs = vcc_list('figures', array('fv', 'fl', 'coral'), array(
				array('fv' => '2<span class="u"> bước</span>',         'fl' => 'Thành lập & vận hành — đồng hành xuyên suốt',     'coral' => false),
				array('fv' => 'JP<span class="u">×</span>VN',          'fl' => 'Cầu nối ngôn ngữ, pháp lý và văn hóa hai nước',   'coral' => true),
				array('fv' => 'VISA<span class="u"> / WP / TRS</span>', 'fl' => 'Trọn gói thủ tục cư trú cho nhân sự Nhật Bản',    'coral' => false),
				array('fv' => '100<span class="u">%</span>',           'fl' => 'Hỗ trợ bằng tiếng Nhật, sát thực tế địa phương', 'coral' => false),
			));
			?>
			<div class="hr-figures reveal d1">
				<?php foreach ($figs as $f) : ?>
				<div class="hr-fig<?php echo !empty($f['coral']) ? ' coral' : ''; ?>">
					<div class="fv"><?php echo $f['fv']; ?></div>
					<div class="fl"><?php echo esc_html($f['fl']); ?></div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- emphasis banner -->
		<div class="hr-banner reveal">
			<div class="bg-field-dark" aria-hidden="true"></div>
			<span class="bspark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/></svg></span>
			<p><?php echo vcc_field('banner', 'Hỗ trợ <span class="accent">thành lập công ty con &amp; văn phòng đại diện</span>, cùng toàn bộ thủ tục pháp lý, lao động và nhân sự nước ngoài tại Việt Nam.'); ?></p>
		</div>
	</div>
</section>

<!-- ================= SECTION TABS ================= -->
<div class="svc-tabs">
	<div class="container">
		<a href="#establishment" class="tab active"><span class="tn">01</span> <?php echo esc_html(vcc_field('tab1', 'Thành lập công ty con / VPĐD')); ?></a>
		<a href="#post-setup" class="tab"><span class="tn">02</span> <?php echo esc_html(vcc_field('tab2', 'Thủ tục sau khi thành lập')); ?></a>
	</div>
</div>

<!-- ================= 01 ESTABLISHMENT ================= -->
<section>
	<span id="establishment" class="anchor"></span>
	<div class="container">
		<div class="feature">
			<div class="feature-media reveal">
				<div class="frame"><img src="/wp-content/uploads/fdi_support_image01_pc.png" alt="Hỗ trợ thành lập công ty con, văn phòng đại diện" loading="lazy" /></div>
			</div>
			<div class="feature-copy reveal d1">
				<span class="feat-tag"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/></svg> <?php echo esc_html(vcc_field('est_tag', 'Establishment')); ?></span>
				<h2><?php echo esc_html(vcc_field('est_title', 'Hỗ trợ thành lập công ty con, văn phòng đại diện tại địa phương')); ?></h2>
				<p><?php echo esc_html(vcc_field('est_text', 'Chúng tôi hỗ trợ doanh nghiệp Nhật Bản từ khâu khảo sát, tư vấn đến chuẩn bị hồ sơ pháp lý để thành lập pháp nhân tại Việt Nam.')); ?></p>
				<ul class="feat-list">
					<?php foreach (preg_split('/\r\n|\r|\n/', (string) vcc_field('est_list', "Xác nhận chi tiết doanh nghiệp tại Việt Nam\nTư vấn thủ tục pháp lý, doanh nghiệp\nTạo tài liệu ứng dụng cho hồ sơ thành lập")) as $line) : if (trim($line) === '') continue; ?>
					<li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6 9 17l-5-5"/></svg></span><?php echo esc_html(trim($line)); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<!-- "Loại khác" supplementary list -->
		<div class="section-head reveal" style="max-width:none;margin:60px 0 28px;text-align:left;">
			<span class="eyebrow"><?php echo esc_html(vcc_field('other_eyebrow', 'Loại khác')); ?></span>
			<h2 style="font-size:clamp(24px,2.6vw,32px);"><?php echo esc_html(vcc_field('other_title', 'Các hạng mục hỗ trợ bổ sung')); ?></h2>
		</div>
		<?php
		$str_icons = array(
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M3 21h18M6 21V8l6-4 6 4v13"/><path d="M10 9h.01M14 9h.01M10 13h.01M14 13h.01M10 17h4"/></svg>',
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13l2 2 4-4"/></svg>',
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M8 14h3"/><circle cx="16" cy="14.5" r="1.6"/></svg>',
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M9 11l3 3 8-8"/><path d="M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h9"/></svg>',
		);
		$str_delays = array('', ' d1', ' d2', ' d1');
		$strengths = vcc_list('strengths', array('title', 'text'), array(
			array('title' => 'Làm việc với cơ quan nhà nước',       'text' => 'Đại diện trả lời, trao đổi và xử lý hồ sơ với các văn phòng chính phủ trong suốt quá trình thành lập.'),
			array('title' => 'Xin cấp các loại giấy chứng nhận',     'text' => 'Giấy chứng nhận đăng ký đầu tư, đăng ký công ty và đăng ký con dấu — chuẩn bị và nộp đầy đủ theo quy định.'),
			array('title' => 'VISA / WP / TRS cho cư dân Nhật Bản',  'text' => 'Đăng ký và nhận visa, giấy phép lao động (WP) và thẻ tạm trú (TRS) cho người Nhật làm việc tại Việt Nam.'),
			array('title' => 'Hỗ trợ lao động & pháp lý sau khởi sự', 'text' => 'Đồng hành về mặt lao động và pháp lý ngay sau khi doanh nghiệp bắt đầu đi vào hoạt động kinh doanh.'),
		));
		?>
		<div class="strengths">
			<?php foreach ($strengths as $i => $s) : ?>
			<article class="str-card reveal<?php echo isset($str_delays[$i]) ? $str_delays[$i] : ''; ?>">
				<div class="ic"><?php echo $str_icons[$i % count($str_icons)]; ?></div>
				<h3><?php echo esc_html($s['title']); ?></h3>
				<p><?php echo esc_html($s['text']); ?></p>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= 02 POST SETUP ================= -->
<section style="background:var(--bg-soft);border-block:1px solid var(--line);">
	<span id="post-setup" class="anchor"></span>
	<div class="container">
		<div class="feature flip">
			<div class="feat-media reveal">
				<div class="frame"><img src="/wp-content/uploads/fdi_support_image02_pc.png" alt="Hỗ trợ các thủ tục sau khi thành lập" loading="lazy" /></div>
			</div>
			<div class="feature-copy reveal d1">
				<span class="feat-tag"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3 8-8"/><path d="M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h9"/></svg> <?php echo esc_html(vcc_field('op_tag', 'Operation')); ?></span>
				<h2><?php echo esc_html(vcc_field('op_title', 'Hỗ trợ các thủ tục sau khi thành lập')); ?></h2>
				<p><?php echo esc_html(vcc_field('op_text', 'Sau khi pháp nhân đi vào hoạt động, chúng tôi tiếp tục hỗ trợ vận hành hằng ngày — từ quản lý lao động, thủ tục cho người nước ngoài đến kết nối kinh doanh.')); ?></p>
				<ul class="feat-list">
					<?php foreach (preg_split('/\r\n|\r|\n/', (string) vcc_field('op_list', "Hỗ trợ quản lý lao động: đại lý tính lương, thủ tục bảo hiểm, xây dựng quy chế làm việc, v.v.\nThủ tục cho người nước ngoài: xin visa, giấy phép lao động, thẻ tạm trú, v.v.\nThủ tục cho khách đi công tác: tạo thư mời, xin visa, v.v.\nKết nối kinh doanh: giới thiệu công ty hợp tác phù hợp\nTuyển dụng nhân sự cho hoạt động tại địa phương")) as $line) : if (trim($line) === '') continue; ?>
					<li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6 9 17l-5-5"/></svg></span><?php echo esc_html(trim($line)); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- ================= CONTACT CTA ================= -->
<section id="contact">
	<div class="container">
		<div class="cta-wrap reveal">
			<div class="hglow" aria-hidden="true"></div>
			<h2><?php echo esc_html(vcc_field('cta_title', 'Mở rộng kinh doanh tại Việt Nam cùng chúng tôi')); ?></h2>
			<p><?php echo esc_html(vcc_field('cta_text', 'Bạn đang cân nhắc thành lập công ty con, văn phòng đại diện hay cần hỗ trợ vận hành tại Việt Nam? Hãy liên hệ — đội ngũ của chúng tôi sẽ tư vấn lộ trình phù hợp.')); ?></p>
			<div class="cta-btns">
				<a href="<?php echo $contact; ?>" class="btn btn-light"><?php echo esc_html(vcc_field('cta_btn1', 'Gửi yêu cầu liên hệ')); ?> <span class="arr">&rarr;</span></a>
				<a href="<?php echo home_url('/#services'); ?>" class="btn btn-outline-light"><?php echo esc_html(vcc_field('cta_btn2', 'Xem các dịch vụ khác')); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
