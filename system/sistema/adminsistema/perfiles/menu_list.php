<?php
    ini_set('display_errors', false);
    ini_set('display_startup_errors', false);
    $campos    = "perf_descripcion";
    $tablas    = "perfiles";
    $consultas = "perf_codigo =$_POST[idperfil]";
    $dmn = $_POST['dmn'];
    $res_car =paraTodos::arrayConsulta($campos,$tablas,$consultas);
    foreach ($res_car as $row ) {
        $nombre_pefil=$row['perf_descripcion'];
    }
?>
    <div class="row-fluid" style="background: #FFFFFF;margin: 10px auto 10px auto;width: 100%;">
        <div class="span12">
            <!-- BEGIN BASIC PORTLET-->
            <div class="widget blue">
                <div style="color: #A50000;width: 100%;padding: 8px 0px 8px 7px; height: auto;font-weight: bold;overflow: hidden;font-size: 11pt;border: 1px solid #DDDDDD;background: #FAFAFA;;">
                    <h4>
                        <i class="icon-reorder"></i>  Configuraci&oacute;n del Perfil <b> (<?php echo $nombre_pefil; ?>)</b>
                    </h4> <a style="float:right;margin-right: 15px;margin-top: -10px;" onclick="var msg = confirm('Esta seguro que desea eliminar este Perfil?');
                    if (msg) {controler('ver=2&eliminar=<?php echo $_POST[idperfil]?>&dmn=<?php echo $dmn; ?>','verContenido');} return false;" href="javascript:void(0);">Eliminar el Perfil</a> </div>
                <div class="widget-body">
                    <table class="table table-bordered table-striped" style="width: 100%;" border="0">
                        <?php
                    $indicemenu=1;
                    $resultx=paraTodos::arrayConsulta("*", "menu","1=1 order by menu_codigo" );
                    foreach ($resultx as $row) {
                        $indicesubmenu=1;
                        $idmenus=$row["menu_codigo"];
                        $menu=$row["menu_descripcion"];
?>
                            <tr style="background: #EEEEEE;font-weight: bold;font-size: 13px;">
                                <td class="CeldaRecojeDatos" height="20">
                                    <?php
                              if ($_POST[idperfil]<>''){
                                //Se busca los menus que ya tenga ese perfil, si existen se chequean
                                $consulta_menu_perfiles=paraTodos::arrayConsulta("perdet_menucodigo,perdet_I,perdet_S,perdet_U,perdet_D,perdet_P", "perfiles_det", "perdet_perfcodigo=$_POST[idperfil]");
                                foreach($consulta_menu_perfiles as $resultado){
                                    $menu_del_perfil=$resultado["perdet_menucodigo"];
                                    $insertar=$resultado["perdet_I"];
                                    $modificar=$resultado["perdet_U"];
                                    $consultar=$resultado["perdet_S"];
                                    $eliminar=$resultado["perdet_D"];
                                    $imprimir=$resultado["perdet_P"];
                                    if  ($idmenus==$menu_del_perfil){
                                        $idmenu= "true";
                                    }
                                }
                            }
?>
                                    <span style="width: 350px;font-weight: 800;color: #000000;"><b><?php echo $menu;?></b></span> </td>
                                <td style="padding: 5px;font-weight: 700;color: #333333;">Consultar</td>
                                <td style="padding: 5px;font-weight: 700;color: #333333;">Insertar</td>
                                <td style="padding: 5px;font-weight: 700;color: #333333;">Modificar</td>
                                <td style="padding: 5px;font-weight: 700;color: #333333;">Eliminar</td>
                                <td style="padding: 5px;font-weight: 700;color: #333333;">Imprimir</td>
                            </tr>
                            <tr>
                                <div id="idmenuPert">
                                    <?php
                            $resultxw=paraTodos::arrayConsulta("*", "menu_submenu","subm_menucodigo='$idmenus' order by subm_menucodigo");
                            foreach ($resultxw as $roww){
                                $submenu1=$roww["subm_descripcion"];
                                $submenuID=$roww["subm_codigo"];
                                $submenuconexion=$roww["subm_menucodigo"];
                                $idSubMenuP='';
                                $psubMenu1="<i style='color: #FF0000;' class='glyphicon glyphicon-remove'></i>";
                                $psubMenu2="<i style='color: #FF0000;' class='glyphicon glyphicon-remove'></i>";
                                $psubMenu3="<i style='color: #FF0000;' class='glyphicon glyphicon-remove'></i>";
                                $psubMenu4="<i style='color: #FF0000;' class='glyphicon glyphicon-remove'></i>";
                                $psubMenu5="<i style='color: #FF0000;' class='glyphicon glyphicon-remove'></i>";
                                $contc=$contc+1;
                                if($contc=="1"){
                                    echo "	<tr class=\"item_claro\">";
                                    $color="#F6F6F6";
                                }else{
                                    echo "	<tr class=\"item_oscuro\">";
                                    $color="#FFFFFF";
                                    $contc="0";
                                }
?>
                                        <td class="CeldaRecojeDatos" height="20" style="padding: 5px;">
                                            <?php
                                $entre='';
                                if ($_POST[idperfil]<>'') {
                                    $consulta_sub_menu_perfiles=paraTodos::arrayConsulta("*", "perfiles_det", "perdet_submcodigo='$submenuID' and perdet_menucodigo='$idmenus' and perdet_perfcodigo = $_POST[idperfil]");
                                    foreach($consulta_sub_menu_perfiles as $resultado2){
                                        $submen=$resultado2["perdet_submcodigo"];
                                        $menu_del_perfil=$resultado["perdet_menucodigo"];
                                        $idSubMenuP=$resultado2["perdet_codigo"];
                                           $entre='1';
                                        $consultar=$resultado2["perdet_S"];
                                        if  ($consultar==1){
                                            $psubMenu1= "<i style='color: #36be00;' class='glyphicon glyphicon-check'></i>";
                                            $accC=0;
                                        }
                                        if  ($consultar==0){
                                            $psubMenu1= "<i style='color: #FF0000;' class='glyphicon glyphicon-remove'></i>";
                                            $accC=1;
                                        }
                                        $insertar=$resultado2["perdet_I"];
                                        if  ($insertar==1){
                                            $psubMenu2= "<i style='color: #36be00;' class='glyphicon glyphicon-check'></i>";
                                            $accI=0;
                                        }
                                        if  ($insertar==0){
                                            $psubMenu2= "<i style='color: #FF0000;' class='glyphicon glyphicon-remove'></i>";
                                            $accI=1;
                                        }
                                        $modificar=$resultado2["perdet_U"];
                                        if  ($modificar==1){
                                            $psubMenu3= "<i style='color: #36be00;' class='glyphicon glyphicon-check'></i>";
                                            $accM=0;
                                        }
                                        if  ($modificar==0){
                                            $psubMenu3= "<i style='color: #FF0000;' class='glyphicon glyphicon-remove'></i>";
                                            $accM=1;
                                        }
                                        $eliminar=$resultado2["perdet_D"];
                                        if  ($eliminar==1){
                                            $psubMenu4= "<i style='color: #36be00;' class='glyphicon glyphicon-check'></i>";
                                            $accE=0;
                                        }
                                        if  ($eliminar==0){
                                            $psubMenu4= "<i style='color: #FF0000;' class='glyphicon glyphicon-remove'></i>";
                                            $accE=1;
                                        }
                                        $imprimir=$resultado2["perdet_P"];
                                        if  ($imprimir==1){
                                            $psubMenu5= "<i style='color: #36be00;' class='glyphicon glyphicon-check'></i>";
                                            $accImp=0;
                                        }
                                        if  ($imprimir==0){
                                            $psubMenu5= "<i style='color: #FF0000;' class='glyphicon glyphicon-remove'></i>";
                                            $accImp=1;
                                        }
                                    }
                                }
                                if ($entre=='') {
                                    $accC=1; $accI=1;$accM=1;$accE=1;$accImp=1;
                                }
                                if ($idSubMenuP=='') {
                                    $idSubMenuP=$submenuID;
                                }
                                if($submenuID==$submen){
?> <font style="color:blue; font-weight:bold;">
<?php
                                }
                                echo $submenu1;
                                if($submenuID==$submen){
?>
                                </font>
                                                <?php
                                }
?>
                                        </td>
                                        <td id="consultartd<?php echo $idSubMenuP; ?>" class="CeldaRecojeDatos" height="20">
                                            <?php
                                    if ($accPermisos['S']==1 AND $accPermisos['I']==1 AND $accPermisos['U']==1 AND $accPermisos['D']==1) { ?>
                                                <a title="<?php echo 'Seleccionar '.$menu.'('.$submenu1.')'; ?>" onclick="controler('act=3&ver=2&dmn=<?php echo $idMenu;?>&idsubmenupp=<?php echo $idSubMenuP; ?>&accC=<?php echo $accC; ?>&permiso=1&submenu=<?php echo $submenuID; ?>&menus=<?php echo $idmenus; ?>&idperfil=<?php echo $_POST[idperfil]; ?>','consultartd<?php echo $idSubMenuP; ?>');return false;" href="javascript:void(0);">
                                                    <?php echo $psubMenu1; ?>
                                                </a>
                                                <?php
                                    }else{
                                        echo $psubMenu1;
                                    }
?>
                                        </td>
                                        <td id="insertartd<?php echo $idSubMenuP; ?>" class="CeldaRecojeDatos" height="20">
                                            <?php
                                    if ($accPermisos['S']==1 AND $accPermisos['I']==1 AND $accPermisos['U']==1 AND $accPermisos['D']==1) { ?>
                                                <a title="<?php echo 'Seleccionar '.$menu.'('.$submenu1.')'; ?>" onclick="controler('act=3&ver=2&dmn=<?php echo $idMenu;?>&idsubmenupp=<?php echo $idSubMenuP; ?>&accI=<?php echo $accI; ?>&permiso=1&submenu=<?php echo $submenuID; ?>&menus=<?php echo $idmenus; ?>&idperfil=<?php echo $_POST[idperfil]; ?>','insertartd<?php echo $idSubMenuP; ?>'); return false;" href="javascript:void(0);">
                                                    <?php echo $psubMenu2; ?>
                                                </a>
                                                <?php
                                    }else{
                                        echo $psubMenu1;
                                    }
?>
                                        </td>
                                        <td id="modificartd<?php echo $idSubMenuP; ?>" class="CeldaRecojeDatos" height="20">
                                            <?php
                                    if ($accPermisos['S']==1 AND $accPermisos['I']==1 AND $accPermisos['U']==1 AND $accPermisos['D']==1) { ?>
                                                <a title="<?php echo 'Seleccionar '.$menu.'('.$submenu1.')'; ?>" onclick="controler('act=3&ver=2&dmn=<?php echo $idMenu;?>&idsubmenupp=<?php echo $idSubMenuP; ?>&accM=<?php echo $accM; ?>&permiso=1&submenu=<?php echo $submenuID; ?>&menus=<?php echo $idmenus; ?>&idperfil=<?php echo $_POST[idperfil]; ?>','modificartd<?php echo $idSubMenuP; ?>'); return false;" href="javascript:void(0);">
                                                    <?php echo $psubMenu3; ?>
                                                </a>
                                                <?php
                                    }else{
                                        echo $psubMenu3;
                                    }
?>
                                        </td>
                                        <td id="eliminartd<?php echo $idSubMenuP; ?>" class="CeldaRecojeDatos" height="20">
                                            <?php
                                    if ($accPermisos['S']==1 AND $accPermisos['I']==1 AND $accPermisos['U']==1 AND $accPermisos['D']==1) { ?>
                                                <a title="<?php echo 'Seleccionar '.$menu.'('.$submenu1.')'; ?>" onclick="controler('act=3&ver=2&dmn=<?php echo $idMenu;?>&idsubmenupp=<?php echo $idSubMenuP; ?>&accE=<?php echo $accE; ?>,permiso=1&submenu=<?php echo $submenuID; ?>&menus=<?php echo $idmenus; ?>&idperfil=<?php echo $_POST[idperfil]; ?>','eliminartd<?php echo $idSubMenuP; ?>');  return false;" href="javascript:void(0);">
                                                    <?php echo $psubMenu4; ?>
                                                </a>
                                                <?php
                                    }else{
                                        echo $psubMenu4;
                                    }
?>
                                        </td>
                                        <td id="imprimirtd<?php echo $idSubMenuP; ?>" class="CeldaRecojeDatos" height="20">
                                            <?php
                                    if ($accPermisos['S']==1 AND $accPermisos['I']==1 AND $accPermisos['U']==1 AND $accPermisos['D']==1) { ?>
                                                <a title="<?php echo 'Seleccionar '.$menu.'('.$submenu1.')'; ?>" onclick="controler('act=3&ver=2&dmn=<?php echo $idMenu;?>&idsubmenupp=<?php echo $idSubMenuP; ?>&accImp=<?php echo $accImp; ?>&permiso=1&submenu=<?php echo $submenuID; ?>&menus=<?php echo $idmenus; ?>&idperfil=<?php echo $_POST[idperfil]; ?>','imprimirtd<?php echo $idSubMenuP; ?>'); return false;" href="javascript:void(0);">
                                                    <?php echo $psubMenu5; ?>
                                                </a>
                                                <?php
                                    }else{
                                        echo $psubMenu5;
                                    }
?>
                                        </td>
                                        <?php
                            }
?>
                                </div>
                            </tr>
                            <?php
                    }
?>
                    </table>
                </div>
            </div>
        </div>
    </div>
