<?php

$id = @$_GET['id'];

$arr = array(
	0 => '/unity_demos/Maze.unity3d', 
	1 => '/unity_demos/Hords.unity3d');

$arr2 = array(
	0 => $lang["m1_vers"],
	1 => $lang["m2_vers"]);

$arr3 = array(
	0 => 'Maze Screamer',
	1 => 'Hords Game');

if(!isset($id)) {die('No hay ID.');}
if(!array_key_exists($id, $arr)) {die('La ID actuual no corresponde a ningún juego.');}

echo '
<link rel="stylesheet" type="text/css" href="css/unity.css" />
<script type=\'text/javascript\' src=\'https://ssl-webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/jquery.min.js\'></script>
<script type="text/javascript">
<!--
var unityObjectUrl = "http://webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/UnityObject2.js";
if (document.location.protocol == \'https:\')
	unityObjectUrl = unityObjectUrl.replace("http://", "https://ssl-");
document.write(\'<script type="text\/javascript" src="\' + unityObjectUrl + \'"><\/script>\');
-->
</script>
<script type="text/javascript">
<!--
	var config = {
		width: 960, 
		height: 600,
		params: { enableDebugging:"0" }
			
	};
	config.params["disableContextMenu"] = true;
	var u = new UnityObject2(config);

	jQuery(function() {

		var $missingScreen = jQuery("#unityPlayer").find(".missing");
		var $brokenScreen = jQuery("#unityPlayer").find(".broken");
		$missingScreen.hide();
		$brokenScreen.hide();
			
		u.observeProgress(function (progress) {
			switch(progress.pluginStatus) {
				case "broken":
					$brokenScreen.find("a").click(function (e) {
						e.stopPropagation();
						e.preventDefault();
						u.installPlugin();
						return false;
					});
					$brokenScreen.show();
				break;
				case "missing":
					$missingScreen.find("a").click(function (e) {
						e.stopPropagation();
						e.preventDefault();
						u.installPlugin();
						return false;
					});
					$missingScreen.show();
				break;
				case "installed":
					$missingScreen.remove();
				break;
				case "first":
				break;
			}
		});
		u.initPlugin(jQuery("#unityPlayer")[0], "'.$arr[$id].'");
	});
-->

function spoiler(elem) 
{
	var cont = elem.parentNode.childNodes[3];
	var tag = elem.childNodes[3];
	cont.style.display = ((cont.style.display == "block") ? "none" : "block");
	tag.innerHTML = ((cont.style.display == "block") ? "(Ocultar contenido)" : "(Mostrar contenido)");
}

</script>
<p class="header"><span>Unity Web Player | </span>'.$arr3[$id].'</p>
<div class="content">
	<div id="unityPlayer">
		<div class="missing">
			<a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now!">
				<img alt="Unity Web Player. Install now!" src="http://webplayer.unity3d.com/installation/getunity.png" width="193" height="63" />
			</a>
		</div>
		<div class="broken">
			<a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now! Restart your browser after install.">
				<img alt="Unity Web Player. Install now! Restart your browser after install." src="http://webplayer.unity3d.com/installation/getunityrestart.png" width="193" height="63" />
			</a>
		</div>
	</div>
</div>
<!--- Spoiler -->
<br>
<center>
	<div>
		<div onclick="spoiler(this);">
			<p class="big" style="display: inline;">Notas de desarrollo</p> <span>(Mostrar contenido)</span>
		</div>
		<div style="display: none;text-align: left;">'.$arr2[$id].'</div>
	</div>
</center>
<p class="footer">&laquo; created with <a href="http://unity3d.com/unity/" title="Go to unity3d.com">Unity</a> &raquo;</p>';

?>
