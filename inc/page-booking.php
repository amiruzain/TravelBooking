<?php

get_header(); ?>

<?php

	date_default_timezone_set('Asia/Jakarta');
	
	global $wpdb;
	
	//Insert Nama Trip	
	$table_name = $wpdb->prefix . "nt_booking_trip";		
	
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
	
	$status			= 1;
	$tanggal		= date("Y-m-d H:i:s");

	$table_harga	= $wpdb->prefix . "nt_harga_trip";
	$table_nama_trip	= $wpdb->prefix . "nt_nama_trip";
	
	$data = $wpdb->get_results("SELECT * FROM $table_harga
								WHERE id_trip = $paket AND id_grade = $grade AND peserta = $jmlpeserta");
	foreach ($data as $ht) {
		$harga	= $ht->harga;
	}
	
	$data = $wpdb->get_results("SELECT * FROM $table_nama_trip WHERE id = $paket");
	foreach ($data as $kb) {
		$kode_trip		= $kb->kode_trip;
	}	
	
	$harga_anak		= 0.8 * $harga;
	$subtotal		= $harga;
	
	$total_dewasa	= $pesertadewasa * $harga;
	$total_anak		= $pesertaanak * $harga_anak;
	$total			= $total_dewasa + $total_anak;
	
	//$kode_booking   = rand(10000, 99999);
	$kode_tgl       = date("ymd", strtotime($tanggaltrip));;
	$kode_booking   = "1800JMW - ".$kode_trip."".$kode_tgl."0".$jmlpeserta;
	
	if (isset($_POST['booking'])) {
		
		$wpdb->insert(
				$table_name, //table
				array(
					'id'			=> null, 
					'nama'			=> $nama,
					'kode_booking'  => $kode_booking,
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
					'totaldewasa'	=> $total_dewasa,
					'totalanak'		=> $total_anak,
					'total'			=> $total,
					'tanggal'		=> $tanggal
				), //data
				array(
					'%d', 
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
					'%d',
					'%s'
				) //data format			
		);	
		
		$table_setting		= $wpdb->prefix . "nt_setting_trip";
		$table_nama_trip	= $wpdb->prefix . "nt_nama_trip";
		$table_parent		= $wpdb->prefix . "nt_parent_trip";
		
		$data = $wpdb->get_results("SELECT email, typage FROM $table_setting
									WHERE id = 1");
		foreach ($data as $ts) {
			$our_email	= $ts->email;
			$typage		= $ts->typage;
		}
		
		if ( $grade == 1 ){
			$grades = "SILVER";
		} 
		
		else if ( $grade == 2 ){
			$grades = "GOLD";
		}
		
		else if ( $grade == 3 ){
			$grades = "PREMIUM";
		}
		
		$data = $wpdb->get_results("SELECT * FROM $table_nama_trip WHERE id = $paket");
		foreach ($data as $nt) {
			$parent_trip	= $nt->parent_trip;
			$nama_trip		= $nt->nama_trip;
		}

		$data = $wpdb->get_results("SELECT * FROM $table_parent WHERE id = $parent_trip");
		foreach ($data as $pt) {
			$parent_trip	= $pt->parent_trip;
		}
		
		$kode_booking   = $kode_booking;
		$recipient		= $email;
		$customer_name	= $nama;
		$customer_address	= $alamat;
		$customer_phone	= $phone;
		$customer_email	= $email;
		$tanggal_trip	= date_create($tanggaltrip);
		$tanggal_trip	= date_format($tanggal_trip, "d M Y");
		$total_dp		= 0.4 * $total;
		$ex_tanggal 	= explode(" ", $tanggal);
		$d_tanggal		= $ex_tanggal[0];
		$d_tanggal		= date('d M Y', strtotime($d_tanggal .' +2 day'));
		//$d_tanggal		= strtotime("+1 day", $d_tanggal);
		//$d_tanggal		= date_create($d_tanggal);
		//$d_tanggal		= date($d_tanggal, "d M Y");
		
		$head_subject	= "[JagadTour.com]";
		$nama_trip		= $nama_trip;
		$parent_trip	= $parent_trip;
		$grades			= $grades;
		$sitename		= $nama_trip. " - " .$parent_trip. " - " .$grades;
		$page_name 		= "JagadTour.com";
		$our_email		= $our_email;
		$title_home		= "Booking lagi di JagadTour.com ...";
		$url_home		= "http://jagadtour.com/booking-trip";
		$header_logo	= "<img width='80' src='http://jagadtour.com/wp-content/uploads/2017/01/JAGAD-TOUR-copy.png'";
		$alamat_jemput  = $penjemputan;
		$alamat_antar   = $pengantaran;
		
		$email_ready_to_send = 'activated';
		
		include "part/template_email.php";
		
		echo "<script>document.location.href='$typage';</script>";
		
		//$final_url = "https://developer.wordpress.org/reference/functions/wp_redirect/";
		//wp_redirect( $final_url ); 
	}			
?>
<!-- Start Code -->
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="col-md-12 title-detail-booking">
				<h3>Informasi Detail Anda</h3>
			</div>
			
			<form class="form-booking f1" id="formBooking" method="post" action="">
				<div class="f1-steps col-md-12">
					<div class="f1-progress">
						<div class="f1-progress-line" data-now-value="50" data-number-of-steps="2" style="width: 50%;"></div>
					</div>
					
					<div class="f1-step active">
						<div class="f1-step-icon"><i class="fa fa-globe"></i></div>
						<p>Pilih Trip</p>
					</div>
					
					<div class="f1-step">
						<div class="f1-step-icon"><i class="fa fa-user"></i></div>
						<p>Isi Biodata</p>
					</div>
				</div>
				
				<fieldset class="col-md-12">
					<div class="row">						
						<div class="form-group col-md-12">
							<label for="paket">Paket Trip <abbr>*</abbr></label>
							<select class="form-control" id="paket" name="paket" onChange="getPrice(); " onFocus="getHidden(); ">
								<option id="hiddenID" value="default" disabled <?php $selected = $_GET["trip"]; if ( $selected == null ) { echo "selected"; } ?>>--- Pilih Paket Trip ---</option>
								<?php
									global $wpdb;
									$table_name = $wpdb->prefix . "nt_parent_trip";
									
									$data = $wpdb->get_results("SELECT * from $table_name");
									foreach ($data as $pt) {
										$id				= $pt->id;	
										$parent_trip	= $pt->parent_trip;	
								?>							
								<option value="default" disabled><strong>-- <?php echo strtoupper( $parent_trip ); ?> --</strong></option>
								<?php
									global $wpdb;
									$table_name = $wpdb->prefix . "nt_nama_trip";
									
									$data = $wpdb->get_results("SELECT * from $table_name WHERE parent_trip =" .$id);
									foreach ($data as $nt) {
										$id = $nt->id;	
										$nama_trip = $nt->nama_trip;	
								?>								
								<option value="<?php echo $id; ?>" <?php $selected = $_GET["trip"]; if ( $id == $selected ) { echo "selected"; } ?>><?php echo $nama_trip; ?></option>
								<?php		
									}
								}	
								?>
							</select>
						</div>
						
						<div class="form-group col-md-12">
							<label for="pesertadewasa">Peserta Dewasa<abbr>*</abbr></label>
							<input type="number" class="form-control" onChange="getPrice();" onKeyup="getPrice();" id="pesertadewasa" min="1" max="100" name="pesertadewasa" value="1"
								data-mandatory="yes" 
								data-error="Tidak boleh kosong" 	
							>
						</div>	
						
						<div class="form-group col-md-12">
							<label for="pesertaanak">Peserta Anak<abbr>*</abbr></label>
							<input type="number" class="form-control" onChange="getPrice();" onKeyup="getPrice();" id="pesertaanak" min="0" max="100" name="pesertaanak" value="0"
								data-mandatory="yes" 
								data-error="Tidak boleh kosong" 	
							>
						</div>							
						
						<div class="form-group col-md-12">							
							<div class="room-grade text-center">
								<h4>Pilih Grade Trip <abbr>*</abbr></h4>
								
								<label class="radio-inline grade grade-silver">
									<span class="star">
										<i class="fa fa-star"></i>
									</span>
									<input type="radio" onChange="getPrice();" name="grade" id="gradeTrip" value="1" checked> Silver
								</label>

								<label class="radio-inline grade grade-gold">
									<span class="star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</span>
									<input type="radio" onChange="getPrice();" name="grade" id="gradeTrip" value="2"> Gold
								</label>

								<label class="radio-inline grade grade-premium">
									<span class="star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</span>								
									<input type="radio" onChange="getPrice();" name="grade" id="gradeTrip" value="3"> Premium 
								</label>								
							</div>
						</div>
						
						<div class="form-group f1-buttons col-md-12">
							<button type="button" class="btn btn-next">Next</button>
						</div>										
					</div>	
				</fieldset>
				
				<fieldset class="col-md-12">
					<div class="row">
						<div class="form-group col-md-12">
							<label for="nama">Nama (Nama Koordinator & Usia) <abbr>*</abbr></label>
							<input type="text" class="form-control" id="nama" placeholder="Nama (Nama Koordinator & Usia)" name="nama"
								data-mandatory="yes" 
								data-error="Tidak boleh kosong" 
								data-min-char="5"
								data-error-min="Minimum 5 karakter"				
							>
						</div>
												
						<div class="form-group col-md-12">
							<label for="pesertalain">Nama peserta lain & Usia <abbr>*</abbr></label>
							<input type="text" class="form-control" id="pesertalain" placeholder="Nama Peserta (Usia)" name="pesertalain"
								data-mandatory="yes" 
								data-error="Tidak boleh kosong" 
								data-min-char="5"
								data-error-min="Minimum 5 karakter"				
							>
						</div>
						
						<div class="form-group col-md-12">
							<label for="dateTrip">Tanggal Trip <abbr>*</abbr></label>
							<input type="text" class="form-control" id="dateTrip" placeholder="Tanggal Trip" name="tanggaltrip" readonly
								data-mandatory="yes" 
								data-error="Tidak boleh kosong"							
							>
						</div>
						
						<div class="form-group col-md-12">
							<label for="alamat">Alamat <abbr>*</abbr></label>
							<textarea class="form-control" rows="3" id="alamat" name="alamat"
								data-mandatory="yes" 
								data-error="Tidak boleh kosong"					
							></textarea>
						</div>
						
						<div class="form-group col-md-12">
							<label for="noktp">No. Identitas (KTP/SIM) <abbr>*</abbr></label>
							<input type="text" class="form-control" id="noktp" placeholder="No. Identitas (KTP/SIM)" name="noktp"
								data-mandatory="yes"
								data-error="Telepon harus diisi"
								data-min-char="6"
								data-error-min="Isi minimum 6 angka"
								data-allowed-char="0123456789-()"
								data-error-allowed="Hanya boleh angka, -, dan tanda kurung"					
							>
						</div>	
						
						<div class="form-group col-md-12">
							<label for="email">Email <abbr>*</abbr></label>
							<input type="text" class="form-control" id="email" placeholder="Email" name="email"
								data-mandatory="yes"
								data-error="Email harus diisi"
								data-is-email="yes"
								data-error-email="Isi dengan format email yang benar"						
							>
						</div>
						
						<div class="form-group col-md-12">
							<label for="phone">No. Telepon <abbr>*</abbr></label>
							<input type="text" class="form-control" id="phone" placeholder="No. Telepon" name="phone"
								data-mandatory="yes"
								data-error="Telepon harus diisi"
								data-min-char="6"
								data-error-min="Isi minimum 6 angka"
								data-max-char="30"
								data-error-max="Isi maksimum 30 angka"
								data-allowed-char="0123456789-()"
								data-error-allowed="Hanya boleh angka, -, dan tanda kurung"					
							>
						</div>
						
						<div class="form-group col-md-12">
							<label for="instagram">ID Instagram <abbr>*</abbr></label>
							<input type="text" class="form-control" id="instagram" placeholder="ID Instagram" name="instagram"
								data-mandatory="yes" 
								data-error="Tidak boleh kosong" 
								data-min-char="3"
								data-error-min="Minimum 3 karakter"				
							>
						</div>
						
						<div class="form-group col-md-12">
							<label for="penjemputan">Rencana Penjemputan <abbr>*</abbr></label>
							<textarea class="form-control" rows="3" id="penjemputan" name="penjemputan"
								data-mandatory="yes" 
								data-error="Tidak boleh kosong"					
							></textarea>
						</div>

						<div class="form-group col-md-12">
							<label for="pengantaran">Rencana Pengantaran <abbr>*</abbr></label>
							<textarea class="form-control" rows="3" id="pengantaran" name="pengantaran"
								data-mandatory="yes" 
								data-error="Tidak boleh kosong"					
							></textarea>
						</div>

						<div class="form-group col-md-6">
							<label for="jamTiba">Jam Tiba di Meeting Point <abbr>*</abbr></label>
							<input type="text" class="form-control" id="jamTiba" placeholder="Jam Tiba di Meeting Point" name="jamtiba" readonly
								data-mandatory="yes" 
								data-error="Tidak boleh kosong"							
							>
						</div>

						<div class="form-group col-md-6">
							<label for="jamPulang">Jam Pulang dari Meeting Point <abbr>*</abbr></label>
							<input type="text" class="form-control" id="jamPulang" placeholder="Jam Pulang dari Meeting Point" name="jampulang" readonly
								data-mandatory="yes" 
								data-error="Tidak boleh kosong"							
							>
						</div>					
						
						<div class="form-group f1-buttons col-md-12">
							<button type="button" class="btn btn-previous">Previous</button>
							<button type="submit" name="booking" class="btn btn-warning btn-booking">Booking Sekarang</button>
						</div>	
					</div>
				</fieldset>	
			</form>	
		</div>
		
		<script>
			function getHidden() {
				$('#hiddenID').attr("hidden","hidden");
			}
			
			function getPrice(){
				pluginURL		=  "<?php echo plugins_url('/booking-trip-nt/inc/part/name-trip.php'); ?>";
				
				paket			= $('#paket').val();
				
				pesertaDewasa	= $('#pesertadewasa').val();
				
				pesertaAnak		= $('#pesertaanak').val(); 
				
				grade = document.getElementsByName("grade");
			
				for(hasil in grade)
				{
					if(grade[hasil].checked)
					{
						//alert(grade[hasil].value);  // got the element which is checked        
						gradeTrip = grade[hasil].value;
					}
				}	
				
				
				$('.booking-order').empty();

				$('.booking-order').append('<div class="loader-wrap text-center"><img class="loader" src="<?php echo plugins_url('/booking-trip-nt/'); ?>img/loader.gif">Loading ...</div>');

				$.get(pluginURL+"?paket="+paket+"&pesertadewasa="+pesertaDewasa+"&pesertaanak="+pesertaAnak+"&grade="+gradeTrip, {}, function(nilbal) {

					$('.booking-order').empty();

					$('.booking-order').html(nilbal);

				});
			}	
		</script>
		
		<div class="col-md-6">
			<div class="title-detail-booking">
				<h3>Booking Anda</h3>
			</div>
			
			<?php
				$paket	= $_GET['trip'];

				if ( $paket == null ){
			?>
			
			<div class="booking-order">
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
								<span id="namaTrip"><i>Silahkan Pilih Trip</i></span>
							</td>
							
							<td class="product-total">
								Rp 0						
							</td>
						</tr>
					</tbody>
					
					<tfoot>
						<tr class="cart-subtotal">
							<th>Grade</th>
							<td>-</td>
						</tr>

						<tr class="cart-subtotal">
							<th>Peserta Dewasa</th>
							<td>0</td>
						</tr>

						<tr class="cart-subtotal">
							<th>Peserta Anak</th>
							<td>0</td>
						</tr>						
						
						<tr class="cart-subtotal">
							<th>Total Peserta</th>
							<td>0</td>
						</tr>
						
						<tr class="cart-subtotal">
							<th>Subtotal</th>
							<td>Rp 0</td>
						</tr>

						<tr class="order-total">
							<th>Total</th>
							<td><strong>Rp 0</strong></td>
						</tr>
					</tfoot>
				</table>
			</div>			
			
			<?php
				} else {
			?>
			<div class="booking-order">
				<?php
					
					$table_name		= $wpdb->prefix . "nt_nama_trip";
					$table_harga	= $wpdb->prefix . "nt_harga_trip";
					
					$paket			= $_GET['trip'];
					$grade			= 1;
					
					$data = $wpdb->get_results("SELECT namaTrip.nama_trip, namaTrip.id, hargaTrip.id_trip, hargaTrip.id_grade, hargaTrip.harga, hargaTrip.peserta 
												FROM $table_name AS namaTrip INNER JOIN $table_harga AS hargaTrip 
												ON namaTrip.id = hargaTrip.id_trip 
												WHERE namaTrip.id = $paket AND hargaTrip.peserta = 1 AND hargaTrip.id_grade = 1");
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
								Rp <?php echo number_format($harga_trip); ?>						
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
							<td>1 Orang X Rp <?php echo number_format($harga_trip); ?></td>
						</tr>

						<tr class="cart-subtotal">
							<th>Peserta Anak</th>
							<td>Tidak Ada</td>
						</tr>						
						
						<tr class="cart-subtotal">
							<th>Total Peserta</th>
							<td>1 Orang</td>
						</tr>
						
						<tr class="cart-subtotal">
							<th>Subtotal</th>
							<td>
								Dewasa : Rp <?php echo number_format($harga_trip); ?> </br>					
								Anak : Rp 0							
							</td>
						</tr>

						<tr class="order-total">
							<th>Total</th>
							<td><strong>Rp <?php echo number_format($harga_trip); ?></strong></td>
						</tr>
					</tfoot>
				</table>
				<?php
					}
				?>				
			</div>
			<?php
				}
			?>
			
			<?php
				global $wpdb;
				
				$table_name		= $wpdb->prefix . "nt_setting_trip";
				
				$data = $wpdb->get_results("SELECT * FROM $table_name
											WHERE id = 1");
				foreach ($data as $st) {
					$id			= $st->id;	
					$title		= $st->title;
					$pembayaran	= $st->pembayaran;
				}	
			?>				
			<div class="booking-transfer">
				<div class="title-booking-transfer">
					<?php echo $title; ?>
				</div>
				
				<div class="content-booking-transfer">
					<?php echo $pembayaran; ?>
				</div>
			</div>
		</div>
	</div>
</div>	
<!-- End Code -->


<?php get_footer();?>