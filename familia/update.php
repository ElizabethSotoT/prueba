<?php
include "../models/conexion.php";
    $id_fam = $_GET["id"];
    $nom_fam = $_GET["nom_fam"];
    $id_clase = $_GET["id_clase"];
    $nom_clase = $_GET["nom_clase"];
    $sql=$conection->query("select * from familias where id = $id_fam and nombre = '$nom_fam'");
?>
<?php include("../template/barra_navegacion.php"); ?>
   <div class="container" class="m-auto">
   <h1>Familias</h1>
   <h4 class="text-secondory">Modificar familia</h4>
    <form method="POST">

    <div class="mb-3">
        <label for="clase" class="form-label">Departamento</label>
    <?php 
    include "../models/conexion.php";
    include "../controllers/familia/modificar_familia.php";
        $query_dep= mysqli_query($conection, "select * from departamentos order by id");
            mysqli_close($conection);
        $result_dep= mysqli_num_rows($query_dep);

        ?>
        <select  class="form-select"  name="dep" id="dep" required>
        <option value="<?php echo $id_departamento; ?>" selected required>Seleccionar</option>
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
    <?php 
    while($datos=$sql->fetch_object()){?>
    </select>
        </div>
        <input type="hidden" name="id" id="id" value="<?= $datos->id ?>"> 
        <input type="hidden" name="nombrebf" id="nombrebf" value="<?= $datos->nombre?>">  
    <div class="mb-3">
        <label for="clase" class="form-label">Clase</label>
        <select class="form-select" name="clases" id="clases" required autofocus>
            <option value="<?php echo $id_clase; echo"-"; echo $nom_clase;?>" selected><?php echo $nom_clase?></option>
        </select>
    </div>
        <div class="mb-3">
        <label for="numero" class="form-label">Número de la familia</label>
        <input type="number" class="form-control" id="numero" name="numero" value="<?= $datos->id ?>" required oninput="checkfamilia()" >
        <div id="check-nombre" class="form-text">Ingresar número de la familia.</div>
    </div> 
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de familia</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $datos->nombre ?>" required oninput="checknombre()" >
        <div id="check-numero" class="form-text">Ingresar nombre de la familia.</div>
    </div>
     <?php
    }   
    ?>
    <button type="submit" class="btn btn-primary" name="btnupdate" value="ok">Registrar</button>
    </form> 
</div>
       <script>
    function checkfamilia(){
        var valorNumero =$("#numero").val(); 
        var valorClase =$("#clases").val(); 
            jQuery.ajax({ 
                url: '../controllers/familia/verificarfamilia.php',
                type: "POST",
                data: {
                    numero: valorNumero,
                    clase: valorClase
                },           
                success: function(data){
                    $("#check-nombre").html(data);
                },
                error:function(){}

            });
        };

    function checknombre(){
        var valorNumero =$("#numero").val(); 
        var valorNombre =$("#nombre").val(); 
            jQuery.ajax({ 
                url: '../controllers/familia/verificanombre.php',
                type: "POST",
                data: {
                    numero: valorNumero,
                    nombre: valorNombre
                },           
                success: function(data){
                    $("#check-numero").html(data);
                },
                error:function(){
                    alert("error");
                }

            });
        };

        $(document).ready(function(e){
            $("#dep").change(function(){
                var parametros = "id="+$("#dep").val();
                console.log(parametros)
                jQuery.ajax({
                    data: parametros,
                    url: '../controllers/familia/ajax_clases.php',
                    type: 'POST',
                    beforeSend: function (){
                        $("#clases").html("En proceso");
                    },
                    success: function (response){
                        $("#clases").html(response);
                    },
                    error:function(){
                        alert("error")
                    }
                });
            })
        })

        $(document).ready(function () {
            $('input#numero')
              .keypress(function (event) {
                if (event.which < 48 || event.which > 57 || this.value.length === 3) {
                  return false;
                }
            });
            $('input#nombre')
              .keypress(function (event) {
                if (this.value.length === 30) {
                  return false;
                }
            });
            $("#dep").change(function(){
                $('select').prop('disabled',false);
            });
            $("#clases").change(function(){
                $('#numero').prop('disabled',false);
            });
        });


    </script>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>