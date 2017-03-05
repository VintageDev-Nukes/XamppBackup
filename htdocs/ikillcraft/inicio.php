<?php		
session_start();
// register session to change language

// if session isn't set 
if(!isset($_SESSION['mylang'])) 
{
	$_SESSION['mylang']="es";
}
//include language class


if(isset($_GET['lang'])) 
{
	switch($_GET['lang']) 
	{
		case "es":
		$_SESSION['mylang']="es";
		break;
		case "en":
		$_SESSION['mylang']="en";
		break;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Free Minecraft Premium Accounts!</title>
<link rel="stylesheet" href="web.css" />
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script type="text/javascript">
<!--
    function toggle_visibility() {
       var e = document.getElementById('repro');
       if(e.style.visibility == 'visible') {
          e.style.visibility = 'hidden';
	  document.getElementById("repro2").style.marginLeft = "0px"
	  document.getElementById("repro3").innerHTML = "&raquo;" }
       else {
          e.style.visibility = 'visible';
	  document.getElementById("repro2").style.marginLeft = "201px"
	  document.getElementById("repro3").innerHTML = "&laquo;" }
    }
//-->
</script>
<script>

function muestra_oculta(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'block') ? 'none' : 'block'; //damos un atributo display:none que oculta el div
}
}
window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
muestra_oculta('contenido_a_mostrar');/* "contenido_a_mostrar" es el nombre de la etiqueta DIV que deseamos mostrar */
}
</script>
</head>
<body>

<div style="width:90%; margin: 0 auto;"><div class="top"><img src="http://i.imgur.com/XZtiBPp.png" style="position:relative; top:50%; margin-top:-45px; height:90px; left:20px;" /></div>

<div id="menubar">



</div></div>

<div id="body">

<?

echo '<div id="fops">

<table style="color:#000; font-size:12px; font-family:Arial Black;top: 0px;position: relative;" id="table">
<tbody><tr>
<td><div id="options" style="position: relative;top: -1px;" class="index" onclick="location.href=\'inicio.php\';">Inicio</div></td>
<td style="position:relative;left:-3px;top: -1px;"><div id="options" class="foro" onclick="location.href=\'index.php\';">Foro</div></td>
</tr>
</tbody></table>';

