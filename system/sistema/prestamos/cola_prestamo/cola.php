<link href="<?php echo $ruta_base; ?>/assets/css/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $ruta_base; ?>/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Cola de prestamos</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&fecdesde='+$('#fecdesde').val()+'&fechasta='+$('#fechasta').val()+'&selvice='+$('#selvice').val()+'&seltipopres='+$('#seltipopres').val()+'&oferta='+$('#oferta').val()+'&editar=1&ver=1', 'verContenido'); return false;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Fecha de apertura</label>
                            <input type="hidden" id="codigo" value="<?php echo $codigo;?>">
                            <input type="date" class="form-control" id="fecdesde" value="<?php echo $fecdesde;?>" required>
                        </div>
                        <div class="col-sm-4">
                            <label>Fecha de cierre</label>
                            <input type="date" class="form-control" id="fechasta" value="<?php echo $fechasta;?>">
                        </div>
                        <div class="col-sm-4">
                            <label>Vicerrectorado</label>
                            <select class="form-control" id="selvice" required>
                                <option value="">Seleccione una opción</option>
                                <?php
                                    combos::CombosSelect("1", "$selvice", "*", "config_ubicacion", "ubic_codigo", "ubic_descripcion", "1=1 order by ubic_descripcion");
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Tipo de prestamo</label>
                            <select class="form-control" id="seltipopres" required>
                                <option value="">Seleccione una opción</option>
                                <?php
                                    combos::CombosSelect("1", "$seltipopres", "*", "prestamos", "prest_codigo", "prest_descripcion", "1=1 order by prest_descripcion");
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Cantidad a ofertar</label>
                            <input type="number" class="form-control" id="oferta" value="<?php echo $oferta;?>" min="1" required>
                        </div>                        
                        <div class="col-sm-2">
                            <br>
                            <input id="enviar" type="submit" value="Guardar" class="btn btn-primary col-md-offset-5">
                        </div>
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
                <h5>Procesos de oferta registrados</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <table id="cola_prestamo" class="table datatable">
                    <thead>
                        <tr>
                            <th>Desde</th>
                            <th>Hasta</th>
                            <th>Vicerrectorado</th>
                            <th>Tipo de prestamo</th>
                            <th>Oferta</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($consuldescripcion as $row){
                        ?>
                        <tr>
                            <td><?php echo $row[col_fecdesde];?></td>
                            <td><?php echo $row[col_fechasta];?></td>
                            <td><?php echo $row[ubic_descripcion];?></td>
                            <td><?php echo $row[prest_descripcion];?></td>
                            <td><?php echo $row[col_cantidad];?></td>
                            <td><button class="btn btn-defaul" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[col_codigo];?>&editar=1&ver=1', 'verContenido');">Editar</button></td>
                            <td><button class="btn btn-warning" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[col_codigo];?>&eliminar=1&ver=1', 'verContenido');">Eliminar</button></td>
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