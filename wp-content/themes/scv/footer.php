</main>

<?php
global $sitepress;
$var = languageString();
$current_language = $sitepress->get_current_language();
?>

<!-- ================= FOOTER ================= -->
<footer>
	<div class="container">
		<div class="foot-top">
			<div class="foot-brand">
				<a href="<?php echo home_url('/'); ?>" class="brand">
					<img class="brand-logo" src="<?php echo get_template_directory_uri(); ?>/images/scv_logo_white.png" alt="VIETNAM CAMCOM" />
				</a>
				<p><?php echo esc_html($var['foot_tagline']); ?></p>
				<div class="addr">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>
					<span><?php echo esc_html($var['company_name']); ?> · <?php echo esc_html($var['foot_country']); ?></span>
				</div>
			</div>
			<div class="foot-col">
				<h4><?php echo $var['nav_services']; ?></h4>
				<a href="<?php echo home_url('/hr/'); ?>"><?php echo $var['svc_hr']; ?></a>
				<a href="<?php echo home_url('/bpo/'); ?>"><?php echo $var['svc_bpo']; ?></a>
				<a href="<?php echo home_url('/web/'); ?>"><?php echo $var['svc_web']; ?></a>
				<a href="<?php echo home_url('/fdi-support/'); ?>"><?php echo $var['svc_fdi']; ?></a>
				<a href="<?php echo home_url('/labor-management/'); ?>"><?php echo $var['svc_labor']; ?></a>
			</div>
			<div class="foot-col">
				<h4><?php echo $var['foot_company']; ?></h4>
				<a href="<?php echo home_url('/about/'); ?>"><?php echo $var['nav_about']; ?></a>
				<a href="<?php echo home_url('/'); ?>#strengths"><?php echo $var['foot_strengths']; ?></a>
				<a href="<?php echo home_url('/news/'); ?>"><?php echo $var['nav_news']; ?></a>
				<a href="<?php echo home_url('/recruit/'); ?>"><?php echo $var['nav_recruit']; ?></a>
                <a href="<?php echo home_url('/company/'); ?>"><?php echo $var['nav_company']; ?></a>
				<a href="https://cam-com.inc/" target="_blank" rel="noopener">Camcom Group</a>
			</div>
			<div class="foot-col">
				<h4><?php echo $var['foot_support']; ?></h4>
				<a href="<?php echo home_url('/contact/'); ?>"><?php echo $var['btn_contact']; ?></a>
				<a href="<?php echo home_url('/privacy/'); ?>"><?php echo $var['foot_privacy']; ?></a>
				<a href="<?php echo home_url('/security/'); ?>"><?php echo $var['foot_infosec']; ?></a>
				<a href="<?php echo home_url('/company/'); ?>"><?php echo $var['foot_overview']; ?></a>
			</div>
		</div>
		<div class="foot-bottom">
			<p>&copy; <?php echo date('Y'); ?> VIETNAM CAMCOM Co., Ltd. All rights reserved.</p>
			<div class="socials">
                <div class="seal"><img src="/wp-content/uploads/security-logo.png" alt="ISO/IEC 27001 logo"/></div>
				<a href="https://www.facebook.com/VIETNAM.CAMCOM" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.3v7A10 10 0 0 0 22 12Z"/></svg></a>
				<a href="https://cam-com.inc/" target="_blank" rel="noopener" aria-label="Website"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15 15 0 0 1 0 20M12 2a15 15 0 0 0 0 20"/></svg></a>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
