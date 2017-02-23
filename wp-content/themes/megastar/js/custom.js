var THEMEMASCOT = {};

(function($) {
    "use strict";

    /* ---------------------------------------------------------------------- */
    /* -------------------------- Declare Variables ------------------------- */
    /* ---------------------------------------------------------------------- */
    var $document = jQuery(document);
    var $document_body = jQuery(document.body);
    var $window = jQuery(window);
    var $html = jQuery('html');
    var $body = jQuery('body');
    var $wrapper = jQuery('#wrapper');
    var $header = jQuery('#header');
    var $footer = jQuery('#footer');
    var $sections = jQuery('section');
    var $portfolio_gallery = jQuery(".gallery-isotope");
    var portfolio_filter = ".portfolio-filter a";
    var $portfolio_filter_first_child = jQuery(".portfolio-filter a:eq(0)");
    var $portfolio_flex_slider = jQuery(".portfolio-slider");


    THEMEMASCOT.isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (THEMEMASCOT.isMobile.Android() || THEMEMASCOT.isMobile.BlackBerry() || THEMEMASCOT.isMobile.iOS() || THEMEMASCOT.isMobile.Opera() || THEMEMASCOT.isMobile.Windows());
        }
    };

    THEMEMASCOT.isRTL = {
        check: function() {
            if( jQuery( "html" ).attr("dir") == "rtl" ) {
                return true;
            } else {
                return false;
            }
        }
    };

    THEMEMASCOT.urlParameter = {
        get: function(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        }
    };


    THEMEMASCOT.bmiCalculator = {
        magic: function(bmi) {
            var output = '';
            var info = '';
            if (bmi) {
                if (bmi < 15) {
                    info = "very severely underweight";
                }
                if ((bmi >= 15)&&(bmi < 16)) {
                    info = "severely underweight";
                }
                if ((bmi >= 16)&&(bmi < 18.5)) {
                    info = "underweight";
                }
                if ((bmi >= 18.5)&&(bmi < 25)) {
                    info = "normal";
                }
                if ((bmi >= 25)&&(bmi < 30)) {
                    info = "overweight";
                }
                if ((bmi >= 30)&&(bmi < 35)) {
                    info = "moderately obese";
                }
                if ((bmi >= 35)&&(bmi <= 40)) {
                    info = "severely obese";
                }
                if (bmi >40) {
                    info = "very severely obese";
                }
                output = "Your BMI is <span>"  + bmi + "</span><br />" + 
                                                              "You are <span>"  + info + "</span>.";
            } else {
                output = "You broke it!";
            };
            return output;
        },
        
        calculateStandard: function (bmi_form) {
            var weight_lbs = bmi_form.find('input[name="bmi_standard_weight_lbs"]').val();
            var height_ft = bmi_form.find('input[name="bmi_standard_height_ft"]').val();
            var height_in = bmi_form.find('input[name="bmi_standard_height_in"]').val();
            var age = bmi_form.find('input[name="bmi_standard_age"]').val();
            var gender = bmi_form.find('radio[name="bmi_standard_gender"]').val();

            var total_height_inc = ( parseInt(height_ft, 10) * 12 ) + parseInt(height_in, 10);
            var bmi = ( parseFloat(weight_lbs) / (total_height_inc * total_height_inc) ) * 703;
            var output = THEMEMASCOT.bmiCalculator.magic(bmi);

            bmi_form.find('#bmi_standard_calculator_form_result').html(output).fadeIn('slow');
        },
        
        calculateMetric: function (bmi_form) {
            var weight_kg = bmi_form.find('input[name="bmi_metric_weight_kg"]').val();
            var height_cm = bmi_form.find('input[name="bmi_metric_height_cm"]').val();
            var age = bmi_form.find('input[name="bmi_standard_age"]').val();
            var gender = bmi_form.find('radio[name="bmi_standard_gender"]').val();

            var total_weight_kg = parseFloat(weight_kg) ;
            var total_height_m = parseFloat(height_cm) * 0.01;
            var bmi = ( total_weight_kg / (total_height_m * total_height_m) );
            var output = THEMEMASCOT.bmiCalculator.magic(bmi);

            bmi_form.find('#bmi_metric_calculator_form_result').html(output).fadeIn('slow');
        },
        
        init: function () {
            var bmi_Standard_Form = jQuery('#form_bmi_standard_calculator');
            bmi_Standard_Form.on('submit', function(e) {
                e.preventDefault();
                THEMEMASCOT.bmiCalculator.calculateStandard(bmi_Standard_Form);
                return false;
            });

            var bmi_Metric_Form = jQuery('#form_bmi_metric_calculator');
            bmi_Metric_Form.on('submit', function(e) {
                e.preventDefault();
                THEMEMASCOT.bmiCalculator.calculateMetric(bmi_Metric_Form);
                return false;
            });
        }

    };

    THEMEMASCOT.initialize = {

        init: function() {
            THEMEMASCOT.bmiCalculator.init();
            THEMEMASCOT.initialize.TM_datePicker();
            THEMEMASCOT.initialize.TM_ddslick();
            THEMEMASCOT.initialize.TM_sliderRange();
            THEMEMASCOT.initialize.TM_loadBSParentModal();
            THEMEMASCOT.initialize.TM_demoSwitcher();
            THEMEMASCOT.initialize.TM_platformDetect();
            THEMEMASCOT.initialize.TM_onLoadPopupPromoBox();
            THEMEMASCOT.initialize.TM_customDataAttributes();
            THEMEMASCOT.initialize.TM_parallaxBgInit();
            THEMEMASCOT.initialize.TM_resizeFullscreen();
            THEMEMASCOT.initialize.TM_prettyPhoto_lightbox();
            THEMEMASCOT.initialize.TM_nivolightbox();
            THEMEMASCOT.initialize.TM_fitVids();
            THEMEMASCOT.initialize.TM_YTPlayer();
            THEMEMASCOT.initialize.TM_equalHeightDivs();
        },


        /* ---------------------------------------------------------------------- */
        /* ------------------------------ Date Picker  -------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_datePicker: function() {
            jQuery( ".date-picker" ).datepicker();
            jQuery( ".time-picker" ).timepicker();
            jQuery( ".datetime-picker" ).datetimepicker();
        },

        /* ---------------------------------------------------------------------- */
        /* -------------------------------- ddslick  ---------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_ddslick: function() {
            var $ddslick = jQuery("select.ddslick");
            if( $ddslick.length > 0 ) {
                $ddslick.each(function(){
                    var name =  jQuery(this).attr('name');
                    var id = jQuery(this).attr('id');
                    jQuery("#"+id).ddslick({
                        width: '100%',
                        imagePosition: "left",
                        onSelected: function(selectedData){
                            jQuery("#"+id+ " .dd-selected-value").prop ('name', name);
                         }  
                    });
                });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ----------------------------- slider range  -------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_sliderRange: function() {
            var $slider_range = jQuery(".slider-range");
            if( $slider_range.length > 0 ) {
                $slider_range.each(function(){
                    var id = jQuery(this).attr('id');
                    var target_id = jQuery(this).data('target');
                    jQuery( "#" + target_id ).slider({
                      range: "max",
                      min: 2001,
                      max: 2016,
                      value: 2010,
                      slide: function( event, ui ) {
                        jQuery( "#" + id ).val( ui.value );
                      }
                    });
                    jQuery( "#" + id ).val( jQuery( "#" + target_id ).slider( "value" ) );
                });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ------------------------ Bootstrap Parent Modal  --------------------- */
        /* ---------------------------------------------------------------------- */
        TM_loadBSParentModal: function() {
            var ajaxLoadContent = false;
            if( ajaxLoadContent ) {
                $.ajax({
                    url: "ajax-load/bootstrap-parent-modal.html",
                    success: function (data) { $body.append(data); },
                    dataType: 'html'
                });
            }
        },
        /* ---------------------------------------------------------------------- */
        /* ------------------------------ Demo Switcher  ------------------------ */
        /* ---------------------------------------------------------------------- */
        TM_demoSwitcher: function() {
            var showSwitcher = false;
            var $style_switcher = jQuery('#style-switcher');
            if( !$style_switcher.length && showSwitcher ) {
                $.ajax({
                    url: "color-switcher/style-switcher.html",
                    success: function (data) { $body.append(data); },
                    dataType: 'html'
                });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ------------------------------ Preloader  ---------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_preLoaderClickDisable: function() {
            var $preloader = jQuery('#preloader');
            $preloader.children('#disable-preloader').on('click', function(e) {
                $preloader.fadeOut();
                return false;
            });
        },

        TM_preLoaderOnLoad: function() {
            var $preloader = jQuery('#preloader');
            if( $preloader.length > 0 ) {
                $preloader.delay(200).fadeOut('slow');
            }
        },


        /* ---------------------------------------------------------------------- */
        /* ------------------------------- Platform detect  --------------------- */
        /* ---------------------------------------------------------------------- */
        TM_platformDetect: function() {
            if (THEMEMASCOT.isMobile.any()) {
                $html.addClass("mobile");
            } else {
                $html.addClass("no-mobile");
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ------------------------------ Popup Promo Box  ---------------------- */
        /* ---------------------------------------------------------------------- */
        TM_onLoadPopupPromoBox: function() {
            var $modal = jQuery('.on-pageload-popup-promobox');
            if( $modal.length > 0 ) {
                $modal.each( function(){
                    var $current_item       = jQuery(this);
                    var target              = $current_item.data('target');
                    var timeout             = $current_item.data('timeout');

                    var delay               = $current_item.data('delay');
                    delay = ( !delay ) ? 2500 : Number(delay) + 2500;

                    if( $current_item.hasClass('cookie-enabled') ) {
                        var elementCookie = $.cookie( target );
                        if ( !!elementCookie && elementCookie == 'enabled' ){
                            return true;
                        }
                    } else {
                        $.removeCookie( target );
                    }

                    var t_enablepopup = setTimeout(function() {
                        $.magnificPopup.open({
                            items: { src: target },
                            type: 'inline',
                            mainClass: 'mfp-no-margins mfp-fade',
                            closeBtnInside: false,
                            fixedContentPos: true,
                            removalDelay: 500,
                            callbacks: {
                                afterClose: function() {
                                    if( $current_item.hasClass('cookie-enabled') ) {
                                        $.cookie( target, 'enabled' );
                                    }
                                }
                            }
                        }, 0);
                    }, Number(delay) );

                    if( timeout !== '' ) {
                        var t_closepopup = setTimeout(function() {
                            $.magnificPopup.close();
                        }, Number(delay) + Number(timeout) );
                    }
                });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ------------------------------ Hash Forwarding  ---------------------- */
        /* ---------------------------------------------------------------------- */
        TM_hashForwarding: function() {
            if (window.location.hash) {
                var hash_offset = jQuery(window.location.hash).offset().top;
                jQuery("html, body").animate({
                    scrollTop: hash_offset
                });
            }
        },


        /* ---------------------------------------------------------------------- */
        /* ----------------------- Background image, color ---------------------- */
        /* ---------------------------------------------------------------------- */
        TM_customDataAttributes: function() {
            jQuery('[data-bg-color]').each(function() {
                jQuery(this).css("cssText", "background: " + jQuery(this).data("bg-color") + " !important;");
            });
            jQuery('[data-bg-img]').each(function() {
                jQuery(this).css('background-image', 'url(' + jQuery(this).data("bg-img") + ')');
            });
            jQuery('[data-text-color]').each(function() {
                jQuery(this).css('color', jQuery(this).data("text-color"));
            });
            jQuery('[data-font-size]').each(function() {
                jQuery(this).css('font-size', jQuery(this).data("font-size"));
            });
            jQuery('[data-height]').each(function() {
                jQuery(this).css('height', jQuery(this).data("height"));
            });
            jQuery('[data-border]').each(function() {
                jQuery(this).css('border', jQuery(this).data("border"));
            });
            jQuery('[data-margin-top]').each(function() {
                jQuery(this).css('margin-top', jQuery(this).data("margin-top"));
            });
            jQuery('[data-margin-right]').each(function() {
                jQuery(this).css('margin-right', jQuery(this).data("margin-right"));
            });
            jQuery('[data-margin-bottom]').each(function() {
                jQuery(this).css('margin-bottom', jQuery(this).data("margin-bottom"));
            });
            jQuery('[data-margin-left]').each(function() {
                jQuery(this).css('margin-left', jQuery(this).data("margin-left"));
            });
        },



        /* ---------------------------------------------------------------------- */
        /* -------------------------- Background Parallax ----------------------- */
        /* ---------------------------------------------------------------------- */
        TM_parallaxBgInit: function() {
            if (!THEMEMASCOT.isMobile.any() && $window.width() >= 800 ) {
                jQuery('.parallax').each(function() {
                    var data_parallax_ratio = ( jQuery(this).data("parallax-ratio") === undefined ) ? '0.5': jQuery(this).data("parallax-ratio");
                    jQuery(this).parallax("50%", 0.5);
                });
            } else {
                jQuery('.parallax').addClass("mobile-parallax");
            }
        },

        /* ---------------------------------------------------------------------- */
        /* --------------------------- Home Resize Fullscreen ------------------- */
        /* ---------------------------------------------------------------------- */
        TM_resizeFullscreen: function() {
            var windowHeight = $window.height();
            jQuery('.fullscreen, .revslider-fullscreen').height(windowHeight);
        },

        /* ---------------------------------------------------------------------- */
        /* ----------------------------- Magnific Popup ------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_magnificPopup_lightbox: function() {
            
            var $image_popup_lightbox = jQuery('.image-popup-lightbox');
            if( $image_popup_lightbox.length > 0 ) {
                $image_popup_lightbox.magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    closeBtnInside: false,
                    fixedContentPos: true,
                    mainClass: 'mfp-no-margins mfp-fade', // class to remove default margin from left and right side
                    image: {
                        verticalFit: true
                    }
                });
            }

            var $image_popup_vertical_fit = jQuery('.image-popup-vertical-fit');
            if( $image_popup_vertical_fit.length > 0 ) {
                $image_popup_vertical_fit.magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-img-mobile',
                    image: {
                        verticalFit: true
                    }
                });
            }

            var $image_popup_fit_width = jQuery('.image-popup-fit-width');
            if( $image_popup_fit_width.length > 0 ) {
                $image_popup_fit_width.magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    image: {
                        verticalFit: false
                    }
                });
            }

            var $image_popup_no_margins = jQuery('.image-popup-no-margins');
            if( $image_popup_no_margins.length > 0 ) {
                $image_popup_no_margins.magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    closeBtnInside: false,
                    fixedContentPos: true,
                    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                    image: {
                        verticalFit: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300 // don't foget to change the duration also in CSS
                    }
                });
            }

            var $popup_gallery = jQuery('.popup-gallery');
            if( $popup_gallery.length > 0 ) {
                $popup_gallery.magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    tLoading: 'Loading image #%curr%...',
                    mainClass: 'mfp-img-mobile',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    },
                    image: {
                        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                        titleSrc: function(item) {
                            return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                        }
                    }
                });
            }

            var $zoom_gallery = jQuery('.zoom-gallery');
            if( $zoom_gallery.length > 0 ) {
                $zoom_gallery.magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    closeOnContentClick: false,
                    closeBtnInside: false,
                    mainClass: 'mfp-with-zoom mfp-img-mobile',
                    image: {
                        verticalFit: true,
                        titleSrc: function(item) {
                            return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
                        }
                    },
                    gallery: {
                        enabled: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300, // don't foget to change the duration also in CSS
                        opener: function(element) {
                            return element.find('img');
                        }
                    }
                    
                });
            }
            
            var $popup_yt_vimeo_gmap = jQuery('.popup-youtube, .popup-vimeo, .popup-gmaps');
            if( $popup_yt_vimeo_gmap.length > 0 ) {
                $popup_yt_vimeo_gmap.magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,

                    fixedContentPos: false
                });
            }

            var $popup_with_zoom_anim = jQuery('.popup-with-zoom-anim');
            if( $popup_with_zoom_anim.length > 0 ) {
                $popup_with_zoom_anim.magnificPopup({
                    type: 'inline',

                    fixedContentPos: false,
                    fixedBgPos: true,

                    overflowY: 'auto',

                    closeBtnInside: true,
                    preloader: false,

                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-zoom-in'
                });
            }

            var $popup_with_move_anim = jQuery('.popup-with-move-anim');
            if( $popup_with_move_anim.length > 0 ) {
                $popup_with_move_anim.magnificPopup({
                    type: 'inline',

                    fixedContentPos: false,
                    fixedBgPos: true,

                    overflowY: 'auto',

                    closeBtnInside: true,
                    preloader: false,

                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-slide-bottom'
                });
            }
            
            var $ajaxload_popup = jQuery('.ajaxload-popup');
            if( $ajaxload_popup.length > 0 ) {
                $ajaxload_popup.magnificPopup({
                  type: 'ajax',
                  alignTop: true,
                  overflowY: 'scroll', // as we know that popup content is tall we set scroll overflow by default to avoid jump
                  callbacks: {
                    parseAjax: function(mfpResponse) {
                        THEMEMASCOT.initialize.TM_datePicker();
                    }
                  }
                });
            }

            var $form_ajax_load = jQuery('.form-ajax-load');
            if( $form_ajax_load.length > 0 ) {
                $form_ajax_load.magnificPopup({
                  type: 'ajax'
                });
            }
            
            var $popup_with_form = jQuery('.popup-with-form');
            if( $popup_with_form.length > 0 ) {
                $popup_with_form.magnificPopup({
                    type: 'inline',
                    preloader: false,
                    focus: '#name',

                    mainClass: 'mfp-no-margins mfp-fade',
                    closeBtnInside: false,
                    fixedContentPos: true,

                    // When elemened is focused, some mobile browsers in some cases zoom in
                    // It looks not nice, so we disable it:
                    callbacks: {
                      beforeOpen: function() {
                        if($window.width() < 700) {
                          this.st.focus = false;
                        } else {
                          this.st.focus = '#name';
                        }
                      }
                    }
                });
            }

            var $mfpLightboxAjax = jQuery('[data-lightbox="ajax"]');
            if( $mfpLightboxAjax.length > 0 ) {
                $mfpLightboxAjax.magnificPopup({
                    type: 'ajax',
                    closeBtnInside: false,
                    callbacks: {
                        ajaxContentAdded: function(mfpResponse) {
                        },
                        open: function() {
                        },
                        close: function() {
                        }
                    }
                });
            }

            //lightbox image
            var $mfpLightboxImage = jQuery('[data-lightbox="image"]');
            if( $mfpLightboxImage.length > 0 ) {
                $mfpLightboxImage.magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    closeBtnInside: false,
                    fixedContentPos: true,
                    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                    image: {
                        verticalFit: true
                    }
                });
            }

            //lightbox gallery
            var $mfpLightboxGallery = jQuery('[data-lightbox="gallery"]');
            if( $mfpLightboxGallery.length > 0 ) {
                $mfpLightboxGallery.each(function() {
                    var element = jQuery(this);
                    element.magnificPopup({
                        delegate: 'a[data-lightbox="gallery-item"]',
                        type: 'image',
                        closeOnContentClick: true,
                        closeBtnInside: false,
                        fixedContentPos: true,
                        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                        image: {
                            verticalFit: true
                        },
                        gallery: {
                            enabled: true,
                            navigateByImgClick: true,
                            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                        },
                        zoom: {
                          enabled: true,
                          duration: 300, // don't foget to change the duration also in CSS
                          opener: function(element) {
                            return element.find('img');
                          }
                        }

                    });
                });
            }

            //lightbox iframe
            var $mfpLightboxIframe = jQuery('[data-lightbox="iframe"]');
            if( $mfpLightboxIframe.length > 0 ) {
                $mfpLightboxIframe.magnificPopup({
                    disableOn: 600,
                    type: 'iframe',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
            }

            //lightbox inline
            var $mfpLightboxInline = jQuery('[data-lightbox="inline"]');
            if( $mfpLightboxInline.length > 0 ) {
                $mfpLightboxInline.magnificPopup({
                    type: 'inline',
                    mainClass: 'mfp-no-margins mfp-zoom-in',
                    closeBtnInside: false,
                    fixedContentPos: true
                });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ----------------------------- lightbox popup ------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_prettyPhoto_lightbox: function() {
            //prettyPhoto lightbox
            var $pretty_photo_lightbox = jQuery("a[data-rel^='prettyPhoto']");
            if( $pretty_photo_lightbox.length > 0 ) {
                $pretty_photo_lightbox.prettyPhoto({
                    hook: 'data-rel',
                    animation_speed:'normal',
                    theme:'light_square',
                    slideshow:3000, 
                    autoplay_slideshow: false,
                    social_tools: false
                });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ------------------------------ Nivo Lightbox ------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_nivolightbox: function() {
            var $pretty_photo_lightbox = jQuery('a[data-lightbox-gallery]');
            if( $pretty_photo_lightbox.length > 0 ) {
                $pretty_photo_lightbox.nivoLightbox({
                    effect: 'fadeScale'
                });
            }
        },



        /* ---------------------------------------------------------------------- */
        /* ---------------------------- Wow initialize  ------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_wow: function() {
            var wow = new WOW({
                mobile: false // trigger animations on mobile devices (default is true)
            });
            wow.init();
        },

        /* ---------------------------------------------------------------------- */
        /* ----------------------------- Fit Vids ------------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_fitVids: function() {
            $body.fitVids();
        },

        /* ---------------------------------------------------------------------- */
        /* ----------------------------- YT Player for Video -------------------- */
        /* ---------------------------------------------------------------------- */
        TM_YTPlayer: function() {
            var $ytube_player = jQuery(".player");
            if( $ytube_player.length > 0 ) {
                $ytube_player.mb_YTPlayer();
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ---------------------------- equalHeights ---------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_equalHeightDivs: function() {
            /* equal heigh */
            var $equal_height = jQuery('.equal-height');
            if( $equal_height.length > 0 ) {
                $equal_height.children('div').css('min-height', 'auto');
                $equal_height.equalHeights();
            }

            /* equal heigh inner div */
            var $equal_height_inner = jQuery('.equal-height-inner');
            if( $equal_height_inner.length > 0 ) {
                $equal_height_inner.children('div').css('min-height', 'auto');
                $equal_height_inner.children('div').children('div').css('min-height', 'auto');
                $equal_height_inner.equalHeights();
                $equal_height_inner.children('div').each(function() {
                    jQuery(this).children('div').css('min-height', jQuery(this).css('min-height'));
                });
            }

            /* pricing-table equal heigh*/
            var $equal_height_pricing_table = jQuery('.equal-height-pricing-table');
            if( $equal_height_pricing_table.length > 0 ) {
                $equal_height_pricing_table.children('div').css('min-height', 'auto');
                $equal_height_pricing_table.children('div').children('div').css('min-height', 'auto');
                $equal_height_pricing_table.equalHeights();
                $equal_height_pricing_table.children('div').each(function() {
                    jQuery(this).children('div').css('min-height', jQuery(this).css('min-height'));
                });
            }
        }

    };


    THEMEMASCOT.header = {

        init: function() {

            var t = setTimeout(function() {
                THEMEMASCOT.header.TM_fullscreenMenu();
                THEMEMASCOT.header.TM_sidePanelReveal();
                THEMEMASCOT.header.TM_scroolToTopOnClick();
                THEMEMASCOT.header.TM_scrollToFixed();
                THEMEMASCOT.header.TM_topnavAnimate();
                THEMEMASCOT.header.TM_scrolltoTarget();
                THEMEMASCOT.header.TM_menuzord();
                THEMEMASCOT.header.TM_navLocalScorll();
                THEMEMASCOT.header.TM_menuCollapseOnClick();
                THEMEMASCOT.header.TM_homeParallaxFadeEffect();
                THEMEMASCOT.header.TM_topsearch_toggle();
            }, 0);

        },


        /* ---------------------------------------------------------------------- */
        /* ------------------------- menufullpage ---------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_fullscreenMenu: function() {
            var $menufullpage = jQuery('.menu-full-page .fullpage-nav-toggle');
            if( $menufullpage.length > 0 ) {
                $menufullpage.menufullpage();
            }
        },


        /* ---------------------------------------------------------------------- */
        /* ------------------------- Side Push Panel ---------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_sidePanelReveal: function() {
            jQuery('.side-panel-trigger').on('click', function(e) {
                $body.toggleClass("side-panel-open");
                if ( THEMEMASCOT.isMobile.any() ) {
                    $body.toggleClass("overflow-hidden");
                }
                return false;
            });

            jQuery('.has-side-panel .body-overlay').on('click', function(e) {
                $body.toggleClass("side-panel-open");
                return false;
            });

            //sitebar tree
            jQuery('.side-panel-nav .nav .tree-toggler').on('click', function(e) {
                jQuery(this).parent().children('ul.tree').toggle(300);
            });
        },

        /* ---------------------------------------------------------------------- */
        /* ------------------------------- scrollToTop  ------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_scroolToTop: function() {
            if ($window.scrollTop() > 600) {
                jQuery('.scrollToTop').fadeIn();
            } else {
                jQuery('.scrollToTop').fadeOut();
            }
        },

        TM_scroolToTopOnClick: function() {
            $document_body.on('click', '.scrollToTop', function(e) {
                jQuery('html, body').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        },


        /* ---------------------------------------------------------------------------- */
        /* --------------------------- One Page Nav close on click -------------------- */
        /* ---------------------------------------------------------------------------- */
        TM_menuCollapseOnClick: function() {
            $document.on('click', '.onepage-nav a', function(e) {
                jQuery('.showhide').trigger('click');
                return false;
            });
        },

        /* ---------------------------------------------------------------------- */
        /* ----------- Active Menu Item on Reaching Different Sections ---------- */
        /* ---------------------------------------------------------------------- */
        TM_activateMenuItemOnReach: function() {
            var $onepage_nav = jQuery('.onepage-nav');
            var cur_pos = $window.scrollTop() + 2;
            var nav_height = $onepage_nav.outerHeight();
            $sections.each(function() {
                var top = jQuery(this).offset().top - nav_height - 80,
                    bottom = top + jQuery(this).outerHeight();

                if (cur_pos >= top && cur_pos <= bottom) {
                    $onepage_nav.find('a').parent().removeClass('current').removeClass('active');
                    $sections.removeClass('current').removeClass('active');

                    //jQuery(this).addClass('current').addClass('active');
                    $onepage_nav.find('a[href="#' + jQuery(this).attr('id') + '"]').parent().addClass('current').addClass('active');
                }
            });
        },

        /* ---------------------------------------------------------------------- */
        /* ------------------- on click scrool to target with smoothness -------- */
        /* ---------------------------------------------------------------------- */
        TM_scrolltoTarget: function() {
            //jQuery for page scrolling feature - requires jQuery Easing plugin
            jQuery('.smooth-scroll-to-target, .fullscreen-onepage-nav a').on('click', function(e) {
                e.preventDefault();

                var $anchor = jQuery(this);
                
                var $hearder_top = jQuery('.header .header-nav');
                var hearder_top_offset = 0;
                if ($hearder_top[0]){
                    hearder_top_offset = $hearder_top.outerHeight(true);
                } else {
                    hearder_top_offset = 0;
                }

                //for vertical nav, offset 0
                if ($body.hasClass("vertical-nav")){
                    hearder_top_offset = 0;
                }

                var top = jQuery($anchor.attr('href')).offset().top - hearder_top_offset;
                jQuery('html, body').stop().animate({
                    scrollTop: top
                }, 1500, 'easeInOutExpo');

            });
        },

        /* ---------------------------------------------------------------------- */
        /* -------------------------- Scroll navigation ------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_navLocalScorll: function() {
            var data_offset = -60;
            var $local_scroll = jQuery("#menuzord .menuzord-menu, #menuzord-right .menuzord-menu");
            if( $local_scroll.length > 0 ) {
                $local_scroll.localScroll({
                    target: "body",
                    duration: 800,
                    offset: data_offset,
                    easing: "easeInOutExpo"
                });
            }

            var $local_scroll_other = jQuery("#menuzord-side-panel .menuzord-menu, #menuzord-verticalnav .menuzord-menu, #fullpage-nav");
            if( $local_scroll_other.length > 0 ) {
                $local_scroll_other.localScroll({
                    target: "body",
                    duration: 800,
                    offset: 0,
                    easing: "easeInOutExpo"
                });
            }
        },

        /* ---------------------------------------------------------------------------- */
        /* --------------------------- collapsed menu close on click ------------------ */
        /* ---------------------------------------------------------------------------- */
        TM_scrollToFixed: function() {
            jQuery('.navbar-scrolltofixed').scrollToFixed();
            jQuery('.scrolltofixed').scrollToFixed({
                marginTop: jQuery('.header .header-nav').outerHeight(true) + 10,
                limit: function() {
                    var limit = jQuery('#footer').offset().top - jQuery(this).outerHeight(true);
                    return limit;
                }
            });
            jQuery('#sidebar').scrollToFixed({
                marginTop: jQuery('.header .header-nav').outerHeight() + 20,
                limit: function() {
                    var limit = jQuery('#footer').offset().top - jQuery('#sidebar').outerHeight() - 20;
                    return limit;
                }
            });
        },

        /* ----------------------------------------------------------------------------- */
        /* --------------------------- Menuzord - Responsive Megamenu ------------------ */
        /* ----------------------------------------------------------------------------- */
        TM_menuzord: function() {

            var $menuzord = jQuery("#menuzord");
            if( $menuzord.length > 0 ) {
                $menuzord.menuzord({
                    align: "left",
                    effect: "slide",
                    animation: "none",
                    indicatorFirstLevel: "<i class='fa fa-angle-down'></i>",
                    indicatorSecondLevel: "<i class='fa fa-angle-right'></i>"
                });
            }

            var $menuzord_right = jQuery("#menuzord-right");
            if( $menuzord_right.length > 0 ) {
                $menuzord_right.menuzord({
                    align: "right",
                    effect: "slide",
                    animation: "none",
                    indicatorFirstLevel: "<i class='fa fa-angle-down'></i>",
                    indicatorSecondLevel: "<i class='fa fa-angle-right'></i>"
                });
            }

            var $menuzord_side_panel = jQuery("#menuzord-side-panel");
            if( $menuzord_side_panel.length > 0 ) {
                $menuzord_side_panel.menuzord({
                    align: "right",
                    effect: "slide",
                    animation: "none",
                    indicatorFirstLevel: "",
                    indicatorSecondLevel: "<i class='fa fa-angle-right'></i>"
                });
            }
            
            var $menuzord_vertical_nav = jQuery("#menuzord-verticalnav");
            if( $menuzord_vertical_nav.length > 0 ) {
                $menuzord_vertical_nav.menuzord({
                    align: "right",
                    effect: "slide",
                    animation: "none",
                    indicatorFirstLevel: "<i class='fa fa-angle-down'></i>",
                    indicatorSecondLevel: "<i class='fa fa-angle-right'></i>"
                });
            }

        },

        /* ---------------------------------------------------------------------- */
        /* --------------------------- Waypoint Top Nav Sticky ------------------ */
        /* ---------------------------------------------------------------------- */
        TM_topnavAnimate: function() {
            if ($window.scrollTop() > (50)) {
                jQuery(".navbar-sticky-animated").removeClass("animated-active");
            } else {
                jQuery(".navbar-sticky-animated").addClass("animated-active");
            }

            if ($window.scrollTop() > (50)) {
                jQuery(".navbar-sticky-animated .header-nav-wrapper .container, .navbar-sticky-animated .header-nav-wrapper .container-fluid").removeClass("add-padding");
            } else {
                jQuery(".navbar-sticky-animated .header-nav-wrapper .container, .navbar-sticky-animated .header-nav-wrapper .container-fluid").addClass("add-padding");
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ---------------- home section on scroll parallax & fade -------------- */
        /* ---------------------------------------------------------------------- */
        TM_homeParallaxFadeEffect: function() {
            if ($window.width() >= 1200) {
                var scrolled = $window.scrollTop();
                jQuery('.content-fade-effect .home-content .home-text').css('padding-top', (scrolled * 0.0610) + '%').css('opacity', 1 - (scrolled * 0.00120));
            }
        },

        /* ---------------------------------------------------------------------- */
        /* --------------------------- Top search toggle  ----------------------- */
        /* ---------------------------------------------------------------------- */
        TM_topsearch_toggle: function() {
            $document_body.on('click', '#top-search-toggle', function(e) {
                e.preventDefault();
                jQuery('.search-form-wrapper.toggle').toggleClass('active');
                return false;
            });
        }

    };

    THEMEMASCOT.widget = {

        init: function() {

            var t = setTimeout(function() {
                THEMEMASCOT.widget.TM_shopClickEvents();
                THEMEMASCOT.widget.TM_fcCalender();
                THEMEMASCOT.widget.TM_verticalTimeline();
                THEMEMASCOT.widget.TM_verticalMasonryTimeline();
                THEMEMASCOT.widget.TM_masonryIsotop();
                THEMEMASCOT.widget.TM_pieChart();
                THEMEMASCOT.widget.TM_progressBar();
                THEMEMASCOT.widget.TM_funfact();
                THEMEMASCOT.widget.TM_instagramFeed();
                THEMEMASCOT.widget.TM_jflickrfeed();
                THEMEMASCOT.widget.TM_accordion_toggles();
                THEMEMASCOT.widget.TM_tooltip();
                //THEMEMASCOT.widget.TM_countDownTimer();
            }, 0);

        },

        /* ---------------------------------------------------------------------- */
        /* ------------------------------ Shop Plus Minus ----------------------- */
        /* ---------------------------------------------------------------------- */
        TM_shopClickEvents: function() {
            $document_body.on('click', '.quantity .plus', function(e) {
                var currentVal = parseInt(jQuery(this).parent().children(".qty").val(), 10);
                if (!isNaN(currentVal)) {
                    jQuery(this).parent().children(".qty").val(currentVal + 1);
                }
                return false;
            });

            $document_body.on('click', '.quantity .minus', function(e) {
                var currentVal = parseInt(jQuery(this).parent().children(".qty").val(), 10);
                if (!isNaN(currentVal) && currentVal > 0) {
                    jQuery(this).parent().children(".qty").val(currentVal - 1);
                }
                return false;
            });

            $document_body.on('click', '#checkbox-ship-to-different-address', function(e) {
                jQuery("#checkout-shipping-address").toggle(this.checked);
            });
        },


        /* ---------------------------------------------------------------------- */
        /* ------------------------------ Event Calendar ------------------------ */
        /* ---------------------------------------------------------------------- */
        TM_fcCalender: function() {
            if (typeof calendarEvents !== "undefined" ) {
                var $full_event_calendar = jQuery('#full-event-calendar');
                if( $full_event_calendar.length > 0 ) {
                    $full_event_calendar.fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        defaultDate: '2018-01-12',
                        selectable: true,
                        selectHelper: true,
                        select: function(start, end) {
                            var title = prompt('Event Title:');
                            var eventData;
                            if (title) {
                                eventData = {
                                    title: title,
                                    start: start,
                                    end: end
                                };
                                jQuery('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                            }
                            jQuery('#calendar').fullCalendar('unselect');
                        },
                        editable: true,
                        eventLimit: true, // allow "more" link when too many events
                        events: calendarEvents
                    });
                }
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ------------------------------ Timeline Block ------------------------ */
        /* ---------------------------------------------------------------------- */
        TM_verticalTimeline: function() {
            var timelineBlocks = jQuery('.cd-timeline-block'),
              offset = 0.8;

            if( timelineBlocks.length > 0 ) {
                //hide timeline blocks which are outside the viewport
                hideBlocks(timelineBlocks, offset);
                //on scolling, show/animate timeline blocks when enter the viewport
                $window.on('scroll', function(){
                  (!window.requestAnimationFrame)  ? setTimeout(function(){ showBlocks(timelineBlocks, offset); }, 100) : window.requestAnimationFrame(function(){ showBlocks(timelineBlocks, offset); });
                });
            }

            function hideBlocks(blocks, offset) {
              blocks.each(function(){
                ( jQuery(this).offset().top > $window.scrollTop()+$window.height()*offset ) && jQuery(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
              });
            }

            function showBlocks(blocks, offset) {
              blocks.each(function(){
                ( jQuery(this).offset().top <= $window.scrollTop()+$window.height()*offset && jQuery(this).find('.cd-timeline-img').hasClass('is-hidden') ) && jQuery(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
              });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ----------------------- Vertical Masonry Timeline -------------------- */
        /* ---------------------------------------------------------------------- */
        TM_verticalMasonryTimeline: function() {
            var $masonry_timeline = jQuery('.vertical-masonry-timeline');
            if( $masonry_timeline.length > 0 ) {
                $masonry_timeline.isotope({
                    itemSelector : '.each-masonry-item',
                    sortBy: 'original-order',
                    layoutMode: 'masonry',
                    resizable: false
                });
            }

            //=====> Timeline Positions
            function  timeline_on_left_and_right(){
                $masonry_timeline.children('.each-masonry-item').each(function(index, element) {
                    var last_child = jQuery(this);
                    var prev_last  = jQuery(this).prev();
                    var last_child_offset = parseInt(last_child.css('top'), 10);
                    var prev_last_offset  = parseInt(prev_last.css('top'), 10);
                    var offset_icon       = last_child_offset - prev_last_offset;
                    
                    var go_top_to = 0;
                    if(offset_icon){
                        if ( offset_icon <= 87 ){
                            go_top_to = 87 - offset_icon;
                            last_child.find('.timeline-post-format').animate({
                                top: go_top_to
                            }, 300);
                        }
                    }
                    
                    if( jQuery(this).position().left === 0 ){
                        jQuery(this).removeClass('item-right');
                        jQuery(this).addClass('item-left');
                    }else{
                        jQuery(this).removeClass('item-left');
                        jQuery(this).addClass('item-right');
                    }
                });
            }

            if( $masonry_timeline.length > 0 ) {
                timeline_on_left_and_right();
                
                $window.resize(function() {
                    timeline_on_left_and_right();
                });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ----------------------------- Masonry Isotope ------------------------ */
        /* ---------------------------------------------------------------------- */
        TM_masonryIsotop: function() {
            var isotope_mode;
            if ($portfolio_gallery.hasClass("masonry")){
                isotope_mode = "masonry";
            } else{
                isotope_mode = "fitRows";
            }

            //isotope firsttime loading
            if( $portfolio_gallery.length > 0 ) {
                $portfolio_gallery.imagesLoaded(function(){
                    $portfolio_gallery.isotope({
                        itemSelector: '.gallery-item',
                        layoutMode: isotope_mode,
                        filter: "*"
                    });
                });
            }
            
            //isotope filter
            $document_body.on('click', portfolio_filter, function(e) {
                jQuery(portfolio_filter).removeClass("active");
                jQuery(this).addClass("active");
                var fselector = jQuery(this).data('filter');

                $portfolio_gallery.isotope({
                    itemSelector: '.gallery-item',
                    layoutMode: isotope_mode,
                    filter: fselector
                });
                return false;
            });
            
            THEMEMASCOT.slider.TM_flexslider();

        },

        TM_portfolioFlexSliderGalleryPopUpInit: function() {
            var $flexSliders = $portfolio_gallery.find('.slides');
            if( $flexSliders.length > 0 ) {
                $flexSliders.each(function () {
                    var _items = jQuery(this).find("li > a");
                    var items = [];
                    for (var i = 0; i < _items.length; i++) {
                        items.push({src: jQuery(_items[i]).attr("href"), title: jQuery(_items[i]).attr("title")});
                    }
                    jQuery(this).parent().parent().parent().find(".icons-holder").magnificPopup({
                        items: items,
                        type: 'image',
                        gallery: {
                            enabled: true
                        }
                    });
                });
            }
        },

        TM_isotopeGridRearrange: function() {
            var isotope_mode;
            if ($portfolio_gallery.hasClass("masonry")){
                isotope_mode = "masonry";
            } else{
                isotope_mode = "fitRows";
            }
            $portfolio_gallery.isotope({
                itemSelector: '.gallery-item',
                layoutMode: isotope_mode
            });
        },

        TM_isotopeGridShuffle: function() {
            $portfolio_gallery.isotope('shuffle');
        },

        /* ---------------------------------------------------------------------- */
        /* ----------------------------- CountDown ------------------------------ */
        /* ---------------------------------------------------------------------- */
        TM_countDownTimer: function() {
            var $clock = jQuery('#clock-count-down');
            var endingdate = $clock.data("endingdate");
            if( $clock.length > 0 ) {
                $clock.countdown(endingdate, function(event) {
                    var countdown_text = '' +
                        '<ul class="countdown-timer">' +
                        '<li>%D <span>Days</span></li>' +
                        '<li>%H <span>Hours</span></li>' +
                        '<li>%M <span>Minutes</span></li>' +
                        '<li>%S <span>Seconds</span></li>' +
                        '</ul>';
                    jQuery(this).html(event.strftime(countdown_text));
                });
            }
        },

        
        /* ---------------------------------------------------------------------- */
        /* ----------------------- pie chart / circle skill bar ----------------- */
        /* ---------------------------------------------------------------------- */
        TM_pieChart: function() {
            var $piechart = jQuery('.piechart');
            if( $piechart.length > 0 ) {
                $piechart.appear();
                $document_body.on('appear', '.piechart', function() {
                    var current_item = jQuery(this);
                    if (!current_item.hasClass('appeared')) {
                        var barcolor = current_item.data('barcolor');
                        var trackcolor = current_item.data('trackcolor');
                        var linewidth = current_item.data('linewidth');
                        var boxwidth = current_item.data('boxwidth');
                        current_item.css("width", boxwidth);
                        current_item.easyPieChart({
                            animate: 3000,
                            barColor: barcolor,
                            trackColor: trackcolor,
                            easing: 'easeOutBounce',
                            lineWidth: linewidth,
                            size: boxwidth,
                            lineCap: 'square',
                            scaleColor: false,
                            onStep: function(from, to, percent) {
                                jQuery(this.el).find('span').text(Math.round(percent));
                            }
                        });
                        current_item.addClass('appeared');
                    }
                });
            }
        },
        
        /* ---------------------------------------------------------------------- */
        /* ------------------- progress bar / horizontal skill bar -------------- */
        /* ---------------------------------------------------------------------- */
        TM_progressBar: function() {
            var $progress_bar = jQuery('.progress-bar');
            if( $progress_bar.length > 0 ) {
                $progress_bar.appear();
                $document_body.on('appear', '.progress-bar', function() {
                    var current_item = jQuery(this);
                    if (!current_item.hasClass('appeared')) {
                        var percent = current_item.data('percent');
                        var barcolor = current_item.data('barcolor');
                        current_item.append('<span class="percent">' + percent + '%' + '</span>').css('background-color', barcolor).css('width', percent + '%').addClass('appeared');
                    }
                    
                });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ------------------------ Funfact Number Counter ---------------------- */
        /* ---------------------------------------------------------------------- */
        TM_funfact: function() {
            var $animate_number = jQuery('.animate-number');
            if( $animate_number.length > 0 ) {
                $animate_number.appear();
                $document_body.on('appear', '.animate-number', function() {
                    $animate_number.each(function() {
                        var current_item = jQuery(this);
                        if (!current_item.hasClass('appeared')) {
                            current_item.animateNumbers(current_item.attr("data-value"), true, parseInt(current_item.attr("data-animation-duration"), 10)).addClass('appeared');
                        }
                    });
                });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ----------------------------- Instagram Feed ---------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_instagramFeed: function() {
            var $instagram_feed = jQuery('.instagram-feed');
            if( $instagram_feed.length > 0 ) {
                $instagram_feed.each(function() {
                    var current_div = jQuery(this);
                    var instagramFeed = new Instafeed({
                        target: current_div.attr('id'),
                        get: 'user',
                        userId: current_div.data('userid'),
                        accessToken: current_div.data('accesstoken'),
                        resolution: current_div.data('resolution'),
                        limit: current_div.data('limit'),
                        template: '<div class="item"><figure><img src="{{image}}" /><a href="{{link}}" class="link-out" target="_blank"><i class="fa fa-link"></i></a></figure></div>',
                        after: function() {
                        }
                    });
                    instagramFeed.run();
                });
            }

            var $instagram_feed_carousel = jQuery('.instagram-feed-carousel');
            if( $instagram_feed_carousel.length > 0 ) {
                $instagram_feed_carousel.each(function() {
                    var current_div = jQuery(this);
                    var instagramFeed = new Instafeed({
                        target: current_div.attr('id'),
                        get: 'user',
                        userId: current_div.data('userid'),
                        accessToken: current_div.data('accesstoken'),
                        resolution: current_div.data('resolution'),
                        limit: current_div.data('limit'),
                        template: '<div class="item"><figure><img src="{{image}}" /><a href="{{link}}" class="link-out" target="_blank"><i class="fa fa-link"></i></a></figure></div>',
                        after: function() {
                            current_div.owlCarousel({
                                rtl: THEMEMASCOT.isRTL.check(),
                                autoplay: true,
                                autoplayTimeout: 4000,
                                loop: true,
                                margin: 15,
                                dots: true,
                                nav: false,
                                responsive: {
                                    0: {
                                        items: 2
                                    },
                                    768: {
                                        items: 4
                                    },
                                    1000: {
                                        items: 5
                                    }
                                }
                            });
                        }
                    });
                    instagramFeed.run();
                });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ---------------------------- Flickr Feed ----------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_jflickrfeed: function() {
            var $jflickrfeed = jQuery(".flickr-widget .flickr-feed, .jflickrfeed");
            if( $jflickrfeed.length > 0 ) {
                $jflickrfeed.each(function() {
                    var current_div = jQuery(this);
                    current_div.jflickrfeed({
                        limit: 9,
                        qstrings: {
                            id: current_div.data('userid')
                        },
                        itemTemplate: '<a href="{{link}}" title="{{title}}" target="_blank"><img src="{{image_m}}" alt="{{title}}">  </a>'
                    });
                });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ------------------------- accordion & toggles ------------------------ */
        /* ---------------------------------------------------------------------- */
        TM_accordion_toggles: function() {
            var $panel_group_collapse = jQuery('.panel-group .collapse');
            $panel_group_collapse.on("show.bs.collapse", function(e) {
                jQuery(this).closest(".panel-group").find("[href='#" + jQuery(this).attr("id") + "']").addClass("active");
            });
            $panel_group_collapse.on("hide.bs.collapse", function(e) {
                jQuery(this).closest(".panel-group").find("[href='#" + jQuery(this).attr("id") + "']").removeClass("active");
            });
        },

        /* ---------------------------------------------------------------------- */
        /* ------------------------------- tooltip  ----------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_tooltip: function() {
            var $tooltip = jQuery('[data-toggle="tooltip"]');
            if( $tooltip.length > 0 ) {
                $tooltip.tooltip();
            }
        },

        /* ---------------------------------------------------------------------- */
        /* ---------------------------- Twitter Feed  --------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_twittie: function() {
            var $twitter_feed = jQuery('.twitter-feed');
            var $twitter_feed_carousel = jQuery('.twitter-feed-carousel');
            
            if( $twitter_feed.length > 0 ) {
                $twitter_feed.twittie({
                    username: $twitter_feed.data('username'),
                    dateFormat: '%b. %d, %Y',
                    template: '{{tweet}} <div class="date">{{date}}</div>',
                    count: ( $twitter_feed.data("count") === undefined ) ? 4: $twitter_feed.data("count"),
                    loadingText: 'Loading!'
                });
            }

            if( $twitter_feed_carousel.length > 0 ) {
                $twitter_feed_carousel.twittie({
                    username: $twitter_feed_carousel.data('username'),
                    dateFormat: '%b. %d, %Y',
                    template: '{{tweet}} <div class="date">{{date}}</div>',
                    count: ( $twitter_feed_carousel.data("count") === undefined ) ? 4: $twitter_feed_carousel.data("count"),
                    loadingText: 'Loading!'
                }, function() {
                    $twitter_feed_carousel.find('ul').owlCarousel({
                        rtl: THEMEMASCOT.isRTL.check(),
                        autoplay: true,
                        autoplayTimeout: 2000,
                        loop: true,
                        items: 1,
                        dots: true,
                        nav: false
                    });
                });
            }
        }
    };

    THEMEMASCOT.slider = {

        init: function() {

            var t = setTimeout(function() {
                THEMEMASCOT.slider.TM_typedAnimation();
                THEMEMASCOT.slider.TM_flexslider();
                THEMEMASCOT.slider.TM_owlCarousel();
                THEMEMASCOT.slider.TM_maximageSlider();
                THEMEMASCOT.slider.TM_bxslider();
            }, 0);

        },


        /* ---------------------------------------------------------------------- */
        /* -------------------------- Typed Text Carousel  ---------------------- */
        /* ---------------------------------------------------------------------- */
        TM_typedAnimation: function() {
            var $typed_text_carousel = jQuery('.typed-text-carousel');
            if ( $typed_text_carousel.length > 0 ) {
                $typed_text_carousel.each(function() {
                    var string_1 = jQuery(this).find('span:first-child').text();
                    var string_2 = jQuery(this).find('span:nth-child(2)').text();
                    var string_3 = jQuery(this).find('span:nth-child(3)').text();
                    var str = '';
                    var $this = jQuery(this);
                    if (!string_2.trim() || !string_3.trim()) {
                        str = [string_1];
                    }
                    if (!string_3.trim() && string_2.length) {
                        str = [string_1, string_2];
                    }
                    if (string_1.length && string_2.length && string_3.length) {
                        str = [string_1, string_2, string_3];
                    }
                    var speed = jQuery(this).data('speed');
                    var back_delay = jQuery(this).data('back_delay');
                    var loop = jQuery(this).data('loop');
                    jQuery(this).typed({
                        strings: str,
                        typeSpeed: speed,
                        backSpeed: 0,
                        backDelay: back_delay,
                        cursorChar: "|",
                        loop: loop,
                        contentType: 'text',
                        loopCount: false
                    });
                });
            }
        },


        /* ---------------------------------------------------------------------- */
        /* -------------------------------- flexslider  ------------------------- */
        /* ---------------------------------------------------------------------- */
        TM_flexslider: function() {
            var $each_flex_slider = jQuery('.flexslider-wrapper').find('.flexslider');
            if ( $each_flex_slider.length > 0 ) {
                THEMEMASCOT.widget.TM_portfolioFlexSliderGalleryPopUpInit();
                $each_flex_slider.each(function() {
                    var $flex_slider = jQuery(this);
                    var data_direction = ( $flex_slider.parent().data("direction") === undefined ) ? 'horizontal': $flex_slider.parent().data("direction");
                    var data_controlNav = ( $flex_slider.parent().data("controlnav") === undefined ) ? true: $flex_slider.parent().data("controlnav");
                    var data_directionnav = ( $flex_slider.parent().data("directionnav") === undefined ) ? true: $flex_slider.parent().data("directionnav");
                    $flex_slider.flexslider({
                        rtl: THEMEMASCOT.isRTL.check(),
                        selector: ".slides > li",
                        animation: "slide",
                        easing: "swing",
                        direction: data_direction,
                        slideshow: true,
                        slideshowSpeed: 7000,
                        animationSpeed: 600,
                        pauseOnHover: false,
                        controlNav: data_controlNav,
                        directionNav: data_directionnav,
                        start: function(slider){
                            imagesLoaded($portfolio_gallery, function(){
                                setTimeout(function(){
                                    $portfolio_filter_first_child.trigger("click");
                                },500);
                            });
                            THEMEMASCOT.initialize.TM_magnificPopup_lightbox();
                            THEMEMASCOT.initialize.TM_prettyPhoto_lightbox();
                            THEMEMASCOT.initialize.TM_nivolightbox();
                        },
                        after: function(){
                        }
                    });
                });
            }
        },

        /* ---------------------------------------------------------------------- */
        /* -------------------------------- Owl Carousel  ----------------------- */
        /* ---------------------------------------------------------------------- */
        TM_owlCarousel: function() {
            var $owl_carousel_1col = jQuery('.owl-carousel-1col, .text-carousel, .image-carousel, .fullwidth-carousel');
            if ( $owl_carousel_1col.length > 0 ) {
                $owl_carousel_1col.each(function() {
                    var data_dots = ( jQuery(this).data("dots") === undefined ) ? false: jQuery(this).data("dots");
                    var data_nav = ( jQuery(this).data("nav") === undefined ) ? false: jQuery(this).data("nav");
                    var data_duration = ( jQuery(this).data("duration") === undefined ) ? 4000: jQuery(this).data("duration");
                    jQuery(this).owlCarousel({
                        rtl: THEMEMASCOT.isRTL.check(),
                        autoplay: true,
                        autoplayTimeout: data_duration,
                        loop: true,
                        items: 1,
                        dots: data_dots,
                        nav: data_nav,
                        navText: [
                            '<i class="pe-7s-angle-left"></i>',
                            '<i class="pe-7s-angle-right"></i>'
                        ]
                    });
                });
            }

            var $owl_carousel_2col = jQuery('.owl-carousel-2col');
            if ( $owl_carousel_2col.length > 0 ) {
                $owl_carousel_2col.each(function() {
                    var data_dots = ( jQuery(this).data("dots") === undefined ) ? false: jQuery(this).data("dots");
                    var data_nav = ( jQuery(this).data("nav")=== undefined ) ? false: jQuery(this).data("nav");
                    var data_duration = ( jQuery(this).data("duration") === undefined ) ? 4000: jQuery(this).data("duration");
                    jQuery(this).owlCarousel({
                        rtl: THEMEMASCOT.isRTL.check(),
                        autoplay: true,
                        autoplayTimeout: data_duration,
                        loop: true,
                        items: 2,
                        margin: 15,
                        dots: data_dots,
                        nav: data_nav,
                        navText: [
                            '<i class="pe-7s-angle-left"></i>',
                            '<i class="pe-7s-angle-right"></i>'
                        ],
                        responsive: {
                            0: {
                                items: 1,
                                center: false
                            },
                            480: {
                                items: 1,
                                center: false
                            },
                            600: {
                                items: 1,
                                center: false
                            },
                            750: {
                                items: 2,
                                center: false
                            },
                            960: {
                                items: 2
                            },
                            1170: {
                                items: 2
                            },
                            1300: {
                                items: 2
                            }
                        }
                    });
                });
            }

            var $owl_carousel_3col = jQuery('.owl-carousel-3col');
            if ( $owl_carousel_3col.length > 0 ) {
                $owl_carousel_3col.each(function() {
                    var data_dots = ( jQuery(this).data("dots") === undefined ) ? false: jQuery(this).data("dots");
                    var data_nav = ( jQuery(this).data("nav")=== undefined ) ? false: jQuery(this).data("nav");
                    var data_duration = ( jQuery(this).data("duration") === undefined ) ? 4000: jQuery(this).data("duration");
                    jQuery(this).owlCarousel({
                        rtl: THEMEMASCOT.isRTL.check(),
                        autoplay: true,
                        autoplayTimeout: data_duration,
                        loop: true,
                        items: 3,
                        margin: 15,
                        dots: data_dots,
                        nav: data_nav,
                        navText: [
                            '<i class="pe-7s-angle-left"></i>',
                            '<i class="pe-7s-angle-right"></i>'
                        ],
                        responsive: {
                            0: {
                                items: 1,
                                center: false
                            },
                            480: {
                                items: 1,
                                center: false
                            },
                            600: {
                                items: 1,
                                center: false
                            },
                            750: {
                                items: 2,
                                center: false
                            },
                            960: {
                                items: 2
                            },
                            1170: {
                                items: 3
                            },
                            1300: {
                                items: 3
                            }
                        }
                    });
                });
            }
            

            var $owl_carousel_4col = jQuery('.owl-carousel-4col');
            if ( $owl_carousel_4col.length > 0 ) {
                $owl_carousel_4col.each(function() {
                    var data_dots = ( jQuery(this).data("dots") === undefined ) ? false: jQuery(this).data("dots");
                    var data_nav = ( jQuery(this).data("nav")=== undefined ) ? false: jQuery(this).data("nav");
                    var data_duration = ( jQuery(this).data("duration") === undefined ) ? 4000: jQuery(this).data("duration");
                    jQuery(this).owlCarousel({
                        rtl: THEMEMASCOT.isRTL.check(),
                        autoplay: true,
                        autoplayTimeout: data_duration,
                        loop: true,
                        items: 4,
                        margin: 15,
                        dots: data_dots,
                        nav: data_nav,
 
                        navText: [
                            '',
                            ''
                        ],
                        responsive: {
                            0: {
                                items: 1,
                                center: true
                            },
                            480: {
                                items: 1,
                                center: false
                            },
                            600: {
                                items: 3,
                                center: false
                            },
                            750: {
                                items: 3,
                                center: false
                            },
                            960: {
                                items: 4
                            },
                            1170: {
                                items: 4
                            },
                            1300: {
                                items: 4
                            }
                        },
                        onInitialized: function(e){
                            var i = this._current > 1 ? this._current + Math.floor(this._current/2) : 1;
                            jQuery('.owl-carousel-4col .owl-item').removeClass('current-active');
                            jQuery('.owl-carousel-4col .owl-item').eq(i).addClass('current-active');
                        }
                         
                    });
                });
            }
            //active carousel
  
    jQuery('.owl-carousel-4col').on('translate.owl.carousel', function(e){
       
        var i =Math.floor(e.page.size   /2);
        jQuery('.owl-carousel-4col .owl-item').removeClass('current-active');
        jQuery('.owl-carousel-4col .owl-item').eq(e.item.index + i ).addClass('current-active');
     });

            var $owl_carousel_5col = jQuery('.owl-carousel-5col');
            if ( $owl_carousel_5col.length > 0 ) {
                $owl_carousel_5col.each(function() {
                    var data_dots = ( jQuery(this).data("dots") === undefined ) ? false: jQuery(this).data("dots");
                    var data_nav = ( jQuery(this).data("nav")=== undefined ) ? false: jQuery(this).data("nav");
                    var data_duration = ( jQuery(this).data("duration") === undefined ) ? 4000: jQuery(this).data("duration");
                    jQuery(this).owlCarousel({
                        rtl: THEMEMASCOT.isRTL.check(),
                        autoplay: true,
                        autoplayTimeout: data_duration,
                        loop: true,
                        items: 5,
                        margin: 15,
                        dots: data_dots,
                        nav: data_nav,
                        navText: [
                            '<i class="pe-7s-angle-left"></i>',
                            '<i class="pe-7s-angle-right"></i>'
                        ],
                        responsive: {
                            0: {
                                items: 1,
                                center: false
                            },
                            480: {
                                items: 1,
                                center: false
                            },
                            600: {
                                items: 2,
                                center: false
                            },
                            750: {
                                items: 3,
                                center: false
                            },
                            960: {
                                items: 4
                            },
                            1170: {
                                items: 5
                            },
                            1300: {
                                items: 5
                            }
                        }
                    });
                });
            }

            var $owl_carousel_6col = jQuery('.owl-carousel-6col');
            if ( $owl_carousel_6col.length > 0 ) {
                $owl_carousel_6col.each(function() {
                    var data_dots = ( jQuery(this).data("dots") === undefined ) ? false: jQuery(this).data("dots");
                    var data_nav = ( jQuery(this).data("nav")=== undefined ) ? false: jQuery(this).data("nav");
                    var data_duration = ( jQuery(this).data("duration") === undefined ) ? 4000: jQuery(this).data("duration");
                    jQuery(this).owlCarousel({
                        rtl: THEMEMASCOT.isRTL.check(),
                        autoplay: true,
                        autoplayTimeout: data_duration,
                        loop: true,
                        items: 6,
                        margin: 15,
                        dots: data_dots,
                        nav: data_nav,
                        navText: [
                            '<i class="pe-7s-angle-left"></i>',
                            '<i class="pe-7s-angle-right"></i>'
                        ],
                        responsive: {
                            0: {
                                items: 1,
                                center: false
                            },
                            480: {
                                items: 1,
                                center: false
                            },
                            600: {
                                items: 2,
                                center: false
                            },
                            750: {
                                items: 3,
                                center: false
                            },
                            960: {
                                items: 4
                            },
                            1170: {
                                items: 6
                            },
                            1300: {
                                items: 6
                            }
                        }
                    });
                });
            }

            var $owl_carousel_7col = jQuery('.owl-carousel-7col');
            if ( $owl_carousel_7col.length > 0 ) {
                $owl_carousel_7col.each(function() {
                    var data_dots = ( jQuery(this).data("dots") === undefined ) ? false: jQuery(this).data("dots");
                    var data_nav = ( jQuery(this).data("nav")=== undefined ) ? false: jQuery(this).data("nav");
                    var data_duration = ( jQuery(this).data("duration") === undefined ) ? 4000: jQuery(this).data("duration");
                    jQuery(this).owlCarousel({
                        rtl: THEMEMASCOT.isRTL.check(),
                        autoplay: true,
                        autoplayTimeout: data_duration,
                        loop: true,
                        items: 7,
                        margin: 15,
                        dots: data_dots,
                        nav: data_nav,
                        navText: [
                            '<i class="pe-7s-angle-left"></i>',
                            '<i class="pe-7s-angle-right"></i>'
                        ],
                        responsive: {
                            0: {
                                items: 1,
                                center: false
                            },
                            600: {
                                items: 2,
                                center: false
                            },
                            750: {
                                items: 3,
                                center: false
                            },
                            960: {
                                items: 4
                            },
                            1170: {
                                items: 7
                            },
                            1300: {
                                items: 7
                            }
                        }
                    });
                });
            }

            var $owl_carousel_8col = jQuery('.owl-carousel-8col');
            if ( $owl_carousel_8col.length > 0 ) {
                $owl_carousel_8col.each(function() {
                    var data_dots = ( jQuery(this).data("dots") === undefined ) ? false: jQuery(this).data("dots");
                    var data_nav = ( jQuery(this).data("nav")=== undefined ) ? false: jQuery(this).data("nav");
                    var data_duration = ( jQuery(this).data("duration") === undefined ) ? 4000: jQuery(this).data("duration");
                    jQuery(this).owlCarousel({
                        rtl: THEMEMASCOT.isRTL.check(),
                        autoplay: true,
                        autoplayTimeout: data_duration,
                        loop: true,
                        items: 8,
                        margin: 15,
                        dots: data_dots,
                        nav: data_nav,
                        navText: [
                            '<i class="pe-7s-angle-left"></i>',
                            '<i class="pe-7s-angle-right"></i>'
                        ],
                        responsive: {
                            0: {
                                items: 1,
                                center: false
                            },
                            600: {
                                items: 2,
                                center: false
                            },
                            750: {
                                items: 3,
                                center: false
                            },
                            960: {
                                items: 5
                            },
                            1170: {
                                items: 8
                            },
                            1300: {
                                items: 8
                            }
                        }
                    });
                });
            }
            
        },


        /* ---------------------------------------------------------------------- */
        /* ----------------------------- BxSlider  ------------------------------ */
        /* ---------------------------------------------------------------------- */
        TM_bxslider: function() {
            var $bxslider = jQuery('.bxslider');
            if( $bxslider.length > 0 ) {
                $bxslider.bxSlider({
                    mode: 'vertical',
                    minSlides: ( $bxslider.data("count") === undefined ) ? 2: $bxslider.data("count"),
                    slideMargin: 20,
                    pager: false,
                    prevText: '<i class="fa fa-angle-left"></i>',
                    nextText: '<i class="fa fa-angle-right"></i>'
                });
            }
        },


        /* ---------------------------------------------------------------------- */
        /* ---------- maximage Fullscreen Parallax Background Slider  ----------- */
        /* ---------------------------------------------------------------------- */
        TM_maximageSlider: function() {
            var $maximage_slider = jQuery('#maximage');
            if( $maximage_slider.length > 0 ) {
                $maximage_slider.maximage({
                    cycleOptions: {
                        fx: 'fade',
                        speed: 1500,
                        prev: '.img-prev',
                        next: '.img-next'
                    }
                });
            }
        }
    };


    /* ---------------------------------------------------------------------- */
    /* ---------- document ready, window load, scroll and resize ------------ */
    /* ---------------------------------------------------------------------- */
    //document ready
    THEMEMASCOT.documentOnReady = {
        init: function() {
            THEMEMASCOT.initialize.init();
            THEMEMASCOT.header.init();
            THEMEMASCOT.slider.init();
            THEMEMASCOT.widget.init();
            THEMEMASCOT.windowOnscroll.init();
        }
    };

    //window on load
    THEMEMASCOT.windowOnLoad = {
        init: function() {
            var t = setTimeout(function() {
                THEMEMASCOT.initialize.TM_wow();
                THEMEMASCOT.widget.TM_twittie();
                THEMEMASCOT.initialize.TM_magnificPopup_lightbox();
                THEMEMASCOT.initialize.TM_preLoaderOnLoad();
                THEMEMASCOT.initialize.TM_hashForwarding();
                THEMEMASCOT.initialize.TM_parallaxBgInit();
            }, 0);
            $window.trigger("scroll");
            $window.trigger("resize");
        }
    };

    //window on scroll
    THEMEMASCOT.windowOnscroll = {
        init: function() {
            $window.on( 'scroll', function(){
                THEMEMASCOT.header.TM_scroolToTop();
                THEMEMASCOT.header.TM_activateMenuItemOnReach();
                THEMEMASCOT.header.TM_topnavAnimate();
            });
        }
    };

    //window on resize
    THEMEMASCOT.windowOnResize = {
        init: function() {
            var t = setTimeout(function() {
                THEMEMASCOT.initialize.TM_equalHeightDivs();
                THEMEMASCOT.initialize.TM_resizeFullscreen();
            }, 400);
        }
    };


    /* ---------------------------------------------------------------------- */
    /* ---------------------------- Call Functions -------------------------- */
    /* ---------------------------------------------------------------------- */
    $document.ready(
        THEMEMASCOT.documentOnReady.init
    );
    $window.load(
        THEMEMASCOT.windowOnLoad.init
    );
    $window.on('resize', 
        THEMEMASCOT.windowOnResize.init
    );

    //call function before document ready
    THEMEMASCOT.initialize.TM_preLoaderClickDisable();

})(jQuery);