<?php include("../template/barra_navegacion.php"); ?>
   <div class="container" class="m-auto">
   <h1>Artículos</h1>
   <h4 class="text-secondory">Registro de artículo</h4>
    <form name="formArticulo" method="POST">
    <?php 
    include "../models/conexion.php";
    include "../controllers/articulo/registro_articulo.php";
    ?>
        <div class="mb-3">
        <label for="sku" class="form-label">SKU</label>
        <input type="number" class="form-control" id="sku" name="sku" maxlength="6" required autofocus oninput="checksku()" >
        <div id="check-sku" class="form-text">Ingresar SKU.</div>
    </div>
    <div class="mb-3">
        <label for="articulo" class="form-label">Nombre de artículo</label>
        <input type="text" class="form-control" id="articulo" name="articulo" maxlength="15" disabled required autofocus>
        <div id="articulo" class="form-text">Ingresar nombre de artículo.</div>
    </div>
    <div class="mb-3">
        <label for="marca" class="form-label">Nombre de marca</label>
        <input type="text" class="form-control" id="marca" name="marca" maxlength="15" disabled required>
        <div id="marca" class="form-text">Ingresar nombre de marca.</div>
    </div>
    <div class="mb-3">
        <label for="modelo" class="form-label">Nombre de modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo" maxlength="20" required disabled>
        <div id="modelo" class="form-text">Ingresar nombre de modelo.</div>
    </div>
    <div class="mb-3">
        <?php 
            $query_dep= mysqli_query($conection, "select * from departamentos order by id");
             $result_dep= mysqli_num_rows($query_dep);
        ?>
        <label for="dep" class="form-label">Departamento</label>
        <select  class="form-select"  name="dep" id="dep" required autofocus disabled>
        <option value="<?php echo $id; ?>" selected required>Seleccionar un departamento</option>
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
        <label for="clase" class="form-label">Clase</label>
        <select class="form-select" name="clases" id="clases" required autofocus disabled>
            <option selected required>Seleccionar una clase</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="familias" class="form-label">Familia</label>
        <select class="form-select" name="familias" id="familias" required autofocus disabled>
            <option selected required>Seleccionar una familia</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" maxlength="9" required autofocus disabled>
        <div id="stock" class="form-text">Ingresar stock.</div>
    </div>
    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" maxlength="9" required autofocus disabled oninput="checkstock()">
        <div id="check-stock" class="form-text">Ingresar cantidad.</div>
    </div> 
    <button type="submit" class="btn btn-primary" id="btnregistrar" name="btnregistrar" value="ok">Registrar</button>
    </form> 
</div>

    <?php include("../controllers/articulo/validaciones.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>