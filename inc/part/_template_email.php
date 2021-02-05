<?php
	
	$subject = $head_subject." Booking ".ucwords(strtolower($sitename)).", Tanggal ".$tanggal.".";
	$headers = "From: ".$page_name." <".$our_email.">\r\n";
	$headers .= "Reply-To: $email\r\n";
	$headers .= "Cc: $our_email\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	$step1 = '<div class="step" id="step1" style="clear: both; margin-bottom: 5px; display: table; text-transform: uppercase; font-weight: bold; font-size: 16px; color: #1376bc; text-decoration: underline;">Langkah 1: Periksa Booking Anda</div>';
	$step2 = '<div class="step" id="step2" style="clear: both; margin-bottom: 5px; display: table; text-transform: uppercase; font-weight: bold; font-size: 16px; color: #1376bc; text-decoration: underline;">Langkah 2: Lakukan Pembayaran</div>';
	$step3 = '<div class="step" id="step3" style="clear: both; margin-bottom: 5px; display: table; text-transform: uppercase; font-weight: bold; font-size: 16px; color: #1376bc; text-decoration: underline;">Langkah 3: Konfirmasi Pembayaran</div>';

$message = '
<html>
<head></head>
<body>
<div style="background-color: rgb(68, 68, 68);" class="cccc-sp">
	<div style="font-family: sans-serif; -moz-box-sizing: border-box; padding: 20px 50px 50px 50px;">
	    <div style="font-size: 26px; margin-bottom: 6px;">
	        <div class="logo">
	            <a style="text-decoration: none; color: #F1F1F1;" title="'.$title_home.'" href="'.$url_home.'">
	                <div class="header-txt">'.$header_logo.'</div>
	            </a>
	        </div>
	    </div>
	    <div style="font-size: 14px; clear: both; border-top: 5px solid #1376bc; background-color: rgb(255, 255, 255); padding: 10px 20px 1px;" class="main">
	        <div class="tag-title">
	            <h1 style="margin: 0px;">Terima Kasih Atas Reservasi Anda</h1>
	            <p style="margin: 10px 0px; line-height: 1.2em;"><strong>Halo '.$customer_name.',<br></strong>
	            Terima kasih Anda telah melakukan reservasi atas trip yang Anda inginkan di '.$page_name.'.<br>
	            Untuk memastikan reservasi Anda ikuti langkah-langkah berikut ini :</p>
	        </div>
	        '.$step1.'
	        <p style="margin: 10px 0px; line-height: 1.2em;" class="tag-title-pesanan">
	            <strong>Data reservasi trip yang kami terima sebagai berikut:</strong>         
	        </p>
	        <div style="width: 100%; display: table; margin-bottom: 10px;" class="wrap-table" id="identitas">
	            <div class="table-master">
	                <div id="identitas" class="wrap-table clearfix" style="clear:both">
	                     <div class="item-identitas clearfix">
	                         <span style="float: left; width: 100px; padding: 3px 0.5%;">Tanggal Trip</span>
	                         <span style="float: left; width: 10px; padding: 3px 0.5%;">:</span>
	                         <span style="float: left; width: 320px; padding: 3px 0.5%;">'.$tanggal_trip.'</span>
	                     </div>
                     	<div class="item-identitas clearfix" style="clear:both">
	                         <span style="float: left; width: 100px; padding: 3px 0.5%;">Nama</span>
	                         <span style="float: left; width: 10px; padding: 3px 0.5%;">:</span>
	                         <span style="float: left; width: 320px; padding: 3px 0.5%;">'.$customer_name.'</span>
	                     </div>
                         <div class="item-identitas clearfix" style="clear:both">
                             <span style="float: left; width: 100px; padding: 3px 0.5%;">Alamat</span>
                             <span style="float: left; width: 10px; padding: 3px 0.5%;">:</span>
                             <span style="float: left; width: 320px; padding: 3px 0.5%;">'.$customer_address.'</span>
                         </div>
                         <div class="item-identitas clearfix" style="clear:both">
                             <span style="float: left; width: 100px; padding: 3px 0.5%;">Telepon</span>
                             <span style="float: left; width: 10px; padding: 3px 0.5%;">:</span>
                             <span style="float: left; width: 320px; padding: 3px 0.5%;">'.$customer_phone.'</span>
                         </div>
                         <div class="item-identitas clearfix" style="clear:both">
                             <span style="float: left; width: 100px; padding: 3px 0.5%;">Email</span>
                             <span style="float: left; width: 10px; padding: 3px 0.5%;">:</span>
                             <span style="float: left; width: 320px; padding: 3px 0.5%;">'.$customer_email.'</span>
                         </div>
                    </div>
	            </div>
	        </div>
	        <div style="" class="wrap-table" id="cart">
		    <div class="table-master" id="cart">
		        <div style="clear: both; display: table; width: 100%; padding: 5px 0px 1px; background-color: rgba(240, 113, 56, 0.75);" class="tr clearfix tableheader">
		            <div style="float: left; text-align: center; font-weight: bold; width: 34%; padding: 10px 0.5%;" class="th td kolom1">Paket</div>
		            <div style="float: left; text-align: center; font-weight: bold; width: 14%; padding: 10px 0.5%;" class="th td kolom2">Grade</div>
		            <div style="float: left; text-align: center; font-weight: bold; width: 24%; padding: 10px 0.5%;" class="th td kolom3">Peserta</div>
		            <div style="float: left; text-align: center; font-weight: bold; width: 24%; padding: 10px 0.5%;" class="th td kolom4">Subtotal (Rp)</div>
		        </div>

				<div style="clear: both; display: table; padding: 5px 0px 1px; border-bottom: 1px solid rgb(221, 221, 221); width: 100%;" class="tr clearfix bbot">
					<div style="float: left; text-align: center; width: 34%; padding: 10px 0.5%;" class="td ratakiri">'.$nama_trip.'<br> ('.$parent_trip.')</div>
					<div style="float: left; text-align: center; width: 14%; padding: 10px 0.5%;" class="td">'.$grades.'</div>
					<div style="float: left; text-align: right; width: 24%; padding: 10px 0.5%;" class="td">Dewasa : '.$pesertadewasa.' Orang <br>Anak : '.$pesertaanak.' Orang <br>Total : '.$jmlpeserta.' Orang</div>
					<div style="float: left; text-align: right; padding: 10px 0.5%; width: 24%;" class="td ratakanan">Dewasa : '.number_format($total_dewasa).'<br>Anak : '.number_format($total_anak).'<br>-</div>
				</div>';
