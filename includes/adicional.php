<?php
    $res = paraTodos::arrayConsulta("perdet_S,perdet_U,perdet_D,perdet_I,perdet_P", "perfiles_det", "perdet_perfcodigo = '$_SESSION[usuario_perfil]' AND perdet_submcodigo = '$idMenu'");
    foreach ($res as $arr) {
      $accPermisos = array(S => $arr[perdet_S], U => $arr[perdet_U], I => $arr[perdet_I], D => $arr[perdet_D], P => $arr[perdet_P]);
    }
?>
