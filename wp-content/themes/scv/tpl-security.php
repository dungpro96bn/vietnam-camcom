<?php
/**
 * Template Name: VCC — Chính sách bảo mật thông tin
 *
 * Structure ported from /vcc/page/security.html. Editable text comes from ACF
 * (group_vcc_security) with Vietnamese fallbacks; WPML translates each field per
 * language post. Page-specific CSS (.pol-*) lives in assets/css/camcom-hr.css,
 * loaded globally in header.php. Assign this template to the security page (vi/en/ja).
 */
get_header();
$contact = home_url('/contact/');

$goal_icons = array(
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13l2 2 4-4"/></svg>',
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="M9 12l2 2 4-4"/></svg>',
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="M22 4 12 14.01l-3-3"/></svg>',
);
$goal_delays = array('', ' d1', ' d2');

$goals = vcc_list('goals', array('title', 'text'), array(
	array('title' => 'Tuân thủ hợp đồng & pháp luật', 'text' => 'Tôn trọng và tuân thủ các hợp đồng với khách hàng cùng mọi yêu cầu pháp lý và quy định hiện hành.'),
	array('title' => 'Phòng ngừa sự cố',              'text' => 'Ngăn ngừa các sự cố bảo mật thông tin trước khi chúng xảy ra, thông qua quản lý và giám sát chủ động.'),
	array('title' => 'Giảm thiểu tác động',           'text' => 'Trong trường hợp không mong muốn sự cố bảo mật xảy ra, nhanh chóng ứng phó để giảm thiểu tối đa tác động.'),
));

$sign_rows = vcc_list('sign_rows', array('k', 'v'), array(
	array('k' => 'Phiên bản',     'v' => 'Phiên bản đầu tiên'),
	array('k' => 'Ngày ban hành', 'v' => 'Tháng 7 năm 2025'),
	array('k' => 'Doanh nghiệp',  'v' => 'Công ty TNHH VIỆT NAM CAMCOM'),
	array('k' => 'Đại diện',      'v' => 'CEO — Hayashida Hisashi'),
));
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
					<span class="here"><?php echo esc_html(vcc_field('crumb_here', 'Chính sách bảo mật thông tin')); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html(vcc_field('ph_eye', 'Information Security Policy')); ?></span>
				<h1><?php echo nl2br(esc_html(vcc_field('ph_title', "Chính sách\nbảo mật thông tin"))); ?></h1>
				<p class="lead"><?php echo esc_html(vcc_field('ph_lead', 'Bảo vệ tài sản thông tin được khách hàng và các bên liên quan tin tưởng giao phó là ưu tiên quản lý cao nhất của chúng tôi. VIETNAM CAMCOM xây dựng, vận hành và liên tục cải tiến Hệ thống quản lý an toàn thông tin (ISMS) theo chuẩn ISO/IEC 27001:2022.')); ?></p>
				<div class="doc-meta">
					<?php
					$meta = preg_split('/\r\n|\r|\n/', (string) vcc_field('doc_meta', "Phiên bản đầu tiên: 07/2025\nISO/IEC 27001:2022\nNo. 20201260018841"));
					$meta = array_values(array_filter(array_map('trim', $meta), 'strlen'));
					foreach ($meta as $mi => $m) {
						if ($mi > 0) echo '<span class="dot"></span>';
						echo '<span>' . esc_html($m) . '</span>';
					}
					?>
				</div>
			</div>
			<div class="ph-media reveal in d1">
				<div class="frame" style="display:grid;place-items:center;padding:48px;background:#fff;">
					<img src="/wp-content/uploads/security-logo.png" alt="Chứng nhận ISO/IEC 27001:2022" loading="eager" style="max-width:230px;width:100%;height:auto;object-fit:contain;" />
				</div>
				<div class="float-badge">
					<span class="fb-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="M9 12l2 2 4-4"/></svg></span>
					<div><b><?php echo esc_html(vcc_field('fb_value', 'ISMS')); ?></b><span><?php echo esc_html(vcc_field('fb_label', 'Hệ thống quản lý an toàn thông tin')); ?></span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#ffffff" d="M0,48 C240,90 480,90 720,60 C960,30 1200,10 1440,40 L1440,90 L0,90 Z"></path></svg>
	</div>
</section>

