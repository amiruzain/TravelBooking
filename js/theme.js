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

/* Date Picker */
$(document).ready(function(){
	var date_input=$('#dateTrip'); //our date input has the name "date"
	date_input.datepicker({
		format: 'yyyy-mm-dd',
		todayHighlight: true,
		autoclose: true,
	});
});

/* Time Picker */
$(document).ready(function(){
	var date_input=$('#jamTiba'); //our date input has the name "date"
	date_input.timepicker({
		minuteStep: 5,
		showInputs: false,
		up: 'fa fa-angle-double-up',
		down: 'fa fa-angle-double-down'		
	});
});		

$(document).ready(function(){
	var date_input=$('#jamPulang'); //our date input has the name "date"
	date_input.timepicker({
		minuteStep: 5,
		showInputs: false,
		up: 'fa fa-angle-double-up',
		down: 'fa fa-angle-double-down'		
	});
});		

})( jQuery );
/*
function getPrice(){
	paket = $('#paket').val();
	subTotalGr = eval(paket / 1000);
	
	$('#namaTrip').html ( subTotalGr + " Kg" );	
}
*/

/*
function getPrice(){
	pluginURL =  "<?php echo plugins_url('/booking-trip-nt/inc/part/name-trip.php'); ?>";
	
	paket = $('#paket').val();
    
	$('.booking-order').empty();

    $('.booking-order').append('<div class="loader-wrap text-center"><img class="loader" src="img/ajax-loader.gif">loading</div>');

    $.get("http://localhost/jagad/wp-content/plugins/booking-trip-nt/inc/part/name-trip.php", {}, function(nilbal) {

        $('.booking-order').empty();

        $('.booking-order').html(nilbal);

    });
}	

*/