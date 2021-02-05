<?php
	$id_booking = $_GET['id_booking'];
	
	global $wpdb;
	
	$table_name = $wpdb->prefix . "nt_booking_trip";
	$table_trip = $wpdb->prefix . "nt_nama_trip";
	$table_parent = $wpdb->prefix . "nt_parent_trip";
	
	$data = $wpdb->get_results("SELECT * FROM $table_name WHERE id = $id_booking");
	
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
	}

	$data = $wpdb->get_results("SELECT * FROM $table_trip WHERE id = $paket");
	
	foreach ($data as $nt) {
		$parent_trip	= $nt->parent_trip;
		$nama_trip		= $nt->nama_trip;
	}
	
	$data = $wpdb->get_results("SELECT * FROM $table_parent WHERE id = $parent_trip");
	foreach ($data as $pt) {
		$parent_trip	= $pt->parent_trip;
	}	
?>
<style>
.view-booking {
	font-size: 14px;
	margin-top: 20px;
}

.view-booking > tbody > tr > td:first-child {
	width: 15%;
	font-weight: bold;
	background-color: #eaeaea;
}

.view-booking > tbody > tr > td {
	border-bottom: 1px solid #cecece;
	padding: 10px 7px;
}

.view-booking > tbody > tr:hover > td {
	background-color: #ddd;
}

.head-td {
	font-weight: bold;
	text-align: center;
	background-color: #fff;
}

.red-color {
	color: red;
}

.green-color {
	color: green;
}

.text-right {
	text-align: right;
}

.text-center {
	text-align: center;
}

.text-total {
	font-weight: bold;
	font-size: 18px;
	color: green;
}

.text-tgltrip {
	font-weight: bold;
	font-size: 18px;
	color: red;
}

.white-bg {
	background-color: #fff;
}

.td-total {
	border-bottom: 4px solid #cecece !important;
}


.medal{
	display: block;	
}
.img-medal {
	width: 16px;
	margin: auto;	
}

