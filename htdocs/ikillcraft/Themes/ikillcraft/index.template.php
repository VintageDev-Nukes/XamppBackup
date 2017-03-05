<?php require("SSI.php"); ?>
<?php
/**
 * Simple Machines Forum (SMF)
 *
 * @package SMF
 * @author Simple Machines
 * @copyright 2011 Simple Machines
 * @license http://www.simplemachines.org/about/smf/license.php BSD
 *
 * @version 2.0
 */

/*	This template is, perhaps, the most important template in the theme. It
	contains the main template layer that displays the header and footer of
	the forum, namely with main_above and main_below. It also contains the
	menu sub template, which appropriately displays the menu; the init sub
	template, which is there to set the theme up; (init can be missing.) and
	the linktree sub template, which sorts out the link tree.

	The init sub template should load any data and set any hardcoded options.

	The main_above sub template is what is shown above the main content, and
	should contain anything that should be shown up there.

	The main_below sub template, conversely, is shown after the main content.
	It should probably contain the copyright statement and some other things.

	The linktree sub template should display the link tree, using the data
	in the $context['linktree'] variable.

	The menu sub template should display all the relevant buttons the user
	wants and or needs.

	For more information on the templating system, please see the site at:
	http://www.simplemachines.org/
*/

// Initialize the template... mainly little settings.
function template_init()
{
	global $context, $settings, $options, $txt;

	/* Use images from default theme when using templates from the default theme?
		if this is 'always', images from the default theme will be used.
		if this is 'defaults', images from the default theme will only be used with default templates.
		if this is 'never' or isn't set at all, images from the default theme will not be used. */
	$settings['use_default_images'] = 'never';

	/* What document type definition is being used? (for font size and other issues.)
		'xhtml' for an XHTML 1.0 document type definition.
		'html' for an HTML 4.01 document type definition. */
	$settings['doctype'] = 'xhtml';

	/* The version this template/theme is for.
		This should probably be the version of SMF it was created for. */
	$settings['theme_version'] = '2.0';

	/* Set a setting that tells the theme that it can render the tabs. */
	$settings['use_tabs'] = true;

	/* Use plain buttons - as opposed to text buttons? */
	$settings['use_buttons'] = true;

	/* Show sticky and lock status separate from topic icons? */
	$settings['separate_sticky_lock'] = true;

	/* Does this theme use the strict doctype? */
	$settings['strict_doctype'] = false;

	/* Does this theme use post previews on the message index? */
	$settings['message_index_preview'] = false;

	/* Set the following variable to true if this theme requires the optional theme strings file to be loaded. */
	$settings['require_theme_strings'] = false;
}

// The main sub template above the content.
function template_html_above()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

	// Show right to left and the character set for ease of translating.
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"', $context['right_to_left'] ? ' dir="rtl"' : '', '>
<head>';

	// The ?fin20 part of this link is just here to make sure browsers don't cache it wrongly.
	echo '
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/index', $context['theme_variant'], '.css?fin20" />';

	// Some browsers need an extra stylesheet due to bugs/compatibility issues.
	foreach (array('ie7', 'ie6', 'webkit') as $cssfix)
		if ($context['browser']['is_' . $cssfix])
			echo '
	<link rel="stylesheet" type="text/css" href="', $settings['default_theme_url'], '/css/', $cssfix, '.css" />';

	// RTL languages require an additional stylesheet.
	if ($context['right_to_left'])
		echo '
	<link rel="stylesheet" type="text/css" href="', $settings['theme_url'], '/css/rtl.css" />';

	// Here comes the JavaScript bits!
	echo '
	<script type="text/javascript" src="', $settings['default_theme_url'], '/scripts/script.js?fin20"></script>
	<script type="text/javascript" src="', $settings['theme_url'], '/scripts/theme.js?fin20"></script>
	<script type="text/javascript"><!-- // --><![CDATA[
		var smf_theme_url = "', $settings['theme_url'], '";
		var smf_default_theme_url = "', $settings['default_theme_url'], '";
		var smf_images_url = "', $settings['images_url'], '";
		var smf_scripturl = "', $scripturl, '";
		var smf_iso_case_folding = ', $context['server']['iso_case_folding'] ? 'true' : 'false', ';
		var smf_charset = "', $context['character_set'], '";', $context['show_pm_popup'] ? '
		var fPmPopup = function ()
		{
			if (confirm("' . $txt['show_personal_messages'] . '"))
				window.open(smf_prepareScriptUrl(smf_scripturl) + "action=pm");
		}
		addLoadEvent(fPmPopup);' : '', '
		var ajax_notification_text = "', $txt['ajax_in_progress'], '";
		var ajax_notification_cancel_text = "', $txt['modify_cancel'], '";
	// ]]></script>
