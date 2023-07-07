;(function ($) {
    "use strict";
    var pxl_scroll_top;
    var pxl_window_height;
    var pxl_window_width;
    var pxl_scroll_status = '';
    var pxl_last_scroll_top = 0;
    $(window).on('load', function () {
        pxl_window_width = $(window).width();
        $(".pxl-loader").fadeOut("slow");
        builderrin_col_offset();
        builderrin_header_sticky();
        builderrin_scroll_to_top();
        builderrin_quantity_icon();
        builderrin_footer_fixed();
        builderrin_panel_anchor_toggle();
        builderrin_document_click();
        builderrin_product_single_variations_att();
        builderrin_smooth_scroll();
        builderrin_backtotop_indicator();
        builderrin_svg_length();
        builderrin_hide_border_top();

        tabCarousel();
        blog_list_scroll();
        grid_filter_scroll();
    });

    $(window).on('resize', function () {
        pxl_window_width = $(window).width();
        blog_list_scroll();
        grid_filter_scroll();
        builderrin_svg_length();
        builderrin_hide_border_top();
    });

    $(window).on('scroll', function () {
        pxl_scroll_top = $(window).scrollTop();
        pxl_window_height = $(window).height();
        pxl_window_width = $(window).width();
        if (pxl_scroll_top < pxl_last_scroll_top) {
            pxl_scroll_status = 'up';
        } else {
            pxl_scroll_status = 'down';
        }
        pxl_last_scroll_top = pxl_scroll_top;
        builderrin_header_sticky();
        builderrin_scroll_to_top();
        builderrin_footer_fixed();
    });

    $(document).ready(function () {
        builderrin_lightdark_switch();
        builderrin_loader();

        /* Menu Responsive Dropdown */
        var $builderrin_menu = $('.pxl-header-elementor-main');
        $builderrin_menu.find('.pxl-menu-primary li').each(function () {
            var $builderrin_submenu = $(this).find('> ul.sub-menu');
            if ($builderrin_submenu.length == 1) {
                $(this).hover(function () {
                    if ($builderrin_submenu.offset().left + $builderrin_submenu.width() > $(window).width()) {
                        $builderrin_submenu.addClass('pxl-sub-reverse');
                    } else if ($builderrin_submenu.offset().left < 0) {
                        $builderrin_submenu.addClass('pxl-sub-reverse');
                    }
                }, function () {
                    $builderrin_submenu.removeClass('pxl-sub-reverse');
                });
            }
        });

        /* Start Menu Mobile */
        $('.pxl-header-menu li.menu-item-has-children, .pxl-nav-hidden li.menu-item-has-children, .pxl-menu-primary li.menu-item-has-children').append('<span class="pxl-menu-toggle"></span>');
        $('.pxl-menu-toggle').on('click', function () {
            if( $(this).hasClass('active')){
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
            }else{
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                $(this).toggleClass('active');
                $(this).parent().find('> .sub-menu').toggleClass('active');
                $(this).parent().find('> .sub-menu').slideToggle();
            }
        });
        $("#pxl-nav-mobile").on('click', function () {
            $(this).toggleClass('active');
            $('.pxl-header-menu').toggleClass('active');
        });

        $(".pxl-menu-close, .pxl-header-menu-backdrop").on('click', function () {
            $(this).parents('.pxl-header-main').find('.pxl-header-menu').removeClass('active');
            $('#pxl-nav-mobile').removeClass('active');
        });
        /* End Menu Mobile */

        /* Elementor Header */
        $('.pxl-type-header-clip > .elementor-container').append('<div class="pxl-header-shape"><span></span></div>');

        /* Scroll To Top */
        $('.pxl-scroll-top').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        /* Animate Time Delay */
        $('.pxl-grid-masonry').each(function () {
            var eltime = 100;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .pxl-grid-item > .wow').each(function (index, obj) {
                $(this).css('animation-delay', eltime + 'ms');
                if (_elt === index) {
                    eltime = 100;
                    _elt = _elt + elt_inner;
                } else {
                    eltime = eltime + 60;
                }
            });
        });

        $('.pxl-item--text').each(function () {
            var pxl_time = 0;
            var pxl_item_inner = $(this).children().length;
            var _elt = pxl_item_inner - 1;
            $(this).find('> .pxl-text--slide > .wow').each(function (index, obj) {
                $(this).css('transition-delay', pxl_time + 'ms');
                if (_elt === index) {
                    pxl_time = 0;
                    _elt = _elt + pxl_item_inner;
                } else {
                    pxl_time = pxl_time + 80;
                }
            });
        });

        /* Nice Select */
        $('.pxl-nice-select, .woocommerce .woocommerce-ordering .orderby, #wp-block-archives-1, #wp-block-categories-1').each(function () {
            $(this).niceSelect();
        });
        $('.woocommerce div.product form.cart .variations select').each(function () {
            $(this).niceSelect();
        });

        /* Comment Form */
        $(".comment-respond .form-submit input.submit").remove();
        $('.comment-respond .form-submit').append( '<button name="submit" type="submit" id="submit" class="submit" value="Post Comment">submit</button>' );

        /* Related Post - Slick Slider */
        const postSlider = $(".pxl-related-post .pxl-related-post-inner, .pxl-related-portfolio .pxl-related-post-inner");
        postSlider
        .slick({
            dots: false,
            infinite: true,
            arrows: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            responsive: [
            {
                breakpoint: 768,
                settings: {
                    dots: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
            ]
        });
        postSlider.on('wheel', (function(e) {
            e.preventDefault();
            if (e.originalEvent.deltaY < 0) {
                $(this).slick('slickNext');
            } else {
                $(this).slick('slickPrev');
            }
        }));

        /* Custom Post */
        var dhi = 0;
        $(".pxl-item-single-post .pxl-post--navigation .nav--title").each(function(){
            var default_height = $(this).height();
            if(default_height > dhi){
                dhi = default_height;
            }
        });
        $('.pxl-item-single-post .pxl-post--navigation .nav--line').css("height", dhi);
        $(window).resize(function() {
            var hi = 0;
            $(".pxl-item-single-post .pxl-post--navigation .nav--title").each(function(){
                var h = $(this).height();
                if(h > hi){
                    hi = h;
                }
            });
            $('.pxl-item-single-post .pxl-post--navigation .nav--line').css("height", hi);
        });

        /* Custom Widget */
        $(".widget_calendar").each(function() {
            var $np = $(this).find(".wp-calendar-nav-prev a");
            var text_prev = $np.text().replace("«", "");
            $np.text(text_prev);

            var $nn = $(this).find(".wp-calendar-nav-next a");
            var text_next = $nn.text().replace("»", "");
            $nn.text(text_next);
        });
        
        // $(".pxl-service-grid-layout1 .pxl-item--holder").each(function(e) {
        //     var icon_service_list = $(this).find(".service-title");
        //     var icon_service = $(this).find(".pxl-item--content .pxl-btn-line");
        //     var a1 = icon_service.attr('href');
        //     icon_service_list.forEach(function(el) {
        //         var a2 = $(this).attr('href');                
        //         if (a1 == a2) {
        //             icon_service_list.addClass('on');
        //         }               
        //     })
        // });

        /* Custom Service Page */
        $('.service .pxl-post--navigation').parents('#pxl-main').css('padding-bottom', 80 + 'px');

        /* Custom Shop Page */
        $('.woocommerce .woocommerce-summary-wrap.row.style1').parents('.product').addClass('pxl-product-page-style1');
        $('.woocommerce .woocommerce-summary-wrap.row.style2').parents('.product').addClass('pxl-product-page-style2');

        $(".woocommerce .pxl-wapper #pxl-main .pxl-content-product .woosc-quick-table").remove();
        $(".woocommerce ul.products li.product > .woosc-btn, .woocommerce ul.products li.product > .woosq-btn, .woocommerce ul.products li.product > .woosw-btn").remove();

        $('.add_to_cart_button').attr('title', 'Add To Cart');
        $('.product_type_grouped').attr('title', 'View Product');
        $('.product_type_external').attr('title', 'Shop Now');
        $('.woosw-btn').attr('title', 'Add To Wishlist');
        $('.woosq-btn').attr('title', 'Quick View');
        $('.woosc-btn').attr('title', 'Compare');
        $('.woocommerce .quantity, .woocommerce-page .quantity').attr('data-cursor', '-hidden');

        // Custom Add space in the end price currency
        var woocurrencySymbol = document.querySelectorAll('.woocommerce-Price-currencySymbol');
        woocurrencySymbol.forEach(function(el){
            var string = el.innerText;
            el.innerText = '';
            var result = string.trim()+" ";
            el.innerHTML += result;
        });

        // Custom width nice select shop archive
        var woo_nice_select = document.querySelectorAll('.woocommerce .nice-select');
        woo_nice_select.forEach(function(){
            var default_width = $('.woocommerce .woocommerce-product-inner').width();
            $('.woocommerce .nice-select').css("min-width", default_width);
            $(window).resize(function() {
                var default_width = $('.woocommerce .woocommerce-product-inner').width();
                $('.woocommerce .nice-select').css("min-width", default_width);
            });
        });

        // Custom scroll flex control shop single
        $('.woocommerce .woocommerce-summary-wrap.row .flex-control-nav').each(function () {
            var count_nav_item = $(this).find('li').length;
            if (count_nav_item >= 5) {
                $(this).addClass('pxl-custom-scroll');
                var flex_width = $(this).parent().width();
                $(this).css("max-width", flex_width);
            }
        });

        var woo_tabs = $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper').clone();
        $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper').remove();
        $('.woocommerce .product.pxl-product-page-style2 .woocommerce-summary-wrap .woocommerce-gallery + div').append(woo_tabs);

        var woo_wooc_product_meta = $('.single-product #primary div.product .entry-summary .wooc-product-meta').clone();
        $('.single-product #primary div.product .entry-summary .wooc-product-meta').remove();
        if($('.single-product #primary div.product form').hasClass('variations_form')){
            $('.single-product #primary div.product form.cart').find(".woocommerce-variation-add-to-cart").append(woo_wooc_product_meta);
        } else {
            $('.single-product #primary div.product form.cart').append(woo_wooc_product_meta);
        }

        var woo_tabs_des = $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper .woocommerce-Tabs-panel--description').clone();
        $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper .woocommerce-Tabs-panel--description').remove();
        $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper .wc-tabs .description_tab').append(woo_tabs_des);
        var woo_tabs_infor = $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper .woocommerce-Tabs-panel--additional_information').clone();
        $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper .woocommerce-Tabs-panel--additional_information').remove();
        $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper .wc-tabs .additional_information_tab').append(woo_tabs_infor);
        var woo_tabs_feature = $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper .woocommerce-Tabs-panel--tab-product-feature').clone();
        $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper .woocommerce-Tabs-panel--tab-product-feature').remove();
        $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper .wc-tabs .tab-product-feature_tab').append(woo_tabs_feature);
        var woo_tabs_review = $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper .woocommerce-Tabs-panel--reviews').clone();
        $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper .woocommerce-Tabs-panel--reviews').remove();
        $('.woocommerce .product.pxl-product-page-style2 .woocommerce-tabs.wc-tabs-wrapper .wc-tabs .reviews_tab').append(woo_tabs_review);

        /* Search Popup */
        $(".pxl-search-popup-button").on('click', function () {
            $('body').addClass('pxl-ov-hidden');
            $('#pxl-search-popup').addClass('active');
            $('#pxl-search-popup .search-field').focus();
        });
        $("#pxl-search-popup .pxl-item--overlay, #pxl-search-popup .pxl-item--close").on('click', function () {
            $('body').removeClass('pxl-ov-hidden');
            $('#pxl-search-popup').removeClass('active');
        });

        /* Lightbox Popup */
        $('.btn-video, .pxl-video-popup').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        /* Showcase */
        $('.btn-hover').each(function () {
            $(this).hover(function () {
                $(this).parents('.item-feature').find('.btn-hover').removeClass('active');
                $(this).addClass('active');
            });
        });

                /* Hover Menu */
        $(function() {
            $('.pxl-menu-primary').append("<span class='bar'></span>"); // create new element
            var $bar = $('.pxl-menu-primary .bar');
            var barLeft1 =  $('.pxl-menu-primary .current-menu-item, .current-menu-ancestor');
            var barLeft2 =  $('.pxl-menu-primary>li');
            if (barLeft1.position() != null) {
                var barLeft =  barLeft1.position().left;                
            }
            else {
                var barLeft =  barLeft2.position().left;                                
            }
            var barWidth = $('.pxl-menu-primary li a span').width();  
            $bar.css('width', barWidth).css('left', barLeft);

            // get hover menu item position and width
            $('.pxl-menu-primary>li').hover(function() {
                $bar.css('width', $('.pxl-menu-primary li a span').width()).css('left', $(this).position().left);
            });

            // return to the original position of the active list item
            if (barLeft1.position() != null) {
                $('.pxl-menu-primary').mouseleave(function() {
                    $bar.css('width', $('.pxl-menu-primary li a span').width()).css('left', $('.pxl-menu-primary .current-menu-item, .current-menu-ancestor').position().left);  
                });
            }else {
                $('.pxl-menu-primary').mouseleave(function() {
                    $bar.css('width', $('.pxl-menu-primary li a span').width()).css('left', $('.pxl-menu-primary>li').position().left);  
                });
            }

            // сhanging the active menu item
            $('.pxl-menu-primary li').click(function() {
                barLeft =  $(this).position().left;
                barWidth = $(this).width();
                $('.pxl-menu-primary li').removeClass('active');
                $(this).addClass('active');
            });
        });

        /* Hover Active Item */
        $('.pxl--widget-hover').each(function () {
            $(this).hover(function () {
                $(this).parents('.elementor-row').find('.pxl--widget-hover').removeClass('pxl--item-active');
                $(this).parents('.elementor-container').find('.pxl--widget-hover').removeClass('pxl--item-active');
                $(this).addClass('pxl--item-active');
            });
        });

        /* Hover Button */
        $('.btn-plus-text').hover(function () {
            $(this).find('span').toggle(300);
        });

        /* Nav Logo */
        $(".pxl-nav-button").on('click', function () {
            $(this).toggleClass('active');
            $(this).parent().find('.pxl-nav-wrap').toggle(400);
        });

        function loopToggleClass(el, toggleClass) {
            el = $(el);
            let counter = 0;
            if (el.hasClass(toggleClass)) {
                waitFor(function () {
                    counter++;
                    return counter == 2;
                }, function () {
                    counter = 0;
                    el.removeClass(toggleClass);
                    loopToggleClass(el, toggleClass);
                }, 'Deactivate', 1000);
            } else {
                waitFor(function () {
                    counter++;
                    return counter == 3;
                }, function () {
                    counter = 0;
                    el.addClass(toggleClass);
                    loopToggleClass(el, toggleClass);
                }, 'Activate', 1000);
            }
        }

        function waitFor(condition, callback, message, time) {
            if (message == null || message == '' || typeof message == 'undefined') {
                message = 'Timeout';
            }
            if (time == null || time == '' || typeof time == 'undefined') {
                time = 100;
            }
            var cond = condition();
            if (cond) {
                callback();
            } else {
                setTimeout(function() {
                    console.log(message);
                    waitFor(condition, callback, message, time);
                }, time);
            }
        }
        /* End Icon Bounce */

        /* Select Theme Style */
        $('.wpcf7-select').each(function(){
            var $this = $(this), numberOfOptions = $(this).children('option').length;

            $this.addClass('pxl-select-hidden');
            $this.wrap('<div class="pxl-select"></div>');
            $this.after('<div class="pxl-select-higthlight"></div>');

            var $styledSelect = $this.next('div.pxl-select-higthlight');
            $styledSelect.text($this.children('option').eq(0).text());

            var $list = $('<ul />', {
                'class': 'pxl-select-options'
            }).insertAfter($styledSelect);

            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
            }

            var $listItems = $list.children('li');

            $styledSelect.click(function(e) {
                e.stopPropagation();
                $('div.pxl-select-higthlight.active').not(this).each(function(){
                    $(this).removeClass('active').next('ul.pxl-select-options').addClass('pxl-select-lists-hide');
                });
                $(this).toggleClass('active');
            });

            $listItems.click(function(e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
            });

            $(document).click(function() {
                $styledSelect.removeClass('active');
            });

        });
        $('#pxl-sidebar-area select').each(function(){
            $(this).niceSelect();
        });

        /* Row Divider */
        $('.pxl-row-divider-angle-top').append('<svg class="pxl-row-angle" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg>');

        /* Slider - Group align center */
        setTimeout(function(){
            $('.md-align-center').parents('.rs-parallax-wrap').addClass('pxl-group-center');
        }, 300);

        /* Start Icon Bounce */
        var boxEls = $('.el-bounce, .pxl-image-effect1');
        $.each(boxEls, function(boxIndex, boxEl) {
            loopToggleClass(boxEl, 'bounce-active');
        });

        /* Custom Effects */
        $('a, button, input, h1, h2, h3, h4, h5, h6, .btn, .pxl-swiper-arrow, #woocommerce-product-search-field-0, .nice-select, .woocommerce .product .woocommerce-product-gallery .flex-control-nav img, .woo-variation-swatches .variable-items-wrapper .variable-item, input.input-text, .pxl-transtion').each(function () {
            $(this).hover(function () {
                $(this).addClass('pxl-custom-transition');
            });
            var isSwitchCheck = $('body .pxl-switch-button');
            if (isSwitchCheck.length) {
                const toggleButton = document.querySelector('.pxl-check-status');
                toggleButton.addEventListener("change", () => {
                    $(this).removeClass('pxl-custom-transition');
                });
            }
        });

        $('.pxl-parent-transition').each(function () {
            $(this).hover(function () {
                $(this).find('.pxl-transtion').addClass('pxl-custom-transition');
            });
            var isSwitchCheck = $('body .pxl-switch-button');
            if (isSwitchCheck.length) {
                const toggleButton = document.querySelector('.pxl-check-status');
                toggleButton.addEventListener("change", () => {
                    $(this).find('.pxl-transtion').removeClass('pxl-custom-transition');
                });
            }
        });

        setTimeout(() => {
            var wobbleElements = document.querySelectorAll('.pxl-wobble');

            wobbleElements.forEach(function(el){

                el.addEventListener('mouseover', function(){

                    if(!el.classList.contains('animating') && !el.classList.contains('mouseover')){

                        el.classList.add('animating','mouseover');

                        var letters = el.innerText.split('');

                        setTimeout(function(){ el.classList.remove('animating'); }, (letters.length + 1) * 50);

                        var animationName = el.dataset.animation;
                        if(!animationName){ animationName = "pxl-jump"; }

                        el.innerText = '';

                        letters.forEach(function(letter){
                            if(letter == " "){
                                letter = "&nbsp;";
                            }
                            el.innerHTML += '<span class="letter">'+letter+'</span>';
                        });

                        var letterElements = el.querySelectorAll('.letter');
                        letterElements.forEach(function(letter, i){
                            setTimeout(function(){
                                letter.classList.add(animationName);
                            }, 50 * i);
                        });

                    }

                });

                el.addEventListener('mouseout', function(){
                    el.classList.remove('mouseover');
                });
            });
        }, 100);

        $(".pxl-particle-background").each(function() {
            var randomId = "id-" + Math.random().toString(16).slice(2);
            $(this).append('<div id="' + randomId + '" class="pxl-particles-bg"></div>');
        });
        $(".pxl-particles-bg").each(function() {
            particlesJS($(this).attr('id'), {
                "particles": {
                    "number": {
                        "value": 100,
                        "density": {
                            "enable": true,
                            "value_area":1000
                        }
                    },
                    "color": {
                        "value": ["#aa73ff", "#f8c210", "#83d238", "#33b1f8"]
                    },

                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#fff"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 0.6,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 2,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 120,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "grab"
                        },
                        "onclick": {
                            "enable": false
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 140,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            });
        });

        /* Carousel Mousewheel */
        var scrollContainer = document.querySelectorAll('.pxl-carousel-mousewheel .pxl-swiper-container');
        scrollContainer.forEach(function(ec){
            ec.addEventListener("wheel", (evt) => {
                evt.preventDefault();
                ec.scrollLeft += evt.deltaY;
                ec.animate({scrollLeft: "+=100"}, 800);
            });
        });

        $('.pxl-carousel-mousewheel, .pxl-mouse-wheel').on('DOMMouseScroll mousewheel', function(ev) {
            var $this = $(this),
            scrollTop = this.scrollTop,
            scrollHeight = this.scrollHeight,
            height = $this.height(),
            delta = (ev.type == 'DOMMouseScroll' ?
                ev.originalEvent.detail * -40 :
                ev.originalEvent.wheelDelta),
            up = delta > 0;

            var prevent = function() {
                ev.stopPropagation();
                ev.preventDefault();
                ev.returnValue = false;
                return false;
            }

            if (!up && -delta > scrollHeight - height - scrollTop) {
                $this.scrollTop(scrollHeight);
                return prevent();
            } else if (up && delta > scrollTop) {
                $this.scrollTop(0);
                return prevent();
            }
        });

        /* Detect Mobile Device */
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $('.pxl-cursor').css({
                "opacity": "0",
            });
        }

    });

        /* =================
         Column Offset
         =================== */
function builderrin_col_offset() {
    var w_vc_row_lg = ($('#pxl-main').width() - 1170) / 2;
    if (pxl_window_width > 1200) {
        $('body:not(.rtl) .col-offset-left.elementor-column > .elementor-widget-wrap').css('padding-left', w_vc_row_lg + 'px');
        $('body:not(.rtl) .col-offset-right.elementor-column > .elementor-widget-wrap').css('padding-right', w_vc_row_lg + 'px');

        $('.rtl .col-offset-left.elementor-column > .elementor-widget-wrap').css('padding-right', w_vc_row_lg + 'px');
        $('.rtl .col-offset-right.elementor-column > .elementor-widget-wrap').css('padding-left', w_vc_row_lg + 'px');
    }
}

function builderrin_panel_anchor_toggle(){
    'use strict';
    $(document).on('click','.pxl-anchor.side-panel',function(e){
        e.preventDefault();
        e.stopPropagation();
        var target = $(this).attr('data-target');
        $(this).toggleClass('cliked');
        $(target).toggleClass('open');
        $('body').toggleClass('side-panel-open');
        $('.pxl-overlay-drop').toggleClass('panel-open');
        setTimeout(function(){
            $(document).find('.pxl-search-form input[name="s"]').focus();
            $(document).find('.search-form input[name="s"]').focus();
        },1000);

    });

        //* Menu Dropdown
    $('.pxl-menu-primary li').each(function () {
        var $submenu = $(this).find('> ul.sub-menu');
        if ($submenu.length == 1) {
            $(this).hover(function () {
                if ($submenu.offset().left + $submenu.width() > $(window).width()) {
                    $submenu.addClass('back');
                } else if ($submenu.offset().left < 0) {
                    $submenu.addClass('back');
                }
            }, function () {
                $submenu.removeClass('back');
            });
        }
    });
}

function builderrin_document_click(){
    $(document).on('click',function (e) {
        var target = $(e.target);
        var check = '.btn-nav-mobile';

        if (!(target.is(check)) && target.closest('.pxl-hidden-template').length <= 0 && $('body').hasClass('side-panel-open')) {
            $('.btn-nav-mobile').removeClass('cliked');
            $('.pxl-hidden-template').removeClass('open');
            $('body').removeClass('side-panel-open');
            $('.pxl-overlay-drop').removeClass('panel-open');
        }
    });
    $(document).on('click','.pxl-close',function(e){
        e.preventDefault();
        e.stopPropagation();
        $(this).closest('.pxl-hidden-template').toggleClass('open');
        $('.btn-nav-mobile').removeClass('cliked');
        $('body').toggleClass('side-panel-open');
    });
    $(document).on('click','.pxl-close-drop',function(e){
        e.preventDefault();
        e.stopPropagation();
        $('.pxl-overlay-drop').toggleClass('panel-open');
    });
}

    /* Get Mouse Move Direction */
function getDirection(ev, obj) {
    var w = $(obj).width(),
    h = $(obj).height(),
    x = (ev.pageX - $(obj).offset().left - (w / 2)) * (w > h ? (h / w) : 1),
    y = (ev.pageY - $(obj).offset().top - (h / 2)) * (h > w ? (w / h) : 1),
    d = Math.round( Math.atan2(y, x) / 1.57079633 + 5 ) % 4;
    return d;
}
function addClass( ev, obj, state ) {
    var direction = getDirection( ev, obj ),
    class_suffix = null;
    $(obj).removeAttr('class');
    switch ( direction ) {
    case 0 : class_suffix = '-top';    break;
    case 1 : class_suffix = '-right';  break;
    case 2 : class_suffix = '-bottom'; break;
    case 3 : class_suffix = '-left';   break;
    }
    $(obj).addClass( state + class_suffix );
}
$.fn.ctDeriction = function () {
    this.each(function () {
        $(this).on('mouseenter',function(ev){
            addClass( ev, this, 'in' );
        });
        $(this).on('mouseleave',function(ev){
            addClass( ev, this, 'out' );
        });
    });
}
$('.pxl-grid-direction .item-direction').ctDeriction();

    /* Header Sticky */
function builderrin_header_sticky() {
    if($('#pxl-header-elementor').hasClass('is-sticky')) {
        if (pxl_scroll_top > 100) {
            $('.pxl-header-elementor-sticky.pxl-sticky-stb').addClass('pxl-header-fixed');
        } else {
            $('.pxl-header-elementor-sticky.pxl-sticky-stb').removeClass('pxl-header-fixed');
        }

        if (pxl_scroll_status == 'up' && pxl_scroll_top > 100) {
            $('.pxl-header-elementor-sticky.pxl-sticky-stt').addClass('pxl-header-fixed');
        } else {
            $('.pxl-header-elementor-sticky.pxl-sticky-stt').removeClass('pxl-header-fixed');
        }
    }

    $('.pxl-header-elementor-sticky').parents('body').addClass('pxl-header-sticky');
}

    /* Scroll To Top */
function builderrin_scroll_to_top() {
    if (pxl_scroll_top < pxl_window_height) {
        $('.pxl-scroll-top').addClass('pxl-off').removeClass('pxl-on');
    }
    if (pxl_scroll_top > pxl_window_height) {
        $('.pxl-scroll-top').addClass('pxl-on').removeClass('pxl-off');
    }
}

    /* Footer Fixed */
function builderrin_footer_fixed() {
    setTimeout(function(){
        var h_footer = $('.pxl-footer-fixed #pxl-footer-elementor').outerHeight() - 1;
        $('.pxl-footer-fixed #pxl-main').css('margin-bottom', h_footer + 'px');
    }, 600);
}

    /* ====================
     WooComerce Quantity
     ====================== */
function builderrin_quantity_icon() {
    $('#pxl-main .quantity').append('<span class="quantity-icon"><i class="quantity-down">-</i><i class="quantity-up">+</i></span>');
    $('.quantity-up').on('click', function () {
        $(this).parents('.quantity').find('input[type="number"]').get(0).stepUp();
        $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
    });
    $('.quantity-down').on('click', function () {
        $(this).parents('.quantity').find('input[type="number"]').get(0).stepDown();
        $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
    });
    $('.woocommerce-cart-form .actions .button').removeAttr('disabled');

    $('.quantity-icon i').each(function () {
        $(this).hover(function () {
            $(this).addClass('pxl-custom-transition');
        });
        $(this).mouseleave(function() {
            setTimeout(() => {
                $(this).removeClass('pxl-custom-transition');
            }, 300);
        });
    });
}

function builderrin_product_single_variations_att(){
    $(document).on('mousedown', '.pro-variation-select', function (e) {
        e.preventDefault();
        var $this_var = $(this).closest('.variations'),
        this_closest = $(this).closest('.pxl-variation-att-terms'),
        target_hidden = $this_var.find('#'+this_closest.attr('data-id'));
        var $this = $(this);
        if (!$this.hasClass('custom-vari-enabled'))
            return;
        var target = $this.attr('data-value');
        if (!target)
            return;
        target_hidden.val(target).change();
        this_closest.find('li.pxl-vari-item').removeClass('active');
        $this.parent('li').addClass('active');
    });
}

    /* Custom Tab Carousel */
function tabCarousel() {
    setTimeout(() => {
        $('.pxl-tab-carousel .pxl-item--content:not(:first-child)').css({
            "display": "none",
        });
    }, 1000);
}

function blog_list_scroll() {
    $(".blog-list-scroll").each(function(){
        var get_height = $(this).find(".pxl-grid-item").height();
        var list_height = (get_height * 2) + 40;
        $(this).find(".pxl-blog-inner").css('max-height', list_height);

        $(".blog-list-scroll .pxl-blog-inner").overlayScrollbars({
            className: "os-theme-thick-dark",
            overflowBehavior : {
                x : "hidden",
                y : "scroll"
            },
        });

        $(this).find(".pxl-blog-inner").hover(function () {
            $(this).find(".os-scrollbar-handle").addClass('pxl-scrollbar-transition');
        });
        $(this).find(".pxl-blog-inner").mouseleave(function() {
            setTimeout(() => {
                $(this).find(".os-scrollbar-handle").removeClass('pxl-scrollbar-transition');
            }, 300);
        });
    });
}

function grid_filter_scroll() {
    if ($("div").hasClass('pxl-filter-drag')) {
        $(".pxl-filter-drag").each(function(){
            var list_height = $(this).height() - 2;
            $(this).parents().find(".filter-line").css('top', list_height);
        });

            //Mouse Scroll
        $('.pxl-filter-drag').bind('DOMMouseScroll', function(e){
            if(e.originalEvent.detail > 0) {
                $('.pxl-filter-drag').animate({
                    scrollLeft: "+=50px"
                }, 10);
            }else {
                $('.pxl-filter-drag').animate({
                    scrollLeft: "-=50px"
                }, 10);
            }
            return false;
        });
        $('.pxl-filter-drag').bind('mousewheel', function(e) {
            if(e.originalEvent.wheelDelta < 0) {
                $('.pxl-filter-drag').animate({
                    scrollLeft: "+=50px"
                }, 10);
            }else {
                $('.pxl-filter-drag').animate({
                    scrollLeft: "-=50px"
                }, 10);
            }
            return false;
        });

            //Mouse Drag
        const slider = document.querySelector('.pxl-filter-drag');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('active');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mousemove', (e) => {
            if(!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 3;
            slider.scrollLeft = scrollLeft - walk;
        });
    }
}

    /* Smooth Scroll */
