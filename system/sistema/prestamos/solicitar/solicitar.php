<link href="<?php echo $ruta_base; ?>/assets/css/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $ruta_base; ?>/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Solicitud de prestamo</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&descripcion='+$('#descripcion').val()+'&amortizacion='+$('#amortizacion').val()+'&limite='+$('#limite').val()+'&cuotas='+$('#cuotas').val()+'&interes='+$('#interes').val()+'&editar=1&ver=1', 'verContenido'); return false;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="control-label" for="selprest">Tipo de prestamo</label>
                            <select class="form-control" id="selprest" onchange="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#selprest').val()+'&ver=1&act=20&actd=1','lblimite')" required>
                                <option value="">Seleccione una opción</option>
                                <?php
                                    combos::CombosSelect("1", $selprest, "prest_codigo, prest_descripcion", "prestamos", "prest_codigo", "prest_descripcion", "1=1 order by prest_descripcion")
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label><b>Monto limite: </b><div id="lblimite"></div></label>
                        </div>
                        <div class="col-sm-4">
                            <label>Monto a solicitar</label>
                            <input type="number" min="0" step="any" class="form-control" id="txtmonto" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="control-label" for="seltipoamort">Forma de pago</label>
                            <select class="form-control" id="seltipoamort" required>
                                <option value="">Seleccione una opción</option>
                                <?php
                                    combos::CombosSelect("1", $selprest, "amort_codigo, amort_descripcion", "config_amort", "amort_codigo", "amort_descripcion", "1=1 order by amort_descripcion")
                                ?>
                            </select>
                        </div>                        
                        <div class="col-sm-2">
                            <br>
                            <input id="enviar" type="submit" value="Solicitar" class="btn btn-primary col-md-offset-5"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>solicitudes realizadas</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <table id="tipo_prestamo" class="table datatable">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Tipo de prestamo</th>
                            <th>Tipo de amortización</th>
                            <th>Monto</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($consuldescripcion as $row){
                        ?>
                        <tr>
                            <td><?php echo $row[sol_fecha];?></td>
                            <td><?php echo $row[sol_prestcodigo];?></td>
                            <td><?php echo number_format($row[sol_monto],2);?></td>
                            <td><?php echo $row[st_descripcion];?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>