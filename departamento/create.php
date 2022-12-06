<?php include("../template/barra_navegacion.php"); ?>
   <div class="container" class="m-auto" style="margin-top:50px">
   <h1>Departamentos</h1>
   <h4 class="text-secondory">Registro de departamento</h4>
    <form method="POST">
    <?php 
   include "../models/conexion.php";
   include "../controllers/departamento/registro_departamento.php";
   ?>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de departamento</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
        <div id="nombre" class="form-text">Ingresar nombre de departamento.</div>
    </div>
    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    </form>

   
</div>
    <script>
      $(document).ready(function () {
        $('input#nombre')
          .keypress(function (event) {
            if (this.value.length === 30) {
              return false;
            }
          });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>