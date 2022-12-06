<?php include("../template/barra_navegacion.php"); ?>

  <div class="container" class="m-auto" style="margin-top:50px">  
   <table class="table table-bordered">
   <div class="table-title">
                <div class="row">
                    <div class="col-sm-10"><h2>Artículos <b>Details</b></h2></div>
                    <div class="col-sm-2">
                        <a href="create.php" type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar artículo</a>
                    </div>
                </div>
            </div>
  <thead>
    <tr>
      <th scope="col">SKU</th>
      <th scope="col">Artículo</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th colspan="2">Departamento</th>
      <th colspan="2">Clase</th>
      <th colspan="2">Familia</th>
      <th scope="col">Fecha de Alta</th>
      <th scope="col">Stock</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Descontinuado</th>
      <th scope="col">Fecha baja</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    include "../models/conexion.php";
    include "../controllers/articulo/eliminar_articulo.php";
    $sql=$conection->query("call articulo_consulta");
    while ($datos=$sql->fetch_object()) {
      if($datos->descontinuado == 0){
        $estado = "Activo";
      }else{
        $estado = "Descontinuado";
      }
      ?>
    <tr>
      <th><?= $datos->sku ?></th>
      <td><?= $datos->articulo ?></td>
      <td><?= $datos->marca ?></td>
      <td><?= $datos->modelo ?></td>
      <td><?= $datos->id_departamento ?></td>
      <td><?= $datos->nombre_dep ?></td>
      <td><?= $datos->id_clase ?></td>
      <td><?= $datos->nombre_clase ?></td>
      <td><?= $datos->id_familia ?></td>
      <td><?= $datos->nombre_familia ?></td>
      <td><?= $datos->fecha_alta ?></td>
      <td><?= $datos->stock ?></td>
      <td><?= $datos->cantidad ?></td>
      <td><?= $estado?></td>
      <td><?= $datos->fecha_baja ?></td>
      <td style='text-align:center; vertical-align:middle'>
      <a href="update.php?id=<?= $datos->sku ?>&nombre_dep=<?= $datos->nombre_dep?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
      <a onclick="return eliminar()" href="index.php?id=<?= $datos->sku ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
    </td>
    </tr>
    <?php 
    }
    ?>
  </tbody>
</table>

   
</div>
<script>
  
</script>
<?php include("../template/pie.php"); ?>