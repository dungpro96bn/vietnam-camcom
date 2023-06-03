<?php get_header();
global $post;
global $sitepress;
$var = languageString();
$current_language = $sitepress->get_current_language();
?>

    <div id="single-news" class="post-content single-page <?php if ($current_language != "ja") { echo "en";}?>">

        <div class="inner">

            <div class="news-inner">
                <div class="post-main">
                    <div class="post-inner">
                        <div class="date-tag" data-aos="fade-up">
                            <p class="date-time en"><?php echo get_the_date(); ?></p>
                            <p class="category"><span><?php echo $var['cat_news']; ?></span></p>
                        </div>
                        <h2 class="heading-block" data-aos="fade-up"><?php the_title(); ?></h2>
                        <div class="info-content" data-aos="fade-up">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

                <div class="link-page" data-aos="fade-up">
                    <a href="<?php echo home_url(); ?>/news/" class="btn-link en">一覧へ戻る</a>
                </div>
            </div>

        </div>

    </div><!-- #new -->

<?php get_footer(); ?>