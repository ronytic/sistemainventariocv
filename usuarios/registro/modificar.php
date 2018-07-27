<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Datos de Usuario";
$Cod=$_GET['Cod'];
include_once("../../class/usuario.php");
$usuario=new usuario;
$u=$usuario->mostrarRegistro($Cod);
$u=array_shift($u);
$niveles=array("2"=>"Gerente","3"=>"Administrador","4"=>"Vendedor","5"=>"Almacén");

include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="actualizar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod" value="<?php echo $Cod;?>">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="">
            <div class="form-group">
            <label class="form-label">Usuario</label>
            
            <input type="text" name="Usuario" class="form-control" autofocus value="<?=$u['Usuario']?>" required>
                </div>
            </td>

            <td class=""><label class="form-label">Contraseña</label><input type="password" name="Pass" class="form-control" ></td>
  
            <td class="">
            <label class="form-label">Nivel de Usuario</label><select name="Nivel" class="form-control">
                <?php 
                foreach($niveles as $k=>$v){
                    ?>
                    <option value="<?=$k?>" <?=$u['Nivel']==$k?'selected="selected"':''?>><?=$v?></option>
                    <?php
                }
                ?>
                
            </select></td>
        </tr>
        <tr>
            <td class=""><label class="form-label">Nombres</label><input type="text" name="Nombres" class="form-control" value="<?=$u['Nombres']?>" required></td>

            <td class=""><label class="form-label">Paterno</label><input type="text" name="Paterno" class="form-control" value="<?=$u['Paterno']?>" required></td>

            <td class=""><label class="form-label">Materno</label><input type="text" name="Materno" class="form-control" value="<?=$u['Materno']?>"></td>
        </tr>
        <tr>
            <td class=""><label class="form-label">Cargo</label><input type="text" name="Cargo" class="form-control" value="<?=$u['Cargo']?>"></td>

            <td class=""><label class="form-label">Ci</label><input type="text" name="Ci" class="form-control" value="<?=$u['Ci']?>"></td>

            <td class=""><label class="form-label">Direccion</label><input type="text" name="Direccion" class="form-control" value="<?=$u['Direccion']?>"></td>
        </tr>
        
        <tr>
            <td class=""><label class="form-label">Telefono</label><input type="text" name="Telefono" class="form-control" value="<?=$u['Telefono']?>"></td>

            <td class=""><label class="form-label">Celular</label><input type="text" name="Celular" class="form-control" value="<?=$u['Celular']?>"></td>

            <td class=""><label class="form-label">Observacion</label> <textarea name="Observacion" class="form-control"><?=$u['Observacion']?></textarea></td>
        </tr>

    </table>
    <input type="submit" value="Guardar" class="btn btn-info">
    </form>
</div>
<?php include_once("../../pie.php");?>