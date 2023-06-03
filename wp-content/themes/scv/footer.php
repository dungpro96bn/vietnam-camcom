</main>

<?php
global $sitepress;
$var = languageString();
$current_language = $sitepress->get_current_language();
?>

<?php get_sidebar(); ?>

<?php if (!is_front_page()) : ?>
    <div class="inner contact-footer">
        <a href="<?php echo home_url(); ?>/contact/" class="contactBanner">
            <div class="contact-content">
                <h2 class="heading-block en"><span><?php echo $var['title_contact_banner']; ?></span></h2>
                <p class="sub-title"><?php echo $var['text_contact_banner']; ?></p>
                <div class="link-page">
                    <div class="link-more en">
                        <span class="box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Group_65" data-name="Group 65" width="28" height="16.059" viewBox="0 0 28 16.059"><defs><clipPath id="clip-path"><rect id="Rectangle_75" data-name="Rectangle 75" width="28" height="16.059" fill="#fff"/></clipPath></defs><g id="Group_64" data-name="Group 64" transform="translate(0 0)" clip-path="url(#clip-path)"><path id="Path_99" data-name="Path 99" d="M27.44,6.641,21.258.3a.989.989,0,1,0-1.419,1.379l5.213,5.361H.989a.989.989,0,1,0,0,1.979H25.065l-5.226,5.361a.989.989,0,1,0,1.419,1.379L27.44,9.415a2,2,0,0,0,0-2.774" transform="translate(0 0.001)" fill="#fff"/></g></svg>
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php endif; ?>



<footer id="footer" class="footer">
    <div class="bg-footer"></div>
    <div class="inner">
        <div id="page-top" class="page-top">
            <a href="#" class="page-top-anchor en">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28" height="16.059" viewBox="0 0 28 16.059">
                    <defs><clipPath id="clip-path"><rect id="Rectangle_75" data-name="Rectangle 75" width="28" height="16.059" fill="#fff"/></clipPath></defs>
                    <g id="Group_64" data-name="Group 64" clip-path="url(#clip-path)"><path id="Path_99" data-name="Path 99" d="M27.44,6.641,21.258.3a.989.989,0,1,0-1.419,1.379l5.213,5.361H.989a.989.989,0,1,0,0,1.979H25.065l-5.226,5.361a.989.989,0,1,0,1.419,1.379L27.44,9.415a2,2,0,0,0,0-2.774" transform="translate(0 0.001)" fill="#fff"/></g>
                </svg>
                <span>Page top</span></a>
        </div>
        <div class="footer-top">
            <div class="footer-inner-top <?php if ($current_language != "ja") { echo "en";}?>">
                <div class="footer-logo">
                    <a href="<?php echo home_url(); ?>">
                        <picture>
                            <source srcset="<?php bloginfo('template_directory'); ?>/images/scv_logo_footer.svg">
                            <img class="sizes" src="<?php bloginfo('template_directory'); ?>/images/scv_logo_footer.svg" alt="<?php bloginfo('name'); ?>">
                        </picture>
                    </a>
                    <p class="subtitle-logo"><?php echo $var['company_name']; ?></p>
                </div>
                <?php
                if ($current_language == "vi") {
                    dynamic_sidebar('footer-menu-bottom-vi');
                } elseif ($current_language == "en") {
                    dynamic_sidebar('footer-menu-bottom-en');
                } else {
                    dynamic_sidebar('footer-menu-bottom-ja');
                }
                ?>
            </div>
            <ul class="social-list">
                <li class="social-item">
                    <a href="https://www.facebook.com/VIETNAM.CAMCOM" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                </li>
            </ul>
        </div>
        <div class="footer-bottom">
            <div class="copy-right">
                <address class="copyright">
                    <small>© VIETNAM CAMCOM Co., Ltd</small>
                </address>
            </div>
        </div>
    </div>

</footer><!-- #footer -->
</div>
</div><!-- .outer -->

<?php wp_footer(); ?>

</body>
</html>