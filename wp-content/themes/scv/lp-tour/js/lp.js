jQuery(function ($) {
    // userAgent
    const ua = navigator.userAgent;
    const uaLowerCase = navigator.userAgent.toLowerCase();
    const isSp = ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0);
    const isTablet = ua.indexOf('iPad') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') == -1) || ua.indexOf('A1_07') > 0 || ua.indexOf('SC-01C') > 0 || uaLowerCase.indexOf('macintosh') > 0 && 'ontouchend' in document;
    const isPc = (!isSp && !isTablet);


    // only IE
    if (ua.indexOf('Trident') !== -1) {
        $('#lp .sizes').each(function () {
            var objElement = $(this);
            var objOmg = new Image();
            objOmg.src = objElement.attr('src');
            if (objOmg.width != 0) {
                objElement.css({'width': objOmg.width / 2});
            }
        });
    }


    // fadein
    // $(window).on('load', function () {
    //     $(window).scroll(function () {
    //         $('#lp .js-fadein').each(function () {
    //             var ptop = $(this).offset().top;
    //             var scroll = $(window).scrollTop();
    //             var windowHeight = $(window).height();
    //             if (scroll > ptop - windowHeight + 100) {
    //                 $(this).addClass('scroll-in');
    //             }
    //         });
    //     });
    //
    //     $('#lp .js-fadein').each(function () {
    //         var ptop = $(this).offset().top;
    //         var firstView = $(window).scrollTop();
    //         var windowHeight = $(window).height();
    //         if (firstView > ptop - windowHeight) {
    //             $(this).addClass('scroll-in');
    //         }
    //     });
    // });

    //scroll
    $(function () {
        $('.scroll').click(function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            var dest = url.split('#');
            var target = dest[1];
            var target_offset = $('#' + target).offset();
            var target_top = target_offset.top;
            $('html, body').animate({scrollTop: target_top}, 500, 'swing');
            return false;
        });
    });

    $(".sub-plan01, .plan01").change(function(){
		$(".ttl-radio .plan01").prop('checked', true);
		$(".ttl-radio .plan02").prop('checked', false);
		$(".inputSub01-plan02").prop('checked', false);
		$(".sub-plan02").prop('checked', false);
	});
	
	$(".plan02").change(function(){
		$(".ttl-radio .plan01").prop('checked', false);
		$(".sub-plan01").prop('checked', false);
	});
	
	$(".sub-plan02").change(function(){
		$(".ttl-radio .plan02").prop('checked', true);
		$(".ttl-radio .plan01").prop('checked', false);
		$(".sub-plan01").prop('checked', false);
	});
	
	$(".inputSub01-plan02").change(function(){
		$(".inputSub01-plan02").prop('checked', false);
		$(".item-radio02 .sub-plan02").prop('checked', false);
		$(this).prop('checked', true);
		$(".ttl-radio .plan02").prop('checked', true);
		$(this).parents(".content-input").find(".sub-plan02").prop('checked', true);
		$(".ttl-radio .plan01").prop('checked', false);
		$(".sub-plan01").prop('checked', false);
	});

});