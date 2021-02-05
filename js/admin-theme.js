$ = jQuery.noConflict();

(function($) {
//script starts here

/* Validation Form */
$(document).ready(function(){
	myvalidation_settings = {
		fontsize : '0.9',
		bgcolor: '#AA3D3D',
		bordercolor: '#AA3D3D',
	};
	
	myvalidation('.form-booking',myvalidation_settings);			
});

})( jQuery );