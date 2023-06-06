<?php
get_header();

global $sitepress;
$var = languageString();
$current_language = $sitepress->get_current_language();
if($current_language != 'ja'){
    $urlLanguage = "/".$current_language."/";
}
?>

<?php
if ($current_language == 'ja'):?>
    <script>
        var plang = location.pathname.split('/')[1];
        var urlHref = location.href,
            result = urlHref.replace("requirements", "recruit");
        if(plang === "requirements"){
            location.href = result;
        }
    </script>
<?php else: ?>
    <script>
        var plang = location.pathname.split('/')[2];
        var urlHref = location.href,
            result = urlHref.replace("requirements", "recruit");
        if(plang === "requirements"){
            location.href = result;
        }
    </script>
<?php endif; ?>

<div class="inner">
    <div id="404" class="404">
        <div class="not-found-box">
            <p class="not-found-text">申し訳ございません。<br>お探しのページは見つかりませんでした。</p>
            <a href="<?php echo do_shortcode('[homePath]'); ?>" class="not-found-button">トップページへ戻る</a>
        </div>
    </div><!-- #404 -->
</div>

<?php get_footer(); ?>