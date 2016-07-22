/**
 * Doggy Health Club Plugin
 *
 * @file	plugin.js
 * @summary 	Ajax controller and workflow handler
 * @since	Jul 2016
 * @author 	Miller Media
 */

(function( $ ) {
	
	"use strict";
	
	/* Plugin Localization */
	var local = window.dhclocal;
	var wizard = $('#dhc-wizard-container');
	var form = $('.product-form-container form');

	/* Steps Configuration */
	var stepsConfig = 
	{
		headerTag: 'h3',
		bodyTag: 'section',
		transitionEffect: 'slideLeft',
		titleTemplate: '#title#',
		enablePagination: false,
		onInit: function() {
			wizard.css({ visibility: 'visible' });
		}
	};
	
	/* Init wizard */
	wizard.steps( stepsConfig );
	
	wizard.on( 'click', '[data-role="option-button"]', function( e ) 
	{
		var button = $(this);
		
		/* Select attribute options targeted by this button */
		if ( button.data('attribute') !== undefined )
		{
			var select = form.find('.variations select').eq( parseInt( button.data('attribute') ) );
			var option = select.find( 'option' ).eq( parseInt( button.data('option') ) );
			select.val( option.val() );
			select.change();
			button.closest( '.option-group' ).find( '[data-role="option-button"]' ).removeClass( 'selected' );
			button.addClass( 'selected' );
		}
		
		/* Hide elements */
		if ( button.data('hide') )
		{
			$.each( button.data('hide').split(','), function( i, id ) {
				$('#'+id).hide();
			});
		}
		
		/* Show elements */
		if ( button.data('show') )
		{
			$.each( button.data('show').split(','), function( i, id ) {
				$('#'+id).show();
			});
		}
		
		/* Determine action to take */
		switch( button.data('action') )
		{
			case 'next':
			
				wizard.steps( 'next' );
				break;
			
			case 'prev':
			
				wizard.steps( 'prev' );
				break;
			
			case 'submit':
				
				wizard.waitMe({ text: 'Processing' });
				
				/* Clear the cart */
				$.ajax(
				{ 
					url: local.ajaxurl, 
					data: { action: 'dhc_wizard', 'do': 'clear' },
					success: function( data ) 
					{
						/* Submit the product form */
						$.ajax(
						{
							type: "POST",
							data: form.serialize(),
							success: function()
							{
								/* Redirect to next step */
								window.location = data.nextstep;
							}
						});
					}
				});
					
			
		}
	});

})( jQuery );