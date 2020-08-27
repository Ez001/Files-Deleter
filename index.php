<?php 
	//get action where 0 is to view  and 1 or above is to delete
	if (isset($_GET['act'])) {
		$act = $_GET['act'];
	}else{
		exit();
	}
	
	$cur_dir = dirname(__FILE__);
	
	//directory
	//$cur_dir = $_SERVER['DOCUMENT_ROOT'];
	$files = glob($cur_dir.'/*');
	$files2 = glob($cur_dir.'/inc/*');
	//looping through files
	$k = 0;
	foreach ($files as $file) {
		if (is_file($file)) {
			//dont delete, show file name
			if ($act == 0) {
				print_r($file.'<br>');
			//delete
			}else {
				unlink($file);
				 $k++;
			}
		}
	}

	//looping through files	
    $i = 0;
	foreach ($files2 as $file2) {
		if (is_file($file2)) {
			//dont delete, show file name
			if ($act == 0) {
				print_r($file2.'<br>');
				
			//delete
			}else {
				unlink($file2);
				 $i++;
			}
		}
	}
	
	
	if ($k > 0 || $i > 0) {
	    echo 'Done';
	}else{
	    echo 'Undone';
	}

 ?>