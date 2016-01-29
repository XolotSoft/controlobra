<?php 
	
	include_once('config.php');
	
	$path = DOC_ROOT.BCK_DIR.'/';

	$dir = dir($path);	
	while($file = $dir->read()){	
		if($file != '.' && $file != '..')
			$backupFile = $file;	
	}	
	$dir->close();
		
	$path = DOC_ROOT.BCK_DIR.'/'.$backupFile;
	
	header("Content-disposition: attachment; filename=$backupFile");
	header("Content-type: application/octet-stream");
	readfile($path);

?>