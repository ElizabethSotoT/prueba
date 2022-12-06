<?php include("../template/barra_navegacion.php"); ?>
   <div class="container" class="m-auto" style="margin-top:50px">  
   <table class="table table-bordered">
   <div class="table-title">
      <div class="row">
        <div class="col-sm-9"><h2>Departamentos <b>Details</b></h2></div>
          <div class="col-sm-3">
            <a href="create.php" type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar departamento</a>
          </div>
        </div>
      </div>
  <thead>
    <tr>
      <th scope="col">Número</th>
      <th scope="col">Nombre</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    include "../models/conexion.php";
    include "../controllers/departamento/eliminar_departamento.php";
    $sql=$conection->query("call dep_index");
    while($datos=$sql->fetch_object()){?>
    <tr>
      <th><?= $datos->id ?></th>
      <td><?= $datos->nombre ?></td>
      <td style='text-align:center; vertical-align:middle'>
      <a href="update.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
      <a onclick="return eliminar()" href="index.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
    </td>
    </tr>
    <?php 
    }
    ?>
  </tbody>
</table>

</div>
<?php include("../template/pie.php"); ?>