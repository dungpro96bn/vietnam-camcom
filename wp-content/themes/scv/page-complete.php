<?php get_header(); ?>

<?php
if (have_posts()) : while (have_posts()) : the_post();
    remove_filter('the_content', 'wpautop');
    the_content();
endwhile;
else :
    echo '<p class="no-post">お探しの記事、ページは見つかりませんでした。</p>';
endif;
?>

<script>
    jQuery(function ($) {
        $(document).ready(function () {
            var urlHome = "<?php  echo home_url(); ?>";
            var checkSendMail = sessionStorage.getItem('sendmail');
            if(checkSendMail !== "complete"){
                $("#contact-form").remove();
                window.location.href = urlHome;
            } else {
                setTimeout(function(){
                    sessionStorage.removeItem('sendmail');
                },1000);
            }
        });
    });
</script>


<?php get_footer(); ?>
