<?php get_header(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/xrl0jrm.css">


<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,minimum-scale=0.5">
<title>ハノイ情報通コーディネーター　ミンと行くベトナム送出機関視察ツアー | 綜合キャリアベトナム</title>
<meta name="description" content="綜合キャリアベトナムがベトナム送出機関現地視察ツアーを催行。送出機関に精通するハノイ情報コーディネーターのミンが監理団体様のご希望に添って、ベトナム現地の送出機関を直接ご案内します。">
<meta name="keywords" content="ベトナム, ハノイ, 送出し機関, 送り出し機関, 送出機関, 視察、視察ツアー">
<meta name="format-detection" content="telephone=no">


<link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/lp-tour/css/lp.css">
<script src="<?php bloginfo('template_directory'); ?>/lp-tour/js/lp.js"></script>

<style type="text/css">
    @media print, screen and (min-width: 768px) {
        body {
            min-width: 1280px;
        }
    }
	.following-btn-area{
    	display: none;
    }
</style>


<div id="contents" class="contents">
    <div role="main">
        <article id="<?php echo $slug; ?>" class="<?php echo $slug; ?>">
            <?php
      if ( have_posts() ): while ( have_posts() ): the_post();
      remove_filter( 'the_content', 'wpautop' );
      the_content();
      endwhile;
      ?>
            <?php endif; ?>
        </article>
    </div>
    <?php get_sidebar(); ?>
</div><!-- #contents -->

<?php get_footer(); ?>