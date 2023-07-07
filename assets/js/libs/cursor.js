;(function ($) {
  "use strict";
  
  var Pxl_Cursor = function() {
    var cursor        = $(".pxl-cursor"),
    follower          = $(".pxl-cursor-follower"),
    cursor_arrow_prev = $(".pxl-cursor-arrow-prev"),
    cursor_arrow_next = $(".pxl-cursor-arrow-next"),
    cursor_drag       = $(".pxl-cursor-drag"),
    cursor_map        = $(".pxl-cursor-map"),
    cursor_text       = $(".pxl-cursor-text"),
    cursor_icon       = $(".pxl-cursor-icon");

    var posX = 0,
    posY = 0;
    var posX1 = 0,
    posY1 = 0;

    var mouseX = 0,
    mouseY = 0;

    if(cursor.length <= 0) return false;

    document.body.classList.add('pxl-cursor-init'); 

    $(document).on("mousemove", function(e) {
      mouseX = e.clientX;
      mouseY = e.clientY;
    });

    initCursor();
    extraCursor();

    function initCursor() {
      var cursor_width = cursor.width();
      var cursor_follower_width = follower.width();
      var cursor_prev_width = cursor_arrow_prev.width();
      var cursor_next_width = cursor_arrow_next.width();
      var cursor_drag_width = cursor_drag.width();
      var cursor_map_width = cursor_map.width();
      TweenMax.to({}, 0.01, {
        repeat: -1,
        onRepeat: function() {
          posX += (mouseX - posX) / 9;
          posY += (mouseY - posY) / 9;
          posX1 += (mouseX - posX1);
          posY1 += (mouseY - posY1);
          if(follower.length > 0){
            TweenMax.set(follower, {
              css: {
                left: posX - (cursor_follower_width / 2) - 2,
                top: posY - (cursor_follower_width / 2) - 2
              }
            });
          }
          if(cursor.length > 0){
            TweenMax.set(cursor, {
              css: {
                left: mouseX - (cursor_width / 2),
                top: mouseY - (cursor_width / 2)
              }
            });
          }
          if(cursor_arrow_prev.length > 0){
            TweenMax.set(cursor_arrow_prev, {
              css: {
                left: posX1 - (cursor_prev_width / 2),
                top: posY1 - (cursor_prev_width / 2)
              }
            });
          }
          if(cursor_arrow_next.length > 0){
            TweenMax.set(cursor_arrow_next, {
              css: {
                left: posX1 - (cursor_next_width / 2),
                top: posY1 - (cursor_next_width / 2)
              }
            });
          }
          if(cursor_drag.length > 0){
            TweenMax.set(cursor_drag, {
              css: {
                left: posX1 - (cursor_drag_width / 2),
                top: posY1 - (cursor_drag_width / 2)
              }
            });
          }
          if(cursor_map.length > 0){
            TweenMax.set(cursor_map, {
              css: {
                left: posX - (cursor_map_width / 2),
                top: posY - (cursor_map_width / 2)
              }
            });
          }
        }
      });
      
    }

    function show_cursor(cur, bool){  
      cur.addClass("active");   
      if(bool == true){
        cursor.removeClass("active").addClass('hide');  
        follower.removeClass("active").addClass('hide');  
      } 
    }
    function hide_cursor(cur, bool){
      cur.removeClass("active");     
      if(bool == true){
        cursor.removeClass("hide");  
        follower.removeClass("hide");  
      }  
    }
    function show_cursor_inner(e){  
      if( $(e).parents('.cursor-drag-area').length > 0 ){
        cursor_drag.removeClass("active");
        cursor.removeClass("hide");  
        follower.removeClass("hide");  
      } 
      if( $(e).parents('.cursor-map-target').length > 0 ){
        cursor_map.removeClass("active");
        cursor.removeClass("hide");  
        follower.removeClass("hide");  
      } 
    }
    
    function hide_cursor_inner(e){
      if( $(e).parents('.cursor-drag-area').length > 0 ){
        cursor_drag.addClass("active");
        cursor.addClass("hide");  
        follower.addClass("hide");
      }  
      if( $(e).parents('.cursor-map-target').length > 0 ){
        cursor_map.addClass("active");
        cursor.addClass("hide");  
        follower.addClass("hide");  
      } 
    }
    function extraCursor(){

      $('a').on("mouseenter", function() {   
        show_cursor(cursor, false);    
        show_cursor(follower, false);    
        show_cursor_inner(this);
      }); 
      $('a').on("mouseleave", function() { 
        hide_cursor(cursor, false);     
        hide_cursor(follower, false);  
        hide_cursor_inner(this);   
      });

      $('.pxl-video-btn').on("mouseenter", function() {   
        show_cursor(cursor, false);    
        show_cursor(follower, false);    
      }); 
      $('.pxl-video-btn').on("mouseleave", function() { 
        hide_cursor(cursor, false);     
        hide_cursor(follower, false);     
      });


      $('.pxl-anchor').on("mouseenter", function() {  
        show_cursor(cursor, false);    
        show_cursor(follower, false);     
      }); 
      $('.pxl-anchor').on("mouseleave", function() {
        hide_cursor(cursor, false);     
        hide_cursor(follower, false);  
      }); 

      $('.pxl-swiper-thumbs').on("mouseenter", function() {  
        show_cursor(cursor, false);    
        show_cursor(follower, false);     
      }); 
      $('.pxl-swiper-thumbs').on("mouseleave", function() {
        hide_cursor(cursor, false);     
        hide_cursor(follower, false);  
      }); 

      $('.cursor-arrow-prev').on("mouseenter", function() {
        show_cursor(cursor_arrow_prev, true);
        
      });
      $('.cursor-arrow-prev').on("mouseleave", function() {
        hide_cursor(cursor_arrow_prev, true);   
      });

      $('.cursor-arrow-next').on("mouseenter", function() {
        show_cursor(cursor_arrow_next, true); 
      }); 
      $('.cursor-arrow-next').on("mouseleave", function() {
        hide_cursor(cursor_arrow_next, true);  
      }); 

      $('.cursor-drag-area').on("mouseenter", function() {
        show_cursor(cursor_drag, true);
      }); 
      $('.cursor-drag-area').on("mouseleave", function() {
        hide_cursor(cursor_drag, true);
      }); 
      $(document).on('mousedown','.cursor-drag-area',function(){
        cursor_drag.addClass("clicked");    
      });
      $(document).on('mouseup','.cursor-drag-area',function(){
        cursor_drag.removeClass("clicked");    
      });

      $('.cursor-map-target').on("mouseenter", function() {
        show_cursor(cursor_map, true); 
      }); 
      $('.cursor-map-target').on("mouseleave", function() {
        hide_cursor(cursor_map, true);  
      }); 
      
    }
  };
  if($(document).find('.pxl-cursor').length > 0){ 
        if($(window).innerWidth() >= 1200){
    Pxl_Cursor();
        }
  } 
  
  
})(jQuery);