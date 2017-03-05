<?php

$id = @$_GET['id'];

$arr = array(
	0 => 'Ballistic Physics',
	1 => 'Advanced Crosshair');

$arr2 = array(
	0 => 'wG22uIqod9c', 
	1 => '_R_qwoK49nw');

$arr3 = array(
	0 => $lang["p1_desc"],
	1 => $lang["p2_desc"]);

if(!isset($id)) {die('No hay ID.');}
if(!array_key_exists($id, $arr)) {die('La ID actuual no corresponde a ningún juego.');}

echo '
<center>
<h1>'.$arr[$id].'</h1>
<iframe width="420" height="315" frameBorder="0"
src="http://www.youtube.com/embed/'.$arr2[$id].'">
</iframe>
<br><br>
'.$arr3[$id].'
<h3>Ver Asset en el AssetStore</h3>
</center>';

?>
