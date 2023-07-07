( function( $ ) {
    
    function builderrin_section_start_render(){
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter( 'pxl_section_start_render', function( html, settings, el ) {
            if(typeof settings.pxl_parallax_bg_img != 'undefined' && settings.pxl_parallax_bg_img.url != ''){
                html += '<div class="pxl-section-bg-parallax"></div>';
            }
            if(typeof settings.pxl_divider_top_img != 'undefined' && settings.pxl_divider_top_img.url != ''){
                html += '<div class="pxl-section-divider-top-img"></div>';
            }
            if(typeof settings.pxl_divider_bot_img != 'undefined' && settings.pxl_divider_bot_img.url != ''){
                html += '<div class="pxl-section-divider-bot-img"></div>';
            }

            return html;
        } );
    } 
    function builderrin_section_before_render(){
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter( 'pxl-custom-section/before-render', function( html, settings, el ) {
            return html;
        } );
    } 
     
    // add custom section class
    function builderrin_custom_section_classes(){
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter( 'pxl-custom-section-classes', function( settings ) {
            let custom_classes = [];
            if(typeof settings.custom_style != 'undefined' && settings.custom_style != ''){
                custom_classes.push('style-' + settings.custom_style);
            }
            return custom_classes;
        } );
    }
    function builderrin_column_before_render(){
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter( 'pxl-custom-column/before-render', function( html, settings, el ) {
            if(typeof settings.pxl_parallax_col_bg_img != 'undefined' && settings.pxl_parallax_col_bg_img.url != ''){
                html += '<div class="pxl-column-bg-parallax"></div>';
            }
            return html;
        } );
    }
    // add custom columns class
    function builderrin_custom_column_classes(){
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter( 'pxl-custom-column-classes', function( settings ) {
            let custom_classes = [];
            if(typeof settings.custom_style != 'undefined' && settings.custom_style != ''){
            custom_classes.push('style-' + settings.custom_style);
            }
            return custom_classes;
        } );
         
    }
 
       
    $( window ).on( 'elementor/frontend/init', function() {
     
        builderrin_section_start_render();
        builderrin_section_before_render();
        builderrin_custom_section_classes();
        builderrin_column_before_render();
        builderrin_custom_column_classes();
         
    } );
     
} )( jQuery );


 