<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

$empresa->setEmailLogin($_POST["email"]);
$empresa->setPassword($_POST["password"]);
if (!$empresa->DoLogin()) {
    echo "fail|";
    $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
} else {
    $info = $user->Info();
    echo "ok|".$info["type"];
}
