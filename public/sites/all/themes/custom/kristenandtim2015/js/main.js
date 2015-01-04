(function ($, Drupal) {

  Drupal.behaviors.kristenandtim2015 = {
    attach: function(context, settings) {
		$(document).on('click','.navbar-collapse.in',function(e) {

		    if( $(e.target).is('a') && ( $(e.target).attr('class') != 'dropdown-toggle' ) ) {
		        $(this).collapse('hide');
		    }

		});
    }
  };

})(jQuery, Drupal);