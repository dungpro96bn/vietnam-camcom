<?php
/**
 * Template Name: VCC — Liên hệ
 *
 * Structure ported from /vcc/page/contact.html. The form itself is the existing
 * Contact Form 7 (multi-step step 1); its id per language comes from ACF field
 * `cf7_id` (vi 943 / en 956 / ja 922) so WPML uses the correct translated form.
 * The CF7 form markup (the `_form` meta) was rewritten to use the .ct-form design
 * classes while keeping every CF7 tag intact, so the form keeps working.
 * Editable chrome text comes from ACF (group_vcc_contact) with Vietnamese
 * fallbacks. Page-specific CSS (.ct-*) lives in assets/css/camcom-hr.css.
 */
get_header();
$cf7_id = intval(vcc_field('cf7_id', 943));
$email  = vcc_field('contact_email', 'info_scv@sougo-career-vietnam.com');
$fb     = 'https://www.facebook.com/VIETNAM.CAMCOM';
?>

<!-- ================= PAGE HEADER ================= -->
<section class="page-head">
	<div class="hgrid" aria-hidden="true"></div>
	<div class="hglow" aria-hidden="true"></div>
	<div class="hglow two" aria-hidden="true"></div>
	<div class="container">
		<div class="ph-inner">
			<div class="ph-text reveal in" style="max-width:760px;">
				<nav class="crumb" aria-label="Breadcrumb">
					<a href="<?php echo home_url('/'); ?>"><?php echo esc_html(vcc_field('crumb_home', 'Trang chủ')); ?></a>
					<span class="sep">/</span>
					<span class="here"><?php echo esc_html(vcc_field('crumb_here', 'Liên hệ')); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html(vcc_field('ph_eye', 'Contact')); ?></span>
				<h1><?php echo nl2br(esc_html(vcc_field('ph_title', 'Liên hệ với chúng tôi'))); ?></h1>
				<p class="lead"><?php echo esc_html(vcc_field('ph_lead', 'Bạn cần tư vấn về giới thiệu nhân lực, BPO, phát triển web, mở rộng thị trường hay quản lý lao động tại Việt Nam? Điền vào biểu mẫu dưới đây — đội ngũ song ngữ Nhật–Việt của chúng tôi sẽ phản hồi trong thời gian sớm nhất.')); ?></p>
			</div>
		</div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#ffffff" d="M0,48 C240,90 480,90 720,60 C960,30 1200,10 1440,40 L1440,90 L0,90 Z"></path></svg>
	</div>
</section>

<!-- ================= CONTACT BODY ================= -->
<section>
	<div class="container">
		<div class="ct-wrap">

			<!-- FORM (Contact Form 7, step 1) -->
			<div class="ct-form reveal">
				<?php echo do_shortcode('[contact-form-7 id="' . $cf7_id . '"]'); ?>
			</div>

			<!-- ASIDE -->
			<aside class="ct-aside reveal d1">
				<div class="ct-info">
					<div class="bg-field-dark" aria-hidden="true"></div>
					<h2><?php echo esc_html(vcc_field('info_title', 'Thông tin liên hệ')); ?></h2>
					<p class="sub"><?php echo esc_html(vcc_field('info_sub', 'Bạn cũng có thể liên hệ trực tiếp với chúng tôi qua các kênh dưới đây.')); ?></p>
					<div class="irow">
						<span class="ii"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg></span>
						<div class="it"><span class="lbl"><?php echo esc_html(vcc_field('lbl_addr', 'Địa chỉ')); ?></span><span class="val"><?php echo esc_html(vcc_field('val_addr', 'Tầng 11, Văn phòng 2 – Tòa nhà Sunsquare, số 21 Lê Đức Thọ, P. Mỹ Đình 2, Q. Nam Từ Liêm, Hà Nội')); ?></span></div>
					</div>
					<div class="irow">
						<span class="ii"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.6A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.4-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2Z"/></svg></span>
						<div class="it"><span class="lbl"><?php echo esc_html(vcc_field('lbl_phone', 'Điện thoại')); ?></span><span class="val"><a href="tel:+842471094510">(+84) 24-7109-4510</a><br /><?php echo esc_html(vcc_field('phone_hours', 'Các ngày trong tuần 9:00–18:00')); ?></span></div>
					</div>
					<div class="irow">
						<span class="ii"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg></span>
						<div class="it"><span class="lbl"><?php echo esc_html(vcc_field('lbl_email', 'Email')); ?></span><span class="val"><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></span></div>
					</div>
					<div class="irow">
						<span class="ii"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.3v7A10 10 0 0 0 22 12Z"/></svg></span>
						<div class="it"><span class="lbl"><?php echo esc_html(vcc_field('lbl_social', 'Mạng xã hội')); ?></span><span class="val"><a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener"><?php echo esc_html(vcc_field('social_text', 'facebook.com/VIETNAM.CAMCOM')); ?></a></span></div>
					</div>
				</div>

				<div class="ct-iso">
					<div class="seal"><img src="/wp-content/uploads/security-logo.png" alt="ISO/IEC 27001:2022" loading="lazy" /></div>
					<div class="it">
						<b><?php echo esc_html(vcc_field('iso_title', 'ISO/IEC 27001:2022')); ?></b>
						<span><?php echo esc_html(vcc_field('iso_text', 'Hệ thống quản lý an toàn thông tin')); ?> · </span><span class="no"><?php echo esc_html(vcc_field('iso_no', 'No. 20201260018841')); ?></span>
					</div>
				</div>
			</aside>

		</div>
	</div>
</section>

<?php get_footer(); ?>
