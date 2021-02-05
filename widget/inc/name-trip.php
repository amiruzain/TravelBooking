<?php
	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	require_once( $parse_uri[0] . 'wp-load.php' );
?>

<?php

	$minharga	= $_GET["minharga"];
	$maxharga	= $_GET["maxharga"];

	global $wpdb;

	$table_name		= $wpdb->prefix . "nt_nama_trip";
	$table_harga	= $wpdb->prefix . "nt_harga_trip";

	$data = $wpdb->get_results("SELECT DISTINCT(id_trip) FROM $table_harga
								WHERE harga BETWEEN $minharga AND $maxharga");
	
	if($wpdb->num_rows > 0){
		foreach ($data as $ht) {
			$id_trip		= $ht->id_trip;
			$harga_trip		= $ht->harga;
?>
		<?php
			$data = $wpdb->get_results("SELECT namaTrip.nama_trip, namaTrip.id, MIN(hargaTrip.harga) as hargaMinimal, MAX(hargaTrip.harga) as hargaMaximal 
										FROM $table_name AS namaTrip INNER JOIN $table_harga AS hargaTrip 
										ON namaTrip.id = hargaTrip.id_trip 
										WHERE namaTrip.id = $id_trip");
			foreach ($data as $nt) {
				$id				= $nt->id;	
				$nama_trip		= $nt->nama_trip;
				$harga_trip		= $nt->harga;
				$hargaMinimal	= $nt->hargaMinimal;
				$hargaMaximal	= $nt->hargaMaximal;
		?>
			<h4><?php echo $nama_trip; ?></h4>
			Start from <span class="start-color">Rp. <?php echo number_format($hargaMinimal); ?></span> - 
			<span class="start-color">Rp. <?php echo number_format($hargaMaximal); ?></span>
			<div class="">
				<a href="http://jagadtour.com/booking-trip/?trip=<?php echo $id; ?>" class="btn btn-warning margin-top-20">Booking Now</a>
			</div>	
			<hr>
		<?php
			}
		?>
<?php			
		}
	} else {
?>		
		<div class="text-center">
			<i>Tidak ada trip yang sesuai ...</i>
		</div>
<?php		
	}
?>