/**
 * Add your custom JavaScript here.
 * 
 */

jQuery(function($){
    $('.dropdown-toggle').hover(function(){ 
        console.log('sukses');
      $(this).closest('li').find('.dropdown-menu').show(); 
    });
});