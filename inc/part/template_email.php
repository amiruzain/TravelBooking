<?php
	//$subject = $head_subject." Booking ".ucwords(strtolower($sitename)).", Tanggal ".$tanggal.".";
	$subject = $head_subject." Booking ".ucwords(strtolower($sitename));
	$headers = "From: ".$page_name." <".$our_email.">\r\n";
	$headers .= "Reply-To: $email\r\n";
	$headers .= "Cc: $our_email\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- If you delete this meta tag, Half Life 3 will never be released. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
<style>
/* ------------------------------------- 
		GLOBAL 
------------------------------------- */
* { 
	margin:0;
	padding:0;
}
* { font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; }

img { 
	max-width: 100%; 
}
.collapse {
	margin:0;
	padding:0;
}
body {
	-webkit-font-smoothing:antialiased; 
	-webkit-text-size-adjust:none; 
	width: 100%!important; 
	height: 100%;
}


/* ------------------------------------- 
		ELEMENTS 
------------------------------------- */
a { color: #2BA6CB;}

.btn {
	text-decoration:none;
	color: #FFF;
	background-color: #666;
	padding:10px 16px;
	font-weight:bold;
	margin-right:10px;
	text-align:center;
	cursor:pointer;
	display: inline-block;
}

p.callout {
	padding: 10px;
	background-color: #f07138;
	margin-bottom: 15px;
	color: #fff;
	font-weight: 600;
}
.callout a {
	font-weight:bold;
	color: #2BA6CB;
}

table.social {
/* 	padding:15px; */
	background-color: #ebebeb;
	
}
.social .soc-btn {
	padding: 3px 7px;
	font-size:12px;
	margin-bottom:10px;
	text-decoration:none;
	color: #FFF;font-weight:bold;
	display:block;
	text-align:center;
}
a.fb { background-color: #3B5998!important; }
a.tw { background-color: #1daced!important; }
a.gp { background-color: #e2296f!important; }
a.ms { background-color: #000!important; }

.sidebar .soc-btn { 
	display:block;
	width:100%;
}

.margin-bottom-15 {
	margin-bottom: 15px;
}

.margin-bottom-30 {
	margin-bottom: 30px;
}

.text-14px {
	font-size: 14px;
}

.width-25s {
	width: 25%;
}

.grade-table {
	border-spacing: 0;
	border-collapse: collapse;
	margin-bottom: 15px;
}

.grade-table tr > td,
.grade-table tr > th {
	padding: 7px;
	border-bottom: 1px solid #fff;
}

.grade-table tr > th {
	background: #d6d5d5;
}

.grade-table tr > td {
	background: #ebebeb;
}

.text-center {
	text-align: center;	
}

.text-right {
	text-align: right;
}

.text-total {
	font-size: 16px;
	font-weight: 600;
	font-style: italic;
}

.text-bold {
	font-weight: 600;
}
/* ------------------------------------- 
		HEADER 
------------------------------------- */
table.head-wrap { width: 100%;}

.header.container table td.logo { padding: 15px; }
.header.container table td.label { padding: 15px; padding-left:0px;}


/* ------------------------------------- 
		BODY 
------------------------------------- */
table.body-wrap { width: 100%;}


/* ------------------------------------- 
		FOOTER 
------------------------------------- */
table.footer-wrap { width: 100%;	clear:both!important;
}
.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
.footer-wrap .container td.content p {
	font-size:10px;
	font-weight: bold;
	
}


/* ------------------------------------- 
		TYPOGRAPHY 
------------------------------------- */
h1,h2,h3,h4,h5,h6 {
font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
}
h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

h1 { font-weight:200; font-size: 44px;}
h2 { font-weight:200; font-size: 37px;}
h3 { font-weight:500; font-size: 27px;}
h4 { font-weight:500; font-size: 23px;}
h5 { font-weight:900; font-size: 17px;}
h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#000;}

.collapse { margin:0!important;}

p, ul { 
	margin-bottom: 10px; 
	font-weight: normal; 
	font-size:14px; 
	line-height:1.6;
}
p.lead { font-size:17px; }
p.last { margin-bottom:0px;}

ul li {
	margin-left: 15px;
	font-size: 17px;
}

/* ------------------------------------- 
		SIDEBAR 
------------------------------------- */
ul.sidebar {
	background:#ebebeb;
	display:block;
	list-style-type: none;
}
ul.sidebar li { display: block; margin:0;}
ul.sidebar li a {
	text-decoration:none;
	color: #666;
	padding:10px 16px;
/* 	font-weight:bold; */
	margin-right:10px;
/* 	text-align:center; */
	cursor:pointer;
	border-bottom: 1px solid #777777;
	border-top: 1px solid #FFFFFF;
	display:block;
	margin:0;
}
ul.sidebar li a.last { border-bottom-width:0px;}
ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



/* --------------------------------------------------- 
		RESPONSIVENESS
------------------------------------------------------ */

/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
.container {
	display:block!important;
	max-width:600px!important;
	margin:0 auto!important; /* makes it centered */
	clear:both!important;
}

/* This should also be a block element, so that it will fill 100% of the .container */
.content {
	padding:15px;
	max-width:600px;
	margin:0 auto;
	display:block; 
}

/* Lets make sure tables in the content area are 100% wide */
.content table { width: 100%; }


/* Odds and ends */
.column {
	width: 300px;
	float:left;
}
.column tr td { padding: 15px; }
.column-wrap { 
	padding:0!important; 
	margin:0 auto; 
	max-width:600px!important;
}
.column table { width:100%;}
.social .column {
	width: 280px;
	min-width: 279px;
	float:left;
}

/* Be sure to place a .clear element after each set of columns, just to be safe */
.clear { display: block; clear: both; }


/* ------------------------------------------- 
		PHONE
		For clients that support media queries.
		Nothing fancy. 
-------------------------------------------- */
@media only screen and (max-width: 600px) {
	
	a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

	div[class="column"] { width: auto!important; float:none!important;}
	
	table.social div[class="column"] {
		width:auto!important;
	}

}
</style>

</head>
 
<body bgcolor="#FFFFFF">

<!-- HEADER -->
<table class="head-wrap" bgcolor="#ebebeb">
	<tr>
		<td></td>
		<td class="header container" >
				
				<div class="content">
					<table>
						<tr>
							<td>'.$header_logo.'</td>
						</tr>
					</table>
				</div>
				
		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->


<!-- BODY -->
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

			<div class="content">
			<table>
				<tr>
					<td>
						<h3>Halo, '.$customer_name.'</h3>
						<p class="lead">
							Terima kasih Anda telah melakukan reservasi atas trip yang Anda inginkan di jagadtour.com.
						</p>
						
						<p class="lead">
						    Kode booking trip Anda adalah <strong>'.$kode_booking.'</strong>
						</p>
						
						<p class="lead">
							Untuk memastikan reservasi Anda ikuti langkah-langkah berikut ini :
						</p>
						
						<p class="callout">
							Langkah 1: Periksa Booking Anda
						</p>
						
						<p class="lead">
							Data reservasi trip yang kami terima sebagai berikut :
						</p>				
						
						<table class="margin-bottom-15 text-14px">
							<tr>
								<td class="width-25s">Tanggal Trip</td>
								<td>:</td>
								<td>'.$tanggal_trip.'</td>
							</tr>
							
							<tr class="width-20s">
								<td>Nama</td>
								<td>:</td>
								<td>'.$customer_name.'</td>
							</tr>

							<tr class="width-20s">
								<td>Alamat</td>
								<td>:</td>
								<td>'.$customer_address.'</td>
							</tr>

							<tr class="width-20s">
								<td>Telepon</td>
								<td>:</td>
								<td>'.$customer_phone.'</td>
							</tr>

							<tr class="width-20s">
								<td>Email</td>
								<td>:</td>
								<td>'.$customer_email.'</td>
							</tr>
							
							<tr class="width-20s">
								<td>Alamat Penjemputan</td>
								<td>:</td>
								<td>'.$alamat_jemput.'</td>
							</tr>
							
							<tr class="width-20s">
								<td>Alamat Pengantaran</td>
								<td>:</td>
								<td>'.$alamat_antar.'</td>
							</tr>							
						</table>

						<table class="grade-table">
							<tr>
								<th>Paket</th>
								<td class="text-center">'.$nama_trip.'<br> ('.$parent_trip.')</td>
							</tr>
							
							<tr>
								<th>Grade</th>
								<td class="text-center">'.$grades.'</td>
							</tr>	

							<tr>
								<th>Peserta</th>
								<td class="text-right">Dewasa : '.$pesertadewasa.' Orang<br>Anak : '.$pesertaanak.' Orang<br>Total : '.$jmlpeserta.' Orang</td>
							</tr>
							
							<tr>
								<th>Subtotal (Rp)</th>
								<td class="text-right">Dewasa : '.number_format($total_dewasa).'<br>Anak : '.number_format($total_anak).'<br>-</td>
							</tr>

							<tr>
								<th>Total (Rp)</th>
								<td class="text-right text-total">'.number_format($total).'</td>
							</tr>							
						</table>
						
						<p class="callout">
							Langkah 2: Lakukan Pembayaran
						</p>
						
						<p class="lead">
							Transfer DP 40% (Down Payment) sebesar <strong>Rp '.number_format($total_dp).'</strong> sebelum tanggal <strong>'.$d_tanggal.'</strong> ke bank berikut :
						</p>
					
						<p class="lead">
							<ul>
								<li>Bank Mandiri<br>No. Rekening: 135-008-111-5758<br>An. <strong>PT Jagad Mahakarya Wisata</strong></li>
							</ul>						
						</p>
						
						<p class="lead margin-bottom-30"></p>
						
						<p class="callout">
							Langkah 3: Konfirmasi Pembayaran
						</p>						
						
						<p class="lead">
							Setelah transfer, silahkan konfirmasi dengan mengirimkan bukti transfer Anda ke <a href="mailto:'.$our_email.'">'.$our_email.'</a> / telepon 0341 5052 043 atau Whatsapp ke 0822 4444 1318 dengan menyertakan Kode Booking Trip Anda.
						</p>
						
						<p class="lead margin-bottom-30">
							Tim akan mengirimkan invoice ke email Anda 1 x 24 jam setelah Anda melakukan transfer Down Payment.
						</p>
						
						<!-- social & contact -->
						<table class="social" width="100%">
							<tr>
								<td>
									
									<!-- column 1 -->
									<table align="left" class="column">
										<tr>
											<td>				
												
												<h5 class="">Connect with Us:</h5>
												<p class="">
													<a href="#" class="soc-btn fb">Facebook</a> 
													<a href="#" class="soc-btn tw">Twitter</a> 
													<a href="https://www.instagram.com/jagadtour/" class="soc-btn gp">Instagram</a>
												</p>						
												
											</td>
										</tr>
									</table><!-- /column 1 -->	
									
									<!-- column 2 -->
									<table align="left" class="column">
										<tr>
											<td>				
																			
												<h5 class="">Contact Info:</h5>													<p>Phone: <strong>0341 5052 043</strong><br/>											
												<p>Whatsapp: <strong>0822 4444 1318</strong><br/>
												Email: <strong><a href="mailto:'.$our_email.'">'.$our_email.'</a></strong></p>        
											</td>
										</tr>
									</table><!-- /column 2 -->
									
									<span class="clear"></span>	
									
								</td>
							</tr>
						</table><!-- /social & contact -->
						
					</td>
				</tr>
			</table>
			</div><!-- /content -->
									
		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">
			
				<!-- content -->
				<div class="content">
				<table>
				<tr>
					<td align="center">
						<p>
							&copy; '.date('Y').' <a href="'.$url_home.'">jagadtour.com</a> | PT. Jagad Mahakarya Wisata
						</p>
					</td>
				</tr>
			</table>
				</div><!-- /content -->			
		</td>
		<td></td>
	</tr>
</table><!-- /FOOTER -->

</body>
</html>
';

if ($email_ready_to_send == "activated") {
	require_once('library-email/function.php');
	
	//mail($recipient, $subject, $message, $headers);
	
	smtp_mail($recipient, $subject, $message, '', '', $our_email, 0, false);
}

$email_ready_to_send = "deactivated";
?>