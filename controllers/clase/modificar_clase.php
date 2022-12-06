<?php
if(!empty($_POST["btnupdate"])){
    if(!empty($_POST["id_clase"])  
        and !empty($_POST["numero"]) 
        and !empty($_POST["nombre"])
        and !empty($_POST["nom_clase"])
        and !empty($_POST["dep"])){
        $id=$_POST["id_clase"];
        $numero=$_POST["numero"];
        $nombre=$_POST["nombre"];
        $nom_clase=$_POST["nom_clase"];
        $id_departamento=$_POST["dep"];

        echo $id_departamento;
        echo $id;
        echo $numero;
        echo $nombre;

        $sql=$conection->query("call clase_act($id, $numero, '$nombre', '$nom_clase', $id_departamento)");
        if ($sql==1){
            echo '<div class="alert alert-success"> Clase registrada correctamente</div>';
            header("location:../clase/index.php");
        }else{
            echo '<div class="alert alert-danger">Error al registrar clase</div>';
        }

    }else{
        echo '<div class="alert alert-waring">Campo vacío</div>';
    }
}
?>

