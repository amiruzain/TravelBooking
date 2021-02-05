<?php

	global $wpdb;
	
	//Insert Nama Trip	
	$table_name = $wpdb->prefix . "nt_nama_trip";		
	
	$parent_trip	= $_POST["parent_trip"];
	$nama_trip		= $_POST["nama_trip"];
	$kode_trip      = $_POST["kode_trip"];
	
	if (isset($_POST['insert_trip'])) {
		
		$wpdb->insert(
				$table_name, //table
				array(
					'id'			=> null, 
					'parent_trip' 	=> $parent_trip,
					'nama_trip'		=> $nama_trip,
					'kode_trip'     => $kode_trip
				), //data
				array(
					'%d', 
					'%d',
					'%s',
					'%s'
				) //data format			
		);
		
		$id_trip = $wpdb->insert_id;
		
		$table_name = $wpdb->prefix . "nt_harga_trip";
		
		for($i=1; $i <= 18; $i++){
			$peserta_trip	= $_POST["peserta_trip_". $i];
			$harga_trip		= $_POST["harga_trip_". $i];
			$grade_trip		= $_POST["grade_trip_". $i];
		
			$wpdb->insert(
					$table_name, //table
					array(
						'id'		=> null, 
						'id_trip' 	=> $id_trip,
						'id_grade'	=> $grade_trip,
						'peserta'	=> $peserta_trip,
						'harga'		=> $harga_trip
					), //data
					array(
						'%d', 
						'%d',
						'%d',
						'%d',
						'%d'
					) //data format			
			);	
		}		
		
		$message.="Data Telah di Tambahkan";
	}			
?>

<div class="wrap">
    <h2>Tambah Data Trip</h2>
	<!--h4>Cara Pembayaran</h4-->
	<?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
	<div style="width: 30%">
		<form class="form-booking" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			<p class="post-attributes-label-wrapper">
				<label id="parentTrip" class="post-attributes-label">Parent Trip</label>
			</p>
			
			<select class="input-text regular-input" style="width: 100%" id="parentTrip" name="parent_trip" data-mandatory="yes" data-error="Tidak boleh kosong">
				<option data-placeholder="yes" value="default" selected>-- Pilih Parent Trip --</option>
				<?php
					global $wpdb;
					$table_name = $wpdb->prefix . "nt_parent_trip";
					
					$data = $wpdb->get_results("SELECT * from $table_name");
					foreach ($data as $pt) {
						$id = $pt->id;	
						$parent_trip = $pt->parent_trip;	
				?>		
					<option value="<?php echo $id; ?>"><?php echo $parent_trip; ?></option>
				<?php		
					}
				?>	
			</select>

			<p class="post-attributes-label-wrapper">
				<label id="kodeTrip" class="post-attributes-label">Kode Trip</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="kodeTrip" name="kode_trip" style="width: 100%"
				data-mandatory="yes" 
				data-error="Tidak boleh kosong" 			
			> 			
			
			<p class="post-attributes-label-wrapper">
				<label id="namaTrip" class="post-attributes-label">Nama Trip</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="namaTrip" name="nama_trip" style="width: 100%"
				data-mandatory="yes" 
				data-error="Tidak boleh kosong" 			
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
							<input type="text" class="input-text regular-input" id="pesertaTrip[<?php echo $i; ?>]" name="peserta_trip_<?php echo $i; ?>" style="width: 100%" value="<?php echo $j++; ?>" readonly
								data-mandatory="yes" 
								data-error="Tidak boleh kosong" 							
							>
						</td>
						<td>
							<input type="text" class="input-text regular-input" id="hargaTrip[<?php echo $i; ?>]" name="harga_trip_<?php echo $i; ?>" style="width: 100%"
								data-mandatory="yes" 
								data-error="Tidak boleh kosong" 							

							>
						</td>
					</tr>
				<?php
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
							<input type="text" class="input-text regular-input" id="pesertaTrip[<?php echo $i; ?>]" name="peserta_trip_<?php echo $i; ?>" style="width: 100%" value="<?php echo $j++; ?>" readonly
								data-mandatory="yes" 
								data-error="Tidak boleh kosong" 							
							>
						</td>
						<td>
							<input type="text" class="input-text regular-input" id="hargaTrip[<?php echo $i; ?>]" name="harga_trip_<?php echo $i; ?>" style="width: 100%"
								data-mandatory="yes" 
								data-error="Tidak boleh kosong" 							

							>
						</td>
					</tr>
				<?php	
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
							<input type="text" class="input-text regular-input" id="pesertaTrip[<?php echo $i; ?>]" name="peserta_trip_<?php echo $i; ?>" style="width: 100%" value="<?php echo $j++; ?>" readonly
								data-mandatory="yes" 
								data-error="Tidak boleh kosong" 							
							>
						</td>
						<td>
							<input type="text" class="input-text regular-input" id="hargaTrip[<?php echo $i; ?>]" name="harga_trip_<?php echo $i; ?>" style="width: 100%"
								data-mandatory="yes" 
								data-error="Tidak boleh kosong" 							

							>
						</td>
					</tr>
				<?php	
					}
				?>					
				</tbody>
			</table>				
			
			<p class="submit">
				<input type="submit" name="insert_trip" class="button button-primary button-large" value="Tambah Data" />
			</p>
		</form>
	</div>	
</div>