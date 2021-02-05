<?php

	global $wpdb;

	if(@$_GET['action']== 'delete'){
		$table_name = $wpdb->prefix . "nt_booking_trip";
		
		$id_booking = $_GET['id_booking'];
		
		$wpdb->delete( 
				$table_name, 
				array( 
					'ID' => $id_booking
				), 
				array( 
					'%d' 
				) 
		);
		
		$message.="Data Telah di Hapus";
	}
	
	if(@$_GET['action']== 'update'){
		include "part/edit-booking.php";
	}	
	
	else if(@$_GET['action']== 'view'){
		include "part/view-booking.php";
	} else {
	
?>

<div class="wrap">
    <h2>Data Booking</h2>
	<?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
	
	<?php
		$table_name = $wpdb->prefix . "nt_booking_trip";
		
		$data = $wpdb->get_results("SELECT COUNT(id) AS total_onhold FROM $table_name WHERE status = 1");
		foreach ($data as $oh) {
			$on_hold = $oh->total_onhold; 
		}

		$data = $wpdb->get_results("SELECT COUNT(id) AS total_dibayar FROM $table_name WHERE status = 2");
		foreach ($data as $db) {
			$di_bayar = $db->total_dibayar; 
		}

		$data = $wpdb->get_results("SELECT COUNT(id) AS total_oncancel FROM $table_name WHERE status = 3");
		foreach ($data as $oc) {
			$on_cancel = $oc->total_oncancel;
		}

		$data = $wpdb->get_results("SELECT SUM(total) AS total_income FROM $table_name WHERE status = 2");
		foreach ($data as $ti) {
			$total_income = $ti->total_income;
		}		
	?>
	
	<h3>
		On Hold : <span style="color: orange"><?php echo number_format($on_hold); ?></span> Booking | 
		Di Bayar : <span style="color: green"><?php echo number_format($di_bayar); ?></span> Booking | 
		Cancelled : <span style="color: red"><?php echo number_format($on_cancel); ?></span> Booking | 
		Total : Rp. <?php echo number_format($total_income); ?> 
	</h3>
	<table id="data-main" class="display" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Booking</th>
				<th>Tanggal</th>
				<th>Nama</th>
				<th>Paket</th>
				<th>Tanggal Trip</th>
				<th>Peserta</th>
				<th>Subtotal</br>(Rp)</th>
				<th>Total</br>(Rp)</th>
				<th>Status</th>
				<th style="width: 64px">Edit</th>
				<th style="width: 64px">Del</th>
			</tr>
		<thead>
		
		<tbody>
			<?php
				global $wpdb;
				$table_name = $wpdb->prefix . "nt_booking_trip";
				$i = 1;
				
				$data = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC");
				foreach ($data as $bt) {
					$id				= $bt->id;
					$kode_booking   = $bt->kode_booking;
					$nama			= $bt->nama;
					$pesertalain	= $bt->pesertalain;
					$tanggaltrip	= $bt->tanggaltrip;
					$alamat			= $bt->alamat;
					$noktp			= $bt->noktp;
					
					$email			= $bt->email;
					$phone			= $bt->phone;
					$instagram		= $bt->instagram;
					$penjemputan	= $bt->penjemputan;
					$pengantaran	= $bt->pengantaran;

					$jamtiba		= $bt->jamtiba;
					$jampulang		= $bt->jampulang;
					$paket			= $bt->paket;
					$pesertadewasa	= $bt->pesertadewasa;
					$pesertaanak	= $bt->pesertaanak;
					$jmlpeserta		= $bt->jmlpeserta;
					$grade			= $bt->grade;
					
					$status			= $bt->status;
					$subtotal		= $bt->subtotal;
					$totaldewasa	= $bt->totaldewasa;
					$totalanak		= $bt->totalanak;
					$total			= $bt->total;					
					$tanggal		= $bt->tanggal;
			?>			
				<tr>
					<td style="text-align: center"><?php echo $i++; ?></td>
					<td><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&action=view&id_booking=<?php echo $id;?>" title="View Booking"><strong><?php echo $kode_booking; ?></strong></a></td>
					<td><?php echo $tanggal; ?></td>
					<td><?php echo $nama; ?></td>
					<td>
						<?php
							$table_name = $wpdb->prefix . "nt_nama_trip";
							$table_parent = $wpdb->prefix . "nt_parent_trip";
							
							if ( $grade == 1 ){
								$grades = "Silver";
							} 
							
							else if ( $grade == 2 ){
								$grades = "Gold";
							}
							
							else if ( $grade == 3 ){
								$grades = "Premium";
							}
							
							$data = $wpdb->get_results("SELECT * FROM $table_name WHERE id = $paket");
							foreach ($data as $nt) {
								$parent_trip	= $nt->parent_trip;
								$nama_trip		= $nt->nama_trip;
							}

							$data = $wpdb->get_results("SELECT * FROM $table_parent WHERE id = $parent_trip");
							foreach ($data as $pt) {
								$parent_trip	= $pt->parent_trip;
								
								echo $nama_trip. "</br>- " .$parent_trip. "</br>- " .$grades. "";
							}							
						?>
					</td>
					<td>
						<?php 
							$tanggaltrip = date_create($tanggaltrip);
							
							echo date_format($tanggaltrip, "d M Y"); 
						?>
					</td>
					<td style="text-align: right">
						<strong>Dewasa : <?php echo $pesertadewasa; ?></strong> Orang</br>
						<strong>Anak : <?php echo $pesertaanak; ?></strong> Orang</br>
						<strong>Total : <?php echo $jmlpeserta; ?></strong> Orang
					</td>
					<td style="text-align: right">
						Dewasa : <?php echo number_format($totaldewasa); ?></br>
						Anak : <?php echo number_format($totalanak); ?>
					</td>
					<td style="text-align: right"><?php echo number_format($total); ?></td>
					<td>
						<?php
							$id_status = $status;
							
							$table_status = $wpdb->prefix . "nt_status_trip";
							
							$data = $wpdb->get_results("SELECT status FROM $table_status WHERE id = $id_status");
							foreach ($data as $st) {
								$status = $st->status;
								
								echo $status;
							}	
						?>					
					</td>
					
					<td style="text-align: center;">
						<a href="<?php echo $_SERVER['REQUEST_URI']; ?>&action=update&id_booking=<?php echo $id;?>">
							<img width="26px" src="<?php echo plugin_dir_url(__FILE__). '../img/edit.png';?>" alt="Edit" title="Edit">
						</a>
					</td>
					
					<td style="text-align: center;">
						<a href="<?php echo $_SERVER['REQUEST_URI']; ?>&action=delete&id_booking=<?php echo $id;?>" onClick="return confirm('Anda yakin ?');">
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