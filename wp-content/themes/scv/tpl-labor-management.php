<?php
/**
 * Template Name: VCC — Hỗ trợ quản lý lao động
 *
 * Structure ported from /vcc/page/labor-management.html. Editable text comes
 * from ACF (group_vcc_labor) with Vietnamese fallbacks; WPML translates each
 * field per language post. Page-specific CSS (.lm-* / .faq) lives in
 * assets/css/camcom-hr.css, loaded globally in header.php. Assign this template
 * to the labor-management page (vi/en/ja).
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
					<span class="here"><?php echo esc_html(vcc_field('crumb_here', 'Hỗ trợ quản lý lao động')); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html(vcc_field('ph_eye', 'Service 05')); ?></span>
				<h1><?php echo nl2br(esc_html(vcc_field('ph_title', "Hỗ trợ quản lý\nlao động doanh nghiệp"))); ?></h1>
				<p class="lead"><?php echo esc_html(vcc_field('ph_lead', 'Kinh nghiệm làm việc cùng hơn 5.000 công ty phái cử tại Nhật, nay mở rộng quy mô tại Việt Nam. Nhân viên người Việt soạn hợp đồng lao động, tính bảng lương và xử lý bảo hiểm xã hội dưới sự chỉ đạo của quản lý người Nhật — duy trì chất lượng chuẩn Nhật, hỗ trợ song ngữ Nhật–Việt.')); ?></p>
				<div class="hero-cta">
					<a href="#why" class="btn btn-light"><?php echo esc_html(vcc_field('ph_cta1', 'Khám phá dịch vụ')); ?> <span class="arr">&rarr;</span></a>
					<a href="#contact" class="btn btn-outline-light"><?php echo esc_html(vcc_field('ph_cta2', 'Liên hệ tư vấn')); ?></a>
				</div>
			</div>
			<div class="ph-media reveal in d1">
				<div class="frame">
					<img src="/wp-content/uploads/labor-management-1.png" alt="Hỗ trợ quản lý lao động doanh nghiệp" loading="eager" />
				</div>
				<div class="float-badge">
					<span class="fb-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13l2 2 4-4"/></svg></span>
					<div><b><?php echo esc_html(vcc_field('fb_value', '5.000+')); ?></b><span><?php echo esc_html(vcc_field('fb_label', 'công ty phái cử đồng hành')); ?></span></div>
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
					<span class="lc-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 11l3 3 8-8"/><path d="M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h9"/></svg></span>
					<b><?php echo esc_html(vcc_field('intro_chip', 'One-stop Labor Management')); ?></b>
				</span>
				<h2><?php echo esc_html(vcc_field('intro_title', 'Quản lý lao động chuẩn Nhật, vận hành ngay tại Việt Nam')); ?></h2>
				<p><?php echo esc_html(vcc_field('intro_text', 'Quản lý lao động tại một quốc gia có nền văn hóa và hệ thống pháp luật khác biệt luôn tiềm ẩn rủi ro. Chúng tôi đảm nhận trọn gói — từ hợp đồng lao động, tính lương, bảo hiểm xã hội đến thuế thu nhập — với chất lượng đồng nhất cùng phía Nhật, giúp giảm tối đa gánh nặng cho doanh nghiệp của bạn.')); ?></p>
			</div>
			<?php
			$figs = vcc_list('figures', array('fv', 'fl', 'coral'), array(
				array('fv' => '5.000<span class="u">+</span>',          'fl' => 'Công ty phái cử Nhật từng đồng hành cùng chúng tôi', 'coral' => false),
				array('fv' => 'JP<span class="u">×</span>VN',            'fl' => 'Quản lý người Nhật chỉ đạo, nhân viên Việt thực thi', 'coral' => true),
				array('fv' => '2<span class="u"> ngôn ngữ</span>',        'fl' => 'Hỗ trợ song ngữ Nhật–Việt cho mọi liên lạc & biểu mẫu', 'coral' => false),
				array('fv' => 'ASP',                                     'fl' => 'Quản lý lương & nhân sự tập trung, truy cập mọi lúc', 'coral' => false),
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
			<span class="bspark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3 8-8"/><path d="M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h9"/></svg></span>
			<p><?php echo vcc_field('banner', 'Soạn thảo <span class="accent">hợp đồng lao động, tính lương &amp; bảo hiểm xã hội</span> — vận hành dưới sự chỉ đạo của quản lý người Nhật, hỗ trợ bằng cả tiếng Nhật và tiếng Việt.'); ?></p>
		</div>
	</div>
</section>

<!-- ================= SECTION TABS ================= -->
<div class="svc-tabs">
	<div class="container">
		<a href="#why" class="tab active"><span class="tn">01</span> <?php echo esc_html(vcc_field('tab1', 'Dịch vụ một cửa')); ?></a>
		<a href="#cases" class="tab"><span class="tn">02</span> <?php echo esc_html(vcc_field('tab2', 'Câu chuyện khách hàng')); ?></a>
		<a href="#services" class="tab"><span class="tn">03</span> <?php echo esc_html(vcc_field('tab3', 'Dịch vụ chính')); ?></a>
		<a href="#faq" class="tab"><span class="tn">04</span> <?php echo esc_html(vcc_field('tab4', 'Câu hỏi thường gặp')); ?></a>
	</div>
</div>

<!-- ================= 01 WHY / ONE-STOP ================= -->
<section>
	<span id="why" class="anchor"></span>
	<div class="container">
		<div class="feature">
			<div class="feature-media reveal">
				<div class="frame"><img src="/wp-content/themes/scv/images/labor-management/reason_vn.png" alt="Những vấn đề khi quản lý lao động ở quốc gia có văn hóa khác biệt" loading="lazy" /></div>
			</div>
			<div class="feature-copy reveal d1">
				<span class="feat-tag"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4M12 17h.01M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> <?php echo esc_html(vcc_field('why_tag', 'Vấn đề thường gặp')); ?></span>
				<h2><?php echo esc_html(vcc_field('why_title', 'Quản lý lao động ở quốc gia khác văn hóa luôn cần được chú trọng')); ?></h2>
				<p><?php echo esc_html(vcc_field('why_text', 'Khác biệt về pháp luật, thuế và ngôn ngữ khiến doanh nghiệp dễ rơi vào tình trạng "hộp đen" trong quản lý nhân sự và tiền lương. Dịch vụ một cửa của VIETNAM CAMCOM giải quyết toàn bộ bằng quy trình minh bạch, chuẩn Nhật.')); ?></p>
				<ul class="feat-list">
					<?php foreach (preg_split('/\r\n|\r|\n/', (string) vcc_field('why_list', "Khó nắm bắt hệ thống pháp luật & thủ tục tại địa phương\nThiếu nhân sự thông thạo tiếng Nhật trong nội bộ\nRủi ro sai sót, gian lận khi giao phó hoàn toàn cho một phía")) as $line) : if (trim($line) === '') continue; ?>
					<li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6 9 17l-5-5"/></svg></span><?php echo esc_html(trim($line)); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<!-- one-stop heading -->
		<div class="section-head reveal" style="max-width:none;margin:64px 0 28px;text-align:left;">
			<span class="eyebrow"><?php echo esc_html(vcc_field('onestop_eyebrow', 'Dịch vụ một cửa')); ?></span>
			<h2 style="font-size:clamp(24px,2.8vw,34px);"><?php echo esc_html(vcc_field('onestop_title', 'Hỗ trợ quản lý lao động qua bốn cam kết')); ?></h2>
		</div>
		<?php
		$stop_icons = array(
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M8 9h8M8 13h5"/></svg>',
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M3 6l9-3 9 3M4 10v8m16-8v8M3 18h18M3 22h18"/><path d="M8 10v8M16 10v8"/></svg>',
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4M7 8h4M7 12h7"/></svg>',
			'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="M9 12l2 2 4-4"/></svg>',
		);
		$stop_delays = array('', ' d1', '', ' d1');
		$stops = vcc_list('stops', array('title', 'text'), array(
			array('title' => 'Hỗ trợ bằng tiếng Nhật',        'text' => 'Mọi liên lạc được trả lời bằng tiếng Nhật. Biểu mẫu viết song song Việt–Nhật hoặc Việt–Anh; thủ tục hành chính kèm bản giải thích riêng bằng tiếng Nhật.'),
			array('title' => 'Đáp ứng pháp luật & thuế',      'text' => 'Kịp thời điều chỉnh bảo hiểm và thuế thu nhập khi tăng lương, hay khi tỷ lệ bảo hiểm và thu nhập chịu thuế thay đổi do sửa đổi pháp luật.'),
			array('title' => 'Chia sẻ thông tin qua phần mềm', 'text' => 'Ứng dụng lập trình theo quy trình chuẩn xác. Thông tin nhân viên và lương quản lý tích hợp qua ASP, cho phép kiểm tra và tải dữ liệu từ ngoài Việt Nam bất cứ lúc nào.'),
			array('title' => 'An toàn về mặt bảo mật',        'text' => 'Ra vào văn phòng bằng nhận diện vân tay, đảm bảo không có sự xâm nhập của người ngoài, luôn nâng cao ý thức quản lý thông tin cá nhân cho nhân viên.'),
		));
		?>
		<div class="strengths lm-stops">
			<?php foreach ($stops as $i => $s) : ?>
			<article class="str-card reveal<?php echo isset($stop_delays[$i]) ? $stop_delays[$i] : ''; ?>">
				<span class="num"><?php printf('%02d', $i + 1); ?></span>
				<div class="ic"><?php echo $stop_icons[$i % count($stop_icons)]; ?></div>
				<h3><?php echo esc_html($s['title']); ?></h3>
				<p><?php echo esc_html($s['text']); ?></p>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= 02 CUSTOMER CASES ================= -->
<section style="background:var(--bg-soft);border-block:1px solid var(--line);">
	<span id="cases" class="anchor"></span>
	<div class="container">
		<div class="lm-intro-band reveal">
			<span class="logo-chip" style="margin:0;">
				<span class="lc-ic" style="background:var(--grad-warm);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 21s-7-4.5-7-10a4 4 0 0 1 7-2.6A4 4 0 0 1 19 11c0 5.5-7 10-7 10Z"/></svg></span>
				<b><?php echo esc_html(vcc_field('cases_chip', '100 công ty tin dùng')); ?></b>
			</span>
			<h2 style="font-size:clamp(26px,3vw,38px);"><?php echo esc_html(vcc_field('cases_title', 'Giảm bớt gánh nặng quản lý lao động')); ?></h2>
		</div>
		<?php
		$case_avatars = array(
			'/wp-content/themes/scv/images/labor-management/avt1.png',
			'/wp-content/themes/scv/images/labor-management/avt2.png',
		);
		$case_delays = array('', ' d1');
		$lbl_problem = vcc_field('case_lbl_problem', 'Vấn đề');
		$lbl_result  = vcc_field('case_lbl_result', 'Hiệu quả sau khi sử dụng');
		$cases = vcc_list('cases', array('casek', 'name', 'problem', 'result'), array(
			array(
				'casek'   => 'CASE 01',
				'name'    => '◯◯ Công ty',
				'problem' => 'Khi thành lập công ty tại Việt Nam, doanh nghiệp muốn quản lý các vấn đề liên quan từ phía công ty Nhật Bản. Tuy nhiên, công ty mẹ gặp khó khăn trong việc hiểu hệ thống pháp luật và thủ tục tại Việt Nam, đồng thời không có nhân viên nào biết tiếng Việt trong nội bộ.',
				'result'  => 'Toàn bộ hệ thống pháp luật và thủ tục tại Việt Nam được giải thích bằng tiếng Nhật, giúp quá trình diễn ra thuận lợi. Tài liệu lương lập bằng cả tiếng Việt và tiếng Nhật, giao dịch hằng ngày qua email cũng bằng tiếng Nhật — dễ dàng làm việc như với công ty con trong nước.',
			),
			array(
				'casek'   => 'CASE 02',
				'name'    => '◯◯ Công ty',
				'problem' => 'Doanh nghiệp tự tính lương nội bộ, nhưng kế toán trưởng và nhân viên phụ trách nghỉ việc khiến bàn giao không suôn sẻ, phát sinh nhiều lỗi xử lý. Việc quản lý chủ yếu giao cho người Việt gây ra tình trạng "hộp đen" với nhiều hành vi gian lận như khai khống giờ làm thêm và phụ cấp.',
				'result'  => 'Nhờ thuê ngoài, doanh nghiệp không cần nhân sự phụ trách nội bộ, giảm gánh nặng cập nhật quy định pháp luật thường xuyên thay đổi. VIETNAM CAMCOM kiểm tra chi tiết với chất lượng tương đương tại Nhật, làm rõ nội dung và loại bỏ gian lận — giúp doanh nghiệp yên tâm và tập trung vào hoạt động kinh doanh cốt lõi.',
			),
		));
		?>
		<div class="lm-cases">
			<?php foreach ($cases as $i => $c) : ?>
			<article class="lm-case reveal<?php echo isset($case_delays[$i]) ? $case_delays[$i] : ''; ?>">
				<div class="ch">
					<img class="avt" src="<?php echo esc_url(isset($case_avatars[$i]) ? $case_avatars[$i] : $case_avatars[0]); ?>" alt="" loading="lazy" />
					<div class="cn"><span class="casek"><?php echo esc_html($c['casek']); ?></span><b><?php echo esc_html($c['name']); ?></b></div>
				</div>
				<div class="lm-block">
					<span class="bl-label problem"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 9v4M12 17h.01M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> <?php echo esc_html($lbl_problem); ?></span>
					<p><?php echo esc_html($c['problem']); ?></p>
				</div>
				<div class="lm-block">
					<span class="bl-label result"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20 6 9 17l-5-5"/></svg> <?php echo esc_html($lbl_result); ?></span>
					<p><?php echo esc_html($c['result']); ?></p>
				</div>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= 03 MAIN SERVICES ================= -->
<section>
	<span id="services" class="anchor"></span>
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('svc_eyebrow', 'Dịch vụ chính')); ?></span>
			<h2><?php echo esc_html(vcc_field('svc_title', 'Trọn gói nghiệp vụ quản lý lao động')); ?></h2>
			<p class="lead"><?php echo esc_html(vcc_field('svc_lead', 'Từ hợp đồng, bảng lương đến bảo hiểm và thuế thu nhập — tất cả được xử lý chính xác, minh bạch và đúng quy định.')); ?></p>
		</div>
		<?php
		$svc_icons = array(
			'/wp-content/themes/scv/images/labor-management/ic01.png',
			'/wp-content/themes/scv/images/labor-management/ic02.png',
			'/wp-content/themes/scv/images/labor-management/ic03.png',
			'/wp-content/themes/scv/images/labor-management/ic04.png',
		);
		$svc_delays = array('', ' d1', ' d2', ' d3');
		$services = vcc_list('services', array('title', 'list'), array(
			array('title' => 'Hợp đồng lao động', 'list' => "Tạo hợp đồng thử việc\nTạo hợp đồng lao động\nSửa đổi hợp đồng"),
			array('title' => 'Tính toán bảng lương', 'list' => "Tính lương hàng tháng (gồm thuế & bảo hiểm)\nTạo bảng lương chi tiết\nTạo bảng lương tổng hợp\nTính toán thưởng"),
			array('title' => 'Thủ tục bảo hiểm', 'list' => "Thủ tục tham gia & chấm dứt bảo hiểm\nTrợ cấp ốm đau, thai sản\nĐơn xin nghỉ thai sản"),
			array('title' => 'Thuế thu nhập', 'list' => "Tạo báo cáo thuế hàng quý\nQuyết toán thuế thu nhập hàng năm\nĐăng ký mã số thuế cá nhân\nĐơn xin miễn giảm thuế"),
		));
		?>
		<div class="lm-svcs">
			<?php foreach ($services as $i => $s) : ?>
			<article class="lm-sv reveal<?php echo isset($svc_delays[$i]) ? $svc_delays[$i] : ''; ?>">
				<div class="svic"><img src="<?php echo esc_url(isset($svc_icons[$i]) ? $svc_icons[$i] : $svc_icons[0]); ?>" alt="" loading="lazy" /></div>
				<h3><?php echo esc_html($s['title']); ?></h3>
				<ul>
					<?php foreach (preg_split('/\r\n|\r|\n/', (string) $s['list']) as $line) : if (trim($line) === '') continue; ?>
					<li><span class="dot"></span><?php echo esc_html(trim($line)); ?></li>
					<?php endforeach; ?>
				</ul>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= 04 FAQ ================= -->
<section style="background:var(--bg-soft);border-block:1px solid var(--line);">
	<span id="faq" class="anchor"></span>
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow center"><?php echo esc_html(vcc_field('faq_eyebrow', 'Câu hỏi thường gặp')); ?></span>
			<h2><?php echo esc_html(vcc_field('faq_title', 'Những điều cần lưu ý về lao động tại Việt Nam')); ?></h2>
		</div>
		<?php
		$faqs = vcc_list('faqs', array('q', 'a'), array(
			array(
				'q' => 'Có thể yêu cầu làm thêm giờ tại Việt Nam không? Nếu có thì cần lưu ý gì?',
				'a' => '<span class="ref">Tiền lương — Điều 98 Luật Lao động</span>'
					. '<p>Ngoài một ngày lương, tiền làm thêm giờ thông thường phải được trả ít nhất <b>150%</b>; ngày nghỉ cuối tuần ít nhất <b>200%</b>; và ngày lễ (bao gồm Tết và nghỉ lễ có lương) ít nhất <b>300%</b>.</p>'
					. '<span class="ref" style="margin-top:14px;">Thời gian — Điều 107 Luật Lao động</span>'
					. '<ul><li><span class="dot"></span>Giờ làm thêm không quá 50% số giờ làm việc bình thường trong một ngày.</li>'
					. '<li><span class="dot"></span>Nếu tính theo tuần, giờ làm thêm không quá 12 giờ/ngày và 40 giờ/tháng.</li>'
					. '<li><span class="dot"></span>Không quá 200 giờ/năm (tối đa 300 giờ với một số ngành nghề).</li></ul>',
			),
			array(
				'q' => 'Hệ thống nghỉ lễ thay thế ở Việt Nam là gì? Có điểm gì khác so với Nhật Bản?',
				'a' => '<span class="ref">Điều 111, Khoản 3 — Luật Lao động</span>'
					. '<p>Việt Nam cũng có chế độ nghỉ bù, nhưng khác với chế độ nghỉ bù của Nhật Bản. Tại Việt Nam, "nghỉ bù" được hiểu là khi ngày nghỉ hằng tuần trùng với ngày nghỉ lễ, Tết; người lao động được nghỉ bù vào ngày làm việc tiếp theo.</p>'
					. '<p>Tại Nhật Bản, "Đổi ngày nghỉ" (Furikae Kyuji) là chuyển một ngày vốn là ngày nghỉ thành ngày làm việc và bù lại bằng một ngày làm việc khác. Khi đó việc làm vào ngày nghỉ ban đầu không bị tính là "làm việc vào ngày nghỉ", và doanh nghiệp không phải trả lương làm thêm cho ngày đó.</p>'
					. '<p>Việt Nam không có chế độ "Đổi ngày nghỉ" như vậy. Nếu người lao động đi làm vào ngày nghỉ hằng tuần hoặc lễ, Tết, dù được nghỉ bù vào ngày khác thì vẫn phải trả lương làm thêm: ít nhất <b>200%</b> cho ngày nghỉ hằng tuần và ít nhất <b>300%</b> (cộng lương ngày đó) cho lễ, Tết và ngày nghỉ phép có hưởng lương. Thủ tục này tương đương chế độ "ngày nghỉ thay thế" (Daikyu) của Nhật Bản.</p>',
			),
			array(
				'q' => 'Việt Nam có chế độ nghỉ lễ đặc biệt (nghỉ việc riêng) không?',
				'a' => '<span class="ref">Quy định về Nghỉ việc riêng</span>'
					. '<p>Tại Nhật Bản, nghỉ việc riêng thường được quy định trong nội quy lao động và khác nhau tùy doanh nghiệp. Tại Việt Nam, một số loại nghỉ việc riêng được quy định trực tiếp bởi Bộ luật Lao động.</p>'
					. '<p><b>Nghỉ việc riêng hưởng nguyên lương:</b></p>'
					. '<ul><li><span class="dot"></span>Bản thân kết hôn: nghỉ 03 ngày.</li>'
					. '<li><span class="dot"></span>Con đẻ / con nuôi kết hôn: nghỉ 01 ngày.</li>'
					. '<li><span class="dot"></span>Người thân trong gia đình qua đời: nghỉ 03 ngày.</li></ul>'
					. '<p style="margin-top:13px;"><b>Nghỉ việc riêng không hưởng lương:</b></p>'
					. '<ul><li><span class="dot"></span>Ông bà / anh chị em qua đời.</li>'
					. '<li><span class="dot"></span>Cha mẹ / anh chị em kết hôn.</li></ul>',
			),
			array(
				'q' => 'Nghỉ phép có lương ở Việt Nam được cấp như thế nào?',
				'a' => '<p>Người lao động làm việc đủ 12 tháng cho một người sử dụng lao động thì thông thường được nghỉ hằng năm hưởng nguyên lương <b>12 ngày làm việc</b> (với người chưa thành niên, người khuyết tật, hoặc người làm nghề nặng nhọc, độc hại, nguy hiểm thì được 14 hoặc 16 ngày).</p>'
					. '<p>Với người làm việc chưa đủ 12 tháng, số ngày nghỉ hằng năm được tính theo tỷ lệ tương ứng với số tháng làm việc (mỗi tháng tính 1 ngày nghỉ).</p>'
					. '<p>Ngoài ra, cứ sau mỗi <b>05 năm</b> làm việc cho một người sử dụng lao động thì số ngày nghỉ hằng năm được tăng thêm tương ứng <b>01 ngày</b>.</p>',
			),
		));
		?>
		<div class="faq">
			<?php foreach ($faqs as $f) : ?>
			<details class="reveal">
				<summary><span class="qq">Q</span><span class="qt"><?php echo esc_html($f['q']); ?></span><span class="plus"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 5v14M5 12h14"/></svg></span></summary>
				<div class="ans"><?php echo $f['a']; ?></div>
			</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ================= CONTACT CTA ================= -->
<section id="contact">
	<div class="container">
		<div class="cta-wrap reveal">
			<div class="hglow" aria-hidden="true"></div>
			<h2><?php echo esc_html(vcc_field('cta_title', 'Để chúng tôi gánh phần quản lý lao động')); ?></h2>
			<p><?php echo esc_html(vcc_field('cta_text', 'Bạn muốn giảm gánh nặng nhân sự, tiền lương và bảo hiểm tại Việt Nam? Hãy liên hệ — đội ngũ song ngữ Nhật–Việt của chúng tôi sẽ tư vấn giải pháp phù hợp với doanh nghiệp bạn.')); ?></p>
			<div class="cta-btns">
				<a href="<?php echo $contact; ?>" class="btn btn-light"><?php echo esc_html(vcc_field('cta_btn1', 'Gửi yêu cầu liên hệ')); ?> <span class="arr">&rarr;</span></a>
				<a href="<?php echo home_url('/#services'); ?>" class="btn btn-outline-light"><?php echo esc_html(vcc_field('cta_btn2', 'Xem các dịch vụ khác')); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
