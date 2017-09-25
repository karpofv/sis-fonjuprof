<link href="<?php echo $ruta_base; ?>/assets/css/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $ruta_base; ?>/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tipo de prestamo</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&descripcion='+$('#descripcion').val()+'&amortizacion='+$('#amortizacion').val()+'&limite='+$('#limite').val()+'&cuotas='+$('#cuotas').val()+'&interes='+$('#interes').val()+'&editar=1&ver=1', 'verContenido'); return false;">
                    <div class="row">
                        <div class="col-sm-8" style="display: block;">
                            <label class="control-label" for="descripcion">Descripción</label>
                            <input class="form-control" id="descripcion" type="text" value="<?php echo $descripcion; ?>" required>
                            <input class="form-control" id="codigo" type="hidden" value="<?php echo $codigo; ?>"> 
                        </div>
                        <div class="col-sm-4" style="display: block;">
                            <label class="control-label" for="amortizacion">Tipo de amortización</label>
                            <select class="form-control" id="amortizacion">
                                <option value="">Seleccione una opción</option>
                                <?php
                                    combos::CombosSelect("1", $amortizacion, "amort_codigo, amort_descripcion", "config_amort", "amort_codigo", "amort_descripcion", "1=1")
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3" style="display: block;">
                            <label class="control-label" for="interes">Taza de interes</label>
                            <input class="form-control" id="interes" type="number" min="0" step="any" value="<?php echo $interes; ?>" required>
                        </div>
                        <div class="col-sm-3" style="display: block;">
                            <label class="control-label" for="cuotas">Cuotas</label>
                            <input class="form-control" id="cuotas" type="number" min="1" value="<?php echo $cuotas; ?>" required>
                        </div>
                        <div class="col-sm-3" style="display: block;">
                            <label class="control-label" for="limite">Monto limite</label>
                            <input class="form-control" id="limite" type="number" min="1" step="any" value="<?php echo $limite; ?>" required>
                        </div>
                        <div class="col-sm-2">
                            <br>
                            <input id="enviar" type="submit" value="Guardar" class="btn btn-primary col-md-offset-5"> </div>
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
                <h5>Tipos de prestamo registrados</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <table id="tipo_prestamo" class="table datatable">
                    <thead>
                        <tr>
                            <th>Tipo de prestamo</th>
                            <th>Tipo de amortización</th>
                            <th>Taza de interes</th>
                            <th>Cuotas</th>
                            <th>Límite</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($consuldescripcion as $row){
                        ?>
                        <tr>
                            <td><?php echo $row[prest_descripcion];?></td>
                            <td><?php echo $row[amort_descripcion];?></td>
                            <td><?php echo $row[prest_interes];?></td>
                            <td><?php echo $row[prest_cuotas];?></td>
                            <td><?php echo number_format($row[prest_limite],2);?></td>
                            <td><button class="btn btn-defaul" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[prest_codigo];?>&editar=1&ver=1', 'verContenido');">Editar</button></td>
                            <td><button class="btn btn-warning" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[prest_codigo];?>&eliminar=1&ver=1', 'verContenido');">Eliminar</button></td>
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