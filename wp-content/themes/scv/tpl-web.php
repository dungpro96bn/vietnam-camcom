<?php
/**
 * Template Name: VCC — Phát triển WEB & nội dung
 *
 * Structure ported from /vcc/page/web.html. Editable text comes from ACF
 * (group_vcc_web) with Vietnamese fallbacks; WPML/ACFML translates each field.
 * Assign this template to the "Phát triển WEB" page (Page Attributes → Template).
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
					<span class="here"><?php echo esc_html(vcc_field('crumb_here', 'Phát triển WEB & nội dung')); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html(vcc_field('ph_eye', 'Service 03')); ?></span>
				<h1><?php echo nl2br(esc_html(vcc_field('ph_title', "Phát triển WEB\n& sáng tạo nội dung"))); ?></h1>
				<p class="lead"><?php echo esc_html(vcc_field('ph_lead', 'Dịch vụ phát triển WEB và sáng tạo nội dung ứng dụng công nghệ Nhật Bản, được thực hiện bởi đội ngũ nhân lực trẻ và tài năng của Việt Nam.')); ?></p>
				<div class="hero-cta">
					<a href="#website-production" class="btn btn-light"><?php echo esc_html(vcc_field('ph_cta1', 'Khám phá dịch vụ')); ?> <span class="arr">&rarr;</span></a>
					<a href="<?php echo $contact; ?>" class="btn btn-outline-light"><?php echo esc_html(vcc_field('ph_cta2', 'Liên hệ tư vấn')); ?></a>
				</div>
			</div>
			<div class="ph-media reveal in d1">
				<div class="frame">
					<img src="/wp-content/uploads/web_mainImg_pc.png" alt="Phát triển WEB và sáng tạo nội dung" loading="eager" />
				</div>
				<div class="float-badge">
					<span class="fb-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="m18 16 4-4-4-4M6 8l-4 4 4 4M14.5 4l-5 16"/></svg></span>
					<div><b><?php echo esc_html(vcc_field('fb_value', 'JP × VN')); ?></b><span><?php echo esc_html(vcc_field('fb_label', 'Công nghệ Nhật · nhân lực Việt')); ?></span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#ffffff" d="M0,48 C240,90 480,90 720,60 C960,30 1200,10 1440,40 L1440,90 L0,90 Z"></path></svg>
	</div>
</section>

<!-- ================= POINTS ================= -->
<?php
$points = vcc_list('points', array('title', 'text'), array(
	array('title' => 'Point 1 — Chất lượng Nhật Bản', 'text' => 'Cung cấp dịch vụ tại Việt Nam nhưng vẫn đảm bảo tiêu chuẩn chất lượng của Nhật Bản trong từng sản phẩm.'),
	array('title' => 'Point 2 — Mạng lưới trong & ngoài nước', 'text' => 'Củng cố các cơ sở chi nhánh trong và ngoài nước, đáp ứng và đảm bảo nhu cầu cũng như lợi ích của khách hàng ở Nhật Bản và quốc tế.'),
));
?>
<section style="padding-bottom:40px;">
	<div class="container">
		<div class="hr-cards reveal">
			<?php foreach ($points as $p) : ?>
			<article class="hr-card" style="flex-direction:row;align-items:center;gap:0;">
				<div class="body">
					<h3><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6 9 17l-5-5"/></svg></span><?php echo esc_html($p['title']); ?></h3>
					<p><?php echo esc_html($p['text']); ?></p>
				</div>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= SECTION TABS ================= -->
<div class="svc-tabs">
	<div class="container">
		<a href="#website-production" class="tab active"><span class="tn">01</span> <?php echo esc_html(vcc_field('tab1', 'Sản xuất website')); ?></a>
		<a href="#lab-development" class="tab"><span class="tn">02</span> <?php echo esc_html(vcc_field('tab2', 'Phát triển ở nước ngoài')); ?></a>
		<a href="#editing-processing" class="tab"><span class="tn">03</span> <?php echo esc_html(vcc_field('tab3', 'Biên tập / xử lý video')); ?></a>
	</div>
</div>

<!-- ================= WEBSITE PRODUCTION ================= -->
<section>
	<span id="website-production" class="anchor"></span>
	<div class="container">
		<div class="feature">
			<div class="feature-media reveal">
				<div class="frame"><img src="/wp-content/uploads/web_image01_pc.png" alt="Sản xuất website" loading="lazy" /></div>
			</div>
			<div class="feature-copy reveal d1">
				<span class="feat-tag"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 9h20"/></svg> <?php echo esc_html(vcc_field('wp_tag', 'Website')); ?></span>
				<h2><?php echo esc_html(vcc_field('wp_title', 'Sản xuất website')); ?></h2>
				<p><?php echo esc_html(vcc_field('wp_text', 'Tạo website tại Việt Nam mà vẫn đảm bảo chất lượng Nhật Bản — từ Landing Page, WordPress đơn giản đến các trang dùng CMS kèm hỗ trợ cập nhật dài hạn.')); ?></p>
				<ul class="feat-list">
					<?php foreach (preg_split('/\r\n|\r|\n/', (string) vcc_field('wp_list', "Website tiếng Nhật do Designer người Nhật thiết kế; cũng đáp ứng phong cách hướng người dùng Việt Nam.\nWebsite đa ngôn ngữ cho doanh nghiệp kinh doanh quốc tế hoặc đang mở rộng ra nước ngoài.\nCung cấp bản dịch tiếng Việt, tiếng Anh và tiếng Indonesia.")) as $line) : if (trim($line) === '') continue; ?>
					<li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6 9 17l-5-5"/></svg></span><?php echo esc_html(trim($line)); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<div class="section-head reveal" style="margin-top:64px;margin-bottom:0;">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('portfolio_eyebrow', 'Portfolio')); ?></span>
			<h2><?php echo esc_html(vcc_field('portfolio_title', 'Sản phẩm tiêu biểu')); ?></h2>
		</div>
		<div class="gallery reveal">
			<?php for ($i = 1; $i <= 6; $i++) : ?>
			<div class="g-item"><img src="/wp-content/uploads/slider_img0<?php echo $i; ?>.png" alt="Sản phẩm website <?php echo $i; ?>" loading="lazy" /></div>
			<?php endfor; ?>
		</div>
	</div>
</section>

<!-- ================= LAB DEVELOPMENT ================= -->
<section style="background:var(--bg-soft);border-block:1px solid var(--line);">
	<span id="lab-development" class="anchor"></span>
	<div class="container">
		<div class="feature flip">
			<div class="feat-media reveal">
				<div class="frame"><img src="/wp-content/uploads/web_image02_pc.png" alt="Phát triển offshore tại Việt Nam" loading="lazy" /></div>
			</div>
			<div class="feature-copy reveal d1">
				<span class="feat-tag"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 3v6l-5 9a2 2 0 0 0 1.8 3h12.4a2 2 0 0 0 1.8-3l-5-9V3"/><path d="M8 3h8"/></svg> <?php echo esc_html(vcc_field('lab_tag', 'Offshore Lab')); ?></span>
				<h2><?php echo esc_html(vcc_field('lab_title', 'Phát triển ở nước ngoài')); ?></h2>
				<p><?php echo esc_html(vcc_field('lab_text', 'Là một trong những giải pháp cho tình trạng thiếu hụt kỹ sư CNTT tại Nhật Bản, phát triển offshore tại Việt Nam đang là xu thế. Thành lập công ty con tại địa phương tốn nhiều thời gian, chi phí và thủ tục pháp lý phức tạp — mô hình lab giúp bạn tránh điều đó.')); ?></p>
			</div>
		</div>
		<?php
		$lab_imgs = array('web_icon01_pc.png', 'web_icon02_pc.png');
		$lab_cards = vcc_list('lab_cards', array('title', 'text'), array(
			array('title' => 'Dễ dàng', 'text' => 'Với mô hình lab ở nước ngoài, bạn đảm bảo được nguồn lực kỹ sư mà không cần thành lập công ty địa phương, và dễ dàng triển khai phát triển.'),
			array('title' => 'Hiệu quả & nhanh chóng', 'text' => 'Ngay cả khi muốn thành lập công ty con tại địa phương, bạn vẫn có thể tiến hành kinh doanh tại Việt Nam ngay trong giai đoạn chuẩn bị.'),
		));
		?>
		<div class="strengths duo" style="margin-top:48px;">
			<?php foreach ($lab_cards as $i => $c) : ?>
			<article class="str-card reveal<?php echo $i ? ' d' . $i : ''; ?>">
				<div class="ic img"><img src="/wp-content/uploads/<?php echo $lab_imgs[$i % count($lab_imgs)]; ?>" alt="" loading="lazy" /></div>
				<h3><?php echo esc_html($c['title']); ?></h3>
				<p><?php echo esc_html($c['text']); ?></p>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= VIDEO EDITING ================= -->
<section>
	<span id="editing-processing" class="anchor"></span>
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('video_eyebrow', 'Video')); ?></span>
			<h2><?php echo esc_html(vcc_field('video_title', 'Biên tập / xử lý video')); ?></h2>
			<p class="lead"><?php echo esc_html(vcc_field('video_lead', 'Quay tại Nhật, dựng & hoàn thiện tại Việt Nam — sản phẩm video chất lượng cao, chi phí hợp lý.')); ?></p>
		</div>
		<?php
		$video_imgs = array('web_icon03_pc.png', 'web_icon04_pc.png', 'web_icon05_pc.png');
		$video_cards = vcc_list('video_cards', array('title', 'text'), array(
			array('title' => 'Xu hướng', 'text' => 'Trái với Nhật Bản đang già hóa dân số, Việt Nam ngày càng có nhiều người trẻ làm sáng tạo nội dung và dựng video.'),
			array('title' => 'Chất lượng cao', 'text' => 'Quay video tại Nhật và biên tập, hoàn thiện tại Việt Nam — sản phẩm chất lượng cao, chi phí thấp mà vẫn tự nhiên, phù hợp.'),
			array('title' => 'Hỗ trợ tiếng Nhật', 'text' => 'Người Việt am hiểu tiếng Nhật phụ trách và được người Nhật kiểm tra lại một lần nữa, đảm bảo chất lượng sản phẩm.'),
		));
		?>
		<div class="strengths">
			<?php foreach ($video_cards as $i => $c) : ?>
			<article class="str-card reveal<?php echo $i ? ' d' . $i : ''; ?>">
				<div class="ic img"><img src="/wp-content/uploads/<?php echo $video_imgs[$i % count($video_imgs)]; ?>" alt="" loading="lazy" /></div>
				<h3><?php echo esc_html($c['title']); ?></h3>
				<p><?php echo esc_html($c['text']); ?></p>
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
			<h2><?php echo esc_html(vcc_field('cta_title', 'Bắt đầu dự án WEB & nội dung của bạn')); ?></h2>
			<p><?php echo esc_html(vcc_field('cta_text', 'Dù là một Landing Page, hệ thống CMS, đội ngũ phát triển offshore hay sản phẩm video — chúng tôi sẵn sàng đồng hành. Liên hệ để nhận tư vấn phù hợp.')); ?></p>
			<div class="cta-btns">
				<a href="<?php echo $contact; ?>" class="btn btn-light"><?php echo esc_html(vcc_field('cta_btn1', 'Gửi yêu cầu liên hệ')); ?> <span class="arr">&rarr;</span></a>
				<a href="<?php echo home_url('/#services'); ?>" class="btn btn-outline-light"><?php echo esc_html(vcc_field('cta_btn2', 'Xem các dịch vụ khác')); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
