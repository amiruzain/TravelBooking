<?php

	global $wpdb;
	$table_name = $wpdb->prefix . "nt_parent_trip";		
	
	$parent_trip = $_POST["parent_trip"];
	
	//insert
	if (isset($_POST['add_parent_trip'])) {
		
		$wpdb->insert(
				$table_name, //table
				array(
					'id'		=> null, 
					'parent_trip' 	=> $parent_trip
				), //data
				array(
					'%d', 
					'%s'
				) //data format			
		);	
		
		$message.="Data Telah di Tambahkan";
	}

	if(@$_GET['action']== 'delete'){
		$table_name = $wpdb->prefix . "nt_parent_trip";
		
		$id_parent = $_GET['id_parent'];
		
		$wpdb->delete( 
				$table_name, 
				array( 
					'ID' => $id_parent 
				), 
				array( 
					'%d' 
				) 
		);
		
		$message.="Data Telah di Hapus";
	}
	
?>

<div class="wrap">
    <h2>Parent Trip</h2>
	<h4>Tambah Parent Trip</h4>
	<?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<p class="post-attributes-label-wrapper">
			<label id="parentTrip" class="post-attributes-label">Parent Trip</label>
		</p>
		
        <input type="text" class="input-text regular-input" id="parentTrip" name="parent_trip" size="50"> 			
        
		<p class="submit">
			<input type="submit" name="add_parent_trip" class="button button-primary button-large" value="Tambah Data" />
        </p>
    </form>
	
	<hr>
	
    <h2>Data Parent Trip</h2>

	<table id="data-main" class="display" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Parent Trip</th>
				<th style="width: 64px">Edit</th>
				<th style="width: 64px">Del</th>
			</tr>
		<thead>
		
		<tbody>
			<?php
				global $wpdb;
				$table_name = $wpdb->prefix . "nt_parent_trip";
				
				$data = $wpdb->get_results("SELECT * FROM $table_name ORDER BY parent_trip");
				foreach ($data as $pt) {
					$id = $pt->id;	
					$parent_trip = $pt->parent_trip;	
			?>			
				<tr>
					<td><strong><?php echo $parent_trip; ?></strong></td>
					<td style="text-align: center;">
						<a href="" onClick="return alert('Fitur Belum Tersedia');">
							<img width="20px" src="<?php echo plugin_dir_url(__FILE__). '../img/edit.png';?>" alt="Edit" title="Edit">
						</a>
					</td>
					<td style="text-align: center;">
						<a href="<?php echo $_SERVER['REQUEST_URI']; ?>&action=delete&id_parent=<?php echo $id;?>" onClick="return confirm('Anda yakin ?');">
							<img width="20px" src="<?php echo plugin_dir_url(__FILE__). '../img/del.png';?>" alt="Delete" title="Delete">
						</a>
					</td>
				</tr>
			<?php		
				}
			?>				
		</tbody>
	</table>
</div>