/**
 * Doggy Health Club Plugin
 *
 * @file	plugin.js
 * @summary 	Ajax controller and workflow handler
 * @since	Jul 2016
 * @author 	Miller Media
 */
var gift_val = '';
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
                console.log(button);
//                if(button.hasClass("box-gift")){
//                    if(button.attr("data-option") == 2){
//                        console.log("innnn");
//                    }
//                }
                gift_val = jQuery("#membership-month").text().split(" ");
                gift_val = gift_val[0];
               // console.log(gift_val);
                
                
		
		/* Select attribute options targeted by this button */
		if ( button.data('attribute') !== undefined )
		{       
                        if(gift_val == 12){
                            var select = jQuery("#12-months-membership");
                            var option = select.find( 'option' ).eq( parseInt( button.data('option') ) );
                            select.val( option.val() );
                            select.change();
                            jQuery("#1-month-membership").val(jQuery("#1-month-membership option:first").val());
                        } else if(gift_val == 1){
                            var select = jQuery("#1-month-membership");
                            var option = select.find( 'option' ).eq( parseInt( button.data('option') ) );
                            select.val( option.val() );
                            select.change();
                            jQuery("#12-months-membership").val(jQuery("#12-months-membership option:first").val());
                        } else{
                            var select = form.find('.variations select').eq( parseInt( button.data('attribute') ) );
                            var option = select.find( 'option' ).eq( parseInt( button.data('option') ) );
                            select.val( option.val() );
                            select.change();
                            button.closest( '.option-group' ).find( '[data-role="option-button"]' ).removeClass( 'selected' );
                            button.addClass( 'selected' );
                        }
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
                
		// modified by me start
			//alert(99);
			var selected_box_gift;
			selected_box_gift = jQuery(".box-gift").hasClass("selected");
			if ( selected_box_gift ) {
				//alert(aaa);
				selected_box_gift = $(this).find("h3").html();
				$("#membership-month").html( selected_box_gift );
				if ( selected_box_gift == "1 Month" ){
					$("#membership-month-price").html( "42" );
				}
				else {
					$("#membership-month-price").html( "32" );
				}
			}
		// modified by me end

	});

})( jQuery );