<?php
include_once("cabecerahtml.php");
?>
<?php include_once("cabecera.php");?>

    <div class=" alert alert-success">
    <ul>
    <?php foreach($mensajes as $m){?>
        <li><?php echo $m;?></li>
    <?php }?>
    </ul>
    </div>
    
    <br>
    <?php if($nuevo==1){?>
    <a href="index.php" class="btn btn-success">Nuevo Registro</a>
    <?php }?>
    <?php if($listar==1){?>
    <a href="listar.php" class="btn btn-primary">Listado de Registro</a>
    <?php }?>
    <?php 
        if(count($botones)>0){
            foreach($botones as $k=>$b){
                ?>
                <a href="<?php echo $b[0];?>" class="btn btn-<?php echo $b[1];?>"><?php echo $k;?></a>
                <?php
            }
        }?>

<?php include_once("pie.php");?>