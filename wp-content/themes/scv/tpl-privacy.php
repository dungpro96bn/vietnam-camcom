<?php
/**
 * Template Name: VCC — Chính sách bảo mật
 *
 * Structure ported from /vcc/page/privacy.html. Editable text comes from ACF
 * (group_vcc_privacy) with Vietnamese fallbacks; WPML translates each field per
 * language post. Page-specific CSS (.doc-*) lives in assets/css/camcom-hr.css,
 * loaded globally in header.php. Assign this template to the privacy page (vi/en/ja).
 */
get_header();
$contact = home_url('/contact/');
$email = vcc_field('contact_email', 'info_scv@sougo-career-vietnam.com');

// shared icons + a dc-row helper, used only to build the Vietnamese fallback bodies
$ic = array(
	'building' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/></svg>',
	'pin'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>',
	'person'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="10" cy="8" r="4"/><path d="M4 21v-1a6 6 0 0 1 12 0v1"/></svg>',
	'phone'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.6A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.4-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2Z"/></svg>',
	'mail'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>',
);
$row = function ($icon, $lbl, $val, $cls = '') use ($ic) {
	return '<div class="dc-row"><span class="di">' . $ic[$icon] . '</span><div class="dt"><span class="lbl">' . $lbl . '</span><span class="val' . ($cls ? ' ' . $cls : '') . '">' . $val . '</span></div></div>';
};
$addr = 'Tầng 11, Văn phòng 2 – Tòa nhà Sunsquare, số 21 Lê Đức Thọ, Phường Mỹ Đình 2, Quận Nam Từ Liêm, Thành phố Hà Nội, Việt Nam';

$toc = vcc_list('toc', array('label'), array(
	array('label' => 'Doanh nghiệp xử lý thông tin'),
	array('label' => 'Mục đích sử dụng'),
	array('label' => 'Cung cấp tự nguyện'),
	array('label' => 'Cung cấp cho bên thứ ba'),
	array('label' => 'Ký gửi thông tin'),
	array('label' => 'Sử dụng chung'),
	array('label' => 'Biện pháp quản lý an toàn'),
	array('label' => 'Cookie'),
	array('label' => 'Đầu mối liên hệ'),
));

