jQuery(document).ready(function($) {
    "use strict";

    jQuery(".drawer_toggle").click(function() {

        if (!$.easing["easeOutExpo"]) {
            $.easing["easeOutExpo"] = function(x, t, b, c, d) {
                return t == d ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b
            }
        }
        
        //Expand
        if (drawer_state == 0) {
            jQuery("div#tm-drawer").slideDown(400, 'easeOutExpo');
            jQuery('.drawer_toggle span').removeClass('uk-icon-chevron-down');
            jQuery('.drawer_toggle span').addClass('uk-icon-chevron-up');
            drawer_state = 1;
            //Collapse
        } else if (drawer_state == 1) {
            jQuery("div#tm-drawer").slideUp(400, 'easeOutExpo');
            jQuery('.drawer_toggle span').removeClass('uk-icon-chevron-up');
            jQuery('.drawer_toggle span').addClass('uk-icon-chevron-down');
            drawer_state = 0;
        }
    });

    var drawer_state = 0;

    if ($('body').hasClass('header-style3')) {
        var nav      = $('.tm-nav-wrapper'),
            navitems = nav.find('.uk-navbar-nav > li'),
            logo     = $('div.logo-container').first();

        if (navitems.length && logo.length) {
            navitems.eq(Math.floor(navitems.length/2) - 1).after('<li class="tm-nav-logo-centered" data-uk-dropdown>'+logo[0].outerHTML+'</li>');
            logo.remove();
        }
    };

    $('.widget .panel-content').find('form').addClass('uk-form');

    //to top scroller
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() === 0) {
            jQuery(".tm-totop-scroller").addClass("totop-hidden")
        } else {
            jQuery(".tm-totop-scroller").removeClass("totop-hidden")
        }
    });

    

    $("#tmMainMenu ul.uk-navbar-nav li.sub-dropdown").on('mouseenter mouseleave', function (e) {
        if ($('ul', this).length) {
            var elm  = $(this);
            var off  = elm.offset();
            var l    = off.left;
            var w    = elm.width();
            var docW = $("body").width();
            var isEntirelyVisible = (l + w <= docW);

            if (!isEntirelyVisible) {
                $(this).addClass('dropdown-classic-left');
            } else {
                $(this).removeClass('dropdown-classic-left');
            }
        }
    });

    if ($('body').hasClass('headertype-fixed')) {
        var fixedPadding = $('.tm-header-wrapper').height();
        $(window).scroll(function() {
            if ($(this).scrollTop() != 0) {
                $(".tm-headerbar").addClass("tm-header-squeezed")
            } else {
                $(".tm-headerbar").removeClass("tm-header-squeezed")
            }
        });
        
        $('#tmTitleBar').css('padding-top', fixedPadding); 
    }

    $('.gallery-item .gallery-icon a').click(function(){
    var lightbox = $.UIkit.lightbox($(this));

    lightbox.show();
    return false;
    });



    // Dotnav Follower 'tm-dotnav-follower'
    $('[data-uk-nav-follower]').each(function(){
        var ele      = $(this),
            follower = $('<div class="tm-dotnav-follower"></div>').prependTo(this),
            nav      = ele.find('ul:first'),
            children = nav.children();

        var ids     = [],
            links   = ele.find("a[href^='#']").each(function(){ if(this.getAttribute("href").trim()!=='#') ids.push(this.getAttribute("href")); }),
            targets = $(ids.join(',')),
            inviews;

        ele.on('inview.uk.scrollspynav', function() {
            inviews = [];
            for (var i=0 ; i < targets.length ; i++) {
                if (UIkit.Utils.isInView(targets.eq(i), {topoffset:-40})) {
                    inviews.push(children.eq(i));
                }
            }
            follower.css({
                top:inviews[0].position().top,
                left:inviews[0].position().left,
                height: inviews.length * inviews[0].outerHeight(true) - parseInt(inviews[0].css('margin-top'))
            });

        });
    });


    // FitVids
    function fitvidsLoad(){
        $(".post-format-video, .post-format-audio, .video-embed").fitVids();
    }

    fitvidsLoad();
    
    
});