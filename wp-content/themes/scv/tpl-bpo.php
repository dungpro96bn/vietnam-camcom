<?php
/**
 * Template Name: VCC — Dịch vụ BPO
 *
 * Structure ported from /vcc/page/bpo.html. Editable text comes from ACF
 * (group_vcc_bpo) with Vietnamese fallbacks; WPML/ACFML translates each field.
 * Assign this template to the BPO page (Page Attributes → Template).
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
					<span class="here"><?php echo esc_html(vcc_field('ph_title', 'Dịch vụ BPO')); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html(vcc_field('ph_eye', 'Service 02')); ?></span>
				<h1><?php echo esc_html(vcc_field('ph_title', 'Dịch vụ BPO')); ?></h1>
				<p class="lead"><?php echo esc_html(vcc_field('ph_lead', 'Trên nền tảng đội ngũ chuyên gia tổng hợp dữ liệu lớn tại Nhật Bản, chúng tôi vận hành offshore tại Việt Nam — cung cấp dịch vụ nhập liệu, hỗ trợ văn phòng, dữ liệu hóa tính lương và chấm công nhanh chóng, chất lượng cao.')); ?></p>
				<div class="hero-cta">
					<a href="#data-entry" class="btn btn-light"><?php echo esc_html(vcc_field('ph_cta1', 'Khám phá dịch vụ')); ?> <span class="arr">&rarr;</span></a>
					<a href="<?php echo $contact; ?>" class="btn btn-outline-light"><?php echo esc_html(vcc_field('ph_cta2', 'Liên hệ tư vấn')); ?></a>
				</div>
			</div>
			<div class="ph-media reveal in d1">
				<div class="frame">
					<img src="/wp-content/uploads/bpo_mainImg_pc.png" alt="Dịch vụ BPO VIETNAM CAMCOM" loading="eager" />
				</div>
				<div class="float-badge">
					<span class="fb-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 6 9 17l-5-5"/></svg></span>
					<div><b><?php echo esc_html(vcc_field('fb_value', '2 lần')); ?></b><span><?php echo esc_html(vcc_field('fb_label', 'Nhập liệu kép · độ chính xác cao')); ?></span></div>
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
		<a href="#data-entry" class="tab active"><span class="tn">01</span> <?php echo esc_html(vcc_field('tab1', 'Nhập dữ liệu')); ?></a>
		<a href="#office-support" class="tab"><span class="tn">02</span> <?php echo esc_html(vcc_field('tab2', 'Hỗ trợ văn phòng')); ?></a>
	</div>
</div>

<!-- ================= DATA ENTRY ================= -->
<section>
	<span id="data-entry" class="anchor"></span>
	<div class="container">
		<div class="hr-intro" style="margin-bottom:8px;">
			<div class="reveal">
				<span class="eyebrow"><?php echo esc_html(vcc_field('de_eyebrow', 'Data Entry')); ?></span>
				<h2><?php echo esc_html(vcc_field('de_title', 'Nhập dữ liệu chính xác & tiết kiệm')); ?></h2>
				<p><?php echo vcc_field('de_text', 'Ngoài dữ liệu dạng số, chúng tôi còn hỗ trợ nhập liệu tiếng Nhật (tên, địa chỉ…). Dịch vụ dựa trên nguyên tắc <strong>nhập kép — nhập cùng một dữ liệu hai lần</strong>, mang lại độ chính xác và chất lượng ổn định với chi phí thấp.'); ?></p>
			</div>
			<?php
			$figs = vcc_list('de_figures', array('value', 'label', 'coral'), array(
				array('value' => '2',  'label' => 'Lần nhập kiểm chứng mỗi dữ liệu', 'coral' => false),
				array('value' => 'JP', 'label' => 'Hỗ trợ nhập liệu tiếng Nhật',       'coral' => true),
				array('value' => '6',  'label' => 'Nhóm tài liệu xử lý được',          'coral' => false),
				array('value' => '↓',  'label' => 'Chi phí thấp nhờ offshore',         'coral' => false),
			));
			?>
			<div class="hr-figures reveal d1">
				<?php foreach ($figs as $f) :
					$is_num = is_numeric($f['value']); ?>
				<div class="hr-fig<?php echo !empty($f['coral']) ? ' coral' : ''; ?>">
					<div class="fv"><?php if ($is_num) : ?><span data-count="<?php echo esc_attr($f['value']); ?>"><?php echo esc_html($f['value']); ?></span><?php else : ?><span class="u"><?php echo esc_html($f['value']); ?></span><?php endif; ?></div>
					<div class="fl"><?php echo esc_html($f['label']); ?></div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<?php
		$de_imgs = array('bpo_icon01_pc.png','bpo_icon02_pc.png','bpo_icon03_pc.png','bpo_icon04_pc.png','bpo_icon05_pc.png','bpo_icon06_pc.png');
		$cards = vcc_list('de_cards', array('title', 'text'), array(
			array('title' => 'Tài liệu đa dạng', 'text' => 'Nhập liệu & số hóa phiếu đặt hàng, phiếu giao hàng, hóa đơn và nhiều loại chứng từ khác.'),
			array('title' => 'Thông tin sản phẩm', 'text' => 'Nhập liệu & số hóa dữ liệu danh mục, danh sách sản phẩm cho doanh nghiệp.'),
			array('title' => 'Thông tin cá nhân & công ty', 'text' => 'Danh thiếp, bưu thiếp, danh sách khách hàng, biên lai, đơn đăng ký, sơ yếu lý lịch…'),
			array('title' => 'Bảng khảo sát', 'text' => 'Nhập & phân tích dữ liệu, hỗ trợ trực quan hóa vấn đề và xây dựng chiến lược bán hàng tối ưu.'),
			array('title' => 'Chú thích – Sản phẩm', 'text' => 'Gắn tag, từ khóa, nhãn kinh doanh cho sản phẩm theo đúng yêu cầu của khách hàng.'),
			array('title' => 'Chú thích – Gắn thẻ địa điểm', 'text' => 'Gắn thẻ, nhãn theo sản phẩm và địa điểm chụp ảnh phục vụ các bài toán dữ liệu hình ảnh.'),
		));
		?>
		<div class="strengths six" style="margin-top:48px;">
			<?php foreach ($cards as $i => $c) : ?>
			<article class="str-card reveal<?php echo ($i % 3) ? ' d' . ($i % 3) : ''; ?>">
				<span class="num"><?php echo sprintf('%02d', $i + 1); ?></span>
				<div class="ic img"><img src="/wp-content/uploads/<?php echo $de_imgs[$i % count($de_imgs)]; ?>" alt="" loading="lazy" /></div>
				<h3><?php echo esc_html($c['title']); ?></h3>
				<p><?php echo esc_html($c['text']); ?></p>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= OFFICE SUPPORT ================= -->
<section style="background:var(--bg-soft);border-block:1px solid var(--line);">
	<span id="office-support" class="anchor"></span>
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('os_eyebrow', 'Office Support')); ?></span>
			<h2><?php echo esc_html(vcc_field('os_title', 'Hỗ trợ văn phòng')); ?></h2>
			<p class="lead"><?php echo esc_html(vcc_field('os_lead', 'Cung cấp dịch vụ và hỗ trợ các nghiệp vụ đặc thù, chuyên biệt theo từng quy trình kinh doanh của khách hàng.')); ?></p>
		</div>

		<?php
		$feat_imgs = array('bpo_image05_pc.png', 'bpo_image06_pc.png', 'bpo_image07_pc.png');
		// feat-tag icons (theo thứ tự: Payroll · Year-end · Resident Tax)
		$feat_icons = array(
			'<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v10M9.5 9.5h4a1.5 1.5 0 0 1 0 3h-3a1.5 1.5 0 0 0 0 3h4"/></svg>',
			'<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>',
			'<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/></svg>',
		);
		$features = vcc_list('os_features', array('tag', 'title', 'text', 'list'), array(
			array('tag' => 'Payroll', 'title' => 'Dịch vụ tính lương',
				'text' => 'Quản lý người Nhật am hiểu Luật Lao động và Luật Thuế thu nhập Nhật Bản trực tiếp chỉ đạo, giám sát công việc — nên bạn hoàn toàn yên tâm ngay cả khi ủy thác xử lý dữ liệu ở nước ngoài.',
				'list' => "Không chỉ chấm công — còn tiếp nhận thông tin & biên lai bảo hiểm, nhân sự, kế toán.\nĐề xuất phương án phù hợp theo biểu mẫu & yêu cầu riêng, không gò bó như dịch vụ ASP cố định.\nPhần việc liên quan bảo hiểm do nhân viên xã hội tại Nhật Bản của chúng tôi đảm nhận."),
			array('tag' => 'Year-end', 'title' => 'Điều chỉnh thuế cuối năm',
				'text' => 'Mùa cao điểm bận rộn nhất của bộ phận nhân sự & tổng vụ. Chúng tôi tạo dữ liệu điều chỉnh thuế cuối năm để giảm tải nhân sự và chi phí nhân công cho doanh nghiệp.',
				'list' => "Dùng riêng lẻ được, nhưng tối ưu hơn khi kết hợp với dịch vụ tính lương.\nHỗ trợ khai báo trên WEB — dùng được cả máy tính lẫn điện thoại, nhanh & chính xác.\nDữ liệu xác minh nhiều lần, phù hợp hệ thống tính lương hiện tại, chi phí offshore thấp."),
			array('tag' => 'Resident Tax', 'title' => 'Cập nhật thuế cư trú đặc biệt',
				'text' => 'Ngay sau điều chỉnh thuế cuối năm là giai đoạn cập nhật thuế cư trú — trùng với nhiều thay đổi nhân sự, tăng lương, bảo hiểm xã hội và chuẩn bị thưởng hè.',
				'list' => "Tiếp nhận xử lý dù chỉ là làm mới dữ liệu thuế cư trú đặc biệt.\nDữ liệu xác minh nhiều lần, hạn chế tối đa sai lệch.\nTạo dữ liệu phù hợp phần mềm bảng lương, dựa trên offshore để tối ưu chi phí."),
		));
		?>
		<?php foreach ($features as $i => $ft) :
			$flip = ($i % 2 === 1); ?>
		<div class="feature<?php echo $flip ? ' flip' : ''; ?>"<?php echo $i ? ' style="margin-top:64px;"' : ''; ?>>
			<div class="<?php echo $flip ? 'feat-media' : 'feature-media'; ?> reveal">
				<div class="frame"><img src="/wp-content/uploads/<?php echo $feat_imgs[$i % count($feat_imgs)]; ?>" alt="<?php echo esc_attr($ft['title']); ?>" loading="lazy" /></div>
			</div>
			<div class="feature-copy reveal d1">
				<span class="feat-tag"><?php echo isset($feat_icons[$i]) ? $feat_icons[$i] : ''; ?> <?php echo esc_html($ft['tag']); ?></span>
				<h2><?php echo esc_html($ft['title']); ?></h2>
				<p><?php echo esc_html($ft['text']); ?></p>
				<ul class="feat-list">
					<?php foreach (preg_split('/\r\n|\r|\n/', (string) $ft['list']) as $line) : if (trim($line) === '') continue; ?>
					<li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6 9 17l-5-5"/></svg></span><?php echo esc_html(trim($line)); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php endforeach; ?>

		<div class="feature-media reveal" style="margin-top:56px;">
			<div class="frame" style="aspect-ratio:auto;border:1px solid var(--line);box-shadow:var(--shadow-sm);">
				<img src="/wp-content/uploads/bpo_vi_image08_pc.png" alt="Quy trình dịch vụ BPO" loading="lazy" style="width:100%;height:auto;display:block;" />
			</div>
		</div>
	</div>
</section>

<!-- ================= CONTACT CTA ================= -->
<section id="contact">
	<div class="container">
		<div class="cta-wrap reveal">
			<div class="hglow" aria-hidden="true"></div>
			<h2><?php echo esc_html(vcc_field('cta_title', 'Tối ưu quy trình với dịch vụ BPO')); ?></h2>
			<p><?php echo esc_html(vcc_field('cta_text', 'Hãy để chúng tôi đồng hành cùng bộ phận nhân sự, kế toán và vận hành của bạn. Liên hệ ngay để nhận tư vấn phù hợp với quy trình riêng của doanh nghiệp.')); ?></p>
			<div class="cta-btns">
				<a href="<?php echo $contact; ?>" class="btn btn-light"><?php echo esc_html(vcc_field('cta_btn1', 'Gửi yêu cầu liên hệ')); ?> <span class="arr">&rarr;</span></a>
				<a href="<?php echo home_url('/#services'); ?>" class="btn btn-outline-light"><?php echo esc_html(vcc_field('cta_btn2', 'Xem các dịch vụ khác')); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
