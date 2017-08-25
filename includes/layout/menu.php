<?php
    $consuldatospersonales = paraTodos::arrayConsulta("*", "persona", "per_cedula=$_SESSION[ci]");
    foreach($consuldatospersonales as $datospersonales){
        $nombre_perfil = $datospersonales[per_nombres];
        $apellido_perfil = $datospersonales[per_apellidos];
    }
?>
    <nav class="navbar-default navbar-static-side nav-overflow" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle img-perfil-menu" src="<?php echo $img_perfil."/".$_SESSION[imgperfil];?>" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $apellido_perfil." ".$nombre_perfil;?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION[usuario_tipo];?> <b class="caret"></b></span> </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
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
