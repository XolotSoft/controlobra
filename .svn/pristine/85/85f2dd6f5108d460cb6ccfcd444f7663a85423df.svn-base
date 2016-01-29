<?php
		
	/* Start Session Control - Don't remove this */
	$user->allowAccess();	
	/* End Session Control */
	
	$path = DOC_ROOT.BCK_DIR.'/';

	$dir = dir($path);
	
	while($file = $dir->read()){	
		if($file != '.' && $file != '..')
			$backupFile = $file;	
	}
	
	$dir->close();
		
	$smarty->assign('backupFile', $backupFile);
	$smarty->assign('mainMnu','catalogos');
			
?>