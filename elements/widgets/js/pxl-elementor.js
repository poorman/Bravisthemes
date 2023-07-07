( function( $ ) {
    //animation
    function builderrin_animation_handler($scope){   
        elementorFrontend.waypoint($scope.find('.pxl-animate'), function () {
            var $animate_el = $(this),
            data = $animate_el.data('settings');  
            if(typeof data != 'undefined' && typeof data['animation'] != 'undefined'){
                setTimeout(function () {
                    $animate_el.removeClass('pxl-invisible').addClass('animated ' + data['animation']);
                }, data['animation_delay']);
            }else{
                setTimeout(function () {
                    $animate_el.removeClass('pxl-invisible').addClass('animated fadeInUp');
                }, 300);
            }
        });

        
        elementorFrontend.waypoint($scope.find('.pxl-border-animated'), function () {
            $(this).addClass('pxl-animated');
        });

        elementorFrontend.waypoint($scope.find('.elementor-widget-divider'), function () {
            $(this).addClass('pxl-animated');
        });

        elementorFrontend.waypoint($scope.find('.pxl-divider.animated'), function () {
            $(this).addClass('pxl-animated');
        }); 

        elementorFrontend.waypoint($scope.find('.pxl-bd-anm'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-hd-bd-left'), function () {  
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-hd-bd-right'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-section-line-item'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.move-from-left'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.move-from-right'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.skew-in'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-wg-move-from-left>.elementor-widget-container'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-wg-move-from-right>.elementor-widget-container'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.layout-portfolio-list-1 .grid-item .item-title'), function () {
            $(this).addClass('pxl-animated');
        });
        $(document).ajaxComplete(function(event, xhr, settings){  
            "use strict";
            elementorFrontend.waypoint($scope.find('.pxl-bd-anm'), function () {
                $(this).addClass('pxl-animated');
            });
            elementorFrontend.waypoint($scope.find('.layout-portfolio-list-1 .grid-item .item-title'), function () {
                $(this).addClass('pxl-animated');
            });
        }); 
    }

    function builderrin_gsap_scroll_trigger($scope){ 
        gsap.registerPlugin(ScrollTrigger);
        const images = gsap.utils.toArray('img');  
        const showDemo = () => {
            document.body.style.overflow = 'auto';
            gsap.utils.toArray($scope.find('.pxl-horizontal-scroll .scroll-trigger')).forEach((section, index) => {
                const w = section;
                var x = w.scrollWidth * -1;
                var xEnd = 0;
                if($(section).closest('.pxl-horizontal-scroll').hasClass('revesal')){   
                    x = '100%';
                    xEnd = (w.scrollWidth - section.offsetWidth) * -1;
                } 
                gsap.fromTo(w, { x }, {
                    x: xEnd,
                    scrollTrigger: { 
                        trigger: section, 
                        scrub: 0.5 
                    }
                });
            });
        }
        showDemo();
    }

    function builderrin_gsap_scroll_trigger_img($scope){ 
        gsap.registerPlugin(ScrollTrigger); 
        const images = gsap.utils.toArray('img');  
        const showDemo = () => {
            document.body.style.overflow = 'auto';
            gsap.utils.toArray($scope.find('.pxl-text-image .pxl-item--image')).forEach((section, index) => {
                const w = section;
                var y = w.scrollHeight * -0.3;
                var yEnd = '150px';
                if($(section).closest('.pxl-text-image').hasClass('revesal')){   
                    y = '100px';
                    yEnd = (w.scrollHeight - section.offsetHeight) * -2;
                } 
                gsap.fromTo(w, { y }, {
                    y: yEnd,
                    scrollTrigger: { 
                        trigger: section, 
                        scrub: true 
                    }
                });
            });
        }
        showDemo();
    }

    //video button svg 
    function builderrin_scroll_progress_svg($scope){  
        if($scope.find('.progress-wrap').length > 0){
            var progressPath = document.querySelector('.progress-wrap path');
            var pathLength = progressPath.getTotalLength();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
            progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.getBoundingClientRect();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';    
            var updateProgress = function () {
                var scroll = $(window).scrollTop();
                var height = $(window).height() * 1.8;
                var progress = pathLength - (scroll * pathLength / height);
                progressPath.style.strokeDashoffset = progress;
            }
            updateProgress();
            $(window).scroll(updateProgress); 
            
        }
    }
    
    function builderrin_map_var_css(){ 
        var posX = 0,
        posY = 0;
        var mouseX = 0,
        mouseY = 0;

        var offset_left = 0;
        var offset_right = 0;
        var offset_top = 0;
        var offset_bottom = 0;

        $(document).on("mousemove", function(e) {
            offset_left = e.clientX; 
            offset_right = $(window).width() - offset_left;

            offset_top = e.clientY;
            offset_bottom = $(window).height() - offset_top;
        });

        $('.cursor-map-target').mousemove(function(e){ 
            var offset = $(this).offset();  
            mouseX = (e.pageX - offset.left);
            mouseY = (e.pageY - offset.top);
        });

        var map_content_width = $('.pxl-map-wrap').width();
        var map_content_height = $('.pxl-map-wrap').height();

        TweenMax.to({}, 0.01, {
            repeat: -1,
            onRepeat: function() {
                posX += (mouseX - posX);
                posY += (mouseY - posY);
                if($('.pxl-map-wrap').length > 0){
                    var base_left = posX - (map_content_width / 2) - map_content_width;
                    if(offset_left < (base_left*-1) + mouseX ){
                        base_left = posX + (map_content_width / 2);
                    } 

                    var top_pos = posY - (map_content_width / 2);
                    if($(window).innerWidth() <= 767){
                        base_left = (offset_left * -1) + mouseX + 15;
                        top_pos = (map_content_height * -1) + mouseY - 15;
                    }
                    TweenMax.set($('.pxl-map-wrap:not(.clicked)'), {
                        css: {
                            left: base_left,
                            top: top_pos
                        }
                    });
                }
            }
        });
        $('.cursor-map-target').on("mouseenter", function() {
            $(this).find(".pxl-map-wrap").removeClass("deactive").addClass("active");   
        }); 
        $('.cursor-map-target').on("mouseleave", function() {
            $(this).find(".pxl-map-wrap").removeClass("active").addClass("deactive");   
        }); 

        $(document).on('mousedown','.cursor-map-target.show-popup',function(){
            $(this).find(".pxl-map-wrap").addClass("clicked");
            var p_left = 0;
            var p_top = 0;
            var zoom_w = ($(window).width() / 2);
            var zoom_h = ($(window).height() / 1.8);
            
            if( offset_right < (zoom_w/2) ){
                p_left = (zoom_w/-2) + mouseX + 15;
                
            }  
            if( offset_bottom < (zoom_h/2) ){
                p_top = (zoom_h/-2) + mouseY + 30;
            }  
            
            if( offset_left < (zoom_w/2) ){
                p_left = (zoom_w/2) - 15;
            } 

            if($(window).innerWidth() <= 767){
                p_left = (offset_left * -1) + mouseX + 30;
                zoom_w = ($(window).width() - 60);
                zoom_h = ($(window).height() - 200);
            }

            $(this).find(".pxl-map-wrap").css({
                left: p_left,
                top: p_top,
                width: zoom_w,
                height: zoom_h
            }); 
            $(".pxl-cursor-map").addClass('hide') ;
        });
        
        $(document).on('mouseout','.pxl-map-wrap',function(){
            $(this).removeClass("clicked"); 
            $(".pxl-cursor-map").removeClass('hide') ; 
            $(this).css({
                width: map_content_width,
                height: map_content_height
            });  
        });
        
    }

    function builderrin_text_hover_image($scope){
        if($scope.find('.pxl-text-img-wrap').length <= 0) return;
        var mouseX = 0,
        mouseY = 0;

        $scope.find('.pxl-text-img-wrap .pxl-grid-inner').mousemove(function(e){ 
            var offset = $(this).offset();  
            mouseX = (e.pageX - offset.left);
            mouseY = (e.pageY - offset.top);

        });

        
        $scope.find('.pxl-text-img-wrap .pxl-grid-item').on("mouseenter", function() {  
            $(this).removeClass('deactive').addClass('active');   
            var target = $(this).attr('data-target');
            $(this).closest('.pxl-grid-inner').find(target).removeClass('deactive').addClass('active');   
        }); 
        $scope.find('.pxl-text-img-wrap .pxl-grid-item').on("mouseleave", function() {
            $(this).addClass('deactive').removeClass('active');  
            var target = $(this).attr('data-target');
            $(this).closest('.pxl-grid-inner').find(target).addClass('deactive').removeClass('active');  
        });
        const s = {
            x: window.innerWidth / 2,
            y: window.innerHeight / 2
        },
        t = gsap.quickSetter($scope.find('.pxl-text-img-wrap .pxl-grid-inner'), "css"),
        e = gsap.quickSetter($scope.find('.pxl-text-img-wrap .pxl-grid-inner'), "css");

        gsap.ticker.add((() => {
            const o = .15,
            i = 1 - Math.pow(.85, gsap.ticker.deltaRatio());
            s.x += (mouseX - s.x) * i, 
            s.y += (mouseY - s.y) * i, 
            t({
                "--pxl-mouse-x": `${s.x}px`
            }), e({
                "--pxl-mouse-y": `${s.y}px`
            })
        }))
    }

    function builderrin_parallax_bg(){
        $(document).find('.pxl-parallax-background').parallaxBackground({
            event: 'mouse_move',
            animation_type: 'shift',
            animate_duration: 2
        });
        $(document).find('.pxl-pll-basic').parallaxBackground();
        $(document).find('.pxl-pll-rotate').parallaxBackground({
            animation_type: 'rotate',
            zoom: 50,
            rotate_perspective: 500
        });
        $(document).find('.pxl-pll-mouse-move').parallaxBackground({
            event: 'mouse_move',
            animation_type: 'shift',
            animate_duration: 2
        });
        $(document).find('.pxl-pll-mouse-move-rotate').parallaxBackground({
            event: 'mouse_move',
            animation_type: 'rotate',
            animate_duration: 1,
            zoom: 70,
            rotate_perspective: 1000
        });
    }

    function builderrin_split_text($scope){
        var st = $scope.find(".pxl-split-text");
        if(st.length == 0) return;
        gsap.registerPlugin(SplitText);
        st.each(function(index, el) {
            el.split = new SplitText(el, { 
                type: "lines,words,chars",
                linesClass: "split-line"
            });
            gsap.set(el, { perspective: 400 });

            if( $(el).hasClass('split-in-fade') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    ease: "Back.easeOut",
                });
            }
            if( $(el).hasClass('split-in-right') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    x: "50",
                    ease: "Back.easeOut",
                });
            }
            if( $(el).hasClass('split-in-left') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    x: "-50",
                    ease: "circ.out",
                });
            }
            if( $(el).hasClass('split-in-up') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    y: "80",
                    ease: "circ.out",
                });
            }
            if( $(el).hasClass('split-in-down') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    y: "-80",
                    ease: "circ.out",
                });
            }
            if( $(el).hasClass('split-in-rotate') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    rotateX: "50deg",
                    ease: "circ.out",
                });
            }
            if( $(el).hasClass('split-in-scale') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    scale: "0.5",
                    ease: "circ.out",
                });
            }
            el.anim = gsap.to(el.split.chars, {
                scrollTrigger: {
                    trigger: el,
                    toggleActions: "restart pause resume reverse",
                    start: "top 90%",
                },
                x: "0",
                y: "0",
                rotateX: "0",
                scale: 1,
                opacity: 1,
                duration: 0.8, 
                stagger: 0.02,
            });
        });
    }

    
    $( window ).on( 'elementor/frontend/init', function() {

        elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $scope ) {
            builderrin_animation_handler($scope);
        } );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_horizontal_scroll.default', function( $scope ) {
            builderrin_gsap_scroll_trigger($scope);
        } );
        // elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_text_image.default', function( $scope ) {
        //     builderrin_gsap_scroll_trigger_img($scope);
        // } );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_video.default', function( $scope ) {
            builderrin_scroll_progress_svg($scope);
        } );
        
        builderrin_map_var_css();

        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_post_grid.default', function( $scope ) {
            builderrin_text_hover_image($scope);
        } );
        builderrin_parallax_bg(); 
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_heading.default', function( $scope ) {
            builderrin_split_text($scope);
        } );
        
        
    } );
    
} )( jQuery );