<script>

function muestra_oculta(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == \'block\') ? \'none\' : \'block\'; //damos un atributo display:none que oculta el div
}
}
window.onload = function(){/*hace que se cargue la funciÃ³n lo que predetermina que div estarÃ¡ oculto hasta llamar a la funciÃ³n nuevamente*/
muestra_oculta(\'contenido_a_mostrar\');/* "contenido_a_mostrar" es el nombre de la etiqueta DIV que deseamos mostrar */
}
function muestra(id){
div = document.getElementById(id);
div.style.display=\'block\';
}
function ocultar(id){
div2 = document.getElementById(id);
div2.style.display=\'none\';
}
</script>';

	echo '
	<meta http-equiv="Content-Type" content="text/html; charset=', $context['character_set'], '" />
	<meta name="description" content="', $context['page_title_html_safe'], '" />', !empty($context['meta_keywords']) ? '
	<meta name="keywords" content="' . $context['meta_keywords'] . '" />' : '', '
	<title>', $context['page_title_html_safe'], '</title>';

	// Please don't index these Mr Robot.
	if (!empty($context['robot_no_index']))
		echo '
	<meta name="robots" content="noindex" />';

	// Present a canonical url for search engines to prevent duplicate content in their indices.
	if (!empty($context['canonical_url']))
		echo '
	<link rel="canonical" href="', $context['canonical_url'], '" />';

	// Show all the relative links, such as help, search, contents, and the like.
	echo '
	<link rel="help" href="', $scripturl, '?action=help" />
	<link rel="search" href="', $scripturl, '?action=search" />
	<link rel="contents" href="', $scripturl, '" />
	<link rel="stylesheet" href="', $settings['theme_url'], '/web.css" />';

	// If RSS feeds are enabled, advertise the presence of one.
	if (!empty($modSettings['xmlnews_enable']) && (!empty($modSettings['allow_guestAccess']) || $context['user']['is_logged']))
		echo '
	<link rel="alternate" type="application/rss+xml" title="', $context['forum_name_html_safe'], ' - ', $txt['rss'], '" href="', $scripturl, '?type=rss;action=.xml" />';

	// If we're viewing a topic, these should be the previous and next topics, respectively.
	if (!empty($context['current_topic']))
		echo '
	<link rel="prev" href="', $scripturl, '?topic=', $context['current_topic'], '.0;prev_next=prev" />
	<link rel="next" href="', $scripturl, '?topic=', $context['current_topic'], '.0;prev_next=next" />';

	// If we're in a board, or a topic for that matter, the index will be the board's index.
	if (!empty($context['current_board']))
		echo '
	<link rel="index" href="', $scripturl, '?board=', $context['current_board'], '.0" />';

	// Output any remaining HTML headers. (from mods, maybe?)
	echo $context['html_headers'];

	echo '
</head>
<body>';
}

function template_body_above()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

	echo !empty($settings['forum_width']) ? '
<div style="width:90%; margin: 0 auto;margin-bottom: 40px;">' : '', '
	<div class="top">
<img src="http://i.imgur.com/XZtiBPp.png" style="position:relative; top:50%; margin-top:-45px; height:90px; left:20px;">

		</div>
<div id="menubar">



</div>

<div id="body">
		
<div id="fops">

<table style="color:#000; font-size:12px; font-family:Arial Black;top: 0px;position: relative;" id="table">
<tbody><tr>
<td><div id="options" style="position: relative;top: -1px;" class="index" onclick="location.href=\'?action=inicio\';">Inicio</div></td>
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

</td>';

