<?php
include "../models/conexion.php";
    $id_dep = $_GET["id"];
    $sql=$conection->query("select * from departamentos where id = $id_dep");
?>
<?php include("../template/barra_navegacion.php"); ?>
   <div class="container" class="m-auto" style="margin-top:50px">
   <h1>Departamentos</h1>
   <h4 class="text-secondory">Modificar departamento</h4>
    <form class="m-auto" method="POST">

    <?php 
    include "../controllers/departamento/modificar_departamento.php";
    while($datos=$sql->fetch_object()){
        ?>
         <input type="hidden" name="id" value="<?= $datos->id ?>"> 
         <div class="mb-3">
            <label for="numero" class="form-label">Número de departamento</label>
            <input type="text" class="form-control" id="numero" name="numero" value="<?= $datos->id ?>" oninput="checkid()" > 
            <div id="check-id" class="form-text">Ingresar numero de departamento.</div>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de departamento</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $datos->nombre ?>">
            <div id="nombre" class="form-text">Ingresar nombre de departamento.</div>
        </div>
    <?php
    }   
    ?>
    
    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar</button>
    </form>

   
</div>
    <script>
        function checkid(){
            jQuery.ajax({
                url: "../controllers/departamento/verificarid.php",
                data: 'id='+$("#numero").val(),
                type: "POST",
                success: function(data){
                    $("#check-id").html(data);
                },
                error:function(){}

            });
        };

        $(document).ready(function () {
            $('input#numero')
              .keypress(function (event) {
                if (event.which < 48 || event.which > 57 || this.value.length === 1) {
                  return false;
                }
            });
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