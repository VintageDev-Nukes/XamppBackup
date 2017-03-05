<?php

include('main.php');

/*

Version model until official versions: 1.2.3.4, until then: 0.0.0...

1 => 
2 => For new content
3 => For mayor bug fixes, or content edition
4 => For minor bug fixes

*/

//Test
$is_online = false;

$cur_action = "";

if(isset($_GET) && isset($_GET["action"]))
	$cur_action = $_GET["action"];

echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>Lerp2Dev! - '.$lang["home"].'</title>
		<link rel="stylesheet" type="text/css" href="css/web.css" />
		<link rel="shortcut icon" href="images/icons/favicon.png" />
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/web.js"></script>
		<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />
		<script src="js/msdropdown/jquery.dd.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/msdropdown/flags.css" />
		<meta charset="utf-8" />
	</head>
	<body>
		<div class="background"></div>
		<div class="header">
			<img src="images/logo.png" />
		</div>
		<div class="body">
			<div id="cssmenu">
				<ul>
				   <li '.(($cur_action == 'index' || $cur_action == '') ? 'class="active"' : '' ).'><a href="index.php">'.$lang["home"].'</a></li>
				   <li '.(($cur_action == 'members') ? 'class="active"' : '' ).'><a href="index.php?action=members">'.$lang["members"].'</a></li>
				   <li '.(($cur_action == 'minigames') ? 'class="active"' : '' ).'><a href="index.php?action=minigames">'.$lang["minigames"].'</a></li>
				   <li '.(($cur_action == 'projects') ? 'class="active"' : '' ).'><a href="index.php?action=projects">'.$lang["projects"].'</a></li>
				   <li '.(($cur_action == 'contact') ? 'class="active"' : '' ).'><a href="index.php?action=contact">'.$lang["contact"].'</a></li>
				   <li onmouseover="document.getElementById(\'topprojects\').style.display = \'block\';" onmouseout="document.getElementById(\'topprojects\').style.display = \'none\';"><a href="#">'.$lang["top_projects"].'</a></li>
				</ul>
				<select name="countries" id="countries" style="width: 200px;position: absolute;right: 44px;top: 15px;height: 30px;border-radius: 5px 5px 0px 0px;border-bottom: 0px;">
					<option value="es" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag es" data-title="'.$lang["flag_es"].'">'.$lang["flag_es"].' (Español)</option>
					<option value="us" data-image="images/msdropdown/icons/blank.gif" data-imagecss="flag us" data-title="'.$lang["flag_en"].'">'.$lang["flag_en"].' (English)</option>
				</select>
				<script>
					$(document).ready(function() {
						$("#countries").msDropdown();
					})
				</script>';

				echo '<div class="menu_button" style="position: absolute;right:5px;top: 15px;">';
				if($is_online) 
				{
					echo '<img src="images/icons/menu.png" />';
				} 
				else 
				{
					echo '<img src="images/icons/login.png" title="Próximamente..." />';
				}
				echo '</div>';

			echo '</div>
			<div id="topprojects" style="display: none;">'.$lang["no_projects"].'</div>
			<div class="subbody">';

			$go = $cur_action;
			if(empty($go)){$go='index';}
			 
			switch($go){

			  case 'index':
			    include(INCLUDES.'index.php');
			    break;

			  case 'members':
			    include(INCLUDES.'members.php');
			    break;

			  case 'minigames':
			    include(INCLUDES.'minigames.php');
			    break;

			  case 'projects':
			    include(INCLUDES.'projects.php');
			    break;

			  case 'contact':
			    include(INCLUDES.'contact.php');
			    break;		

			  case 'player':
			    include(INCLUDES.'unity_player.php');
			    break;	

			  case 'project':
			    include(INCLUDES.'project.php');
			    break;

			}

			echo '</div>
		</div>
		<div class="online">
			<div onclick="document.getElementById(\'otime\').style.display = ((document.getElementById(\'otime\').style.display == \'none\') ? \'block\' : \'none\');">
				<img alt="'.$lang["online_explanation"].'" src="images/icons/online_bar.png" />
				<span id="gop">'.count(getOnlinePeople()).'</span>
			</div>
			<select id="otime" style="display: none;">
				<option value="1">1m</option>
				<option value="2" selected>2m</option>
				<option value="5">5m</option>
				<option value="10">10m</option>
				<option value="15">15m</option>
				<option value="30">30m</option>
				<option value="60">1h</option>
				<option value="120">2h</option>
				<option value="150">2.5h</option>
				<option value="180">3h</option>
				<option value="300">5h</option>
				<option value="600">10h</option>
				<option value="720">12h</option>
				<option value="1440">1d</option>
				<option value="2880">2d</option>
			</select>
		</div>
	</body>
</html>';

/*<script id="cid0020000096130988482" data-cfasync="false" async src="/st.chatango.com/js/gz/emb.js" style="width: 500px;height: 400px;">{"handle":"lerp2dev","arch":"js","styles":{"a":"e0e0e0","b":100,"c":"000000","d":"000000","k":"e0e0e0","l":"e0e0e0","m":"e0e0e0","p":"10","q":"e0e0e0","r":100,"fwtickm":1}}</script>*/

?>