( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCTIlineHandler = function( $scope, $ ) {
    	
        $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({default_offset_pct: 0.5});
  		$(".twentytwenty-container[data-orientation='vertical']").twentytwenty({default_offset_pct: 0.5, orientation: 'vertical'});

    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_image_before_after.default', WidgetCTIlineHandler );
    } );
} )( jQuery );