if ($context['user']['is_logged'])
	{

echo '<div id="header-ide">

<table style="color:#000; font-size:12px; font-family:Arial Black; margin:5px;" id="table">
<tbody><tr>
<td>

<li id="header-user"><span id="header-user-avatar" title="Cambia tu avatar" onclick="location.href=\'?action=profile;area=forumprofile\';"><span style="
    position: relative;
    left: -60px;cursor:pointer;
">', $context['user']['avatar']['image'], '</span></span><span id="header-user-nom" class="" onclick="location.href=\'?action=profile\';" style="cursor:pointer;" title="Tu perfil">', $context['user']['name'], '</span><span id="header-user-dropdown" class="ic-arrow-dropdown" title="M&aacute;s opciones" style="cursor:pointer;" onclick="muestra_oculta(\'header-user-menu\');">&#9660;</span><div id="header-user-menu" style="display:none;">

<ul class="listano menu-gris"><li onclick="location.href=\'?action=profile;area=account\';"><span class="usme" id="fim" title="' ,$txt['profileEdit2'], '">' ,$txt['profileEdit2'], '</span></li><li onclick="location.href=\'?action=unread\';"><span class="usme">' ,$txt['unread_since_visit'], '</span></li><li onclick="location.href=\'?action=unreadreplies\';"><span class="usme">' ,$txt['show_unread_replies'], '</span></li><li><span class="usme" id="lastm" title="Cerrar la sesi&oacute;n">', ssi_logout() ,'</span></li> </ul>

</div></li>

</td><td style="position:relative;left:10px;"><select style="height:42px;width: 200px;" name="mediatype">
            <option selected="selected">Selecciona tu idioma</option>
            <option>-----</option>
            <option></option>
<option value="">Español</option>
<option value="">English</option>
          </select></td></tr></tbody></table></div>
<div id="mainbar">
<table style="position:relative;left:10px;"><tbody><tr><td>
<div id="menop" onclick="location.href=\'?action=search\';">', $txt['help'] ,'</div>
</td><td style="position:relative; left:10px;">
<div id="menop" onclick="location.href=\'?action=help\';">', $txt['search'] ,'</div>
</td><td style="position:relative; left:20px;">
<div id="menop" onmouseover="muestra(\'header-messages-menu\');" onmouseout="ocultar(\'header-messages-menu\');" onclick="location.href=\'?action=pm\';">', $txt['pm_short'] ,'</div>

<div id="header-messages-menu" class="header-menu" onmouseover="muestra(\'header-messages-menu\');" onmouseout="ocultar(\'header-messages-menu\');" style="display:none;">

<ul class="listano menu-gris"><li onclick="location.href=\'?action=pm\';"><span class="usme" id="fim">' ,$txt['pm_menu_read'], '</span></li><li onclick="location.href=\'?action=pm;sa=send\';"><span class="usme" id="lastm">' ,$txt['pm_menu_send'], '</span></li></ul>

</div>

</td><td style="position:relative; left:30px;">
<div id="menop" onmouseover="muestra(\'header-users-menu\');" onmouseout="ocultar(\'header-users-menu\');" onclick="location.href=\'?action=mlist\';">', $txt['members'] ,'</div>

<div id="header-users-menu" class="header-menu" onmouseover="muestra(\'header-users-menu\');" onmouseout="ocultar(\'header-users-menu\');" style="display:none;">

<ul class="listano menu-gris"><li onclick="location.href=\'?action=mlist\';"><span class="usme" id="fim">' ,$txt['mlist_menu_view'], '</span></li><li onclick="location.href=\'?action=mlist;sa=search\';"><span class="usme" id="lastm">' ,$txt['mlist_search'], '</span></li></ul>

</div>

</td>';


		if ($context['user']['is_admin'])
			echo '
<td style="position:relative; left:40px;">
<div id="menop" onmouseover="muestra(\'header-admin-menu\');" onmouseout="ocultar(\'header-admin-menu\');" onclick="location.href=\'?action=admin\';">', $txt['admin'] ,'</div>

<div id="header-admin-menu" class="header-menu" onmouseover="muestra(\'header-admin-menu\');" onmouseout="ocultar(\'header-admin-menu\');" style="display:none;">

<ul class="listano menu-gris"><li onclick="location.href=\'?action=admin;area=featuresettings\';"><span class="usme" id="fim">' ,$txt['modSettings_title'], '</span></li><li onclick="location.href=\'?action=admin;area=packages\';"><span class="usme">' ,$txt['package'], '</span></li><li onclick="location.href=\'?action=admin;area=logs;sa=errorlog;desc\';"><span class="usme">' ,$txt['errlog'], '</span></li><li onclick="location.href=\'?action=admin;area=permissions\';"><span class="usme" id="lastm">' ,$txt['edit_permissions'], '</span></li> </ul>

</div>

</td><td style="position:relative; left:50px;">
<div id="menop" onmouseover="muestra(\'header-mod-menu\');" onmouseout="ocultar(\'header-mod-menu\');" onclick="location.href=\'?action=moderate\';">', $txt['moderate'] ,'</div>

<div id="header-mod-menu" class="header-menu" onmouseover="muestra(\'header-mod-menu\');" onmouseout="ocultar(\'header-mod-menu\');" style="display:none;">

<ul class="listano menu-gris"><li onclick="location.href=\'?action=moderate;area=reports\';"><span class="usme" id="mix2">' ,$txt['mc_reported_posts'], '</span></li></ul>

</div>

</td>'; ?>

</tr></tbody></table>
</div>

<div class="content"><div class="container">

<?php
if(!isset($_GET['function'])){
 $funcion='inicio';
}else {
 $funcion=$_GET['function'];
}

if($funcion=="inicio") {
 include_once('content.php');
}else if($funcion=="codes") {
 include_once('privada.php');
}else {
 //include_once('404.php');
 ?>

<h1 style="width:100%;text-align:center;">404 - P&aacute;gina no encontrada. :(</h1>

<?php
}
?>

</div>
<div class="push"></div>

<div id="footer" class="pt">
<br>
<?php 
$fp = fopen("id.txt","r");  
//Se abre el archivo contador.txt, la r de read 


$visitas = intval(fgets($fp));  
// Se lee las visitas y se indica con intval para que se devuela un valor entero 

$visitas++;  
//Se agregan las visitas 

fclose($fp);  
// Se cierra el archivo 

$fp = fopen("id.txt","w");  
// Se abre en modo de escritura 

fputs($fp,$visitas);  
// Se escriben las visitas  
?>
<?php echo text9." "; ?>
<?
echo number_format($visitas);  
// Se muestran las visitas 
?> <?php echo text6; ?><br>|| <?php echo text7; ?> || (Skype: <h3 style="display: inline;">ikillnukes</h3>) ||<br><font color="000000">||</font> <a href="hack.php"><?php echo text8; ?></a> <font color="000000">||</font><br><br>
</div>

</div></div>

</div>

<div style="float: left; position: fixed;top:50%;margin-top:-125px;width:250px; height:250px; display:none;">
<div id="repro" style="width: 200px; height: 250px; background-color: rgb(255, 255, 255); border: 3px solid rgb(0, 0, 0); visibility: hidden; top: 4px; left: -4px;position: relative;"><object width="200" height="250" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="gsPlaylist8363415719" name="gsPlaylist8363415719"><param name="movie" value="http://grooveshark.com/widget.swf"><param name="wmode" value="window"><param name="allowScriptAccess" value="always"><param name="flashvars" value="hostname=grooveshark.com&amp;playlistID=83634157&amp;p=0&amp;bbg=000000&amp;bth=000000&amp;pfg=000000&amp;lfg=000000&amp;bt=FFFFFF&amp;pbg=FFFFFF&amp;pfgh=FFFFFF&amp;si=FFFFFF&amp;lbg=FFFFFF&amp;lfgh=FFFFFF&amp;sb=FFFFFF&amp;bfg=666666&amp;pbgh=666666&amp;lbgh=666666&amp;sbh=666666"><object type="application/x-shockwave-flash" data="http://grooveshark.com/widget.swf" width="200" height="250"><param name="wmode" value="window"><param name="allowScriptAccess" value="always"><param name="flashvars" value="hostname=grooveshark.com&amp;playlistID=83634157&amp;p=0&amp;bbg=000000&amp;bth=000000&amp;pfg=000000&amp;lfg=000000&amp;bt=FFFFFF&amp;pbg=FFFFFF&amp;pfgh=FFFFFF&amp;si=FFFFFF&amp;lbg=FFFFFF&amp;lfgh=FFFFFF&amp;sb=FFFFFF&amp;bfg=666666&amp;pbgh=666666&amp;lbgh=666666&amp;sbh=666666"><span><a href="http://grooveshark.com/search/playlist?q=IkillCraft%20Ikillnukes" title="IkillCraft by Ikillnukes on Grooveshark">IkillCraft by Ikillnukes on Grooveshark</a></span></object></object></div>
<div id="repro2" style="width:50px;height:250px;position:relative;top: -252px;left:-4px;" class="sh2" onclick="toggle_visibility();"><div style="width:100%;line-height:250px;font-weight:bold;color:#fff;"><span class="br" style="width:100%; font-size:12px; text-align:center; top:12px; left:-15px; position:relative;"><style>
.br {
    display: block;
    line-height:15px;
}
</style>R<br>e<br>p<br>r<br>o<br>d<br>u<br>c<br>t<br>o<br>r<br><br>M<br>P<br>3</span><center style="font-size:60px; position:relative; top:-230px; left:7px;" id="repro3">&raquo;</center></div></div>
</div>

</body>
</html>