echo '</tr></tbody></table>
</div>'; }

	elseif (!empty($context['show_login_bar']))
	{ echo '
	<div id="header-ide">

<table style="color:#000; font-size:12px; font-family:Arial Black; margin:5px;" id="table">
<tbody><tr>
<td><div id="options" onclick="muestra_oculta(\'header-login-balloon\');">Iniciar sesi&oacute;n &#9660;</div><div id="header-login-balloon" class="globoC" style="display: none;"><img src="pico.png" style="position:relative;top: -27px;left: 144px;">

<div style="position:relative;top:-8px;">
<script type="text/javascript" src="', $settings['default_theme_url'], '/scripts/sha1.js"></script>
				<form id="guest_form" action="', $scripturl, '?action=login2" method="post" accept-charset="', $context['character_set'], '" ', empty($context['disable_login_hashing']) ? ' onsubmit="hashLoginPassword(this, \'' . $context['session_id'] . '\');"' : '', '>
					<input type="text" name="user" size="10" class="input_text2" placeholder="Nombre de usuario o email" title="Escribe tu nombre de jugador o tu email." id="userballoon-login" value="" size="15" maxlength="254" /><br><br>
					<input type="password" name="passwrd" size="10" class="input_password2" placeholder="Contrase&ntilde;a" title="Escribe tu contrase&ntilde;a." id="passballoon-login" value="" size="15" maxlength="254" />
					<div class="info">Duraci&oacute;n de la sesi&oacute;n:</div>
					<select name="cookielength" class="duration">
						<option value="60">', $txt['one_hour'], '</option>
						<option value="1440">', $txt['one_day'], '</option>
						<option value="10080">', $txt['one_week'], '</option>
						<option value="43200">', $txt['one_month'], '</option>
						<option value="-1" selected="selected">', $txt['forever'], '</option>
					</select><br><br>
					<div class="sulog">
					<input style="line-height: 0;" type="submit" value="', $txt['login'], '" class="boton2 verde" id="header-login-button" /></div><br />
					</div>

</div></td>
<td style="position:relative;left:5px;top: -3px;"><div id="header-register-button" class="boton2 verde" title="RegiÂ­strate como nuevo jugador" onclick="location.href=\'?action=register\';">Registro</div></td><td style="position:relative;left:10px;"><select style="height:42px;width: 200px;" name="mediatype">
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
</td></tr></tbody></table>
</div>'; }

echo '';

echo '</div>';

	

	// The main content should go here.
	echo '
	<div id="content_section"><div class="frame">
		<div id="main_content_section">';

	// Custom banners and shoutboxes should be placed here, before the linktree.

	// Show the navigation tree.
	theme_linktree();
}

function template_body_below()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

	echo '
		</div></div>
<div id="pt">

<br>Esta p&aacute;gina ha obtenido ';

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
 

echo number_format($visitas);  
// Se muestran las visitas 
echo ' visitas.<br>|| P&aacute;gina hecha por Ikillnukes. || (Skype: <h3 style="display: inline;">ikillnukes</h3>) ||<br><font color="000000">||</font> <a href="hack.php">T&eacute;rminos legales</a> <font color="000000">||</font><br><br>

	</div></div>';

	// Show the load time?
	if ($context['show_load_time'])
		echo '
		<p>', $txt['page_created'], $context['load_time'], $txt['seconds_with'], $context['load_queries'], $txt['queries'], '</p>';

	echo '
	</div></div>', !empty($settings['forum_width']) ? '
</div></div>' : '';
}

function template_html_below()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

	echo '
</body></html>';
}

