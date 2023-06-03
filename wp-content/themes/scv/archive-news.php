<?php get_header();
global $post;
global $sitepress;
$var = languageString();
$current_language = $sitepress->get_current_language();
?>

    <div id="news" class="news-page <?php if ($current_language != "ja") { echo "en";}?>">

        <div class="inner">

            <div class="news-content">
                <h2 class="heading-block en"><?php echo $var['title_archive_news_page']; ?></h2>

                <div class="news-block news">
                    <?php
                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type'=> 'news',
                        'post_status' => 'publish',
                        'order'    => 'DESC',
                        'paged' => $paged,
                        'posts_per_page' => '10',
                    );
                    $result = new WP_Query( $args );
                    if ( $result-> have_posts() ) : ?>
                        <ul class="newsList">
                        <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                            <li class="newsItem" data-aos="fade-up">
                                <a href="<?php the_permalink(); ?>" class="link-news">
                                    <p class="data en"><?php echo get_the_date(); ?></p>
                                    <p class="tag"><span><?php echo $var['cat_news']; ?></span></p>
                                    <p class="text"><?php the_title(); ?></p>
                                    <span class="link-more"><img src="/wp-content/uploads/scv_icon_more_blue.png" alt=""></span>
                                </a>
                            </li>
                        <?php endwhile;?>
                    <?php else: ?>
                        <li class="no_post"><?php _e('There is no news.', 'tcd-w'); ?></li>
                        </ul>
                    <?php endif;
                    wp_reset_postdata(); ?>

                </div>

                <?php
                if ($result->max_num_pages > 1) {
                    wp_pagenavi();
                }
                ?>
            </div>

        </div>
    </div>

<?php get_footer(); ?>