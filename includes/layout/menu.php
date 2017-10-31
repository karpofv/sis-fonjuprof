<?php
    if($_SESSION['usuario_tipo']==3){
        $consuldatospersonales = paraTodos::arrayConsulta("*", "persona", "per_cedula=$_SESSION[ci]");
        foreach($consuldatospersonales as $datospersonales){
            $nombre_perfil = $datospersonales[per_nombres];
            $apellido_perfil = $datospersonales[per_apellidos];
        }
    } else {        
        $consuldatospersonales = paraTodos::arrayConsulta("*", "usuarios", "Cedula=$_SESSION[ci]");
        foreach($consuldatospersonales as $datospersonales){
            $nombre_perfil = $datospersonales[Nombre];
            $apellido_perfil = $datospersonales[Apellido];
        }
    }
?>
    <nav class="navbar-default navbar-static-side nav-overflow" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle img-perfil-menu" src="<?php echo $img_perfil."/".$_SESSION[ci].".jpg?".rand();?>" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $apellido_perfil." ".$nombre_perfil;?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION[usuario_tipo];?> <b class="caret"></b></span> </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="javascript:void(0)" onclick="controler('dmn=11&ver=1', 'verContenido')">Perfil</a></li>
                            <li><a href="control.php?info=4">Salir</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <?php
                    $menu = new Menu();
                    $menu->menuprinc(1);
                ?>
            </ul>

        </div>
    </nav>
