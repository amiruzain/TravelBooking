<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // disable direct access
}

class Booking_Trip_Widget extends WP_Widget {
	// constructor
	function Booking_Trip_Widget() {
		$ops = array('classname' => 'widget_trip_plugin', 'description' => __('Add Check Price Trip to your sidebar', 'booking-trip-plugin'));
		parent::__construct('Booking_Trip_Widget', 'Check Price Trip', $ops);
	}

	// widget form creation
	function form($instance) {	
		// Check values
		if( $instance) {
			 $title = esc_attr($instance['title']);
		} else {
			 $title = '';
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'Booking_Trip_Widget'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php
	}

	// widget update
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		
		return $instance;
	}

	// widget display
	function widget($args, $instance) {
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;
		// Display the widget
		echo '<div>';

		// Check if title is set
		if ( $title ) {
		  echo $before_title . $title . $after_title;
		}

		echo '</div>';
		?>	
			<div class="">
				<form method="post" onsubmit="getTrip()">
					<div class="form-group">
						<label for="minimalHarga">Harga Minimal</label>
						<div class="input-group">
							<div class="input-group-addon">Rp. </div>
							<input type="number" min="100000" step="50000" class="form-control" onChange="getTrip();" onKeyup="getTrip();" id="minimalHarga" name="minimalharga" placeholder="Minimal budget Anda">
						</div>
					</div>	

					<div class="form-group">
						<label for="maximalHarga">Harga Maximal</label>
						<div class="input-group">
							<div class="input-group-addon">Rp. </div>
							<input type="number" min="100000" step="50000" class="form-control" onChange="getTrip();" onKeyup="getTrip();" id="maximalHarga" name="maximalHarga" placeholder="Maximal budget Anda">
						</div>
					</div>	

					<!--div class="form-group">
						<button type="submit" name="booking" class="btn btn-warning btn-block">Cari Trip ...</button>
					</div-->				
				</form>
				
				<hr>
				
				<script>		
					function getTrip(){
						pluginURL		=  "<?php echo plugins_url('/booking-trip-nt/widget/inc/name-trip.php'); ?>";
						
						minimalHarga	= $('#minimalHarga').val();
						
						maximalHarga	= $('#maximalHarga').val();				
						
						$('.show-trip').empty();

						$('.show-trip').append('<div class="loader-wrap text-center"><img class="loader" src="<?php echo plugins_url('/booking-trip-nt/'); ?>img/loader.gif">Loading ...</div>');

						$.get(pluginURL+"?minharga="+minimalHarga+"&maxharga="+maximalHarga, {}, function(nilbal) {

							$('.show-trip').empty();

							$('.show-trip').html(nilbal);

						});
					}	
				</script>
		
				<div class="show-trip">
					<div class="text-center">
						<i>Cari Trip Sesuai Budget Anda ...</i>
					</div>
				</div>	
			</div>
		<?php	

		echo $after_widget;
	}	
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("Booking_Trip_Widget");'));

?>