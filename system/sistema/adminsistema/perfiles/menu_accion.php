<?php
    $dmn = $_POST['dmn'];
if ($_POST[permiso]!='') {
    if ($_POST[idsubmenupp]!='') {
        if ($_POST[accC]!='') {
            $acc=$_POST[accC];
            $campo='perdet_S';
            $iddiv='consultartd';
            $accb='accC';
            if($_POST[accC]==0) {
                $accbb=1;
            }else{
                $accbb=0;
            }
        }
        if ($_POST[accI]!='') {
            $acc=$_POST[accI];
            $campo='perdet_I';
            $iddiv='insertartd';
            $accb='accI';
            if($_POST[accI]==0) {
                $accbb=1;
            }else{
                $accbb=0;
            }
        }
        if ($_POST[accM]!='') {
            $acc=$_POST[accM];
            $campo='perdet_U';
            $iddiv='modificartd';
            $accb='accM';
            if($_POST[accM]==0) {
                $accbb=1;
            }else{
                $accbb=0;
            }
        }
        if ($_POST[accE]!='') {
            $acc=$_POST[accE];
            $campo='perdet_D';
            $iddiv='eliminartd';
            $accb='accE';
            if($_POST[accE]==0) {
                $accbb=1;
            }else{
                $accbb=0;
            }
        }
        if ($_POST[accImp]!='') {
            $acc=$_POST[accImp];
            $campo='perdet_P';
            $iddiv='imprimirtd';
            $accb='accImp';
            if($_POST[accImp]==0) {
                $accbb=1;
            }else{
                $accbb=0;
            }
        }
        if ($acc==1) {
            $imgper="<i style='color: #36be00;' class='glyphicon glyphicon-check'></i>";
        }else{
            $imgper="<i style='color: #FF0000;' class='glyphicon glyphicon-remove'></i>";
        }
        $consulta_insertamenu=paraTodos::arrayInserte("perdet_submcodigo,perdet_menucodigo,perdet_perfcodigo","perfiles_det","'$_POST[submenu]','$_POST[menus]','$_POST[idperfil]'");
        $actualiza_submenu=paraTodos::arrayUpdate("$campo=$acc","perfiles_det","perdet_perfcodigo='$_POST[idperfil]' and perdet_menucodigo='$_POST[menus]' and perdet_submcodigo='$_POST[submenu]'");
?>
    <a onclick="controler('act=3&ver=2&dmn=<?php echo $dmn; ?>&idsubmenupp=<?php echo $_POST[idsubmenupp]; ?>&<?php echo $accb; ?>=<?php echo $accbb; ?>&permiso=1','<?php echo $iddiv.$_POST[idsubmenupp]; ?>'); return false;" href="javascript: void(0);">
        <?php echo $imgper; ?>
    </a>
<?php
    }else{
        if ($_POST[accC]!='') {
            $acc=$_POST[accC];
            $campo='perdet_S';
            $iddiv='consultartd';
            $accb='accC';
            if($_POST[accC]==0) {
                $accbb=1;
            }else{
                $accbb=0;
            }
        }
        if ($_POST[accI]!='') {
            $acc=$_POST[accI];
            $campo='perdet_I';
            $iddiv='insertartd';
            $accb='accI';
            if($_POST[accI]==0) {
                $accbb=1;
            }else{
                $accbb=0;
            }
        }
        if ($_POST[accM]!='') {
            $acc=$_POST[accM];
            $campo='perdet_U';
            $iddiv='modificartd';
            $accb='accM';
            if($_POST[accM]==0) {
                $accbb=1;
            }else{
                $accbb=0;
            }
        }
        if ($_POST[accE]!='') {
            $acc=$_POST[accE];
            $campo='perdet_D';
            $iddiv='elimiinartd';
            $accb='accE';
            if($_POST[accE]==0) {
                $accbb=1;
            }else{
                $accbb=0;
            }
        }
        if ($_POST[accImp]!='') {
            $acc=$_POST[accImp];
            $campo='perdet_P';
            $iddiv='imprimirtd';
            $accb='accImp';
            if($_POST[accImp]==0) {
                $accbb=1;
            }else{
                $accbb=0;
            }
        }
        if ($acc==1) {
            $imgper="<i style='color: #36be00;' class='glyphicon glyphicon-check'></i>";
        }else{
            $imgper="<i style='color: #FF0000;' class='glyphicon glyphicon-remove'></i>";
        }
        $consulta_insertamenu=paraTodos::arrayInserte("perdet_submcodigo,perdet_menucodigo,perdet_perfcodigo","perfiles_det","'$_POST[submenu]','$_POST[menus]','$_POST[idperfil]'");
        $actualiza_submenu=paraTodos::arrayUpdate("$campo=$acc","perfiles_det","perdet_perfcodigo='$_POST[idperfil]' and perdet_menucodigo='$_POST[menus]' and perdet_submcodigo='$_POST[submenu]'");
         echo $imgper;
    }
}
?>
