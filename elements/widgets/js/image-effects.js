( function( $ ) {
    var pxl_widget_accordion_handler = function( $scope, $ ) {
        /* Image Effect */
        if($('.pxl-image-tilt').length){
            $('.pxl-image-tilt').each(function () {
                $(this).tilt({
                    maxTilt: 10,
                    speed: 400,
                });
            });
        }

        /* Ink Transition Effect */
        const inkTriggers = [...document.querySelectorAll('.pxl-image-ink')];
        const pxl_controller = new ScrollMagic.Controller();
        inkTriggers.map(ink => {
            const sceneInk = new ScrollMagic.Scene({
                triggerElement: ink,
                triggerHook: 'onEnter',
            })
            .setClassToggle(ink, 'is-active')
            .reverse(false)
            .addTo(pxl_controller);
        });

        /* Scroll Load Effect */
        const imagesAni = document.querySelectorAll(".pxl-image-scroller img");
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.filter = "grayscale(0)";
                    } else {
                        entry.target.style.opacity = 0;
                        entry.target.style.filter = "grayscale(1)";
                    }
                });
            },
            {
                threshold: 0.15
            }
            );
        imagesAni.forEach((el, i) => {
            observer.observe(el);
        });

    };
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_image.default', pxl_widget_accordion_handler );
    } );
} )( jQuery );