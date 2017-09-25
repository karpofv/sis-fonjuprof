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
                            </div>                            
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img alt="image" class="img-responsive" src="<?php echo $img_perfil."/".$_SESSION['imgperfil'];?>">
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
                                        <h5><strong><?php echo $nomina;?></strong></h5>
                                    </div>
                                    <div class="col-md-5">
                                        <span class="line">Fecha de ingreso</span>
                                        <h5><strong><?php echo paraTodos::convertDate($fecing);?></strong></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="line">Banco</span>
                                        <h5><strong><?php echo $banco;?></strong></h5>
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

                        </div>
                    </div>

                </div>
            </div>
        </div>