<?php
include "../models/conexion.php";
    $id_clase = $_GET["id"];
    $nom_clase = $_GET["nom_clase"];
    $id_departamento = $_GET["id_dep"];
    $nombre_dep = $_GET["nombre_dep"];
    $sql=$conection->query("select * from clases where id = $id_clase and nombre = '$nom_clase'");
?>
<?php include("../template/barra_navegacion.php"); ?>
   <div class="container" class="m-auto" style="margin-top:50px">
   <h1>Clases</h1>
   <h4 class="text-secondory">Registro de clase</h4>
    <form method="POST">
    <div class="mb-3">
    <?php 
    include "../controllers/clase/modificar_clase.php";
        $query_dep= mysqli_query($conection, "select * from departamentos order by id");
            mysqli_close($conection);
        $result_dep= mysqli_num_rows($query_dep);

        ?>
        <select  class="form-select"  name="dep" id="dep" required>
        <option value="<?php echo $id_departamento; ?>" selected required><?= $nombre_dep?></option>
            <?php
                if ($result_dep > 0)
                {
            
                   while($dep= mysqli_fetch_array($query_dep)) {
            ?>
            <option value="<?php echo $dep['id']; ?>" required><?php echo $dep['nombre'] ?></option>
            <?php
                    }
                }
            
        ?>
        </select>
    </div>
    <?php 
    while($datos=$sql->fetch_object()){?>
    <div class="mb-3">
        <input type="hidden" name="id_clase" value="<?= $datos->id ?>"> 
        <input type="hidden" name="nom_clase" value="<?= $datos->nombre ?>"> 
        <label for="numero" class="form-label">Número de la clase</label>
        <input type="number" class="form-control" id="numero" name="numero" value="<?= $datos->id ?>" required oninput="checknumero()">
        <div id="check-numero" class="form-text">Ingresar número de la clase.</div>
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de clase</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $datos->nombre ?>" required oninput="checknombre()">
        <div id="check-nombre" class="form-text">Ingresar nombre de la clase.</div>
    </div>
    <?php 
    }   
    ?>  
    <button type="submit" class="btn btn-primary" name="btnupdate" value="ok">Registrar</button>
    </form>
</div>
<?php include("../controllers/clase/validaciones.php"); ?>