// Show a linktree. This is that thing that shows "My Community | General Category | General Discussion"..
function theme_linktree($force_show = false)
{
	global $context, $settings, $options, $shown_linktree;

	// If linktree is empty, just return - also allow an override.
	if (empty($context['linktree']) || (!empty($context['dont_default_linktree']) && !$force_show))
		return;

	echo '
	<div class="navigate_section">
		';

	// Each tree item has a URL and name. Some may have extra_before and extra_after.
	foreach ($context['linktree'] as $link_num => $tree)
	{
		echo '
			<li style="list-style-type: none; display:inline-block;" ', ($link_num == count($context['linktree']) - 1) ? ' class="last"' : '', '>';

		// Show something before the link?
		if (isset($tree['extra_before']))
			echo $tree['extra_before'];

		// Show the link, including a URL if it should have one.
		echo $settings['linktree_link'] && isset($tree['url']) ? '
				<a href="' . $tree['url'] . '"><span>' . $tree['name'] . '</span></a>' : '<span>' . $tree['name'] . '</span>';

		// Show something after the link...?
		if (isset($tree['extra_after']))
			echo $tree['extra_after'];

		// Don't show a separator for the last one.
		if ($link_num != count($context['linktree']) - 1)
			echo ' &#187;';

		echo '
			</li>';
	}
	echo '
		
	</div>';

	$shown_linktree = true;
}

// Show the menu up top. Something like [home] [help] [profile] [logout]...
function template_menu()
{
	global $context, $settings, $options, $scripturl, $txt;

	echo '
		<div id="main_menu">
			<ul class="dropmenu" id="menu_nav">';

	foreach ($context['menu_buttons'] as $act => $button)
	{
		echo '
				<li id="button_', $act, '">
					<a class="', $button['active_button'] ? 'active ' : '', 'firstlevel" href="', $button['href'], '"', isset($button['target']) ? ' target="' . $button['target'] . '"' : '', '>
						<span class="', isset($button['is_last']) ? 'last ' : '', 'firstlevel">', $button['title'], '</span>
					</a>';
		if (!empty($button['sub_buttons']))
		{
			echo '
					<ul>';

			foreach ($button['sub_buttons'] as $childbutton)
			{
				echo '
						<li>
							<a href="', $childbutton['href'], '"', isset($childbutton['target']) ? ' target="' . $childbutton['target'] . '"' : '', '>
								<span', isset($childbutton['is_last']) ? ' class="last"' : '', '>', $childbutton['title'], !empty($childbutton['sub_buttons']) ? '...' : '', '</span>
							</a>';
				// 3rd level menus :)
				if (!empty($childbutton['sub_buttons']))
				{
					echo '
							<ul>';

					foreach ($childbutton['sub_buttons'] as $grandchildbutton)
						echo '
								<li>
									<a href="', $grandchildbutton['href'], '"', isset($grandchildbutton['target']) ? ' target="' . $grandchildbutton['target'] . '"' : '', '>
										<span', isset($grandchildbutton['is_last']) ? ' class="last"' : '', '>', $grandchildbutton['title'], '</span>
									</a>
								</li>';

					echo '
							</ul>';
				}

				echo '
						</li>';
			}
				echo '
					</ul>';
		}
		echo '
				</li>';
	}

	echo '
			</ul>
		</div>';
}

// Generate a strip of buttons.
function template_button_strip($button_strip, $direction = 'top', $strip_options = array())
{
	global $settings, $context, $txt, $scripturl;

	if (!is_array($strip_options))
		$strip_options = array();

	// List the buttons in reverse order for RTL languages.
	if ($context['right_to_left'])
		$button_strip = array_reverse($button_strip, true);

	// Create the buttons...
	$buttons = array();
	foreach ($button_strip as $key => $value)
	{
		if (!isset($value['test']) || !empty($context[$value['test']]))
			$buttons[] = '
				<li><a' . (isset($value['id']) ? ' id="button_strip_' . $value['id'] . '"' : '') . ' class="button_strip_' . $key . (isset($value['active']) ? ' active' : '') . '" href="' . $value['url'] . '"' . (isset($value['custom']) ? ' ' . $value['custom'] : '') . '><span>' . $txt[$value['text']] . '</span></a></li>';
	}

	// No buttons? No button strip either.
	if (empty($buttons))
		return;

	// Make the last one, as easy as possible.
	$buttons[count($buttons) - 1] = str_replace('<span>', '<span class="last">', $buttons[count($buttons) - 1]);

	echo '
		<div class="buttonlist', !empty($direction) ? ' float' . $direction : '', '"', (empty($buttons) ? ' style="display: none;"' : ''), (!empty($strip_options['id']) ? ' id="' . $strip_options['id'] . '"': ''), '>
			<ul>',
				implode('', $buttons), '
			</ul>
		</div>';
}

?>