<!-- ================= POLICY STATEMENT ================= -->
<section>
	<div class="container">
		<div class="pol-wrap">

			<div class="pol-quote reveal">
				<p class="pol-lede"><?php echo esc_html(vcc_field('pol_lede', 'Sứ mệnh của VIETNAM CAMCOM là đóng góp cho xã hội bằng cách đáp ứng kỳ vọng của tất cả các bên liên quan — khách hàng, nhân viên và gia đình của họ — thông qua hoạt động kinh doanh tuyển dụng, phát triển web và BPO.')); ?></p>
			</div>

			<div class="pol-body reveal d1">
				<?php echo vcc_field('pol_body', '<p>Trong các hoạt động kinh doanh của mình, chúng tôi sử dụng nhiều tài sản thông tin, bao gồm cả thông tin cá nhân được khách hàng ủy thác. Chúng tôi nhận thức rằng bảo vệ những tài sản thông tin này là vấn đề quản lý quan trọng nhất để đáp ứng kỳ vọng của tất cả các bên liên quan.</p><p>Do đó, chúng tôi đã xây dựng Chính sách bảo mật thông tin. Dựa trên chính sách này, chúng tôi xây dựng và vận hành ISMS (Hệ thống quản lý an toàn thông tin), đồng thời tuyên bố rằng toàn công ty sẽ nỗ lực liên tục cải tiến hệ thống này theo những thay đổi của môi trường xung quanh doanh nghiệp.</p>'); ?>
			</div>

			<!-- objectives -->
			<div class="pol-section-head reveal">
				<span class="pn"><?php echo esc_html(vcc_field('goals_kicker', 'Mục tiêu')); ?></span>
				<h2><?php echo esc_html(vcc_field('goals_title', 'Các mục tiêu bảo mật của chúng tôi')); ?></h2>
				<span class="ln"></span>
			</div>
			<p class="pol-body reveal" style="margin-bottom:22px;"><?php echo esc_html(vcc_field('goals_intro', 'Chúng tôi đặt ra các mục tiêu bảo mật sau và đảm bảo thực hiện các biện pháp cần thiết để đạt được chúng.')); ?></p>

			<div class="pol-goals">
				<?php foreach ($goals as $gi => $g) : ?>
				<article class="pol-goal reveal<?php echo isset($goal_delays[$gi]) ? $goal_delays[$gi] : ''; ?>">
					<span class="gi"><?php echo $goal_icons[$gi % count($goal_icons)]; ?></span>
					<div class="gc">
						<h3><?php echo esc_html($g['title']); ?></h3>
						<p><?php echo esc_html($g['text']); ?></p>
					</div>
				</article>
				<?php endforeach; ?>
			</div>

			<!-- signature + certificate -->
			<div class="pol-band reveal">
				<div class="pol-sign">
					<div class="ed"><?php echo esc_html(vcc_field('sign_ed', 'Ban hành')); ?></div>
					<div class="rows">
						<?php foreach ($sign_rows as $r) : ?>
						<div class="row"><span class="k"><?php echo esc_html($r['k']); ?></span><span class="v"><?php echo esc_html($r['v']); ?></span></div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="pol-cert">
					<div class="bg-field-dark" aria-hidden="true"></div>
					<div class="seal"><img src="/wp-content/uploads/security-logo.png" alt="ISO/IEC 27001:2022 logo" loading="lazy" /></div>
					<div class="ct">
						<b><?php echo esc_html(vcc_field('cert_title', 'ISO/IEC 27001:2022 Certificate')); ?></b>
						<span class="no"><?php echo esc_html(vcc_field('cert_no', 'No. 20201260018841')); ?></span>
					</div>
				</div>
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
			<p><?php echo esc_html(vcc_field('cta_text', 'Nếu bạn cần làm rõ bất kỳ nội dung nào trong Chính sách bảo mật thông tin, hoặc trao đổi về cách chúng tôi bảo vệ tài sản thông tin, hãy liên hệ với chúng tôi.')); ?></p>
			<div class="cta-btns">
				<a href="<?php echo $contact; ?>" class="btn btn-light"><?php echo esc_html(vcc_field('cta_btn1', 'Gửi yêu cầu liên hệ')); ?> <span class="arr">&rarr;</span></a>
				<a href="<?php echo home_url('/privacy/'); ?>" class="btn btn-outline-light"><?php echo esc_html(vcc_field('cta_btn2', 'Xem Chính sách bảo mật')); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
