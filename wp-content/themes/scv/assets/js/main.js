jQuery(function ($) {
    // userAgent
    const ua = navigator.userAgent;
    const uaLowerCase = navigator.userAgent.toLowerCase();
    const isSp = ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0);
    const isTablet = ua.indexOf('iPad') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') == -1) || ua.indexOf('A1_07') > 0 || ua.indexOf('SC-01C') > 0 || uaLowerCase.indexOf('macintosh') > 0 && 'ontouchend' in document;
    const isPc = (!isSp && !isTablet);

    (function(d) {
        var config = {
                kitId: 'awg6uyv',
                scriptTimeout: 3000,
                async: true
            },
            h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document);

    // add Class HTML element
    setTimeout((function() {
            document.documentElement.classList.add("is-ready")
        }
    ), 300);

    //Slider on web page
    $('.production-list').slick({
        dots: true,
        infinite: true,
        arrows: true,
        speed: 500,
        autoplay: true,
        autoplaySpeed: 4000,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1001,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    //Slider on recruit page
    $('.office-list').slick({
        dots: true,
        infinite: true,
        arrows: true,
        speed: 500,
        autoplay: true,
        autoplaySpeed: 4000,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1001,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    AOS.init({
        once: true,
        duration: 1000,
        delay: 0,
    });

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


    $(".wpcf7-previous").click(function(event) {
        event.preventDefault();
        // history.back(1);
        var strHref = window.location.href,
            href = strHref.replace('confirm/', '');
        window.location.replace(href);
    });


    //Scroll top
    $('#page-top a').click(function(event){
        event.preventDefault();
        var speed = 500;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;
    });

    setTimeout(function(){
        $('#contact-form .field-group .error').each(function () {
           $(this).prev().addClass('error');
        });
        $('#contact-form .box-policy .error').each(function () {
            $(this).parents(".box-policy").find(".privacy").addClass('policy-error');
        });
    },100);

    $("#contact-form .field-group .input-check").keyup(function () {
        $(this).removeClass('error');
        $(this).next().remove();
    });
    $(".box-policy label .mwform-checkbox-field-text").click(function () {
        if($(this).prev().hasClass("policy-error")){
            $(".box-policy span.error").remove();
        }
    });


    // Scroll header
    $(window).scroll( function(){
        if( $(this).scrollTop() > 250 ){
            $('#header-menu .header-nav').addClass('scroll-header');
            setTimeout(function(){
                $('#header-menu .header-nav').addClass('site-header--opening');
            },100);
        } else {
            $('#header-menu .header-nav').removeClass('scroll-header');
            $('#header-menu .header-nav').removeClass('site-header--opening');
        }
    });
    if($(this).scrollTop() > 250 ){
        $('#header-menu .header-nav').addClass('scroll-header');
        setTimeout(function(){
            $('#header-menu .header-nav').addClass('site-header--opening');
        },100);
    } else {
        $('#header-menu .header-nav').removeClass('scroll-header');
        $('#header-menu .header-nav').removeClass('site-header--opening');
    }

    //Open Menu
    $("#header-menu .btn-openMenu").click(function () {
        $("#header-menu .header-megamenu").toggleClass("is-open");
        $(this).toggleClass("is-open");
        $("#header-menu").toggleClass("is-openMenu");
    });

    // Open submenu mobile
    $("#header-menu .menu-item.menu-item-has-children>a").click(function () {
        win = $(this);
        if (win.width() <= 1023) {
            $(this).toggleClass("menu-open");
            $(this).next().toggleClass("is-open");
        }
    });


    // Click button slider
    $(".arrow-slider .arrow-prev").click(function () {
        $(".slick-prev").trigger('click');
    });
    $(".arrow-slider .arrow-next").click(function () {
        $(".slick-next").trigger('click');
    });


    //Open language option
    $('.label-click').click(function(event) {
        event.preventDefault();
        $(".list-language").toggleClass('is-open');
        // e.stopPropagation();
    });
    $(document).mouseup(function(e) {
        var container = $(".list-language");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.list-language').removeClass('is-open');
        }
    });

    //Open toggle recruit page
    $(".recruitment-item .link-more").click(function () {
        $(this).parents(".recruitment-item").find(".info-toggle").slideToggle();
        $(this).parents(".recruitment-item").toggleClass('is-open');
    });


    $('.serviceList .serviceItem').on("mouseover", function () {
        $idHover = $(this).attr('data-hover');
        $(".service .serviceImage .image").removeClass("is-open");
        $('#' + $idHover).toggleClass("is-open");
    });
    $('.serviceList .serviceItem').on("mouseout", function () {
        $(".service .serviceImage .image").removeClass("is-open");
        $(".service .serviceImage #service-image-00.image").addClass("is-open");
    });

    $(document).ready(function() {
        $('.serviceList .serviceItem').on('touchstart', function(e) {
            $idHover = $(this).attr('data-hover');
            $(".service .serviceImage .image").removeClass("is-open");
            $('#' + $idHover).toggleClass("is-open");
        });
        $('.serviceList .serviceItem').on('touchend', function(e) {
            $(".service .serviceImage .image").removeClass("is-open");
            $(".service .serviceImage #service-image-00.image").addClass("is-open");
        });
    });

    $(".page-confirm .btn-submit.btn-send").click(function () {
        sessionStorage.setItem('sendmail', 'complete');
    });


    // const scroller = new LocomotiveScroll({
	// 	el: document.querySelector('[data-scroll-container]'),
	// 	smooth: true,
    //     lerp:.3,
    //     multiplier:1.2,
	// });


    // this.initY = 0;
    // const scrollContainer = document.querySelector("[data-scroll-container]");
    // window.LocomotiveScroll = new LocomotiveScroll({
    //     el: scrollContainer,
    //     smooth:true,
    //     lerp:.3,
    //     multiplier:1.2,
    //     offset: [0, 0],
    //     getDirection: true,
    //     initPosition :{
    //         x: 0,
    //         y: this.initY
    //     },
    // });

    $(document).ready(function () {
        $(window).on('scroll', function () {
            var checkCl = $('.pointContent');
            if (checkCl.length) {
                var nav = $('.pointContent').offset().top;
            }
            if ($(window).scrollTop() >= nav + $('.pointContent').outerHeight() - $('.padding-sidebar').outerHeight()) {
                $('.web-tabList').addClass("sidebar-scroll");
            } else {
                $('.web-tabList').removeClass("sidebar-scroll");
            }

            var checkFt = $(".contact-footer");
            if (checkFt.length) {
                var ptop = $(".contact-footer").offset().top;
            }
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (1001 < $(window).width() < 1500) {
                var X = 50;
            } else if ($(window).width() < 1000) {
                var X = 150;
            }
            if (scroll > ptop - windowHeight + X) {
                $('.nav-webTab').addClass("hide-sidebar");
            } else {
                $('.nav-webTab').removeClass("hide-sidebar");
            }
        });
    });

    $(document).ready(function () {
        $(window).on('scroll', function () {
            var checkCl = $('.about-banner');
            if (checkCl.length) {
                var nav = $('.about-banner').offset().top;
            }
            if ($(window).scrollTop() >= nav + $('.about-banner').outerHeight() - $('.padding-sidebar').outerHeight() + 76) {
                $('.about-tabList').addClass("sidebar-scroll");
            } else {
                $('.about-tabList').removeClass("sidebar-scroll");
            }

            var checkFt = $(".contact-footer");
            if (checkFt.length) {
                var ptop = $(".contact-footer").offset().top;
            }
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (1001 < $(window).width() < 1500) {
                var X = 50;
            } else if ($(window).width() < 1000) {
                var X = 150;
            }
            if (scroll > ptop - windowHeight + X) {
                $('.nav-aboutTab').addClass("hide-sidebar");
            } else {
                $('.nav-aboutTab').removeClass("hide-sidebar")
            }
        });
    });

    $(document).ready(function () {
        $(window).on('scroll', function () {
            var checkRecruit = $('#recruit .headerImg-banner');
            if (checkRecruit.length) {
                var nav = $('#recruit .headerImg-banner').offset().top;
            }
            if ($(window).scrollTop() >= nav + $('#recruit .headerImg-banner').outerHeight() - $('.padding-sidebar').outerHeight() + 76) {
                $('.recruit-tabList').addClass("sidebar-scroll");
            } else {
                $('.recruit-tabList').removeClass("sidebar-scroll");
            }

            var checkRt = $(".contact-footer");
            if (checkRt.length) {
                var ptop = $(".contact-footer").offset().top;
            }
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (1001 < $(window).width() < 1500) {
                var X = 50;
            } else if ($(window).width() < 1000) {
                var X = 150;
            }
            if (scroll > ptop - windowHeight + X) {
                $('.recruit-tabList').addClass("hide-sidebar");
            } else {
                $('.recruit-tabList').removeClass("hide-sidebar");
            }
        });
    });


});