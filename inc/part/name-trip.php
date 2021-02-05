<?php
	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	require_once( $parse_uri[0] . 'wp-load.php' );
?>

<?php

$pesertaDewasa	= $_GET['pesertadewasa'];
$pesertaAnak	= $_GET['pesertaanak'];

$peserta		= $pesertaDewasa + $pesertaAnak;

if ( $peserta < 7 ) {
	global $wpdb;
	
	$table_name		= $wpdb->prefix . "nt_nama_trip";
	$table_harga	= $wpdb->prefix . "nt_harga_trip";
	
	$paket			= $_GET['paket'];
	$pesertaDewasa	= $_GET['pesertadewasa'];
	$pesertaAnak	= $_GET['pesertaanak'];
	$grade			= $_GET['grade'];
	
	$data = $wpdb->get_results("SELECT namaTrip.nama_trip, namaTrip.id, hargaTrip.id_trip, hargaTrip.id_grade, hargaTrip.harga, hargaTrip.peserta 
								FROM $table_name AS namaTrip INNER JOIN $table_harga AS hargaTrip 
								ON namaTrip.id = hargaTrip.id_trip 
								WHERE namaTrip.id = $paket AND hargaTrip.peserta = $peserta AND hargaTrip.id_grade = $grade");
	foreach ($data as $nt) {
		$id			= $nt->id;	
		$nama_trip	= $nt->nama_trip;
		$harga_trip	= $nt->harga;
?>	
		<table class="booking-table">
			<thead>
				<tr>
					<th class="paket-name">Paket</th>
					<th class="paket-total">Total</th>
				</tr>
			</thead>
			
			<tbody>
				<tr class="cart-item">
					<td class="product-name">
						<span id="namaTrip"><?php echo $nama_trip; ?></span>
					</td>
					
					<td class="product-total">
					<?php    
					    if ( $harga_trip == 0 ){
					        echo "Batas Maximum 2 Orang";
					    } else {
					?>        
    						Rp <?php echo number_format($harga_trip); } ?>
					</td>
				</tr>
			</tbody>
			
			<tfoot>
				<tr class="cart-subtotal">
					<th>Grade</th>
					<td>
						<?php
							if ( $grade == 1 ){
								echo "<i class='fa fa-star'></i> - SILVER";
							} else if ( $grade == 2 ){
								echo "<i class='fa fa-star'></i><i class='fa fa-star'></i> - GOLD";
							} else if ( $grade == 3 ){
								echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i> - PREMIUM";
							}
						?>
					</td>
				</tr>
						
				<tr class="cart-subtotal">
					<?php
						if ( $pesertaAnak == 0 ){
							$harga_anak = 0;
						}
						
						else {
							$harga_anak		= 0.8 * $harga_trip;
						}
					?>				
					<th>Peserta Dewasa</th>
					<td><?php echo $pesertaDewasa; ?> Orang X <?php if ( $harga_trip == 0 ){ echo "Batas Maximum 2 Orang"; } else {?>Rp <?php echo number_format($harga_trip); }?></td>
				</tr>
				
				<tr class="cart-subtotal">
					<th>Peserta Anak</th>
					<td>
						<?php
							if ( $pesertaAnak == 0 ){
								echo "Tidak Ada";
							} else {
						?>	
							<?php echo $pesertaAnak; ?> Orang X Rp <?php echo number_format($harga_anak); ?>
						<?php
							}
						?>
					</td>
				</tr>				
				
				<tr class="cart-subtotal">
					<th>Total Peserta</th>
					<td><?php echo $peserta; ?> Orang</td>
				</tr>				
				
				<tr class="cart-subtotal">
					<th>Subtotal</th>
					<td>
						<?php 
							$total_dewasa	= $pesertaDewasa * $harga_trip;
							$total_anak		= $pesertaAnak * $harga_anak;
						?>
						Dewasa : Rp <?php echo number_format($total_dewasa); ?> </br>					
						Anak : Rp <?php echo number_format($total_anak); ?>
					</td>
				</tr>

				<tr class="order-total">
					<th>Total</th>
					<td>
						<strong>
							Rp 	<?php 
									$total = $total_dewasa + $total_anak;
									
									echo number_format($total); 
								?>
						</strong>
					</td>
				</tr>
			</tfoot>
		</table>

<?php	
	}	
} else {
	global $wpdb;
	
	$table_name		= $wpdb->prefix . "nt_nama_trip";
	
	$paket		= $_GET['paket'];				
	//$peserta	= $_GET['peserta'];
	$grade		= $_GET['grade'];
	
	$pesertaDewasa	= $_GET['pesertadewasa'];
	$pesertaAnak	= $_GET['pesertaanak'];

	$peserta		= $pesertaDewasa + $pesertaAnak;	
	
	$data = $wpdb->get_results("SELECT * FROM $table_name
								WHERE id = $paket");
	foreach ($data as $nt) {
		$id			= $nt->id;	
		$nama_trip	= $nt->nama_trip;
?>	
		<table class="booking-table">
			<thead>
				<tr>
					<th class="paket-name">Paket</th>
					<th class="paket-total">Total</th>
				</tr>
			</thead>
			
			<tbody>
				<tr class="cart-item">
					<td class="product-name">
						<span id="namaTrip"><?php echo $nama_trip; ?></span>
					</td>
					
					<td class="product-total">
						<?php
							global $wpdb;
							
							$table_name		= $wpdb->prefix . "nt_setting_trip";
							
							$data = $wpdb->get_results("SELECT * FROM $table_name
														WHERE id = 1");
							foreach ($data as $st) {
								$contact	= $st->contact;
								
								echo $contact;
							}
						?>						
					</td>
				</tr>
			</tbody>
			
			<tfoot>
				<tr class="cart-subtotal">
					<th>Grade</th>
					<td>
						<?php
							if ( $grade == 1 ){
								echo "<i class='fa fa-star'></i> - SILVER";
							} else if ( $grade == 2 ){
								echo "<i class='fa fa-star'></i><i class='fa fa-star'></i> - GOLD";
							} else if ( $grade == 3 ){
								echo "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i> - PREMIUM";
							}
						?>
					</td>
				</tr>
						
				<tr class="cart-subtotal">			
					<th>Peserta Dewasa</th>
					<td><?php echo $pesertaDewasa; ?> Orang</td>
				</tr>
				
				<tr class="cart-subtotal">
					<th>Peserta Anak</th>
					<td>
						<?php
							if ( $pesertaAnak == 0 ){
								echo "Tidak Ada";
							} else {
						?>	
							<?php echo $pesertaAnak; ?> Orang
						<?php
							}
						?>
					</td>
				</tr>				
				
				<tr class="cart-subtotal">
					<th>Total Peserta</th>
					<td><?php echo $peserta; ?> Orang</td>
				</tr>	
			</tfoot>
		</table>

<?php	
	}		
}
?>	
