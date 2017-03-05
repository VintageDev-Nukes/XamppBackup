<?php

$lang_name = "es";

if(isset($_GET['lang']))
{
	$lang_name = $_GET['lang']; 
	setcookie('lang', $lang_name, time() + (3600 * 24 * 30));
}
else 
{
	if(isset($_COOKIE['lang']))
	{
		$lang_name = $_COOKIE['lang'];
	}
}
 
if(file_exists('lang/lang.'.$lang_name.'.php'))
	include 'lang/lang.'.$lang_name.'.php';

$now = time();

define("INCLUDES", "/includes/", true);

if(!defined("CONNECT")) {
	define("CONNECT", true);
}

if(!defined("REGISTER_HIT")) {
	define("REGISTER_HIT", true);
}

include('Settings.php');

if(CONNECT) {
	$conn = mysqli_connect($localhost, $dbuser, $dbpass, $dbname) or die('Could not connect: ' . mysqli_error($conn));
}

function UpdateInfo() {

	global $conn, $now;

	// #################################################################
	// ######### add IP and user-agent and time or update it ###########
	// #################################################################

	// gather user data
	$ip = $_SERVER["REMOTE_ADDR"];
	$agent = $_SERVER["HTTP_USER_AGENT"];
	$reg_time = $now;
	if(empty($_GET['ref'])) {$refer=null;} else {$refer = mysqli_real_escape_string($conn, $_GET['ref']);}

	if(!mysqli_num_rows(mysqli_query($conn, "SELECT ip FROM visitors WHERE ip = '$ip'"))) // check if the IP is in database
	{   //If not , add it.	
		mysqli_query($conn, "INSERT INTO visitors (ip, user_agent, reg_time, last_activity) VALUES ('$ip', '$agent', '$reg_time', '$reg_time')") or die('Could not continue: '.mysqli_error($conn));
	} else { //Else, then update some things...
		mysqli_query($conn, "UPDATE visitors SET hits = hits+1 WHERE ip = '$ip'") or die('Could not continue: '.mysqli_error($conn));
	}

}

function getOnlinePeople($t = 120) {
	global $conn, $now;
	$elem = array();
	$result = mysqli_query($conn, sprintf("SELECT * FROM visitors WHERE %d-last_activity < %d", $now, $t));
	while($rs=mysqli_fetch_row($result)) {
		$elem[] = $rs;
	}
	return $elem;
}

/*Run everything necesary*/

if(REGISTER_HIT) {
	UpdateInfo();

	$my_ip = $_SERVER['REMOTE_ADDR'];
	mysqli_query($conn, "UPDATE visitors SET last_activity = '$now' WHERE ip = '$my_ip'");
}


?>