$message .= '
		    </div>
	        </div>
	        <div style="margin-bottom: 10px; float: right; width: 50%;" class="wrap-table" id="cart-total">
		    <div class="table-master" id="cart-total">';

$message .= '
			<div style="clear: both; display: table; width: 100%; padding: 3px 0px 1px; border-bottom: 1px solid rgb(221, 221, 221); " class="tr clearfix bbot">
				<div style="float: left; width: 48%; padding: 10px 1%;" class="td bold"><strong>Total Pembayaran (Rp)</strong></div>
				<div style="float: left; text-align: right; width: 48%; padding: 10px 1%;" class="td ratakanan"><strong>'.number_format($total).'</strong></div>
			</div>';
$message .= '
		    </div>
	        </div>
	        '.$step2.'
	        <p style="line-height: 1.2em; margin: 10px 0px;" class="tag-title-pesanan">
			Transfer DP 40% (Down Payment) sebesar <strong>Rp '.number_format($total_dp).'</strong> sebelum tanggal <strong>'.$d_tanggal.'</strong> ke bank berikut :<br>
			<ul>
				<li>Bank Mandiri (BCA)<br>No. Rekening: 135-008-111-5758<br>An. <strong>PT Jagad Mahakarya Wisata</strong></li>
			</ul><br>
	        </p>
	        '.$step3.'
	        <p style="line-height: 1.2em; margin: 10px 0px;" class="tag-title-pesanan nomargin">
	            <strong>Setelah transfer, silahkan konfirmasi dengan mengirimkan bukti transfer Anda ke <a href="mailto:'.$our_email.'">'.$our_email.'</a> atau telepon/WA ke 0822 4444 1318.</strong>
	        </p>
	    </div>
	    <div style="clear: both; font-size: 14px; padding: 0px 20px 10px; border-top: 2px solid rgb(85, 85, 85); background-color: rgb(255, 255, 255);" class="main" id="sub2">
	        <p style="line-height: 1.2em; margin: 10px 0px;" class="tag-title-pesanan connected">
	            <strong>Informasi :</strong>
	        </p>
	        <ul style="margin: 0px; padding-left: 15px;">
	            <li>Apabila Anda memiliki pertanyaan tentang reservasi Anda, kirimkan email ke <a href="mailto:'.$our_email.'">'.$our_email.'</a> atau telepon/WA ke 0822 4444 1318.</li>
	            <li>Tim akan mengirimkan invoice ke email Anda 1 x 24 jam setelah Anda melakukan reservasi ini.</li>
	        </ul> 
	    </div>
	    <div style="text-align: center; padding: 10px; font-size: 14px; background-color: #f07138; color: rgb(255, 255, 255);" class="footer">&copy; '.date('Y').' <a style="text-decoration: none; color: rgb(255, 255, 255);" href="'.$url_home.'"><span>'.$page_name.'</span></a></div>
	</div>
</div>
</body>
</html>
';

if ($email_ready_to_send == "activated") {
	mail($recipient, $subject, $message, $headers);
}

$email_ready_to_send = "deactivated";
?>