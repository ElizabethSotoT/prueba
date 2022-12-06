<?php
    if(!empty($_POST["btnregistrar"])){
        if(!empty($_POST["id"]) and !empty($_POST["numero"]) and !empty($_POST["nombre"])){
            $idanterior=$_POST["id"];
            $numero=$_POST["numero"];
            $nombre=$_POST["nombre"];

            $sql=$conection->query(" call dep_act('$idanterior','$numero', '$nombre')");
            if($sql==1)
            {
                echo $id;
                echo $nombre;
                header("location:../departamento/index.php");
            }else{
                echo "<div class='alert alert-danger'>Error al modificar departamento</div>";
            }
        }else{
            echo "<div class='alert alert-warning'>Verificar dato vacío</div>";
        }
    }
?>