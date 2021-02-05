<style>
.red-color{
	color: red;
}
</style>

<?php
	$id_booking = $_GET['id_booking'];
	
	global $wpdb;
	
	$table_name = $wpdb->prefix . "nt_booking_trip";
	
	$invoice		= $_POST["invoice"];
	$kode_booking   = $_POST["kode_booking"];
	$nama			= $_POST["nama"];
	$pesertalain	= $_POST["pesertalain"];
	$tanggaltrip	= $_POST["tanggaltrip"];
	$alamat			= $_POST["alamat"];
	$noktp			= $_POST["noktp"];
	
	$email			= $_POST["email"];
	$phone			= $_POST["phone"];
	$instagram		= $_POST["instagram"];
	$penjemputan	= $_POST["penjemputan"];
	$pengantaran	= $_POST["pengantaran"];

	$jamtiba		= $_POST["jamtiba"];
	$jampulang		= $_POST["jampulang"];
	$paket			= $_POST["paket"];
	$pesertadewasa	= $_POST["pesertadewasa"];
	$pesertaanak	= $_POST["pesertaanak"];
	$jmlpeserta		= $pesertadewasa + $pesertaanak;
	$grade			= $_POST["grade"];

	$status			= $_POST["status"];
	$subtotal		= $_POST["subtotal"];
	$totaldewasa	= $_POST["totaldewasa"];;
	$totalanak		= $_POST["totalanak"];			
	$total			= $_POST["total"];
	
	//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
                array(
                    'kode_booking'  => $kode_booking,
					'nama'			=> $nama,
					'pesertalain'	=> $pesertalain,
					'tanggaltrip'	=> $tanggaltrip,
					'alamat'		=> $alamat,
					'noktp'			=> $noktp,
					'email'			=> $email,
					'phone'			=> $phone,
					'instagram'		=> $instagram,
					'penjemputan'	=> $penjemputan,
					'pengantaran'	=> $pengantaran,
					'jamtiba'		=> $jamtiba,
					'jampulang'		=> $jampulang,
					'paket'			=> $paket,
					'pesertadewasa'	=> $pesertadewasa,
					'pesertaanak'	=> $pesertaanak,
					'jmlpeserta'	=> $jmlpeserta,
					'grade'			=> $grade,
					'status'		=> $status,
					'subtotal'		=> $subtotal,
					'totaldewasa'	=> $totaldewasa,
					'totalanak'		=> $totalanak,
					'total'			=> $total
				), //data
                array('ID' => $invoice), //where
                array(
                    '%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%d',
					'%d',
					'%d',
					'%d',
					'%d',
					'%d',
					'%d',
					'%d',
					'%d',
					'%d'
				), //data format
                array(
					'%d'
				) //where format
        );
		
		$message.="Booking Updated";
    }
	else {
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
    }
?>

