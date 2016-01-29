<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();
$p = $_SESSION['bnkP'];

switch($_POST['type'])
{
	case 'addBank': 
		
		$_SESSION['bankProjects'] = array();
		
		$projects = $project->EnumerateAll();
		$projects = $util->EncodeResult($projects);
		
		$smarty->assign('projects', $projects);
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/add-bank-popup.tpl');
				
		break;	

	case 'editBank':
		
		$bank->setBankId($_POST['id']);
		$info = $bank->Info();		
		$info = $util->EncodeRow($info);
		
		$projects = $bank->GetProjects();
		
		$bankProjects = array();
		foreach($projects as $res){
			$project->setProjectId($res['projectId']);
			$infP = $project->Info();
			
			$card['nombre'] = $infP['name'];
			$card['projectId'] = $infP['projectId'];
			
			$bankProjects[] = $card;
		}
		
		$_SESSION['bankProjects'] = $bankProjects;
		
		$info['startBalanceF'] = number_format($info['startBalance'],2);
		
		$projects = $project->EnumerateAll();
		$projects = $util->EncodeResult($projects);
		
		$smarty->assign('info', $info);
		$smarty->assign('projects', $projects);	
		$smarty->assign('bankProjects', $bankProjects);		
		$smarty->assign('DOC_ROOT', DOC_ROOT);
		$smarty->display(DOC_ROOT.'/templates/boxes/edit-bank-popup.tpl');
		
		break;
		
	case 'saveAddBank':				
		
		$bank->setBank($_POST['bank']);
		$bank->setAccountNumber($_POST['accountNumber']);
		$bank->setBranch($_POST['branch']);
		$bank->setName($_POST['name']);
		$bank->setTitular($_POST['titular']);
		$bank->setClabe($_POST['clabe']);
		$bank->setStartBalance($_POST['startBalance']);
		$bank->setProjectId(0);
		$bank->setCurrency($_POST['currency']);
		$bank->setNoCheque($_POST['noCheque']);
		
		$bankId = $bank->Save();
		
		if(!$bankId)
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save the Projects
			$bankProjects = $_SESSION['bankProjects'];
			
			if(count($bankProjects) == 0)
				$bankProjects = array();
				
			foreach($bankProjects as $res){			
				$bank->setBankId($bankId);
				$bank->setProjectId($res['projectId']);
				$bank->SaveProject();
			}			
			
			//Save History Data	
					
			$user->setModule('Bancos');
			$user->setAction('Agregar');
			$user->setItemId($bankId);
			$user->SaveHistory();
						
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';			
			$banks = $bank->Enumerate();			
			$result = $banks['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);				
				
				$saldo = $res['startBalance'] - $res['currentBalance'];		
				$card['saldo'] = number_format($saldo,2);
				
				$card['startBalance'] = number_format($res['startBalance'],2);
				
				$bank->setBankId($res['bankId']);
				$resProjects = $bank->GetProjects();
				
				$projects = array();
				foreach($resProjects as $proj){
					$project->setProjectId($proj['projectId']);
					$projects[] = $project->GetNameById();
				}		
				$card['projects'] = $projects;
				
				$items[] = $card;
			}			
			$banks['items'] = $items;
						
			$smarty->assign('banks', $banks);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/bank.tpl');
		}		
		
		break;
		
	case 'saveEditBank':	 	
		
		$bankId = $_POST['id'];
		
		$bank->setBankId($bankId);	
		$bank->setBank($_POST['bank']);
		$bank->setAccountNumber($_POST['accountNumber']);
		$bank->setBranch($_POST['branch']);
		$bank->setName($_POST['name']);
		$bank->setTitular($_POST['titular']);
		$bank->setClabe($_POST['clabe']);						
		$bank->setProjectId($_POST['projectId']);
		$bank->setCurrency($_POST['currency']);
		$bank->setNoCheque($_POST['noCheque']);
		
		$info = $bank->Info();
		
		if($_POST['editStartBalance'])
			$bank->setStartBalance($_POST['startBalance']);
		else
			$bank->setStartBalance($info['startBalance']);
		
		if(!$bank->Update())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Delete the Projects
			$bank->setBankId($bankId);
			$bank->DeleteProjects();
			
			//Save the Projects
			$bankProjects = $_SESSION['bankProjects'];
			
			if(count($bankProjects) == 0)
				$bankProjects = array();
				
			foreach($bankProjects as $res){			
				$bank->setBankId($bankId);
				$bank->setProjectId($res['projectId']);
				$bank->SaveProject();
			}
			
			//Save History Data			
			$user->setModule('Bancos');
			$user->setAction('Editar');
			$user->setItemId($bankId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$bank->SetPage($p);
			$banks = $bank->Enumerate();
			$result = $banks['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);
				
				$saldo = $res['startBalance'] - $res['currentBalance'];		
				$card['saldo'] = number_format($saldo,2);
							
				$card['startBalance'] = number_format($res['startBalance'],2);
				
				$bank->setBankId($res['bankId']);
				$resProjects = $bank->GetProjects();
				
				$projects = array();
				foreach($resProjects as $proj){
					$project->setProjectId($proj['projectId']);
					$projects[] = $project->GetNameById();
				}		
				$card['projects'] = $projects;
				
				$items[] = $card;
			}			
			$banks['items'] = $items;
			
			$smarty->assign('banks', $banks);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/bank.tpl');
		}
			
		break;
	
	case 'deleteBank':
		
		$bankId = $_POST['id'];
		
		$bank->setBankId($bankId);	
				
		if(!$bank->Delete())
		{
			echo 'fail[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
		}
		else
		{
			//Save History Data			
			$user->setModule('Bancos');
			$user->setAction('Eliminar');
			$user->setItemId($bankId);
			$user->SaveHistory();
			
			echo 'ok[#]';
			$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			echo '[#]';
			$bank->SetPage($p);
			$banks = $bank->Enumerate();
			$result = $banks['items'];
			
			$items = array();
			foreach($result as $res){
				$card = $util->EncodeRow($res);	
				
				$saldo = $res['startBalance'] - $res['currentBalance'];		
				$card['saldo'] = number_format($saldo,2);
							
				$card['startBalance'] = number_format($res['startBalance'],2);
				
				$bank->setBankId($res['bankId']);
				$resProjects = $bank->GetProjects();
				
				$projects = array();
				foreach($resProjects as $proj){
					$project->setProjectId($proj['projectId']);
					$projects[] = $project->GetNameById();
				}		
				$card['projects'] = $projects;
				
				$items[] = $card;
			}			
			$banks['items'] = $items;
			
			$smarty->assign('banks', $banks);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/bank.tpl');
		}
			
		break;
		
	case 'addProject':
			
			$projectId = $_POST['projectId'];
			$bankProjects = $_SESSION['bankProjects'];
						
			if($projectId == ''){
				$util->setError(0,'error','Seleccione el proyecto');
				$util->PrintErrors();
				echo 'fail[#]';
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				exit;
			}
			
			foreach($bankProjects as $res){
				if($res['projectId'] == $projectId){
					$util->setError(0,'error','El proyecto ya se encuentra agregado');
					$util->PrintErrors();
					echo 'fail[#]';
					$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
					exit;
				}
			}
			
			$project->setProjectId($projectId);
			$infP = $project->Info();
			
			$card['nombre'] = $infP['name'];
			$card['projectId'] = $infP['projectId'];
			
			$_SESSION['bankProjects'][] = $card;
			
			$bankProjects = $_SESSION['bankProjects'];
			
			echo 'ok[#]';
			
			$smarty->assign('bankProjects', $bankProjects);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/bank-proyectos.tpl');
			
		break;
	
	case 'deleteProject':
			
			$k = $_POST['k'];
						
			unset($_SESSION['bankProjects'][$k]);
			
			$bankProjects = $_SESSION['bankProjects'];
			
			echo 'ok[#]';
			
			$smarty->assign('bankProjects', $bankProjects);
			$smarty->assign('DOC_ROOT', DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/bank-proyectos.tpl');
			
		break;
	
}//switch

?>
