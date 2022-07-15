/**
 * Add your custom JavaScript here.
 * 
 */

jQuery(function($){
    $('.dropdown-toggle').hover(function(){
      $('.dropdown-menu').hide();
      $(this).closest('li').find('.dropdown-menu').fadeIn();
    });
});