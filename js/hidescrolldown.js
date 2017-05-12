jQuery.noConflict()(function($){
		"use strict";
    var scroll_pos = 0;
  var scroll_time;

  $(window).scroll(function() {
      clearTimeout(scroll_time);
      var current_scroll = $(window).scrollTop();

      if (current_scroll >= $('#masthead').outerHeight()) {
          if (current_scroll <= scroll_pos) {
              $('#masthead').removeClass('hidden');
          }
          else {
              $('#masthead').addClass('hidden');
          }
      }

      scroll_time = setTimeout(function() {
          scroll_pos = $(window).scrollTop();
      }, 100);
  });
}); // End of use strict