.text-capitalize {
	text-transform: capitalize;
}
</style>
<div class="wrap">
    <h2>Booking <span class="red-color"><?php echo $kode_booking; ?></span></h2>
	<h4>at <span class="green-color"><?php echo $tanggal; ?></span></h4>
	
	<table class="display view-booking" width="100%" cellspacing="0">
		<tbody>
			<tr>
				<td>Kode Booking</td>
				<td>: <strong><?php echo $kode_booking; ?></strong></td>
			</tr>
			
			<tr>
				<td>Nama</td>
				<td class="text-capitalize">: <?php echo $nama; ?></td>
			</tr>
			
			<tr>
				<td>No. Identitas</td>
				<td>: <?php echo $noktp; ?></td>
			</tr>	

			<tr>
				<td>No. Telepon</td>
				<td>: <?php echo $phone; ?></td>
			</tr>	

			<tr>
				<td>Email</td>
				<td>: <?php echo $email; ?></td>
			</tr>
			
			<tr>
				<td>Alamat</td>
				<td>: <?php echo $alamat; ?></td>
			</tr>			

			<tr>
				<td>ID Instagram</td>
				<td>: <?php echo $instagram; ?></td>
			</tr>			
			
			<tr>
				<td>Nama Peserta Lain</td>
				<td class="text-capitalize">: <?php echo $pesertalain; ?></td>
			</tr>

			<tr>
				<td>Status</td>
				<td>: 
					<span class="text-total">
						<?php
							$id_status = $status;
							
							$table_status = $wpdb->prefix . "nt_status_trip";
							
							$data = $wpdb->get_results("SELECT status FROM $table_status WHERE id = $id_status");
							foreach ($data as $st) {
								$status = $st->status;
								
								echo $status;
							}	
						?>
					</span>	
				</td>
			</tr>			
			
			<tr>
				<td class="td-total">Tanggal Trip</td>
				<td class="td-total" colspan="5">: <span class="text-tgltrip"><?php $tanggaltrip = date_create($tanggaltrip); echo date_format($tanggaltrip, "d M Y"); ?></span></td>
			</tr>
			
			<tr>
				<td>Detail Trip</td>
				<td class="head-td">Paket</td>
				<td class="head-td">Grade</td>
				<td class="head-td">Price</td>
				<td class="head-td">Peserta</td>
				<td class="head-td">Sub Total (Rp)</td>
			</tr>

			<tr>
				<td></td>
				<td class="text-center">
					<strong><?php echo $nama_trip; ?></br>( <?php echo $parent_trip; ?> )</strong>
				</td>
				<td class="text-center">
					<?php
						if ( $grade == 1){
					?>		
						<div class="medal">
							<img class="img-medal" src="<?php echo plugin_dir_url(__FILE__). '../../img/medal.png';?>" alt="Silver" title="Silver">
						</div>
						
						<strong>SILVER</strong>
					<?php
						}
						
						else if ( $grade == 2 ){
					?>		
						<div class="medal">
							<img class="img-medal" src="<?php echo plugin_dir_url(__FILE__). '../../img/medal.png';?>" alt="Gold" title="Gold">
							<img class="img-medal" src="<?php echo plugin_dir_url(__FILE__). '../../img/medal.png';?>" alt="Gold" title="Gold">
						</div>					
						
						<strong>GOLD</strong>
					<?php
						}
						
						else if ( $grade == 3 ){
					?>
						<div class="medal">
							<img class="img-medal" src="<?php echo plugin_dir_url(__FILE__). '../../img/medal.png';?>" alt="Premium" title="Premium"> 
							<img class="img-medal" src="<?php echo plugin_dir_url(__FILE__). '../../img/medal.png';?>" alt="Premium" title="Premium">
							<img class="img-medal" src="<?php echo plugin_dir_url(__FILE__). '../../img/medal.png';?>" alt="Premium" title="Premium">
						</div>
						
						<strong>PREMIUM</strong>
					<?php	
						}
					?>
				</td>
				
				<td class="text-center">
					<?php
						$table_name = $wpdb->prefix . "nt_harga_trip";
						
						$data = $wpdb->get_results("SELECT * FROM $table_name WHERE id_trip = $paket AND id_grade = $grade AND peserta = $jmlpeserta");
						foreach ($data as $pst) {
							$harga = $pst->harga;
						}	
					?>
					
					Rp. <?php echo number_format($harga); ?>
				</td>
				
				<td class="text-right">
					<strong>Dewasa : <?php echo $pesertadewasa; ?></strong> Orang<hr>
					<strong>Anak : <?php echo $pesertaanak; ?></strong> Orang<hr>
					<strong>Total : <?php echo $jmlpeserta; ?></strong> Orang
				</td>
				<td class="text-right">
					Dewasa : <strong><?php echo number_format($totaldewasa); ?></strong><hr>
					Anak : <strong><?php echo number_format($totalanak); ?></strong><hr>
					-
				</td>
			</tr>

			<tr>
				<td class="td-total">Total (Rp)</td>
				<td class="td-total"></td>
				<td class="td-total"></td>
				<td class="td-total"></td>
				<td class="td-total"></td>
				<td class="text-right text-total td-total"><strong><?php echo number_format($total); ?></strong></td>
			</tr>		

			<tr>
				<td>Rencana Penjemputan</td>
				<td>: <?php echo $penjemputan; ?></td>
			</tr>			
			
			<tr>
				<td>Rencana Pengantaran</td>
				<td>: <?php echo $pengantaran; ?></td>
			</tr>	

			<tr>
				<td>Jam Tiba di Meeting Point</td>
				<td>: <?php echo $jamtiba; ?></td>
			</tr>			
			
			<tr>
				<td>Jam Pulang dari Meeting Point</td>
				<td>: <?php echo $jampulang; ?></td>
			</tr>			
		</tbody>	
	</table>
</div>	