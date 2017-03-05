var statusIntervalId = window.setInterval(gop, 5000);

function gop() {
    var otime = document.getElementById('otime');
    var data = otime.options[otime.selectedIndex].value;
    $.ajax({
        url: 'ajax_operator.php',
        data: 'action=getOnlinePeople&data='+data,
        dataType: 'text',
        success: function(data) {
            var _gop = document.getElementById('gop')
            if(_gop.innerHTML != data) {
                _gop.innerHTML = data;
                _gop.style.color = "#ff0000";
                setTimeout(function () {
                    _gop.style.color = "#fff";
                }, 250);
            }
        }
    });
}