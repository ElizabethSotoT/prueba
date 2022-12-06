<?php include("../template/barra_navegacion.php"); ?>
   <div class="container" class="m-auto" style="margin-top:50px">  
   <table class="table table-bordered">
   <div class="table-title">
                <div class="row">
                    <div class="col-sm-10"><h2>Familias <b>Details</b></h2></div>
                    <div class="col-sm-2">
                        <a href="create.php" type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar familia</a>
                    </div>
                </div>
            </div>
  <thead>
    <tr>
      <th scope="col">Número</th>
      <th scope="col">Nombre</th>
      <th scope="col">Número clase</th>
      <th scope="col">Clase</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    include "../models/conexion.php";
    include "../controllers/familia/eliminar_familia.php";
    $sql=$conection->query("call familia_index");
    while ($datos=$sql->fetch_object()) {?>
    <tr>
      <th><?= $datos->id_familia ?></th>
      <td><?= $datos->nombre_familia ?></td>
      <th><?= $datos->id_clase ?></th>
      <td><?= $datos->nombre_clase ?></td>
      <td style='text-align:center; vertical-align:middle'>
      <a href="update.php?id=<?= $datos->id_familia ?>&nom_fam=<?= $datos->nombre_familia?>&id_clase=<?= $datos->id_clase?>&nom_clase=<?= $datos->nombre_clase?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
      <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_familia ?>&nom_fam=<?= $datos->nombre_familia?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
    </td>
    </tr>
    <?php 
    }
    ?>
  </tbody>
</table>

   
</div>
<?php include("../template/pie.php"); ?>