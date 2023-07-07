( function( $ ) {
  var pxl_widget_parallax_handler = function( $scope, $ ) {
    setTimeout(function(){
      $('body:not(.elementor-editor-active) .elementor > .elementor-element').each(function(){
        $(this).bind('mousemove',function(e){
            $(this).find('.move-parallax').each(function(){
              var date_move = $(this).attr('data-move');

              var move_x = (window.innerWidth - e.pageX) / date_move;
              var move_y = (window.innerHeight - e.pageY) / date_move;

              LaxMoving($(this), move_x, move_y);
            });
        });
        function LaxMoving(selector, move_x, move_y){
            selector.css({
              'transform': 'translate('+move_x+'px,'+move_y+'px)',
              '-webkit-transform': 'translate('+move_x+'px,'+move_y+'px)',
              '-o-transform': 'translate('+move_x+'px,'+move_y+'px)',
              '-moz-transform': 'translate('+move_x+'px,'+move_y+'px)',
             });
        }
      });
    }, 200);
  };
  $( window ).on( 'elementor/frontend/init', function() {
      elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_particle.default', pxl_widget_parallax_handler );
  } );
} )( jQuery );
