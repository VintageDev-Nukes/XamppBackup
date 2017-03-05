<?php

$action = @$_GET['action'];
if(empty($action)) {die('No action registered!');}

define("REGISTER_HIT", false);
include('main.php');

switch ($action) {
	case 'getOnlinePeople':
		$data = @$_GET['data'];
		$t = 120;
		if(isset($data) && is_numeric($data)) {$t = $data*60;}
		echo count(getOnlinePeople($t));
		break;
	
	default:
		die('Action not registered!');		
		break;
}

?>