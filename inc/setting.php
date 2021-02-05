<?php

	global $wpdb;
	$table_name = $wpdb->prefix . "nt_setting_trip";		
	$id = 1;
	
	$title		= $_POST["title"];
	$pembayaran = $_POST["pembayaran"];
	$contact	= $_POST["contact"];
	$email		= $_POST["email"];
	$typage		= $_POST["typage"];
	
	//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
                array(
					'title'			=> $title,
					'pembayaran'	=> $pembayaran,
					'contact'		=> $contact,
					'email'			=> $email,
					'typage'		=> $typage
				), //data
                array('ID' => $id), //where
                array(
					'%s',
					'%s',
					'%s',
					'%s',
					'%s'
				), //data format
                array(
					'%d'
				) //where format
        );
		
		$message.="Setting Updated";
    }
	else {
		//selecting value to update	
        $setting = $wpdb->get_results("SELECT * FROM $table_name WHERE id = 1");
        foreach ($setting as $s) {
            $title		= $s->title;
			$pembayaran	= $s->pembayaran;
			$contact	= $s->contact;
			$email		= $s->email;
			$typage		= $s->typage;
        }
    }
?>

<div class="wrap">
    <h2>Setting</h2>
	<?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<p class="post-attributes-label-wrapper">
			<label id="email" class="post-attributes-label">Email</label>
		</p>
		
        <input type="text" class="input-text regular-input" id="email" name="email" size="50" style="width: 30%" value="<?php echo $email; ?>"> 		
		
		<p class="post-attributes-label-wrapper">
			<label id="title" class="post-attributes-label">Title</label>
		</p>
		
        <input type="text" class="input-text regular-input" id="title" name="title" size="50" style="width: 30%" value="<?php echo $title; ?>"> 

		<p class="post-attributes-label-wrapper">
			<label id="typage" class="post-attributes-label">Thankyou Page</label>
		</p>
		
        <input type="text" class="input-text regular-input" id="typage" name="typage" size="50" style="width: 50%" value="<?php echo $typage; ?>"> 		
		
		<p class="post-attributes-label-wrapper">
			<label id="pembayaran" class="post-attributes-label">Pembayaran *</label>
		</p>
		
		<textarea id="pembayaran" name="pembayaran" rows="5" col="3" style="width: 50%; height: 130px; max-height: 130px;"><?php echo $pembayaran; ?></textarea>

		<p class="post-attributes-label-wrapper">
			<label id="contact" class="post-attributes-label">Contact *</label>
		</p>
		
		<textarea id="contact" name="contact" rows="5" col="3" style="width: 50%; height: 130px; max-height: 130px;"><?php echo $contact; ?></textarea>		
        <p>* ) HTML Support</p>
		<p class="submit">
			<input type="submit" name="update" class="button button-primary button-large" value="Update" />
        </p>
    </form>
	
	<hr>
</div>