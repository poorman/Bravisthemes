( function( $ ) {

    var pxl_widget_tabs_handler = function( $scope, $ ) {
        $scope.find(".pxl-tabs .pxl-item--tab-title").on("click", function(e){
            e.preventDefault();
            var target = $(this).data("target");
            var parent = $(this).parents(".pxl-tabs");
            parent.find(".pxl-tabs--content .pxl-item--content").slideUp(300);
            parent.find(".pxl-tabs--title .pxl-item--tab-title").removeClass('active');
            $(this).addClass("active");
            $(target).slideDown(300);

            parent.find(".pxl-tabs--content .pxl-item--content").css({ opacity: "1" });
        });
    };

    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_tabs.default', pxl_widget_tabs_handler );
    } );

} )( jQuery );