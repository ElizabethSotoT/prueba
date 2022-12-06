<?php
include "../models/conexion.php";
    $id_art = $_GET["id"];
    $nombre_dep = $_GET["nombre_dep"];
    $sql=$conection->query("select * from articulos where sku = $id_art");
?>

<?php include("../template/barra_navegacion.php"); ?>
   <div class="container" class="m-auto">
   <h1>Artículos</h1>
   <h4 class="text-secondory">Modificar artículo</h4>

    <form method="POST">
    <?php 
    include "../models/conexion.php";
    include "../controllers/articulo/modificar_articulo.php";
     while($datos=$sql->fetch_object()){
        if($datos->descontinuado == 0){
            $estado = "Activo";
        }else{
            $estado = "Descontinuado";
        }
        ?>
        <input type="hidden" name="id" value="<?= $datos->sku ?>">
        <div class="mb-3">
        <label for="sku" class="form-label">SKU</label>
        <input type="number" class="form-control" id="sku" name="sku" value="<?= $datos->sku ?>" maxlength="6" required oninput="checksku()">
        <div id="check-sku" class="form-text">Ingresar SKU.</div>
    </div>
    <div class="mb-3">
        <label for="articulo" class="form-label">Nombre de artículo</label>
        <input type="text" class="form-control" id="articulo" name="articulo" value="<?= $datos->articulo ?>" maxlength="15" required>
        <div id="articulo" class="form-text">Ingresar nombre de artículo.</div>
    </div>
    <div class="mb-3">
        <label for="marca" class="form-label">Nombre de marca</label>
        <input type="text" class="form-control" id="marca" name="marca" value="<?= $datos->marca ?>" maxlength="15" required>
        <div id="marca" class="form-text">Ingresar nombre de marca.</div>
    </div>
    <div class="mb-3">
        <label for="modelo" class="form-label">Nombre de modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo" value="<?= $datos->modelo ?>"maxlength="20" required>
        <div id="modelo" class="form-text">Ingresar nombre de modelo.</div>
    <div class="mb-3">
        <?php 
            $query_dep= mysqli_query($conection, "select * from departamentos order by id");
            $result_dep= mysqli_num_rows($query_dep);

        ?>
        <label for="dep" class="form-label">Departamento</label>
        <select  class="form-select"  name="dep" id="dep" required>
        <option value="<?= $datos->id_departamento?>" required><?= $nombre_dep?></option>
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
    <div class="mb-3">
        <?php 
            $query_class= mysqli_query($conection, "select * from clases order by id");
            $result_class= mysqli_num_rows($query_class);
            ?>
            <label for="class" class="form-label">Clase</label>
            <select  class="form-select"  name="class" id="class">
            <option selected><?= $datos->id_clase.'-'.$datos->nombre_clase?></option>
                <?php
                    if ($result_class > 0)
                    {
                
                       while($clase= mysqli_fetch_array($query_class)) {
                ?>
                <option value="<?php echo $clase['id']; echo"-"; echo $clase['nombre'];?> "><?php echo $clase['id'] ?> - <?php echo $clase['nombre'] ?></option>
                <?php
                        }
                    }
        ?>
    </select>
    </div>  
    <div class="mb-3">
        <?php 
            $query_fam= mysqli_query($conection, "select * from familias order by id");
                mysqli_close($conection);
            $result_fam= mysqli_num_rows($query_fam);

            ?>
            <label for="fam" class="form-label">Familia</label>
            <select  class="form-select"  name="fam" id="fam">
            <option selected><?= $datos->id_familia.'-'.$datos->nombre_familia ?></option>
                <?php
                    if ($result_fam > 0)
                    {
                
                       while($fam= mysqli_fetch_array($query_fam)) {
                ?>
                <option value="<?php echo $fam['id']; echo"-"; echo $fam['nombre'];?> "><?php echo $fam['id'] ?> - <?php echo $fam['nombre'] ?></option>
                <?php
                        }
                    }
        ?>
    </select>
    </div> 
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="<?= $datos->stock ?>" maxlength="9" required>
        <div id="stock" class="form-text">Ingresar stock.</div>
    </div>
    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?= $datos->cantidad ?>" maxlength="9" required oninput="checkstock()">
        <div id="check-stock" class="form-text">Ingresar cantidad.</div>
    </div>
    <div class="mb-3">
        <label for="descontinuado" class="form-label">Continuado/Descontinuado</label>
        <select class="form-select" name="descontinuado" required>
        <option value="<?= $datos->descontinuado?>" selected><?= $estado ?></option>
          <option value="0">Activo</option>
          <option value="1">Descontinuado</option>
        </select>
    </div>
    <input type="hidden" name="fecha_baja" value="<?= $datos->fecha_baja ?>">
    <?php }   
    ?>   
    <button type="submit" class="btn btn-primary" name="btnupdate" value="ok">Registrar</button>
    </form>

</div>
    <?php include("../controllers/articulo/validaciones.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>