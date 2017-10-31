<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tipo de amortización</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&descripcion='+$('#descripcion').val()+'&editar=1&ver=1', 'verContenido'); return false;">
                    <div class="row">
                        <div class="col-sm-10" style="display: block;">
                            <label class="control-label" for="descripcion">Descripción</label>
                            <input class="form-control" id="descripcion" type="text" value="<?php echo $descripcion; ?>" required>
                            <input class="form-control" id="codigo" type="hidden" value="<?php echo $codigo; ?>"> 
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
                <h5>Tipos de amortización registrados</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <table id="tipo_amortizacion" class="table datatable">
                    <thead>
                        <tr>
                            <th>Tipo de amortización</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($consuldescripcion as $row){
                        ?>
                        <tr>
                            <td><?php echo $row[amort_descripcion];?></td>
                            <td><button class="btn btn-defaul" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[amort_codigo];?>&editar=1&ver=1', 'verContenido');">Editar</button></td>
                            <td><button class="btn btn-warning" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[amort_codigo];?>&eliminar=1&ver=1', 'verContenido');">Eliminar</button></td>
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