function builderrin_smooth_scroll() {
    if($('body').hasClass('pxl-smooth-scroll')){
        !function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):(t||self).Lenis=e()}(this,function(){function t(t,e){for(var i=0;i<e.length;i++){var o=e[i];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}function e(e,i,o){return i&&t(e.prototype,i),o&&t(e,o),Object.defineProperty(e,"prototype",{writable:!1}),e}function i(){return i=Object.assign?Object.assign.bind():function(t){for(var e=1;e<arguments.length;e++){var i=arguments[e];for(var o in i)Object.prototype.hasOwnProperty.call(i,o)&&(t[o]=i[o])}return t},i.apply(this,arguments)}function o(t,e){return o=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(t,e){return t.__proto__=e,t},o(t,e)}function n(){}n.prototype={on:function(t,e,i){var o=this.e||(this.e={});return(o[t]||(o[t]=[])).push({fn:e,ctx:i}),this},once:function(t,e,i){var o=this;function n(){o.off(t,n),e.apply(i,arguments)}return n._=e,this.on(t,n,i)},emit:function(t){for(var e=[].slice.call(arguments,1),i=((this.e||(this.e={}))[t]||[]).slice(),o=0,n=i.length;o<n;o++)i[o].fn.apply(i[o].ctx,e);return this},off:function(t,e){var i=this.e||(this.e={}),o=i[t],n=[];if(o&&e)for(var r=0,s=o.length;r<s;r++)o[r].fn!==e&&o[r].fn._!==e&&n.push(o[r]);return n.length?i[t]=n:delete i[t],this}};var r=n;n.TinyEmitter=r,"undefined"!=typeof globalThis?globalThis:"undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self&&self;var s=function(t){var e={exports:{}};return function(t,e){t.exports=function(){var t=0;function e(e){return"__private_"+t+++"_"+e}function i(t,e){if(!Object.prototype.hasOwnProperty.call(t,e))throw new TypeError("attempted to use private field on non-instance");return t}function o(){}o.prototype={on:function(t,e,i){var o=this.e||(this.e={});return(o[t]||(o[t]=[])).push({fn:e,ctx:i}),this},once:function(t,e,i){var o=this;function n(){o.off(t,n),e.apply(i,arguments)}return n._=e,this.on(t,n,i)},emit:function(t){for(var e=[].slice.call(arguments,1),i=((this.e||(this.e={}))[t]||[]).slice(),o=0,n=i.length;o<n;o++)i[o].fn.apply(i[o].ctx,e);return this},off:function(t,e){var i=this.e||(this.e={}),o=i[t],n=[];if(o&&e)for(var r=0,s=o.length;r<s;r++)o[r].fn!==e&&o[r].fn._!==e&&n.push(o[r]);return n.length?i[t]=n:delete i[t],this}};var n=o;n.TinyEmitter=o;var r,s="virtualscroll",l=e("options"),h=e("el"),a=e("emitter"),c=e("event"),u=e("touchStart"),d=e("bodyTouchAction");return function(){function t(t){var e=this;Object.defineProperty(this,l,{writable:!0,value:void 0}),Object.defineProperty(this,h,{writable:!0,value:void 0}),Object.defineProperty(this,a,{writable:!0,value:void 0}),Object.defineProperty(this,c,{writable:!0,value:void 0}),Object.defineProperty(this,u,{writable:!0,value:void 0}),Object.defineProperty(this,d,{writable:!0,value:void 0}),this._onWheel=function(t){var o=i(e,l)[l],n=i(e,c)[c];n.deltaX=t.wheelDeltaX||-1*t.deltaX,n.deltaY=t.wheelDeltaY||-1*t.deltaY,r.isFirefox&&1===t.deltaMode&&(n.deltaX*=o.firefoxMultiplier,n.deltaY*=o.firefoxMultiplier),n.deltaX*=o.mouseMultiplier,n.deltaY*=o.mouseMultiplier,e._notify(t)},this._onMouseWheel=function(t){var o=i(e,c)[c];o.deltaX=t.wheelDeltaX?t.wheelDeltaX:0,o.deltaY=t.wheelDeltaY?t.wheelDeltaY:t.wheelDelta,e._notify(t)},this._onTouchStart=function(t){var o=t.targetTouches?t.targetTouches[0]:t;i(e,u)[u].x=o.pageX,i(e,u)[u].y=o.pageY},this._onTouchMove=function(t){var o=i(e,l)[l];o.preventTouch&&!t.target.classList.contains(o.unpreventTouchClass)&&t.preventDefault();var n=i(e,c)[c],r=t.targetTouches?t.targetTouches[0]:t;n.deltaX=(r.pageX-i(e,u)[u].x)*o.touchMultiplier,n.deltaY=(r.pageY-i(e,u)[u].y)*o.touchMultiplier,i(e,u)[u].x=r.pageX,i(e,u)[u].y=r.pageY,e._notify(t)},this._onKeyDown=function(t){var o=i(e,c)[c];o.deltaX=o.deltaY=0;var n=window.innerHeight-40;switch(t.keyCode){case 37:case 38:o.deltaY=i(e,l)[l].keyStep;break;case 39:case 40:o.deltaY=-i(e,l)[l].keyStep;break;case 32:o.deltaY=n*(t.shiftKey?1:-1);break;default:return}e._notify(t)},i(this,h)[h]=window,t&&t.el&&(i(this,h)[h]=t.el,delete t.el),r||(r={hasWheelEvent:"onwheel"in document,hasMouseWheelEvent:"onmousewheel"in document,hasTouch:"ontouchstart"in document,hasTouchWin:navigator.msMaxTouchPoints&&navigator.msMaxTouchPoints>1,hasPointer:!!window.navigator.msPointerEnabled,hasKeyDown:"onkeydown"in document,isFirefox:navigator.userAgent.indexOf("Firefox")>-1}),i(this,l)[l]=Object.assign({mouseMultiplier:1,touchMultiplier:2,firefoxMultiplier:15,keyStep:120,preventTouch:!1,unpreventTouchClass:"vs-touchmove-allowed",useKeyboard:!0,useTouch:!0},t),i(this,a)[a]=new n,i(this,c)[c]={y:0,x:0,deltaX:0,deltaY:0},i(this,u)[u]={x:null,y:null},i(this,d)[d]=null,void 0!==i(this,l)[l].passive&&(this.listenerOptions={passive:i(this,l)[l].passive})}var e=t.prototype;return e._notify=function(t){var e=i(this,c)[c];e.x+=e.deltaX,e.y+=e.deltaY,i(this,a)[a].emit(s,{x:e.x,y:e.y,deltaX:e.deltaX,deltaY:e.deltaY,originalEvent:t})},e._bind=function(){r.hasWheelEvent&&i(this,h)[h].addEventListener("wheel",this._onWheel,this.listenerOptions),r.hasMouseWheelEvent&&i(this,h)[h].addEventListener("mousewheel",this._onMouseWheel,this.listenerOptions),r.hasTouch&&i(this,l)[l].useTouch&&(i(this,h)[h].addEventListener("touchstart",this._onTouchStart,this.listenerOptions),i(this,h)[h].addEventListener("touchmove",this._onTouchMove,this.listenerOptions)),r.hasPointer&&r.hasTouchWin&&(i(this,d)[d]=document.body.style.msTouchAction,document.body.style.msTouchAction="none",i(this,h)[h].addEventListener("MSPointerDown",this._onTouchStart,!0),i(this,h)[h].addEventListener("MSPointerMove",this._onTouchMove,!0)),r.hasKeyDown&&i(this,l)[l].useKeyboard&&document.addEventListener("keydown",this._onKeyDown)},e._unbind=function(){r.hasWheelEvent&&i(this,h)[h].removeEventListener("wheel",this._onWheel),r.hasMouseWheelEvent&&i(this,h)[h].removeEventListener("mousewheel",this._onMouseWheel),r.hasTouch&&(i(this,h)[h].removeEventListener("touchstart",this._onTouchStart),i(this,h)[h].removeEventListener("touchmove",this._onTouchMove)),r.hasPointer&&r.hasTouchWin&&(document.body.style.msTouchAction=i(this,d)[d],i(this,h)[h].removeEventListener("MSPointerDown",this._onTouchStart,!0),i(this,h)[h].removeEventListener("MSPointerMove",this._onTouchMove,!0)),r.hasKeyDown&&i(this,l)[l].useKeyboard&&document.removeEventListener("keydown",this._onKeyDown)},e.on=function(t,e){i(this,a)[a].on(s,t,e);var o=i(this,a)[a].e;o&&o[s]&&1===o[s].length&&this._bind()},e.off=function(t,e){i(this,a)[a].off(s,t,e);var o=i(this,a)[a].e;(!o[s]||o[s].length<=0)&&this._unbind()},e.destroy=function(){i(this,a)[a].off(),this._unbind()},t}()}()}(e),e.exports}();function l(t,e){var i=t%e;return(e>0&&i<0||e<0&&i>0)&&(i+=e),i}var h=["duration","easing"],a=/*#__PURE__*/function(){function t(){}var o=t.prototype;return o.to=function(t,e){var o=this,n=void 0===e?{}:e,r=n.duration,s=void 0===r?1:r,l=n.easing,a=void 0===l?function(t){return t}:l,c=function(t,e){if(null==t)return{};var i,o,n={},r=Object.keys(t);for(o=0;o<r.length;o++)e.indexOf(i=r[o])>=0||(n[i]=t[i]);return n}(n,h);this.target=t,this.fromKeys=i({},c),this.toKeys=i({},c),this.keys=Object.keys(i({},c)),this.keys.forEach(function(e){o.fromKeys[e]=t[e]}),this.duration=s,this.easing=a,this.currentTime=0,this.isRunning=!0},o.stop=function(){this.isRunning=!1},o.raf=function(t){var e=this;if(this.isRunning){this.currentTime=Math.min(this.currentTime+t,this.duration);var i=this.progress>=1?1:this.easing(this.progress);this.keys.forEach(function(t){var o=e.fromKeys[t];e.target[t]=o+(e.toKeys[t]-o)*i}),1===i&&this.stop()}},e(t,[{key:"progress",get:function(){return this.currentTime/this.duration}}]),t}();/*#__PURE__*/
        return function(t){var i,n;function r(e){var i,o,n,r,l=void 0===e?{}:e,h=l.duration,c=void 0===h?1.2:h,u=l.easing,d=void 0===u?function(t){return Math.min(1,1.001-Math.pow(2,-10*t))}:u,p=l.smooth,f=void 0===p||p,v=l.mouseMultiplier,w=void 0===v?1:v,y=l.smoothTouch,m=void 0!==y&&y,g=l.touchMultiplier,b=void 0===g?2:g,T=l.direction,M=void 0===T?"vertical":T,S=l.gestureDirection,_=void 0===S?"vertical":S,O=l.infinite,E=void 0!==O&&O,W=l.wrapper,x=void 0===W?window:W,D=l.content,N=void 0===D?document.body:D;(r=t.call(this)||this).onWindowResize=function(){r.wrapperWidth=window.innerWidth,r.wrapperHeight=window.innerHeight},r.onWrapperResize=function(t){var e=t[0];if(e){var i=e.contentRect;r.wrapperWidth=i.width,r.wrapperHeight=i.height}},r.onContentResize=function(t){var e=t[0];if(e){var i=e.contentRect;r.contentWidth=i.width,r.contentHeight=i.height}},r.onVirtualScroll=function(t){var e=t.deltaY,i=t.deltaX,o=t.originalEvent;if(!("vertical"===r.gestureDirection&&0===e||"horizontal"===r.gestureDirection&&0===i)){var n=!!o.composedPath().find(function(t){return t.hasAttribute&&t.hasAttribute("data-lenis-prevent")});o.ctrlKey||n||(r.smooth=o.changedTouches?r.smoothTouch:r.options.smooth,r.stopped?o.preventDefault():r.smooth&&4!==o.buttons&&(r.smooth&&o.preventDefault(),r.targetScroll-="both"===r.gestureDirection?i+e:"horizontal"===r.gestureDirection?i:e,r.scrollTo(r.targetScroll)))}},r.onScroll=function(t){r.isScrolling&&r.smooth||(r.targetScroll=r.scroll=r.lastScroll=r.wrapperNode[r.scrollProperty],r.notify())},window.lenisVersion="0.2.28",r.options={duration:c,easing:d,smooth:f,mouseMultiplier:w,smoothTouch:m,touchMultiplier:b,direction:M,gestureDirection:_,infinite:E,wrapper:x,content:N},r.duration=c,r.easing=d,r.smooth=f,r.mouseMultiplier=w,r.smoothTouch=m,r.touchMultiplier=b,r.direction=M,r.gestureDirection=_,r.infinite=E,r.wrapperNode=x,r.contentNode=N,r.wrapperNode.addEventListener("scroll",r.onScroll),r.wrapperNode===window?(r.wrapperNode.addEventListener("resize",r.onWindowResize),r.onWindowResize()):(r.wrapperHeight=r.wrapperNode.offsetHeight,r.wrapperWidth=r.wrapperNode.offsetWidth,r.wrapperObserver=new ResizeObserver(r.onWrapperResize),r.wrapperObserver.observe(r.wrapperNode)),r.contentHeight=r.contentNode.offsetHeight,r.contentWidth=r.contentNode.offsetWidth,r.contentObserver=new ResizeObserver(r.onContentResize),r.contentObserver.observe(r.contentNode),r.targetScroll=r.scroll=r.lastScroll=r.wrapperNode[r.scrollProperty],r.animate=new a;var P=(null==(i=navigator)||null==(o=i.userAgentData)?void 0:o.platform)||(null==(n=navigator)?void 0:n.platform)||"unknown";return r.virtualScroll=new s({el:r.wrapperNode,firefoxMultiplier:50,mouseMultiplier:r.mouseMultiplier*(P.includes("Win")||P.includes("Linux")?.84:.4),touchMultiplier:r.touchMultiplier,passive:!1,useKeyboard:!1,useTouch:!0}),r.virtualScroll.on(r.onVirtualScroll),r}n=t,(i=r).prototype=Object.create(n.prototype),i.prototype.constructor=i,o(i,n);var h=r.prototype;return h.start=function(){var t=this.wrapperNode;this.wrapperNode===window&&(t=document.documentElement),t.classList.remove("lenis-stopped"),this.stopped=!1},h.stop=function(){var t=this.wrapperNode;this.wrapperNode===window&&(t=document.documentElement),t.classList.add("lenis-stopped"),this.stopped=!0,this.animate.stop()},h.destroy=function(){var t;this.wrapperNode===window&&this.wrapperNode.removeEventListener("resize",this.onWindowResize),this.wrapperNode.removeEventListener("scroll",this.onScroll),this.virtualScroll.destroy(),null==(t=this.wrapperObserver)||t.disconnect(),this.contentObserver.disconnect()},h.raf=function(t){var e=t-(this.now||0);this.now=t,!this.stopped&&this.smooth&&(this.lastScroll=this.scroll,this.animate.raf(.001*e),this.scroll===this.targetScroll&&(this.lastScroll=this.scroll),this.isScrolling&&(this.setScroll(this.scroll),this.notify()),this.isScrolling=this.scroll!==this.targetScroll)},h.setScroll=function(t){var e=this.infinite?l(t,this.limit):t;"horizontal"===this.direction?this.wrapperNode.scrollTo(e,0):this.wrapperNode.scrollTo(0,e)},h.notify=function(){var t=this.infinite?l(this.scroll,this.limit):this.scroll;this.emit("scroll",{scroll:t,limit:this.limit,velocity:this.velocity,direction:0===this.velocity?0:this.velocity>0?1:-1,progress:t/this.limit})},h.scrollTo=function(t,e){var i=void 0===e?{}:e,o=i.offset,n=void 0===o?0:o,r=i.immediate,s=void 0!==r&&r,l=i.duration,h=void 0===l?this.duration:l,a=i.easing,c=void 0===a?this.easing:a;if(null!=t&&!this.stopped){var u;if("number"==typeof t)u=t;else if("top"===t||"#top"===t)u=0;else if("bottom"===t)u=this.limit;else{var d;if("string"==typeof t)d=document.querySelector(t);else{if(null==t||!t.nodeType)return;d=t}if(!d)return;var p=0;if(this.wrapperNode!==window){var f=this.wrapperNode.getBoundingClientRect();p="horizontal"===this.direction?f.left:f.top}var v=d.getBoundingClientRect();u=("horizontal"===this.direction?v.left:v.top)+this.scroll-p}u+=n,this.targetScroll=this.infinite?u:Math.max(0,Math.min(u,this.limit)),!this.smooth||s?(this.animate.stop(),this.scroll=this.lastScroll=this.targetScroll,this.setScroll(this.targetScroll)):this.animate.to(this,{duration:h,easing:c,scroll:this.targetScroll})}},e(r,[{key:"scrollProperty",get:function(){return this.wrapperNode===window?"horizontal"===this.direction?"scrollX":"scrollY":"horizontal"===this.direction?"scrollLeft":"scrollTop"}},{key:"limit",get:function(){return"horizontal"===this.direction?this.contentWidth-this.wrapperWidth:this.contentHeight-this.wrapperHeight}},{key:"velocity",get:function(){return this.scroll-this.lastScroll}}]),r}(r)});

const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    direction: 'vertical',
    gestureDirection: 'vertical',
    smooth: true,
    mouseMultiplier: 1,
    smoothTouch: false,
    touchMultiplier: 2,
    infinite: false,
})
function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
}
requestAnimationFrame(raf)
}
}

    /* Back To Top With Progress Indicator */
