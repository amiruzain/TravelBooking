<?php
	$id_trip = $_GET['id_trip'];
	
	global $wpdb;
	
	//Update Nama Trip	
	$table_name		= $wpdb->prefix . "nt_nama_trip";
	$table_harga	= $wpdb->prefix . "nt_harga_trip";
	
	$trip_id		= $_POST["trip_id"];
	$parent_trip	= $_POST["parent_trip"];
	$nama_trip		= $_POST["nama_trip"];
	$kode_trip      = $_POST["kode_trip"];
	
	if (isset($_POST['update'])) {
		
		$wpdb->update(
				$table_name,
				array(
					'parent_trip' 	=> $parent_trip,
					'nama_trip'		=> $nama_trip,
					'kode_trip'     => $kode_trip
				),
				array('ID' => $trip_id),
				array(
					'%d',
					'%s',
					'%s'
				),
                array(
					'%d'
				)			
		);
		
		for($i=1; $i <= 18; $i++){
			$id_harga	= $_POST["id_harga_". $i];
			$harga_trip	= $_POST["harga_trip_". $i];
		
			$wpdb->update(
					$table_harga,
					array(
						'harga'		=> $harga_trip
					),
					array('ID' => $id_harga),					
					array(
						'%d'
					),
					array(
						'%d'
					)						
			);	
		}		
		
		$message.="Data Telah di Updated";
	}
	else {
		$data = $wpdb->get_results("SELECT * FROM $table_name WHERE id = $id_trip");
		
		foreach ($data as $nt) {
			$id				= $nt->id;
			$parent_trip_id = $nt->parent_trip;
			$nama_trip		= $nt->nama_trip;
			$kode_trip		= $nt->kode_trip;
		}	
    }		
?>	

