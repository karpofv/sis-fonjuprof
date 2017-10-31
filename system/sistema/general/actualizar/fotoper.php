<div class="modal Ventana-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display:block;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="controler('dmn=<?php echo $idMenu;?>&ver=1','verContenido',$('#ventanaVer').html(''));"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <i class="fa fa-laptop modal-icon"></i>
                <h4 class="modal-title">Imagen de perfil</h4>
                <small class="font-bold">Su imagen de no debe exceder de 1MG.</small>
            </div>
            <form onsubmit="
													var inputFileImage = document.getElementById('archivoImage<?php echo $_SESSION[ci];?>');
													var file = inputFileImage.files[0];
													var data = new FormData();
													data.append('archivo',file);
													var url = '<?php echo $ruta_base;?>/assets/uploads/upload.php';
													$.ajax({
														url:url,
														type:'POST',
														contentType:false,
														data:data,
														data:data,
														processData:false,
														success : function (msg) {
                                                            $.alert(msg);
                                                            controler('dmn=<?php echo $idMenu?>&ver=1','verContenido',$('#ventanaVer').html(''));
														}
													});return false;">
                <div class="modal-body">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Seleccionar imagen</span>
                        <span class="fileinput-exists">Cambiar</span><input id="archivoImage<?php echo $_SESSION[ci];?>" name="archivoImage<?php echo $_SESSION[ci];?>" type="file" class="file"></span>
                        <span class="fileinput-filename"></span>
                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="sunmit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
