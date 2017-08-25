<?php include("includes/conf/parametros.php");?>
<?php include("includes/layout/headp.php");?>
<body class="bg-login">
    <div class="loginColumns animated fadeInDown">
        <div class="row panel-wellcom">
            <?php
            if($_GET[info]!=""){
                $error_msg = $info[$_GET[info]];
            ?>
            <div class="row animated flipInY">
                <div class="alert alert-error-login alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo $error_msg;?>
                </div>                
            </div>   
            <?php
            }
            ?>
            <div class="col-md-6">
                <h2 class="font-bold">Bienvenido a FONJUPROF</h2>

                <p class="text-justify">
                    FONJUPROF-UNELLEZ, tiene como misión el mantenimiento, incremento, manejo, inversión y aplicación del Fondo de Jubilaciones y Pensiones del Personal Académico de la UNELLEZ
                </p>

                <p class="text-justify">
                    para obtener la mayor rentabilidad posible, y contribuir anualmente con la Universidad Nacional Experimental de los Llanos Occidentales Ezequiel Zamora (UNELLEZ)
                </p>

                <p class="text-justify">
                    en el pago que ella debe hacer del monto de la Jubilaciones y Pensiones otorgadas o por otorgar de su personal Docente y de Investigación.
                </p>

                <p class="text-justify">
                    <small>Teléfonos: 0273 - 5331575 / 5331667</small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="index2.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Usuario" id="user" name="user" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña" id="pass" name="pass" required="">
                        </div>
                        <button type="submit" class="btn btn-warning block full-width m-b">Ingresar</button>

                        <a href="#">
                            <small>¿Olvidó la contraseña?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>¿No estas registrado?</small>
                        </p>
                        <a class="btn btn-sm btn-danger btn-block" href="register.html">Crear una cuenta</a>
                    </form>
                    <p class="m-t">
                        
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <b>
                    Copyright FONJUPROF
                </b>
            </div>
            <div class="col-md-6 text-right">
                <small><b>© 2017-2018</b></small>
            </div>
        </div>
    </div>
<?php include("includes/layout/footp.php");?>   