function builderrin_backtotop_indicator() {
    var $isHome = $('body .pxl-scroll-top');
    if ($isHome.length) {
        var progressPath = document.querySelector('.pxl-progress-circle path');
        var pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
        progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
        var updateProgress = function () {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = pathLength - (scroll * pathLength / height);
            progressPath.style.strokeDashoffset = progress;
        }
        updateProgress();
        $(window).scroll(updateProgress);
    }
}

    /* Custom Switch Light/Dark Mode */
function builderrin_lightdark_switch() {
    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "light") {
        document.body.classList.remove("dark-mode");
    }
    if (getMode && getMode === "dark") {
        document.body.classList.add("dark-mode");
    }
    var isSwitchCheck = $('body .pxl-switch-button');
    if (isSwitchCheck.length) {
        const toggleButton = document.querySelector('.pxl-check-status');
        toggleButton.addEventListener("change", () => {
            document.body.classList.toggle("dark-mode");
            if (!document.body.classList.contains("dark-mode")) {
                return localStorage.setItem("mode", "light");
            }
            localStorage.setItem("mode", "dark");
        });
    }
    if (document.body.classList.contains("dark-mode")) {
        $('.pxl-check-status').prop("checked", true );
    }
}

    /* Custom Loader */
function builderrin_loader() {
    if ($(".pxl-loader").hasClass('style-1')) {
        $(".pxl-loader").addClass('hide');
    }
    if ($(".pxl-loader").hasClass('style-rotate')) {
        setTimeout(() => {
            const FlowerLoader = (() => {
                const LEAF_SVG = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 23.7 51.8" style="enable-background:new 0 0 23.7 51.8;" xml:space="preserve"><path d="M11.8,0c0,0-26.6,24.1,0,51.8C38.5,24.1,11.8,0,11.8,0z"/></svg>'

                const Selector = {
                    CENTER: '.flower__center',
                    LEAF: '.flower__leaf',
                    LEAF_INNER: '.flower__leaf-inner',
                    LEAVES: '.flower__leaves'
                }

                const ClassName = {
                    CENTER: 'flower__center',
                    LEAF: 'flower__leaf'
                }

                class FlowerLoader {
                    constructor(element) {
                        this._element = element
                        this._flowerLeaves = element.querySelector(Selector.LEAVES)
                        this._numberOfLeaves = 7
                        this._rotation = 360 / this._numberOfLeaves
                        this._path = [
                            { x: 15, y: 0},
                            {x: 16, y: -1},
                            {x: 17, y: 0},
                            {x: 16, y: 1},
                            {x: 15, y: 0}
                            ]
                        this._location = {x: this._path[0].x, y: this._path[0].y}
                        this._tn1 = TweenMax.to(this._location, this._numberOfLeaves, {
                            bezier: {
                                curviness: 1.5,
                                values: this._path
                            },
                            ease: Linear.easeNone
                        });

                        this._initialize()
                    }

                    _initialize() {
                        this._addLeaves()
                    }

                    _addLeaves() {
                        for (let i = 0; i < this._numberOfLeaves; i++) {
                            const leafElement = document.createElement('div')
                            leafElement.className = ClassName.LEAF
                            leafElement.innerHTML = `<div class="flower__leaf-inner">${LEAF_SVG}</div>`
                            this._tn1.time(i);

                            TweenMax.set(leafElement, {
                                x: this._location.x - 11,
                                y: this._location.y - 37,
                                rotation: ((this._rotation * i ) - 90),
                            })

                            this._flowerLeaves.appendChild(leafElement)
                        }

                        this._animate()
                    }

                    _animate() {
                        const leaves = this._flowerLeaves.querySelectorAll(Selector.LEAF_INNER)
                        const center = this._element.querySelector(Selector.CENTER)

                        const timeline = new TimelineMax({
                            onComplete: () => {
                                timeline.restart(true)
                            }
                        })

                        timeline
                        .add(
                            TweenMax.fromTo(center, 1, {
                                scale: 0
                            }, {
                                scale: 1,
                                ease: Elastic.easeOut.config(1.1, .75)
                            }), 0
                            )
                        .add(
                            TweenMax.staggerTo(leaves, 1, {
                                scale: 1,
                                ease: Elastic.easeOut.config(1.1, .75)
                            }, .2), 0.3
                            )
                        .add(
                            TweenMax.to(leaves, 0.3, {
                                scale: 1.25,
                                ease: Elastic.easeOut.config(1.5, 1)
                            })
                            )
                        .add(
                            TweenMax.to(this._element.querySelector(Selector.LEAVES), 1, {
                                duration: 1.5,
                                rotation: 360,
                                ease: Expo.easeInOut
                            }), 1.7
                            )
                        .add(
                            TweenMax.to(leaves, 0.5, {
                                scale: 0,
                                ease: Elastic.easeInOut.config(1.1, 0.75)
                            })
                            )
                        .add(
                            TweenMax.to(center, 0.5, {
                                scale: 0,
                                ease: Elastic.easeInOut.config(1.1, 0.75)
                            }), '-=0.37'
                            )
                    }
                }
                return new FlowerLoader(document.body.querySelector('.flower'))
            })()
        }, 400);
}
}

function builderrin_svg_length() {
    var getSvgLength = document.querySelectorAll('.pxl-draw-svg svg path');
    getSvgLength.forEach(function(el) {
        var pathLength = el.getTotalLength();
        el.setAttribute('stroke-dasharray', pathLength);
        return pathLength;
    });

    $('.pxl-draw-svg svg:nth-child(2) path').each(function () {
        var stroke = $(this).attr('stroke-dasharray');
        $(this).css({
            "stroke-dasharray": stroke,
            "stroke-dashoffset": stroke,
        });
    });
}

function builderrin_hide_border_top() {
    if($('section').hasClass('pxl-hide-border-top')) {
        if(pxl_window_width < 992 && $('section').hasClass('pxl-hide-border-top')) {
            $('#pxl-header-mobile').addClass('pxl-header-no-border');
        } else {
            $('#pxl-header-mobile').removeClass('pxl-header-no-border');
        }
    }
}

$( document ).ajaxComplete(function() {
   builderrin_quantity_icon();
});
})(jQuery);
