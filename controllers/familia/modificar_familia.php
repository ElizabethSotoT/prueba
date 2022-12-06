<?php
if(!empty($_POST["btnupdate"])){
    if(!empty($_POST["id"]) 
        and !empty($_POST['numero']) 
        and !empty($_POST["nombrebf"]) 
        and !empty($_POST['nombre'])
        and !empty($_POST["clases"])){
        $id_bf=$_POST["id"];
        $numero=$_POST["numero"];
        $nombrebf=$_POST["nombrebf"];
        $nombre=$_POST["nombre"];
        $clase = explode("-", $_POST['clases']);
        $id_clase=$clase[0];
        $nombre_clase=$clase[1];

        echo $nombre; 
        $sql=$conection->query("call familia_act($id_bf, $numero, '$nombre', '$nombrebf', $id_clase, '$nombre_clase')");
        if ($sql==1){
            echo '<div class="alert alert-success"> Clase registrada correctamente</div>';
            header("location:../familia/index.php");
        }else{
            echo '<div class="alert alert-danger">Error al registrar clase</div>';
        }
    }else{
        echo '<div class="alert alert-waring">Campo vacío</div>';
    }
}
?>