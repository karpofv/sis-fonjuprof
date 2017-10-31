<div id="resultado"></div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Cola de solicitudes</h5>
                <div class="ibox-tools">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="control.php?ver=1&act=4&dmn=<?php echo $idMenu;?>" target="_blank">Imprimir Todo</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover" id="solicitudes">
                    <thead>
                        <tr>
                            <td>Puesto</td>
                            <td>Fecha</td>
                            <td>Vicerrectorado</td>
                            <td>Cédula</td>
                            <td>Nombre y Apellido</td>
                            <td>Tipo de Prestamo</td>
                            <td>Monto</td>
                            <td>Estatus</td>
                            <td>Aprobar</td>
                            <td>Rechazar</td>
                            <td>Imprimir</td>
                        </tr>
                    </thead>
                    <tbody>
                        	<?php
                                $consulvicec = paraTodos::arrayConsulta("*", "config_ubicacion", "1=1");
                                foreach($consulvicec as $row){
                                    $puesto = 0;
                                    $vicecpuesto = $row[ubic_codigo];
                                    $consulsol = paraTodos::arrayConsulta("s.sol_codigo,s.sol_fecha, p.prest_descripcion, ac.amort_descripcion, s.sol_monto, cs.st_descripcion,ubic_descripcion, c.cli_cedula, c.cli_nombres, c.cli_apellidos", "solicitudes s, clientes c, prestamos p, config_amort ac, config_status cs, cliente_nomina cn, config_ubicacion cu", "cn.clienn_clicodigo=c.cli_codigo and sol_asoccodigo=c.cli_codigo  and s.sol_prestcodigo=prest_codigo and ac.amort_codigo=s.sol_amortcodigo and cs.st_codigo=s.sol_status and clienn_ubiccodigo=$vicecpuesto and cu.ubic_codigo=clienn_ubiccodigo and sol_status<>5 and sol_status<>6");
                                    foreach($consulsol as $row){
                                        $puesto=$puesto+1;
                                ?>
                            <tr id="tr<?php echo $row[sol_codigo];?>">
                                    <td><?php echo $puesto;?></td>
                                    <td><?php echo paraTodos::convertDate($row[sol_fecha]);?></td>
                                    <td><?php echo $row[ubic_descripcion];?></td>
                                    <td><?php echo $row[cli_cedula];?></td>
                                    <td><?php echo $row[cli_nombres]." ".$row[cli_apellidos];?></td>
                                    <td><?php echo $row[prest_descripcion];?></td>
                                    <td><?php echo number_format ( $row[sol_monto],2, ',','.' );?></td>
                                    <td><?php echo $row[st_descripcion];?></td>
                                    <?php
                                        if($row[st_descripcion]<>'5' and $row[st_descripcion]<>'6'){

                                    ?>
                                    <td class="text-center">
                                        <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&act=20&actd=1&ver=1&codigo=<?php echo $row[sol_codigo];?>&status=5','verContenido','');controler('dmn=<?php echo $idMenu;?>&ver=1', 'verContenido')"><i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&act=20&actd=1&ver=1&codigo=<?php echo $row[sol_codigo];?>&status=6','verContenido',''); controler('dmn=<?php echo $idMenu;?>&ver=1', 'verContenido')"><i class="fa fa-eraser"></i>
                                        </a>
                                    </td>
                                <?php
                                        } else{
                                            ?>
                                <td></td>
                                <td></td>
                                            <?php
                                        }
                                ?>
                                <td class="text-center"><a href="<?php echo $ruta_base."system/control.php?dmn=$idMenu&act=3&ver=1&id=$row[sol_codigo]"?>" target="_blank"><i class="fa fa-print"></i></a></td>
                            </tr>
                                <?php
                                    }
                                }
                                    $consulsol = paraTodos::arrayConsulta("s.sol_codigo,s.sol_fecha, p.prest_descripcion, ac.amort_descripcion, s.sol_monto, cs.st_descripcion,ubic_descripcion, c.cli_cedula, c.cli_nombres, c.cli_apellidos", "solicitudes s, clientes c, prestamos p, config_amort ac, config_status cs, cliente_nomina cn, config_ubicacion cu", "cn.clienn_clicodigo=c.cli_codigo and sol_asoccodigo=c.cli_codigo  and s.sol_prestcodigo=prest_codigo and ac.amort_codigo=s.sol_amortcodigo and cs.st_codigo=s.sol_status and cu.ubic_codigo=clienn_ubiccodigo and (sol_status=5 or sol_status=6)");
                                    foreach($consulsol as $row){
                                ?>
                            <tr id="tr<?php echo $row[sol_codigo];?>">
                                    <td class="text-center"><i class="fa fa-certificate font-green"></i></td>
                                    <td class="text-center"><?php echo paraTodos::convertDate($row[sol_fecha]);?></td>
                                    <td class="text-center"><?php echo $row[ubic_descripcion];?></td>
                                    <td class="text-center"><?php echo $row[cli_cedula];?></td>
                                    <td class="text-center"><?php echo $row[cli_nombres]." ".$row[cli_apellidos];?></td>
                                    <td class="text-center"><?php echo $row[prest_descripcion];?></td>
                                    <td class="text-center"><?php echo number_format ( $row[sol_monto],2, ',','.' );?></td>
                                    <td class="text-center"><?php echo $row[st_descripcion];?></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center"><a href="control.php?ver=1&act=3&dmn=<?php echo $idMenu;?>&cod=<?php echo $row[sol_codigo];?>" target="_blank"><i class="fa fa-print"></i></a></td>
                            </tr>
                                <?php
                                    }
                                ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- /.row -->
</div>
