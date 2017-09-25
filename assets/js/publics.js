function controler(xdata, xventana) {
    $.ajax({
        async: true
        , url: 'control.php'
        , type: 'POST'
        , data: xdata
        , ajaxSend: $('#' + xventana).html(cargando)
        , success: function (html) {
            $('#'+xventana).html(html);
        }
    });
}
var cargando = '<center><img style="margin-top: 10px;height:40px;width:80px;" src="../assets/img/cargando.gif" border="0"> Cargando...</center>';