<div class="wrap">
    <h2>Edit Booking <span class="red-color"><?php echo $kode_booking; ?></span></h2>
	
	<?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
	
	<div style="width: 30%">
		<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			<p class="post-attributes-label-wrapper">
				<label id="kodeBooking" class="post-attributes-label">Kode Booking</label>
			</p>
			
			<input type="hidden" class="input-text regular-input" id="invoice" name="invoice" style="width: 100%" value="<?php echo $id_booking; ?>"
			> 
			
			<input type="text" class="input-text regular-input" id="kodeBooking" name="kode_booking" style="width: 100%" value="<?php echo $kode_booking; ?>" readonly
			> 			
			
			<p class="post-attributes-label-wrapper">
				<label id="nama" class="post-attributes-label">Nama</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="nama" name="nama" style="width: 100%" value="<?php echo $nama; ?>"	
			> 	

			<p class="post-attributes-label-wrapper">
				<label id="noktp" class="post-attributes-label">No. Identitas</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="noktp" name="noktp" style="width: 100%" value="<?php echo $noktp; ?>"	
			> 

			<p class="post-attributes-label-wrapper">
				<label id="phone" class="post-attributes-label">No. Telepon</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="phone" name="phone" style="width: 100%" value="<?php echo $phone; ?>"	
			> 

			<p class="post-attributes-label-wrapper">
				<label id="email" class="post-attributes-label">Email</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="email" name="email" style="width: 100%" value="<?php echo $email; ?>"	
			> 	

			<p class="post-attributes-label-wrapper">
				<label id="alamat" class="post-attributes-label">Alamat</label>
			</p>
			
			<textarea id="alamat" name="alamat" style="height: 110px; max-height: 110px; min-height: 110px; width: 100%"	
			>
				<?php echo $alamat; ?>
			</textarea>
			
			<p class="post-attributes-label-wrapper">
				<label id="instagram" class="post-attributes-label">ID Instagram</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="instagram" name="instagram" style="width: 100%" value="<?php echo $instagram; ?>"	
			> 

			<p class="post-attributes-label-wrapper">
				<label id="pesertalain" class="post-attributes-label">Nama Peserta Lain</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="pesertalain" name="pesertalain" style="width: 100%" value="<?php echo $pesertalain; ?>"	
			> 
			
			<p class="post-attributes-label-wrapper">
				<label id="status" class="post-attributes-label">Status</label>
			</p>
			
			<select class="input-text regular-input" id="status" name="status" style="width: 100%;">
				<?php					
					$table_status = $wpdb->prefix . "nt_status_trip";
					
					$data = $wpdb->get_results("SELECT * FROM $table_status");
					foreach ($data as $st) {
						$id_status		= $st->id;
						$name_status	= $st->status;
				?>
					<option value="<?php echo $id_status; ?>" <?php if ( $id_status == $status) { echo 'selected'; } ?>><?php echo $name_status; ?></option>
				<?php
					}
				?>	
			</select>
			
			<p class="post-attributes-label-wrapper">
				<label id="tanggaltrip" class="post-attributes-label">Tanggal Trip</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="tanggaltrip" name="tanggaltrip" style="width: 100%" value="<?php echo $tanggaltrip; ?>"	
			>
			
			<p class="post-attributes-label-wrapper">
				<label id="paket" class="post-attributes-label">Paket</label>
			</p>
			
			<select class="input-text regular-input" id="paket" name="paket" style="width: 100%;">
				<?php
					$table_trip = $wpdb->prefix . "nt_nama_trip";
					
					$data = $wpdb->get_results("SELECT * FROM $table_trip ORDER BY nama_trip");
					
					foreach ($data as $nt) {
						$id_trip	= $nt->id;
						$nama_trip	= $nt->nama_trip;
				?>			
					<option value="<?php echo $id_trip; ?>" <?php if ( $id_trip == $paket) { echo 'selected'; } ?>><?php echo $nama_trip; ?></option>
				<?php
					}
				?>
			</select>
			
			<p class="post-attributes-label-wrapper">
				<label id="grade" class="post-attributes-label">Grade</label>
			</p>
			
			<select class="input-text regular-input" id="grade" name="grade" style="width: 100%;">
				<option value="1" <?php if ( $grade == 1) { echo 'selected'; } ?>>Silver</option>
				<option value="2" <?php if ( $grade == 2) { echo 'selected'; } ?>>Gold</option>
				<option value="3" <?php if ( $grade == 3) { echo 'selected'; } ?>>Premium</option>
			</select>
			
			<p class="post-attributes-label-wrapper">
				<label id="pesertadewasa" class="post-attributes-label">Peserta Dewasa</label>
			</p>
			
			<input type="number" class="input-text regular-input" id="pesertadewasa" name="pesertadewasa" style="width: 100%" value="<?php echo $pesertadewasa; ?>" min="1" max="100"
			>
			
			<p class="post-attributes-label-wrapper">
				<label id="pesertaanak" class="post-attributes-label">Peserta Anak</label>
			</p>
			
			<input type="number" class="input-text regular-input" id="pesertaanak" name="pesertaanak" style="width: 100%" value="<?php echo $pesertaanak; ?>" min="1" max="100"
			>			
			
			<p class="post-attributes-label-wrapper">
				<label id="totaldewasa" class="post-attributes-label">Total Dewasa (Rp)</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="totaldewasa" name="totaldewasa" style="width: 100%" value="<?php echo $totaldewasa; ?>"	
			>	
			
			<p class="post-attributes-label-wrapper">
				<label id="totalanak" class="post-attributes-label">Total Anak (Rp)</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="totalanak" name="totalanak" style="width: 100%" value="<?php echo $totalanak; ?>"	
			>				
			
			<p class="post-attributes-label-wrapper">
				<label id="total" class="post-attributes-label">Total (Rp)</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="total" name="total" style="width: 100%" value="<?php echo $total; ?>"	
			>			
			
			<p class="post-attributes-label-wrapper">
				<label id="penjemputan" class="post-attributes-label">Rencana Penjemputan</label>
			</p>
			
			<textarea id="penjemputan" name="penjemputan" style="height: 110px; max-height: 110px; min-height: 110px; width: 100%"	
			>
				<?php echo $penjemputan; ?>
			</textarea>
			
			<p class="post-attributes-label-wrapper">
				<label id="pengantaran" class="post-attributes-label">Rencana Pengantaran</label>
			</p>
			
			<textarea id="pengantaran" name="pengantaran" style="height: 110px; max-height: 110px; min-height: 110px; width: 100%"	
			>
				<?php echo $pengantaran; ?>
			</textarea>
			
			<p class="post-attributes-label-wrapper">
				<label id="jamtiba" class="post-attributes-label">Jam Tiba di Meeting Point</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="jamtiba" name="jamtiba" style="width: 100%" value="<?php echo $jamtiba; ?>"	
			>

			<p class="post-attributes-label-wrapper">
				<label id="jampulang" class="post-attributes-label">Jam Pulang dari Meeting Point</label>
			</p>
			
			<input type="text" class="input-text regular-input" id="jampulang" name="jampulang" style="width: 100%" value="<?php echo $jampulang; ?>"	
			> 

			<p class="submit">
				<input type="submit" name="update" class="button button-primary button-large" value="Update" />
			</p>			
		</form>
	</div>	
</div>	