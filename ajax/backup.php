<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST['type'])
{
	case 'generateBackup': 
		
			//Eliminamos los respaldos generados
			
			$path = DOC_ROOT.BCK_DIR.'/';
			$dir = dir($path);		
			while($file = $dir->read()){	
				if($file != '.' && $file != '..')
					@unlink($path.$file);
			}		
			$dir->close();
			
			$dbName = SQL_DATABASE;
			$dir = DOC_ROOT.BCK_DIR;
			
			$backupFile = $dbName.'_'.date('Y-m-d').'.sql';
			
			$fileBackup = $dir.'/'.$backupFile;
					
			system("mysqldump -h ".SQL_HOST." -u ".SQL_USER." -p".SQL_PASSWORD." $dbName > $fileBackup", $retVal);
					
			$util->setError(11032,'complete','','');
			$util->PrintErrors();
			
			//Save History Data
			$user->setModule('Respaldos');
			$user->setAction('Generar');
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			echo '[#]';
			
			$smarty->assign('backupFile', $backupFile);
			$smarty->display(DOC_ROOT.'/templates/boxes/backup.tpl');
				
		break;	
}

?>
