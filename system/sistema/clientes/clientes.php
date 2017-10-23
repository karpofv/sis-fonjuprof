<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Asociados</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1"> Datos Generales</a></li>
                        <?php
                            if($codigo!=""){
                        ?>
                        <li class=""><a data-toggle="tab" href="#tab-2">Datos bancarios</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-3">Datos nominales</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-4">Datos de acceso</a></li>
                        <?php
                            }
                        ?>                        
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&cedula='+$('#cedula').val()+'&nombre='+$('#nombre').val()+'&apellidos='+$('#apellidos').val()+'&direccion='+$('#txtdirec').val()+'&telefono='+$('#txttelef').val()+'&fecnac='+$('#txtfecnac').val()+'&correo='+$('#txtcorreo').val()+'&editar=1&opcion=DP&ver=1', 'verContenido', ''); return false;" id="frmdatosgen">
                                    <div class="row">
                                        <div class="col-sm-2" style="display: block;">
                                            <label class="control-label" for="cedula">Cédula</label>
                                            <input class="form-control" id="cedula" type="number" value="<?php echo $cedula; ?>" required>
                                            <input class="form-control" id="codigo" type="hidden" value="<?php echo $codigo; ?>"> </div>
                                        <div class="col-sm-5" style="display: block;">
                                            <label class="control-label" for="nombre">Nombres</label>
                                            <input class="form-control" id="nombre" type="text" value="<?php echo $nombre;?>" required> </div>
                                        <div class="col-sm-5" style="display: block;">
                                            <label class="control-label" for="apellidos">Apellidos</label>
                                            <input class="form-control" id="apellidos" type="text" value="<?php echo $apellidos;?>" required> </div>
                                        <div class="col-sm-12">
                                            <label class="control-label" for="txtdirec">Dirección</label>
                                            <textarea id="txtdirec" class="form-control" required><?php echo $direccion; ?></textarea>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label" for="txttelef">Teléfono</label>
                                            <input type="tel" id="txttelef" class="form-control" value="<?php echo $telefono;?>" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label" for="txtfecnac">Fecha de nacimiento</label>
                                            <input type="date" id="txtfecnac" class="form-control" value="<?php echo $fecnac;?>" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label" for="txtcorreo">Correo electrónico</label>
                                            <input type="email" id="txtcorreo" class="form-control" value="<?php echo $correo;?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <br>
                                            <input id="enviar" type="submit" value="Guardar" class="btn btn-primary col-md-offset-5"> </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                            if($codigo!=""){
                        ?>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <form method="post" id="frmdatosban" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&selbanco='+$('#selbanco').val()+'&cuenta='+$('#cuenta').val()+'&editar=1&opcion=DB&ver=1', 'verContenido', ''); return false;">
                                    <div class="row">
                                        <div class="col-sm-2" style="display: block;">
                                            <label for="selbanco">Banco</label>
                                            <select class="form-control" id="selbanco" required>
                                                <option value="">Seleccione una opción</option>
                                                <?php
                                                    combos::CombosSelect("1", "$selbanco", "ban_codigo, ban_descripcion", "config_banco", "ban_codigo", "ban_descripcion", "ban_status=1");
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-10" style="display: block;">
                                            <label for="cuenta">Nº de cuenta</label>
                                            <input type="text" class="form-control" id="cuenta" value="<?php echo $cuenta;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <br>
                                            <input id="enviar" type="submit" value="Actualizar" class="btn btn-primary col-md-offset-5"> </div>
                                    </div>                                    
                                </form>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                                <form method="post" id="frmdatosnominal" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&institucion='+$('#selinstituto').val()+'&ubica='+$('#selubica').val()+'&selnomina='+$('#selnomina').val()+'&selcondicion='+$('#selcondicion').val()+'&fecingreso='+$('#fecingreso').val()+'&editar=1&opcion=DN&ver=1', 'verContenido', '');">
                                    <div class="row">
                                        <div class="col-sm-4" style="display: block;">
                                            <label for="selinstituto">Institución</label>
                                            <select class="form-control" id="selinstituto" onchange="controler('dmn=<?php echo $idMenu;?>&ver=1&act=20&actd=1&institucion='+$('#selinstituto').val(), 'selubica', ''); controler('dmn=<?php echo $idMenu;?>&ver=1&act=20&actd=2&institucion='+$('#selinstituto').val(), 'selnomina', '')" required>
                                                <option value="">Seleccione una opción</option>
                                                <?php
                                                combos::CombosSelect("1", "$institucion", "inst_codigo, inst_descripcion", "config_institucion", "inst_codigo", "inst_descripcion", "inst_codigo=1");
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="display: block;">
                                            <label for="selubica">Ubicación</label>
                                            <select class="form-control" id="selubica" required>
                                                <option value="">Seleccione una opción</option>
                                                <?php
                                                combos::CombosSelect("1", "$ubica", "ubic_codigo, ubic_descripcion", "config_ubicacion", "ubic_codigo", "ubic_descripcion", "ubic_instcodigo=$institucion");
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="display: block;">
                                            <label for="selnomina">Nomina</label>
                                            <select class="form-control" id="selnomina" required>
                                                <option value="">Seleccione una opción</option>
                                                <?php
                                                combos::CombosSelect("1", "$nomina", "nom_codigo, nom_descripcion", "config_nomina", "nom_codigo", "nom_descripcion", "nom_instcodigo=$institucion");
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="display: block;">
                                            <label for="selcondicion">Condición</label>
                                            <select class="form-control" id="selcondicion" required>
                                                <option value="">Seleccione una opción</option>
                                                <?php
                                                combos::CombosSelect("1", "$condicion", "cond_codigo, cond_descripcion", "config_condicion", "cond_codigo", "cond_descripcion", "cond_status=1");
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Fecha de ingreso</label>
                                            <input type="date" class="form-control" id="fecingreso" value="<?php echo $ingreso;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <br>
                                            <input id="enviar" type="submit" value="Actualizar" class="btn btn-primary col-md-offset-5"> </div>
                                    </div>                                    
                                </form>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane">
                            <div class="panel-body">
                                <form id="frmdatosacceso" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&cedula='+$('#cedula').val()+'&usuariouser='+$('#user').val()+'&passworduser='+$('#pass').val()+'&niveluser='+$('#selniveluser').val()+'&editar=1&opcion=DA&ver=1', 'verContenido', ''); return false;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="label-control">Usuario</label>
                                            <input type="text" class="form-control" id="user" value="<?php echo $usuariouser;?>" required>
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="label-control">Contraseña</label>
                                            <input type="password" class="form-control" id="pass" value="<?php echo $passworduser;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="display: block;">
                                        <label for="niveluser">Nivel</label>
                                        <select class="form-control" id="selniveluser" required>
                                            <option value="">Seleccione una opción</option>
                                            <?php
                                            combos::CombosSelect("1", "$niveluser", "perf_codigo, perf_descripcion", "perfiles", "perf_codigo", "perf_descripcion", "1=1");
                                            ?>
                                        </select>
                                    </div>                                    
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <br>
                                            <input id="enviar" type="submit" value="Actualizar" class="btn btn-primary col-md-offset-5"> </div>
                                    </div>                                    
                                </form>
                            </div>
                        </div>  
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Asociados registrados</h5>
                <div class="ibox-tools">
                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover" id="clientes">
                    <thead>
                        <tr>
                            <td class="text-center"><strong>Cédula</strong></td>
                            <td class="text-center"><strong>Nombres</strong></td>
                            <td class="text-center"><strong>Apellidos</strong></td>
                            <td class="text-center"><strong>Editar</strong></td>
                            <td class="text-center"><strong>Eliminar</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($consulta as $row){
                        ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo $row[cli_cedula];?>
                                </td>
                                <td class="text-center">
                                    <?php echo utf8_decode($row[cli_nombres]);?>
                                </td>
                                <td class="text-center">
                                    <?php echo utf8_decode($row[cli_apellidos]);?>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[cli_codigo];?>&editar=1&opcion=DP&ver=1', 'verContenido', '');"> <i class="fa fa-edit"></i> </a>
                                </td>
                                <td class="text-center"> <a href="javascript:void(0);" onclick="controler('dmn=<?php echo $idMenu;?>&codigo=<?php echo $row[cli_codigo];?>&eliminar=1&opcion=DP&ver=1', 'verContenido', '');"><i class="fa fa-eraser"></i>
                                    </a> </td>
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