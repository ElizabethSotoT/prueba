<?php 

if(!empty($_POST["btnregistrar"])){

    if(!empty($_POST["clases"]) and !empty($_POST["nombrefamilia"]) and !empty($_POST["numero"])){
        $clase = explode("-", $_POST['clases']);
        $idclase=$clase[0];
        $nombre_clase=$clase[1];
        $number=$_POST["numero"];
        $nombre=$_POST["nombrefamilia"];
        echo $idclase;

        $sql=$conection->query(" call familia_alta($number, '$nombre', $idclase, '$nombre_clase')");
        if ($sql==1){
            echo '<div class="alert alert-success"> Familia registrada correctamente</div>';
            header("location:../familia/index.php");
        }else{
            echo '<div class="alert alert-danger">Error al registrar familia</div>';
        }

    }else{
        echo '<div class="alert alert-waring">Campo vacío</div>';
    }
}
?>