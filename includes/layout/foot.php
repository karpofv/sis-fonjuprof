</div>
</div>
</div>
<!-- Mainly scripts -->
    <script src="<?php echo $ruta_base;?>/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $ruta_base;?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $ruta_base;?>/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo $ruta_base;?>/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?php echo $ruta_base;?>/assets/js/inspinia.js"></script>
    <script src="<?php echo $ruta_base;?>/assets/js/plugins/pace/pace.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?php echo $ruta_base;?>/assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo $ruta_base;?>/assets/js/plugins/toastr/toastr.min.js"></script>
    <!-- Tinycon -->
    <script src="<?php echo $ruta_base;?>/assets/js/plugins/tinycon/tinycon.min.js"></script>
    <script src="<?php echo $ruta_base;?>/assets/js/publics.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('Administración de prestamos', 'Bienvenido a FONJUPROF');
            }, 1300);
        });
</script>
</body>
</html>
