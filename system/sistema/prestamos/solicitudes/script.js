$('#solicitudes').DataTable({
    "language": {
        "url": "<?php echo $ruta_base;?>/assets/js/Spanish.json",
    }
    , dom: 'Bfrtip'
    , buttons: [
        {
            extend: 'copy'
            , text: 'Copiar'
        }
        , {
            extend: 'excel'
            , title: 'Cola de solicitud de prestamos'
        }
        , {
            extend: 'pdf'
            , title: 'Cola de solicitud de prestamos'
        },
        {
            extend: 'print'
            , text: 'Imprimir'
            , customize: function (win) {
                $(win.document.body).addClass('white-bg');
                $(win.document.body).css('font-size', '10px');
                $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
            }
        }
    ]
});