<div class="wrap">
    <h2>Edit Booking <span class="red-color"><?php echo $kode_booking; ?></span></h2>
	
	<?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
	<div style="width: 30%">
		<form class="form-booking" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			
			<input type="hidden" class="input-text regular-input" id="trip_id" name="trip_id" style="width: 100%" value="<?php echo $id_trip; ?>"
			>		
			
			<p class="post-attributes-label-wrapper">
				<label id="parentTrip" class="post-attributes-label">Parent Trip</label>
			</p>
			
			<select class="input-text regular-input" style="width: 100%" id="parentTrip" name="parent_trip">
				<?php
					global $wpdb;
					$table_name = $wpdb->prefix . "nt_parent_trip";
					
					$data = $wpdb->get_results("SELECT * from $table_name");
					foreach ($data as $pt) {
						$id = $pt->id;	
						$parent_trip = $pt->parent_trip;	
				?>		
					<option value="<?php echo $id; ?>" <?php if ( $id == $parent_trip_id ) { echo 'selected'; } ?>><?php echo $parent_trip; ?></option>
				<?php		
					}
				?>	
			</select>

			<p class="post-attributes-label-wrapper">
				<label id="kodeTrip" class="post-attributes-label">Kode Trip</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="kodeTrip" name="kode_trip" style="width: 100%"
				value="<?php echo $kode_trip; ?>" 			
			> 			
			
			<p class="post-attributes-label-wrapper">
				<label id="namaTrip" class="post-attributes-label">Nama Trip</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="namaTrip" name="nama_trip" style="width: 100%"
				value="<?php echo $nama_trip; ?>"
			> 
			
			<p class="post-attributes-label-wrapper">
				<label id="namaTrip" class="post-attributes-label">Harga Silver</label>
			</p>
			
			<table style="width: 100%">
				<thead>
					<tr>
						<th style="width: 20%">Peserta</th>
						<th style="width: 80%">Harga (Rp.)</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
					$j = 1;					
					
					for($i=1; $i <= 6; $i++){
				?>		
					<tr>
						<td>
							<input type="hidden" id="gradeTrip[<?php echo $i; ?>]" name="grade_trip_<?php echo $i; ?>" value="1">
							<input type="text" class="input-text regular-input" id="pesertaTrip[<?php echo $i; ?>]" name="peserta_trip_<?php echo $i; ?>" style="width: 100%" value="<?php echo $j; ?>" readonly						
							>
						</td>
						<td>
							<?php
								
								$data = $wpdb->get_results("SELECT * FROM $table_harga WHERE id_trip = $id_trip AND id_grade = 1 AND peserta = $j");
								
								foreach ($data as $nt) {
									$id_harga		= $nt->id;
									$harga			= $nt->harga;
								}	
							?>
							<input type="hidden" id="idHarga[<?php echo $i; ?>]" name="id_harga_<?php echo $i; ?>" value="<?php echo $id_harga; ?>">
							<input type="text" class="input-text regular-input" id="hargaTrip[<?php echo $i; ?>]" name="harga_trip_<?php echo $i; ?>" style="width: 100%"						
								value="<?php echo $harga; ?>"
							>
						</td>
					</tr>
				<?php
						$j++;
					}
				?>					
				</tbody>
			</table>

			<p class="post-attributes-label-wrapper">
				<label id="namaTrip" class="post-attributes-label">Harga Gold</label>
			</p>
			
			<table style="width: 100%">
				<thead>
					<tr>
						<th style="width: 20%">Peserta</th>
						<th style="width: 80%">Harga (Rp.)</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
					$j = 1;	
					
					for($i=7; $i <= 12; $i++){
				?>		
					<tr>
						<td>
							<input type="hidden" id="gradeTrip[<?php echo $i; ?>]" name="grade_trip_<?php echo $i; ?>" value="2">
							<input type="text" class="input-text regular-input" id="pesertaTrip[<?php echo $i; ?>]" name="peserta_trip_<?php echo $i; ?>" style="width: 100%" value="<?php echo $j; ?>" readonly					
							>
						</td>
						<td>
							<?php
								$data = $wpdb->get_results("SELECT * FROM $table_harga WHERE id_trip = $id_trip AND id_grade = 2 AND peserta = $j");
								
								foreach ($data as $nt) {
									$id_harga		= $nt->id;
									$harga			= $nt->harga;
								}	
							?>	
							<input type="hidden" id="idHarga[<?php echo $i; ?>]" name="id_harga_<?php echo $i; ?>" value="<?php echo $id_harga; ?>">
							<input type="text" class="input-text regular-input" id="hargaTrip[<?php echo $i; ?>]" name="harga_trip_<?php echo $i; ?>" style="width: 100%"
								value="<?php echo $harga; ?>"
							>
						</td>
					</tr>
				<?php
						$j++;
					}
				?>					
				</tbody>
			</table>	

			<p class="post-attributes-label-wrapper">
				<label id="namaTrip" class="post-attributes-label">Harga Premium</label>
			</p>
			
			<table style="width: 100%">
				<thead>
					<tr>
						<th style="width: 20%">Peserta</th>
						<th style="width: 80%">Harga (Rp.)</th>
					</tr>
				</thead>
				
				<tbody>
				<?php
					$j = 1;	
					
					for($i=13; $i <= 18; $i++){
				?>		
					<tr>
						<td>
							<input type="hidden" id="gradeTrip[<?php echo $i; ?>]" name="grade_trip_<?php echo $i; ?>" value="3">
							<input type="text" class="input-text regular-input" id="pesertaTrip[<?php echo $i; ?>]" name="peserta_trip_<?php echo $i; ?>" style="width: 100%" value="<?php echo $j; ?>" readonly						
							>
						</td>
						<td>
							<?php
								$data = $wpdb->get_results("SELECT * FROM $table_harga WHERE id_trip = $id_trip AND id_grade = 3 AND peserta = $j");
								
								foreach ($data as $nt) {
									$id_harga		= $nt->id;
									$harga			= $nt->harga;
								}	
							?>	
							<input type="hidden" id="idHarga[<?php echo $i; ?>]" name="id_harga_<?php echo $i; ?>" value="<?php echo $id_harga; ?>">
							<input type="text" class="input-text regular-input" id="hargaTrip[<?php echo $i; ?>]" name="harga_trip_<?php echo $i; ?>" style="width: 100%"					
								value="<?php echo $harga; ?>"
							>
						</td>
					</tr>
				<?php
						$j++;
					}
				?>					
				</tbody>
			</table>				
			
			<p class="submit">
				<input type="submit" name="update" class="button button-primary button-large" value="Update" />
			</p>
		</form>
	</div>		
</div>	