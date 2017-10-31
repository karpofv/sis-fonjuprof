        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Imagen del perfil</h5>
                            <div class="ibox-tools">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)"  title="Edita tu foto de perfil">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="javascript:void(0)" onclick="controler('dmn=<?php echo $idMenu?>&act=2&ver=1','ventanaVer','')">Cambiar Foto</a>
                                    </li>
                                </ul>
                            </div>                            
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img alt="image" class="img-responsive" src="<?php echo $img_perfil."/".$_SESSION[ci].".jpg?".rand();?>">
                            </div>
                            <div class="ibox-content profile-content">
                                <h4><strong><?php echo $apellido." ".$nombre;?></strong></h4>
                                <h5>
                                    Dirección
                                </h5>
                                <p><?php echo $direccion;?></p>
                                <div class="row m-t-lg">
                                    <div class="col-md-4">
                                        <span class="bar">Teléfono</span>
                                        <h5><strong>Tlf.:</strong> <?php echo $telefono;?></h5>
                                    </div>
                                    <div class="col-md-8">
                                        <span class="line">Correo electrónico</span>
                                        <h5><strong>@:</strong> <?php echo $correo;?></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <span class="line">Nomina</span>
                                        <h5><strong><?php echo $nominaprint;?></strong></h5>
                                    </div>
                                    <div class="col-md-5">
                                        <span class="line">Fecha de ingreso</span>
                                        <h5><strong><?php echo paraTodos::convertDate($ingreso);?></strong></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="line">Banco</span>
                                        <h5><strong><?php echo $bancoprint;?></strong></h5>
                                    </div>
                                    <div class="col-md-8">
                                        <span class="line">Nº de cuenta</span>
                                        <h5><strong><?php echo $cuenta;?></strong></h5>
                                    </div>
                                </div>
                                <div class="well text-center"><?php echo $vicerrectorado;?></div>
                            </div>
                    </div>
                </div>
                    </div>
                <div class="col-md-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Actualiza tus datos</h5>
                        </div>
                        <div class="ibox-content">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1"> Datos Generales</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2">Datos bancarios</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-3">Datos nominales</a></li>                       
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <form class="form-horizontal" method="post" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&nombre='+$('#nombre').val()+'&apellidos='+$('#apellidos').val()+'&direccion='+$('#txtdirec').val()+'&telefono='+$('#txttelef').val()+'&fecnac='+$('#txtfecnac').val()+'&correo='+$('#txtcorreo').val()+'&editar=1&opcion=DP&ver=1', 'verContenido', ''); return false;" id="frmdatosgen">
                                    <div class="row">
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
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <form method="post" id="frmdatosban" action="javascript:void(0)" onsubmit="controler('dmn=<?php echo $idMenu;?>&codigo='+$('#codigo').val()+'&selbanco='+$('#selbanco').val()+'&cuenta='+$('#cuenta').val()+'&editar=1&opcion=DB&ver=1', 'verContenido', ''); return false;">
                                    <div class="row">
                                        <div class="col-sm-3" style="display: block;">
                                            <label for="selbanco">Banco</label>
                                            <select class="form-control" id="selbanco" required>
                                                <option value="">Seleccione una opción</option>
                                                <?php
                                                    combos::CombosSelect("1", "$selbanco", "ban_codigo, ban_descripcion", "config_banco", "ban_codigo", "ban_descripcion", "ban_status=1");
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-9" style="display: block;">
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
                    </div>
                </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>