( function( $ ) {
  "use strict";

  $( window ).on( 'elementor/frontend/init', function() {

    const sections = document.querySelectorAll(".pxl-portfolio-spilt .portfolio-item");
    const images = document.querySelectorAll(".pxl-portfolio-spilt .item-image");
    const headings = gsap.utils.toArray(".pxl-portfolio-spilt .item-title");
    const excerpts = gsap.utils.toArray(".pxl-portfolio-spilt .item-excerpt");
    const readmores = gsap.utils.toArray(".pxl-portfolio-spilt .item-readmore");
    const outerWrappers = gsap.utils.toArray(".pxl-portfolio-spilt .item-wrap");
    const innerWrappers = gsap.utils.toArray(".pxl-portfolio-spilt .item-inner");
    
    document.addEventListener("wheel", handleWheel);
    document.addEventListener("touchstart", handleTouchStart);
    document.addEventListener("touchmove", handleTouchMove);
    document.addEventListener("touchend", handleTouchEnd);
    
    let listening = false,
    direction = "down",
    current,
    next = 0;

    const touch = {
        startX: 0,
        startY: 0,
        dx: 0,
        dy: 0,
        startTime: 0,
        dt: 0
    };

    const tlDefaults = {
        ease: "slow.inOut",
        duration: 1.25
    };
    
    const splitHeadings = headings.map((heading) => {
        return new SplitText(heading, {
            type: "chars, words, lines",
                linesClass: "split-line" //clip-text
            });
    });
    
    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_portfolio_spilt.default', function( $scope ) {
        setTimeout(function(){
            if($(document).find('.elementor-editor-active').length > 0) return true;
            gsap.set(outerWrappers, { yPercent: 100 });
            gsap.set(innerWrappers, { yPercent: -100 });
            slideIn(); 
            if( $(window).outerWidth() >= 768){
                $('.pxl-header').css({"position": "relative", "z-index": "3"});
                $('.pxl-header-transparent').css({"position": "fixed", "top": "0"});
            }
        },500);
        $(window).on('resize', function () {
            if($(window).outerWidth() <= 767){
                $('.pxl-header-transparent').css({"position": "absolute", "top": "0"});
            }
        }); 
    } );

    function revealSectionHeading() {
        return gsap.to(splitHeadings[next].chars, {
            autoAlpha: 1,
            yPercent: 0,
            duration: 1.2,
            ease: "power2",
            stagger: {
                each: 0.02,
                from: "random"
            }
        });
    }
    
    function slideIn() {
            // The first time this function runs, current is undefined
        if (current !== undefined) gsap.set(sections[current], { zIndex: 0 });

        gsap.set(sections[next], { autoAlpha: 1, zIndex: 1 });
        gsap.set(images[next], { yPercent: 0 });
        gsap.set(excerpts[next], { opacity:1, yPercent: 0 });
        gsap.set(readmores[next], { opacity:1, yPercent: 0 });
        gsap.set(splitHeadings[next].chars, { autoAlpha: 0, yPercent: 100 });

        const tl = gsap
        .timeline({
            paused: true,
            defaults: tlDefaults,
            onComplete: () => {
                listening = true;
                current = next;
            }
        })
        .to([outerWrappers[next], innerWrappers[next]], { yPercent: 0 }, 0)
        .from(images[next], { yPercent: 15 }, 0)
        .from(excerpts[next], { opacity:0, yPercent: 35 }, 0)
        .from(readmores[next], { opacity:0, yPercent: 50 }, 0)
        .add(revealSectionHeading(), 0)

        if (current !== undefined) {
            tl.add(
                gsap.to(images[current], {
                    yPercent: -15,
                    ...tlDefaults
                }),
                0
                ).add(
                gsap
                .timeline()
                .set(outerWrappers[current], { yPercent: 100 })
                .set(innerWrappers[current], { yPercent: -100 })
                .set(images[current], { yPercent: 0 })
                .set(excerpts[current], { opacity:1, yPercent: 0 })
                .set(readmores[current], { opacity:1, yPercent: 0 })
                .set(sections[current], { autoAlpha: 0 })
                );
            }

            tl.play(0);
        }


        // Slides a section out on scroll up
        function slideOut() {
            gsap.set(sections[current], { zIndex: 1 });
            gsap.set(sections[next], { autoAlpha: 1, zIndex: 0 });
            gsap.set(splitHeadings[next].chars, { autoAlpha: 0, yPercent: 100 });
            gsap.set([outerWrappers[next], innerWrappers[next]], { yPercent: 0 });
            gsap.set(images[next], { yPercent: 0 });
            gsap.set(excerpts[next], { opacity:1, yPercent: 0 });
            gsap.set(readmores[next], { opacity:1, yPercent: 0 });

            gsap
            .timeline({
                defaults: tlDefaults,
                onComplete: () => {
                    listening = true;
                    current = next;
                }
            })
            .to(outerWrappers[current], { yPercent: 100 }, 0)
            .to(innerWrappers[current], { yPercent: -100 }, 0)
            .to(images[current], { yPercent: 15 }, 0)
            .from(images[next], { yPercent: -15 }, 0)
            .from(excerpts[next], { opacity:0, yPercent: 35 }, 0)
            .from(readmores[next], { opacity:0, yPercent: 50 }, 0)
            .add(revealSectionHeading(), ">-1")
            .set(images[current], { yPercent: 0 })
            .set(excerpts[current], { opacity:0, yPercent: -35 })
            .set(readmores[current], { opacity:0, yPercent: -50 });
        }

        function handleDirection() {
            listening = false;

            if (direction === "down") {
                next = current + 1;
                if (next >= sections.length) next = 0;
                slideIn();
            }

            if (direction === "up") {
                next = current - 1;
                if (next < 0) next = sections.length - 1;
                slideOut();
            }
        }

        function handleWheel(e) {
            if (!listening) return;

            direction = e.wheelDeltaY < 0 ? "down" : "up";
            handleDirection();
        }

        function handleTouchStart(e) {
            if (!listening) return;
            const t = e.changedTouches[0];
            touch.startX = t.pageX;
            touch.startY = t.pageY;
        }

        function handleTouchMove(e) {
            if (!listening) return;
            e.preventDefault();
        }

        function handleTouchEnd(e) {
            if (!listening) return;
            const t = e.changedTouches[0];
            touch.dx = t.pageX - touch.startX;
            touch.dy = t.pageY - touch.startY;
            if (touch.dy > 10) direction = "up";
            if (touch.dy < -10) direction = "down";
            handleDirection();
        }
        
    } );

} ( jQuery ) ); 