$sections = vcc_list('sections', array('title', 'body'), array(
	array(
		'title' => 'Tên, địa chỉ, người đại diện và người quản lý của doanh nghiệp xử lý thông tin cá nhân',
		'body'  => '<div class="doc-card">'
			. $row('building', 'Doanh nghiệp', 'CÔNG TY TNHH CAMCOM VIỆT NAM')
			. $row('pin', 'Địa chỉ', $addr, 'reg')
			. $row('person', 'Người đại diện', 'Giám đốc đại diện — Hayashida Hisashi')
			. $row('phone', 'Điện thoại', '<a href="tel:+842471094510">(+84)24-7109-4510</a>')
			. $row('mail', 'Email', '<a href="mailto:' . $email . '">' . $email . '</a>')
			. '<p class="dc-note">* Số điện thoại dùng trong nước tại Việt Nam.</p></div>',
	),
	array(
		'title' => 'Mục đích sử dụng thông tin cá nhân',
		'body'  => '<p>Mục đích sử dụng thông tin cá nhân mà chúng tôi thu thập như sau.</p>'
			. '<p class="sub">(1) Thông tin thu được khi trả lời các câu hỏi</p>'
			. '<ul class="doc-list"><li><span class="mk">①</span>Đối với những người đã gửi thắc mắc, chúng tôi sẽ sử dụng thông tin đó để trả lời các câu hỏi của bạn.</li></ul>'
			. '<p class="sub">(2) Thông tin về người nộp đơn vào cơ hội việc làm của công ty chúng tôi</p>'
			. '<ul class="doc-list"><li><span class="mk">②</span>Nếu bạn nộp đơn xin việc tại công ty chúng tôi, chúng tôi sẽ sử dụng thông tin của bạn để sàng lọc và liên hệ với bạn.</li></ul>',
	),
	array(
		'title' => 'Tự nguyện cung cấp thông tin cá nhân và những điểm cần lưu ý',
		'body'  => '<ul class="doc-list"><li><span class="mk">1</span>Việc cung cấp thông tin cá nhân là tự nguyện, nhưng xin lưu ý rằng chúng tôi có thể không phản hồi được yêu cầu của bạn nếu các trường bắt buộc không được điền hoặc thông tin không chính xác.</li>'
			. '<li><span class="mk">2</span>Khi chúng tôi trực tiếp nhận được thông tin cá nhân, chúng tôi không có nghĩa vụ phải trả lại thông tin đó bằng bất kỳ phương tiện nào.</li></ul>',
	),
	array(
		'title' => 'Về việc cung cấp thông tin cá nhân cho bên thứ ba',
		'body'  => '<p>Thông tin cá nhân do công ty chúng tôi nắm giữ sẽ không được cung cấp cho bên thứ ba ngoại trừ các trường hợp sau.</p>'
			. '<ul class="doc-list"><li><span class="mk">1</span>Khi những vấn đề cần thiết được nêu rõ hoặc thông báo trước cho người đó và nhận được sự đồng ý của người đó.</li>'
			. '<li><span class="mk">2</span>Các trường hợp dựa trên luật và quy định.</li></ul>',
	),
	array(
		'title' => 'Ký gửi thông tin cá nhân',
		'body'  => '<p>Việc ủy thác thông tin cá nhân của công ty chúng tôi sẽ tuân thủ hai điều trên. Thông tin cá nhân có thể được ủy thác cho các công ty bên ngoài trong phạm vi cần thiết để đạt được mục đích sử dụng.</p>'
			. '<p>Về gia công phần mềm, chúng tôi chọn những doanh nghiệp đáp ứng các tiêu chuẩn bảo vệ thông tin cá nhân do công ty chúng tôi đặt ra, và chúng tôi thuê ngoài thông tin sau khi trao đổi hợp đồng để đảm bảo quản lý phù hợp.</p>',
	),
	array(
		'title' => 'Sử dụng chung',
		'body'  => '<p>Chúng tôi sẽ cùng nhau sử dụng thông tin cá nhân mà chúng tôi nhận được như sau.</p>'
			. '<p class="sub">6.1 Thông tin về lãnh đạo và nhân viên của đối tác kinh doanh</p>'
			. '<p class="sub" style="font-weight:600;font-size:15px;">(1) Các mục thông tin cá nhân sẽ được sử dụng chung</p>'
			. '<p>Tên, tên công ty, tên bộ phận, chức danh, địa chỉ, địa chỉ email, số điện thoại, số fax, v.v.</p>'
			. '<p class="sub" style="font-weight:600;font-size:15px;">(2) Phạm vi người dùng chung</p>'
			. '<p>Các công ty thuộc tập đoàn của chúng tôi (bấm vào <a href="https://cam-com.inc/company/#group" target="_blank" rel="noopener">đây</a> để xem chi tiết).</p>'
			. '<p class="sub" style="font-weight:600;font-size:15px;">(3) Mục đích sử dụng chung</p>'
			. '<ul class="doc-list dash"><li><span class="mk"></span>Cung cấp thông tin và đề xuất về các dịch vụ được cung cấp bởi các công ty thuộc tập đoàn.</li>'
			. '<li><span class="mk"></span>Để thực hiện các giao dịch như hợp đồng, đơn đăng ký, yêu cầu, v.v.</li></ul>'
			. '<p class="sub" style="font-weight:600;font-size:15px;">(4) Làm thế nào để có được</p>'
			. '<p>Trao đổi danh thiếp, đàm phán kinh doanh, đơn đăng ký giao dịch, đơn đăng ký sự kiện và hội thảo, giải đáp thắc mắc về dịch vụ, v.v.</p>'
			. '<p class="sub" style="font-weight:600;font-size:15px;">(5) Người chịu trách nhiệm quản lý thông tin cá nhân được chia sẻ</p>'
			. '<div class="doc-card">'
			. $row('building', 'Doanh nghiệp', 'Công ty TNHH Lựa chọn nghề nghiệp Sougo')
			. $row('pin', 'Địa chỉ', '2-4-1 Hamamatsucho, Minato-ku, Tokyo, Nhật Bản', 'reg')
			. $row('person', 'Người đại diện', 'Giám đốc đại diện — Takata Oizumi')
			. '<p class="dc-note">* Người quản lý thông tin cá nhân được chia sẻ.</p></div>',
	),
	array(
		'title' => 'Các vấn đề về biện pháp quản lý an toàn',
		'body'  => '<p>Công ty chúng tôi sẽ thực hiện các biện pháp quản lý an toàn cần thiết và phù hợp để quản lý dữ liệu cá nhân, bao gồm ngăn chặn rò rỉ, mất mát hoặc hư hỏng dữ liệu đó. Ngoài ra, chúng tôi sẽ thực hiện giám sát cần thiết và phù hợp đối với nhân viên và nhà thầu phụ (bao gồm cả nhà thầu phụ, v.v.) xử lý dữ liệu cá nhân. Nội dung chính như sau.</p>'
			. '<ul class="doc-list">'
			. '<li><span class="mk">1</span>Xây dựng các chính sách cơ bản để thực hiện từng phản hồi theo quy định của pháp luật và hướng dẫn xử lý đúng thông tin cá nhân và dữ liệu cá nhân.</li>'
			. '<li><span class="mk">2</span>Xây dựng các quy định khác nhau quy định từng phản hồi như mua lại, sử dụng, lưu trữ, cung cấp, xóa, thải bỏ, v.v., cũng như những người và vai trò chịu trách nhiệm.</li>'
			. '<li><span class="mk">3</span>Bổ nhiệm người chịu trách nhiệm, làm rõ nhân viên xử lý dữ liệu cá nhân và phạm vi dữ liệu được xử lý; thiết lập hệ thống báo cáo khi phát hiện vi phạm; kiểm tra định kỳ điều kiện xử lý (biện pháp quản lý an toàn của tổ chức).</li>'
			. '<li><span class="mk">4</span>Nêu rõ các vấn đề liên quan đến bảo mật dữ liệu cá nhân trong quy tắc làm việc, tiến hành giáo dục và đào tạo về việc xử lý dữ liệu cá nhân (biện pháp quản lý an toàn nhân sự).</li>'
			. '<li><span class="mk">5</span>Quản lý ra/vào nhân viên, hạn chế mang thiết bị vào, kiểm soát việc mang ra ngoài nhằm ngăn chặn thiết bị, phương tiện điện tử và tài liệu bị đánh cắp hoặc thất lạc (biện pháp quản lý an toàn vật lý).</li>'
			. '<li><span class="mk">6</span>Giới thiệu hệ thống bảo vệ hệ thống thông tin xử lý dữ liệu cá nhân khỏi truy cập trái phép từ bên ngoài hoặc phần mềm trái phép (biện pháp kiểm soát an ninh kỹ thuật).</li></ul>',
	),
	array(
		'title' => 'Thu thập thông tin cá nhân bằng Cookie, v.v.',
		'body'  => '<p>Trang web của chúng tôi sử dụng cookie, v.v. để cung cấp các dịch vụ tùy chỉnh cho từng người dùng. Các công cụ này cung cấp thông tin hệ thống cần thiết để xem các trang, thông tin xác nhận người dùng là cùng một người, lịch sử hành vi (các trang đã truy cập, nội dung đã xem, v.v.), thông tin thiết bị đầu cuối và thông tin vị trí, v.v.</p>'
			. '<p>Mặc dù thông tin này không bao gồm thông tin có thể nhận dạng cá nhân, nhưng các cá nhân có thể được xác định bằng cách so sánh với thông tin do công ty chúng tôi nắm giữ, và được sử dụng trong phạm vi mục đích nêu ở mục 2 ở trên.</p>'
			. '<p>Xin lưu ý rằng bạn có thể từ chối chấp nhận cookie bằng cách thay đổi cài đặt trên trình duyệt của mình, nhưng khi đó bạn có thể không sử dụng được một số chức năng trên trang web của chúng tôi.</p>',
	),
	array(
		'title' => 'Đầu mối liên hệ giải đáp thắc mắc về thông tin cá nhân',
		'body'  => '<p>Đối với “khiếu nại liên quan đến thông tin cá nhân”, vui lòng liên hệ với chúng tôi dưới đây.</p>'
			. '<div class="doc-card">'
			. $row('building', 'Bộ phận', 'CÔNG TY TNHH CAMCOM VIỆT NAM — Văn phòng bảo vệ thông tin cá nhân')
			. $row('pin', 'Địa chỉ', $addr, 'reg')
			. $row('person', 'Người đại diện', 'Giám đốc đại diện — Hayashida Hisashi')
			. $row('phone', 'Điện thoại', '<a href="tel:+842471094510">(+84)24-7109-4510</a> · các ngày trong tuần 9:00–18:00')
			. $row('mail', 'Email', '<a href="mailto:' . $email . '">' . $email . '</a>')
			. '<p class="dc-note">* Số điện thoại dùng trong nước tại Việt Nam.</p></div>'
			. '<div class="iso reveal" style="margin-top:26px;"><div class="seal"><img src="/wp-content/uploads/security-logo.png" alt="ISO/IEC 27001 logo" loading="lazy" /></div><div class="it"><b>Chứng nhận ISO/IEC 27001:2022</b><span>Hệ thống quản lý an toàn thông tin (ISMS) · </span><span class="no">No. 20201260018841</span></div></div>',
	),
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
					<span class="here"><?php echo esc_html(vcc_field('crumb_here', 'Chính sách bảo mật')); ?></span>
				</nav>
				<span class="ph-eye"><?php echo esc_html(vcc_field('ph_eye', 'Privacy Policy')); ?></span>
				<h1><?php echo nl2br(esc_html(vcc_field('ph_title', "Chính sách\nbảo mật"))); ?></h1>
				<p class="lead"><?php echo esc_html(vcc_field('ph_lead', 'Công ty TNHH CAMCOM VIỆT NAM cam kết bảo vệ thông tin cá nhân của bạn. Trang này trình bày cách chúng tôi thu thập, sử dụng, lưu trữ và bảo vệ thông tin cá nhân theo quy định pháp luật.')); ?></p>
				<div class="doc-meta">
					<?php
					$meta = preg_split('/\r\n|\r|\n/', (string) vcc_field('doc_meta', "Cập nhật: 16/04/2024\nBan hành: 19/05/2023\nISO/IEC 27001:2022"));
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
					<div><b><?php echo esc_html(vcc_field('fb_value', 'ISMS')); ?></b><span><?php echo esc_html(vcc_field('fb_label', 'An toàn thông tin chứng nhận')); ?></span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path fill="#ffffff" d="M0,48 C240,90 480,90 720,60 C960,30 1200,10 1440,40 L1440,90 L0,90 Z"></path></svg>
	</div>
</section>

<!-- ================= DOCUMENT ================= -->
<section>
	<div class="container">
		<div class="doc-wrap">

			<!-- TOC -->
			<aside class="doc-toc reveal" aria-label="<?php echo esc_attr(vcc_field('toc_head', 'Nội dung')); ?>">
				<div class="toc-head"><?php echo esc_html(vcc_field('toc_head', 'Nội dung')); ?></div>
				<ol>
					<?php foreach ($toc as $ti => $t) : ?>
					<li><a href="#s<?php echo $ti + 1; ?>"<?php echo $ti === 0 ? ' class="active"' : ''; ?>><span class="tnum"><?php printf('%02d', $ti + 1); ?></span> <?php echo esc_html($t['label']); ?></a></li>
					<?php endforeach; ?>
				</ol>
			</aside>

			<!-- BODY -->
			<div class="doc-body">
				<?php foreach ($sections as $si => $s) : ?>
				<article class="doc-sec reveal" id="s<?php echo $si + 1; ?>">
					<span class="anchor"></span>
					<div class="sh"><span class="sn"><?php printf('%02d', $si + 1); ?></span><h2><?php echo esc_html($s['title']); ?></h2></div>
					<?php echo $s['body']; ?>
				</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<!-- ================= CONTACT CTA ================= -->
<section id="contact">
	<div class="container">
		<div class="cta-wrap reveal">
			<div class="hglow" aria-hidden="true"></div>
			<h2><?php echo esc_html(vcc_field('cta_title', 'Còn thắc mắc về thông tin cá nhân?')); ?></h2>
			<p><?php echo esc_html(vcc_field('cta_text', 'Nếu bạn cần làm rõ bất kỳ nội dung nào trong chính sách bảo mật, hoặc muốn thực hiện quyền liên quan đến dữ liệu cá nhân, hãy liên hệ với chúng tôi.')); ?></p>
			<div class="cta-btns">
				<a href="<?php echo $contact; ?>" class="btn btn-light"><?php echo esc_html(vcc_field('cta_btn1', 'Gửi yêu cầu liên hệ')); ?> <span class="arr">&rarr;</span></a>
				<a href="tel:+842471094510" class="btn btn-outline-light"><?php echo esc_html(vcc_field('cta_btn2', '(+84)24-7109-4510')); ?></a>
			</div>
		</div>
	</div>
</section>

<script>
/* TOC active-state scroll-spy */
(function () {
	var links = [].slice.call(document.querySelectorAll('.doc-toc a'));
	var secs = links.map(function (a) { return document.querySelector(a.getAttribute('href')); });
	if (!('IntersectionObserver' in window) || !secs.length) return;
	var io = new IntersectionObserver(function (entries) {
		entries.forEach(function (e) {
			if (e.isIntersecting) {
				var id = '#' + e.target.id;
				links.forEach(function (l) { l.classList.toggle('active', l.getAttribute('href') === id); });
			}
		});
	}, { rootMargin: '-20% 0px -70% 0px', threshold: 0 });
	secs.forEach(function (s) { if (s) io.observe(s); });
})();
</script>

<?php get_footer(); ?>
