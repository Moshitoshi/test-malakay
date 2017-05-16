jQuery(function($) {
$(document).ready(function() {
  $('.popup-gallery').magnificPopup({
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
      markup: '<div class="mfp-figure">'+
            '<div class="mfp-close"></div>'+
            '<div class="mfp-img"></div>'+
          '</div>'+
          '<div class="mfp-bottom-bar">'+
            '<div class="mfp-title"></div>'+
            '<div class="mfp-counter h3"></div>'+
          '</div>',
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return '<h3>' + item.el.find('img').attr('title') + '</h3>' + '<h3>' + item.el.find('img').attr('alt') + '</h3>';

			}
		}
	});
  $('.item-gallery').magnificPopup({
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
      markup: '<div class="mfp-figure">'+
            '<div class="mfp-close"></div>'+
            '<div class="mfp-img"></div>'+
          '</div>'+
          '<div class="mfp-bottom-bar">'+
            '<div class="mfp-title"></div>'+
            '<div class="mfp-counter h3"></div>'+
          '</div>',
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
    return '<h3>' + item.el.find('img').attr('alt') + '</h3>' + '<h3>' + item.el.find('img').attr('title') + '</h3>';
}
    }
  });
});
$(window).load(function() {
var $container = $('#isotope-list'); //The ID for the list with all the blog posts
$container.isotope({ //Isotope options, 'item' matches the class in the PHP
 itemSelector : '.item',
   layoutMode: 'fitRows'
});

//Add the class selected to the item that is clicked, and remove from the others
var $optionSets = $('#filters'),
$optionLinks = $optionSets.find('a');

$optionLinks.click(function(){
var $this = $(this);
// don't proceed if already selected
if ( $this.hasClass('selected') ) {
 return false;
}
var $optionSet = $this.parents('#filters');
$optionSets.find('.selected').removeClass('selected');
$this.addClass('selected');

//When an item is clicked, sort the items.
var selector = $(this).attr('data-filter');
$container.isotope({ filter: selector });

return false;
});

// navbar fullpage

$('#toggle').click(function() {
   $(this).toggleClass('active');
   $('#overlay').toggleClass('open bg-primary');
  });
});
});
// Beauty navbar
jQuery.noConflict()(function($){
		"use strict";

		        // Show the navbar when the page is scrolled up
		        var MQL = 1170;

		        //primary navigation slide-in effect
		        if ($(window).width() > MQL) {
		            var headerHeight = $('#navbarBeauty').height();
		            $(window).on('scroll', {
		                    previousTop: 0
		                },
		                function() {
		                    var currentTop = $(window).scrollTop();
		                    //check if user is scrolling up
		                    if (currentTop < this.previousTop) {
		                        //if scrolling up...
		                        if (currentTop > 0 && $('#navbarBeauty').hasClass('is-fixed')) {
		                            $('#navbarBeauty').addClass('is-visible');
		                        } else {
		                            $('#navbarBeauty').removeClass('is-visible is-fixed');
		                        }
		                    } else if (currentTop > this.previousTop) {
		                        //if scrolling down...
		                        $('#navbarBeauty').removeClass('is-visible');
		                        if (currentTop > headerHeight && !$('#navbarBeauty').hasClass('is-fixed')) $('#navbarBeauty').addClass('is-fixed');
		                    }
		                    this.previousTop = currentTop;
		                });
		        }
}); // End of use strict
