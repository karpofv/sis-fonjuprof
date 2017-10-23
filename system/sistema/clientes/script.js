$(document).ready(function() {
    $('#clientes').DataTable({
        "language": {
            "url": "<?php echo $ruta_base;?>/assets/js/Spanish.json"
        }
    });
});
