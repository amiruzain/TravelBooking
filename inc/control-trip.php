<?php

	global $wpdb;

	if(@$_GET['action']== 'delete'){
		$table_name = $wpdb->prefix . "nt_nama_trip";
		$table_harga = $wpdb->prefix . "nt_harga_trip";
		
		$id_trip = $_GET['id_trip'];
		
		$wpdb->delete( 
				$table_name, 
				array( 
					'ID' => $id_trip
				), 
				array( 
					'%d' 
				) 
		);
		
		$wpdb->delete( 
				$table_harga, 
				array( 
					'id_trip' => $id_trip
				), 
				array( 
					'%d' 
				) 
		);		
		
		$message.="Data Telah di Hapus";
	}
	
	if(@$_GET['action']== 'update'){
		include "part/edit-trip.php";
	} else {	
	
?>

<div class="wrap">
    <h2>Data Trip</h2>
	<?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
	
	<table id="data-main" class="display" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>ID</th>
				<th>Parent Trip</th>
				<th>Kode Trip</th>
				<th>Nama Trip</th>
				<th style="background: #dff0d8;">Harga Silver</th>
				<th style="background: #fcf8e3;">Harga Gold</th>
				<th style="background: #f2dede;">Harga Premium</th>
				<th style="width: 64px">Edit</th>
				<th style="width: 64px">Del</th>
			</tr>
		<thead>
		
		<tbody>
			<?php
				global $wpdb;
				$table_name = $wpdb->prefix . "nt_nama_trip";
				$table_parent = $wpdb->prefix . "nt_parent_trip";
				
				$data = $wpdb->get_results("SELECT namaTrip.id, namaTrip.parent_trip, namaTrip.nama_trip, namaTrip.kode_trip, parentTrip.parent_trip 
											FROM $table_name AS namaTrip INNER JOIN $table_parent AS parentTrip 
											ON namaTrip.parent_trip = parentTrip.id ORDER BY id DESC");
				foreach ($data as $nt) {
					$id_trip = $nt->id;	
					$parent_trip = $nt ->parent_trip;
					$nama_trip = $nt->nama_trip;
					$kode_trip = $nt->kode_trip;
			?>			
				<tr>
					<td style="text-align: center;"><?php echo $id_trip; ?></td>
					<td><strong><?php echo $parent_trip; ?></strong></td>
					<td><strong><?php echo $kode_trip; ?></strong></td>
					<td><strong><?php echo $nama_trip; ?></strong></td>
					<td style="background: #dff0d8;">
						<?php
							$table_name = $wpdb->prefix . "nt_harga_trip";
							
							$data = $wpdb->get_results("SELECT peserta, harga FROM $table_name WHERE id_trip = $id_trip AND id_grade = 1");
							foreach ($data as $pst) {
								$peserta = $pst->peserta;	
								$harga = $pst->harga;	
						?>	
							<span style="float: left;"><?php echo $peserta; ?> ... </span> 
							<span style="float: right;"> Rp. <?php echo number_format($harga); ?></span></br><hr style="border-bottom: 1px solid #000;">
						<?php		
							}
						?>				
					</td>
					<td style="background: #fcf8e3;">
						<?php
							$table_name = $wpdb->prefix . "nt_harga_trip";
							
							$data = $wpdb->get_results("SELECT peserta, harga FROM $table_name WHERE id_trip = $id_trip AND id_grade = 2");
							foreach ($data as $pst) {
								$peserta = $pst->peserta;	
								$harga = $pst->harga;	
						?>	
							<span style="float: left;"><?php echo $peserta; ?> ... </span> 
							<span style="float: right;"> Rp. <?php echo number_format($harga); ?></span></br><hr style="border-bottom: 1px solid #000;">
						<?php		
							}
						?>				
					</td>					
					<td style="background: #f2dede;">
						<?php
							$table_name = $wpdb->prefix . "nt_harga_trip";
							
							$data = $wpdb->get_results("SELECT peserta, harga FROM $table_name WHERE id_trip = $id_trip  AND id_grade = 3");
							foreach ($data as $pst) {
								$peserta = $pst->peserta;	
								$harga = $pst->harga;	
						?>	
							<span style="float: left;"><?php echo $peserta; ?> ... </span> 
							<span style="float: right;"> Rp. <?php echo number_format($harga); ?></span></br><hr style="border-bottom: 1px solid #000;">
						<?php		
							}
						?>				
					</td>					
					<td style="text-align: center;">
						<a href="<?php echo $_SERVER['REQUEST_URI']; ?>&action=update&id_trip=<?php echo $id_trip;?>">
							<img width="26px" src="<?php echo plugin_dir_url(__FILE__). '../img/edit.png';?>" alt="Edit" title="Edit">
						</a>
					</td>
					<td style="text-align: center;">
						<a href="<?php echo $_SERVER['REQUEST_URI']; ?>&action=delete&id_trip=<?php echo $id_trip;?>" onClick="return confirm('Anda yakin ?');">
							<img width="26px" src="<?php echo plugin_dir_url(__FILE__). '../img/del.png';?>" alt="Delete" title="Delete">
						</a>
					</td>
				</tr>
			<?php		
				}
			?>				
		</tbody>
	</table>
</div>
<?php
	}
?>